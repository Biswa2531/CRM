<?php
session_start();
error_reporting();
include("dbconnection.php");
if(isset($_POST['submit']))
{
$row1=mysqli_query($con,"select email,password from user where email='".$_POST['email']."'");
$row2=mysqli_fetch_array($row1);
if($row2>0)
{
$email = $row2['email'];
$subject = " CRM about your password";
$password=$row2['password'];
$message = "Your password is ".$password;

// Load mail configuration
$mailConfig = [];
$configPath = __DIR__ . '/config/mail.php';
if (file_exists($configPath)) {
  $mailConfig = include $configPath;
}

// Prefer PHPMailer via Composer if available and configured to use SMTP
$sent = false;
$composerAutoload = __DIR__ . '/../vendor/autoload.php';
if (!empty($mailConfig['use_smtp']) && file_exists($composerAutoload)) {
  try {
    require_once $composerAutoload;
    // PHPMailer namespaced class
    $mail = new PHPMailer\PHPMailer\PHPMailer(true);
    if (!empty($mailConfig['host'])) {
      $mail->isSMTP();
      $mail->Host       = $mailConfig['host'];
      $mail->SMTPAuth   = true;
      $mail->Username   = $mailConfig['username'];
      $mail->Password   = $mailConfig['password'];
      $mail->SMTPSecure = !empty($mailConfig['encryption']) ? $mailConfig['encryption'] : '';
      $mail->Port       = !empty($mailConfig['port']) ? $mailConfig['port'] : 25;
      $mail->SMTPDebug  = !empty($mailConfig['smtp_debug']) ? (int)$mailConfig['smtp_debug'] : 0;
    }
    $fromEmail = !empty($mailConfig['from_email']) ? $mailConfig['from_email'] : 'no-reply@localhost';
    $fromName  = !empty($mailConfig['from_name']) ? $mailConfig['from_name'] : 'ResolveHub';
    $mail->setFrom($fromEmail, $fromName);
    $mail->addAddress($email);
    $mail->Subject = $subject;
    $mail->Body    = $message;
    $mail->AltBody = strip_tags($message);
    $sent = $mail->send();
  } catch (Exception $e) {
    // PHPMailer failed, fall back to mail() below
    $sent = false;
  }
}

// Fallback to PHP mail() if PHPMailer not used or failed
if (!$sent) {
  if (function_exists('mail')) {
    $headers = "From: " . (!empty($mailConfig['from_email']) ? $mailConfig['from_email'] : 'no-reply@localhost') . "\r\n" .
           "Reply-To: " . (!empty($mailConfig['from_email']) ? $mailConfig['from_email'] : 'no-reply@localhost') . "\r\n" .
           "X-Mailer: PHP/" . phpversion();
    $sent = @mail($email, $subject, $message, $headers);
  }
}

if ($sent) {
  $_SESSION['msg']= "Your Password has been sent to your email id Successfully.";
} else {
  $_SESSION['msg']= "Unable to send email from this server. Please contact the site administrator or try again later.";
}
}
else
{
$_SESSION['msg']= "*Email is not registered with us.";	
}
}
?>
<!DOCTYPE html>
<html>
<head>
<meta http-equiv="content-type" content="text/html;charset=UTF-8" />
<meta charset="utf-8" />
<title>ResolveHub &ndash; Customer Relationship Management System</title>
<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no" />
<meta content="" name="description" />
<meta content="" name="author" />
<link href="assets/plugins/pace/pace-theme-flash.css" rel="stylesheet" type="text/css" media="screen"/>
<link href="assets/plugins/boostrapv3/css/bootstrap.min.css" rel="stylesheet" type="text/css"/>
<link href="assets/plugins/boostrapv3/css/bootstrap-theme.min.css" rel="stylesheet" type="text/css"/>
<link href="assets/plugins/font-awesome/css/font-awesome.css" rel="stylesheet" type="text/css"/>
<link href="assets/css/animate.min.css" rel="stylesheet" type="text/css"/>
<link href="assets/css/style.css" rel="stylesheet" type="text/css"/>
<link href="assets/css/responsive.css" rel="stylesheet" type="text/css"/>
<link href="assets/css/custom-icon-set.css" rel="stylesheet" type="text/css"/>
<link href="assets/css/resolvehub.css" rel="stylesheet" type="text/css"/>

</head>
<body class="error-body no-top">
<div class="container">
  <div class="row login-container column-seperation">  
        <div class="col-md-5 col-md-offset-1">
          <h2>Forgot Password </h2>
          <p>
            <a href="registration.php">Sign up Now!</a> for a webarch account,It's free and always will be..</p>
          <br>

		   
        </div>
        <div class="col-md-5 "> <br>
        <p style="color:#F00; font-size:12px;">
            <?php
            if (!empty($_SESSION['msg'])) {
                echo $_SESSION['msg'];
                $_SESSION['msg'] = "";
            }
            ?>
        </p>
		 <form id="login-form" class="login-form" action="" method="post">
		 <div class="row">
		 <div class="form-group col-md-10">
            <label class="form-label">Username / Email</label>
            <div class="controls">
				<div class="input-with-icon  right">                                       
					<i class=""></i>
					<input type="text" name="email" id="txtusername" class="form-control">                                 
				</div>
            </div>
          </div>
          </div>
		
		 
          <div class="row">
            <div class="col-md-10">
              <button class="btn btn-primary btn-cons pull-right" name="submit" type="submit">submit</button>
            </div>
          </div>
		  </form>
        </div>
     
    
  </div>
</div>
<script src="assets/plugins/jquery-1.8.3.min.js" type="text/javascript"></script>
<script src="assets/plugins/bootstrap/js/bootstrap.min.js" type="text/javascript"></script>
<script src="assets/plugins/pace/pace.min.js" type="text/javascript"></script>
<script src="assets/plugins/jquery-validation/js/jquery.validate.min.js" type="text/javascript"></script>
<script src="assets/js/login.js" type="text/javascript"></script>
</body>
</html>