<?php
require_once 'langs/lang_driver.php';
require_once 'header.php';
require 'includes/userinfo.inc.php';
echo '<title>' . item("site", "siteName") . ' | ' . $username . '#' . $tag . '</title>';
require 'sidebar.php';
?>
<?php

echo '<div class="content-wrapper">
        <section class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1>' . item("main", "home") . '</h1>
                    </div>
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item active">' . item("main", "dashboard") . '</li>
                            <li class="breadcrumb-item active">' . item("main", "home") . '</li>
                        </ol>
                    </div>
                </div>
        </section>

        <section class="content">
        <div class="container-fluid">
            <div class="row">
            <div class="col-md-12">
                        <div class="card card-dark">
              <div class="card-header">
                <h3 class="card-title">
                  <i class="fas fa-home mr-1"></i>
                  ' . item("main", "hello") . $username . '
                </h3>
              </div>
              <div class="card-body">
                  <div class="row">
                    <div class="col text-center banner-home">
                          <img class="profile-user-img img-fluid img-circle" src="' . $image . '" alt="">
                          <h3 class="profile-username">' . $fullname . '</h3>
                          ' . $privIcon . '
                    </div>
                    <div class="col">
                      <p>'.item("main", "todayIs").' ' . gmdate("M d, Y h:i A \G\M\T", time()) . '</p>
                      <p>'.item("main", "timePlayed").': ' . $hours . 'h ' . $minutes . 'm ' . $seconds .'s</p>
                      <b>' . item("main", "randomQuote") . ':</b>
                      <p>'; require 'includes/quotes.inc.php'; echo '</p>
                    </div>
                  </div>
              </div>
              <div class="card-footer bg-transparent">
                <div class="row text-center">
                  <div class="col-sm-3 text-center mb-2">
                    <div id="sparkline-1"></div>
                    <a class="btn btn-outline-dark pr-lg-5 pl-lg-5" href="/profile/details.php"><i class="fas fa-edit"></i> ' . item("main", "details") . '</a>
                  </div>
                  <div class="col-sm-3 text-center mb-2">
                    <div id="sparkline-1"></div>
                    <a class="btn btn-outline-dark pr-lg-5 pl-lg-5" href="/profile/stats.php"><i class="fas fa-star"></i> ' . item("main", "stats") . '</a>
                  </div>
                  <div class="col-sm-3 text-center mb-2">
                    <div id="sparkline-1"></div>
                    <a class="btn btn-outline-dark pr-lg-5 pl-lg-5" href="/profile/avatar.php"><i class="fas fa-camera"></i> ' . item("main", "avatar") . '</a>
                  </div>
                  <div class="col-sm-3 text-center">
                    <div id="sparkline-1"></div>
                    <a class="btn btn-outline-dark pr-lg-5 pl-lg-5" href="/cafe/topics.php"><i class="fas fa-coffee"></i> ' . item("main", "cafe") . '</a>
                  </div>
                </div>
              </div>
            </div>
            </div>
            <div class="col-md-4">
                <div class="card card-lime">';
                 require 'includes/staffCard.inc.php';
                 echo '<div class="card-footer text-center" style="display: block;">
                    <a href="staff.php">' . item("main", "viewAll") . '</a>
                  </div>
                  </div>
                </div>
                  <div class="col-md-4">
                    <div class="card card-warning">
                    <div class="card-header">
                        <h3 class="card-title">
                        <i class="nav-icon fas fa-coffee"></i>
                        ' . item("main", "cafe") . ' ' . item("main", "topics") . '
                        </h3>
                        <div class="card-tools">
                            <button type="button" class="btn btn-tool" data-card-widget="collapse"><i class="fas fa-minus"></i>
                            </button>
                        </div>
                    </div>
                    <div class="card-body">
                        <table class="table">
                            <tbody>';
                    require 'includes/cafeCard.inc.php';
                    echo '</tbody>
                            </table>
                    </div>
                    <div class="card-footer text-center" style="display: block;">
                        <a href="cafe/topics.php">' . item("main", "viewAll") . '</a>
                    </div>
                  </div>
                </div>
                <div class="col-md-4">
                    <div class="card card-orange">
                    <div class="card-header">
                        <h3 class="card-title">
                            <i class="fas fa-rss-square"></i>
                            ' . item("main", "recentPosts") . '
                        </h3>
                        <div class="card-tools">
                            <button type="button" class="btn btn-tool" data-card-widget="collapse"><i class="fas fa-minus"></i>
                            </button>
                        </div>
                    </div>
                    <div class="card-body">';
                 require 'includes/rssfeed.inc.php';
                    echo '
                    </div>
                    <div class="card-footer text-center" style="display: block;">
                        <a href="' . item("links", "url") . '">' . item("main", "viewAll") . '</a>
                    </div>
                  </div>
</div>
            </div>
       </div>
        </section>
    </div>';
?>
<?php
require 'footer.php';
?>