<?php
	include("connect.php");

						
						$SQLCREATE_SETDATA = "select id_of_superintendent,name_superintendent,police_station";


						$queryResultinsertSetdata = mysqli_query($link,$SQLCREATE_SETDATA);		
						
						$num_run_rows = mysqli_num_rows($queryResultinsertSetdata);
					
						
						
						if (num_run_rows>0) 
						{
							echo "<table>";
								echo "<tr><th>ID</th><th>ยศ ชื่อ สกุล</th><th>สังกัด</th></tr>";
										while($result = mysqli_fetch_array($queryResultinsertSetdata,MYSQLI_ASSOC))
										{
												echo "<tr><td>".$result["id_of_superintendent"]."</td><td>".$result["name_superintendent"]."</td><td>".$result["police_station"]."</td>";
										}
							echo "</table>";
						}
						else
						{	
							echo "ไม่พบข้อมูล";
						}
														

	mysqli_close($link);


			

function format_date_insert($datainput)
{
		if($datainput!="")
		{
				$aray_time = explode(" ",$datainput);

				$array_date = explode("/",$datainput);
				return  $array_date[2]."-".$array_date[1]."-".$array_date[0]." ".$aray_time;
		}
		else
		{
			return null;
		}

}

	
?>