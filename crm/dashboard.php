<?php
session_start();
include("checklogin.php");
check_login();
include("dbconnection.php");
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
<link href="assets/plugins/jquery-scrollbar/jquery.scrollbar.css" rel="stylesheet" type="text/css"/>
<link href="assets/css/style.css" rel="stylesheet" type="text/css"/>
<link href="assets/css/responsive.css" rel="stylesheet" type="text/css"/>
<link href="assets/css/custom-icon-set.css" rel="stylesheet" type="text/css"/>
<link href="assets/css/resolvehub.css?v=20260706-menu1" rel="stylesheet" type="text/css"/>
</head>
<body class="dashboard-page">
<?php include("header.php");?>
<div class="page-container row-fluid">	
	<?php include("leftbar.php");?>
	<div class="clearfix"></div>
  <a href="#" class="scrollup">Scroll</a>
   <div class="footer-widget">		
	<div class="progress transparent progress-small no-radius no-margin">
		<div data-percentage="79%" class="progress-bar progress-bar-success animate-progress-bar" ></div>		
	</div>
	<div class="pull-right">
	</div>
  </div>
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
		<div class="page-title">	
			<h3>Dashboard</h3>	
            <div class="row 2col">
          <div class="col-md-3 col-sm-6 spacing-bottom-sm spacing-bottom">
            <div class="tiles blue added-margin">
              <div class="tiles-body">
                <div class="controller"> <a href="javascript:;" class="reload"></a> <a href="javascript:;" class="remove"></a> </div>
                <?php $ret=mysqli_query($con,"select * from ticket where email_id='".$_SESSION['login']."'");
				$num=mysqli_num_rows($ret);
				?>
                <div class="heading"> <span class="animate-number" data-value="<?php echo $num;?>" data-animation-duration="1200">0</span>| <a href="view-tickets.php" style="color:#FFF"> View Tickets </a></div>
                
                <div class="progress transparent progress-small no-radius">
                  <div class="progress-bar progress-bar-white animate-progress-bar" data-percentage="26.8%"></div>
                </div>
             
              </div>
            </div>
          </div>
          <div class="col-md-3 col-sm-6 spacing-bottom-sm spacing-bottom">
            <div class="tiles green added-margin">
              <div class="tiles-body">
                <div class="controller"> <a href="javascript:;" class="reload"></a> <a href="javascript:;" class="remove"></a> </div>
               
                <div class="heading"> <span class="fa fa-ticket"></span>
                <a href="get-quote.php" style="color:#FFF">Get Quote</a>
                 </div>
                <div class="progress transparent progress-small no-radius">
                  <div class="progress-bar progress-bar-white animate-progress-bar" data-percentage="79%" ></div>
                </div>
               
              </div>
            </div>
          </div>
          <div class="col-md-3 col-sm-6 spacing-bottom">
            <div class="tiles red added-margin">
              <div class="tiles-body">
                <div class="controller"> <a href="javascript:;" class="reload"></a> <a href="javascript:;" class="remove"></a> </div>
             
                <div class="heading">  <span class="fa fa-user"></span>
                 <a href="profile.php" style="color:#FFF">My Profile</a>
                 </div>
                <div class="progress transparent progress-white progress-small no-radius">
                  <div class="progress-bar progress-bar-white animate-progress-bar" data-percentage="45%" ></div>
                </div>
               
              </div>
            </div>
          </div>
          <div class="col-md-3 col-sm-6">
            <div class="tiles purple added-margin">
              <div class="tiles-body">
                <div class="controller"> <a href="javascript:;" class="reload"></a> <a href="javascript:;" class="remove"></a> </div>
                
                <div class="row-fluid">
                  <div class="heading"> <span class="fa fa-ticket"></span>
                  <a href="create-ticket.php" style="color:#FFF">Create </a>
                   </div>
                  <div class="progress transparent progress-white progress-small no-radius">
                    <div class="progress-bar progress-bar-white animate-progress-bar" data-percentage="12%"></div>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
        <div class="row visitor-graph-row">
          <div class="col-md-12">
            <div class="panel panel-default visitor-graph-panel">
              <div class="panel-heading">
                <h3 class="panel-title">Daily Visitor Graph</h3>
              </div>
              <div class="panel-body">
                <div id="dashboard-chart"></div>
              </div>
            </div>
          </div>
        </div>
            	
		</div>
    </div>
  </div>
  
  
  
</div>
 </div>
<script src="assets/plugins/jquery-1.8.3.min.js" type="text/javascript"></script> 
<script src="assets/plugins/jquery-ui/jquery-ui-1.10.1.custom.min.js" type="text/javascript"></script> 
<script src="assets/plugins/bootstrap/js/bootstrap.min.js" type="text/javascript"></script> 
<script src="assets/plugins/breakpoints.js" type="text/javascript"></script> 
<script src="assets/plugins/jquery-unveil/jquery.unveil.min.js" type="text/javascript"></script> 
<script src="assets/plugins/jquery.blockui.js" type="text/javascript"></script> 
<script src="assets/plugins/jquery-scrollbar/jquery.scrollbar.min.js" type="text/javascript"></script>
<script src="assets/plugins/pace/pace.min.js" type="text/javascript"></script>  
<script src="assets/plugins/jquery-numberAnimate/jquery.animateNumbers.js" type="text/javascript"></script>
<script src="assets/js/core.js" type="text/javascript"></script> 
<script src="assets/js/chat.js" type="text/javascript"></script> 
<script src="assets/js/demo.js" type="text/javascript"></script> 
<script type="text/javascript" src="admin/js/highcharts.js"></script>
<script type="text/javascript" src="admin/js/exporting.js"></script>
<?php
$month_array = array();
$totaldays = cal_days_in_month(CAL_GREGORIAN, date("m"), date("Y"));
for ($i = 1; $i <= $totaldays; $i++) {
    $month_array[sprintf('%02d', $i)] = 0;
}
$results = mysqli_query($con, "SELECT logindate FROM usercheck");
if ($results && mysqli_num_rows($results) > 0) {
    while ($row = mysqli_fetch_row($results)) {
        $user_date = $row[0];
        $dateArray = explode('/', $user_date);
        if (count($dateArray) === 3) {
            $year = $dateArray[0];
            $month = $dateArray[1];
            $day = $dateArray[2];
            if ($year == date("Y") && $month == date("m") && array_key_exists($day, $month_array)) {
                $month_array[$day]++;
            }
        }
    }
}
?>
<script type="text/javascript">
var chartCategories = [];
var chartData = [];
<?php foreach ($month_array as $day => $count) { ?>
chartCategories.push('Day <?php echo $day; ?>');
chartData.push(<?php echo $count; ?>);
<?php } ?>
document.addEventListener('DOMContentLoaded', function () {
    Highcharts.chart('dashboard-chart', {
        chart: {
            backgroundColor: 'transparent',
            spacing: [18, 18, 18, 18]
        },
        title: { text: 'Daily Visitors for <?php echo date("F Y"); ?>' },
        credits: { enabled: false },
        xAxis: {
            categories: chartCategories,
            tickInterval: 2
        },
        yAxis: {
            min: 0,
            allowDecimals: false,
            title: { text: 'Visitors Count' }
        },
        tooltip: { valueSuffix: ' Users' },
        plotOptions: {
            series: {
                color: '#174aa8',
                marker: { radius: 3 }
            }
        },
        series: [{ name: 'Visitors', data: chartData }]
    });
});
</script>
</body>
</html>
