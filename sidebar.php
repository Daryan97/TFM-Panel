<?php
require_once 'langs/langselected.php';
require_once 'langs/langselector.php';
require_once 'includes/userinfo.inc.php';
require_once 'includes/staffCount.inc.php';
if (!isset($_SESSION['user_id'])) {
    header('location: /login.php');
} elseif (isset($_SESSION['locked'])) {
    header('location: /locked.php');
}

echo '
<body class="hold-transition sidebar-mini">
<div class="wrapper">
  <nav class="main-header navbar navbar-expand navbar-white navbar-light">
    <ul class="navbar-nav">
      <li class="nav-item">
        <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i class="fas fa-bars"></i></a>
      </li>
      <li class="nav-item d-none d-sm-inline-block">
        <a href="/" class="nav-link">' . item("main", "home") . '</a>
      </li>
      <li class="nav-item d-none d-sm-inline-block">
        <a href="#" class="nav-link">' . item("main", "contact") . '</a>
      </li>
    </ul>
    <ul class="navbar-nav ml-auto">
      <li class="nav-item dropdown">
        <a class="nav-link" data-toggle="dropdown" href="#">
          <img src="/images/flags/' . $_SESSION['SYS_LANG'] . '.png">
        </a>
        <div class="dropdown-menu dropdown-menu-right p-0">
          <a href="?lang=en" class="dropdown-item ';
echo $english;
echo '"><img src="/images/flags/en.png"> English</a>
          <a href="?lang=es" class="dropdown-item ';
echo $spanish;
echo '"><img src="/images/flags/es.png"> Español</a>
          <div class="dropdown-divider"></div>
          <a href="#" class="dropdown-item">
            ' . item("main", "translateFooter") . '</a>
        </div>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="?lock=1" role="button">
          <i class="fas fa-lock"></i>
        </a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="/logout.php" role="button">
          <i class="fas fa-sign-out-alt"></i>
        </a>
      </li>
      
  </nav>

  <aside class="main-sidebar sidebar-dark-primary elevation-4 overflow-hidden">
  <div class="ribbon-wrapper"><div class="ribbon bg-info">Alpha</div></div>
    <a href="/" class="brand-link">
    <img src="/images/logo.png" alt="' . item("site", "siteName") . '" class="brand-image img-circle elevation-3">
      <span class="brand-text font-weight-light">' . item("site", "siteNameHTML") . '</span>
    </a>

    <div class="sidebar">
      <div class="user-panel mt-3 pb-3 mb-3 d-flex">
        <div class="image">';
echo '<img src="' . $image . '" class="profile-user-img img-circle p-0 profile-picture">
        </div>
        <div class="info">
          <a href="/profile/stats.php" class="d-block">' . $username . '#' . $tag . '</a>
        </div>
      </div>
      <nav class="mt-2">
        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
          <li class="nav-item has-treeview dashboard">
            <a href="#" class="nav-link">
              <i class="nav-icon fas fa-tachometer-alt"></i>
              <p>
                ' . item("main", "dashboard") . '
                <i class="right fas fa-angle-left"></i>
              </p>
            </a>
            <ul class="nav nav-treeview dashboard-items">
              <li class="nav-item">
                <a href="/" class="nav-link">
                  <i class="fas fa-home nav-icon"></i>
                  <p>' . item("main", "home") . '</p>
                </a>
              </li>
            </ul>
          </li>
          <li class="nav-item has-treeview">
            <a href="#" class="nav-link">
              <i class="nav-icon fas fa-address-card"></i>
              <p>
                ' . item("main", "profile") . '
                <i class="right fas fa-angle-left"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="/profile/stats.php" class="nav-link">
                  <i class="fas fa-star nav-icon"></i>
                  <p>' . item("main", "stats") . '</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="/profile/details.php" class="nav-link">
                  <i class="fas fa-info-circle nav-icon"></i>
                  <p>' . item("main", "detailsChange") . '</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="/profile/avatar.php" class="nav-link">
                  <i class="fas fa-camera nav-icon"></i>
                  <p>' . item("main", "avatarChange") . '</p>
                </a>
              </li>
            </ul>
          </li>
          <li class="nav-item has-treeview">
            <a href="#" class="nav-link">
              <i class="nav-icon fas fa-coffee"></i>
              <p>
                ' . item("main", "cafe") . '
                <i class="right fas fa-angle-left"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="/cafe/new.php" class="nav-link">
                  <i class="fas fa-plus nav-icon"></i>
                  <p>' . item("main", "createPost") . '</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="/cafe/topics.php" class="nav-link">
                  <i class="fas fa-list nav-icon"></i>
                  <p>' . item("main", "cafe") . ' ' . item("main", "topics") . '</p>
                </a>
              </li>
            </ul>
          </li>
          <li class="nav-item">
            <a href="/staff.php" class="nav-link">
              <i class="nav-icon fa fa-user-shield"></i>
              <p>
                ' . item("main", "staffMembers") . '
                <span class="badge badge-info right">' . staffCount($con) . '</span>
              </p>
            </a>
            </li>
          <li class="nav-header">' . item("main", "socialMedia") . '</li>
          <li class="nav-item">
            <a href="' . item("links", "discord") . '" class="nav-link" target="_blank">
              <i class="nav-icon fab fa-discord"></i>
              <p>
                Discord
              </p>
            </a>
            </li>
            <li class="nav-item">
            <a href="' . item("links", "facebook") . '" class="nav-link" target="_blank">
              <i class="nav-icon fab fa-facebook"></i>
              <p>
                Facebook
              </p>
            </a>
            </li>
            <li class="nav-item">
            <a href="' . item("links", "twitter") . '" class="nav-link" target="_blank">
              <i class="nav-icon fab fa-twitter"></i>
              <p>
                Twitter
              </p>
            </a>
          </li>
      </nav>
    </div>
  </aside>
';