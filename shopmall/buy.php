<!--zipcode2.php�� �������� �Լ�-->
<script language='Javascript'>
	function go_zip(){
		window.open('zipcode2.php', 'zipcode',   'width=470, height=180, scrollbars=yes');
	}
</script>
<?include ("top.html")?> <!--top.html ������ �ҷ���-->
<table height=100><tr><td></td></tr></table>

<table width=1000 align=center>
<tr><td align=center><font size=3><img src=./photo/buy.png width=1000></td></tr>
<tr><td align=right><font size=2><b><? echo $UserName; ?></b>���� ���� ���� īƮ ����</td>
</table>

<?
$con =   mysql_connect("localhost","root","apmsetup");
mysql_select_db("shopmall",$con);

// ��ü ���ι� ���̺��� Ư�� ������� ���� �������� �о��
$result = mysql_query("select * from shoppingbag where session='$Session'", $con);
$total = mysql_num_rows($result);

// ������ ���� ���ι� ������ ���̺� �ִ´�.
echo ("
	<table border=1 width=1000 align=center id=t1 cellspacing=0>
		<tr bgcolor=#F6F6F6 id=t1>
			<td width=100 align=center id=t1><font size=2>��ǰ����</td>
			<td width=300 align=center id=t1><font size=2>��ǰ�̸�</td>
			<td width=90 align=center id=t1><font size=2>����(�ܰ�)</td>
			<td width=50 align=center id=t1><font size=2>����</td>
			<td width=100 align=center id=t1><font size=2>ǰ���հ�</td>
		</tr>
");

if (!$total) {
	//��ǰ�� �ƹ��͵� ���� �� nopick.png �̹��� ���� ���
     echo("<tr id=t1><td id=t1 colspan=6 align=center><font size=2><img src=./photo/nopick.png width=1000></td></tr></table>");
} else {

    $counter=0;      //���ι��� ������ ������� �������� ���� ����
    $totalprice=0;    // �� ���� �ݾ�  

	
	//counter�� �´� ���ι��� ������ �����ȿ� �����ϰ� ���̺�ȿ� �־���
    while ($counter < $total) :
       $pcode = mysql_result($result, $counter, "pcode");
       $quantity = mysql_result($result, $counter, "quantity");
   
       $subresult = mysql_query("select * from product where code='$pcode'", $con);
       $userfile = mysql_result($subresult, 0, "userfile");
       $pname = mysql_result($subresult, 0, "name");

       $price = mysql_result($subresult, 0, "price");
       
       $subtotalprice = $quantity * $price;
       $totalprice = $totalprice + $subtotalprice; 

		echo ("
			<tr id=t1>
				<td align=center id=t1>
					<a href=# onclick=\"window.open('./photo1/$userfile', '_new', 'width=450,   height=450')\"><img src='./photo1/$userfile' width=50   border=0></a></td>
				<td align=center id=t1 width=700><font size=2><a   href=p-show.php?code=$pcode>$pname </a></td>
				<td align=center id=t1><font size=2>$price&nbsp;��</td>
				<td align=center id=t1>
					$quantity
				</td>
				<td align=center id=t1 width=100><font size=2>$subtotalprice&nbsp;��</td>
	
			</tr>");

		$counter++;
    endwhile;
 	$poind = $totalprice / 100;  //������ ����Ʈ
    echo("<tr id=t1 bgcolor=#F6F6F6 border=1>
				<td colspan=2 align=right id=t1></td>
				<td id=t1 colspan=2><font size=2>������</font>:<font size=2 color=red> $poind</font> <font size=2>��</font></td>
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
					<td align=center><font color=red>$totalprice</font></td>
					");
					
	//�����ݾ��� 3���� �̻��̸� ��ۺ�(delivery) �ȳ���
	if($totalprice>=30000){
		$delivery='������';
		$total1=$totalprice;
	}else{   //3���� �̸��� ��� ��ۺ� 2500��
		$delivery=2500;
		$total1=$delivery + $totalprice;
	}
	
	$usepoint = mysql_result($result, 0, "usepoint");   //��� ���� ����Ʈ
	echo("
					<td bgcolor=#F6F6F6 align=center>��ۺ�</td>
					<td align=center><font color=#1DDB16>$delivery</font></td>
					<td bgcolor=#F6F6F6 align=center>����Ʈ</td>
					<td align=center>
						<form method=post action=usepoint.php><input type=text name=usepoint size=3 value=$usepoint>&nbsp;<input type=submit value=����>
					</td></form>
	");
	
	$total1 = $total1-$usepoint;  // ����Ʈ�� ?�� �� �� ���� �ݾ�
	echo("
					<td bgcolor=#F6F6F6 align=center>�ѱݾ�</td>
					<td align=center><font color=red>$total1</font></td>
				</tr>");
}

mysql_close($con);	//�����ͺ��̽� ��������


echo("<table height=50><tr><td></td></tr></table>
	<table width=1000 align=center>
		<tr>
			<td><img src=./photo/buy1.png></td>
			<td align=right><a href=showbag.php><img src=./photo/privious.png></a></td>
		</tr>
	</table>");
	
echo("<table width=1000 align=center border=0>
		<tr>
			<td colspan=2><hr size=2 width=1000 color=#EAEAEA></td>
		</tr>
		<tr>
			<td width=150><img src=./photo/plus.png width=10><font size=2>�������ܼ���</font></td>
			<td><font size=2>������ü</td>
		</tr>
		<tr>
			<td width=150><img src=./photo/plus.png width=10><font size=2>�Ա��Ͻ� ����</font></td>
			<td>
				<font size=2>�Ա� ����: <b>�泲���� 544-22-0643411 (������: �赿��)</b></font>
				<font size=2 color=#008100>
				<br>- �����Ͻ� ��ǰ�� �Ա� Ȯ���� ��۵Ǹ�, �ֹ� ���� ��Ȳ�� My Page���� Ȯ���Ͻ� �� �ֽ��ϴ�.
				<br>- ��ǰ ��� ������ �ֹ� ��Ҹ� ���Ͻø� My Page���� ���� �ֹ� ��� ��û�� �Ͻø� �˴ϴ�.
				<br>- ��ǰ�� ��� ������ �Ŀ� ���� ��Ҹ� ���Ͻø� ������(��ȭ:010-5509-0020)�� �����ּ���.</font>
			</td>
		</tr>
		<tr>
			<td colspan=2><hr size=2 width=1000 color=#EAEAEA></td>
		</tr>
		<form method=post action=endshopping.php?total=$totalprice name=buy>
		<tr>	
			<td><img src=./photo/plus.png width=10><font size=2><font size=2>��� ������</td>
			<td><input type=text name=receiver size=10></td>
		</tr>
		<tr>
			<td><img src=./photo/plus.png width=10><font size=2><font size=2>��ȭ��ȣ</td>
			<td><input type=text name=phone   size=20></td>
		</tr>
		<tr>
			<td height=30><img src=./photo/plus.png width=10><font size=2><font size=2>����ּ�</td>
			<td align=left><input type=text size=6 name=zip readonly=readonly>
				<font size=2>[<a href='javascript:go_zip()'>�����ȣ�˻�</a>]<br> 
				<input type=text size=55 name=addr1 readonly=readonly style='font-size:10pt; font-family:Tahoma;'>
				<input type=text size=30 name=addr2   style='font-size:10pt; font-family:Tahoma;'>
			</td>
		</tr>
		<tr>
			<td><img src=./photo/plus.png width=10><font size=2><font size=2>�ֹ��䱸����</td>
			<td><textarea name=message rows=3 cols=65></textarea></td>
		</tr>
		<tr>
			<td colspan=2><hr size=2 width=1000 color=#EAEAEA></td>
		</tr>
		<tr>
			<td align=center colspan=2>
				<input type='image' src='./photo/buysuccess.png' width=200>
			</td>
		</tr>
	</table>
	</form>
	");


?>
<table height=100><tr><td></td></tr></table>
<?include ("bottom.html")?>
