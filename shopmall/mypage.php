<!--����������-->

<?include ("top.html");?>
<table height=100><tr><td></td></tr></table>
<?

$con = mysql_connect("localhost", "root", "apmsetup");
mysql_select_db("shopmall",   $con);
$result = mysql_query("select * from member where uid='$UserID'", $con);
	
$uid = mysql_result($result, 0,   "UID"); //���̵�
$uname = mysql_result($result, 0,   "UNAME"); //�̸�
$email = mysql_result($result, 0,   "EMAIL"); //�̸���
$zip = mysql_result($result, 0,   "ZIPCODE"); //�ּ�
$addr1 = mysql_result($result, 0,   "ADDR1"); //�ּ�
$addr2 = mysql_result($result, 0,   "ADDR2"); //�ּ�
$mphone = mysql_result($result, 0,   "MPHONE"); //��ȭ��ȣ
$poind = mysql_result($result, 0, "poind"); //��� ���� ����Ʈ

?>
<table width=1000 border=0 align=center>
	<tr>
		<td align=center><img src=./photo/mypage.png width=1000></td>
	</tr>
	<tr>
		<td align=right><a href=umodify.php><font size=2>ȸ����������</a></td>
	</tr>
</table>

<table border=1 width=1000 align=center cellspacing=0>
	<tr>
		<td width=100 bgcolor=#A2FFFF><font size=2>�̸�</td>
		<td width=120><font size=2><? echo $uname; ?></td>
	</tr>
	<tr>
		<td width=80 bgcolor=#A2FFFF><font size=2>�޴���ȭ</td>
		<td width=140><font size=2><? echo $mphone; ?></td>
	</tr>
	<tr>
		<td width=80 bgcolor=#A2FFFF><font size=2>�̸���</td>
		<td width=170><font size=2><? echo $email; ?></td></tr>
	</tr>
	<tr>
		<td width=80 bgcolor=#A2FFFF><font size=2>����Ʈ �ܿ���</td>
		<td width=170><font size=2><? echo $poind; ?></td>
	</tr>
	<tr>
		<td bgcolor=#A2FFFF><font size=2>�ּ�</td>
		<td><font   size=2><? echo $zip . " " . $addr1 . " " . $addr2;   ?></td>
	</tr>
</table>
<br><br>

<?
$result = mysql_query("select * from receivers where id='$UserID' order by buydate desc", $con);
$total = mysql_num_rows($result);

echo ("
	<table width=1000 border=0 align=center>
	<tr><td   align=center><img src=./photo/buyclear.png width=1000></td></tr>
	<tr><td>* <font color=red   size=2>�ֹ� ��ǰ�� ��� ���� �ܰ��̸� �¶������� �ֹ�   ��Ұ� �����մϴ�.</td></tr>
	<tr><td>* <font size=2>������̰ų� ���� �Ϸ�� ��ǰ�� ���� ��ǰ �� ȯ�� ��û��     ��� ������(��ȭ: 010-5509-0020)�� ���ǹٶ��ϴ�.</td></tr>
	</table>

	<table border=1 width=1000 align=center cellspacing=0 id=t1>
	<tr bgcolor=#EAEAEA id=t1>
		<td align=center id=t1><font size=2>���Ź�ȣ</td>
		<td align=center id=t1><font size=2>��������</td>
		<td align=center id=t1><font size=2>�ֹ�����</td>
		<td align=center id=t1><font size=2>�ݾ�</td>
		<td align=center id=t1><font size=2>�ֹ�����</td>
	</tr>");	

if ($total > 0) {	
	$counter = 0;
	while($counter < $total) :
		$session = mysql_result($result, $counter, "session");
		$buydate = mysql_result($result, $counter, "buydate");
		$ordernum = mysql_result($result, $counter, "ordernum");
		$status = mysql_result($result, $counter, "status");
		$oldstatus = $status;
	 
		switch ($status) {
		  case 1:
				$status = "�ֹ���û";
				break;
		  case 2:
				$status = "�ֹ�����";
				break;
		  case 3: 
				$status = "����غ���";
				break;
		  case 4:
				$status = "�����";
				break;
		  case 5:
				$status = "��ۿϷ�";
				break;
		  case 6:
				$status = "���ſϷ�";
				break;
		}
	 
		$subresult = mysql_query("select * from orderlist where session='$session'",   $con);
        $subtotal =  mysql_num_rows($subresult);

        $subcounter=0;
        $totalprice=0;

        while ($subcounter <   $subtotal) :
             $pcode = mysql_result($subresult, $subcounter, "pcode");
             $quantity = mysql_result($subresult, $subcounter, "quantity");
      
             $tmpresult = mysql_query("select * from product where code='$pcode'", $con);
             $pname = mysql_result($tmpresult, 0, "name");
			 $price = mysql_result($tmpresult, 0, "price");
       
             $subtotalprice = $quantity * $price;
             $totalprice = $totalprice + $subtotalprice;
             $subcounter++;
        endwhile;
	
		$items = $subtotal - 1;
	
        echo ("<tr>
			<td align=center id=t1><font size=2>
				<a href=# onclick=\"window.open('detailview.php?ordernum=$ordernum', '_new',   'width=940, height=250, scrollbars=yes');\">$ordernum</a></td>
			<td align=center id=t1><font size=2>$buydate</td>
			<td align=center id=t1><font size=2>$pname �� $items ��</td>
			<td align=center id=t1><font size=2>$totalprice ��</td>
			<td align=center id=t1><font size=2>$status");
      
		if ($oldstatus < 4) echo ("<br>(<a href=ordercancel.php?ordernum=$ordernum>�ֹ����</a>)");

		echo ("</td></tr>");

		$counter++;
	endwhile;

} else {

	echo ("<tr id=t1><td align=center colspan=5 id=t1><font size=2><b>�ֹ� ������ �������� �ʽ��ϴ�</b></td></tr>");

}

echo ("</table>");

mysql_close($con);	

?>
<table height=100><tr><td></td></tr></table>
<?include ("bottom.html");?>
