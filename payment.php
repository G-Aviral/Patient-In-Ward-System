<?php



//SAVING THE DETAILS
if (isset($_POST['save'])) {
	
$conn=new mysqli("localhost","root","dpsagra","patientitbv");
//fetch details from form
$id=$_POST['m_id'];
$date=$_POST['m_date'];
$bid=$_POST['b_id'];
$pid=$_POST['p_id'];
$amt=$_POST['m_amt'];
$type=$_POST['m_type'];

$sql="INSERT INTO payment (m_id,m_date,b_id,p_id,m_amt,m_type) VALUES ('".$id."','".$date."','".$bid."','".$pid."','".$amt."','".$type."')";
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

$id=$_POST['m_id'];
$date=$_POST['m_date'];
$bid=$_POST['b_id'];
$pid=$_POST['p_id'];
$amt=$_POST['m_amt'];
$type=$_POST['m_type'];

$sqll="SELECT * FROM payment WHERE m_id='".$id."'";
$ress=$conn->query($sqll);
$row=mysqli_fetch_array($ress);
if ($row["m_id"]<>$id) {
	echo "<script type='text/javascript'>alert('Error - Wrong ID :( !')</script>";
}
else
{

	$sql="UPDATE payment SET m_date='".$date."',b_id='".$bid."',p_id='".$pid."',m_amt='".$amt."',m_type='".$type."' WHERE m_id='".$id."'";
	$res=$conn->query($sql);		

	echo "<script type='text/javascript'>alert('Successfully updated :) !')</script>";
 
	}

}



//DELETING THE DETAILS
elseif (isset($_POST['delete'])) {
	
$conn=new mysqli("localhost","root","dpsagra","patientitbv");

$id=$_POST['m_id'];

$sqll="SELECT * FROM payment WHERE m_id='".$id."'";
$ress=$conn->query($sqll);
$row=mysqli_fetch_array($ress);

if ($row["m_id"]<>$id) {
	echo "<script type='text/javascript'>alert('Error - Wrong ID :( !')</script>";
}
else
{
	$sql="DELETE FROM payment WHERE m_id='".$id."'";
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