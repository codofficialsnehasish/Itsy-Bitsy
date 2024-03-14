<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Auth_model extends CI_Model
{
    //input values
    // $this->load->helper('cookie'); 
    public function input_values()
    {
        $name = explode(' ',$this->input->post('name',true));
        $data=array(
            // 'login_type'=>$this->input->post('login_type',true),
            'first_name'=>$name[0],
            'last_name'=>$name[1],
            // 'address'=>$this->input->post('address',true),
        //    'country_id'=>$this->input->post('country_id',true),
        //    'state_id'=>$this->input->post('state_id',true),
        //    'city_id'=>$this->input->post('city_id',true),
            'role'=> 'buyer',
            'phone_number'=>$this->input->post('phone_number',true),
            'email'=>$this->input->post('email',true),
            'password'=>$this->input->post('password',true)
        );
        return $data;
    }
    
    //login
    public function login()
    {
        $this->load->library('bcrypt');

        $data = $this->input_values();
        $user = $this->get_user_by_email_or_username($data['email']);

        if (!empty($user)) {
            //check password
            if (!$this->bcrypt->check_password($data['password'], $user->password)) {
                $this->session->set_flashdata('error', 'Wrong Password!');
                return false;
            }
            //set user data
            $user_data = array(
                'modesy_sess_user_id' => $user->id,
                'modesy_sess_user_email' => $user->email,
                'modesy_sess_user_role' => $user->role,
                'modesy_sess_logged_in' => true,
                'modesy_sess_app_key' => $this->config->item('app_key'),
            );
            $this->session->set_userdata($user_data);
            return true;
        } else {
            $this->session->set_flashdata('error', 'Your Username/eMail is not registered with us!');
            return false;
        }
    }

    public function ajaxlogin(){
            $this->load->library('bcrypt');
    
            $data = $this->input_values();
            $user = $this->get_user_by_email_or_username($data['email']);
    
            if (!empty($user)) {
                //check password
                if (!$this->bcrypt->check_password($data['password'], $user->password)) {
                    $this->session->set_flashdata('error', 'Wrong Password!');
                    return false;
                }
                //set user data
                $user_data = array(
                    'modesy_sess_user_id' => $user->id,
                    'modesy_sess_user_email' => $user->email,
                    'modesy_sess_user_role' => $user->role,
                    'modesy_sess_logged_in' => true,
                    'modesy_sess_app_key' => $this->config->item('app_key'),
                );
                $this->session->set_userdata($user_data);
                return true;           
             } else {
                $this->session->set_flashdata('error', 'Your Username/eMail is not registered with us!');
                return false;
             }
    }
   
    //generate uniqe user name
    public function generate_uniqe_username($username)
    {
        $slug = $this->createName($username);
        if (!empty($this->get_user_by_slug($slug))) {
            $slug = $this->createName($username . "-1");
            if (!empty($this->get_user_by_slug($slug))) {
                $slug = $this->createName($username . "-2");
                if (!empty($this->get_user_by_slug($slug))) {
                    $slug = $this->createName($username . "-3");
                    if (!empty($this->get_user_by_slug($slug))) {
                        $slug = $this->createName($username . "-" . uniqid());
                    }
                }
            }
        }
        return $slug;
    }

    public function createName($username) {
        $username = str_replace(' ', '-', $username);
        $username = trim($username, '-_');
        return $username;
    }

    //get user by slug
    public function get_user_by_slug($slug)
    {
        $this->db->where('slug', $slug);
        $query = $this->db->get('users');
        return $query->row();
    }
   
    //get user by id
    public function get_user_by_id($id)
    {
        $this->db->where('id', $id);
        $query = $this->db->get('users');
        return $query->row();
    }
    //get user by email
    public function get_user_by_email_or_username($email)
    {
        $this->db->group_start();
        $this->db->where('email', $email);
        $this->db->or_where('username', $email);
        $this->db->group_end();
        $this->db->where('status', 1);
        $query = $this->db->get('users');
        return $query->row();
    }

     //is logged in
    public function is_logged_in()
    {
        //check if user logged in
        if ($this->session->userdata('modesy_sess_logged_in') == true && $this->session->userdata('modesy_sess_app_key') == $this->config->item('app_key')) {
            $user = $this->get_user($this->session->userdata('modesy_sess_user_id'));
            if (!empty($user)) {
                //if ($user->banned == 0) {
                    return true;
                //}
            }
        }
        return false;
    }

    
    //update last seen time
    public function update_last_seen()
    {
        if ($this->auth_check) {
            //update last seen
            $data = array(
                'last_seen' => date("Y-m-d H:i:s"),
            );
            $this->db->where('id', $this->auth_user->id);
            $this->db->update('users', $data);
        }
    }

    //function get user
    public function get_logged_user()
    {
        if ($this->is_logged_in()) {
            $user_id = $this->session->userdata('modesy_sess_user_id');
            $this->db->where('id', $user_id);
            $query = $this->db->get('users');
            return $query->row();
        }
    }
    
    //logout
    public function logout()
    {
        $this->load->helper('cookie');
        if(!get_cookie("user_id")){
            set_cookie('user_id', $this->auth_user->id,time() + (86400 * 30));
            set_cookie('user_role', $this->auth_user->role,time() + (86400 * 30));
        }
        //unset user data
        $this->session->unset_userdata('modesy_sess_user_id');
        $this->session->unset_userdata('modesy_sess_user_email');
        $this->session->unset_userdata('modesy_sess_user_role');
        $this->session->unset_userdata('modesy_sess_logged_in');
        $this->session->unset_userdata('modesy_sess_app_key');
        $this->session->unset_userdata('user_token');
    }

    //get user by id
    public function get_user($id)
    {
        $id = clean_number($id);
        $this->db->where('id', $id);
        $query = $this->db->get('users');
        return $query->row();
    }

    //check if email is unique
    public function is_unique_email($email, $user_id = 0)
    {
        $user_id = clean_number($user_id);
        $user = $this->get_user_by_email($email);

        //if id doesnt exists
        if ($user_id == 0) {
            if (empty($user)) {
                return true;
            } else {
                return false;
            }
        }

        if ($user_id != 0) {
            if (!empty($user) && $user->id != $user_id) {
                //email taken
                return false;
            } else {
                return true;
            }
        }
    }

    //check if email is unique
    public function is_unique_phone_no($phone, $user_id = 0)
    {
        $user_id = clean_number($user_id);
        $user = $this->get_user_by_phone_no($phone);

        //if id doesnt exists
        if ($user_id == 0) {
            if (empty($user)) {
                return true;
            } else {
                return false;
            }
        }

        if ($user_id != 0) {
            if (!empty($user) && $user->id != $user_id) {
                //email taken
                return false;
            } else {
                return true;
            }
        }
    }

    //check if username is unique
    public function is_unique_username($username, $user_id = 0)
    {
        $user = $this->get_user_by_username($username);

        //if id doesnt exists
        if ($user_id == 0) {
            if (empty($user)) {
                return true;
            } else {
                return false;
            }
        }

        if ($user_id != 0) {
            if (!empty($user) && $user->id != $user_id) {
                //username taken
                return false;
            } else {
                return true;
            }
        }
    }
    //get user by email
    public function get_user_by_email($email)
    {
        $this->db->where('email', $email);
        $query = $this->db->get('users');
        return $query->row();
    }

    //get user by email
    public function get_user_by_phone_no($phone)
    {
        $this->db->where('phone_number', $phone);
        $query = $this->db->get('users');
        return $query->row();
    }
 
    //get user by username
    public function get_user_by_username($username)
    {
        $username = remove_special_characters($username);
        $this->db->where('username', $username);
        $query = $this->db->get('users');
        return $query->row();
    }

    //update slug
    public function update_slug($id)
    {
        $id = clean_number($id);
        $user = $this->get_user($id);

        if (empty($user->slug) || $user->slug == "-") {
            $data = array(
                'slug' => "user-" . $user->id,
            );
            $this->db->where('id', $id);
            $this->db->update('users', $data);

        } else {
            if ($this->check_is_slug_unique($user->slug, $id) == true) {
                $data = array(
                    'slug' => $user->slug . "-" . $user->id
                );

                $this->db->where('id', $id);
                $this->db->update('users', $data);
            }
        }
    }

    //check slug
    public function check_is_slug_unique($slug, $id)
    {
        $id = clean_number($id);
        $this->db->where('users.slug', $slug);
        $this->db->where('users.id !=', $id);
        $query = $this->db->get('users');
        if ($query->num_rows() > 0) {
            return true;
        } else {
            return false;
        }
    }
    //send email activation
    public function send_email_activation($user_id, $token)
    {
        if (!empty($user_id)) {
            $user = $this->get_user($user_id);
            if (!empty($user)) {
                if (!empty($user->token) && $user->token != $token) {
                    exit();
                }
                //check token
                $data['token'] = $user->token;
                if (empty($data['token'])) {
                    $data['token'] = generate_token();
                    $this->db->where('id', $user->id);
                    $this->db->update('users', $data);
                }
                //send email
                $email_data = array(
                    'name'=>$user->full_name,
                    'email_link' => base_url() . "confirm?token=" . $user->token,
                );
                if($user->role=='consumer'){
                    $template="confirm_account_consumer";
                }else{
                    $template="confirm_account_provider";   
                }
                
                send_mail('Confirm Account',$user->email,$template,$email_data);
            }
        }
    }  
    
    /////////////////////consumer Register
    //solution provider register
    public function register($data=false)
    {
        $this->load->library('bcrypt');

        $data = $this->auth_model->input_values();
        // $data['username'] = remove_special_characters($data['username']);
        $user_name = remove_special_characters(strtolower($data['first_name']));
        // $data['username'] = $this->generate_uniqe_username($user_name);
        $data['username'] = $this->generate_uniqe_username($user_name);
        //secure password
        $data['password'] = $this->bcrypt->hash_password($data['password']);
        // $data['role'] = 'retailer';
        $data['role'] = $data['role'];
        $data['full_name'] = $data["first_name"].' '.$data["last_name"];
        $data['user_type'] = 'web_register';
        $data["slug"] = $this->slug->create_unique_slug($data["username"], 'users','slug');
        // $this->generate_uniqe_slug($data["username"]);
        // $data['banned'] = 0;
        $data['created_at'] = date('Y-m-d H:i:s');
        $data['token'] = generate_token();
        // $data['email_status'] = 1;
        $data['status'] = 1;
       // unset($data['register_type']); 
        if ($this->db->insert('users', $data)) {
            $last_id = $this->db->insert_id();
            $user = $this->get_user_by_id($last_id);
            return $last_id;
        } else {
            return false;
        }
    }

    /////////////////////Cahnge Password
    public function change_password($userId){
        $this->load->library('bcrypt');
        $currentPass = $this->input->post('pass',true);
        $newPass = $this->input->post('new_pass',true);
        $confirmPass = $this->input->post('confirm_pass',true);
        $user = $this->get_user_by_id($userId);
        $newPassword=$this->bcrypt->hash_password($confirmPass);
        //  
        if (!empty($user)) {
            if($this->bcrypt->check_password($currentPass, $user->password)){
            // if($this->bcrypt->hash_password($currentPass)==$user->password){
                if($newPass==$confirmPass){
                    $this->db->update('users', array('password'=>$newPassword), array('id' => $userId));
                    $status=1;
                    $msg='Your password has been changed';
                }else{
                    $status=2;
                    $msg='Sorry!Confirn password Does Not Match!';    
                }
            }else{
                    $status=3;
                    $msg='Sorry!Current password Does Not Match!';
            }
            return array('status'=>$status,'msg'=>$msg);
        }else{
            $status=4;
            $msg='Sorry!You are Registered With Us!';
        }
    }

    //get user by token
    public function get_user_by_token($token)
    {
        $token = remove_special_characters($token);
        $this->db->where('token', $token);
        $query = $this->db->get('users');
        return $query->row();
    }
    
    //reset password
    public function reset_password($id)
    {
        $id = clean_number($id);
        $this->load->library('bcrypt');
        $new_password = $this->input->post('password', true);
        $data = array(
            'password' => $this->bcrypt->hash_password($new_password),
            'token' => generate_token()
        );
        //change password
        $this->db->where('id', $id);
        return $this->db->update('users', $data);
    }

    //get user by token
    public function verify_email($email,$otp)
    {
        // $token = remove_special_characters($token);
        $this->db->where('email', $email);
        $this->db->where('otp', $otp);
        $query = $this->db->get('users');
        return $query->row();
    }

}
?>