<!--��ǰ �ı� ���� ������-->

<?

$con=mysql_connect("localhost","root","apmsetup");
mysql_select_db("shopmall",$con);

$tmp = mysql_query("select * from comment where id=$id", $con);
$fname = mysql_result($tmp, 0, "code");
$savedir = "./photo3";
unlink("$savedir/$fname");
	

mysql_query("delete from comment where id=$id",$con);
echo("
	<script>
	window.alert('���� ���� �Ǿ����ϴ�.');
	</script>
");

// ������ �ۺ��� �� ��ȣ�� ū �Խù��� �� ��ȣ�� 1�� ����
$tmp = mysql_query("select id from comment order by id desc", $con);
$last = mysql_result($tmp, 0, "id");     // ���� ������ �� ��ȣ ����

$i = $id + 1;       // ������ ���� ��ȣ���� 1�� ū �� ��ȣ���� ����
while($i <= $last):
	mysql_query("update comment set id=id-1 where id=$i", $con);
	$i++;
endwhile;

// �� ���� ����� �����ֱ� ���� �� ��� ���� ���α׷� ȣ��
 echo("<meta http-equiv='Refresh' content='0; url=comment.php'>");

mysql_close($con);

?>
