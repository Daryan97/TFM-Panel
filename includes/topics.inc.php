<?php
require $_SERVER['DOCUMENT_ROOT'] . '/includes/dbconfig.inc.php';
require_once $_SERVER['DOCUMENT_ROOT'] . '/includes/userinfo.inc.php';
if (isset($_GET['page']) && is_numeric($_GET['page']) && !$_GET['page'] < 1) {
    $pageno = $_GET['page'];
} else {
    $pageno = 1;
}

$no_of_records_per_page = 10;
$offset = ($pageno - 1) * $no_of_records_per_page;
$total_pages_sql = "SELECT COUNT(*) FROM cafetopics";
$result = mysqli_query($con, $total_pages_sql);
$total_rows = mysqli_fetch_array($result)[0];
$total_pages = ceil($total_rows / $no_of_records_per_page);
$sql = $con->query("SELECT * FROM cafetopics ORDER BY TopicID DESC LIMIT $offset, $no_of_records_per_page");

$isFirst = $pageno <= 1 ? 'disabled' : '';
$isLast = $pageno >= $total_pages ? 'disabled' : '';
$prev = $pageno <= 1 ? '#' : $pageno - 1;
$next = $pageno >= $total_pages ? '#' : $pageno + 1;
$actual_link = (isset($_SERVER['HTTPS']) && $_SERVER['HTTPS'] === 'on' ? "https" : "http") . "://$_SERVER[HTTP_HOST]$_SERVER[REQUEST_URI]";
if ($privLevel >= 5) {
    $checkAllRemove = '<form method="post" action="/includes/removeTopic.inc.php" id="removeTopic"><button type="button" class="btn btn-default btn-sm checkbox-toggle"><i class="far fa-square"></i></button> <div class="btn-group"><button type="submit" class="btn btn-default btn-sm" name="deleteBtn"><i class="far fa-trash-alt"></i></button></div>';
} else {
    $checkAllRemove = '';
}
echo '
                        <div class="mailbox-controls">
                            ' . $checkAllRemove . '
                            <a href="' . $actual_link . '" class="btn btn-default btn-sm"><i class="fas fa-sync-alt"></i></a>
                            <div class="float-right">
                                ' . $pageno . '/' . $total_pages . '
                                <div class="btn-group">
                                    <a href="?page=' . $prev . '" class="btn btn-default btn-sm ' . $isFirst . '"><i class="fas fa-chevron-left"></i></a>
                                    <form method="get" class="input-group">
                                        <input type="number" class="btn btn-default btn-sm" placeholder="' . $pageno . ' - ' . $total_pages . '" min="1" max="' . $total_pages . '" value="' . $pageno . '" name="page">
                                        <span class="input-group-append">
                                            <button type="submit" class="btn btn-default btn-sm" name="nextPage">Go</button>
                                        </span>
                                    <a href="?page=' . $next . '" class="btn btn-default btn-sm ' . $isLast . '"><i class="fas fa-chevron-right"></i></a>
                                </div>
                            </div>
                        </div>
                        <div class="table-responsive mailbox-messages">
                            <table class="table table-hover table-striped">
                                <tbody>
';

while ($row = $sql->fetch_array()) {
    $id = $row['AuthorID'];
    $sqlUser = "SELECT * FROM users WHERE PlayerID = ?;";
    $stmt = mysqli_stmt_init($con);
    if (!mysqli_stmt_prepare($stmt, $sqlUser)) {
        header("location: index.php?error=sqlerror");
    } else {
        mysqli_stmt_bind_param($stmt, "i", $id);
        mysqli_stmt_execute($stmt);
        $result = mysqli_stmt_get_result($stmt);
        if ($data = mysqli_fetch_assoc($result)) {
            if ($data['PlayerID'] == $id) {
                $username = $data['Username'];
                $tag = $data['NameID'];
                $tag = str_pad($tag, 4, '0', STR_PAD_LEFT);
                $fullname = $username . '#' . $tag;
                $flag = "/images/flags/" . $row['Langue'] . ".png";
                if (file_exists($_SERVER['DOCUMENT_ROOT'] . '/avatars/' . $id . '/' . $id . '.jpg')) {
                    $srcImage = "/avatars/$id/$id.jpg";
                    $filemtime = time();
                    $image = $srcImage . '?' . $filemtime;
                } else {
                    $filemtime = time();
                    $image = "/images/placeholder.png?$filemtime";
                }
                if ($privLevel >= 5) {
                    $removeCheck = '<td><div class="icheck-primary"><input type="checkbox" name="topicID[]" id="topic_' . $row['TopicID'] . '" value="' . $row['TopicID'] . '"><label for="topic_' . $row['TopicID'] . '"></label></div></td>';
                } else {
                    $removeCheck = '';
                }
                echo '
<tr>
    ' . $removeCheck . '
    <td><div class="image"><img src="' . $image . '" width="30px" height="30px" class="img-circle elevation-2" alt="User Image"></div></td>
    <td class="mailbox-name"><b>' . $fullname . '</b></td>
    <td class="mailbox-subject"><a href="/cafe/read.php?id=' . $row['TopicID'] . '">' . $row['Title'] . '</a></td>
    <td><img src="' . $flag . '" alt="' . $row['Langue'] . '"></td>
    <td class="text-white text-right"><a href="/cafe/read.php?id=' . $row['TopicID'] . '" class="btn btn-success justify-content-end">' . item("main", "view") . '</a></td>
</tr>
                ';
            }
        }
    }
}
if ($privLevel >= 5) {
    $formBack = '</form>';
} else {
    $formBack = '';
}
echo '
    </tbody>
    </table>
    </form>
    ' . $formBack . '
    </div>
    </div>
    <div class="card-footer p-0">
        <div class="mailbox-controls">
            <a href="' . $actual_link . '" class="btn btn-default btn-sm"><i class="fas fa-sync-alt"></i></a>
            <div class="float-right">
                                ' . $pageno . '/' . $total_pages . '
                                <div class="btn-group">
                                    <a href="?page=' . $prev . '" class="btn btn-default btn-sm ' . $isFirst . '"><i class="fas fa-chevron-left"></i></a>
                                    <form method="get" class="input-group">
                                        <input type="number" class="btn btn-default btn-sm" placeholder="' . $pageno . ' - ' . $total_pages . '" min="1" max="' . $total_pages . '" value="' . $pageno . '" name="page">
                                        <span class="input-group-append">
                                            <button type="submit" class="btn btn-default btn-sm">Go</button>
                                        </span>
                                    </form>
                                    <a href="?page=' . $next . '" class="btn btn-default btn-sm ' . $isLast . '"><i class="fas fa-chevron-right"></i></a>
                </div>
            </div>
        </div>
    </div>
';
?>
