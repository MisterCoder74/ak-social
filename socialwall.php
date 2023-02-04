<?php
include_once("php_includes/check_login_status.php");
// Initialize any variables that the page might echo
if(isset($_GET["u"])){
	$u = preg_replace('#[^a-z0-9]#i', '', $_GET['u']);
} else {
    header("location: index.php");
    exit();	
}

$isOwner = "no";
if($u == $log_username && $user_ok == true){
	$isOwner = "yes";
}

$sql = "SELECT username, avatar FROM users WHERE activated='1' ORDER BY signup DESC LIMIT 10";
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
<title>Page of user: <?php echo $u; ?></title>
<link rel="icon" href="favicon.ico" type="image/x-icon">
<link rel="stylesheet" href="style/userstyle.css">
<style type="text/css">

</style>
<script src="js/main.js"></script>
<script src="js/ajax.js"></script>

</head>
<body>
<?php include_once("template_pageTop.php"); ?>

<!-- start main container -->
<div id="maincontainer">
<!-- start middle left section -->
<div id="midleft">
<center>
<h2> Newest Users: </h2><br>
<div id="userlistdiv">
    <p><?php echo $userlist; ?></p>
</div>
<hr>
<br>
<a href="userlists.php" title="Go to Users List page"> <h3> User Lists: </h3></a><br>
<br>
</center>
</div>
<!-- end middle left section -->
<!-- start middle section -->
<div id="pageMiddle">
<!-- All Statuses - rivedere -->
 <center><h1><?php echo "Global Board"; ?></h1></center><br>
  <?php include_once("allstatuses.php"); ?> 
<br>
<hr>
</div>
<!-- end middle secton -->
<!-- start middle right section -->
<div id="midright">

</div>
<!-- end middle right section -->
</div>
<!-- end main container -->

<p><br></p>
<?php include_once("template_pageBottom.php"); ?>
</body>
</html>