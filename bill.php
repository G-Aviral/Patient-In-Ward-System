<?php



//SAVING THE DETAILS
if (isset($_POST['save'])) {
	
$conn=new mysqli("localhost","root","dpsagra","patientitbv");
//fetch details from form
$id=$_POST['b_id'];
$date=$_POST['b_date'];
$pid=$_POST['p_id'];
$tid=$_POST['t_id'];
$amt=$_POST['b_amt'];
$gst=$_POST['b_gst'];
$gamt=$_POST['b_gamt'];
$paid=$_POST['b_paid'];
$os=$_POST['b_os'];

$sql="INSERT INTO bill (b_id,b_date,p_id,t_id,b_amt,b_gst,b_gamt,b_paid,b_os) VALUES ('".$id."','".$date."','".$pid."','".$tid."','".$amt."','".$gst."','".$gamt."','".$paid."','".$os."')";
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

$id=$_POST['b_id'];
$date=$_POST['b_date'];
$pid=$_POST['p_id'];
$tid=$_POST['t_id'];
$amt=$_POST['b_amt'];
$gst=$_POST['b_gst'];
$gamt=$_POST['b_gamt'];
$paid=$_POST['b_paid'];
$os=$_POST['b_os'];

$sqll="SELECT * FROM bill WHERE b_id='".$id."'";
$ress=$conn->query($sqll);
$row=mysqli_fetch_array($ress);

if ($row["b_id"]<>$id) {
	echo "<script type='text/javascript'>alert('Error - Wrong ID :( !')</script>";
}
else
{

	$sql="UPDATE bill SET b_date='".$date."',p_id='".$pid."',t_id='".$tid."',b_amt='".$amt."',b_gst='".$gst."',b_gamt='".$gamt."',b_paid='".$paid."',b_os='".$os."' WHERE b_id='".$id."'";
	$res=$conn->query($sql);		

	echo "<script type='text/javascript'>alert('Successfully updated :) !')</script>";
 
	}

}


//DELETING THE DETAILS
elseif (isset($_POST['delete'])) {
	
$conn=new mysqli("localhost","root","dpsagra","patientitbv");

$id=$_POST['b_id'];

$sqll="SELECT * FROM bill WHERE b_id='".$id."'";
$ress=$conn->query($sqll);
$row=mysqli_fetch_array($ress);

if ($row["b_id"]<>$id) {
	echo "<script type='text/javascript'>alert('Error - Wrong ID :( !')</script>";
}
else
{
	$sql="DELETE FROM bill WHERE b_id='".$id."'";
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