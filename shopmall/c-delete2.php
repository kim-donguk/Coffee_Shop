<!--c.delete.php���� ���� (��)�� ������ ? ������ ������-->
<?

$con = mysql_connect("localhost","root","apmsetup");
mysql_select_db("shopmall",$con);

// ��ǰ �̹��� ������ photo ���� ������ ����
$tmp = mysql_query("select userfile from product where code='$code'", $con);
$fname = mysql_result($tmp, 0, "userfile");
$savedir = "./photo1";
unlink("$savedir/$fname");

//��ǰ �ڵ忡 �´� �����Ͱ� �����ͺ��̽����� ������
$result = mysql_query("delete from product where code='$code'", $con);

// ��ǰ�� �������(���� �Ұ�)
if (!$result) {
   echo("
      <script>
      window.alert('��ǰ ������ �����߽��ϴ�')
      history.go(-1)
      </script>
   ");
   exit;
} else { //��ǰ�� ������ ����
   echo("
      <script>
      window.alert('��ǰ�� ���������� �����Ǿ����ϴ�')
      </script>
   ");
}

mysql_close($con);

echo ("<meta http-equiv='Refresh' content='0; url=c-adminlist.php'>");

?>
