<?php include('server.php');
if(isset($_SESSION["Username"])){
	$username=$_SESSION["Username"];
	if ($_SESSION["Usertype"]==1) {
		$linkPro="freelancerProfile.php";
		$linkEditPro="editFreelancer.php";
		$linkBtn="applyJob.php";
		$textBtn="Apply for this job";
	}
	else{
		$linkPro="employerProfile.php";
		$linkEditPro="editEmployer.php";
		$linkBtn="editJob.php";
		$textBtn="Edit the job offer";
	}
}
else{
    $username="";
	//header("location: index.php");
}
$sender = $_SESSION["sender"];
$reciever = $_SESSION["reciever"];

$sql = "SELECT * FROM messengeruser where username='$sender' and e_username='$reciever'";
$result = $conn->query($sql);
if ($result->num_rows > 0) {
    // output data of each row
    while($row = $result->fetch_assoc()) {
      $senderid = $row["userid"];
    }
  }
  $sql = "SELECT * FROM messengeruser where username='$reciever' and e_username='$sender'";
  $result = $conn->query($sql);
  if ($result->num_rows > 0) {
      // output data of each row
      while($row = $result->fetch_assoc()) {
        $userid = $row["userid"];
      }
    }
if (isset($_POST["send"])){
    $msg = $_POST["message"];
    $sql = "insert into message (userid, sender, receiver, msg) values ('$senderid', '$sender', '$reciever', '$msg')";
    $result = $conn->query($sql);
}
echo $userid;
$sql = "SELECT * FROM message where userid=$senderid or userid='$userid'";
$result = $conn->query($sql);
$f=0;


// if(isset($_POST["sr"])){
// 	$t=$_POST["sr"];
// 	$sql = "SELECT * FROM freelancer WHERE username='$t'";
// 	$result = $conn->query($sql);
// 	if ($result->num_rows > 0) {
// 		$_SESSION["f_user"]=$t;
// 		header("location: viewFreelancer.php");
// 	} else {
// 	    $sql = "SELECT * FROM employer WHERE username='$t'";
// 		$result = $conn->query($sql);
// 		if ($result->num_rows > 0) {
// 			$_SESSION["e_user"]=$t;
// 			header("location: viewEmployer.php");
// 		}
// 	}
// }

// if(isset($_POST["s_inbox"])){
// 	$t=$_POST["s_inbox"];
// 	$sql = "SELECT * FROM message WHERE receiver='$username' and sender='$t' ORDER BY timestamp DESC";
// 	$result = $conn->query($sql);
// 	$f=0;
// }

// if(isset($_POST["s_sm"])){
// 	$t=$_POST["s_sm"];
// 	$sql = "SELECT * FROM message WHERE sender='$username' and receiver='$t' ORDER BY timestamp DESC";
// 	$result = $conn->query($sql);
// 	$f=1;
// }

// if(isset($_POST["inbox"])){
// 	$sql = "SELECT * FROM message WHERE receiver='$username' ORDER BY timestamp DESC";
// 	$result = $conn->query($sql);
// 	$f=0;
// }

// if(isset($_POST["sm"])){
// 	$sql = "SELECT * FROM message WHERE sender='$username' ORDER BY timestamp DESC";
// 	$result = $conn->query($sql);
// 	$f=1;
// }

// if(isset($_POST["rep"])){
// 	$_SESSION["msgRcv"]=$_POST["rep"];
// 	header("location: sendMessage.php");
// }




 ?>



<!DOCTYPE html>
<html>
<head>
	<title>Message</title>
	<meta charset="utf-8">
  	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="stylesheet" type="text/css" href="bootstrap/css/bootstrap.min.css">
	<link rel="stylesheet" type="text/css" href="bootstrap/css/bootstrap-theme.min.css">
	<link rel="stylesheet" type="text/css" href="awesome/css/fontawesome-all.min.css">

<style>
	body{padding-top: 3%;margin: 0;}
	.card{box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2), 0 6px 20px 0 rgba(0, 0, 0, 0.19); background:#fff}
    .sender{
        display:flex;
        flex-direction:row;
        gap:30px;
        padding:10px;
        align-items:center;
        justify-content: flex-end;
    }
    .reciever{
        display:flex;
        flex-direction:row;
        gap:30px;
        padding:10px;
        align-items:center;
        justify-content: flex-start;
    }
    .messages{
        background-color: #9EB23B;
        padding:10px;
        border-radius:30px;
        color:white;
    }
    .messages1{
        background-color: #EEEEEE;
        padding:10px;
        border-radius:30px;
        color:black;
    }
    .msgbox{
        width:100%;
        display:flex;
        flex-direction:row;
        gap:10px;
        justify-content:center;
    }
    .msg{
        width: 80%;
        padding:10px;
        font-size:20px;
        border-radius:50px;
        border:1px solid black;
    }
    .msg:focus {
        border:5px solid #9EB23B;
        transition:0.3s;
    }
    .send{
        width: 20%;
        padding:10px;
        font-size:20px;
        border-radius:20px;
        border:1px solid black;
        background-color:#9EB23B;
        color:white;
    }
    .send:hover{
        background-color:green;
    }
    .hidemes{
        display:none;
    }
    .show-more-btn{
        background-color:transparent;
        border:none;
    }
    .show-more-btn:hover{
        color:green;
    }
