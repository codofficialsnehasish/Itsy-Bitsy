<!DOCTYPE html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
    <link type="text/css" rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css">
    <link type="text/css" rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Montserrat:wght@300;400;500;600;700;800&display=swap">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

    <title></title>


</head>

<body style="  overflow-x: hidden;height: 100%;width: 100%;position: relative;font-size: 14px;line-height: 30px;font-weight: normal;font-family:  Montserrat ;-webkit-font-smoothing: antialiased;-moz-osx-font-smoothing: grayscale;">
    <div style="background: #55415e; float: left; width:100%; text-align: center; position: relative;     height: 70vh;">
        <div style="background: #ffffff; display:inline-block; width:1000px; padding:30px;  margin-top: 100px; max-width: 870px;">
            <p style="">
                <img src="<?= base_url('assets/images/home/email_activation_logo.png');?>" style="width: 200px;">
            </p>
            <div style="float:left; width:100%; text-align: justify; margin-top: 25px;">
                <p style="float:left; width:100%; color: #198754; font-size: 17px; font-weight: 500;">Dear <?= $userdata['full_name']?></p>
                <p style="float:left; width:100%; color: #333; font-size: 16px; font-weight: 500; line-height: 21px;     margin-bottom: 20px;">
                The password for your account has been successfully reset.
                </p>
            
                <p style="float:left; width:100%; color: #333; font-size: 16px; font-weight: 500; line-height: 21px;     margin-bottom: 20px;">
                    Please visit zilesco.com to continue your journey!
                </p>

                <p style="float:left; width:100%; text-align: center;color: #198754; font-size: 16px; font-weight: 500; line-height: 21px;     margin-bottom: 20px;">
                <a href="<?= base_url('how-it-works');?>" style="display: inline-block; width:25%; color: #198754;">Login</a><a href="#" style="display: inline-block; width:25%; color: #198754;">Join Us</a><a href="<?= base_url('how-it-works');?>" style="display: inline-block; width:25%; color: #198754;">How it Works</a><a href="#" style="display: inline-block;color: #198754;  width:25%;">T & C's</a>
                </p>
            </div>
        </div>
        <div style="background: #55415e; float: left; width:100%; text-align: center; position: relative; text-align: center; padding: 10px">
        <h5 style="color: #ffffff;">zilesco</h5>
        <p style="color: #ffffff;  font-size: 16px;  margin-bottom: 0;   line-height: 22px;">Level 19, Boulevard Plaza, Tower 2</br>
            Burj Boulevard, Downtown Dubai</p>
            <span style="color: #ffffff;">&copy; 2022 zilesco. All rights reserved</span>
        </div>
        <p style="float:left; width:100%; text-align: center;color: #198754; font-size: 16px; font-weight: 500; line-height: 21px;     margin-bottom: 20px; padding:10px;">
        <a href="#" style="display: inline-block; width:33.33%; color: #198754; text-decoration: none;"><i class="fa fa-phone"></i> +971 4 368 0894</a><a href="mailto:info@zilesco.com." style="display: inline-block; width:33.33%; color: #198754; text-decoration: none"><i class="fa fa-envelope"></i> info@zilesco.com</a><a href="<?= base_url('');?>" style="display: inline-block; width:33.33%; color: #198754; text-decoration: none"><i class="fa fa-globe"></i> www.zilesco.com</a>
        </p>
    </div>
</body>

</html>