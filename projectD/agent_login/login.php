<?
	session_start();
?>
<meta charset="utf-8">
<?
   // 이전화면에서 이름이 입력되지 않았으면 "이름을 입력하세요"
   // 메시지 출력
   if(!$id) {
     echo("
           <script>
             window.alert('아이디를 입력하세요.')
             history.go(-1)
           </script>
         ");
         exit;
   }

   if(!$pass) {
     echo("
           <script>
             window.alert('비밀번호를 입력하세요.')
             history.go(-1)
           </script>
         ");
         exit;
   }

   include "../lib/dbconn.php";

   $sql = "select * from agent where id='$id'";
   $result = mysql_query($sql, $connect);

   $num_match = mysql_num_rows($result);

   if(!$num_match) 
   {
     echo("
           <script>
             window.alert('등록되지 않은 아이디입니다.')
             history.go(-1)
           </script>
         ");
    }
    else
    {
        $row = mysql_fetch_array($result);

        $db_pass = $row[pass];

        if($pass != $db_pass)
        {
           echo("
              <script>
                window.alert('비밀번호가 틀립니다.')
                history.go(-1)
              </script>
           ");

           exit;
        }
        else
        {
           $agentid = $row[id];
		   $agentname = $row[name];
		   $agentrespname = $row[respname];
		

           $_SESSION['agentid'] = $agentid;
           $_SESSION['agentname'] = $agentname;
           $_SESSION['agentrespname'] = $agentrespname;
       

           echo("
              <script>
                location.href = '../index.php';
              </script>
           ");
        }
   }          
?>
