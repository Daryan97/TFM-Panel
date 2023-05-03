<?php
require $_SERVER['DOCUMENT_ROOT'].'/includes/dbconfig.inc.php';
$sql = $con->query("SELECT * FROM users WHERE PrivLevel >= 3 OR MapCrew = 1 ORDER BY PrivLevel DESC LIMIT 6;");

echo '
<div class="card-header">
<h3 class="card-title">
<i class="fa fa-user-shield"></i>
' . item("main", "staffMembers") . '
</h3>
<div class="card-tools">
<span class="badge badge-primary badge-pill">' . staffCount($con) . ' ' . item("main", "members") . '</span>
<button type="button" class="btn btn-tool" data-card-widget="collapse"><i class="fas fa-minus"></i>
</button>
</div>
</div>
<div class="card-body p-0" style="display: block;">
<ul class="users-list clearfix">
';
while ($row = $sql->fetch_array()) {
    $id = $row['PlayerID'];
    $name = $row['Username'];
    $tag = $row['NameID'];
    $mapcrew = $row['MapCrew'];
    $tag = str_pad($tag, 4, '0', STR_PAD_LEFT);
    $priv = $row['PrivLevel'];
    $nameTag = $name . '#' . $tag;
    if ($priv == 10) {
        $privlevel = '<span class="badge badge-danger">Admin</span>';
    } elseif ($priv == 9) {
        $privlevel = '<span class="badge badge-light">Admin</span>';
    } elseif ($priv == 5) {
        $privlevel = '<span class="badge badge-dark">Mod</span>';
    } elseif ($priv == 3) {
        $privlevel = '<span class="badge badge-info">Helper</span>';
    } else {
        $privlevel = '<span class="badge badge-primary">MapCrew</span>';
    }
    if (file_exists($_SERVER['DOCUMENT_ROOT'] . '/avatars/' . $id . '/' . $id . '.jpg')) {
        $srcImage = "avatars/$id/$id.jpg";
        $filemtime = $filemtime = time();
        $image = $srcImage . '?' . $filemtime;
    } else {
        $filemtime = time();
        $image = "images/placeholder.png?$filemtime";
    }
    echo '
<li>
<img src="' . $image . '">
<a class="users-list-name" href="#">' . $nameTag . '</a>
' . $privlevel . '
</li>';
}
echo '
</ul>
</div>';