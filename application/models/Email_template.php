<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Email_template extends CI_Model
{

    ////////////////////////test mail
    function testemail($email){
        $email_data[]="";
         send_mail('Test',$email,'test_email',$email_data);
    }
    
    
     function contact($data){
        $email_data['name']=$data['c_name'];
        $email_data['phone']=$data['c_phone'];
        $email_data['email']=$data['c_email'];
        $email_data['msg']=$data['c_msg'];
        send_mail('New Contact Details',$this->settings->contact_email,'contact',$email_data);
    }

   ////////////////////////test mail
    function thankyou($name,$email){
        $email_data['name']=$name;
         send_mail('Thank You for Connect With US',$email,'thankyou',$email_data);
    }
    
    function booking($data){
        $email_data['name']=$data['name'];
        $email_data['phone']=$data['phone'];
        $email_data['book_date']=formatted_date($data['book_date']);
        $email_data['msg']=$data['msg'];
        send_mail('New Booking',$this->settings->contact_email,'booking',$email_data);
    }
    
        function consultation($data){
        $email_data['name']=$data['name'];
        $email_data['phone']=$data['phone'];
        $email_data['msg']=$data['msg'];
        send_mail('New Consultation Request',$this->settings->contact_email,'consultation',$email_data);
    }
}