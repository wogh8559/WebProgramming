<?php
	if(!$userid && !$agentid)
	{
?>
		<a href="../login/login_form.php">로그인</a>&nbsp&nbsp|&nbsp&nbsp<a href="../agent_login/login_form.php">공인중개사로그인</a>|&nbsp&nbsp<a href="../member/member_form.php">회원가입</a>|&nbsp&nbsp <a href="../agent/member_form.php">공인중개사 회원가입</a>
<?php
	}
	else if($userid && !$agentid)
	{
?>
		<a href="../login/member_modify_form.php"><?=$usernick?>님</a> |&nbsp&nbsp
			<a href="../login/logout.php">로그아웃</a> &nbsp&nbsp|&nbsp&nbsp<a href="../regist/list.php">매물관리</a>&nbsp&nbsp|&nbsp&nbsp <a href="#" onclick="window.open('../survey/survey.php', '','scrollbars=no, toolbars=no,width=300,height=300')" border="0" >설문조사</a>
<?php
	} 
	else if($agentid && !$userid){
		
?>
<a href="../agent_login/member_modify_form.php"><?=$agentid?>님</a> |&nbsp&nbsp
			<a href="../agent_login/logout.php">로그아웃</a> &nbsp&nbsp|&nbsp&nbsp <a href="#" onclick="window.open('../survey/survey.php', '','scrollbars=no, toolbars=no,width=300,height=300')" border="0" >설문조사</a>
<?
	}
?>