<!--아이디 찾기 페이지-->
<!--앞의 페이지에서 받은 uname, email 변수를 이용해 고객 정보 테이블(member)에서 정보를 가져와 아이디를 알려줌-->
<?
$con = mysql_connect("localhost","root","apmsetup");
mysql_select_db("shopmall",$con);

$result = mysql_query("select * from member where uname='$uname' and   email='$email'", $con);
$total = mysql_num_rows($result);

if (!$total)   {
   echo("<script>
      window.alert('입력하신 이름과 이메일 주소를 동시에 만족하는 사용자 아이디가 없습니다')
      history.go(-1)
      </script>
   ");
   exit;
} else {
	$uid = mysql_result($result, 0, "uid");
    echo("<script>
        window.alert('귀하의 아이디는 $uid 입니다')
        </script>
   ");
}

mysql_close($con);	
echo   ("<meta http-equiv='Refresh' content='0; url=login.php'>");
?>
