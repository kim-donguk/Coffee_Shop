<!--��� ��ǰ�� �����ִ� ���̺�(���⼭ ������ ������ ������)-->

<?include("top.html");?> <!--top.html�� ������-->
<table height=100><tr><td></td></tr></table>
<?

$con = mysql_connect("localhost","root","apmsetup");
mysql_select_db("shopmall",$con);

//�����̾� ����
echo("<table height=50 width=690 align=center><tr><td><font size=5><b>�����̾� ����</b></font></td></tr></table>");

//�����ͺ��̽����� �����̾� ����(class=1)�� ������ ������
$result = mysql_query("select * from product where class=1 order by code", $con);
$total = mysql_num_rows($result);

echo ("<table border=1 width=690 align=center cellspacing=0 id=t1>
	<tr bgcolor=#D4F4FA id=t1><td id=t1 align=center><font size=2>��ǰ�ڵ�</td>
	<td id=t1 colspan=2 align=center><font size=2>��ǰ��</td>
	<td id=t1 align=center><font size=2>�ǸŰ���</td>
	<td id=t1 align=center><font size=2>����/����</td></tr>");
						
//������ ���̽����� ������ �����͵��� ���̺� �־���						
if (!$total) {
  echo("<tr id=t1><td id=t1 colspan=6 align=center>���� ��ϵ� ��ǰ�� �����ϴ�</td></tr>");
} else {
	$counter = 0;
	while ($counter < $total):
	
		$code=mysql_result($result,$counter,"code");
		$name=mysql_result($result,$counter,"name");
		$userfile=mysql_result($result,$counter,"userfile");
		$price=mysql_result($result,$counter,"price");
		
		echo ("
		   <tr id=t1><td id=t1 width=100 align=center><font size=2>$code</td>
			 <td id=t1 align=center width=30><img src=./photo1/$userfile width=40 height=40 border=0></td>
			   <td id=t1 width=350 align=left><a href=p-show.php?code=$code><font size=2>$name</a></td>
			   <td id=t1 align=right width=70><font size=2>$price&nbsp;��</td>
			   <td id=t1 width=70 align=center><font size=2><a href=c-modify.php?code=$code>����</a>/<a href=c-delete.php?code=$code>����</a></td></tr>");

		$counter++;
	endwhile;
}
echo ("</table>");

//�ڵ�帳
echo("<table height=50 width=690 align=center ><tr><td><font size=5><b>�ڵ�帳</b></font></td></tr></table>");

//�����ͺ��̽����� �ڵ�帳(class=2)�� ������ ������
$result = mysql_query("select * from product where class=2 order by code", $con);
$total = mysql_num_rows($result);

echo ("<table border=1 width=690 align=center cellspacing=0 id=t1>
	<tr bgcolor=#D4F4FA id=t1><td id=t1 align=center><font size=2>��ǰ�ڵ�</td>
	<td colspan=2 align=center id=t1><font size=2>��ǰ��</td>
	<td align=center id=t1><font size=2>�ǸŰ���</td>
	<td align=center id=t1><font size=2>����/����</td></tr>");
						

//������ ���̽����� ������ �����͵��� ���̺� �־���						
if (!$total) {
  echo("<tr id=t1><td id=t1 colspan=6 align=center>���� ��ϵ� ��ǰ�� �����ϴ�</td></tr>");
} else {
	$counter = 0;
	while ($counter < $total):
	
		$code=mysql_result($result,$counter,"code");
		$name=mysql_result($result,$counter,"name");
		$userfile=mysql_result($result,$counter,"userfile");
		$price=mysql_result($result,$counter,"price");
		
		echo ("
		   <tr id=t1><td id=t1 width=100 align=center><font size=2>$code</td>
			 <td id=t1 align=center width=30><img src=./photo1/$userfile width=40 height=40 border=0></td>
			   <td id=t1 width=350 align=left><a href=p-show.php?code=$code><font size=2>$name</a></td>
			   <td id=t1 align=right width=70><font size=2>$price&nbsp;��</td>
			   <td id=t1 width=70 align=center><font size=2><a href=c-modify.php?code=$code>����</a>/<a href=c-delete.php?code=$code>����</a></td></tr>");

		$counter++;
	endwhile;
}

echo ("</table>");
	    
//�ݵ���
echo("<table id=t1 height=50 width=690 align=center><tr><td><font size=5><b>�ݵ���</b></font></td></tr></table>");
//�����ͺ��̽����� �ݵ���(class=3)�� ������ ������
$result = mysql_query("select * from product where class=3 order by code", $con);
$total = mysql_num_rows($result);

echo ("<table id=t1 border=1 width=690 align=center cellspacing=0>
	<tr id=t1 bgcolor=#D4F4FA><td id=t1 align=center><font size=2>��ǰ�ڵ�</td>
	<td id=t1 colspan=2 align=center><font size=2>��ǰ��</td>
	<td id=t1 align=center><font size=2>�ǸŰ���</td>
	<td id=t1 align=center><font size=2>����/����</td></tr>");
							
							
//������ ���̽����� ������ �����͵��� ���̺� �־���
if (!$total) {
  echo("<tr id=t1><td id=t1 colspan=6 align=center>���� ��ϵ� ��ǰ�� �����ϴ�</td></tr>");
} else {
	$counter = 0;
	while ($counter < $total):
	
		$code=mysql_result($result,$counter,"code");
		$name=mysql_result($result,$counter,"name");
		$userfile=mysql_result($result,$counter,"userfile");
		$price=mysql_result($result,$counter,"price");
		
		echo ("
		   <tr id=t1><td id=t1 width=100 align=center><font size=2>$code</td>
			 <td id=t1 align=center width=30><img src=./photo1/$userfile width=40 height=40 border=0></td>
			   <td id=t1 width=350 align=left><a href=p-show.php?code=$code><font size=2>$name</a></td>
			   <td id=t1 align=right width=70><font size=2>$price&nbsp;��</td>
			   <td id=t1 width=70 align=center><font size=2><a href=c-modify.php?code=$code>����</a>/<a href=c-delete.php?code=$code>����</a></td></tr>");

		$counter++;
	endwhile;
}

//��&����Ʈ
echo("<table height=50 width=690 align=center id=t1><tr id=t1><td id=t1><font size=5><b>��&����Ʈ</b></font></td></tr></table>");
//�����ͺ��̽����� ��,����Ʈ(class=4)�� ������ ������
$result = mysql_query("select * from product where class=4 order by code", $con);
$total = mysql_num_rows($result);

echo ("<table border=1 width=690 align=center cellspacing=0 id=t1>
	<tr bgcolor=#D4F4FA><td align=center id=t1><font size=2>��ǰ�ڵ�</td>
	<td colspan=2 align=center id=t1><font size=2>��ǰ��</td>
	<td align=center id=t1><font size=2>�ǸŰ���</td>
	<td align=center id=t1><font size=2>����/����</td></tr>");
	
//������ ���̽����� ������ �����͵��� ���̺� �־���							
if (!$total) {
  echo("<tr id=t1><td id=t1 colspan=6 align=center>���� ��ϵ� ��ǰ�� �����ϴ�</td></tr>");
} else {
	$counter = 0;
	while ($counter < $total):
	
		$code=mysql_result($result,$counter,"code");
		$name=mysql_result($result,$counter,"name");
		$userfile=mysql_result($result,$counter,"userfile");
		$price=mysql_result($result,$counter,"price");
		
		echo ("
		   <tr id=t1><td id=t1 width=100 align=center><font size=2>$code</td>
			 <td id=t1 align=center width=30><img src=./photo1/$userfile width=40 height=40 border=0></td>
			   <td id=t1 width=350 align=left><a href=p-show.php?code=$code><font size=2>$name</a></td>
			   <td id=t1 align=right width=70><font size=2>$price&nbsp;��</td>
			   <td id=t1 width=70 align=center><font size=2><a href=c-modify.php?code=$code>����</a>/<a href=c-delete.php?code=$code>����</a></td></tr>");

		$counter++;
	endwhile;
}

echo ("</table>");


//���ÿ�ǰ
echo("<table height=50 width=690 align=center><tr><td><font size=5><b>���ÿ�ǰ</b></font></td></tr></table>");
//�����ͺ��̽����� ���ÿ�ǰ(class=5)�� ������ ������
$result = mysql_query("select * from product where class=5 order by code", $con);
$total = mysql_num_rows($result);

echo ("<table id=t1 border=1 width=690 align=center cellspacing=0>
	<tr id=t1 bgcolor=#D4F4FA><td align=center><font size=2>��ǰ�ڵ�</td>
	<td id=t1 colspan=2 align=center><font size=2>��ǰ��</td>
	<td id=t1 align=center><font size=2>�ǸŰ���</td>
	<td id=t1 align=center><font size=2>����/����</td></tr>");
							
if (!$total) {
  echo("<tr id=t1><td id=t1 colspan=6 align=center>���� ��ϵ� ��ǰ�� �����ϴ�</td></tr>");
} else {
	$counter = 0;
	while ($counter < $total):
	
		$code=mysql_result($result,$counter,"code");
		$name=mysql_result($result,$counter,"name");
		$userfile=mysql_result($result,$counter,"userfile");
		$price=mysql_result($result,$counter,"price");
		
		echo ("
		   <tr id=t1><td id=t1 width=100 align=center><font size=2>$code</td>
			 <td id=t1 align=center width=30><img src=./photo1/$userfile width=40 height=40 border=0></td>
			   <td id=t1 width=350 align=left><a href=p-show.php?code=$code><font size=2>$name</a></td>
			   <td id=t1 align=right width=70><font size=2>$price&nbsp;��</td>
			   <td id=t1 width=70 align=center><font size=2><a href=c-modify.php?code=$code>����</a>/<a href=c-delete.php?code=$code>����</a></td></tr>");

		$counter++;
	endwhile;
}

echo ("</table>");
echo ("</table>");
mysql_close($con);

?>
<table height=100><tr><td></td></tr></table>
<?include("bottom.html");?>

