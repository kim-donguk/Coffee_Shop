<!--�������� �� �ۼ� ������(�����ڸ� ���� ����)-->

<?
	if($UserID != 'chanjin'){
	echo("
		<script>
		window.alert('�����ڸ� �ۼ��� �� �ֽ��ϴ�.')
		history.go(-1)
		</script>
	");
	exit;
	}
?>
<?
	include ("top.html");
?>
<table height=100><tr><td></td></tr></table>
<?    

//�������� �߰� 
//form�� ���� �����͵��� p-process.php�� ����
echo("
	<table border=1 align=center width=750 cellspacing=0><tr><td>
	<center><h1>������ �۾���</h1></center>
	<form method=post action=p-process.php  enctype= 'multipart/form-data'>
	
	<table width=700 border=0 align=center>
		<tr>
			<td width=100 align=right>���� </td>
			<td width=600><input type=text name=topic size=60></td>
		</tr>	
		<tr>
			<td align=right>����</td>
			<td><input type=file name='filename' size=45 maxlength=80></td>
	
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
			<td align=center colspan=2>
				<input type=submit value=����ϱ�>
				<input type=reset value=�����>
			</td>
		</tr>
	</table>
	</form>
	</td></tr></table>
");

?>
<table height=100><tr><td></td></tr></table>
<?
	include ("bottom.html");
?>
