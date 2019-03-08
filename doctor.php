<?php

//SAVING THE DETAILS
if (isset($_POST['save'])) {
	
$conn=new mysqli("localhost","root","dpsagra","patientitbv");
//fetch details from form
$id=$_POST['d_id'];
$name=$_POST['d_name'];
$num=$_POST['d_num'];
$email=$_POST['d_email'];
$sid=$_POST['d_sid'];

$sql="INSERT INTO doctor (d_id,d_name,d_num,d_email,d_sid) VALUES ('".$id."','".$name."','".$num."','".$email."','".$sid."')";
$res=$conn->query($sql);
 if($res){
		echo "<script type='text/javascript'>alert('Successfully saved :) !')</script>";
	}
	else{
		echo "<script type='text/javascript'>alert('Error :( !')</script>";
}
}

//UPDATING THE DETAILS
elseif (isset($_POST['edit'])) {
$conn=new mysqli("localhost","root","dpsagra","patientitbv");

$id=$_POST['d_id'];
$name=$_POST['d_name'];
$num=$_POST['d_num'];
$email=$_POST['d_email'];
$sid=$_POST['d_sid'];

$sqll="SELECT * FROM doctor WHERE d_id='".$id."'";
$ress=$conn->query($sqll);
$row=mysqli_fetch_array($ress);

if ($row["d_id"]<>$id) {
	echo "<script type='text/javascript'>alert('Error - Wrong ID :( !')</script>";
}
else
{

	$sql="UPDATE doctor SET d_name='".$name."',d_num='".$num."',d_email='".$email."',d_sid='".$sid."' WHERE d_id='".$id."'";
	$res=$conn->query($sql);		

	echo "<script type='text/javascript'>alert('Successfully updated :) !')</script>";
 
	}

}




//DELETING THE DETAILS
elseif (isset($_POST['delete'])) {
	
$conn=new mysqli("localhost","root","dpsagra","patientitbv");

$id=$_POST['d_id'];

$sqll="SELECT * FROM doctor WHERE d_id='".$id."'";
$ress=$conn->query($sqll);
$row=mysqli_fetch_array($ress);

if ($row["d_id"]<>$id) {
	echo "<script type='text/javascript'>alert('Error - Wrong ID :( !')</script>";
}
else
{
	$sql="DELETE FROM doctor WHERE d_id='".$id."'";
	$res=$conn->query($sql);		
	
	echo "<script type='text/javascript'>alert('Successfully deleted :) !')</script>";
 
	}

}

//CLOSING THE WEBPAGE
elseif (isset($_POST['exit'])) {
	echo "<script type='text/javascript'>alert('Goodbye :) !')</script>";
echo "<script>window.close();</script>"	;
}

?>