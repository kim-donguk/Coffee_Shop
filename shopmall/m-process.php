<!--��ǰ �ı⸦ �����ͺ��̽��� �����ϴ� ������-->
<?

if (!$writer){
	echo("
		<script>
		window.alert('�̸��� �����ϴ�. �ٽ� �Է��ϼ���.')
		history.go(-1)
		</script>
	");
	exit;
}

if(!$topic){
	echo("
		<script>
		window.alert('������ �����ϴ�. �ٽ� �Է��ϼ���.')
		history.go(-1)
		</script>
	");
	exit;
}

if(!$content){
	echo("
		<script>
		window.alert('������ �����ϴ�. �ٽ� �Է��ϼ���.')
		history.go(-1)
		</script>
	");
	exit;
}

// �����ͺ��̽��� ����
$con = mysql_connect("localhost","root","apmsetup");
mysql_select_db("shopmall",$con);

$result=mysql_query("select id from comment",$con);
$total=mysql_num_rows($result);

// �ۿ� ���� id�ο�
if (!$total){
	$id = 1;
} else {
	$id = $total + 1;
}
if ($filename) {	
   $savedir = "./photo3";	//÷�� ������ ����� ����
   $temp = $filename_name;
   copy($filename, "$savedir/$temp");
   unlink($filename);
}

$wdate = date("Y-m-d");	//   �� �� ��¥ ����

// ���̺� �Է� �� ������ ����
mysql_query("insert into comment(id, writer, passwd, topic, content, hit, wdate, code) values($id, '$writer','$passwd', '$topic', '$content', 0, '$wdate', '$filename_name')", $con);

mysql_close($con);	// �����ͺ��̽� ��������

//show.php ���α׷��� ȣ���ϸ鼭 ���̺� �̸��� ����
echo("<meta http-equiv='Refresh' content='0; url=comment.php'>");

?>
