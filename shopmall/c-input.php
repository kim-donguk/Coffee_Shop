<!--��ǰ�� ����ϴ� ������-->

<?include("top.html");?>
<table height=100><tr><td></td></tr></table>
<table border=1 width=850 align=center cellspacing=0><tr><td>
<table align=center width=800 height=100><tr><td align=center><font size=5><b>��ǰ ���</b></td></tr></table> 
<table border=0 width=800 align=center>

<!--form�� �Էµ� ����� c-proecess.php�� ������-->
<form method=post action=c-process.php enctype='multipart/form-data'>
	<tr>
		<td width=100 align=right>��ǰ�з�</td>
		<td width=550>
			<select name=class>
			<option value=1>�����̾�����</option>
			<option value=2>�ڵ�帳</option>
			<option value=3>�ݵ���</option>
			<option value=4>��&����Ʈ</option>
			<option value=5>���ÿ�ǰ</option>
			</select>
		</td>
	</tr>
	<tr>
		<td align=right>��ǰ�ڵ�</td>
		<td><input type=text name=code size=20></td>
	</tr>
	<tr>
		<td align=right>��ǰ�̸�</td>
		<td><input type=text name=name size=70></td>
	</tr>
	<tr>
		<td align=right>��ǰ����</td>
		<td>
		<head>
			<meta charset='ANSI'>
			<title>A Simple Page with CKEditor</title>
			<!-- Make sure the path to CKEditor is correct. -->
			<script src='//cdn.ckeditor.com/4.10.1/standard/ckeditor.js'></script>
    </head>
    <body>
    
            <textarea name=content id='editor1' rows='10' cols='80'>
            </textarea> 
			<script>
                // Replace the <textarea id='editor1'> with a CKEditor
                // instance, using default configuration.
                CKEDITOR.replace( 'editor1' );
			</script>
            
    </body>
	
		</td>
	</tr>
	<tr>
		<td align=right>��ǰ�������</td>
		<td><input type=file size=30 name=contentfile></td>
	</tr>
	<tr>
		<td align=right>����</td>
		<td><input type=text name=price size=15>��</td>
	</tr>
	
	<tr>
		<td align=right>��ǰ����</td>
		<td><input type=file size=30 name=userfile></td>
	</tr>
	<tr>
		<td align=center colspan=5>
		<input type=submit value=����ϱ�></td>
	</tr>
</form>
</table>
</td></tr></table>
<table height=100><tr><td></td></tr></table>

<?include("bottom.html");?>
