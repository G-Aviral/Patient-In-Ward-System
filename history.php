<?php

//SAVING THE DETAILS
if (isset($_POST['save'])) {
	
$conn=new mysqli("localhost","root","dpsagra","patientitbv");
//fetch details from form
$id=$_POST['r_id'];
$pid=$_POST['p_id'];
$name=$_POST['r_name'];
$date=$_POST['r_date'];
$doc=$_POST['r_doc'];
$edate=$_POST['r_edate'];
$ill=$_POST['r_ill'];
$other=$_POST['r_other'];
$year=$_POST['r_year'];
$reason=$_POST['r_reason'];
$hos=$_POST['r_hos'];

$sql="INSERT INTO history (r_id,p_id,r_name,r_date,r_doc,r_edate,r_ill,r_other,r_year,r_reason,r_hos) VALUES ('".$id."','".$pid."','".$name."','".$date."','".$doc."','".$edate."','".$ill."','".$other."','".$year."','".$reason."','".$hos."')";
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


$id=$_POST['r_id'];
$pid=$_POST['p_id'];
$name=$_POST['r_name'];
$date=$_POST['r_date'];
$doc=$_POST['r_doc'];
$edate=$_POST['r_edate'];
$ill=$_POST['r_ill'];
$other=$_POST['r_other'];
$year=$_POST['r_year'];
$reason=$_POST['r_reason'];
$hos=$_POST['r_hos'];


$sqll="SELECT * FROM history WHERE r_id='".$id."'";
$ress=$conn->query($sqll);
$row=mysqli_fetch_array($ress);

if ($row["r_id"]<>$id) {
	echo "<script type='text/javascript'>alert('Error - Wrong ID :( !')</script>";
}
else
{

	 
		$sql="UPDATE history SET p_id='".$pid."',r_name='".$name."',r_date='".$date."',r_doc='".$doc."',r_edate='".$edate."',r_ill='".$ill."',r_other='".$other."',r_year='".$year."',r_reason='".$reason."',r_hos='".$hos."' WHERE r_id='".$id."'";
		$res=$conn->query($sql);		
	
	echo "<script type='text/javascript'>alert('Successfully updated :) !')</script>";
 
	}

}


//DELETING THE DETAILS
elseif (isset($_POST['delete'])) {
	
$conn=new mysqli("localhost","root","dpsagra","patientitbv");

$id=$_POST['r_id'];

$sqll="SELECT * FROM history WHERE r_id='".$id."'";
$ress=$conn->query($sqll);
$row=mysqli_fetch_array($ress);

if ($row["r_id"]<>$id) {
	echo "<script type='text/javascript'>alert('Error - Wrong ID :( !')</script>";
}
else
{
	$sql="DELETE FROM history WHERE r_id='".$id."'";
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