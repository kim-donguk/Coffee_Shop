<!--���ι鿡 ��ǰ�� �߰��ϴ� ������-->

<?

if (!$UserID) {
	echo ("<script>
		window.alert('�α��� ����ڸ� ���� �����մϴ�')
		</script>"
		);
	echo ("<meta http-equiv='Refresh' content='0; url=login.php'>"); 
      exit;
} 

if (!isset($quantity)) $quantity = 1; //������ ������ ������ Ȯ���ϴ� �ڵ�

$con =   mysql_connect("localhost","root","apmsetup");
mysql_select_db("shopmall",$con);

// �̹� ���ι鿡 ���� �����̸� ������ ���� 
$result = mysql_query("select * from shoppingbag where session='$Session' and pcode='$code'", $con);
$total = mysql_num_rows($result);

if ($total) $oldnum = mysql_result($result, 0, "quantity");

if ($oldnum) {
     $quantity = $oldnum + $quantity;
	 
	 //�߰��Ϸ��� ��ǰ�� ���� ��� ������ ��ǰ���� ������ ���ؼ� ������Ʈ��
     mysql_query("update shoppingbag set quantity=$quantity where   session='$Session' and pcode='$code'", $con);
} else {
	
	//�߰��Ϸ��� ��ǰ�� ���� ��� ���ο� �����͸� ���ι鿡 �߰���
     mysql_query("insert into shoppingbag(id, session, pcode, quantity) values ('$UserID','$Session', '$code', $quantity)", $con);
}

mysql_close($con);	//�����ͺ��̽� ��������

echo ("<meta http-equiv='Refresh' content='0; url=showbag.php'>");

?>
