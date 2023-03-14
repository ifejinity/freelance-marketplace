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
		$textBtn="Edit the request";
	}
}
else{
    $username="";
	//header("location: index.php");
}

if(isset($_SESSION["job_id"])){
    $job_id=$_SESSION["job_id"];
}
else{
    $job_id="";
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


if(isset($_POST["hire"])){
	$f_hire=$_POST["f_hire"];
	$f_price = $_POST["f_pri"];
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

$sql = "SELECT * FROM job_offer WHERE job_id='$job_id'";
$result = $conn->query($sql);
if ($result->num_rows > 0) {
    // output data of each row
    while($row = $result->fetch_assoc()) {
    	$e_username=$row["e_username"];
        $title=$row["title"];
        $type=$row["type"];
        $description=$row["description"];
		$_SESSION["price"]=$row["budget"];
        $budget=$row["budget"];
        $skills=$row["skills"];
        $special_skill=$row["special_skill"];
        $timestamp=$row["timestamp"];
        $jv=$row["valid"];
        $date=$row["timestamp"];
		$deadline=$row["deadline"];
        }
} else {
    echo "0 results";
}

$_SESSION["msgRcv"]=$e_username;



 ?>



<!DOCTYPE html>
<html>
<head>
	<title>Request Details</title>
	<meta charset="utf-8">
  	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="stylesheet" type="text/css" href="bootstrap/css/bootstrap.min.css">
	<link rel="stylesheet" type="text/css" href="bootstrap/css/bootstrap-theme.min.css">
	<link rel="stylesheet" type="text/css" href="awesome/css/fontawesome-all.min.css">

<style>
	body{padding-top: 3%;margin: 0;}
	.card{box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2), 0 6px 20px 0 rgba(0, 0, 0, 0.19); background:#fff}
	#sticky{
		position: sticky;
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
			  <div class="panel-heading"><h3>Request Details</h3></div>
			</div>
			<div class="panel panel-success">
			  <div class="panel-heading">Image</div>
			  <div class="panel-body" style="text-align:center;">
			  <?php
              $sql = "SELECT * FROM requestimages WHERE username='$username' and title='$title'";
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
			  <div class="panel-heading">Type</div>
			  <div class="panel-body"><h4><?php echo $type; ?></h4></div>
			</div>
			<div class="panel panel-success">
			  <div class="panel-heading">Description</div>
			  <div class="panel-body"><h4><?php echo $description; ?></h4></div>
			</div>
			<div class="panel panel-success">
			  <div class="panel-heading">Budget</div>
			  <div class="panel-body"><h4><?php echo $budget; ?></h4></div>
			</div>
			<div class="panel panel-success">
			  <div class="panel-heading">Required Skills</div>
			  <div class="panel-body"><h4><?php echo $skills; ?></h4></div>
			</div>
			<div class="panel panel-success">
			  <div class="panel-heading">Special Requirement</div>
			  <div class="panel-body"><h4><?php echo $special_skill; ?></h4></div>
			</div>
			<div class="panel panel-success">
			  <div class="panel-heading">Posted on</div>
			  <div class="panel-body"><h4><?php echo $date; ?></h4></div>
			</div>
			<div class="panel panel-success">
			  <div class="panel-heading">Deadline</div>
			  <div class="panel-body"><h4><?php echo $deadline; ?></h4></div>
			</div>
			<a href="<?php echo $linkBtn; ?>" id="applybtn" type="button" class="btn btn-warning btn-lg"><?php echo $textBtn; ?></a>
			<p></p>
		</div>
<!--End Freelancer Profile Details-->

<!--Freelancer Profile Details-->	
		<div id="applicant" class="card" style="padding:20px 20px 5px 20px;margin-top:20px">
			<div class="panel panel-success">
			  <div class="panel-heading"><h3>Applicants for this job</h3></div>
			  <div class="panel-body"><h4>
                  <table style="width:100%">
                  <tr>
                      <td>Applicant's username</td>
                  </tr>
                    <?php 
                    $sql = "SELECT * FROM apply WHERE job_id='$job_id'";
					$result = $conn->query($sql);
                    if ($result->num_rows > 0) {
                        // output data of each row
                        while($row = $result->fetch_assoc()) {
                        $f_username=$row["f_username"];
                        $cover_letter=$row["cover_letter"];
						$pri=$row["price"];

                        echo '
                        <form action="jobDetails.php" method="post">
						<input type="hidden" name="f_pri" value="'.$pri.'">
                        <input type="hidden" name="f_user" value="'.$f_username.'">
                            <tr>
                            <td><input type="submit" class="btn btn-link btn-lg" value="'.$f_username.'"></td>
                            <input type="hidden" name="c_letter" value="'.$cover_letter.'">
                            <td><input type="submit" class="btn btn-link btn-lg" value="cover letter"></td>
                            <input type="hidden" name="f_hire" value="'.$f_username.'">
                            <td><input type="submit" name="hire" class="btn btn-link btn-lg" value="Hire"></td>
                            </tr>
                        </form>';

                        }
                    } else {
                      $sql = "SELECT * FROM selected WHERE job_id='$job_id'";
					  $result = $conn->query($sql);
                      if ($result->num_rows > 0) {
                            // output data of each row
                            while($row = $result->fetch_assoc()) {
                                $f_username=$row["f_username"];
                                $v=$row["valid"];

                                if ($v==0) {
                                	$tc="Job ended";
                                	$tv="";
                                }else{
                                	$tc="End Job";
                                	$tv="f_done";
                                }

                                echo '
                                <form action="jobDetails.php" method="post">
                                <input type="hidden" name="f_user" value="'.$f_username.'">
                                    <tr>
                                    <td><input type="submit" class="btn btn-link btn-lg" value="'.$f_username.'"></td>
                                    </form>
                                    <form action="jobDetails.php" method="post">
                                    <input type="hidden" name="'.$tv.'" value="'.$f_username.'">
                                    <td><input type="submit" class="btn btn-link btn-lg" value="'.$tc.'"></td>
                                    </tr>
                                </form>

                                                             
                                ';

                                }
                        } else {
                            echo "<tr></tr><tr><td></td><td>Nothing to show</td></tr>";
                        }
                        }

                       ?>
                     </table>
              </h4></div>
			</div>
			<p></p>
		</div>
<!--End Freelancer Profile Details-->



	</div>
<!--End Column 1-->

<?php 
$sql = "SELECT * FROM employer WHERE username='$e_username'";
$result = $conn->query($sql);
if ($result->num_rows > 0) {
    // output data of each row
    while($row = $result->fetch_assoc()) {
    	$e_Name=$row["Name"];
        $email=$row["email"];
        $contact_no=$row["contact_no"];
        $address=$row["address"];
		$sql = "SELECT * FROM employer WHERE username='$e_username'";
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
			<h2><?php echo $e_Name; ?></h2>
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
			  <div class="panel-heading"><h3>Related job offers</h3></div>
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
		        $('#applybtn').hide();
		</script>";
} 

if($e_username!=$username){
	echo "<script>
		        $('#applicant').hide();
		</script>";
}

?>


</body>
</html>