<?
switch ($mode) {
    case 0:          // ���� ���α׷� ȣ��
        echo("<meta   http-equiv='Refresh' content='0; url=p-modify.php?id=$id'>");
			break;
    case 1:          // ���� ���α׷� ȣ��
        echo("<meta   http-equiv='Refresh' content='0; url=p-delete.php?id=$id'>");
            break;
}   	   
  
mysql_close($con);

?>
