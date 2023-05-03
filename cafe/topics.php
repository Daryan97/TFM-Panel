<?php
require_once '../langs/lang_driver.php';
require_once '../header.php';
echo '<title>' . item("site", "siteName") . ' | ' . item("main", "topics") . '</title>';
require '../sidebar.php';
?>
    <style>
        .mailbox-subject {
            display: inline-block;
            width: 180px;
            white-space: nowrap;
            overflow: hidden !important;
            text-overflow: ellipsis;
        }
    </style>
<?php
echo '
<div class="content-wrapper">
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>' . item("main", "cafe") . '</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="/">' . item("main", "home") . '</a></li>
                        <li class="breadcrumb-item active">' . item("main", "cafe") . '</li>
                        <li class="breadcrumb-item active">' . item("main", "topics") . '</li>
                    </ol>
                </div>
            </div>
        </div>
    </section>

    <section class="content">
        <div class="row">
            <div class="col-md-12">
                <div class="card card-primary card-outline">
                    <div class="card-header">
                        <h3 class="card-title">' . item("main", "cafe") . ' ' . item("main", "topics") . '</h3>

                        <div class="card-tools">
                            <div class="input-group input-group-sm">
                                <a href="/cafe/new.php" class="btn btn-primary btn-block mb-3">' . item("main", "createTopic") . '</a>
                            </div>
                        </div>
                    </div>
                    <div class="card-body p-0">'; ?>
<?php require '../includes/topics.inc.php'; ?>
    </div>
    </div>
    </div>
    </section>
    </div>
    <script>
        $(function () {
            $('.checkbox-toggle').click(function () {
                var clicks = $(this).data('clicks')
                if (clicks) {
                    $('.mailbox-messages input[type=\'checkbox\']').prop('checked', false)
                    $('.checkbox-toggle .far.fa-check-square').removeClass('fa-check-square').addClass('fa-square')
                } else {
                    $('.mailbox-messages input[type=\'checkbox\']').prop('checked', true)
                    $('.checkbox-toggle .far.fa-square').removeClass('fa-square').addClass('fa-check-square')
                }
                $(this).data('clicks', !clicks)
            });
        })
    </script>

<?php
require '../footer.php';
?>