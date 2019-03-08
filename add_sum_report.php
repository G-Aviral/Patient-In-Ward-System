<?php
echo "<h1><Center>Admission Summary Report</center></h1>";
echo "<h3><Center>As on : <u>".date("m-d-20y")."</u></center></h3>";
//SHOWING THE DETAILS

$conn=new mysqli("localhost","root","dpsagra","patientitbv");


 
//query to search
$sqll="SELECT admission.a_doa,patientdetails.p_id, patientdetails.p_name, treatment.t_type,doctor.d_id,doctor.d_name FROM patientdetails, admission,  treatment, doctor WHERE patientdetails.p_id=admission.p_id AND doctor.d_id=admission.d_id AND treatment.t_id=patientdetails.p_id";

 
$ress=$conn->query($sqll);
//$row=mysqli_fetch_assoc($ress);


echo "<body bgcolor=#EEECEC>";
echo "<table border=1 cellpadding=10 align=center> <tr bgcolor=#f44336>";
echo "<th> Admission Date </th>";
echo "<th> Patient ID </th>";
echo "<th> Patient Name </th>";
echo "<th> Treatment Type </th>";
echo "<th> Doctor ID </th>";
echo "<th> Doctor Name </th>";
echo "</tr>";


while($row = $ress->fetch_assoc())

//while($row)
{
	echo "<br><tr align=center>";
	echo "<td>".$row["a_doa"]."</td>";
	echo "<td>".$row["p_id"]."</td>";
	echo "<td>".$row["p_name"]."</td>";
	echo "<td>".$row["t_type"]."</td>";
	echo "<td>".$row["d_id"]."</td>";
	echo "<td>".$row["d_name"]."</td>";
	echo "</tr>";
};



?>