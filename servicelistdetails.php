<?php include('server.php');
error_reporting(0);
if(isset($_SESSION["Username"])){
	$username=$_SESSION["Username"];
	if ($_SESSION["Usertype"]==1) {
		$linkPro="freelancerProfile.php";
		$linkEditPro="editFreelancer.php";
		$linkBtn="editservice.php";
		$textBtn="Edit this service";
	}
	else{
		$linkPro="employerProfile.php";
		$linkEditPro="editEmployer.php";
		$linkBtn="applyjob.php";
		$textBtn="Inquire now";
	}
}
else{
    $username="";
	//header("location: index.php");
}

if(isset($_SESSION["serviceid"])){
    $serviceid=$_SESSION["serviceid"];
}
else{
    $serviceid="";
    //header("location: index.php");
}

if(isset($_POST["f_user"])){
	$_SESSION["f_user"]=$_POST["f_user"];
	header("location: viewFreelancer.php");
}

if(isset($_POST["c_letter"])){
	$_SESSION["c_letter"]=$_POST["c_letter"];
	header("location: coverLetter.php");
}


if(isset($_POST["f_hire"])){
	$f_hire=$_POST["f_hire"];
	$f_price=$_POST["f_price"];
	$sql = "INSERT INTO selected (f_username, job_id, e_username, price, valid) VALUES ('$f_hire', '$job_id', '$username','$f_price',1)";
    
    $result = $conn->query($sql);
    if($result==true){
    	$sql = "DELETE FROM apply WHERE job_id='$job_id'";
		$result = $conn->query($sql);
		if($result==true){
			$sql = "UPDATE job_offer SET valid=0 WHERE job_id='$job_id'";
			$result = $conn->query($sql);
			if($result==true){
				header("location: jobDetails.php");
			}
		}
    }
}


if(isset($_POST["f_done"])){
	$f_done=$_POST["f_done"];
	$sql = "UPDATE selected SET valid=0 WHERE job_id='$job_id'";
	$result = $conn->query($sql);
    if($result==true){
    	header("location: jobDetails.php");
    }
}

$sql = "SELECT * FROM servicelist WHERE serviceid='$serviceid'";
$result = $conn->query($sql);
if ($result->num_rows > 0) {
    // output data of each row
    while($row = $result->fetch_assoc()) {
    	$e_username=$row["username"];
        $title=$row["title"];
        $price=$row["price"];
        $description=$row["description"];
        $date=$row["date"];
        }
} else {
    echo "0 results";
}

$_SESSION["msgRcv"]=$e_username;
 ?>



<!DOCTYPE html>
<html>
<head>
	<title>Service Details</title>
	<meta charset="utf-8">
  	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="stylesheet" type="text/css" href="bootstrap/css/bootstrap.min.css">
	<link rel="stylesheet" type="text/css" href="bootstrap/css/bootstrap-theme.min.css">
	
	<link rel="stylesheet" type="text/css" href="awesome/css/fontawesome-all.min.css">

<style>
	body{padding-top: 3%;margin: 0;}
	.card{box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2), 0 6px 20px 0 rgba(0, 0, 0, 0.19); background:#fff}
	#sticky{
		position:sticky;
		top:40px;
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
	<div class="col-lg-9">

<!--Freelancer Profile Details-->	
		<div class="card" style="padding:20px 20px 5px 20px;margin-top:20px">
			<div class="panel panel-success">
			  <div class="panel-heading"><h3>Service Details</h3></div>
			</div>
			<div class="panel panel-success">
			  <div class="panel-heading">Images</div>
              <div class="panel-body" style="text-align:center">
              <?php
              $sql = "SELECT * FROM serviceimages WHERE username='$e_username' and title='$title'";
            $result = $conn->query($sql);
            if ($result->num_rows > 0) {
                // output data of each row
                while($row = $result->fetch_assoc()) {?>  	
                <img style="height:200px; width:200px; object-fit:cover;" src="<?php echo "uploads/".$row["img"]?>" alt="" srcset="">
            <?php
                    }
            } else {
                echo "0 results";
            }
            ?>
            </div>
			</div>
			<div class="panel panel-success">
			  <div class="panel-heading">Title</div>
			  <div class="panel-body"><h4><?php echo $title; ?></h4></div>
			</div>
			<div class="panel panel-success">
			  <div class="panel-heading">Price</div>
			  <div class="panel-body"><h4><?php echo $price; ?></h4></div>
			</div>
			<div class="panel panel-success">
			  <div class="panel-heading">Description</div>
			  <div class="panel-body"><h4><?php echo $description; ?></h4></div>
			</div>
			<div class="panel panel-success">
			  <div class="panel-heading">Posted on</div>
			  <div class="panel-body"><h4><?php echo $date; ?></h4></div>
			</div>
			<a href="<?php echo $linkBtn; ?>" id="applybtn" type="button" class="btn btn-warning btn-lg"><?php echo $textBtn; ?></a>
			<p></p>
		</div>
