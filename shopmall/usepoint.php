<!--������ ����Ʈ���� ����� ����Ʈ�� ���ҽ�Ű�� ������-->

<?
$con = mysql_connect("localhost","root","apmsetup");
mysql_select_db("shopmall",$con);
$result = mysql_query("select * from member where uid='$UserID'", $con);
$poind = mysql_result($result, 0, "poind");

if ($usepoint>$poind) {
	echo ("<script>
		window.alert('����Ʈ�� �����մϴ�.')
		</script>"
		);
	echo ("<meta http-equiv='Refresh' content='0; url=buy.php'>"); 
      exit;
} 

$result = mysql_query("update shoppingbag set usepoint=$usepoint where session='$Session'", $con);

mysql_close($con);

echo ("<meta http-equiv='Refresh' content='0; url=buy.php'>");

?>
