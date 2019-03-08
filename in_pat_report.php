<?php
echo "<h1><Center>In Patient Report</center></h1>";
echo "<h3><Center>As on : <u>".date("m-d-20y")."</u></center></h3>";
//SHOWING THE DETAILS

$conn=new mysqli("localhost","root","dpsagra","patientitbv");


 
//query to search
$sqll="SELECT admission.a_date, COUNT(CASE WHEN patientdetails.p_sex LIKE'm%' THEN 1 END) as a_no_of_males,COUNT(CASE WHEN patientdetails.p_sex LIKE 'f%' THEN 1 END) as a_no_of_females,COUNT(CASE WHEN patientdetails.p_sex LIKE 'o%' THEN 1 END) as a_no_of_others,COUNT(CASE WHEN patientdetails.p_sex LIKE 'm%'AND admission.a_ddes='death' THEN 1 END) as d_no_of_males,COUNT(CASE WHEN patientdetails.p_sex LIKE 'f%' AND admission.a_ddes LIKE 'd%' THEN 1 END) as d_no_of_females,COUNT(CASE WHEN patientdetails.p_sex LIKE 'o%' AND admission.a_ddes='death' THEN 1 END) as d_no_of_others,COUNT(CASE WHEN patientdetails.p_sex LIKE 'm%' AND admission.a_ddes='recovery' THEN 1 END) as r_no_of_males,COUNT(CASE WHEN patientdetails.p_sex LIKE 'f%' AND admission.a_ddes='recovery' THEN 1 END) as r_no_of_females,COUNT(CASE WHEN patientdetails.p_sex LIKE 'o%' AND admission.a_ddes='recovery' THEN 1 END) as r_no_of_others,COUNT(CASE WHEN patientdetails.p_sex LIKE 'm%' AND admission.a_ddes='otherwise discharge' THEN 1 END) as o_no_of_males,COUNT(CASE WHEN patientdetails.p_sex LIKE 'f%' AND admission.a_ddes='otherwise discharge' THEN 1 END) as o_no_of_females,COUNT(CASE WHEN patientdetails.p_sex LIKE 'o%' AND admission.a_ddes='otherwise discharge' THEN 1 END) as o_no_of_others FROM admission 
JOIN patientdetails
WHERE admission.p_id= patientdetails.p_id GROUP by admission.a_date";

 
/*$sqll="SELECT admission.a_date, COUNT(CASE WHEN patientdetails.p_sex LIKE "m%" THEN 1 END),COUNT(CASE WHEN patientdetails.p_sex LIKE "f%" THEN 1 END),COUNT(CASE WHEN patientdetails.p_sex LIKE "o%" THEN 1 END),COUNT(CASE WHEN patientdetails.p_sex LIKE "m%"AND admission.a_ddes="death" THEN 1 END) ,COUNT(CASE WHEN patientdetails.p_sex LIKE "f%" AND admission.a_ddes LIKE "d%" THEN 1 END)  ,COUNT(CASE WHEN patientdetails.p_sex LIKE "o%" AND admission.a_ddes="death" THEN 1 END)  ,COUNT(CASE WHEN patientdetails.p_sex LIKE "m%" AND admission.a_ddes="recovery" THEN 1 END)  ,COUNT(CASE WHEN patientdetails.p_sex LIKE "f%" AND admission.a_ddes="recovery" THEN 1 END) ,COUNT(CASE WHEN patientdetails.p_sex LIKE "o%" AND admission.a_ddes="recovery" THEN 1 END)  ,COUNT(CASE WHEN patientdetails.p_sex LIKE "m%" AND admission.a_ddes="otherwise discharge" THEN 1 END) ,COUNT(CASE WHEN patientdetails.p_sex LIKE "f%" AND admission.a_ddes="otherwise discharge" THEN 1 END) ,COUNT(CASE WHEN patientdetails.p_sex LIKE "o%"AND admission.a_ddes="otherwise discharge" THEN 1 END) FROM `admission` 
JOIN patientdetails
WHERE admission.p_id= patientdetails.p_id GROUP by admission.a_date";*/ 
 
 
$ress=$conn->query($sqll);
//$row=mysqli_fetch_assoc($ress);


echo "<body bgcolor=#EEECEC>";
echo "<table border=1 cellpadding=10 align=center> <tr bgcolor=#f44336>";
echo "<th> Date </th>";
echo "<th colspan=3> Admission </th>";
echo "<th colspan=3> Death </th>";
echo "<th colspan=3> Recoveries </th>";
echo "<th colspan=3> Other Wise Discharge </th>";
echo "</tr><tr>";
echo "<th> </th>";
echo "<th>Male</th>";
echo "<th>Female</th>"; 
echo "<th>Others</th>";
echo "<th>Male</th>";
echo "<th>Female</th>"; 
echo "<th>Others</th>";
echo "<th>Male</th>";
echo "<th>Female</th>"; 
echo "<th>Others</th>";
echo "<th>Male</th>";
echo "<th>Female</th>"; 
echo "<th>Others</th>";
echo "</tr>";


while($row = $ress->fetch_assoc())

//while($row)
{
	echo "<br><tr align=center>";
	echo "<td>".$row["a_date"]."</td>";
	echo "<td>".$row["a_no_of_males"]."</td>";
	echo "<td>".$row["a_no_of_females"]."</td>";
	echo "<td>".$row["a_no_of_others"]."</td>";
	echo "<td>".$row["d_no_of_males"]."</td>";
	echo "<td>".$row["d_no_of_females"]."</td>";
	echo "<td>".$row["d_no_of_others"]."</td>";
	echo "<td>".$row["r_no_of_males"]."</td>";
	echo "<td>".$row["r_no_of_females"]."</td>";
	echo "<td>".$row["r_no_of_others"]."</td>";
	echo "<td>".$row["o_no_of_males"]."</td>";
	echo "<td>".$row["o_no_of_females"]."</td>";
	echo "<td>".$row["o_no_of_others"]."</td>";
	echo "</tr>";
};



?>