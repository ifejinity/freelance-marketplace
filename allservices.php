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

if(isset($_POST["serid"])){
	$_SESSION["serviceid"]=$_POST["serid"];
	header("location: servicelistdetails.php");
}

$sql = "SELECT * FROM servicelist ORDER BY date DESC";
$result = $conn->query($sql);

if(isset($_POST["s_title"])){
	$t=$_POST["s_title"];
	$sql = "SELECT * FROM servicelist WHERE title='$t'";
	$result = $conn->query($sql);
}

if(isset($_POST["s_category"])){
	$t=$_POST["s_category"];
	$sql = "SELECT * FROM servicelist WHERE category='$t'";
	$result = $conn->query($sql);
}

if(isset($_POST["s_freelancer"])){
	$t=$_POST["s_freelancer"];
	$sql = "SELECT * FROM servicelist WHERE username='$t'";
	$result = $conn->query($sql);
}

if(isset($_POST["s_id"])){
	$t=$_POST["s_id"];
	$sql = "SELECT * FROM servicelist WHERE serviceid='$t'";
	$result = $conn->query($sql);
}

if(isset($_POST["recent"])){
	$sql = "SELECT * FROM servicelist ORDER BY date DESC";
	$result = $conn->query($sql);
}

if(isset($_POST["old"])){
	$sql = "SELECT * FROM servicelist  ORDER BY date ASC";
	$result = $conn->query($sql);
}

 ?>



<!DOCTYPE html>
<html>
<head>
	<title>All Services</title>
	<meta charset="utf-8">
  	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="stylesheet" type="text/css" href="bootstrap/css/bootstrap.min.css">
	<link rel="stylesheet" type="text/css" href="bootstrap/css/bootstrap-theme.min.css">
	<link rel="stylesheet" type="text/css" href="awesome/css/fontawesome-all.min.css">

<style>
	body{padding-top: 3%;margin: 0;}
	.card{box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2), 0 6px 20px 0 rgba(0, 0, 0, 0.19); background:#fff;
	}
	.services{
		display:flex;
		flex-direction:row;
		flex-wrap:wrap;
		gap:10px;
		justify-content:center;
	}
	.services-info{
		width:100%;
		padding:10px;
		text-align:center;
	}
	.services-child:hover{
		cursor: pointer;
		transform:translateY(-5px);
		transition:0.1s;
		box-shadow:0px 10px 1px 1px;
	}
	#sticky{
		position:sticky;
		top:40px;
	}
	.hide-item{
		display:none;
	}
	.show-more-btn{
		background-color:#dff0d8;
		border:1px solid #379237;
		padding:10px;
		border-radius:50px;
		color:#3c763d;
	}
	.show-more-btn:hover{
		background-color:#379237;
		color:white;
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
<!--Column 2-->
<div class="col-lg-3" id="sticky">

<!--Main profile card-->
		<div class="card" style="padding:20px 20px 5px 20px;margin-top:20px">
			<p></p>
			<form action="allservices.php" method="post">
				<div class="form-group">
				  <input type="text" class="form-control" name="s_title">
				  <center><button type="submit" class="btn btn-info">Search by Title</button></center>
				</div>
	        </form>

	        <form action="allservices.php" method="post">
				<div class="form-group">
				  <input type="text" class="form-control" name="s_category">
				  <center><button type="submit" class="btn btn-info">Search by Category</button></center>
				</div>
	        </form>

	        <form action="allservices.php" method="post">
				<div class="form-group">
				  <input type="text" class="form-control" name="s_freelancer">
				  <center><button type="submit" class="btn btn-info">Search by Freelancer</button></center>
				</div>
	        </form>

	        <form action="allservices.php" method="post">
				<div class="form-group">
				  <input type="text" class="form-control" name="s_id">
				  <center><button type="submit" class="btn btn-info">Search by ID</button></center>
				</div>
	        </form>

	        <form action="allservices.php" method="post">
				<div class="form-group">
				  <center><button type="submit" name="recent" class="btn btn-warning">See all recent posted first</button></center>
				</div>
	        </form>

	        <form action="allservices.php" method="post">
				<div class="form-group">
				  <center><button type="submit" name="old" class="btn btn-warning">See all older posted first</button></center>
				</div>
	        </form>

	        <p></p>
	    </div>
<!--End Main profile card-->

	</div>
<!--End Column 2-->

<!--Column 1-->
	<div class="col-lg-9">

<!--Freelancer Profile Details-->	
		<div class="card" style="padding:20px 20px 5px 20px;margin-top:20px">
			<div class="panel panel-success">
			  <div class="panel-heading"><h3>All Services</h3></div>
			  <div class="panel-body"><h4>
				<div class="services">
                <?php 
                if ($result->num_rows > 0) {
                    // output data of each row
                    while($row = $result->fetch_assoc()) {
                        $serviceid=$row["serviceid"];
                        $title=$row["title"];
                        $category=$row["category"];
                        $price=$row["price"];
                        $date=$row["date"];
						$e_username=$row["username"];
						$img=$row["img"];
								
				?>
						<form class="hide-item" action="allservices.php" method="post">
							<div class="services-child" style="width: 311px; height:423px; border:1px green solid; border-radius:10px;displayl:flex; flex-direction:column;">
							<img src="<?php echo $img?>" alt="" srcset="" style="width:100%; height:70%; object-fit:cover; background-color:gray; border-radius:10px 10px 0px 0px;">
								<div class="services-info">
									<input type="hidden" name="serid" value="<?php echo $serviceid ?>">
									<input type="submit" class="btn btn-link btn-lg" value="<?php echo $title?>">
									<p><?php echo $e_username ?></p>
								</div>
							</div>
						</form>
				<?php
						}
                        } else {
                            echo "<tr></tr><tr><td></td><td>Nothing to show</td></tr>";
                        }

                       ?>
					   </div>
					   <button class="show-more-btn">Load more</button>
              </h4></div>
			</div>
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

<script>
jQuery(document).ready(function($){
  $(".hide-item:hidden").slice(0,4).fadeIn();
  $(".show-more-btn").click(function(e){
    $(".hide-item:hidden").slice(0,4).fadeIn();
    if ($(".hide:hidden").length < 1) $(this).fadeOut();
  })
})
</script>

<?php 
if($e_username!=$username && $_SESSION["Usertype"]!=1){
	echo "<script>
		        $('#applybtn').hide();
		</script>";
} 
?>
</body>
</html>