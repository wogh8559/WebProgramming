<?
	session_start();
?>
<meta charset="euc-kr">
<?
   $hp = $hp1."-".$hp2."-".$hp3;
   $email = $email1."@".$email2;

   $regist_day = date("Y-m-d (H:i)");  // ������ '��-��-��-��-��'�� ����

   include "../lib/dbconn.php";       // dconn.php ������ �ҷ���

   $sql = "update agent set pass='$pass', name='$name' , ";
   $sql .= "respname='$respname', hp='$hp', email='$email', regist_day='$regist_day' where id='$agentid'";

   mysql_query($sql, $connect);  // $sql �� ����� ��� ����

   mysql_close();                // DB ���� ����
   echo "
	   <script>
	    location.href = '../index.php';
	   </script>
	";
?>

   
