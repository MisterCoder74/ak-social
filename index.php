<?php 
include_once("php_includes/check_login_status.php");
$sql = "SELECT username, avatar FROM users WHERE activated='1' ORDER BY RAND() LIMIT 20";
$query = mysqli_query($db_conx, $sql);
$userlist="";
while ($row = mysqli_fetch_array($query, MYSQLI_ASSOC)) {
$u = $row["username"];
$avatar = $row["avatar"];
if($avatar == NULL){
	$profile_pic = 'images/avatardefault.png';
} else {
$profile_pic = 'user/' .$u. '/' .$avatar;
}
$userlist .= '<div>'.$u.'<br><a href="user.php?u='.$u.'"><img class="profilepics" src="'.$profile_pic.'" alt="'.$u.'" title="'.$u.'"></a></div>';
}
?>

 <!DOCTYPE html>
<html>
<head>
<meta charset="UTF-8">
<title>Test Social Network </title>
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
<h1>Welcome to our Social Network</h1>
  <hr width=500>
<p><br>Here are some of our users...<br> </p>
<h2> Random Users </h2>
<div id="userlistdiv">
    <p><?php echo $userlist; ?></p>
</div>
</center>
</div>
<?php include_once("template_pageBottom.php"); ?>
</body>
</html>