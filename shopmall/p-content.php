<!--�������� ������-->

<? include ("top.html");?>
<table height=100><tr><td></td></tr></table>
<?
$pid = $id;
$con=mysql_connect("localhost","root","apmsetup");
mysql_select_db("shopmall",$con);
$result=mysql_query("select * from customer where id=$id",$con);

// �� �ʵ忡 �ش��ϴ� �����͸� �̾� ���� ����
$id=mysql_result($result,0,"id");

$topic=mysql_result($result,0,"topic");
$hit=mysql_result($result,0,"hit");

$hit = $hit +1;   //��ȸ���� �ϳ� ����
mysql_query("update customer set hit=$hit where id=$id",$con);

$wdate=mysql_result($result,0,"wdate");

$content=mysql_result($result,0,"content");

// ���̺�κ��� ���� ������ ȭ�鿡 ���÷���
echo("
	<table border=0 width=1000 align=center>
		<tr><td align=center><img src=./photo/list1.png width=1000></td></tr>
	</table>

	<table border=1 width=1000 align=center id=t1 cellspacing=0>
		<tr id=t1>
			<td id=t1 bgcolor=#F6F6F6><font size=5 color=#A09BFF><b>$topic</font></td>
		</tr>
		<tr id=t1 align=right>
			<td width=100 id=t1><font size=2>�����: $wdate &nbsp;&nbsp; ��ȸ: $hit</font></td>
		</tr>
		<tr id=t1>
			<td id=t1><pre>$content</pre></td>
		</tr>
	</table>

	<table   border=0 width=1000 align=center>
	<tr><td align=right>
	<a href=p-pass2.php?id=$id&mode=0><img src=./photo/write2.png width=50 height=25></a>
	<a href=p-pass2.php?id=$id&mode=1><img src=./photo/delete1.png width=50 height=25></a>
	<a href=customer.php><img src=./photo/list2.png width=50 height=25></a>
	</td></tr>
	</table>
");

?>

<?
 
$con = mysql_connect("localhost","root","apmsetup");
mysql_select_db("shopmall",$con);
$result = mysql_query("select * from customer order by id desc", $con);
$total = mysql_num_rows($result);

echo("
	<table border=0 width=1000 align=center >
		
		<tr> ");
//			<td align=center>
//				<form method=post action=p-search.php?board=$board>
//				<select name=field>
//					<option value=writer>�۾���</option>
//					<option value=topic>����</option>
//					<option value=content>����</option>
//				</select>
//				�˻���<input type=text name=key size=13>
//				<input type=submit value=ã��>
//			</td>
//				</form>
echo("
			<td><font size=2><b>�ڷ�� $total ��</b></font></td>
		</tr>
	</table>
	<table border=1 width=1000 align=center cellspacing=0 id=t1>
		<tr id=t1 bgcolor=#4ABFD3>
			<td id=t1 align=center width=100><b>��ȣ</b></td>
			<td id=t1 align=center width=600><b>����</b></td>
			<td id=t1 align=center width=100><b>�۾���</b></td>
			<td id=t1 align=center width=150><b>��¥</b></td>
			<td id=t1 align=center width=50><b>��ȸ</b></td>
		</tr>
	
");

if (!$total){
	echo("
		<tr><td colspan=5 align=center>���� ��ϵ� ���� �����ϴ�.</td></tr>
	");
} else {

	if   ($cpage=='') $cpage=1;    // $cpage -  ���� ������ ��ȣ
	$pagesize = 10;                // $pagesize - �� �������� ����� ��� ����

	$totalpage = (int)($total/$pagesize);
	if (($total%$pagesize)!=0) $totalpage = $totalpage + 1;

	$counter=0;

	while($counter<$pagesize):
		$newcounter=($cpage-1)*$pagesize+$counter;
		if ($newcounter == $total) break;

		$id=mysql_result($result,$newcounter,"id"); //�������� ��ȣ
		$content=mysql_result($result,$newcounter,"content"); //����
		$topic=mysql_result($result,$newcounter,"topic"); //
		$hit=mysql_result($result,$newcounter,"hit"); //��ȸ��
		$wdate=mysql_result($result,$newcounter,"wdate"); //�ֹ� ��ȣ
		
		if($id==$pid){
		echo("
			<tr id=t1 bgcolor=F6F6F6>
				<td id=t1 align=center>$id</td>
				<td id=t1 align=left><a href=p-content.php?id=$id><font color=black><b>$topic</font></a></td>
				<td id=t1 align=center>������</td>
				<td id=t1 align=center>$wdate</td>
				<td id=t1 align=center>$hit</td>
			</tr>
		");
		}else{
		echo("
			<tr id=t1>
				<td id=t1 align=center>$id</td>
				<td id=t1 align=left><a href=p-content.php?id=$id><font color=black><b>$topic</font></a></td>
				<td id=t1 align=center>������</td>
				<td id=t1 align=center>$wdate</td>
				<td id=t1 align=center>$hit</td>
			</tr>
		");
		}
		$counter = $counter + 1;

	endwhile;

	echo("
		</table>
		<table border=0 width=1000 align=center><tr><td>");
		   
	// ȭ�� �ϴܿ� ������ ��ȣ ���
	if ($cblock=='') $cblock=1;   // $cblock - ���� ������ ��ϰ�
	$blocksize = 5;             // $blocksize - ȭ��� ����� ������ ��ȣ ����

	$pblock = $cblock - 1;      // ���� ����� ���� ��� - 1
	$nblock = $cblock + 1;     // ���� ����� ���� ��� + 1
		
	// ���� ����� ù ������ ��ȣ
	$startpage = ($cblock - 1) * $blocksize + 1;	

	$pstartpage = $startpage - 1;  // ���� ����� ������ ������ ��ȣ
	$nstartpage = $startpage + $blocksize;  // ���� ����� ù ������ ��ȣ

	if ($pblock > 0)        // ���� ����� �����ϸ� [�������] ��ư�� Ȱ��ȭ
		echo ("[<a href=p-content.php?cblock=$pblock&cpage=$pstartpage&id=$pid>�������</a>] ");

	// ���� ��Ͽ� ���� ������ ��ȣ�� ���	
	$i =   $startpage;
	while($i < $nstartpage):
	   if ($i > $totalpage) break;  // ������ �������� ��������� ������
	   echo ("[<a href=p-content.php?cblock=$cblock&cpage=$i&id=$pid>$i</a>]");
	   $i = $i + 1;
	endwhile;
	 
	// ���� ����� ���� �������� ��ü ������ ������ ������ [�������] ��ư Ȱ��ȭ  
	if ($nstartpage <= $totalpage)   
		echo ("[<a href=p-content.php?cblock=$nblock&cpage=$nstartpage&id=$pid>�������</a>] ");

	echo ("</td>
				<td align=right colspan=5><a href=p-input.php><img src=./photo/write.png width=50></a></td>
			</tr></table>");
}
	
mysql_close($con);

?>
 
<table height=100><tr><td></td></tr></table>
<? include ("bottom.html");?>