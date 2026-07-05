<?php
session_start();
//echo $_SESSION['id'];
//$_SESSION['msg'];
include("dbconnection.php");
include("checklogin.php");
check_login();
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
<link href="assets/plugins/bootstrap-wysihtml5/bootstrap-wysihtml5.css" rel="stylesheet" type="text/css"/>
<link href="assets/plugins/boostrapv3/css/bootstrap.min.css" rel="stylesheet" type="text/css"/>
<link href="assets/plugins/boostrapv3/css/bootstrap-theme.min.css" rel="stylesheet" type="text/css"/>
<link href="assets/plugins/font-awesome/css/font-awesome.css" rel="stylesheet" type="text/css"/>
<link href="assets/css/animate.min.css" rel="stylesheet" type="text/css"/>
<link href="assets/plugins/jquery-scrollbar/jquery.scrollbar.css" rel="stylesheet" type="text/css"/>
<link href="assets/css/style.css" rel="stylesheet" type="text/css"/>
<link href="assets/css/responsive.css" rel="stylesheet" type="text/css"/>
<link href="assets/css/custom-icon-set.css" rel="stylesheet" type="text/css"/>
<link href="assets/css/resolvehub.css" rel="stylesheet" type="text/css"/>
<!-- END CSS TEMPLATE -->
</head>
<!-- END HEAD -->
<!-- BEGIN BODY -->
<body class="">
<?php include("header.php");?>
<div class="page-container row-fluid"> 
  <?php include("leftbar.php");?>
  <div class="clearfix"></div>
  <a href="#" class="scrollup">Scroll</a>

  <div class="page-content"> 
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
          <p>Home</p>
        </li>
        <li><a href="#" class="active">View Ticket</a></li>
      </ul>
      <div class="page-title"> <i class="icon-custom-left"></i>
        <h3>Ticket Support</h3>
      </div>
      <div class="clearfix"></div>

      <h4> <span class="semi-bold">Tickets</span></h4>
      <br>
      <?php
      $rt=mysqli_query($con,"select * from ticket where email_id='".$_SESSION['login']."'");
      $num=mysqli_num_rows($rt);
      if($num>0){
        while($row=mysqli_fetch_array($rt)){
      ?>
      <div class="row">
        <div class="col-md-12">
          <div class="grid simple no-border ticket-card <?php echo 'status-'.str_replace(' ','-',strtolower($row['status']));?>">
            <div class="grid-title no-border descriptive clickable" role="button" aria-controls="ticket-body-<?php echo $row['ticket_id'];?>" aria-expanded="false">
              <div style="display:flex;align-items:center;justify-content:space-between;width:100%">
                <div style="flex:1">
                  <h4 class="semi-bold"><?php echo $row['subject'];?></h4>
                  <p style="margin:0"><span class="text-success bold">Ticket #<?php echo $row['ticket_id'];?></span> - Created on <?php echo $row['posting_date'];?> <span class="label label-important"><?php echo $row['status'];?></span></p>
                </div>
                <div style="margin-left:12px;display:flex;align-items:center">
                  <button class="toggle-btn" aria-label="Toggle details for ticket <?php echo $row['ticket_id'];?>" aria-expanded="false" aria-controls="ticket-body-<?php echo $row['ticket_id'];?>">
                    <i class="fa fa-chevron-down toggle-icon" aria-hidden="true"></i>
                  </button>
                  <div class="actions" style="margin-left:8px"> <a class="view open-modal" href="#" data-ticket-id="<?php echo $row['ticket_id'];?>"><i class="fa fa-search"></i></a>  </div>
                </div>
              </div>
            </div>
            <div id="ticket-body-<?php echo $row['ticket_id'];?>" class="grid-body no-border" style="display:none">
              <div class="post">
                <div class="user-profile-pic-wrapper">
                  <div class="user-profile-pic-normal"> <img width="35" height="35" data-src-retina="assets/img/user.png" data-src="assets/img/user.png" src="assets/img/user.png" alt=""> </div>
                </div>
                <div class="info-wrapper">
                  <div class="info"><?php echo $row['ticket'];?> </div>
                  <div class="clearfix"></div>
                </div>
                <div class="clearfix"></div>
              </div>
              <br>
              <?php if($row['admin_remark']!=''):?>
              <div class="form-actions">
                <div class="post col-md-12">
                  <div class="user-profile-pic-wrapper">
                    <div class="user-profile-pic-normal"> <img width="35" height="35" data-src-retina="assets/img/admin.png" data-src="assets/img/admin.png" src="assets/img/admin.png" alt="Admin"> </div>
                  </div>
                  <div class="info-wrapper">
                    <br>
                    <?php echo $row['admin_remark'];?>
                    <hr>
                    <p class="small-text">Posted on <?php echo $row['admin_remark_date'];?></p>
                  </div>
                  <div class="clearfix"></div>
                </div>
                <div class="clearfix"></div>
              </div>
              <?php endif;?>
            </div>
          </div>
        </div>
      </div>
      <?php }
      } else {
        // If no records, show a local-only demo ticket for preview purposes
        $isLocal = in_array($_SERVER['REMOTE_ADDR'], array('127.0.0.1','::1'));
        if ($isLocal) {
          $demo = array(
            'ticket_id' => 'DEMO01',
            'subject' => 'Demo: Sample Ticket to Preview UI',
            'posting_date' => date('Y-m-d'),
            'status' => 'Open',
            'ticket' => "This is a demonstration ticket created for local UI preview. Replace or remove in production.",
            'admin_remark' => 'Admin reply: Demo remark for preview.',
            'admin_remark_date' => date('Y-m-d')
          );
      ?>
      <div class="row">
        <div class="col-md-12">
          <div class="grid simple no-border ticket-card <?php echo 'status-'.str_replace(' ','-',strtolower($demo['status']));?>">
            <div class="grid-title no-border descriptive clickable" role="button" aria-controls="ticket-body-<?php echo $demo['ticket_id'];?>" aria-expanded="false">
              <div style="display:flex;align-items:center;justify-content:space-between;width:100%">
                <div style="flex:1">
                  <h4 class="semi-bold"><?php echo $demo['subject'];?></h4>
                  <p style="margin:0"><span class="text-success bold">Ticket #<?php echo $demo['ticket_id'];?></span> - Created on <?php echo $demo['posting_date'];?> <span class="label label-important"><?php echo $demo['status'];?></span></p>
                </div>
                <div style="margin-left:12px;display:flex;align-items:center">
                  <button class="toggle-btn" aria-label="Toggle details for ticket <?php echo $demo['ticket_id'];?>" aria-expanded="false" aria-controls="ticket-body-<?php echo $demo['ticket_id'];?>">
                    <i class="fa fa-chevron-down toggle-icon" aria-hidden="true"></i>
                  </button>
                  <div class="actions" style="margin-left:8px"> <a class="view open-modal" href="#" data-ticket-id="<?php echo $demo['ticket_id'];?>"><i class="fa fa-search"></i></a>  </div>
                </div>
              </div>
            </div>
            <div id="ticket-body-<?php echo $demo['ticket_id'];?>" class="grid-body no-border" style="display:none">
              <div class="post">
                <div class="user-profile-pic-wrapper">
                  <div class="user-profile-pic-normal"> <img width="35" height="35" data-src-retina="assets/img/user.png" data-src="assets/img/user.png" src="assets/img/user.png" alt=""> </div>
                </div>
                <div class="info-wrapper">
                  <div class="info"><?php echo $demo['ticket'];?> </div>
                  <div class="clearfix"></div>
                </div>
                <div class="clearfix"></div>
              </div>
              <br>
              <div class="form-actions">
                <div class="post col-md-12">
                  <div class="user-profile-pic-wrapper">
                    <div class="user-profile-pic-normal"> <img width="35" height="35" data-src-retina="assets/img/admin.png" data-src="assets/img/admin.png" src="assets/img/admin.png" alt="Admin"> </div>
                  </div>
                  <div class="info-wrapper">
                    <br>
                    <?php echo $demo['admin_remark'];?>
                    <hr>
                    <p class="small-text">Posted on <?php echo $demo['admin_remark_date'];?></p>
                  </div>
                  <div class="clearfix"></div>
                </div>
                <div class="clearfix"></div>
              </div>
            </div>
          </div>
        </div>
      </div>
      <?php
        } else {
          echo '<h3 align="center" style="color:red;">No Record found</h3>';
        }
      } ?>

    </div>
  </div>
