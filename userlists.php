<?php 
include_once("php_includes/check_login_status.php");
$sql = "SELECT username, avatar FROM users WHERE activated='1' ORDER BY signup DESC";
$query = mysqli_query($db_conx, $sql);
$lastjoineduserlist="";
while ($row = mysqli_fetch_array($query, MYSQLI_ASSOC)) {
$u = $row["username"];
$avatar = $row["avatar"];

if($avatar == NULL){
	$profile_pic = 'images/avatardefault.png';
} else {
$profile_pic = 'user/' .$u. '/' .$avatar;
}
$lastjoineduserlist .= '<div>'.$u.'<br><a href="user.php?u='.$u.'"><img class="profilepics" src="'.$profile_pic.'" alt="'.$u.'" title="'.$u.'"></a></div>';
}
?>

<?php 
$sql = "SELECT username, avatar FROM users WHERE activated='1' AND gender='m' ORDER BY signup DESC";
$query = mysqli_query($db_conx, $sql);
$malesuserlist="";
while ($row = mysqli_fetch_array($query, MYSQLI_ASSOC)) {
$u = $row["username"];
$avatar = $row["avatar"];

if($avatar == NULL){
	$profile_pic = 'images/avatardefault.png';
} else {
$profile_pic = 'user/' .$u. '/' .$avatar;
}
$malesuserlist .= '<div>'.$u.'<br><a href="user.php?u='.$u.'"><img class="profilepics" src="'.$profile_pic.'" alt="'.$u.'" title="'.$u.'"></a></div>';
}
?>

<?php 
$sql = "SELECT username, avatar FROM users WHERE activated='1' AND gender='f' ORDER BY signup DESC";
$query = mysqli_query($db_conx, $sql);
$femalesuserlist="";
while ($row = mysqli_fetch_array($query, MYSQLI_ASSOC)) {
$u = $row["username"];
$avatar = $row["avatar"];

if($avatar == NULL){
	$profile_pic = 'images/avatardefault.png';
} else {
$profile_pic = 'user/' .$u. '/' .$avatar;
}
$femalesuserlist .= '<div>'.$u.'<br><a href="user.php?u='.$u.'"><img class="profilepics" src="'.$profile_pic.'" alt="'.$u.'" title="'.$u.'"></a></div>';
}
?>

 <!DOCTYPE html>
<html>
<head>
<meta charset="UTF-8">
<title>User Lists </title>
<link rel="icon" href="favicon.ico" type="image/x-icon">
<link rel="stylesheet" href="style/style.css">
</head>
<body>
<?php include_once("template_pageTop.php"); ?>
<div id="pageMiddle">
<br
<br>
<br>
<center>
<h1>User Lists</h1>
  <hr width=500>
<p><br>Here are some of our user lists...<br> </p>
<h2> Last Users </h2>
<div id="lastjoineduserlistdiv">
    <p><?php echo $lastjoineduserlist; ?></p>
</div>
<h2> Last Male Users </h2>
<div id="malesuserlistdiv">
    <p><?php echo $malesuserlist; ?></p>
</div>
<h2> Last Female Users </h2>
<div id="femalesuserlistdiv">
    <p><?php echo $femalesuserlist; ?></p>
</div>
</center>
</div>
<?php include_once("template_pageBottom.php"); ?>
</body>
</html>