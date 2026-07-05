<?php
session_start();
error_reporting(0);
include("dbconnection.php");
if(isset($_POST['login']))
{
$ret=mysqli_query($con,"SELECT * FROM user WHERE email='".$_POST['email']."' and password='".$_POST['password']."'");
$num=mysqli_fetch_array($ret);
if($num>0)
{
$_SESSION['login']=$_POST['email'];
$_SESSION['id']=$num['id'];
$_SESSION['name']=$num['name'];
$val3 =date("Y/m/d");
date_default_timezone_set("Asia/Calcutta");
$time=date("h:i:sa");
$tim = $time;
// Determine client IP (respect X-Forwarded-For if present)
$ip_address = '';
if (!empty($_SERVER['HTTP_X_FORWARDED_FOR'])) {
  // X-Forwarded-For may contain a list of IPs
  $parts = explode(',', $_SERVER['HTTP_X_FORWARDED_FOR']);
  $ip_address = trim($parts[0]);
}
if (empty($ip_address)) {
  $ip_address = $_SERVER['REMOTE_ADDR'] ?? '';
}

function is_private_ip($ip) {
  if ($ip === '::1') return true;
  if (!filter_var($ip, FILTER_VALIDATE_IP, FILTER_FLAG_IPV4)) return false;
  $long = ip2long($ip);
  $ranges = [
    ['10.0.0.0', '10.255.255.255'],
    ['172.16.0.0', '172.31.255.255'],
    ['192.168.0.0', '192.168.255.255'],
    ['127.0.0.0', '127.255.255.255'],
  ];
  foreach ($ranges as $r) {
    if ($long >= ip2long($r[0]) && $long <= ip2long($r[1])) return true;
  }
  return false;
}

$city = '';
$country = '';
if (is_private_ip($ip_address) || $ip_address === '') {
  // Localhost or private IPs often have no geolocation data
  $city = 'Localhost';
  $country = 'Localhost';
} else {
  // Try a lightweight public API (ip-api.com) with a short timeout via cURL
  if (function_exists('curl_init')) {
    $ch = curl_init('http://ip-api.com/json/' . urlencode($ip_address) . '?fields=status,city,country');
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
    curl_setopt($ch, CURLOPT_CONNECTTIMEOUT, 2);
    curl_setopt($ch, CURLOPT_TIMEOUT, 2);
    $resp = curl_exec($ch);
    curl_close($ch);
    $data = @json_decode($resp, true);
    if (!empty($data) && !empty($data['status']) && $data['status'] === 'success') {
      $city = $data['city'] ?? '';
      $country = $data['country'] ?? '';
    }
  }
  // fallback to geoplugin if cURL failed or not available
  if ($city === '' && function_exists('file_get_contents') && ini_get('allow_url_fopen')) {
    $geopluginURL = 'http://www.geoplugin.net/php.gp?ip=' . urlencode($ip_address);
    $addrDetailsArr = @unserialize(@file_get_contents($geopluginURL));
    $city = is_array($addrDetailsArr) ? ($addrDetailsArr['geoplugin_city'] ?? '') : '';
    $country = is_array($addrDetailsArr) ? ($addrDetailsArr['geoplugin_countryName'] ?? '') : '';
  }
}
ob_start();
@system('ipconfig /all');
$mycom=ob_get_contents();
ob_clean();
$findme = "Physical";
$pmac = strpos($mycom, $findme);
$mac = $pmac !== false ? substr($mycom,($pmac+36),17) : '';
$ret=mysqli_query($con,"insert into usercheck(logindate,logintime,user_id,username,email,ip,mac,city,country)values('".$val3."','".$tim."','".$_SESSION['id']."','".$_SESSION['name']."','".$_SESSION['login']."','$ip_address','$mac','$city','$country')");

$extra = !empty($_SESSION['redirect_url']) ? $_SESSION['redirect_url'] : 'dashboard.php';
unset($_SESSION['redirect_url']);
if (strpos($extra, '://') !== false || strpos($extra, '//') === 0 || preg_match('/login\.php|logout\.php/i', $extra)) {
    $extra = 'dashboard.php';
}
header('Location: '.$extra);
exit();
}
else
{
$_SESSION['action1']="Invalid username or password";
header('Location: login.php');
exit();
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
          <h2>Sign in to ResolveHub</h2>
          <p>
            <a href="registration.php">Sign up Now!</a> for a webarch account,It's free and always will be..</p>
          <br>

		   
        </div>
        <div class="col-md-5 "> <br>
             <p style="color:#F00"><?php echo $_SESSION['action1'];?><?php echo $_SESSION['action1']="";?></p>
		 <form id="login-form" class="login-form" action="" method="post">
		 <div class="row">
		 <div class="form-group col-md-10">
            <label class="form-label">Email</label>
            <div class="controls">
				<div class="input-with-icon  right">                                       
					<i class=""></i>
					<input type="email" name="email" id="txtusername" class="form-control" required="true">                                 
				</div>
            </div>
          </div>
          </div>
		  <div class="row">
          <div class="form-group col-md-10">
            <label class="form-label">Password</label>
            <span class="help"></span>
            <div class="controls">
				<div class="input-with-icon  right">                                       
					<i class=""></i>
					<input type="password" name="password" id="txtpassword" class="form-control" required="true">                                 
				</div>
            </div>
          </div>
          </div>
		  <div class="row">
          <div class="control-group  col-md-10">
            <div class="checkbox checkbox check-success"> <a href="forgot-password.php">Forgot Password </a>&nbsp;&nbsp;
         </div>
          </div>
          </div>
          <div class="row">
            <div class="col-md-10">
              <button class="btn btn-primary btn-cons pull-right" name="login" type="submit">Login</button>
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
