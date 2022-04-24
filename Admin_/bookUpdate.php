<?php
  include "connection.php";
  include "navbar.php";
?>
<html>
<head>
<title>Update Employee Data</title>
</head>
<body>
<?php
if(isset($_SESSION['login_Admin'])){
?>
<?php
include_once 'connection.php';
if(count($_POST)>0) {
mysqli_query($db,"UPDATE books set bid='" . $_POST['bid'] . "',name='" . $_POST['name'] . "', authors='" . $_POST['authors'] . "', edition='" . $_POST['edition'] . "' ,status='" . $_POST['status'] . "',quantity='" . $_POST['quantity'] . "',department='" . $_POST['department'] . "' WHERE bid='" . $_POST['bid'] . "'");
$message = "Record Modified Successfully";
}
$result = mysqli_query($db,"SELECT * FROM books WHERE bid='" . $_GET['bid'] . "'");
$row= mysqli_fetch_array($result);
?>
<form name="frmUser" method="post" action="">
<div><?php if(isset($message)) { echo $message; } ?>
</div>

bid: <br>
<input type="hidden" name="bid" class="txtField" value="<?php echo $row['bid']; ?>" readonly>
<input type="text" name="bid"  value="<?php echo $row['bid']; ?>" readonly>
<br>
Name: <br>
<input type="text" name="name" class="txtField" value="<?php echo $row['name']; ?>">
<br>
authors:<br>
<input type="text" name="authors" class="txtField" value="<?php echo $row['authors']; ?>">
<br>
edition:<br>
<input type="text" name="edition" class="txtField" value="<?php echo $row['edition']; ?>">
<br>
status:<br>
<input type="text" name="status" class="txtField" value="<?php echo $row['status']; ?>" readonly>
<select name="status" id="cars">
  <option value="Available">Available</option>
  <option value="unAvailable">unAvailable</option>
  
</select>
<br>
quantity:<br>
<input type="text" name="quantity" class="txtField" value="<?php echo $row['quantity']; ?>">
<br>
department:<br>
<input type="text" name="department" class="txtField" value="<?php echo $row['department']; ?>">
<br>
<input type="submit" name="submit" value="Submit" class="buttom">

</form>
<?php
}else{
    ?>
<h1>plase login</h1>
<?php
}
?>
</body>
</html>


