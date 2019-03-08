<?php



//SAVING THE DETAILS
if (isset($_POST['save'])) {
	
$conn=new mysqli("localhost","root","dpsagra","patientitbv");
//fetch details from form
$id=$_POST['h_id'];
$did=$_POST['d_id'];
$start=$_POST['h_start'];
$end=$_POST['h_end'];
$date=$_POST['h_date']; 

$sql="INSERT INTO schedule (h_id,d_id,h_start,h_end,h_date) VALUES ('".$id."','".$did."','".$start."','".$end."','".$date."')";
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

$id=$_POST['h_id'];
$did=$_POST['d_id'];
$start=$_POST['h_start'];
$end=$_POST['h_end'];
$date=$_POST['h_date']; 

$sqll="SELECT * FROM schedule WHERE h_id='".$id."'";
$ress=$conn->query($sqll);
$row=mysqli_fetch_array($ress);

if ($row["h_id"]<>$id) {
	echo "<script type='text/javascript'>alert('Error - Wrong ID :( !')</script>";
}
else
{

	$sql="UPDATE schedule SET d_id='".$did."',h_start='".$start."',h_end='".$end."',h_date='".$date."'  WHERE h_id='".$id."'";
	$res=$conn->query($sql);		

	echo "<script type='text/javascript'>alert('Successfully updated :) !')</script>";
 
	}

}



//DELETING THE DETAILS
elseif (isset($_POST['delete'])) {
	
$conn=new mysqli("localhost","root","dpsagra","patientitbv");

$id=$_POST['h_id'];

$sqll="SELECT * FROM schedule WHERE h_id='".$id."'";
$ress=$conn->query($sqll);
$row=mysqli_fetch_array($ress);

if ($row["h_id"]<>$id) {
	echo "<script type='text/javascript'>alert('Error - Wrong ID :( !')</script>";
}
else
{
	$sql="DELETE FROM schedule WHERE h_id='".$id."'";
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