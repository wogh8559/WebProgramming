<?
  session_start();
  unset($_SESSION['agentid']);
  unset($_SESSION['agentname']);
  unset($_SESSION['agentrespname']);


  echo("
       <script>
          location.href = '../index.php'; 
         </script>
       ");
?>
