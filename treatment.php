<?php



//SAVING THE DETAILS
if (isset($_POST['save'])) {
	
$conn=new mysqli("localhost","root","dpsagra","patientitbv");
//fetch details from form
$id=$_POST['t_id'];
$type=$_POST['t_type'];
$date=$_POST['t_date'];
$pid=$_POST['p_id'];
$did=$_POST['d_id'];
$med=$_POST['t_med'];
$status=$_POST['t_status'];

$sql="INSERT INTO treatment (t_id,t_type,t_date,p_id,d_id,t_med,t_status) VALUES ('".$id."','".$type."','".$date."','".$pid."','".$did."','".$med."','".$status."')";
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

$id=$_POST['t_id'];
$type=$_POST['t_type'];
$date=$_POST['t_date'];
$pid=$_POST['p_id'];
$did=$_POST['d_id'];
$med=$_POST['t_med'];
$status=$_POST['t_status'];

$sqll="SELECT * FROM treatment WHERE t_id='".$id."'";
$ress=$conn->query($sqll);
$row=mysqli_fetch_array($ress);

if ($row["t_id"]<>$id) {
	echo "<script type='text/javascript'>alert('Error - Wrong ID :( !')</script>";
}
else
{

	$sql="UPDATE treatment SET t_type='".$type."',t_date='".$date."',p_id='".$pid."',d_id='".$did."',t_med='".$med."',t_status='".$status."' WHERE t_id='".$id."'";
	$res=$conn->query($sql);		

	echo "<script type='text/javascript'>alert('Successfully updated :) !')</script>";
 
	}

}


//DELETING THE DETAILS
elseif (isset($_POST['delete'])) {
	
$conn=new mysqli("localhost","root","dpsagra","patientitbv");

$id=$_POST['t_id'];

$sqll="SELECT * FROM treatment WHERE t_id='".$id."'";
$ress=$conn->query($sqll);
$row=mysqli_fetch_array($ress);

if ($row["t_id"]<>$id) {
	echo "<script type='text/javascript'>alert('Error - Wrong ID :( !')</script>";
}
else
{
	$sql="DELETE FROM treatment WHERE t_id='".$id."'";
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