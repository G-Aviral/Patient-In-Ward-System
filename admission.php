<?php



//SAVING THE DETAILS
if (isset($_POST['save'])) {
	
$conn=new mysqli("localhost","root","dpsagra","patientitbv");
//fetch details from form
$id=$_POST['a_id'];
$pid=$_POST['p_id'];
$date=$_POST['a_date'];
$no=$_POST['a_no'];
$doa=$_POST['a_doa'];
$ades=$_POST['a_ades'];
$did=$_POST['d_id'];
$dod=$_POST['a_dod'];
$ddes=$_POST['a_ddes'];

$sql="INSERT INTO admission (a_id,p_id,a_date,a_no,a_doa,a_ades,d_id,a_dod,a_ddes) VALUES ('".$id."','".$pid."','".$date."','".$no."','".$doa."','".$ades."','".$did."','".$dod."','".$ddes."')";
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

$id=$_POST['a_id'];
$pid=$_POST['p_id'];
$date=$_POST['a_date'];
$no=$_POST['a_no'];
$doa=$_POST['a_doa'];
$ades=$_POST['a_ades'];
$did=$_POST['d_id'];
$dod=$_POST['a_dod'];
$ddes=$_POST['a_ddes'];

$sqll="SELECT * FROM admission WHERE a_id='".$id."'";
$ress=$conn->query($sqll);
$row=mysqli_fetch_array($ress);

if ($row["a_id"]<>$id) {
	echo "<script type='text/javascript'>alert('Error - Wrong ID :( !')</script>";
}
else
{

	$sql="UPDATE admission SET p_id='".$pid."',a_date='".$date."',a_no='".$no."',a_doa='".$doa."',a_ades='".$ades."',d_id='".$did."',a_dod='".$dod."',a_ddes='".$ddes."' WHERE a_id='".$id."'";
	$res=$conn->query($sql);		

	echo "<script type='text/javascript'>alert('Successfully updated :) !')</script>";
 
	}

}


//DELETING THE DETAILS
elseif (isset($_POST['delete'])) {
	
$conn=new mysqli("localhost","root","dpsagra","patientitbv");

$id=$_POST['a_id'];

$sqll="SELECT * FROM admission WHERE a_id='".$id."'";
$ress=$conn->query($sqll);
$row=mysqli_fetch_array($ress);

if ($row["a_id"]<>$id) {
	echo "<script type='text/javascript'>alert('Error - Wrong ID :( !')</script>";
}
else
{
	$sql="DELETE FROM admission WHERE a_id='".$id."'";
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