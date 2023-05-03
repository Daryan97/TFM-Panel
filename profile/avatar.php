<?php
require_once '../langs/lang_driver.php';
require_once '../header.php';
echo '<title>' . item("site", "siteName") . ' | ' . item("main", "avatarChange") . '</title>';
require '../sidebar.php';
?>
<?php

echo '<div class="content-wrapper">
        <section class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1>' . item("main", "avatarChange") . '</h1>
                    </div>
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="/">' . item("main", "home") . '</a></li>
                            <li class="breadcrumb-item active">' . item("main", "profile") . '</li>
                            <li class="breadcrumb-item active">' . item("main", "avatar") . '</li>
                        </ol>
                    </div>
                </div>
        </section>

        <section class="content">
        <div class="container-fluid">
            <div class="row mt-5">
                <div class="col-md-4 mr-5 ml-4">
                    <div class="card card-gray-dark">
              <div class="card-header">
                <h3 class="card-title">' . item("main", "current") . ' ' . item("main", "avatar") . '</h3>
              </div>
              <div class="card-body text-center">
                <img src="' . $image . '" class="profile-user-img img-circle profile-picture">
                <p class="breadcrumb-item active">' . item("main", "current") . ' ' . item("main", "avatar") . '</p>
              </div>
            </div>                    
                </div>
                <div class="col-md-7">
                    <div class="card card-gray-dark">
                        <div class="card-header">
                            <h3 class="card-title">' . item("main", "avatarChange") . '</h3>
                        </div>
                        <div class="card-body">
                            <form action="../upload.php" method="POST" enctype="multipart/form-data">
                                <div class="row">
                                <div class="col-8 text-center mt-5">
                                <input type="file" name="file" id="file" accept="image/x-png,image/gif,image/jpeg">
                                </div>
                                <div class="col-2 text-right">
                                <img id="preview" src="/images/placeholder.png" class="profile-user-img img-circle" />
                                </div>
                                </div>
                        </div>
                                <div class="card-footer text-center">
                                    <input type="submit" value="' . item("main", "submit") . '" name="submit" class="btn btn-outline-dark">
                                </div>
                            </form>
                    </div>
                </div>
            </div>
        </div>
        </section>
    </div>';
?>

<script>
    function readURL(input) {
        if (input.files && input.files[0]) {
            var reader = new FileReader();

            reader.onload = function (e) {
                $('#preview').attr('src', e.target.result);
            }

            reader.readAsDataURL(input.files[0]);
        }
    }

    $("#file").change(function () {
        readURL(this);
    });
</script>

<?php
require '../footer.php';
?>
