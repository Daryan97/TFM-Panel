<?php
require_once '../langs/lang_driver.php';
require_once '../header.php';
require_once '../includes/userinfo.inc.php';
echo '<title>' . item("site", "siteName") . ' | ' . item("main", "createTopic") . '</title>';
require '../sidebar.php';
?>
<div class="content-wrapper">
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1><?php echo item("main", "createTopic") ?></h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="/index.php"><?php echo item("main", "home")  ?></a></li>
                        <li class="breadcrumb-item active"><?php echo item("main", "cafe") ?></li>
                        <li class="breadcrumb-item"><a href="/cafe/topics.php"><?php echo item("main", "topics")  ?></a></li>
                        <li class="breadcrumb-item active"><?php echo item("main", "new")  ?></li>
                    </ol>
                </div>
            </div>
        </div>
    </section>
    <section class="content">
        <div class="row">
            <div class="col-md-12">
                <div class="card card-secondary">
                    <form method="post" action="../includes/newTopic.inc.php" id="post_topic">
                        <div class="card-body">
                            <div class="row">
                                <div class="col-md-2 text-center justify-content-center align-items-center banner-topic">
                                    <img class="profile-user-img" src="<?php echo $image; ?>" alt="">
                                    <h4 class="profile-username"><?php echo $fullname; ?></h4>
                                    <?php echo $privIcon; ?>
                                </div>
                                <div class="col-md-10">
                                    <div class="row">
                                        <div class="col">
                                            <div class="form-group">
                                                <label for="topic-title"><?php echo item("main", "title"); ?></label>
                                                <input type="text" class="form-control" autocomplete="off" id="topic-title" placeholder="<?php echo item("main", "enterTitle"); ?>" name="topic_title">
                                            </div>
                                        </div>
                                        <div class="col">
                                            <div class="form-group">
                                                <label><?php echo item("main", "language"); ?></label>
                                                <select class="form-control" style="width: 100%;" data-select2-id="1" tabindex="-1" aria-hidden="true" name="community">
                                                    <option selected="selected" value="EN">English</option>
                                                    <option value="ES">Spanish</option>
                                                    <option disabled><?php echo item("main", "translateFooter") ?></option>
                                                </select>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label for="textarea"><?php echo item("main", "text"); ?></label>
                                        <textarea class="form-control" autocomplete="off" rows="4" placeholder="<?php echo item("main", "enter"); ?> ..." id="textarea" name="topic_post"></textarea>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="card-footer">
                            <div class="row">
                                <div class="col-md-2"></div>
                                <div class="col-md-10 text-center">
                                    <button type="submit" class="btn btn-primary"><?php echo item("main", "create"); ?></button>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </section>
</div>
    <script>
        $("#post_topic").submit(function(event){
            event.preventDefault();
            $.post("/includes/newTopic.inc.php",
                $(this).serialize(),
                function(data){
                    if(data.success) {
                        window.setTimeout(function(){window.location.href = "/cafe/read.php?id="+data.id}, 750);
                        $("#post_topic").find('input[name=\'topic_title\']').val('');
                        $("#post_topic").find('textarea[name=\'topic_post\']').val('');
                        Swal.fire({
                            icon: 'success',
                            text: '<?php echo item("main", "topicPosted") ?>',
                            toast: true,
                            position: 'top',
                            showConfirmButton: false,
                        });
                    }
                    else {
                        $("#post_topic").find('input[name=\'topic_title\']').val('');
                        $("#post_topic").find('textarea[name=\'topic_post\']').val('');
                        Swal.fire({
                            icon: 'error',
                            text: data.message,
                            toast: true,
                            position: 'top',
                            showConfirmButton: false,
                            timer: 3000
                        });
                    }
                });
        });
    </script>

<?php
require '../footer.php';
?>