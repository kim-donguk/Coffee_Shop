<!--��ǰ ������ �����ϴ� ���̺�(c-modify�� �̾..)-->
<?

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

$con = mysql_connect("localhost","root","apmsetup");
mysql_select_db("shopmall",$con);
	
// ���� ��ǰ �̹����� �״�� ����ϴ� ���
if (!$userfile & !$contentfile){
	$result = mysql_query("update product set class=$class, name='$name', content='$content', price=$price where code='$code'", $con);

}
if($userfile & !$contentfile) {

     // ���� ��ǰ �̹��� ������ ����
	$tmp = mysql_query("select userfile from product where code='$code'", $con);
	$fname = mysql_result($tmp, 0, "userfile");
    $savedir = "./photo";
	unlink("$savedir/$fname");
	
    // ������ ÷���� �̹��� ������ ����	
    $temp = $userfile_name;
    if (file_exists("$savedir/$temp")) {
         echo (" 
             <script>
             window.alert('������ ȭ�� �̸��� ������ �����մϴ�')
             history.go(-1)
             </script>
         ");
         exit;
    } else {
         copy($userfile, "$savedir/$temp");
         unlink($userfile);
    }
	$result = mysql_query("update product set class=$class, name='$name', content='$content', price=$price, userfile='$userfile_name' where code='$code'", $con);
}
if(!$userfile & $contentfile) {
	     // ���� ��ǰ �̹��� ������ ����
	$tmp = mysql_query("select contentfile from product where code='$code'", $con);
	$fname = mysql_result($tmp, 0, "contentfile");
    $savedir = "./photo";
	unlink("$savedir/$fname");
	
    // ������ ÷���� �̹��� ������ ����	
    $temp = $contentfile_name;
    if (file_exists("$savedir/$temp")) {
         echo (" 
             <script>
             window.alert('������ ȭ�� �̸��� ������ �����մϴ�')
             history.go(-1)
             </script>
         ");
         exit;
    } else {
         copy($contentfile, "$savedir/$temp");
         unlink($contentfile);
    }
	$result = mysql_query("update product set class=$class, name='$name', content='$content', price=$price, contentfile='$contentfile_name' where code='$code'", $con);
}
if($userfile & $contentfile){
		     // ���� ��ǰ �̹��� ������ ����
	$tmp = mysql_query("select * from product where code='$code'", $con);
	$fname = mysql_result($tmp, 0, "contentfile");
	$fname1 = mysql_result($tmp, 0, "userfile");
	
    $savedir = "./photo1";
	unlink("$savedir/$fname");
	unlink("$savedir/$fname1");
    // ������ ÷���� �̹��� ������ ����	
    $temp = $contentfile_name;
	$temp1 = $userfile_name;
    copy($contentfile, "$savedir/$temp");
	copy($userfile, "$savedir/$temp1");
    unlink($contentfile);
	unlink($userfile);
    
	$result = mysql_query("update product set class=$class, name='$name', content='$content', price=$price, userfile='$userfile_name', contentfile='$contentfile_name' where code='$code'", $con);
}
	
if (!$result) {
	echo("
      <script>
      window.alert('��ǰ ������ �����߽��ϴ�')
      </script>
    ");
    exit;
} else {
	echo("
      <script>
      window.alert('��ǰ ������ �Ϸ�Ǿ����ϴ�')
      </script>
   ");
} 

mysql_close($con);		//�����ͺ��̽� ��������

echo ("<meta http-equiv='Refresh' content='0; url=c-adminlist.php'>");

?>

