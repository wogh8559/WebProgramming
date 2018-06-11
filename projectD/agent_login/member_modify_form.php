<?
    session_start();
?>
<!DOCTYPE HTML>
<html>
<head> 
<title>공인중개사 정보수정</title>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<link href="http://fonts.googleapis.com/css?family=Source+Sans+Pro:200,300,400,600,700,900" rel="stylesheet" />
<link href="../css/inner.css" rel="stylesheet" type="text/css" media="all" />
<link href="../css/fonts.css" rel="stylesheet" type="text/css" media="all" />
<link href="../css/member.css" rel="stylesheet" type="text/css" media="all" />
<script>
   function check_id()
   {
     window.open("check_id.php?id=" + document.member_form.id.value,
         "IDcheck",
          "left=200,top=200,width=250,height=100,scrollbars=no,resizable=yes");
   }


   function check_input()
   {
      if (!document.member_form.pass.value)
      {
          alert("비밀번호를 입력하세요");    
          document.member_form.pass.focus();
          return;
      }

      if (!document.member_form.pass_confirm.value)
      {
          alert("비밀번호확인을 입력하세요");    
          document.member_form.pass_confirm.focus();
          return;
      }

      if (!document.member_form.name.value)
      {
          alert("이름을 입력하세요");    
          document.member_form.name.focus();
          return;
      }

      if (!document.member_form.respname.value)
      {
          alert("닉네임을 입력하세요");    
          document.member_form.respname.focus();
          return;
      }

      if (!document.member_form.hp2.value || !document.member_form.hp3.value )
      {
          alert("휴대폰 번호를 입력하세요");    
          document.member_form.hp.focus();
          return;
      }

      if (document.member_form.pass.value != 
            document.member_form.pass_confirm.value)
      {
          alert("비밀번호가 일치하지 않습니다.\n다시 입력해주세요.");    
          document.member_form.pass.focus();
          document.member_form.pass.select();
          return;
      }

      document.member_form.submit();
   }

   function reset_form()
   {
      document.member_form.id.value = "";
      document.member_form.pass.value = "";
      document.member_form.pass_confirm.value = "";
      document.member_form.name.value = "";
      document.member_form.respname.value = "";
      document.member_form.hp1.value = "010";
      document.member_form.hp2.value = "";
      document.member_form.hp3.value = "";
      document.member_form.email1.value = "";
      document.member_form.email2.value = "";
	  
      document.member_form.id.focus();

      return;
   }
</script>
</head>
<?
    include "../lib/dbconn.php";

    $sql = "select * from agent where id='$agentid'";
    $result = mysql_query($sql, $connect);

    $row = mysql_fetch_array($result);

    $hp = explode("-", $row[hp]);
    $hp1 = $hp[0];
    $hp2 = $hp[1];
    $hp3 = $hp[2];

    $email = explode("@", $row[email]);
    $email1 = $email[0];
    $email2 = $email[1];

    mysql_close();
?>
<body>
<div id="header-wrapper">
    <div id="header" class="container">
        <div id="logo">
        <h1><a href="../" title="다락방">다락방</a></h1>
        </div> <!-- end of logo -->
        <div id="user_menu">
<?php
include "../lib/user_menu2.php";
?>
        </div> <!-- end of user_menu -->
        <div id="menu">
<?php
include "../lib/top_menu2.php";
?>
        </div> <!-- end of menu -->
    </div> <!-- end of header -->
    <div id="banner" class="container">
    </div> <!-- end of banner -->
</div> <!-- end of header-wrapper -->
<div class="clear"></div>
<div id="wrapper">
    <div id="content" class="container">
        <form  name="member_form" method="post" action="modify.php"> 
            <div id="title">
            <img src="../img/title_member_modify.gif">
            </div>
            
            <div id="join_form">
            <div id="join1">
            <ul>
            <li>* 아이디</li>
            <li>* 비밀번호</li>
            <li>* 비밀번호 확인</li>
            <li>* 이름</li>
            <li>* 지역</li>
            <li>* 휴대폰</li>
            <li>&nbsp;&nbsp;&nbsp;이메일</li>
            </ul>
            </div>
            <div id="join2">
            <ul>
            <li><?= $row[id] ?></li>
            <li><input type="password" name="pass" value="<?= $row[pass] ?>"></li>
            <li><input type="password" name="pass_confirm" value="<?= $row[pass] ?>"></li>
            <li><input type="text" name="name" value="<?= $row[name] ?>"></li>
            <li><div id="nick1"><input type="text" name="respname" value="<?= $row[respname] ?>"></div></li>
            <li><input type="text" class="hp" name="hp1" value="<?= $hp1 ?>"> 
            - <input type="text" class="hp" name="hp2" value="<?= $hp2 ?>"> - <input type="text" class="hp" name="hp3" value="<?= $hp3 ?>"></li>
            <li><input type="text" id="email1" name="email1" value="<?= $email1 ?>"> @ <input type="text" name="email2" 
            value="<?= $email2 ?>"></li>
            </ul>
            </div>
            <div class="clear"></div>
            <div id="must"> * 는 필수 입력항목입니다.^^</div>
            </div>
            
            <div id="button"><a href="#"><img src="../img/button_save.gif"  onclick="check_input()"></a>&nbsp;&nbsp;
            <a href="#"><img src="../img/button_reset.gif" onclick="reset_form()"></a>
            </div>
        </form>
    </div> <!-- end of content -->
</div> <!-- end of wrapper -->
</body>
</html>
