<!--���ι鿡 ��� ��ǰ �����ִ� ������-->

<? include ("top.html");?>
<?
if (!isset($UserID)) {
	echo ("<script>
		window.alert('�α��� ����ڸ� �̿��Ͻ� �� �־��')
		<meta http-equiv='Refresh' content='0; url=login.php'>
		</script>");
	exit;
}
?>
<table height=100><tr><td></td></tr></table>
<table width=1000 border=0 align=center>
<tr><td align=center><font size=3><img src=./photo/shopbag.png width=1000></td></tr>
<tr><td align=right><font size=2><b><? echo $UserName; ?></b>���� ���� ���� īƮ ����</td>
</table>

<?
$con =   mysql_connect("localhost","root","apmsetup");
mysql_select_db("shopmall",$con);

// ��ü ���ι� ���̺��� Ư�� ������� ���� �������� �о��
$result = mysql_query("select * from shoppingbag where session='$Session'", $con);
$total = mysql_num_rows($result);

echo ("
	<table border=1 width=1000 align=center id=t1 cellspacing=0>
		<tr bgcolor=#F6F6F6 id=t1>
			<td width=100 align=center id=t1><font size=2>��ǰ����</td>
			<td width=300 align=center id=t1><font size=2>��ǰ�̸�</td>
			<td width=90 align=center id=t1><font size=2>����(�ܰ�)</td>
			<td width=50 align=center id=t1><font size=2>����</td>
			<td width=100 align=center id=t1><font size=2>ǰ���հ�</td>
			<td width=50 align=center id=t1><font size=2>����</td>
		</tr>
");

if (!$total) {
     echo("<tr id=t1><td id=t1 colspan=6 align=center><font size=2><img src=./photo/nopick.png width=1000></td></tr></table>");
} else {

    $counter=0;
    $totalprice=0;    // �� ���� �ݾ�  

    while ($counter < $total) :
       $pcode = mysql_result($result, $counter, "pcode");  //��ǰ �ڵ�
       $quantity = mysql_result($result, $counter, "quantity"); //��ǰ ����
   
       $subresult = mysql_query("select * from product where code='$pcode'", $con);
       $userfile = mysql_result($subresult, 0, "userfile"); 
       $pname = mysql_result($subresult, 0, "name"); //��ǰ �̸�

       $price = mysql_result($subresult, 0, "price"); //��ǰ ����
     
       $subtotalprice = $quantity * $price;
       $totalprice = $totalprice + $subtotalprice; 

		echo ("
			<tr id=t1>
				<td align=center id=t1>
					<a href=# onclick=\"window.open('./photo1/$userfile', '_new', 'width=450,   height=450')\"><img src='./photo1/$userfile' width=50   border=0></a></td>
				<td align=center id=t1><font size=2><a   href=p-show.php?code=$pcode>$pname </a></td>
				<td align=right id=t1><font size=2>$price&nbsp;��</td>
				<td align=center id=t1>
					<form method=post action=qmodify.php?pcode=$pcode><input type=text name=newnum size=3 value=$quantity>&nbsp;<input type=submit value=����>
				</td></form>
				<td align=right id=t1><font size=2>$subtotalprice&nbsp;��</td>
				<td align=center id=t1>
					<form method=post action=itemdelete.php?pcode=$pcode><input type=submit value=����>
				</td></form>
			</tr>");

		$counter++;
    endwhile;
 	$poind = $totalprice / 100;
    echo("<tr id=t1 bgcolor=#F6F6F6 border=1>
				<td colspan=4 align=right id=t1></td>
				<td id=t1><font size=2>������</font>:<font size=2 color=red> $poind</font> <font size=2>��</font></td>
				<td id=t1><font size=2>�հ� : <font size=2 color=red>$totalprice</font>  <font size=2>��</font></td>
		</tr></table>");
		
		
	echo("<table height=40><tr><td></td></tr></table>
		<table width=1000 border=0 cellspacing=0 align=center>
			<tr>
				<td><font size=2><b>$UserName ���Բ��� �����Ͻ� �����Դϴ�.</b></td>
			</tr>
		</table>");
	echo("<table width=1000 border=1 cellspacing=0 align=center>
				<tr height=50>
					<td bgcolor=#F6F6F6 align=center>��ǰ����</td>
					<td align=center><font color=red>$totalprice</font></td>");
	if($totalprice>=30000){
		$delivery='������';
		$total1=$totalprice;
	}else{
		$delivery=2500;
		$total1=$delivery + $totalprice;
	}
	
	echo("
					<td bgcolor=#F6F6F6 align=center>��ۺ�</td>
					<td align=center><font color=#1DDB16>$delivery</font></td>
					<td bgcolor=#F6F6F6 align=center>�ѱݾ�</td>
					<td align=center><font color=red>$total1</font></td>
				</tr>");
}

mysql_close($con);	//�����ͺ��̽� ��������

echo ("<table width=1000 border=0 align=center>
	<tr><td align=right><font size=2><a href=buy.php><img src=./photo/pick.png width=100 height=40></a> <a href=main.html><img src=./photo/pick1.png width=100 height=40></a></td></tr></table>");

?>
<table height=100><tr><td></td></tr></table>

<? include ("bottom.html");?>