<!--�������� ������-->

<style>
	#t2 {border-left:none; border-right:none; border-style:thin;}
	a {text-decoration:none}
	

</style>
<?
	include ("top.html");
?>
<table height=100><tr><td></td></tr></table>
<?
 
$con = mysql_connect("localhost","root","apmsetup");
mysql_select_db("shopmall",$con);
$result = mysql_query("select * from customer order by id desc", $con);
$total = mysql_num_rows($result);

echo("
	<table border=0 width=1000 align=center >
		<tr>
			<td align=center><img src=./photo/list1.png width=1000></td>
		</tr>
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

		$id=mysql_result($result,$newcounter,"id");
		$content=mysql_result($result,$newcounter,"content");
		$topic=mysql_result($result,$newcounter,"topic");
		$hit=mysql_result($result,$newcounter,"hit");
		$wdate=mysql_result($result,$newcounter,"wdate");

		echo("
			<tr id=t1>
				<td id=t1 align=center>$id</td>
				<td id=t1 align=left><a href=p-content.php?id=$id><font color=black><b>$topic</font></a></td>
				<td id=t1 align=center>������</td>
				<td id=t1 align=center>$wdate</td>
				<td id=t1 align=center>$hit</td>
			</tr>
		");

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
		echo ("[<a href=customer.php?board=$board&cblock=$pblock&cpage=$pstartpage>�������</a>] ");

	// ���� ��Ͽ� ���� ������ ��ȣ�� ���	
	$i =   $startpage;
	while($i < $nstartpage):
	   if ($i > $totalpage) break;  // ������ �������� ��������� ������
	   echo ("[<a href=customer.php&cblock=$cblock&cpage=$i>$i</a>]");
	   $i = $i + 1;
	endwhile;
	 
	// ���� ����� ���� �������� ��ü ������ ������ ������ [�������] ��ư Ȱ��ȭ  
	if ($nstartpage <= $totalpage)   
		echo ("[<a href=customer.php?board=$board&cblock=$nblock&cpage=$nstartpage>�������</a>] ");

	echo ("</td>
				<td align=right colspan=5><a href=p-input.php><img src=./photo/write.png width=50></a></td>
			</tr></table>");
}
	
mysql_close($con);

?>
<table height=100><tr><td></td></tr></table>
<?
	include ("bottom.html");
?>
