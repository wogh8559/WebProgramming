<? 
	session_start(); 
?>
<!DOCTYPE HTML>
<html>
<head> 
<meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
<title>회원가입</title>
<link href="http://fonts.googleapis.com/css?family=Source+Sans+Pro:200,300,400,600,700,900" rel="stylesheet" />
<link href="../css/inner.css" rel="stylesheet" type="text/css" media="all" />
<link href="../css/fonts.css" rel="stylesheet" type="text/css" media="all" />
<link href="../css/member.css" rel="stylesheet" type="text/css" media="all" />
<script>
   function check_id()
   {
     window.open("check_id.php?id=" + document.member_form.id.value,
         "IDcheck",
          "left=200,top=200,width=200,height=60,scrollbars=no,resizable=yes");
   }

   function check_nick()
   {
     window.open("check_nick.php?nick=" + document.member_form.nick.value,
         "NICKcheck",
          "left=200,top=200,width=200,height=60,scrollbars=no,resizable=yes");
   }

   function check_input()
   {
      if (!document.member_form.id.value)
      {
          alert("아이디를 입력하세요");    
          document.member_form.id.focus();
          return;
      }

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

      if (!document.member_form.nick.value)
      {
          alert("닉네임을 입력하세요");    
          document.member_form.nick.focus();
          return;
      }


      if (!document.member_form.hp2.value || !document.member_form.hp3.value )
      {
          alert("휴대폰 번호를 입력하세요");    
          document.member_form.nick.focus();
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
      document.member_form.nick.value = "";
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

<div id="wrapper">
    <div id="content" class="container">
        <form  name="member_form" method="post" action="insert.php"> 
            <div id="title">
                <img src="../img/title_join.gif">
            </div> <!-- end of title -->
            
            <div id="join_form">
                    <div id="join1">
                        <ul>
                        <li>* 아이디</li>
                        <li>* 비밀번호</li>
                        <li>* 비밀번호 확인</li>
                        <li>* 이름</li>
                        <li>* 닉네임</li>
                        <li>* 휴대폰</li>
                        <li>&nbsp;&nbsp;&nbsp;이메일</li>
                        </ul>
                    </div> <!-- end of join1 -->
                    
                    <div id="join2">
                        <ul>
                        <li><div id="id1"><input type="text" name="id"></div><div id="id2"><a href="#"><img src="../img/check_id.gif" onclick="check_id()"></a></div><div id="id3">4~12자의 영문 소문자, 숫자와 특수기호(_) 만 사용할 수 있습니다.</div></li>
                        <li><input type="password" name="pass"></li>
                        <li><input type="password" name="pass_confirm"></li>
                        <li><input type="text" name="name"></li>
                        <li><div id="nick1"><input type="text" name="nick"></div><div id="nick2" ><a href="#"><img src="../img/check_id.gif" onclick="check_nick()"></a></div></li>
                        <li><select class="hp" name="hp1"> 
                        <option value='010'>010</option>
                        <option value='011'>011</option>
                        <option value='016'>016</option>
                        <option value='017'>017</option>
                        <option value='018'>018</option>
                        <option value='019'>019</option>
                        </select>  - <input type="text" class="hp" name="hp2"> - <input type="text" class="hp" name="hp3"></li>
                        <li><input type="text" id="email1" name="email1"> @ <input type="text" name="email2"></li>
                        </ul>
                    </div> <!-- end of join2 -->
                
                <div class="clear"></div>
                <div id="must"> * 는 필수 입력항목입니다.^^</div>
            </div> <!-- end of join_form -->
            
            <div id="button">
                <a href="#"><img src="../img/button_save.gif"  onclick="check_input()"></a>&nbsp;&nbsp;
                <a href="#"><img src="../img/button_reset.gif" onclick="reset_form()"></a>
            </div> <!-- end of button -->
        </form> <!-- end of form -->
    </div> <!-- end of conetent -->
</div> <!-- end of wrapper -->
</body>
</html>
