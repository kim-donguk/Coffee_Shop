<!--��ǰ �ı� �ۼ� ������-->

<? include("top.html");?>
<table height=100><tr><td></td></tr></table>

<?    
//form�ȿ� ���� �����͵��� m-process.php�� ������ ����
echo("
	<center><h1>�Խ���</h1></center>
	<form method=post action=m-process.php enctype= 'multipart/form-data'>
	<table width=700 border=0 align=center>
		<tr>
			<td width=100 align=right>�̸� </td>
			<td width=600><input type=text name=writer size=20></td>
		</tr>
		<tr>
			<td align=right>����</td>
			<td><input type=file name='filename' size=45 maxlength=80></td>
		<tr>
		<tr>
			<td align=right>���� </td>
			<td><input type=text name=topic size=60></td>
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
				<textarea name=content id='editor1' rows='10' cols='80'>
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
				<input type=submit value=����ϱ�>
				<input type=reset value=�����>
			</td>
		</tr>
	</table>
	</form>
");

?>
<table height=100><tr><td></td></tr></table>
<? include("bottom.html");?>