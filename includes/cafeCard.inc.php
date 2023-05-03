 <?php
    require 'includes/dbconfig.inc.php';
    $sql = $con->query("SELECT * FROM cafetopics ORDER BY TopicID DESC LIMIT 3;");

    while ($row = $sql->fetch_array()) {
        $topicID = $row['TopicID'];
        $title = $row['Title'];
        $title = strlen($title) >= 20 ? substr($title, 0, 10) . "... " : $title;
        $userID = $row['AuthorID'];
        $lang = $row['Langue'];
        $sqlUser = "SELECT Username, NameID FROM users WHERE PlayerID = ?";
        $stmt = mysqli_stmt_init($con);
        if (!mysqli_stmt_prepare($stmt, $sqlUser)) {
            header("location: index.php?error=sqlerror");
            exit();
        } else {
            mysqli_stmt_bind_param($stmt, "i", $userID);
            mysqli_stmt_execute($stmt);
            $result = mysqli_stmt_get_result($stmt);
            if ($row = mysqli_fetch_assoc($result)) {
                $username = $row['Username'];
                $tag = $row['NameID'];
                $tag = str_pad($tag, 4, '0', STR_PAD_LEFT);
                $fullname = $username . '#' . $tag;
            }
        }
        if (file_exists($_SERVER['DOCUMENT_ROOT'] . '/avatars/' . $userID . '/' . $userID . '.jpg')) {
            $srcImage = "avatars/$userID/$userID.jpg";
            $filemtime = $filemtime = time();
            $image = $srcImage . '?' . $filemtime;
        } else {
            $filemtime = time();
            $image = "images/placeholder.png?$filemtime";
        }
        echo '
    <tr>
      <td><a href="cafe/read.php?id=' . $topicID . '">' . $title . '</a></td>
      <td><img class="img-circle" src="' . $image . '.png" width="25px" height="25px"> ' . $fullname . '</td>
      <th><img src="../images/flags/' . $lang . '.png"></th>
    </tr>
    ';
    }
?>