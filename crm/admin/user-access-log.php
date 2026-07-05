<?php
session_start();
include("dbconnection.php");
include("checklogin.php");
check_login();

// Ensure a CSRF token exists for POST actions
if (empty($_SESSION['csrf_token'])) {
  $_SESSION['csrf_token'] = bin2hex(random_bytes(32));
}

// Handle secure delete of access log entries
if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['delete_log'])) {
  if (empty($_POST['csrf_token']) || !hash_equals($_SESSION['csrf_token'], $_POST['csrf_token'])) {
    die('Invalid CSRF token');
  }
  $delid = intval($_POST['id']);
  mysqli_query($con, "DELETE FROM usercheck WHERE id=" . $delid);
  header('Location: user-access-log.php');
  exit;
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
<link href="../assets/plugins/bootstrap-select2/select2.css" rel="stylesheet" type="text/css" media="screen"/>
<link href="../assets/plugins/jquery-datatable/css/jquery.dataTables.css" rel="stylesheet" type="text/css"/>
<link href="../assets/plugins/datatables-responsive/css/datatables.responsive.css" rel="stylesheet" type="text/css" media="screen"/>
<link href="../assets/plugins/boostrapv3/css/bootstrap.min.css" rel="stylesheet" type="text/css"/>
<link href="../assets/plugins/boostrapv3/css/bootstrap-theme.min.css" rel="stylesheet" type="text/css"/>
<link href="../assets/plugins/font-awesome/css/font-awesome.css" rel="stylesheet" type="text/css"/>
<link href="../assets/css/animate.min.css" rel="stylesheet" type="text/css"/>
<link href="../assets/plugins/jquery-scrollbar/jquery.scrollbar.css" rel="stylesheet" type="text/css"/>
<link href="../assets/css/style.css" rel="stylesheet" type="text/css"/>
<link href="../assets/css/responsive.css" rel="stylesheet" type="text/css"/>
<link href="../assets/css/custom-icon-set.css" rel="stylesheet" type="text/css"/>
<link href="../assets/css/resolvehub.css" rel="stylesheet" type="text/css"/>
</head>
<body class="">
<?php include("header.php");?>
<div class="page-container row"> 
  
      <?php include("leftbar.php");?>
    
      <div class="clearfix"></div>
      <!-- END SIDEBAR MENU -->
    </div>
  </div>
  <div class="page-content">
    <!-- BEGIN SAMPLE PORTLET CONFIGURATION MODAL FORM-->
    <div id="portlet-config" class="modal hide">
      <div class="modal-header">
        <button data-dismiss="modal" class="close" type="button"></button>
        <h3>Widget Settings</h3>
      </div>
      <div class="modal-body"> Widget settings form goes here </div>
    </div>
    <div class="clearfix"></div>
    <div class="content">
      <ul class="breadcrumb">
        <li>
          <p>YOU ARE HERE</p>
        </li>
        <li><a href="#" class="active">Access Log</a> </li>
      </ul>
      <div class="page-title"> <i class="icon-custom-left"></i>
        <h3>Manage Access Log</h3>
      </div>
      <div class="row-fluid">
        <div class="span12">
          <div class="grid simple ">
            <div class="grid-title">
              <h4>Table <span class="semi-bold">Styles</span></h4>
              <div class="tools"> <a href="javascript:;" class="collapse"></a> <a href="#grid-config" data-toggle="modal" class="config"></a> <a href="javascript:;" class="reload"></a> <a href="javascript:;" class="remove"></a> </div>
            </div>
            <div class="grid-body ">
              <table class="table table-hover table-condensed" id="example">
                <thead>
                  <tr>
                    <th style="width:1%">#Uid</th>
                    <th style="width:10%">User Name</th>
                      <th style="width:10%">Email </th>
                             <th style="width:18%">Login date | Login Time </th>
                    <th style="width:10%" data-hide="phone,tablet">IP</th>
                    <th style="width:15%">Mac id</th>
                    <th style="width:12%" data-hide="phone,tablet">City </th>
                    <th style="width:10%">Country </th>
                    <th style="width:8%">Action</th>
                  </tr>
                </thead>
                <tbody>
                <?php $ret=mysqli_query($con,"select * from usercheck ");
				$cnt=1;
				while($row=mysqli_fetch_array($ret))
				{?>
                  <tr >
                    <td class="v-align-middle"><?php echo $row['user_id'];?></td>
                    <td class="v-align-middle"><?php echo $row['username'];?></td>
                               <td class="v-align-middle"><?php echo $row['email'];?></td>
                               <td class="v-align-middle"><?php echo $row['logindate'];?> | <?php echo $row['logintime'];?> </td>
                    <td class="v-align-middle"><span class="muted"><?php echo $row['ip'];?></span></td>
                    <td><span class="muted"><?php echo $row['mac'];?></span></td>
                    <td class="v-align-middle"><?php echo $row['city'];?>
                    </td>
                      <td><?php echo $row['country'];?></td>
                      <td>
                        <form method="post" style="display:inline;" onsubmit="return confirm('Delete this access log entry?');">
                          <input type="hidden" name="id" value="<?php echo $row['id'];?>" />
                          <input type="hidden" name="csrf_token" value="<?php echo $_SESSION['csrf_token'];?>" />
                          <button type="submit" name="delete_log" class="btn btn-danger btn-xs">Delete</button>
                        </form>
                      </td>
                  </tr>
                 <?php $cnt=$cnt+1; } ?>
                </tbody>
              </table>
            </div>
          </div>
        </div>
      </div>
     </div>
      
    <div class="addNewRow"></div>
  </div>
<!-- BEGIN CHAT --> 
    
</div>
<script src="../assets/plugins/jquery-1.8.3.min.js" type="text/javascript"></script>
<script src="../assets/plugins/jquery-ui/jquery-ui-1.10.1.custom.min.js" type="text/javascript"></script>
<script src="../assets/plugins/boostrapv3/js/bootstrap.min.js" type="text/javascript"></script>
<script src="../assets/plugins/breakpoints.js" type="text/javascript"></script>
<script src="../assets/plugins/jquery-unveil/jquery.unveil.min.js" type="text/javascript"></script>
<script src="../assets/plugins/jquery-scrollbar/jquery.scrollbar.min.js" type="text/javascript"></script>    
<script src="../assets/plugins/jquery.blockui.js" type="text/javascript"></script>
<script src="../assets/plugins/jquery-numberAnimate/jquery.animateNumbers.js" type="text/javascript"></script>
<script src="../assets/plugins/bootstrap-select2/select2.min.js" type="text/javascript"></script>
<script src="../assets/plugins/jquery-datatable/js/jquery.dataTables.min.js" type="text/javascript" ></script>
<script src="../assets/plugins/jquery-datatable/extra/js/dataTables.tableTools.min.js" type="text/javascript" ></script>
<script type="text/javascript" src="../assets/plugins/datatables-responsive/js/datatables.responsive.js"></script>
<script type="text/javascript" src="../assets/plugins/datatables-responsive/js/lodash.min.js"></script>
<script src="../assets/js/datatables.js" type="text/javascript"></script>
<script src="../assets/js/core.js" type="text/javascript"></script>
<script src="../assets/js/chat.js" type="text/javascript"></script>
<script src="../assets/js/demo.js" type="text/javascript"></script>
</body>
</html>
