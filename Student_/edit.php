<?php
	include "navbar.php";
	// include "connection.php";
?>
<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<meta http-equiv="X-UA-Compatible" content="ie=edge">
<link rel="apple-touch-icon" sizes="57x57" href="../favicon/apple-icon-57x57.png">
<link rel="apple-touch-icon" sizes="60x60" href="../favicon/apple-icon-60x60.png">
<link rel="apple-touch-icon" sizes="72x72" href="../favicon/apple-icon-72x72.png">
<link rel="apple-touch-icon" sizes="76x76" href="../favicon/apple-icon-76x76.png">
<link rel="apple-touch-icon" sizes="114x114" href="../favicon/apple-icon-114x114.png">
<link rel="apple-touch-icon" sizes="120x120" href="../favicon/apple-icon-120x120.png">
<link rel="apple-touch-icon" sizes="144x144" href="../favicon/apple-icon-144x144.png">
<link rel="apple-touch-icon" sizes="152x152" href="../favicon/apple-icon-152x152.png">
<link rel="apple-touch-icon" sizes="180x180" href="../favicon/apple-icon-180x180.png">
<link rel="icon" type="image/png" sizes="192x192"  href="../favicon/android-icon-192x192.png">
<link rel="icon" type="image/png" sizes="32x32" href="../favicon/favicon-32x32.png">
<link rel="icon" type="image/png" sizes="96x96" href="../favicon/favicon-96x96.png">
<link rel="icon" type="image/png" sizes="16x16" href="../favicon/favicon-16x16.png">
<link rel="manifest" href="../favicon/manifest.json">
<meta name="msapplication-TileColor" content="#ffffff">
<meta name="msapplication-TileImage" content="../favicon/ms-icon-144x144.png">
<meta name="theme-color" content="#ffffff">
<!-- add website developer-->
<meta name="Description" content="Enter your description here"/>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.6.0/css/bootstrap.min.css">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
<!-- <link rel="stylesheet" href="../css/index.css"> -->
<!-- <link rel="stylesheet" href="../css/Admin.css"> -->
<title>Profile</title>
<style>
    body{
    background: -webkit-linear-gradient(left, #3931af, #00c6ff);
}
.emp-profile{
    padding: 3%;
    margin-top: 3%;
    margin-bottom: 3%;
    border-radius: 0.5rem;
    background: #fff;
}
.profile-img{
    text-align: center;
}
/* .profile-img img{
    width: 70%;
    height: 100%;
} */
.profile-img .file {
    position: relative;
    overflow: hidden;
    margin-top: -20%;
    width: 70%;
    border: none;
    border-radius: 0;
    font-size: 15px;
    background: #212529b8;
}
.profile-img .file input {
    position: absolute;
    opacity: 0;
    right: 0;
    top: 0;
}
.profile-head h5{
    color: #333;
}
.profile-head h6{
    color: #0062cc;
}
.profile-edit-btn{
    border: none;
    border-radius: 1.5rem;
    width: 70%;
    padding: 2%;
    font-weight: 600;
    color: #6c757d;
    cursor: pointer;
}
.proile-rating{
    font-size: 12px;
    color: #818182;
    margin-top: 5%;
}
.proile-rating span{
    color: #495057;
    font-size: 15px;
    font-weight: 600;
}
.profile-head .nav-tabs{
    margin-bottom:5%;
}
.profile-head .nav-tabs .nav-link{
    font-weight:600;
    border: none;
}
.profile-head .nav-tabs .nav-link.active{
    border: none;
    border-bottom:2px solid #0062cc;
}
.profile-work{
    padding: 14%;
    margin-top: -15%;
}
.profile-work p{
    font-size: 12px;
    color: #818182;
    font-weight: 600;
    margin-top: 10%;
}
.profile-work a{
    text-decoration: none;
    color: #495057;
    font-weight: 600;
    font-size: 14px;
}
.profile-work ul{
    list-style: none;
}
.profile-tab label{
    font-weight: 600;
}
.profile-tab p{
    font-weight: 600;
    color: #0062cc;
}
/* .abc{
    margin-left: -11%;
} */
</style>
</head>
<body>
<?php
if(isset($_SESSION['login_user'])){


?>
    <div class="container emp-profile">
        <form method="post">
            <div class="row">
                <div class="col-md-4">
                    <div class="profile-img">
					<!-- <?php
					$q=mysqli_query($db,"SELECT * FROM student where username='$_SESSION[login_user]'");
 				$row=mysqli_fetch_assoc($q);

 				echo "<div style='text-align: center'>
 					<img class='img-circle profile-img' width=50% src='images/".$_SESSION['pic']."'alt=".$_SESSION['pic'].">
 				</div>";
 			?> -->
					<?php
		 
		 $sql = "SELECT * FROM student WHERE username='$_SESSION[login_user]'";
		 $result = mysqli_query($db,$sql);
 
		 while ($row = mysqli_fetch_assoc($result)) 
		 {
			 $first=$row['first'];
			 $last=$row['last'];
			 $username=$row['username'];
			//  $password=$row['password'];
			 $email=$row['email'];
			 $contact=$row['contact'];
			 $roll=$row['roll'];
             $pic=$row['pic'];
		 }
 
	 ?>
                        <div class="file btn btn-lg btn-primary">
						<?php echo $_SESSION['login_user']; ?>
                            
                        </div>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="profile-head">
                                <h5>
								<?php
								echo $first;
								?>
                                </h5>
                                <h6>
								<?php
								echo $last;
								?>
                                </h6>
                                <!-- <p class="proile-rating">RANKINGS : <span>0/10</span></p> -->
                                <p class="proile-rating"> Roll No: <span>
								<?php
								echo $roll;
								?>
								</span></p>

                                <ul class="nav nav-tabs" >
                            <li class="nav-item">
                                <a class="nav-link active" id="home-tab" data-toggle="tab" href="#home"  >About</a>
                            </li>
                           
                        </ul>
                    </div>
                </div>
                <div class="col-md-2">
                   		
                </div>
            </div>
            <div class="row">
                <div class="col-md-4 col-3">
                    <div class="profile-work ">
                        <style>
                           .profile-work a:hover{
                               color: red;
                               text-decoration: underline;
                           } 
                           .fa-bootstrap{
                               color: #9e28ff;
                              
                           }
                        </style>
                        <p >WORK LINK</p>
						<a href="books.php">Books</a><br>
   <a href="request.php">Book Request</a><br>
   <a href="issue_info.php">Issue Information</a><br>
  <a href="expired.php">Expired List</a><br>
                        
                        
                    </div>
                </div>
                <div class="col-md-8 col-9">
                    <div class="tab-content profile-tab" id="myTabContent">
                        <div class="tab-pane fade show active" id="home" role="tabpanel" aria-labelledby="home-tab">
                                   <!--  -->
			
 
								   <!--  -->
								   <form action="" method="post" enctype="multipart/form-data">
								   <input class="form-control" type="file" name="file" >
								   <div class="row">
                                        <div class="col-md-6 ">
                                            <label>Name</label>
                                        </div>
                                        <div class="col-md-2 ">
                                            <p>
											<input class="form-control" type="text" name="first" value="<?php echo $first; ?>">
                                            <input class="form-control" type="text" name="first" value="<?php echo $pic; ?>" readonly>
											</p>
                                        </div>
										<div class="col-md-4 ">
                                            <p>
											<input class="form-control" type="text" name="last" value="<?php echo $last; ?>">
											</p>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-6 ">
                                            <label>Email</label>
                                        </div>
                                        <div class="col-md-6">
                                            <p>
											<input class="form-control" type="text" name="email" value="<?php echo $email; ?>">
											</p>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-6">
                                            <label>username</label>
                                        </div>
                                        <div class="col-md-6">
                                            <p>
											<input class="form-control" type="text" name="username" value="<?php echo $username; ?>">
											</p>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-6">
                                            <label>Contact</label>
                                        </div>
                                        <div class="col-md-6">
                                            <p>
											<input class="form-control" type="text" name="contact" value="<?php echo $contact; ?>">
											</p>
								
                                        </div>
                                    </div>
                        </div>

                                        
									<button class="profile-edit-btn" type="submit" name="submit">save</button>
	
		   
 		</form>
		 								<!--  -->
										 <?php 

if(isset($_POST['submit']))
{
	move_uploaded_file($_FILES['file']['tmp_name'],"/Student_/images/".$_FILES['file']['name']);

	$first=$_POST['first'];
	$last=$_POST['last'];
	$username=$_POST['username'];
	// $password=$_POST['password'];
	$email=$_POST['email'];
	$contact=$_POST['contact'];
	$pic=$_FILES['file']['name'];

	$sql1= "UPDATE student SET pic='$pic', first='$first', last='$last', username='$username', email='$email', contact='$contact' WHERE username='".$_SESSION['login_user']."'";

	// if(mysqli_query($db,$sql1))
	// {
		?>
			<!-- <script type="text/javascript">
				alert("Saved Successfully.");
				window.location="profile.php";
			</script> -->
		<?php
	// }
}
?>
                        </div>
                        
                    </div>
                </div>
            </div>
        </form>           
    </div>
    <?php
}else{
    ?>

<h1>plase login</h1>
<?php
}
    ?>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.5.1/jquery.slim.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.1/umd/popper.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.6.0/js/bootstrap.min.js"></script>
</body>
</html>