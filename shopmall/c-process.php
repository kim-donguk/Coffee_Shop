<!--��ǰ ����� �� �ִ� ������(c-input.php�̾....)-->

<?

if (!$code){
	echo("
		<script>
		window.alert('��ǰ�ڵ���� �����ϴ�. �ٽ� �Է��ϼ���.')
		history.go(-1)
		</script>
	");
	exit;
}

if (!$name){
	echo("
		<script>
		window.alert('��ǰ���� �����ϴ�. �ٽ� �Է��ϼ���.')
		history.go(-1)
		</script>
	");
	exit;
}

if(!$price){
	echo("
		<script>
		window.alert('������ �����ϴ�. �ٽ� �Է��ϼ���.')
		history.go(-1)
		</script>
	");
	exit;
}

if (!$userfile){
	echo("
		<script>
        window.alert('��ǰ ������ ������ �ּ���')
        history.go(-1)
        </script>
    ");
    exit;
} else {
    $savedir = "./photo1";
    $temp = $userfile_name;
    if (file_exists("$savedir/$temp")) {
         echo (" 
             <script>
             window.alert('������ ȭ�� �̸��� �̹� ������ �����մϴ�')
             history.go(-1)
             </script>
         ");
         exit;
    } else {
         copy($userfile, "$savedir/$temp");
         unlink($userfile);
    }
	$temp1 = $contentfile_name;
	if (file_exists("$savedir/$temp1")) {
         echo (" 
             <script>
             window.alert('������ ��ǰ������ �̹� ������ �����մϴ�')
             history.go(-1)
             </script>
         ");
         exit;
    } else {
         copy($contentfile, "$savedir/$temp1");
         unlink($contentfile);
    }
}

$con = mysql_connect("localhost","root","apmsetup");
mysql_select_db("shopmall",$con);

//c-input���� ���� �������� �̿��� ��ǰ ���� ���̺�(product)�� ������ �־���
$result = mysql_query("insert into product(class, code, name, content, contentfile, price, userfile, hit) values ($class, '$code', '$name', '$content', '$contentfile_name', '$price', '$userfile_name', 0)", $con);

mysql_close($con);		

if (!$result) {
   echo("
      <script>
      window.alert('�̹� ������� ��ǰ �ڵ��Դϴ�')
      history.go(-1)
      </script>
   ");
   exit;
} else {
   echo("
      <script>
      window.alert('��ǰ ����� �Ϸ�Ǿ����ϴ�')
      </script>
   ");
}
echo ("<meta http-equiv='Refresh' content='0; url=c-adminlist.php'>");

?>
