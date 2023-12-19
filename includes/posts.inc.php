<?php
require '../includes/dbconfig.inc.php';
if (isset($_GET['id']) && is_numeric($_GET['id'])) {
    $userID = $_SESSION['user_id'];
    if ($privLevel >= 5) {
        $modtoolRight = '<ul class="navbar-nav ml-1">
                          <li class="nav-item dropdown">
                            <a class="btn-default btn btn-xs" data-toggle="dropdown" href="#">
                              <i class="fa fa-tools"></i>
                            </a>
                            <div class="dropdown-menu dropdown-menu-right p-0">
                              <a href="#" class="dropdown-item">
                                <i class="fa fa-trash"></i> Delete this comment (WIP)
                              </a>
                              <a href="#" class="dropdown-item">
                                <i class="fa fa-trash-alt"></i> Delete all by ' . $fullname . ' (WIP)
                              </a>
                          </li>
                        </ul>';
        $modtoolLeft = '<ul class="navbar-nav ml-1">
                          <li class="nav-item dropdown">
                            <a class="btn-default btn btn-xs" data-toggle="dropdown" href="#">
                              <i class="fa fa-tools"></i>
                            </a>
                            <div class="dropdown-menu dropdown-menu-left p-0">
                              <a href="#" class="dropdown-item">
                                <i class="fa fa-trash"></i> Delete this comment (WIP)
                              </a>
                              <a href="#" class="dropdown-item">
                                <i class="fa fa-trash-alt"></i> Delete all by ' . $fullname . ' (WIP)
                              </a>
                          </li>
                        </ul>';
    } else {
        $modtoolRight = '';
        $modtoolLeft = '';
    }
    $sql = "SELECT * FROM cafeposts WHERE TopicID = ? ORDER BY Date ASC;";
    $stmt = mysqli_stmt_init($con);
    if (!mysqli_stmt_prepare($stmt, $sql)) {
        header("location: ../index.php?error=sqlerror");
        exit();
    } else {
        mysqli_stmt_bind_param($stmt, "i", $topicID);
        mysqli_stmt_execute($stmt);
        $result = mysqli_stmt_get_result($stmt);
        while ($row = mysqli_fetch_assoc($result)) {
            $pid = $row['AuthorID'];
            $date = gmdate("m/d/Y", $row['Date']);
            $post = $row['Post'];
            $postID = $row['PostID'];
            $usrsql = "SELECT * FROM users WHERE PlayerID = ?;";
            $usrstmt = mysqli_stmt_init($con);
            mysqli_stmt_prepare($usrstmt, $usrsql);
            mysqli_stmt_bind_param($usrstmt, "i", $pid);
            mysqli_stmt_execute($usrstmt);
            $results = mysqli_stmt_get_result($usrstmt);
            if ($data = mysqli_fetch_assoc($results)) {
                $username = $data['Username'];
                $tag = $data['NameID'];
                $tag = str_pad($tag, 4, '0', STR_PAD_LEFT);
                $fullname = $username . '#' . $tag;
                if (file_exists($_SERVER['DOCUMENT_ROOT'] . '/avatars/' . $pid . '/' . $pid . '.jpg')) {
                    $srcImage = "/avatars/$pid/$pid.jpg";
                    $filemtime = time();
                    $image = $srcImage . '?' . $filemtime;
                } else {
                    $filemtime = time();
                    $image = "/images/placeholder.png?$filemtime";
                }
                if ($pid == $userID) {
                    echo '
                  <div class="direct-chat-msg right">
                    <div class="direct-chat-infos clearfix">
                      <span class="direct-chat-name float-right">' . $fullname . '
                      </span>
                      <span class="direct-chat-timestamp float-left d-flex">' . $date . $modtoolLeft . '</span>
                    </div>
                    <img class="direct-chat-img" src="' . $image . '" alt="User Image">
                    <div class="direct-chat-text">' . $post . '</div>
                  </div>
                ';
                } else {
                    echo '
                  <div class="direct-chat-msg">
                    <div class="direct-chat-infos clearfix">
                      <span class="direct-chat-name float-left">' . $fullname . '</span>
                      <span class="direct-chat-timestamp float-right d-flex">' . $date . $modtoolRight . '</span>
                    </div>
                    <img class="direct-chat-img" src="' . $image . '" alt="User Image">
                    <div class="direct-chat-text">' . $post . '</div>
                  </div>';
                }
            }
        }
    }

} else {
    header('location: ../cafe/topics.php');
}