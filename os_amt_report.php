<?php
echo "<h1><Center>Outstanding Amount Report</center></h1>";
echo "<h3><Center>As on : <u>".date("m-d-20y")."</u></center></h3>";
//SHOWING THE DETAILS

$conn=new mysqli("localhost","root","dpsagra","patientitbv");


 
//query to search
$sqll="SELECT patientdetails.p_id, patientdetails.p_name, claim.c_id, claim.c_date,claim.c_amt,claim.c_app,payment.m_id,payment.m_amt,bill.b_os FROM patientdetails,claim,bill,payment WHERE patientdetails.p_id=claim.p_id AND bill.b_id=claim.b_id AND bill.b_id=payment.m_id";

 
$ress=$conn->query($sqll);
//$row=mysqli_fetch_assoc($ress);


echo "<body bgcolor=#EEECEC>";
echo "<table border=1 cellpadding=10 align=center> <tr bgcolor=#f44336>";
echo "<th> Patient ID </th>";
echo "<th> Patient Name </th>";
echo "<th> Claim ID </th>";
echo "<th> Claim Date </th>";
echo "<th> Claim Amount </th>";
echo "<th> Claim Approved Amount </th>";
echo "<th> Transaction ID </th>";
echo "<th> Total Paid Amount </th>";
echo "<th> Outstanding Amount </th>";
echo "</tr>";


while($row = $ress->fetch_assoc())

//while($row)
{
	echo "<br><tr align=center>";
	echo "<td>".$row["p_id"]."</td>";
	echo "<td>".$row["p_name"]."</td>";
	echo "<td>".$row["c_id"]."</td>";
	echo "<td>".$row["c_date"]."</td>";
	echo "<td>".$row["c_amt"]."</td>";
	echo "<td>".$row["c_app"]."</td>";
	echo "<td>".$row["m_id"]."</td>";
	echo "<td>".$row["m_amt"]."</td>";
	echo "<td>".$row["b_os"]."</td>";
	echo "</tr>";
};



?>