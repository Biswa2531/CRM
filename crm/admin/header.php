<?php
if (session_status() !== PHP_SESSION_ACTIVE) {
  session_start();
}
// Compute a reliable previous page URL: prefer HTTP_REFERER, then session-stored last page, else default to home.php
$prev_page = '';
if (!empty($_SERVER['HTTP_REFERER'])) {
  $prev_page = $_SERVER['HTTP_REFERER'];
} elseif (!empty($_SESSION['prev_page'])) {
  $prev_page = $_SESSION['prev_page'];
} else {
  $prev_page = 'home.php';
}
// Store current page as last page for the next request
$scheme = (!empty($_SERVER['HTTPS']) && $_SERVER['HTTPS'] !== 'off') ? 'https' : 'http';
$current_full = $scheme . '://' . ($_SERVER['HTTP_HOST'] ?? '') . ($_SERVER['REQUEST_URI'] ?? '');
$_SESSION['prev_page'] = $current_full;
?>
<div class="header navbar navbar-inverse ">
  <style>
    /* Force header gradient and white brand color (highest priority) */
    .header { left: 0; right: 0; z-index: 1000; }
    .header .navbar-inner {
      background: linear-gradient(135deg, #10213f 0%, #155eef 58%, #00a878 100%) !important;
      color: #fff !important;
      border: 0 !important;
      box-shadow: none !important;
    }
    .header .navbar-inner:before,
    .header .navbar-inner:after { display: none !important; }
    .header-seperation { background: linear-gradient(135deg, #10213f 0%, #155eef 58%, #00a878 100%) !important; }
    .resolvehub-brand { color: #ffffff !important; }
    /* remove any thin borders at the seam */
    .page-sidebar { border-right: 0 !important; }
    /* Make the page title back icon appear clickable */
    .icon-custom-left { cursor: pointer; }
  </style>
  <div class="navbar-inner">
    <div class="header-seperation">
      <ul class="nav pull-left notifcation-center" id="main-menu-toggle-wrapper" style="display:none">
        <li class="dropdown"> <a id="main-menu-toggle" href="#main-menu"  class="" >
          <div class="iconset top-menu-toggle-white"></div>
          </a> </li>
      </ul>
      <a href="home.php" class="resolvehub-brand">ResolveHub <span>Admin</span></a>
      <ul class="nav pull-right notifcation-center">
        
      
      </ul>
    </div>
    <div class="header-quick-nav" >
      <div class="pull-left">
        
        <ul class="nav quick-section">
          
        </ul>
      </div>
      <div class="pull-right">
  
        <ul class="nav quick-section ">
          <li class="quicklinks"> <a data-toggle="dropdown" class="dropdown-toggle  pull-right " href="#" id="user-options">
            <div class="iconset top-settings-dark "></div>
            </a>
            <ul class="dropdown-menu  pull-right" role="menu" aria-labelledby="user-options">
              <li class="divider"></li>
              <li><a href="logout.php"><i class="fa fa-power-off"></i>&nbsp;&nbsp;Log Out</a></li>
            </ul>
          </li>
         
        </ul>
      </div>
      <!-- END CHAT TOGGLER -->
    </div>
    <!-- END TOP NAVIGATION MENU -->
  </div>
  <!-- END TOP NAVIGATION BAR -->
</div>
<!-- END HEADER -->
  <script>
    // Make any page-title back icon act as a 'go back' control across the admin
    document.addEventListener('DOMContentLoaded', function () {
      // Prev page exposed from PHP session for robust navigation
      var prev = '<?php echo addslashes($prev_page); ?>';
      var els = document.querySelectorAll('.icon-custom-left');
      els.forEach(function (el) {
        el.setAttribute('title', 'Go back');
        el.addEventListener('click', function () {
          try {
            if (prev && prev !== '' && prev !== window.location.href) {
              window.location = prev;
              return;
            }
          } catch (e) {
            // ignore
          }
          if (window.history && window.history.length > 1) {
            window.history.back();
            return;
          }
          window.location = 'home.php';
        });
      });
    });
  </script>