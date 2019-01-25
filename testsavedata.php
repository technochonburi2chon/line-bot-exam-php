<?php
	include("connect.php");

				$dtz = new DateTimeZone("Asia/Bangkok"); //Your timezone
				$now = new DateTime(date("Y-m-d H:i:s"), $dtz);
				date_default_timezone_set("Asia/Bangkok");
				$today = date("Y-m-d H:i:s");

						
						$SQLCREATE_SETDATA = "insert into information2_bot(superintendent,message,date_time_send,date_time_create,remark) values('U87213f7d7819dc75e712850f6c8bd34b','ทดสอบการบันทึกข้อมูล','".$today."','".$today."','หมายเหตุ')";


						$queryResultinsertSetdata = mysqli_query($link,$SQLCREATE_SETDATA);						
					
						
						
						if (!$queryResultinsertSetdata) 
						{
							mysqli_rollback($link);
							echo "เกิดข้อผิดพลาดในการบันทึกข้อมูล";
							exit();
						}
						else
						{	
							echo "บันทึกข้อมูลเสร็จสมบูรณ์";
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