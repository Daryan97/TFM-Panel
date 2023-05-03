<?php
require_once 'langs/lang_driver.php';
require_once 'includes/userinfo.inc.php';
require 'header.php';
echo '<title>' . item("site", "siteName") . ' | ' . item("main", "locked") . '</title>';
echo '
<body class="hold-transition lockscreen">
<div class="lockscreen-wrapper">
  <div class="lockscreen-logo">
    <a href="/">' . item("site", "siteNameHTML") . '</a>
  </div>
  <div class="lockscreen-name">' . $fullname . '</div>

  <div class="lockscreen-item">
    <div class="lockscreen-image">
      <img src="' . $image . '" alt="User Image">
    </div>

    <form class="lockscreen-credentials" action="includes/unlock.inc.php" method="post">
      <div class="input-group">
        <input type="hidden" class="form-control" name="username" value="' . $fullname . '">
        <input type="password" class="form-control" placeholder="'.item("main", "current").' '.item("main", "password").'" name="password">
          <button type="submit" class="btn" name="unlock"><i class="fas fa-arrow-right"></i></button>
      </div>
    </form>

  </div>
  <div class="help-block text-center">
   ' . item("main", "enterPass") . '
  </div>
  <div class="text-center">
    <a href="/logout.php">' . item("main", "or") . ' ' . item("main", "logout") . '</a>
  </div>
  <div class="lockscreen-footer text-center">
    ' . item("site", "copyright") . ' &copy; 2020 <b><a href="/" class="text-black">' . item("site", "siteName") . '</a></b><br>
    ' . item("site", "rightsReserved") . '
  </div>
</div>
</body>
';