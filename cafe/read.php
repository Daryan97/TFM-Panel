<?php
if (isset($_GET['id']) && is_numeric($_GET['id'])) {
require_once '../langs/lang_driver.php';
require_once '../header.php';
require_once '../includes/topictitle.inc.php';
echo '<title>' . item("site", "siteName") . ' | ' . item("main", "posts") . '</title>';
require '../sidebar.php';
    if ($privLevel >= 5) {
        $checkAllRemove = '<form method="post" action="/includes/removeTopic.inc.php" id="removeTopic"><input type="hidden" name="topicID[]" value="'. $topicID . '"><button type="submit" class="btn btn-danger btn-sm" name="deleteBtn"><i class="far fa-trash-alt"></i></button></form>';
    } else {
        $checkAllRemove = '';
    }
?>
<?php
echo '
<div class="content-wrapper">
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>' . item("main", "cafe") . ' ' . item("main", "posts") . '</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="/index.php">' . item("main", "home") . '</a></li>
                        <li class="breadcrumb-item active">' . item("main", "cafe") . '</li>
                        <li class="breadcrumb-item"><a href="/cafe/topics.php">' . item("main", "topics") . '</a></li>
                        <li class="breadcrumb-item active">' . item("main", "posts") . '</li>
                    </ol>
                </div>
            </div>
        </div>
    </section>

    <section class="content">
        <div class="row">
            <div class="col-md-12">
                        <div class="card card-prirary cardutline direct-chat direct-chat-primary">
              <div class="card-header">
                <h3 class="card-title"><b class="mailbox-title">' . $topicTitle . '</b></h3>
                <div class="card-tools">' . $checkAllRemove . '</div>
              </div>
              <div class="card-body">
                <div class="direct-chat-messages" id="direct-chat-messages">'; ?>
<?php require '../includes/posts.inc.php'; ?>
    </div>
    </div>
    <div class="card-footer">
        <form action="../includes/reply.inc.php" method="post" id="reply_form">
            <div class="input-group">
                <input type="text" name="reply_msg" autocomplete="off" placeholder="<?php echo item("main", "reply") ?>" class="form-control" >
                <input type="hidden" name="topic_id" value="<?php echo $topicID; ?>">
                <span class="input-group-append">
                      <button type="submit" class="btn btn-primary" name="reply_post" id="reply_post">Send</button>
                    </span>
            </div>
        </form>
    </div>
    </div>
    </div>
    </div>
    </section>
    </div>
    <script>
        $(function () {
            window.onload=function () {
                var objDiv = document.getElementById("direct-chat-messages");
                objDiv.scrollTop = objDiv.scrollHeight;
            }
        })
    </script>
    <script>
        $("#reply_form").submit(function(event){
            event.preventDefault();
            $.post("/includes/reply.inc.php",
                $(this).serialize(),
                function(data){
                    if(data.success) {
                        $('#direct-chat-messages').append('<div class="direct-chat-msg right"><div class="direct-chat-infos clearfix"><span class="direct-chat-name float-right">'+data.username+'</span><span class="direct-chat-timestamp float-left">'+data.timestamp+'</span></div><img class="direct-chat-img" src="'+data.avatar+'" alt="User Image"><div class="direct-chat-text">'+data.message+'</div></div>');
                        var objDiv = document.getElementById("direct-chat-messages");
                        objDiv.scrollTop = objDiv.scrollHeight;
                        $("#reply_form").find('input[name=\'reply_msg\']').val('');
                        Swal.fire({
                            icon: 'success',
                            text: '<?php echo item("main", "replySent") ?>',
                            toast: true,
                            position: 'top',
                            showConfirmButton: false,
                            timer: 3000
                        })
                    }
                    else {
                        $("#reply_form").find('input[name=\'reply_msg\']').val('');
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
} else {
    header("location: ../cafe/topics.php");
}
?>