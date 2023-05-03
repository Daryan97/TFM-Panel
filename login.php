<?php
require_once 'langs/lang_driver.php';
require_once 'langs/langselector.php';

if (isset($_SESSION['user_id'])) {
    header('location: index.php');
} elseif (isset($_SESSION['locked'])) {
    header('location: locked.php');
}
require 'header.php';
echo '<title>' . item("site", "siteName") . ' | ' . item("main", "login") . '</title>';
?>
<body class="hold-transition login-page">
<div class="login-box">
    <div class="login-logo">
        <a href="/index.php"><?php echo item("site", "siteNameHTML") ?></a>
    </div>
    <div class="card">
        <div class="card-body login-card-body">
            <p class="login-box-msg"><?php echo item("main", "loginWithAcc"); ?></p>

            <form action="includes/login.inc.php" method="post">
                <div class="input-group mb-3">
                    <input type="text" name="username" class="form-control"
                           placeholder="<?php echo item("main", "username"); ?>#0000" required>
                    <div class="input-group-append">
                        <div class="input-group-text">
                            <span class="fas fa-user"></span>
                        </div>
                    </div>
                </div>
                <div class="input-group mb-3" id="show_hide_password">
                    <input type="password" name="password" class="form-control"
                           placeholder="<?php echo item("main", "password"); ?>" required>
                    <div class="input-group-append">
                        <div class="input-group-text">
                            <a class="text-muted"><span class="fas fa-lock"></span></a>
                        </div>
                    </div>
                </div>
                <button type="submit" class="btn btn-primary btn-block"
                        name="login-submit"><?php echo item("main", "login"); ?></button>
            </form>
            <p class="mb-1 mt-2 text-center">
                <a href="#"><?php echo item("main", "forgotPass"); ?></a>
            </p>
            <p class="text-center">
                <a href="#" class="text-center"><?php echo item("main", "register"); ?></a>
            </p>
            <div class="dropdown-divider"></div>
            <?php echo '
            <ol class="breadcrumb justify-content-center bg-transparent mb-0">
                <li class="breadcrumb-item"><a href="?lang=en"><img src="/images/flags/en.png"></a></li>
                <li class="breadcrumb-item active"><a href="?lang=es"><img src="/images/flags/es.png"></li></ol>
            </ol>
            ';
            ?>
        </div>
    </div>
</div>
<script src="plugins/jquery/jquery.min.js"></script>
<script src="plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
<script src="dist/js/adminlte.min.js"></script>
<script>
    $(document).ready(function () {
        $("#show_hide_password a").on('click', function (event) {
            event.preventDefault();
            if ($('#show_hide_password input').attr("type") == "text") {
                $('#show_hide_password input').attr('type', 'password');
                $('#show_hide_password span').addClass("fa-lock");
                $('#show_hide_password span').removeClass("fa-unlock");
            } else if ($('#show_hide_password input').attr("type") == "password") {
                $('#show_hide_password input').attr('type', 'text');
                $('#show_hide_password span').removeClass("fa-lock");
                $('#show_hide_password span').addClass("fa-unlock");
            }
        });
    });
</script>

</body>
</html>

