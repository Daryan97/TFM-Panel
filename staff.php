<?php
require_once 'langs/lang_driver.php';
require_once 'header.php';
echo '<title>' . item("site", "siteName") . ' | ' . item("main", "staff") . '</title>';
require 'sidebar.php';
?>
<?php

echo '<div class="content-wrapper">
        <section class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1>' . item("main", "staffMembers") . ' | <div class="badge badge-pill badge-primary">' . staffCount($con) . ' ' . item("main", "members") .'</div></h1>
                    </div>
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="/index.php">' . item("main", "home") . '</a></li>
                            <li class="breadcrumb-item active">' . item("main", "staff") . '</li>
                        </ol>
                    </div>
                </div>
        </section>

        <section class="content">
        <div class="container-fluid">
        <div class="card card-solid">
            <div class="container-fluid">
                <div class="card-body">
                  '; require 'includes/staffs.inc.php'; echo '  
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