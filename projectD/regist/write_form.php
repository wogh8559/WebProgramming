<? 
	session_start(); 
	$table = "regist";
	include "../lib/dbconn.php";
		
	if ($mode=="modify" ){
		$sql = "select * from $table where num=$num";

		$result = mysql_query($sql, $connect);
		$row = mysql_fetch_array($result);  
	
		$item_address= $row[address];
		$item_kind= $row[kind];
		$item_type= $row[type];
		$item_ctype= $row[ctype];
				
		$item_deposit= $row[deposit];
		$item_rent= $row[rent];
		$item_superfree= $row[superfree];
		$item_day= $row[day];
		
		$item_fac1= $row[fac1];
		$item_fac2= $row[fac2];
		$item_fac3= $row[fac3];
		$item_fac4= $row[fac4];
		$item_fac5= $row[fac5];

	
		$item_rname= $row[rname];
		$item_contents= $row[contents];
		
		$item_file_0 = $row[file_name_0];
		$item_file_1 = $row[file_name_1];
		$item_file_2 = $row[file_name_2];

		$copied_file_0 = $row[file_copied_0];
		$copied_file_1 = $row[file_copied_1];
		$copied_file_2 = $row[file_copied_2];
		
		mysql_close();
		}
?>

<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd">
<html>
<head> 
<title>방 등록</title>
<link href="http://fonts.googleapis.com/css?family=Source+Sans+Pro:200,300,400,600,700,900" rel="stylesheet" />
<link href="../css/inner.css" rel="stylesheet" type="text/css" media="all">
<link href="../css/fonts.css" rel="stylesheet" type="text/css" media="all">
<link href="../css/board1.css" rel="stylesheet" type="text/css" media="all">
<meta charset="utf-8">
<script>
  function check_input()
   {
      if (!document.board_form.address.value)
      {
          alert("주소를 입력하세요!");    
          document.board_form.address.focus();
          return;
      }

      if (!document.board_form.contents.value)
      {
          alert("내용을 입력하세요!");    
          document.board_form.contents.focus();
          return;
      }

     if (!document.board_form.rname.value)
      {
          alert("방 이름을 입력하세요!");    
          document.board_form.rname.focus();
          return;
      }


      if (!document.board_form.ctype.value)
      {
          alert("거래 종류를 입력하세요!");    
          document.board_form.ctype.focus();
          return;
      }
      

      if (!document.board_form.deposit.value)
      {
          alert("보증금을 입력하세요!");    
          document.board_form.deposit.focus();
          return;
      }
      
     
      if (!document.board_form.rent.value)
      {
          alert("월세를 입력하세요!");    
          document.board_form.rent.focus();
          return;
      }
      

        
      if (!document.board_form.superfree.value)
      {
          alert("관리비를 입력하세요!");    
          document.board_form.super.focus();
          return;
      }
      
   if (!document.board_form.day.value)
      {
          alert("입주일자를 입력하세요!");    
          document.board_form.day.focus();
          return;
      }
         
      document.board_form.submit();

   }
      
</script>

