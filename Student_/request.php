<?php
  include "connection.php";
  include "navbar.php";
?>
<!DOCTYPE html>
<html>
<head>
	<title>Book Request</title>
	<meta name="viewport" content="width=device-width, initial-scale=1">

	<style type="text/css">
		.srch
		{
			padding-left: 1000px;

		}
		
		body {
  font-family: "Lato", sans-serif;
  transition: background-color .5s;
}

.sidenav {
  height: 100%;
  margin-top: 50px;
  width: 0;
  position: fixed;
  z-index: 1;
  top: 0;
  left: 0;
  background-color: #222;
  overflow-x: hidden;
  transition: 0.5s;
  padding-top: 60px;
}

.sidenav a {
  padding: 8px 8px 8px 32px;
  text-decoration: none;
  font-size: 25px;
  color: #818181;
  display: block;
  transition: 0.3s;
}

.sidenav a:hover {
  color: white;
}

.sidenav .closebtn {
  position: absolute;
  top: 0;
  right: 25px;
  font-size: 36px;
  margin-left: 50px;
}

#main {
  transition: margin-left .5s;
  padding: 16px;
}

@media screen and (max-height: 450px) {
  .sidenav {padding-top: 15px;}
  .sidenav a {font-size: 18px;}
}
.img-circle
{
	margin-left: 20px;
}
.h:hover
{
	color:white;
	width: 300px;
	height: 50px;
	background-color: #00544c;
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
                  <li class="nav-item">
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
<!--_________________sidenav_______________-->
	
	<div id="mySidenav" class="sidenav">
  <a href="javascript:void(0)" class="closebtn" onclick="closeNav()">&times;</a>

  			<div style="color: white; margin-left: 60px; font-size: 20px;">

                <?php
                if(isset($_SESSION['login_user']))

                { 	echo "<img class='img-circle profile_img' height=120 width=120 src='images/".$_SESSION['pic']."'>";
                    echo "</br></br>";

                    echo "Welcome ".$_SESSION['login_user']; 
                }
                ?>
            </div><br><br>

 
  <div class="h"> <a href="books.php">Books</a></div>
  <div class="h"> <a href="request.php">Book Request</a></div>
  <div class="h"> <a href="issue_info.php">Issue Information</a></div>
  <div class="h"><a href="expired.php">Expired List</a></div>

</div>
<div id="main">
  
  <span style="font-size:30px;cursor:pointer" onclick="openNav()">&#9776; open</span>
<div class="container">


	<script>
	function openNav() {
	  document.getElementById("mySidenav").style.width = "300px";
	  document.getElementById("main").style.marginLeft = "300px";
	  document.body.style.backgroundColor = "rgba(0,0,0,0.4)";
	}

	function closeNav() {
	  document.getElementById("mySidenav").style.width = "0";
	  document.getElementById("main").style.marginLeft= "0";
	  document.body.style.backgroundColor = "white";
	}
	</script>
	<br><br>
	
	<?php
	if(isset($_SESSION['login_user']))
		{
			$q=mysqli_query($db,"SELECT * from issue_book where username='$_SESSION[login_user]'");

			if(mysqli_num_rows($q)==0)
			{
				echo "There's no pending request";
			}
			else
			{
				echo"<div class='table-responsive'>";
		echo "<table class='table table-bordered table-hover' >";
			echo "<tr style='background-color: #6db6b9e6;'>";
				//Table header
				
				echo "<th>"; echo "Book-ID";  echo "</th>";
				echo "<th>"; echo "Approve Status";  echo "</th>";
				echo "<th>"; echo "Issue Date";  echo "</th>";
				echo "<th>"; echo "Return Date";  echo "</th>";
				
			echo "</tr>";	

			while($row=mysqli_fetch_assoc($q))
			{
				echo "<tr>";
				echo "<td>"; echo $row['bid']; echo "</td>";
				echo "<td>"; echo $row['approve']; echo "</td>";
				echo "<td>"; echo $row['issue']; echo "</td>";
				echo "<td>"; echo $row['return']; echo "</td>";
				
				echo "</tr>";
			}
		echo "</table>";
		echo"</div>";
			}
		}
		else
		{
			echo "</br></br></br>"; 
			echo "<h2><b>";
			echo " Please login first to see the request information.";
			echo "</b></h2>";
		}
		?>
	</div>
</div>
</body>
</html>