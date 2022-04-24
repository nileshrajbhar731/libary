<?php
  include "connection.php";
  include "navbar.php";
?>

<!DOCTYPE html>
<html>
<head>

  <title>Student Registration</title>
  <link rel="stylesheet" type="text/css" href="style.css">
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">

    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script> 

  <style type="text/css">
    section
    {
      margin-top: -20px;
    }
    .reg_img
{
	height: 630px;
	margin-top: 0px;
	background-image: url("images/4.png");
}
.box2
{
	height: 589px;
	width: 450px;
	background-color: black;
	margin: 0px auto;
	opacity: .7;
	color: white;
	padding: 20px;
}
  </style>   
</head>
<body>
<nav class="navbar navbar-expand-md navbar-dark bg-dark">
          <a class="navbar-brand" href="index.php">
          DIGITAL LIBRARY
            </a>
          <button class="navbar-toggler d-lg-none" type="button" data-toggle="collapse" data-target="#collapsibleNavId" aria-controls="collapsibleNavId"
              aria-expanded="false" aria-label="Toggle navigation">
              <span class="navbar-toggler-icon"></span>
          </button>
          <div class="collapse navbar-collapse" id="collapsibleNavId">
              <ul class="navbar-nav mr-auto mt-2 mt-lg-0">
                  <li class="nav-item active">
                      <a class="nav-link" href="index.php">Home <span class="sr-only">(current)</span></a>
                  </li>
                  <li class="nav-item">
                      <a class="nav-link" href="books.php">BOOKS</a>
                  </li>
                  
                  
                  <?php
				   if(isset($_SESSION['login_user']))
				   {
				  
				  ?>
  <li class="nav-item">
					<a class="nav-link" href="feedback.php">FEEDBACK</a>
				</li>
				  <?php
				   }else{

				   
				  ?>
<li class="nav-item">
                      <a class="nav-link" href="view.php">FEEDBACK</a>
                  </li>
				  <?php
				   }
				  ?>
                 
            
          <?php
            if(isset($_SESSION['login_user']))
            {

          ?>
		
              
                  <li class="nav-item">
                      <a class="nav-link" href="profile.php">PROFILE</a>
                  </li>
                  <li class="nav-item">
                      <a class="nav-link" href="fine.php">FINES</a>
                  </li>
                 
              </ul>
              <ul class="nav navbar-nav navbar-right">
              <li class="nav-item">
              <a class="nav-link" href="profile.php">
              <?php
                        echo "<img class='img-circle profile_img' height=30 width=30 src='images/".$_SESSION['pic']."'>";
                        echo " ".$_SESSION['login_user']; 
                      ?>
              </a>
                  </li>
                  <li class="nav-item">
              <a class="nav-link" href="logout.php">
              logout
              </a>
                  </li>
                </ul>   
         

              
              <?php
            }
            else
            {   ?>
               
                 
              </ul>
              <ul class="nav navbar-nav navbar-right">
           
                  <li class="nav-item">
                      <a class="nav-link" href="student_login.php">LOGIN</a>
                  </li>
                  <li class="nav-item">
                      <a class="nav-link" href="registration.php">SIGN-UP</a>
                  </li>
            </ul>
              </div>
         
                <?php
            }
          ?>

     
    </nav>
<section>
  <div class="reg_img">

    <div class="box2">
        <h1 style="text-align: center; font-size: 35px;font-family: Lucida Console;"> &nbsp &nbsp &nbsp  Library Management System</h1>
        <h1 style="text-align: center; font-size: 25px;">User Registration Form</h1>

      <form name="Registration" action="" method="post">
        
        <div class="login">
          <input class="form-control" type="text" name="first" placeholder="First Name" required=""> <br>
          <input class="form-control" type="text" name="last" placeholder="Last Name" required=""> <br>
          <input class="form-control" type="text" name="username" placeholder="Username" required=""> <br>
          <input class="form-control" type="password" name="password" placeholder="Password" required=""> <br>
          <input class="form-control" type="text" name="roll" placeholder="Roll No" required=""><br>
          <input class="form-control" type="text" name="email" placeholder="Email" required=""><br>
          <input class="form-control" type="text" name="contact" placeholder="Phone No" required=""><br>

          <input class="btn btn-default" type="submit" name="submit" value="Sign Up" style="color: black; width: 70px; height: 30px"> </div>
      </form>
     
    </div>
  </div>

</section>

    <?php

      if(isset($_POST['submit']))
      {
        $count=0;

        $sql="SELECT username from `student`";
        $res=mysqli_query($db,$sql);

        while($row=mysqli_fetch_assoc($res))
        {
          if($row['username']==$_POST['username'])
          {
            $count=$count+1;
          }
        }
        if($count==0)
        {
         
          mysqli_query($db,"INSERT INTO `student` VALUES('$_POST[first]', '$_POST[last]', '$_POST[username]', '$_POST[password]', '$_POST[roll]', '$_POST[email]', '$_POST[contact]', 'p.jpg');");
        ?>
          <script type="text/javascript">
           alert("Registration successful");
           window.location="student_login.php"
          </script>
        <?php
        }
        else
        {

          ?>
            <script type="text/javascript">
              alert("The username already exist.");
            </script>
          <?php

        }

      }

    ?>

</body>
</html>