</div>
<!-- BEGIN CHAT --> 

</div>
<!-- END CONTAINER -->
<!-- Ticket detail modal -->
<div class="modal fade" id="ticketModal" tabindex="-1" role="dialog" aria-labelledby="ticketModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-lg" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="ticketModalLabel">Ticket Details</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body" id="ticketModalBody">
        <!-- ticket content injected here -->
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
      </div>
    </div>
  </div>
</div>

<!-- BEGIN CORE JS FRAMEWORK-->
<script src="assets/plugins/jquery-1.8.3.min.js" type="text/javascript"></script>
<script src="assets/plugins/jquery-ui/jquery-ui-1.10.1.custom.min.js" type="text/javascript"></script>
<script src="assets/plugins/bootstrap/js/bootstrap.min.js" type="text/javascript"></script>
<script src="assets/plugins/breakpoints.js" type="text/javascript"></script>
<script src="assets/plugins/jquery-unveil/jquery.unveil.min.js" type="text/javascript"></script>
<script src="assets/plugins/jquery.blockui.js" type="text/javascript"></script>
<!-- END CORE JS FRAMEWORK -->
<!-- BEGIN PAGE LEVEL JS -->
<script src="assets/plugins/pace/pace.min.js" type="text/javascript"></script>
<script src="assets/plugins/jquery-scrollbar/jquery.scrollbar.min.js" type="text/javascript"></script>
<script src="assets/plugins/jquery-numberAnimate/jquery.animateNumbers.js" type="text/javascript"></script>
<script src="assets/plugins/bootstrap-wysihtml5/wysihtml5-0.3.0.js" type="text/javascript"></script>
<script src="assets/plugins/bootstrap-wysihtml5/bootstrap-wysihtml5.js" type="text/javascript"></script>
<script src="assets/plugins/jquery-validation/js/jquery.validate.min.js" type="text/javascript"></script>
<!-- END PAGE LEVEL PLUGINS -->
<script src="assets/js/support_ticket.js" type="text/javascript"></script>
<!-- BEGIN CORE TEMPLATE JS -->
<script src="assets/js/core.js" type="text/javascript"></script>
<script src="assets/js/chat.js" type="text/javascript"></script> 
<script src="assets/js/demo.js" type="text/javascript"></script>
<!-- END CORE TEMPLATE JS -->
</body>
</html>