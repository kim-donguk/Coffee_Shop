<!--�� ������-->
<? include ("top.html");?>

<?
//�α��� �Ǿ����� ���� �� �α��� �ϴ� ������(login.php)�� �Ѿ
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
<tr><td align=center><font size=3><img src=./photo/wishlist.png width=1000></td></tr>
<tr><td align=right><font size=2><b><? echo $UserName; ?></b>���� ���� ����Ʈ</td>
</table>

<?
$con =   mysql_connect("localhost","root","apmsetup");
mysql_select_db("shopmall",$con);

// ��ü ���ι� ���̺��� Ư�� ������� ���� �������� �о��
$result = mysql_query("select * from zzim where session='$Session'", $con);
$total = mysql_num_rows($result);

echo ("
	<table border=1 width=1000 align=center id=t1 cellspacing=0>
		<tr bgcolor=#F6F6F6 id=t1>
			<td width=100 align=center id=t1><font size=2>��ǰ����</td>
			<td width=300 align=center id=t1><font size=2>��ǰ�̸�</td>
			<td width=90 align=center id=t1><font size=2>����(�ܰ�)</td>
			<td width=100 align=center id=t1><font size=2>���� ����Ʈ</td>
			<td width=50 align=center id=t1><font size=2>����</td>
		</tr>
");

if (!$total) {
     echo("<tr id=t1><td id=t1 colspan=6 align=center><font size=2><img src=./photo/nopick.png width=1000></td></tr></table>");
} else {

    $counter=0;
    $totalprice=0;    // �� ���� �ݾ�  

    while ($counter < $total) :
       $pcode = mysql_result($result, $counter, "pcode");
   
       $subresult = mysql_query("select * from product where code='$pcode'", $con);
       $userfile = mysql_result($subresult, 0, "userfile");
       $pname = mysql_result($subresult, 0, "name");

       $price = mysql_result($subresult, 0, "price");
       
       $subprice = $price / 100;

		echo ("
			<tr id=t1>
				<td align=center id=t1>
					<a href=# onclick=\"window.open('./photo1/$userfile', '_new', 'width=450,   height=450')\"><img src='./photo1/$userfile' width=50   border=0></a></td>
				<td align=center id=t1><font size=2><a   href=p-show.php?code=$pcode>$pname </a></td>
				<td align=right id=t1><font size=2>$price&nbsp;��</td>
				
				<td align=right id=t1><font size=2>$subprice&nbsp;��</td>
				<td align=center id=t1>
					<form method=post action=wishdelete.php?pcode=$pcode><input type=submit value=����>
				</td></form>
			</tr>");

		$counter++;
    endwhile;
 	$poind = $totalprice / 100;
    echo("</table>");
		
	
}

mysql_close($con);	//�����ͺ��̽� ��������


?>
<table height=100><tr><td></td></tr></table>

<? include ("bottom.html");?>