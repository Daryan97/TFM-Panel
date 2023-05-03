<?php
require_once '../langs/lang_driver.php';
require_once '../header.php';
echo '<title>' . item("site", "siteName") . ' | ' . item("main", "detailsChange") . '</title>';
require '../sidebar.php';
?>
<?php

echo '<div class="content-wrapper">
        <section class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1>' . item("main", "detailsChange") . '</h1>
                    </div>
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="/index.php">' . item("main", "home") . '</a></li>
                            <li class="breadcrumb-item active">' . item("main", "profile") . '</li>
                            <li class="breadcrumb-item active">' . item("main", "details") . '</li>
                        </ol>
                    </div>
                </div>
        </section>

        <section class="content">
        <div class="container-fluid">
              <div class="card card-danger">
              <div class="card-header">
                <h3 class="card-title">'.item("main", "details").'</h3>
              </div>
              <div class="card-body">
                <div class="row">
                  <div class="col-md-3 mr-lg-5 mb-3">
                    <div class="list-group" id="list-tab" role="tablist">
                      <a class="list-group-item list-group-item-action active" id="list-basic-list" data-toggle="list" href="#list-basic" role="tab" aria-controls="basic"><i class="fas fa-info-circle mr-2"></i> '.item("main", "basic").' '.item("main", "information").'</a>
                      <a class="list-group-item list-group-item-action" id="list-password-list" data-toggle="list" href="#list-password" role="tab" aria-controls="password"><i class="fas fa-key mr-2"></i> '.item("main", "passwordChange").'</a>
                    </div>
                  </div>
                  <div class="col-md-8">
                    <div class="tab-content" id="nav-tabContent text-gray-dark">
                      <div class="tab-pane fade show active" id="list-basic" role="tabpanel" aria-labelledby="list-basic-list">
                        <table class="table table-bordered table-responsive-md">
                          <thead>                  
                            <tr>
                              <th>#</th>
                              <th>'.item("main", "item").'</th>
                              <th>'.item("main", "result").'</th>
                            </tr>
                          </thead>
                          <tbody>
                            <tr>
                              <td><i class="fa fa-info-circle"></i></td>
                              <td>' .item("main", "id").'</td>
                              <td>
                                '.$id.'
                              </td>
                            </tr>
                            <tr>
                              <td><i class="fa fa-envelope"></i></td>
                              <td>' .item("main", "email").'</td>
                              <td>
                                '.hide_email($email).'
                              </td>
                            </tr>
                            <tr>
                              <td><i class="fas fa-star"></i></td>
                              <td>'.item("main", "rank").'</td>
                              <td>
                                '.$privIcon.'
                              </td>
                            </tr>
                            <tr>
                              <td><i class="fas fa-bolt"></i></td>
                              <td>'.item("main", "vip").'</td>
                              <td>
                                '.item("main", "expires").': ' . $vip . '
                              </td>
                            </tr>
                          </tbody>
                        </table>
                      </div>
                      <div class="tab-pane fade" id="list-password" role="tabpanel" aria-labelledby="list-profile-list">
                        <h5>'.item("main", "passwordChange").'</h5>
                          <form action="../includes/password.inc.php" method="post">
                            <div class="input-group mb-3" id="show_hide_password_current">
                                <input type="password" name="currentPassword" class="form-control" id="oldPass" placeholder="'.item("main","current").' '.item("main", "password").'" required>
                                <div class="input-group-append">
                                    <div class="input-group-text">
                                        <a href=""><i class="fa fa-eye-slash" aria-hidden="true"></i></a>
                                    </div>
                                </div>
                            </div>
                            <div class="input-group mb-3" id="show_hide_password">
                                <input type="password" name="newPassword" class="form-control" id="newPass" placeholder="'.item("main","new").' '.item("main", "password").'" required>
                                <div class="input-group-append">
                                    <div class="input-group-text">
                                        <a href=""><i class="fa fa-eye-slash" aria-hidden="true"></i></a>
                                    </div>
                                </div>
                            </div>
                            <div class="input-group mb-3" id="show_hide_password">
                                <input type="password" name="repeatPassword" class="form-control" id="repPass" placeholder="'.item("main","repeat").' '.item("main", "password").'" required>
                                <div class="input-group-append">
                                    <div class="input-group-text">
                                        <a href=""><i class="fa fa-eye-slash" aria-hidden="true"></i></a>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-8">
                                    <div class="icheck-primary">
                                        <input type="checkbox" id="disconnected" required>
                                        <label for="disconnected">
                                            '.item("main", "notConnectedGame").' (<a href="" data-toggle="modal" data-target="#disconnect_modal">'.item("main", "learnMore").'</a>)
                                        </label>
                                    </div>
                                </div>
                                <div class="col-4">
                                    <button type="submit" class="btn btn-primary btn-block" name="login-submit">'.item("main", "change").'</button>
                                </div>
                            </div>
                        </form>
                       </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>                    
        </div>
        </section>
    </div>
      <div class="modal fade" id="disconnect_modal">
        <div class="modal-dialog">
          <div class="modal-content">
            <div class="modal-header">
              <h4 class="modal-title">'.item("main", "disconnectGame").'</h4>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
            <div class="modal-body">
              <p>'.item("main", "disconnectInfo").'</p>
            </div>
            <div class="modal-footer float-right">
              <button type="button" class="btn btn-primary" data-dismiss="modal">'.item("main", "close").'</button>
            </div>
          </div>
        </div>
      </div>';
?>

<script>
    $(document).ready(function() {
        $("#show_hide_password a").on('click', function(event) {
            event.preventDefault();
            if($('#show_hide_password input').attr("type") == "text"){
                $('#show_hide_password input').attr('type', 'password');
                $('#show_hide_password i').addClass( "fa-eye-slash" );
                $('#show_hide_password i').removeClass( "fa-eye" );
            }else if($('#show_hide_password input').attr("type") == "password"){
                $('#show_hide_password input').attr('type', 'text');
                $('#show_hide_password i').removeClass( "fa-eye-slash" );
                $('#show_hide_password i').addClass( "fa-eye" );
            }
        });
        $("#show_hide_password_current a").on('click', function(event) {
            event.preventDefault();
            if($('#show_hide_password_current input').attr("type") == "text"){
                $('#show_hide_password_current input').attr('type', 'password');
                $('#show_hide_password_current i').addClass( "fa-eye-slash" );
                $('#show_hide_password_current i').removeClass( "fa-eye" );
            }else if($('#show_hide_password_current input').attr("type") == "password"){
                $('#show_hide_password_current input').attr('type', 'text');
                $('#show_hide_password_current i').removeClass( "fa-eye-slash" );
                $('#show_hide_password_current i').addClass( "fa-eye" );
            }
        });
    });
    var password = document.getElementById("newPass")
        , confirm_password = document.getElementById("repPass");

    function validatePassword(){
        if(password.value != confirm_password.value) {
            confirm_password.setCustomValidity("<?php echo item("main", "passNoMatch")?>");
        } else {
            confirm_password.setCustomValidity('');
        }
    }

    password.onchange = validatePassword;
    confirm_password.onkeyup = validatePassword;
</script>

<?php
require '../footer.php';
?>
