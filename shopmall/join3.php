<!--ȸ�� ���� ������(ȸ�� ���� �����ͺ��̽��� �Է�)-->


<? 
include ("top.html"); 

if (!$uid) {
	echo ("<script>
		window.alert('����� ID�� �Է��ϼ���');
		history.go(-1);
		</script>");
	exit;
}
if (!$upass1) {
	echo ("<script>
		window.alert('��й�ȣ�� �Է��� �ּ���');
		history.go(-1);
		</script>");
	exit;
}
if ($upass1 != $upass2) {
	echo ("<script>
		window.alert('��й�ȣ�� ��й�ȣ Ȯ���� ��ġ���� �ʽ��ϴ�');
		history.go(-1);
		</script>");
	exit;
}
if (!$uname) {
	echo ("<script>
		window.alert('�̸��� �Է��� �ּ���');
		history.go(-1);
		</script>");
	exit;
}	
	
$con = mysql_connect("localhost", "root", "apmsetup");
mysql_select_db("shopmall", $con);

//join2.php���� ���� ������� ȸ���������̺�(member)�� ������
$result = mysql_query("insert into member(uid, upass,uname, mphone, email, zipcode, addr1, addr2, approved) values ('$uid', '$upass1', '$uname', '$mphone', '$email', '$zip', '$addr1', '$addr2', 0)", $con);
	

	
mysql_close($con);

	
?>

<table height=50><tr><td></td></tr></table>
<table width=670 align=center id=t1 cellspacing=0 height=50>
	<tr>
		<td align=center><img src="./photo/join3_1.png"></td>
	</tr>
	<tr>
		<td align=center><a href="main.html"><img src="./photo/join3_2.png"></a></td>
	</tr>
</table>
<table height=50><tr><td></td></tr></table>

<? include ("bottom.html"); ?>