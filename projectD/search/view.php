<? 
	session_start(); 
	include "../lib/dbconn.php";

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
		$item_date= $row[regist_day];
		
		$item_fac1= $row[fac1];
		$item_fac2= $row[fac2];
		$item_fac3= $row[fac3];
		$item_fac4= $row[fac4];
	
		$item_rname= $row[rname];
		$item_contents= $row[contents];
		$item_name    = $row[name];
		$item_num     = $row[num];
		$item_id      = $row[id];
		$item_current      = $row[current];
		
		$image_name[0]   = $row[file_name_0];
		$image_name[1]   = $row[file_name_1];
		$image_name[2]   = $row[file_name_2];
		$image_copied[0] = $row[file_copied_0];
		$image_copied[1] = $row[file_copied_1];
		$image_copied[2] = $row[file_copied_2];
//파일 출력
for ($i=0; $i<3; $i++)
	{
		if ($image_copied[$i]) 
		{
			$imageinfo = GetImageSize("../regist/data/".$image_copied[$i]);
			$image_width[$i] = $imageinfo[0];
			$image_height[$i] = $imageinfo[1];
			$image_type[$i]  = $imageinfo[2];

			if ($image_width[$i] > 785)
				$image_width[$i] = 785;
		}
		else
		{
			$image_width[$i] = "";
			$image_height[$i] = "";
			$image_type[$i]  = "";
		}
	}
	mysql_query($sql, $connect);
?>
<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd">
<html>
<head> 
<title>방 검색</title>
<meta charset="utf-8">
<link href="http://fonts.googleapis.com/css?family=Source+Sans+Pro:200,300,400,600,700,900" rel="stylesheet" />
<link href="../css/inner.css" rel="stylesheet" type="text/css" media="all">
<link href="../css/fonts.css" rel="stylesheet" type="text/css" media="all">
<link href="../css/board1.css" rel="stylesheet" type="text/css" media="all">
<script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyDA-Tfwl3z52heyu4MGPGl0gENLgTGWtaA&callback=initMap&libraries=places"async defer ></script>
<script>
    function del(href) 
    {
        if(confirm("한번 삭제한 자료는 복구할 방법이 없습니다.\n\n정말 삭제하시겠습니까?")) {
                document.location.href = href;
        }
    }
</script>

