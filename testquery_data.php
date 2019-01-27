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

											////เริ่มเงื่อนไขแยกตามเวลา
												echo "<td>";
														
														$SQLCREATE_0609 = "select superintendent,message,date_time_send,group_id from information2_bot where date_time_send BETWEEN '2019-01-25 00:06:00' AND '2019-01-25 00:09:59' AND superintendent = '".$result["id_of_superintendent"]."' ORDER BY date_time_send ASC";
														$queryResult0609 = mysqli_query($link,$SQLCREATE_0609);		
														$num_run_rows0609 = mysqli_num_rows($queryResult0609);

														//echo "<br>".$SQLCREATE_0612."<br>";
														
														if($num_run_rows0609>0)
														{
															echo "<table>";
																while($result0609 = mysqli_fetch_array($queryResult0609,MYSQLI_ASSOC))
																{
																	echo "<tr><td>".$result0609["message"]."</td></tr>";
																}
															echo "</table>";
														}

												echo "</td>";


												echo "<td>";
														
														$SQLCREATE_0912 = "select superintendent,message,date_time_send,group_id from information2_bot where date_time_send BETWEEN '2019-01-25 00:09:00' AND '2019-01-25 00:12:59' AND superintendent = '".$result["id_of_superintendent"]."' ORDER BY date_time_send ASC";
														$queryResult0912 = mysqli_query($link,$SQLCREATE_0912);		
														$num_run_rows0912 = mysqli_num_rows($queryResult0912);

														//echo "<br>".$SQLCREATE_0612."<br>";
														
														if($num_run_rows0912>0)
														{
															echo "<table>";
																while($result0912 = mysqli_fetch_array($queryResult0912,MYSQLI_ASSOC))
																{
																	echo "<tr><td>".$result0912["message"]."</td></tr>";
																}
															echo "</table>";
														}

												echo "</td>";

												echo "<td>";
														
														$SQLCREATE_1215 = "select superintendent,message,date_time_send,group_id from information2_bot where date_time_send BETWEEN '2019-01-25 00:12:00' AND '2019-01-25 00:15:59' AND superintendent = '".$result["id_of_superintendent"]."' ORDER BY date_time_send ASC";
														$queryResult1215 = mysqli_query($link,$SQLCREATE_1215);		
														$num_run_rows1215 = mysqli_num_rows($queryResult1215);

														echo "<br>".$SQLCREATE_1215."<br>";
														
														if($num_run_rows1215>0)
														{
															echo "<table>";
																while($result1215 = mysqli_fetch_array($queryResult1215,MYSQLI_ASSOC))
																{
																	echo "<tr><td>".$result1215["message"]."</td></tr>";
																}
															echo "</table>";
														}

												echo "</td>";

												echo "<td>";
														
														$SQLCREATE_1518 = "select superintendent,message,date_time_send,group_id from information2_bot where date_time_send BETWEEN '2019-01-25 00:15:00' AND '2019-01-25 00:18:59' AND superintendent = '".$result["id_of_superintendent"]."' ORDER BY date_time_send ASC";
														$queryResult1518 = mysqli_query($link,$SQLCREATE_1518);		
														$num_run_rows1518 = mysqli_num_rows($queryResult1518);

														//echo "<br>".$SQLCREATE_0612."<br>";
														
														if($num_run_rows1518>0)
														{
															echo "<table>";
																while($result1518 = mysqli_fetch_array($queryResult1518,MYSQLI_ASSOC))
																{
																	echo "<tr><td>".$result1518["message"]."</td></tr>";
																}
															echo "</table>";
														}

												echo "</td>";



												/////จบเงื่อนไขแยกตามเวลา
											

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