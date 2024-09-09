<?php
/**
 * Template name: Quy Đổi
 *
 *
 * Version: 1.1.0

 *
 * @package TPG_theme
 */


function quy_doi_css() {
wp_enqueue_style( 'quy-doi-style', get_template_directory_uri() . '/css/quy-doi.css' );

}
add_action( 'wp_enqueue_scripts', 'quy_doi_css' );

get_header();
?>
  <div class="container_quy_doi"><div class="headline-tool">
  <img src="https://transpacific.vn/wp-content/uploads/2021/05/logo-tpg-white.png">

  </div> 
    <div class="background-quy-doi">
      <div class="column1_input">

        <div class="title-tool">
            <h2>Dễ Dàng Quy Đổi Kích Thước Ra Số Khối </h2>
            <p>Công cụ quy đổi kích thước ra số khối (Cbm) đường biển và số khối (Kgs) đường hàng không</p>
        </div> 
        <div class="quy-doi">
            <div class="input-quy-doi">
              <p>Chiều Rộng (Cm)</p>
                    <input name="rong" type="text" id="chieurong" >
            </div>
            <div class="input-quy-doi">
              <p>Chiều Cao (Cm)</p>
                <input name="cao" type="text" id="chieucao">
            </div>
            <div class="input-quy-doi">
              <p>Chiều Dài (Cm)</p>
                <input name="dai" type="text" id="chieudai" >
            </div>
            <div class="input-quy-doi"> 
              <p>Số Lượng (Thùng)</p>
                <input name="soluong" type="text" id="qualitybox">
            </div>
        </div>
      </div>

    <div class="column2_output">
      <div class="container_output">
        <div class="row1">
          <h2>Tổng Số Khối Là</h2>
        </div>
          <div class="row2">
            <span id="output1"></span>
            <hr class="devider-row2">
          </div>
       
        <div class="row3">
        <div class="output1">
            <p>Đường Biển</p>
            <div class="row">
            <span id="output3"></span>
            <span> Cbm</span>
            </div>
            
        </div>
        <div class="output2">
            <p>Hàng Không</p>
            <div class="row">
            <span id="output2"></span>
            <span> Kgs</span>
            </div>
       </div><!--- Out Put 2 --->
      </div><!--- row3 --->
    </div><!--- container output --->
		<div class="btn-quy-doi">
              <button id="btn1"  onclick="location.href='https://transpacific.vn/'"><i class="fas fa-chevron-left"></i><i class="fas fa-chevron-left"></i> TRA GIÁ CƯỚC</button>
              <button id="btn" type="submit" onclick=quyDoi(); >QUY ĐỔI</button>
            </div>
    </div><!--- column 2 output --->
  </div>
</div> <!--  end container -->

	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script>
	//Button menu 
		function openSlideMenu(){
  document.getElementById('side-menu').style.width = '240px';
  document.getElementById('main').style.marginLeft = '240px';
}

function closeSlideMenu(){
  document.getElementById('side-menu').style.width = '0';
  document.getElementById('main').style.marginLeft = '0';
}			
// Quy đổi kích thước
function quyDoi() {
    var chieurong = parseInt(document.getElementById("chieurong").value);
    var chieucao = parseInt(document.getElementById("chieucao").value);
    var chieudai = parseInt(document.getElementById("chieudai").value);
    var qualitybox = parseInt(document.getElementById("qualitybox").value);
    var KGS = 166.67;
	
	   document.getElementById("output1").innerHTML= Math.round((chieurong * chieucao * chieudai * qualitybox)/1000000);
		document.getElementById("output3").innerHTML= Math.round((chieurong * chieucao * chieudai * qualitybox)/1000000);
		document.getElementById("output2").innerHTML= Math.round((KGS * ((chieurong * chieucao * chieudai * qualitybox)/1000000) * 100) / 100);

}
    </script>
<?php
get_footer();