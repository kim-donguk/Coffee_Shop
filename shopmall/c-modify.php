<!--��ǰ�� �����ϴ� ������(c-adminlist.php���� ������ ������ ? ������)-->

<?

$con=mysql_connect("localhost","root","apmsetup");
mysql_select_db("shopmall",$con);

//c-adminlist.php���� ���� �ڵ� ������ �̿��� ��ǰ ���� ���̺�(product)���� �ڵ忡 �´� ������ ������
$result = mysql_query("select * from product where code='$code'", $con);

$class=mysql_result($result,0,"class");
$name=mysql_result($result,0,"name");
$price=mysql_result($result,0,"price");
$content=mysql_result($result,0,"content");
$userfile=mysql_result($result,0,"userfile");
$contentfile=mysql_result($result,0,"contentfile");


//form�� �Էµ� ������ c-modify2�� ����
echo ("
    <table align=center border=0 width=650>     
	<form method=post action=c-modify2.php?code=$code enctype='multipart/form-data'>
		<tr>
			<td width=100 align=center>��ǰ�ڵ�</td>
			<td width=550><b>$code</b></td>
		</tr>
		<tr>
			<td align=center>��ǰ�з�</td>
			<td><select name=class>");

switch($class) {
    case 1:
		echo ("<option value=1 selected>�����̾�����</option>
			<option value=2>�ڵ�帳</option>
            <option value=3>�ݵ���</option>
			<option value=4>��&����Ʈ</option>
			<option value=5>���ÿ�ǰ</option>");
		break;
	case 2:
		echo ("<option value=1>�����̾�����</option>
			<option value=2 selected>�ڵ�帳</option>
            <option value=3>�ݵ���</option>
			<option value=4>��&����Ʈ</option>
			<option value=5>���ÿ�ǰ</option>");
		break;
	case 3:
		echo ("<option value=1>�����̾�����</option>
			<option value=2>�ڵ�帳</option>
            <option value=3 selected>�ݵ���</option>
			<option value=4>��&����Ʈ</option>
			<option value=5>���ÿ�ǰ</option>");
		break;
	case 4:
		echo ("<option value=1>�����̾�����</option>
			<option value=2>�ڵ�帳</option>
            <option value=3>�ݵ���</option>
			<option value=4 selected>��&����Ʈ</option>
			<option value=5>���ÿ�ǰ</option>");
		break;
	case 5:
		echo ("<option value=1>�����̾�����</option>
			<option value=2>�ڵ�帳</option>
            <option value=3>�ݵ���</option>
			<option value=4>��&����Ʈ</option>
			<option value=5 selected>���ÿ�ǰ</option>");
		break;
}

echo ("</select></td></tr>
	<tr><td align=center>��ǰ�̸�</td><td><input type=text name=name size=70 value='$name'></td></tr>
	<tr><td align=center>��ǰ����</td>
		<td>
		<head>
			<meta charset='ANSI'>
			<title>A Simple Page with CKEditor</title>
			<!-- Make sure the path to CKEditor is correct. -->
			<script src='//cdn.ckeditor.com/4.10.1/standard/ckeditor.js'></script>
    </head>
    <body>
    
            <textarea name=content id='editor1' rows='10' cols='80'>$content
            </textarea> 
			<script>
                // Replace the <textarea id='editor1'> with a CKEditor
                // instance, using default configuration.
                CKEDITOR.replace( 'editor1' );
			</script>
            
    </body>
	
		</td></tr>
	<tr><td align=center>�������</td><td><input type=file size=30 name=contentfile><-- $contentfile</td></tr>
	<tr><td align=center>��ǰ����</td><td><input type=text name=price size=15 value=$price>��</td></tr>
	<tr><td align=center>��ǰ����</td><td><input type=file size=30 name=userfile><-- $userfile</td></tr>
	<tr><td align=center colspan=2><input type=submit value=�����Ϸ�></tr>
	</form>
	</table>");

mysql_close($con);

?>
