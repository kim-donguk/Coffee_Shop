<!--��ǰ �ı� ���� ������-->

<?

$con=mysql_connect("localhost","root","apmsetup");
mysql_select_db("shopmall",$con);

$result=mysql_query("select * from comment where id=$id",$con);

// �����ϰ��� �ϴ� ���� �Խù����� ���� ������ �׸��� ������
$writer=mysql_result($result,0,"writer");
$topic=mysql_result($result,0,"topic");
$content=mysql_result($result,0,"content");


echo("<center><h1>�Խ���</h1></center>
	<form method=post action=m-mprocess.php?id=$id>
	<table width=700 border=0>
		<tr>
			<td width=100 align=right>�̸� </td>
			<td width=600><input type=text name=writer size=20 value='$writer'></td>
		</tr>
		<tr>
			<td align=right>���� </td>
			<td><input type=text name=topic size=60 value='$topic'></td>
		</tr>
		<tr>
			<td align=right>���� </td>
			<td>
					<head>
						<meta charset='ANSI'>
						<title>A Simple Page with CKEditor</title>
						<!-- Make sure the path to CKEditor is correct. -->
						<script src='//cdn.ckeditor.com/4.10.1/standard/ckeditor.js'></script>
					</head>
				<body>
					<form>
						<textarea name=content id='editor1' rows='10' cols='80'>$content
						</textarea> 
						<script>
							// Replace the <textarea id='editor1'> with a CKEditor
							// instance, using default configuration.
							CKEDITOR.replace( 'editor1' );
						</script>
					
					</form>
				</body>
			
			</td>
		</tr>
		<tr>
			<td align=right>��ȣ </td>
			<td><input type=password name=passwd size=15></td>
		</tr>
		<tr>
			<td align=center colspan=2>
				<input type=submit value=�����Ϸ�>
				<input type=reset value=�����></td>
		</tr>
	</table>
	</form>");

mysql_close($con);

?>
