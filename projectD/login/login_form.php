<!DOCTYPE HTML>
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
<title>로그인</title>
<link href="http://fonts.googleapis.com/css?family=Source+Sans+Pro:200,300,400,600,700,900" rel="stylesheet" />
<link href="../css/inner.css" rel="stylesheet" type="text/css" media="all" />
<link href="../css/fonts.css" rel="stylesheet" type="text/css" media="all" />
<link href="../css/member.css" rel="stylesheet" type="text/css" media="all" />
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
<div class="clear"></div>
<div id="wrapper">
    <div id="content" class="container">
        <form  name="member_form" method="post" action="login.php"> 
            <div id="title">
	            <img src="../img/title_login.gif">
            </div>

            <div id="login_form">
                <img id="login_msg" src="../img/login_msg.gif">
                <div class="clear"></div>
                <ul>
                	<li>
                    <div id="login1">
                        <img src="../img/login_key.gif">
                    </div> <!-- end of login1 -->
                    </li>
                    <li>
                    <div id="login2">
                        <div id="id_input_button">
                            <div id="id_pw_title">
                                <ul>
                                    <li><img src="../img/id_title.gif"></li>
                                    <li><img src="../img/pw_title.gif"></li>
                                </ul>
                            </div> <!-- end of id_pw_title -->
                            <div id="id_pw_input">
                                <ul>
                                    <li><input type="text" name="id" class="login_input"></li>
                                    <li><input type="password" name="pass" class="login_input"></li>
                                </ul>						
                            </div> <!-- end of id_pw_input -->
                            <div id="login_button">
                                <ul>
                                    <li><input type="image" src="../img/login_button.gif"></li>
                                </ul>
                            </div> <!-- end of login_button -->
                        </div> <!-- end of id_input_button -->
                        <div id="login_line"></div>
                        <div id="join_button"><img src="../img/no_join.gif">&nbsp;&nbsp;&nbsp;&nbsp;<a href="../member/member_form.php"><img src="../img/join_button.gif"></a></div>
                    </div> <!-- end of login2 -->
                    </li>
                </ul>
            </div> <!-- end of login_form -->
        </form>
    </div> <!-- end of content -->
</div> <!-- end of wrapper -->
</body>
</html>