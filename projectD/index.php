<?php
	session_start();
	
?>
<!DOCTYPE HTML>
<html lang="ko">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
<title>다락방</title>
<meta name="keywords" content="" />
<meta name="description" content="" />
<link href="http://fonts.googleapis.com/css?family=Source+Sans+Pro:200,300,400,600,700,900" rel="stylesheet" />
<link href="./css/default.css" rel="stylesheet" type="text/css" media="all"/>
<link href="./css/fonts.css" rel="stylesheet" type="text/css" media="all" />
</head>

<body>
<div id="header-wrapper">
    <div id="header" class="container">
        <div id="logo">
        <h1><a href="#" title="다락방">다락방</a></h1>
        </div> <!-- end of logo -->
        <div id="user_menu">
<?php
include "./lib/user_menu1.php";
?>
        </div> <!-- end of user_menu -->
        <div id="menu">
<?php
include "./lib/top_menu1.php";
?>
        </div> <!-- end of menu -->
    </div> <!-- end of header -->
    <div id="banner" class="container">
    </div> <!-- end of banner -->
</div> <!-- end of header-wrapper -->
<div class="clear"></div>
<div id="wrapper">
	<div id="content" class="container">
		<form  id="search" method="post" action="./search/list.php?mode=search&find=address">
            <input name="address" id="address" type="textbox" placeholder="주소를 입력하세요" />
            <input id="submit" type="submit" value="검색" />
        </form> <!-- end of search -->
    </div> <!-- end of content -->
</div> <!-- end of wrapper -->

</body>
</html>