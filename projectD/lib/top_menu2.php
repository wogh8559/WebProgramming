<ul>
	<li>
	     <h2><a href="../search/list.php" accesskey="1" title="">방 검색</a></h2>
	</li>
	<?
    if($agentid && !$userid)
	{
	?>
    <li>
	  <h2><a href="../connection/list.php" accesskey="2" title="">거래관리</a></h2>
    </li>
    <?
	}
	if($userid && !$agentid){
	?>
      <li>
	  <h2><a href="../regist/write_form.php" accesskey="2" title="">방 등록</a></h2>
    </li>
    <?
	}
	?>
	<li>
		<h2><a href="../notice/list.php" accesskey="3" title="">공지사항</a></h2>
    </li>
    <li>
	  <h2><a href="../qna/list.php" accesskey="4" title="">Q&A</a></h2>
	</li>
    <li>
        <h2><a href="../report/list.php" accesskey="5" title="">신고게시판</a></h2>

	</li>
	
</ul>