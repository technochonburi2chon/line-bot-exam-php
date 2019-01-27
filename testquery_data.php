<?php
	include("connect.php");

						
						$SQLCREATE_SETDATA = "select id_of_superintendent,name_superintendent,police_station from id_superintendent";


						$queryResultinsertSetdata = mysqli_query($link,$SQLCREATE_SETDATA);		
						
						$num_run_rows = mysqli_num_rows($queryResultinsertSetdata);
					
						
						if ($num_run_rows>0) 
						{
							echo "<table>";
								echo "<tr><th>สถานีตำรวจ</th><th>06:00 น.-09:00 น.</th><th>09:00 น. - 12:00 น.</th><th>12:00 น. - 15:00 น.</th><th>15:00 น. - 18:00 น.</th></tr>";
										while($result = mysqli_fetch_array($queryResultinsertSetdata,MYSQLI_ASSOC))
										{

												echo "<tr><td>".$result["name_superintendent"]."</td>";

												echo "<td>";
														
														$SQLCREATE_0612 = "select superintendent,message,date_time_send,group_id from information2_bot where date_time_send BETWEEN '2019-01-25 00:06:00' AND '2019-01-25 00:09:59' AND superintendent = '".$result["id_of_superintendent"]."' ORDER BY date_time_send ASC";
														$queryResult0612 = mysqli_query($link,$SQLCREATE_0612);		
														$num_run_rows0612 = mysqli_num_rows($queryResult0612);

														echo "<br>".$SQLCREATE_0612."<br>";
														
														if($num_run_rows0612>0)
														{
															echo "<table>";
																while($result0612 = mysqli_fetch_array($queryResult0612,MYSQLI_ASSOC))
																{
																	echo "<tr><td>".$result0612["message"]."</td></tr>";
																}
															echo "</table>";
														}

												echo "</td>";
											

											echo "</tr>";

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