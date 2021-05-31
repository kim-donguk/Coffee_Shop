<?

$con = mysql_connect("localhost", "root", "apmsetup");
mysql_select_db("shopmall", $con);
	
mysql_query("delete from shoppingbag where id='$UserID'", $con);
mysql_close($con);
	
SetCookie("UserID", "", time());
SetCookie("UserName", "", time());

SetCookie("Session", "", time());
	 
echo ("<meta http-equiv='Refresh' content='0; url=main.html'>");

//로그아웃 페이지(맨위에다가 추가하면 쿠키설정에 오류가 생겨 밑에다가 적어둠)
?>