<script src="http://dmaps.daum.net/map_js_init/postcode.v2.js"></script>
<script src="//apis.daum.net/maps/maps3.js?apikey=96028&libraries=services"></script>
<script>
    var mapContainer = document.getElementById('map'), // 지도를 표시할 div
        mapOption = {
            center: new daum.maps.LatLng(37.537187, 127.005476), // 지도의 중심좌표
            level: 5 // 지도의 확대 레벨
        };

    //지도를 미리 생성
    var map = new daum.maps.Map(mapContainer, mapOption);
    //주소-좌표 변환 객체를 생성
    var geocoder = new daum.maps.services.Geocoder();
    //마커를 미리 생성
    var marker = new daum.maps.Marker({
        position: new daum.maps.LatLng(37.537187, 127.005476),
        map: map
    });

    function sample5_execDaumPostcode() {
        new daum.Postcode({
            oncomplete: function(data) {
                // 각 주소의 노출 규칙에 따라 주소를 조합한다.
                // 내려오는 변수가 값이 없는 경우엔 공백('')값을 가지므로, 이를 참고하여 분기 한다.
                var fullAddr = data.address; // 최종 주소 변수
                var extraAddr = ''; // 조합형 주소 변수

                // 기본 주소가 도로명 타입일때 조합한다.
                if(data.addressType === 'R'){
                    //법정동명이 있을 경우 추가한다.
                    if(data.bname !== ''){
                        extraAddr += data.bname;
                    }
                    // 건물명이 있을 경우 추가한다.
                    if(data.buildingName !== ''){
                        extraAddr += (extraAddr !== '' ? ', ' + data.buildingName : data.buildingName);
                    }
                    // 조합형주소의 유무에 따라 양쪽에 괄호를 추가하여 최종 주소를 만든다.
                    fullAddr += (extraAddr !== '' ? ' ('+ extraAddr +')' : '');
                }

                // 주소 정보를 해당 필드에 넣는다.
                document.getElementById("sample5_address").value = fullAddr;
                // 주소로 좌표를 검색
                geocoder.addr2coord(data.address, function(status, result) {
                    // 정상적으로 검색이 완료됐으면
                    if (status === daum.maps.services.Status.OK) {
                        // 해당 주소에 대한 좌표를 받아서
                        var coords = new daum.maps.LatLng(result.addr[0].lat, result.addr[0].lng);
                        // 지도를 보여준다.
                        mapContainer.style.display = "block";
                        map.relayout();
                        // 지도 중심을 변경한다.
                        map.setCenter(coords);
                        // 마커를 결과값으로 받은 위치로 옮긴다.
                        marker.setPosition(coords)
                    }
                });
            }
        }).open();
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
<!-------------------------------------------------------------------------------------------------------------------->
<div id="wrapper">
  <div id="content" class = "container">
		<div id="title">
			<img src="../img/regist.png">
		</div><!--End of title-->
		<div class="clear"></div><!--End of clear-->
<?
	if($mode == "modify")
	{
?>

        <form  name="board_form" method="post" action="./insert.php?mode=modify&num=<?=$num?>&page=<?=$page?>&table=<?=$table?>" enctype="multipart/form-data"> 
<?
	}
	else
	{
?>
		<form  name="board_form" method="post" action="./insert.php?table=<?=$table?>" enctype="multipart/form-data"> 
<?
	}
?>
	
		  <div id="write_form">
		  <div class="write_line"></div>
		  <img src="../img/map.png" align = 'left'>
          <div class="clear"></div><!-- 공백 -->
		  <div id="write_add"><div class="cl"> 주소</div>
 <!------------------------------------------------------------주소------------------------------------------------------>
			<!-- <input type="text" id="sample5_address" placeholder="주소">-->
			<input type="text"  name="address" id="sample5_address"  placeholder="주소" size = "50px" value ="<?=$item_address?>">
            <input type="button" onclick="sample5_execDaumPostcode()" value="주소 검색">
			
			<div id="map" style="width:300px;height:300px;margin-top:10px;display:none"></div>
<!-------------------------------------------------------------------------------------------------------------------->           
           
			</div>
            <div class="clear"></div><!-- 공백 -->
			<div class="write_line"></div>
                   <div class="clear"></div><!-- 공백 -->
            <img src="../img/info.png" align = "left">
            
            
          <div class="clear"></div><!-- 공백 -->
			<div id="write_info1"><div class="cl1"> 방 종류 </div>
            <li2><select name="kind" width="3px"> 
                        <option  value="원룸" >원룸</option>
                        <option  value="1.5룸" >1.5룸</option>
                        <option  value="투룸" >투룸</option>
                        <option value="쓰리룸" >쓰리룸</option>
                        <option value="아파트"  >아파트</option>
                        </select>&nbsp;&nbsp;&nbsp;<h>고시텔은 해당하지 않습니다. </h></li2>
			</div>
			
            <div id="write_info1"><div class="cl1"> 거래 종류 </div>
            <li2><select name="ctype" > 
                        <option value="전세">전세</option>
                        <option value="월세">월세</option>
                        </select>
                       <input type="text" name="deposit" value="<?=$item_deposit?>"  placeholder=" 보증금 ( 단위 : 만원)" size = "20px" style="margin-left:5px;">
                         <input type="text" name="rent" value="<?=$item_rent?>"  placeholder=" 가격 ( 단위 : 만원)" size = "20px"style="margin-left:5px;">
                        </li2>
			</div>
                 <div class="clear"></div><!-- 공백 -->
			<div class="write_line"></div>
<!-------------------------------------------------------------------------------------------------------------------->          
            
            	<img src="../img/add.png" align = 'left'>
                   <div class="clear"></div><!-- 공백 -->
                   
                   
			<div class="write_line"></div>
            	  <div id="write_info1"><div class="cl1"> 관리비</div><li2>
					<input type="text" name="superfree" value="<?=$item_superfree?>"  placeholder=" 관리비 ( 단위 : 만원)" size = "20px" style="margin-left:2px;"></li2>
			</div>
            
     		<div id="write_info1">
            	<div class="cl1"> 난방종류</div> 
            		<li2><select name="type" width="3px" > 
                        <option value="중앙난방">중앙난방</option>
                        <option value="개별난방">개별난방</option>
                        <option value="지역난방">지역난방</option>
                        </select>
                    </li2>
			</div>
            
            
		 <div id="write_info1">
         	<div class="cl1"> 입주일자</div><li2>
				<input type="text" name="day" value="<?=$item_day?>"  placeholder=" YY/MM/DD" size = "20px" style="margin-left:2px;" maxlength="8"></li2>
		</div>
             	
         <div id="write_info1"><div class="cl1"> 옵션항목</div>
         		<li2>
				<input type="checkbox" name='fac1' value="에어컨"   >에어컨
                <input type="checkbox" name='fac2' value="냉장고"   >냉장고
                <input type="checkbox" name='fac3' value="TV">TV
                <input type="checkbox" name='fac4' value="세탁기"   >세탁기
                <input type="checkbox" name='fac5' value="전자레인지"   >전자레인지
            	</li2>
		</div>
            
			   <div class="clear"></div><!-- 공백 -->
				<div class="write_line"></div>
					<img src="../img/detail.png" align = 'left'>
	   			<div class="clear"></div><!-- 공백 -->
				<div class="write_line"></div>
               <div class="clear"></div><!-- 공백 -->
	            <div class="write_line"></div>
                
			<div id="write_row2"><div class="col1"> 방 이름   </div>
			                     <div class="col2"><input type="text" name="rname" value="<?=$item_rname?>" maxlength = "20" ></div>
			</div>
            
			<div class="write_line"></div>
			<div id="write_row3"><div class="col1"> 내용   </div>
			                     <div class="col2"><textarea rows="15" cols="79" name="contents"><?=$item_contents?></textarea></div>
			</div>
			
<!-------------------------------------------------------------------------------------------------------------------->
                <div class="clear"></div><!-- 공백 -->
			<div class="write_line"></div>
            
              <img src="../img/picture.png" align = 'left'>
              
              <div class="clear"></div><!-- 공백 -->
			<div class="write_line"></div>
            
	<div id="write_row2"><div class="col1"> 이미지파일1  </div>
		<div class="col2"><input type="file" name="upfile[]" value = "<?=$item_file_0?>"></div>
	</div>
			<div class="clear"></div>

			<div class="write_line"></div>
			<div id="write_row2"><div class="col1"> 이미지파일2  </div>
			                     <div class="col2"><input type="file" name="upfile[]" value = "<?=$item_file_1?>" ></div>
			</div>

			
			<div class="clear"></div>

			<div class="write_line"></div>

			<div id="write_row2"><div class="col1"> 이미지파일3   </div>
			                     <div class="col2"><input type="file" name="upfile[]" value = "<?=$item_file_2?>"></div>
			</div>
		
			<div class="clear"></div>


			<div class="write_line"></div>

			<div class="clear"></div>
		</div>

		<div id="write_button"><a href="#"><img src="../img/ok.png" onclick="check_input()"></a>&nbsp;
								<a href="./list.php"><img src="../img/list.png"></a>
		</div>
		</form>


	</div> <!-- end of col2 -->
  </div> <!-- end of content -->
</div> <!-- end of wrap -->

</body>
</html>