</style>

</head>
<body>

<!--Navbar menu-->
<nav class="navbar navbar-inverse navbar-fixed-top" id="my-navbar">
	<div class="container">
		<div class="navber-header">
			<button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#navbar-collapse">
				<span class="icon-bar"></span>
				<span class="icon-bar"></span>
				<span class="icon-bar"></span>
				<span class="icon-bar"></span>
			</button>
			<a href="index.php" class="navbar-brand">Freelance Marketplace</a>
		</div>
		<div class="collapse navbar-collapse" id="navbar-collapse">
			<ul class="nav navbar-nav navbar-right">
				<li><a href="allservices.php">Services</a></li>
				<li><a href="allJob.php">Request</a></li>
				<li><a href="allFreelancer.php">Freelancers</a></li>
				<li><a href="allEmployer.php">Student clients</a></li>
				<li class="dropdown" style="background:#000;padding:0 20px 0 20px;">
			        <a class="dropdown-toggle" data-toggle="dropdown" href="#"><span class="glyphicon glyphicon-user"></span> <?php echo $username; ?>
			        </a>
			        <ul class="dropdown-menu list-group list-group-item-info">
			        	<a href="<?php echo $linkPro; ?>" class="list-group-item"><span class="glyphicon glyphicon-home"></span>  View profile</a>
			          	<a href="<?php echo $linkEditPro; ?>" class="list-group-item"><span class="glyphicon glyphicon-inbox"></span>  Edit Profile</a>
					  	<a href="message.php" class="list-group-item"><span class="glyphicon glyphicon-envelope"></span>  Messages</a> 
					  	<a href="logout.php" class="list-group-item"><span class="glyphicon glyphicon-ok"></span>  Logout</a>
			        </ul>
			    </li>
			</ul>
		</div>		
	</div>	
</nav>
<!--End Navbar menu-->


<!--main body-->
<div style="padding:1% 3% 1% 3%;">
<div class="row">

<!--Column 1-->
	<div class="col-lg-12">

<!--Freelancer Profile Details-->	
		<div class="card" style="padding:20px 20px 5px 20px;margin-top:20px">
			<div class="panel panel-success">
			  <div class="panel-heading"><h3><?php echo $reciever?></h3></div>
			  <div class="panel-body"><h4>
              <button class="show-more-btn">Load older</button>
                      <?php
                      	if ($result->num_rows > 0) {
						    // output data of each row
						    while($row = $result->fetch_assoc()) {
						        $reciever=$row["sender"];
                                $msg = $row["msg"];
                                $totalmessages =  $result->num_rows;
                                if($username == $reciever){

?>
                                <div class="hidemes">
                                    <div class="sender">
                                        <div class="messages">
                                            <?php echo $msg?>
                                        </div>
                                        <?php echo $reciever?>
                                    </div>
                                </div>
<?php
                                }else{
                ?>
                                <div class="hidemes">
                                    <div class="reciever">
                                        <?php echo $reciever?>
                                        <div class="messages1">
                                            <?php echo $msg?>
                                        </div>
                                    </div>
                                </div>
                <?php
                                }
                                }
                        } else {
                            echo "Nothing to show";
                        }
                       ?>
              </h4></div>
			</div>
            <form action="messenger.php" method="post" class="msgbox">
                <input class="msg" type="text" name="message">
                <button name="send" class="send">Send</button>
            </form>
			<p></p>
		</div>
<!--End Freelancer Profile Details-->
	</div>
<!--End Column 1-->
</div>
</div>
<!--End main body-->


<!--Footer-->
<?php include 'footer.php'?>
<!--End Footer-->


<script type="text/javascript" src="jquery/jquery-3.2.1.min.js"></script>
<script type="text/javascript" src="bootstrap/js/bootstrap.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.0/jquery.min.js"></script>

<script>
jQuery(document).ready(function($){
  $(".hidemes:hidden").slice(<?php echo $totalmessages?>-9).fadeIn();
  $(".show-more-btn").click(function(e){
    $(".hidemes:hidden").slice(-9).fadeIn();
    if ($(".hidemes:hidden").length < 1) $(this).fadeOut();
  })
})
</script>
</body>
</html>