<script>

	var map;
	function initMap() {
		map = new google.maps.Map(document.getElementById('map-canvas'), {
			zoom: 12,
			center: {lat: 37.566535, lng: 126.977969},
			streetViewControl: false
		});
		
		var geocoder = new google.maps.Geocoder();
		
			geocodeAddress(geocoder, map);
			map.setZoom(15);
			

	}
	
	function geocodeAddress(geocoder, resultsMap) {
        var address = document.getElementById('address').value;
        geocoder.geocode({'address': address}, function(results, status) {
          if (status === 'OK') {
            resultsMap.setCenter(results[0].geometry.location);
          } else {
            alert('Geocode was not successful for the following reason: ' + status);
          }  
        });
		map.setZoom(15);
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
<!------------------------------------------------------------------------------------------------------------>
<div id="wrapper" style =" height : 180%;">
  
  <div id="content" class = "container" >
	
	<div id="col2">
		<div id="title">
			<img src="../img/room_info.png">
		</div>

		<div id="view_comment"> &nbsp;</div>

		<div id="view_title">
			<div id="view_title1">
			<? if($item_current ==0){?>
			<?= $item_rname ?>&nbsp;( 거래 중	 )</div><div id="view_title2"><?= $item_nick ?> | <?= $item_date ?> 
            <?
			} else { 
			?>
            <?= $item_rname ?>&nbsp;( 거래 완료 )</div><div id="view_title2"><?= $item_nick ?> | <?= $item_date ?> 
            <?
			}
			?>
            
            </div>	
		</div>

		<div id = "write_form">
            <div class="clear"></div><!-- 공백 -->
			<div class="write_line"></div>
			  <img src="../img/map.png" align = 'left'>
            <div class="clear"></div><!-- 공백 -->
            <div class="write_line"></div>
				<div id="write_info1"><div class="cl1"> 주소 </div>
          			<li2>
                    <input id="address" name="address" type="text" style="font-size: 12pt; color:#000; background:#FFF; border:none; width:700px;" disabled="on" value='<?=$item_address?>'/></li2>
				</div>
            <div class="clear"></div><!-- 공백 -->
            <div class="write_line"></div>
            	<img src="../img/info.png" align = "left">
            <div class="clear"></div><!-- 공백 -->
            <div class="write_line"></div>
				<div id="write_info1"><div class="cl1"> 방 종류 </div>
          			<li2><?=$item_kind?></li2>
                </div>
            <div class="write_line"></div>
				<div id="write_info1"><div class="cl1"> 거래종류 </div>
          			<li2><?=$item_ctype?> &nbsp;&nbsp;&nbsp;|
                    보증금 : <?=$item_deposit?>만원 / 월세 : <?=$item_rent?>만원 |</li2>
				</div>
                 <div class="clear"></div><!-- 공백 -->
            <div class="write_line"></div>
                <img src="../img/add.png" align = 'left'>
                   <div class="clear"></div><!-- 공백 -->
			<div class="write_line"></div>
            	  <div id="write_info1"><div class="cl1"> 관리비</div>
                  <li2>관리비 : <?=$item_superfree?>만원</li2>
			</div>
        <!---->
        
			
		
        		<div id="write_info1">
            		<div class="cl1"> 난방종류</div> 
            			<li2>난방종류 : <?=$item_type?>
                  	  </li2>
				</div>
              <div class="write_line"></div>
		 		<div id="write_info1">
         			<div class="cl1"> 입주일자</div>
            		<li2> 입주일자 : <?=$item_day?> </li2>
				</div>
              <div class="write_line"></div>
        	 	<div id="write_info1">
         			<div class="cl1"> 옵션항목</div>
         				<li2>
                		<?=$item_fac1?> <?=$item_fac2?> <?=$item_fac3?> <?=$item_fac4?>
                		</li2>
				</div>
			 <div class="clear"></div><!-- 공백 -->
			 <div class="write_line"></div>
             
				<img src="../img/detail.png" align = 'left'>
                
	   		 <div class="clear"></div><!-- 공백 -->
			 <div class="write_line"></div>
                
			<div id="write_row2"><div class="col1"> 방 이름   </div>
			                     <div class="col2"><?=$item_rname?></div>
			</div>
            
			<div class="write_line"></div>
			<div id="write_row3"><div class="col1"> 내용   </div>
			                     <div class="col2"><?=$item_contents?></div>
			</div>
         <div class="clear"></div><!-- 공백 -->
			<div class="write_line"></div>
            
            
            <div id="write_picture"><div class="col1"> 이미지파일  </div>
            <? if($image_name[0] != NULL ){ ?>
			
			                     <div class="col2"><a href="#" onclick="window.open('../regist/data/<?=$image_copied[0]?>', '','scrollbars=no, toolbars=no,width=600,height=600')" border="0" ><img src="../regist/data/<?=$image_copied[0] ?> " width="200" height="200"></a>&nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp;</div> 
			
            <? } ?>	
			<? if($image_name[1] != NULL ){ ?>
            
			                     <div class="col2"><a href="#" onclick="window.open('../regist/data/<?=$image_copied[1]?>', '','scrollbars=no, toolbars=no,width=600,height=600')" border="0" ><img src="../regist/data/<?=$image_copied[1] ?> " width="200" height="200"></a>&nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp;</div> 
            <? } ?>
            <? if($image_name[2] != NULL){ ?>
           
			                     <div class="col2"><a href="#" onclick="window.open('../regist/data/<?=$image_copied[2]?>', '','scrollbars=no, toolbars=no,width=600,height=600')" border="0" ><img src="../regist/data/<?=$image_copied[2] ?> " width="200" height="200"></a>&nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp;</div> 
			
            <? } ?>
            </div>
            <div class="write_line"></div>
			<div id="write_row3" style="height: 300px;;" >
                <div class="col1" style="height: 180px; ">지도</div>
                <div class="col2" style="width: 650px; height: 505px;" /><div id="map-canvas"></div></div>
                
			</div>
            
            <div id="button" style="float:right;"><a href="list.php"><img src="../img/list.png"></a>&nbsp;</div>
            </div>
            </div>
            </div>
            </div>
</body>
</html>