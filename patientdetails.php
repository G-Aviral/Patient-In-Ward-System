<?php

//SAVING THE DETAILS
if (isset($_POST['save'])) {
	
$conn=new mysqli("localhost","root","dpsagra","patientitbv");
//fetch details from form
$id=$_POST['p_id'];
$name=$_POST['p_name'];
$date=$_POST['p_date'];
$dob=$_POST['p_dob'];
$sex=$_POST['p_sex'];
$status=$_POST['p_status'];
$add=$_POST['p_add'];
$city=$_POST['p_city'];
$state=$_POST['p_state'];
$pin=$_POST['p_pin'];
$num=$_POST['p_num'];
$email=$_POST['p_email'];
$fname=$_POST['p_fname'];
$fnum=$_POST['p_fnum'];
$ename=$_POST['p_ename'];
$enum=$_POST['p_enum'];
$rel=$_POST['p_rel'];


$sql="INSERT INTO patientdetails (p_id,p_name,p_date,p_dob,p_sex,p_status,p_add,p_city,p_state,p_pin,p_num,p_email,p_fname,p_fnum,p_ename,p_enum,p_rel) VALUES ('".$id."','".$name."','".$date."','".$dob."','".$sex."','".$status."','".$add."','".$city."','".$state."','".$pin."','".$num."','".$email."','".$fname."','".$fnum."','".$ename."','".$enum."','".$rel."')";

$res=$conn->query($sql);
 if($res){
		echo "<script type='text/javascript'>alert('Successfully saved :) !')</script>";
	}
	else{
		echo "<script type='text/javascript'>alert('Error :( !')</script>";
}
}


//DELETING THE DETAILS
elseif (isset($_POST['delete'])) {
	
$conn=new mysqli("localhost","root","dpsagra","patientitbv");

$id=$_POST['p_id'];

$sqll="SELECT * FROM patientdetails WHERE p_id='".$id."'";
$ress=$conn->query($sqll);
$row=mysqli_fetch_array($ress);

if ($row["p_id"]<>$id) {
	echo "<script type='text/javascript'>alert('Error - Wrong ID :( !')</script>";
}
else
{
	$sql="DELETE FROM patientdetails WHERE p_id='".$id."'";
	$res=$conn->query($sql);		
	
	echo "<script type='text/javascript'>alert('Successfully deleted :) !')</script>";
 
	}

}




//UPDATING THE DETAILS
elseif (isset($_POST['edit'])) {
$conn=new mysqli("localhost","root","dpsagra","patientitbv");


$id=$_POST['p_id'];
$name=$_POST['p_name'];
$date=$_POST['p_date'];
$dob=$_POST['p_dob'];
$sex=$_POST['p_sex'];
$status=$_POST['p_status'];
$add=$_POST['p_add'];
$city=$_POST['p_city'];
$state=$_POST['p_state'];
$pin=$_POST['p_pin'];
$num=$_POST['p_num'];
$email=$_POST['p_email'];
$fname=$_POST['p_fname'];
$fnum=$_POST['p_fnum'];
$ename=$_POST['p_ename'];
$enum=$_POST['p_enum'];
$rel=$_POST['p_rel'];


$sqll="SELECT * FROM patientdetails WHERE p_id='".$id."'";
$ress=$conn->query($sqll);
$row=mysqli_fetch_array($ress);

if ($row["p_id"]<>$id) {
	echo "<script type='text/javascript'>alert('Error - Wrong ID :( !')</script>";
}
else
{ 
	$sql="UPDATE patientdetails SET p_name='".$name."' , p_date='".$date."' , p_dob='".$dob."' , p_sex='".$sex."' , p_status='".$status."' , p_add='".$add."' , p_city='".$city."' , p_state='".$state."' , p_pin='".$pin."' , p_num='".$num."' , p_email='".$email."' , p_fname='".$fname."' , p_fnum='".$fnum."' , p_ename='".$ename."' , p_enum='".$enum."' , p_rel='".$rel."' WHERE p_id='".$id."'";
	
	$res=$conn->query($sql);		
	echo "<script type='text/javascript'>alert('Successfully updated :) !')</script>";
	
}


}


//CLOSING THE WEBPAGE
elseif (isset($_POST['exit'])) {
	echo "<script type='text/javascript'>alert('Goodbye :) !')</script>";
echo "<script>window.close();</script>"	;
}

?>