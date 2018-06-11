<? 
	session_start(); 
	$table = "regist";
	$table2 = "agent";
?>
<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd">
<html>
<head> 
<title>거래관리</title>
<meta charset="utf-8">
<link href="http://fonts.googleapis.com/css?family=Source+Sans+Pro:200,300,400,600,700,900" rel="stylesheet" />
<link href="../css/inner.css" rel="stylesheet" type="text/css" media="all">
<link href="../css/fonts.css" rel="stylesheet" type="text/css" media="all">
<link href="../css/board1.css" rel="stylesheet" type="text/css" media="all">
<link href="../css/common.css" rel="stylesheet" type="text/css" media="all">
<link href="../css/board4.css" rel="stylesheet" type="text/css" media="all">

</head>
<?
	include "../lib/dbconn.php";
	$scale=10;			// 한 화면에 표시되는 글 수

    if ($mode=="search")
	{
		if(!$search)
		{
			echo("
				<script>
				 window.alert('검색할 단어를 입력해 주세요!');
			     history.go(-1);
				</script>
			");
			exit;
		}

		$sql = "select * from $table where find like '%$search%' order by num desc";
	}
	else
	{
		$sql = "select respname from $table2 where id='$agentid'";
		$result3	 = mysql_query($sql, $connect);
		$result2 = mysql_fetch_row($result3);
		$sql = "select * from $table where address like '%$result2[0]%' order by num desc;";
		
	}

	$result = mysql_query($sql, $connect);

	$total_record = mysql_num_rows($result); // 전체 글 수

	// 전체 페이지 수($total_page) 계산 
	if ($total_record % $scale == 0)     
		$total_page = floor($total_record/$scale);      
	else
		$total_page = floor($total_record/$scale) + 1; 
 
	if (!$page)                 // 페이지번호($page)가 0 일 때
		$page = 1;              // 페이지 번호를 1로 초기화
 
	// 표시할 페이지($page)에 따라 $start 계산  
	$start = ($page - 1) * $scale;      
	$number = $total_record - $start;
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

<div id="wrapper">
  <div id="content" class="container" >     
		<div id="title">
			<img src="../img/connection.png">
		</div>
		<form  name="board_form" method="post" action="list.php?table=<?=$table?>&mode=search"> 
		<div id="list_search" >
			<div id="list_search1">▷ 총 <?= $total_record ?> 개의 게시물이 있습니다.  </div>
			<div id="list_search2"><img src="../img/select_search.gif"></div>
			<div id="list_search3">
				<select name="find">
                    <option value='subject'>제목</option>
                    <option value='content'>내용</option>
                    <option value='nick'>별명</option>
                    <option value='name'>이름</option>
				</select></div>
			<div id="list_search4"><input type="text" name="search"></div>
			<div id="list_search5"><input type="image" src="../img/list_search_button.gif"></div>
		</div>
		</form>
		<div class="clear"></div>

		<div id="list_top_title2">
			<ul>
				<li id="list_title_n1"><img src="../img/number.png" ></li>
				<li id="list_title_n2"><img src="../img/rname.png"></li>
				<li id="list_title_n3"><img src="../img/rkind.png"></li>
				<li id="list_title_n4"><img src="../img/rtype.png"></li>
				<li id="list_title_n5"><img src="../img/rday.png"></li>
			</ul>		
		</div>

		<div id="list_content">
<?		
   for ($i=$start; $i<$start+$scale && $i < $total_record; $i++)                    
   {
      mysql_data_seek($result, $i);       
      $row = mysql_fetch_array($result);       
		
	  $item_num     = $row[num];
	  $item_rname    = $row[rname];
	  $item_kind    = $row[kind];
	  $item_rent    = $row[rent];
	  $item_day    = $row[day];
	  $item_ctype      = $row[ctype];
	  $item_deposit     = $row[deposit];
	   $item_id      = $row[id];
	   $item_current = $row[current];
	  

      $space = "";
      for ($j=0; $j<$item_depth; $j++)
          $space = "&nbsp;&nbsp;".$space;

?>
			<div id="list_item">

				<div id="list_item_n1"> <?= $number ?></div>
				<div id="list_item_n2">
                <?
                	if($item_current == 0){
				?>
                <a href="view.php?table=<?=$table?> & num=<?=$item_num?>&page=<?=$page?>"><?= $item_rname?>&nbsp;( 거래 중 )</a>
               
                <?
					}
					else {
				?>
                <a href="view.php?table=<?=$table?> & num=<?=$item_num?>&page=<?=$page?>"><?= $item_rname?>&nbsp;( 거래 완료 )</a>
                <?
                }
                ?>
                
                </div>
				<div id="list_item_n3"><?= $item_ctype ?>/<?= $item_kind?></div>  
                <div id="list_item_n4"><?= $item_deposit?>/ <?= $item_rent?></div>               
               <div id="list_item_n5"><?= $item_day ?></div>
              
                
			
			</div>
<?
   	   $number--;
   }
?>
			<div id="page_button">
				<div id="page_num"> ◀ 이전 &nbsp;&nbsp;&nbsp;&nbsp; 
<?
   // 게시판 목록 하단에 페이지 링크 번호 출력
   for ($i=1; $i<=$total_page; $i++)
   {
		if ($page == $i)     // 현재 페이지 번호 링크 안함
		{
			echo "<b> $i </b>";
		}
		else
		{ 
			echo "<a href='list.php?table=$table&page=$i'> $i </a>";
		}      
   }
?>			
			&nbsp;&nbsp;&nbsp;&nbsp;다음 ▶ 
				</div>
				<div id="button">
					<a href="list.php"><img src="../img/list.png"></a>&nbsp;

				</div>
			</div> <!-- end of page_button -->		
        </div> <!-- end of list content -->
		<div class="clear"></div>

  </div> <!-- end of content -->
</div> <!-- end of wrapper -->
            
</body>
</html>
