<!--�� ����Ʈ-->

<?
//�α��� ����ڰ� �ƴҰ�� ���� �������� �ǵ��ư�
if (!$UserID) {
	echo ("<script>
		window.alert('�α��� ����ڸ� ���� �� �ֽ��ϴ�')
		</script>"
		);
	echo ("<meta http-equiv='Refresh' content='0; url=login.php'>"); 
      exit;
} 

if (!isset($quantity)) $quantity = 1; //������ ������ ������ Ȯ���ϴ� �ڵ�

$con =   mysql_connect("localhost","root","apmsetup");
mysql_select_db("shopmall",$con);

// �̹� ���ι鿡 ���� �����̸� ������ ���� 
$result = mysql_query("select * from zzim where session='$Session' and pcode='$code'", $con);
$total = mysql_num_rows($result);

if ($total){
	echo ("<script>
		window.alert('�̹� ��ǰ�� �ֽ��ϴ�.')
		</script>"
		);
	echo ("<meta http-equiv='Refresh' content='0; url=login.php'>"); 
      exit;
}else{
	//�� ���̺� �����͸� �߰���
	mysql_query("insert into zzim(id, session, pcode) values ('$UserID','$Session', '$code')", $con);
}

mysql_close($con);	//�����ͺ��̽� ��������

echo ("<meta http-equiv='Refresh' content='0; url=zzimbag.php'>");

?>
