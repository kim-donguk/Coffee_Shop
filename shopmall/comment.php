<!--��ǰ �ı⸦ �����ִ� ������-->


<? include("top.html");?>
<table height=100><tr><td></td></tr></table>
<?
 
$con = mysql_connect("localhost","root","apmsetup");
mysql_select_db("shopmall",$con);

//��ǰ �ı� ���̺�(comment)���� ������������ ������ ������
$result = mysql_query("select * from comment order by id desc", $con);
$total = mysql_num_rows($result);

echo("
	<table border=0 width=1000 align=center >
		<tr>
			<td><img src=./photo/review.png width=1000></td>
		</tr>
		<tr>
			<td><font size=2><b>�ڷ��</b></font><font color=red size=2> $total</font><font size=2><b> ��</b></font></td>
		</tr>
	</table>
	<table width=1000 align=center>
		<tr bgcolor=#CFCFCF>
			<td align=center width=50><b>��ȣ</b></td>
			<td align=center width=500><b>����</b></td>
			<td align=center width=100><b>�۾���</b></td>
			<td align=center width=150><b>��¥</b></td>
			<td align=center width=50><b>��ȸ</b></td>
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
		
		$id = mysql_result($result,$counter,"id"); //��ǰ ��ȣ
		$code = mysql_result($result,$counter,"code"); //��ǰ �ڵ�
		$topic =  mysql_result($result,$counter,"topic"); //����
		$content = mysql_result($result,$counter,"content"); //����
		$wdate = mysql_result($result,$counter,"wdate"); //��¥
		$writer = mysql_result($result,$counter,"writer"); //�۾���
		$hit = mysql_result($result,$counter,"hit"); //��ȸ��
		
		echo("
		<tr height=45>
			<td width=200 align=center>$id</td>
			<td width=600><a href=m-content.php?id=$id>
				<table>
					<tr>
						<td rowspan=2 width=30><img src='./photo3/$code' width=45 height=45></td>
						<td><b>$topic</b></td>
					<tr>
						<td>$content</td>
					</tr>
				</table></a>
			</td>
			<td width=50 align=center>$writer</td>
			<td width=50 align=center>$wdate</td>
			<td width=50 align=center>$hit</td>
		</tr>
		<tr height=5>
			<td colspan=5><hr size=1 color=#A6A6A6 width=100%></td>
			
		</tr>
		");
		$counter = $counter + 1;

	endwhile;

	echo("</table>");

	echo ("<table border=0 width=1000 align=center>
		  <tr><td>");
		   
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
		echo ("[<a href=comment.php?cblock=$pblock&cpage=$pstartpage>�������</a>] ");

	// ���� ��Ͽ� ���� ������ ��ȣ�� ���	
	$i =   $startpage;
	while($i < $nstartpage):
	   if ($i > $totalpage) break;  // ������ �������� ��������� ������
	   echo ("[<a href=comment.php?cblock=$cblock&cpage=$i>$i</a>]");
	   $i = $i + 1;
	endwhile;
	 
	// ���� ����� ���� �������� ��ü ������ ������ ������ [�������] ��ư Ȱ��ȭ  
	if ($nstartpage <= $totalpage)   
		echo ("[<a href=comment.php?cblock=$nblock&cpage=$nstartpage>�������</a>] ");

	echo ("</td>
			<td align=right><a href=m-input.php><img src=./photo/write.png width=50></a></td>
		</tr></table>");
}
	
mysql_close($con);

?>
<table height=100><tr><td></td></tr></table>
<? include("bottom.html");?>
