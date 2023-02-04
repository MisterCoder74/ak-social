<?php
// It is important for any file that includes this file, to have
// check_login_status.php included at its very top.
$envelope = '<img src="images/notes_dead.jpg" width="22" height="18" alt="Notes" title="This envelope is for logged in members">';
$loginLink = '<a href="login.php" title="Log in to your account">Log In</a> &nbsp; | &nbsp; <a href="signup.php" title="Create an account">Sign Up</a>';
if($user_ok == true) {
	$sql = "SELECT notescheck FROM users WHERE username='$log_username' LIMIT 1";
	$query = mysqli_query($db_conx, $sql);
	$row = mysqli_fetch_row($query);
	$notescheck = $row[0];
	$sql = "SELECT id FROM notifications WHERE username='$log_username' AND date_time > '$notescheck' LIMIT 1";
	$query = mysqli_query($db_conx, $sql);
	$numrows = mysqli_num_rows($query);
    if ($numrows == 0) {
		$envelope = '<a href="notifications.php" title="Your notifications and friend requests"><img src="images/notes_still.jpg" width="22" height="18" alt="Notes"></a>';
    } else {
		$envelope = '<a href="notifications.php" title="You have new notifications"><img src="images/notes_flash.jpg" width="22" height="18" alt="Notes"></a>';
	}
    $loginLink = '<a href="user.php?u='.$log_username.'" title="Go to your page">'.$log_username.'</a> &nbsp; | &nbsp; <a href="logout.php" title="Disconnect from site">Log Out</a>';
    $wallLink = '<a href="socialwall.php?u='.$log_username.'" title="Go to the Social Wall"><img src="images/statuses.jpg" width="26" height="27" alt="Social Wall"></a>';
}
?>
<div id="pageTop">
  <div id="pageTopWrap">
    <div id="pageTopLogo">
      <a href="index.php">
        <img src="images/logo.png" width=208 alt="logo" title="Vivacity Design logo">
      </a>
    </div>
    <div id="pageTopRest">
        <div id="heading">
          <h1>Test Social Network</h1>
        </div>
    </div>
    <div id="menu1">
               <?php echo $wallLink; ?> &nbsp; &nbsp; <?php echo $envelope; ?> &nbsp; &nbsp; <?php echo $loginLink; ?>
    </div>
  </div>
</div>