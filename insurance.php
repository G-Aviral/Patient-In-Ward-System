<?php



//SAVING THE DETAILS
if (isset($_POST['save'])) {
	
$conn=new mysqli("localhost","root","dpsagra","patientitbv");
//fetch details from form
$id=$_POST['i_id'];
$pid=$_POST['p_id'];
$date=$_POST['i_date']; 
$type=$_POST['i_type'];
$co=$_POST['i_co'];
$no=$_POST['i_no'];
$amt=$_POST['i_amt'];
$exp=$_POST['i_exp'];

$sql="INSERT INTO insurance (i_id,p_id,i_date,i_type,i_co,i_no,i_amt,i_exp) VALUES ('".$id."','".$pid."','".$date."','".$type."','".$co."','".$no."','".$amt."','".$exp."')";
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

$id=$_POST['i_id'];
$pid=$_POST['p_id'];
$date=$_POST['i_date']; 
$type=$_POST['i_type'];
$co=$_POST['i_co'];
$no=$_POST['i_no'];
$amt=$_POST['i_amt'];
$exp=$_POST['i_exp'];

$sqll="SELECT * FROM insurance WHERE i_id='".$id."'";
$ress=$conn->query($sqll);
$row=mysqli_fetch_array($ress);

if ($row["i_id"]<>$id) {
	echo "<script type='text/javascript'>alert('Error - Wrong ID :( !')</script>";
}
else
{

	$sql="UPDATE insurance SET p_id='".$pid."',i_date='".$date."',i_type='".$type."',i_co='".$co."',i_no='".$no."',i_amt='".$amt."',i_date='".$exp."'  WHERE i_id='".$id."'";
	$res=$conn->query($sql);		

	echo "<script type='text/javascript'>alert('Successfully updated :) !')</script>";
 
	}

}



//DELETING THE DETAILS
elseif (isset($_POST['delete'])) {
	
$conn=new mysqli("localhost","root","dpsagra","patientitbv");

$id=$_POST['i_id'];

$sqll="SELECT * FROM insurance WHERE i_id='".$id."'";
$ress=$conn->query($sqll);
$row=mysqli_fetch_array($ress);

if ($row["i_id"]<>$id) {
	echo "<script type='text/javascript'>alert('Error - Wrong ID :( !')</script>";
}
else
{
	$sql="DELETE FROM insurance WHERE i_id='".$id."'";
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