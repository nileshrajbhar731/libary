<?php
  include "connection.php";
  include "navbar.php";
?>


<!DOCTYPE html>
<html>
<head>
	<title>Books</title>
	<meta name="viewport" content="width=device-width, initial-scale=1">

	<style type="text/css">
		.srch
		{
			padding-left: 30%;

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
                  <li class="nav-item active">
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
	<!--___________________search bar________________________-->
<div class="container">
<div class="row">
	
	<div class="col-md-8 col-6">
	<form class="form-inline my-2 my-lg-0" method="post" name="form1">
		<input class="form-control mr-sm-2" type="text" name="search" placeholder="search books.." require>
		<button class="btn btn-outline-success my-2 my-sm-0" type="submit" name="submit">Search</button>
		
		
	</form>
	
	
	</div>
<!--___________________request book__________________-->

<div class="col-md-4 col-6">
<form class="form-inline my-2 my-lg-0" method="post" name="form1">
		<input class="form-control mr-sm-2" type="text" name="bid" placeholder="Enter Book ID" required>
		<button class="btn btn-outline-success my-2 my-sm-0" type="submit" name="submit1">Request</button>
	</form>
</div>
</div>

	</div>


	
	<?php

		if(isset($_POST['submit']))
		{
			$q=mysqli_query($db,"SELECT * from books where name like '%$_POST[search]%' ");

			if(mysqli_num_rows($q)==0)
			{
				echo "<h1>Sorry! No book found. Try searching again.</h1>";
				
			}
			else
			{
				?>
				<h2>Find Result</h2>
				<?php

echo"<div class='table-responsive'>";
echo "<table class='table table-bordered table-hover ' >";
echo"<thead>";
echo "<tr style='background-color: #6db6b9e6;'>";
	//Table header
	echo "<th scope='col'>"; echo "ID";	echo "</th>";
	echo "<th scope='col'>"; echo "Book-Name";  echo "</th>";
	echo "<th scope='col'>"; echo "Authors Name";  echo "</th>";
	echo "<th scope='col'>"; echo "Edition";  echo "</th>";
	echo "<th scope='col'>"; echo "Status";  echo "</th>";
	echo "<th scope='col'>"; echo "Quantity";  echo "</th>";
	echo "<th scope='col'>"; echo "Department";  echo "</th>";
echo "</tr>";
echo"</thead>";	

while($row=mysqli_fetch_assoc($q))
{
	echo"<tbody>";
	echo "<tr>";
	echo "<th scope='row'>"; echo $row['bid']; echo "</th>";
	echo "<td>"; echo $row['name']; echo "</td>";
	echo "<td>"; echo $row['authors']; echo "</td>";
	echo "<td>"; echo $row['edition']; echo "</td>";
	echo "<td>"; echo $row['status']; echo "</td>";
	echo "<td>"; echo $row['quantity']; echo "</td>";
	echo "<td>"; echo $row['department']; echo "</td>";

	echo "</tr>";
}
echo "</table>";
echo"</div>";
		?>
		<h2>List Of Books</h2>
		<?php
		$res=mysqli_query($db,"SELECT * FROM `books` ORDER BY `books`.`name` ASC;");
		echo"<div class='table-responsive'>";
	echo "<table class='table table-bordered table-hover ' >";
	echo"<thead>";
		echo "<tr style='background-color: #6db6b9e6;'>";
			//Table header
			echo "<th scope='col'>"; echo "ID";	echo "</th>";
			echo "<th scope='col'>"; echo "Book-Name";  echo "</th>";
			echo "<th scope='col'>"; echo "Authors Name";  echo "</th>";
			echo "<th scope='col'>"; echo "Edition";  echo "</th>";
			echo "<th scope='col'>"; echo "Status";  echo "</th>";
			echo "<th scope='col'>"; echo "Quantity";  echo "</th>";
			echo "<th scope='col'>"; echo "Department";  echo "</th>";
		echo "</tr>";
		echo"</thead>";	

		while($row=mysqli_fetch_assoc($res))
		{
			echo"<tbody>";
			echo "<tr>";
			echo "<th scope='row'>"; echo $row['bid']; echo "</th>";
			echo "<td>"; echo $row['name']; echo "</td>";
			echo "<td>"; echo $row['authors']; echo "</td>";
			echo "<td>"; echo $row['edition']; echo "</td>";
			echo "<td>"; echo $row['status']; echo "</td>";
			echo "<td>"; echo $row['quantity']; echo "</td>";
			echo "<td>"; echo $row['department']; echo "</td>";

			echo "</tr>";
		}
	echo "</table>";
	echo"</div>";

			}
		}
			/*if button is not pressed.*/
		else
		{
			?>
			<h2>List Of Books</h2>
			<?php

			$res=mysqli_query($db,"SELECT * FROM `books` ORDER BY `books`.`name` ASC;");
			echo"<div class='table-responsive'>";
		echo "<table class='table table-bordered table-hover ' >";
		echo"<thead>";
			echo "<tr style='background-color: #6db6b9e6;'>";
				//Table header
				echo "<th scope='col'>"; echo "ID";	echo "</th>";
				echo "<th scope='col'>"; echo "Book-Name";  echo "</th>";
				echo "<th scope='col'>"; echo "Authors Name";  echo "</th>";
				echo "<th scope='col'>"; echo "Edition";  echo "</th>";
				echo "<th scope='col'>"; echo "Status";  echo "</th>";
				echo "<th scope='col'>"; echo "Quantity";  echo "</th>";
				echo "<th scope='col'>"; echo "Department";  echo "</th>";
			echo "</tr>";
			echo"</thead>";	

			while($row=mysqli_fetch_assoc($res))
			{
				echo"<tbody>";
				echo "<tr>";
				echo "<th scope='row'>"; echo $row['bid']; echo "</th>";
				echo "<td>"; echo $row['name']; echo "</td>";
				echo "<td>"; echo $row['authors']; echo "</td>";
				echo "<td>"; echo $row['edition']; echo "</td>";
				echo "<td>"; echo $row['status']; echo "</td>";
				echo "<td>"; echo $row['quantity']; echo "</td>";
				echo "<td>"; echo $row['department']; echo "</td>";

				echo "</tr>";
			}
		echo "</table>";
		echo"</div>";
		}

		if(isset($_POST['submit1']))
		{
			if(isset($_SESSION['login_user']))
			{
				mysqli_query($db,"INSERT INTO issue_book (`username`,`bid`,`approve`,`issue`,`return`) Values('$_SESSION[login_user]', '$_POST[bid]','','','')");
				?>
					<script type="text/javascript">
						window.location="request.php"
					</script>
				<?php
			}
			else
			{
				?>
					<script type="text/javascript">
						alert("You must login to Request a book");
					</script>
				<?php
			}
		}

	?>
</div>
</body>
</html>