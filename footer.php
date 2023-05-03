<?php
echo '
 <footer class="main-footer">
    <div class="float-right d-none d-sm-block">
      <b>' . item("site", "version") . '</b> ' . item("site", "siteVersion") . '
    </div>
    <strong>' . item("site", "copyright") . ' &copy; 2020 <a href="#">' . item("site", "siteName") . '</a>.</strong> ' . item("main", "rightsReserved") . '
  </footer>

  <aside class="control-sidebar control-sidebar-dark">
  </aside>
</div>
</body>
</html>
';