<!--End Freelancer Profile Details-->

<!--Freelancer Profile Details-->	
		<!-- <div id="applicant" class="card" style="padding:20px 20px 5px 20px;margin-top:20px">
			<div class="panel panel-success">
			  <div class="panel-heading"><h3>Reviews</h3></div>
			  <div class="panel-body">
            	</div>
			</div>
			<p></p>
		</div> -->
<!--End Freelancer Profile Details-->



	</div>
<!--End Column 1-->

<?php 
$sql = "SELECT * FROM freelancer WHERE username='$e_username'";
$result = $conn->query($sql);
if ($result->num_rows > 0) {
    // output data of each row
    while($row = $result->fetch_assoc()) {
    	$Name=$row["name"];
        $email=$row["email"];
        $contact_no=$row["contact_no"];
        $address=$row["address"];
		$sql = "SELECT * FROM freelancer WHERE username='$e_username'";
		$result = $conn->query($sql);
		if ($result->num_rows > 0) {
			// output data of each row
			while($row = $result->fetch_assoc()) {
				$photo = $row["photo"];
				}
		} else {
			echo "0 results";
		}
        }
} else {
    echo "0 results";
}

?>

<!--Column 2-->
	<div class="col-lg-3" id="sticky">

<!--Main profile card-->
		<div class="card" style="padding:20px 20px 5px 20px;margin-top:20px">
			<p></p>
			<div style="text-align:center">
				<img style="width:200px; height:200px; border-radius:50%; border:6px #337ab7 solid; object-fit: cover" src="<?php echo $photo?>">
			</div>
			<h2><?php echo $Name; ?></h2>
			<p><span class="glyphicon glyphicon-user"></span> <?php echo $e_username; ?></p>
	        <center><a href="sendMessage.php" class="btn btn-info"><span class="glyphicon glyphicon-envelope"></span>  Send Message</a></center>
	        <p></p>
	    </div>
<!--End Main profile card-->


<!--Contact Information-->
		<div class="card" style="padding:20px 20px 5px 20px;margin-top:20px">
			<div class="panel panel-success">
			  <div class="panel-heading"><h4>Contact Information</h4></div>
			</div>
			<div class="panel panel-success">
			  <div class="panel-heading">Email</div>
			  <div class="panel-body"> <a href = "mailto:<?php echo $email; ?> "><?php echo $email; ?></a></div>
			</div>
			<div class="panel panel-success">
			  <div class="panel-heading">Mobile</div>
			  <div class="panel-body"><a href="tel:<?php echo $contact_no; ?>"><?php echo $contact_no; ?></a></div>
			</div>
			<div class="panel panel-success">
			  <div class="panel-heading">Address</div>
			  <div class="panel-body"><?php echo $address; ?></div>
			</div>
		</div>
<!--End Contact Information-->

<!--Reputation-->
		<!-- <div class="card" style="padding:20px 20px 5px 20px;margin-top:20px">
			<div class="panel panel-warning">
			  <div class="panel-heading"><h4>Reputation</h4></div>
			</div>
			<div class="panel panel-warning">
			  <div class="panel-heading">Reviews</div>
			  <div class="panel-body">Nothing to show</div>
			</div>
			<div class="panel panel-warning">
			  <div class="panel-heading">Ratings</div>
			  <div class="panel-body">Nothing to show</div>
			</div>
		</div> -->
<!--End Reputation-->

	</div>
<!--End Column 2-->


<!--Column 3-->
	<div class="col-lg-2">

<!--Related jobs-->
		<!-- <div class="card" style="padding:20px 20px 5px 20px;margin-top:20px">
			<div class="panel panel-info">
			  <div class="panel-heading"><h3>Related Services</h3></div>
			</div>
			<ul class="list-group">
			  <li class="list-group-item">Related job 1</li>
			  <li class="list-group-item">Related job 2</li>
			  <li class="list-group-item">Related job 3</li>
			  <li class="list-group-item">Related job 4</li>
			</ul>
		</div> -->
<!--End Related jobs-->

	</div>
<!--End Column 3-->

</div>
</div>
<!--End main body-->

<?php 
include 'reviews.php';
include 'submit_rating.php';
?>
<!--Footer-->
<?php include 'footer.php'?>
<!--End Footer-->


<script type="text/javascript" src="jquery/jquery-3.2.1.min.js"></script>
<script type="text/javascript" src="bootstrap/js/bootstrap.min.js"></script>
<?php 

if($e_username!=$username && $_SESSION["Usertype"]!=1){
	echo "<script>
		        $('#applybtn').hide();
		</script>";
} 

if($_SESSION["Usertype"]==1 && $jv==0){
	echo "<script>
		        $('#applybtn').show();
				$('#reviews').hide();
		</script>";
} 
if($e_username!=$username){
	echo "<script>
		        $('#applybtn').hide();
		</script>";
}


?>
</body>
</html>