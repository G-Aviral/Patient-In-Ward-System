<?php



//SAVING THE DETAILS
if (isset($_POST['save'])) {
	
$conn=new mysqli("localhost","root","dpsagra","patientitbv");
//fetch details from form
$id=$_POST['c_id'];
$pid=$_POST['p_id'];
$iid=$_POST['i_id'];
$bid=$_POST['b_id'];
$amt=$_POST['c_amt'];
$app=$_POST['c_app'];
$date=$_POST['c_date'];


$sql="INSERT INTO claim (c_id,p_id,i_id,b_id,c_amt,c_app,c_date) VALUES ('".$id."','".$pid."','".$iid."','".$bid."','".$amt."','".$app."','".$date."')";
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

$id=$_POST['c_id'];
$pid=$_POST['p_id'];
$iid=$_POST['i_id'];
$bid=$_POST['b_id'];
$amt=$_POST['c_amt'];
$app=$_POST['c_app'];
$date=$_POST['c_date'];

$sqll="SELECT * FROM claim WHERE c_id='".$id."'";
$ress=$conn->query($sqll);
$row=mysqli_fetch_array($ress);
if ($row["c_id"]<>$id) {
	echo "<script type='text/javascript'>alert('Error - Wrong ID :( !')</script>";
}
else
{

	$sql="UPDATE claim SET p_id='".$pid."',i_id='".$iid."',b_id='".$bid."',c_amt='".$amt."',c_app='".$app."',c_date='".$date."' WHERE c_id='".$id."'";
	$res=$conn->query($sql);		

	echo "<script type='text/javascript'>alert('Successfully updated :) !')</script>";
 
	}

}


//DELETING THE DETAILS
elseif (isset($_POST['delete'])) {
	
$conn=new mysqli("localhost","root","dpsagra","patientitbv");

$id=$_POST['c_id'];

$sqll="SELECT * FROM claim WHERE c_id='".$id."'";
$ress=$conn->query($sqll);
$row=mysqli_fetch_array($ress);

if ($row["c_id"]<>$id) {
	echo "<script type='text/javascript'>alert('Error - Wrong ID :( !')</script>";
}
else
{
	$sql="DELETE FROM claim WHERE c_id='".$id."'";
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