<!--m-modify.php���� ���� ������ �̿��� �ı� ���� ������-->
<?

if (!$writer){
	echo("
		<script>
		window.alert('�̸��� �����ϴ�. �ٽ� �Է��ϼ���')
		history.go(-1)
		</script>
	");
	exit;
}

if (!$topic){
	echo("
		<script>
		window.alert('������ �����ϴ�. �ٽ� �Է��ϼ���')
		history.go(-1)
		</script>
	");
	exit;
}

if (!$content){
	echo("
		<script>
		window.alert('������ �����ϴ�. �ٽ� �Է��ϼ���')
		history.go(-1)
		</script>
	");
	exit;
}

$con = mysql_connect("localhost","root","apmsetup");
mysql_select_db("shopmall",$con);
$result = mysql_query("select * from comment where id=$id", $con);

// ���� �ʵ尪�� ������ �׸��� ������



// ���� ������ ���̺� ������
mysql_query("update comment set writer='$writer', passwd='$passwd', topic='$topic', content='$content' where id=$id", $con);

echo("<meta http-equiv='Refresh' content='0; url=comment.php'>");

mysql_close($con);

?>
