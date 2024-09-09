<?php
/**
 * Template name: Homepage
 *
 *
 * Version: 1.1.0

 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package TPG_theme
 */

// Create Connection
$conn = mysqli_connect('localhost', 'transpac_15122021', 'Tpg@123456789', 'transpac_15122021');
// $conn = mysqli_connect('localhost', 'root', 'root', 'demo');

// Check Connection
if(mysqli_connect_errno()) {
    // connection failed
    echo 'Failed to connect to MYSQL'.mysqli_connect_errno();
}

$mysqli = new mysqli('localhost', 'transpac_15122021', 'Tpg@123456789', 'transpac_15122021') or die($mysqli->error);
// $mysqli = new mysqli('localhost', 'root', 'root', 'demo') or die($mysqli->error);

// Close result
mysqli_close($conn);

/* Your query */
$result = $mysqli->query("SELECT * FROM FCL") or die($mysqli->error);
$result2 = $mysqli->query("SELECT * FROM FCL") or die($mysqli->error);
$result3 = $mysqli->query("SELECT * FROM LCL") or die($mysqli->error);
$result4 = $mysqli->query("SELECT * FROM LCL") or die($mysqli->error);

function front_page_css() {
wp_enqueue_style( 'front-page-style', get_template_directory_uri() . '/css/style.css?ver=1.0.0' );
wp_enqueue_style( 'select2-style', 'https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.13/css/select2.min.css' );

}

add_action( 'wp_enqueue_scripts', 'front_page_css' );

get_header();
?>
<body>

<!----------- BODY -------------------------------------------------->
    <section class="tab-tinh-gia">
		<div class="row1-tab-tinh-gia">
        <div class="tab-price">
			<div class="container-tab-price">
            <div class="tab">
              <div class="row1-nav-table">
                <label class="tab-title">CÔNG CỤ TÍNH GIÁ CƯỚC VẬN CHUYỂN</label>
              </div>
              <div class="row2-nav-table">
                <button class="tablinks">EXPRESS</button>
                <button class="tablinks active">LCL</button>
                <button class="tablinks">FCL</button>
                <button class="tablinks">AIR</button>
              </div>
            </div>

            <div id="EXPRESS" class="tabcontent">
            <div class="container-tab">
            <div class="headline">
              <p>GỬI HÀNG CHUYỂN PHÁT NHANH</p>
              </div>
<!--                     <form action="/wp-content/themes/TPG theme/express.php" name="expressstep1">
                        <div class="row1-form-containerex">
                            <div class="columnex">
                                <select class="cang-diex" id="noigui" name="Noigui" required>
                                </select>
                            </div>
                            <div class="columnex">
                                <select class="cang-denex" id="noinhan" name="Noinhan" required></select>
                            </div>
                        </div>
                        <div class="row2-form-container">
                            <div class="addresssend">
                                <input type="text" id="adresssend" name="Adress send" placeholder="Địa chỉ gửi" required>
                        	</div>                  
                            <div class="addressreceive">
                                <input type="text" id="adressreceive" name="Adress receive" placeholder="Địa chỉ nhận" required>
                            </div>
                        </div>
                </form> -->
                <div class="row-form-container-btn">
                        <button onclick="location.href='/wp-content/themes/TPG theme/cpn-sheet.pdf'" id="btn-1">BẢNG GIÁ</button>
                        <button id="btn-2" onclick="location.href='https://transpacific.vn/booking-express/'"> GỬI HÀNG </button>
                        </div>
                        </div><!--  container-tab -->
            </div><!--  express -->
        
            <div id="LCL" class="tabcontent">
                <div class="container-tab">
                  <div class="headline">
                <p >TÍNH CƯỚC VẬN CHUYỂN HÀNG LẺ</p>
                </div>
                    <form class="form-container" method="post" action="https://transpacific.vn/homepage-dich-vu-uy-thac-xuat-nhap-khau/lcl/">
                      <div class="row-form-container">
                            <div class="column">
                                <select class="select-port" id="seaport" name="search" required>
                                <option value="Cang-di" selected hidden>-- Cảng đi --</option>
                                    <?php
                                    while ($row3 = mysqli_fetch_array($result3)) {
                                        echo "<option value='" . $row3['nation'] . "'>'" . $row3['nation'] . "'</option>";
                                    }
                                    ?>     
                                </select>
                            </div>
                            <div class="column">
                                <select class="select-port" id="seaport3" name="search2" required>
                                <option value="Cang-den" selected hidden>-- Cảng đến --</option>
                                    <?php
                                    while ($row4 = mysqli_fetch_array($result4)) {
                                        echo "<option value='" . $row4['nation'] . "'>'" . $row4['nation'] . "'</option>";
                                    }
                                    ?>
                                </select>
                            </div>
                        </div>
                        <div class="row-form-container">
                            <div class="column">
                                <input class="trongluong" type="text" id="kg" name="kglcl" placeholder="Trọng lượng (KG)" required>
                            </div>
                    
                            <div class="column">
                                <input class="kichthuoc" type="text" id="cbm" name="cbmlcl" placeholder="Số khối (CBM)" required>
                            </div>
                        </div>
                        <div class="row-form-container-btn">
							<input type="button" onclick="location.href='https://transpacific.vn/quy-doi-cbm/';" id="btn-1" value="QUY ĐỔI">
							<button type="submit" name="submit" onclick="getDataLcl()" id="btn-2">TÍNH PHÍ</button>
                        </div>
                    </form>
                </div><!--  container-tab -->
            </div><!--  LCL -->
            <div id="FCL" class="tabcontent">
                <div class="container-tab">
                <div class="headline">
                <p>TÍNH CƯỚC VẬN CHUYỂN NGUYÊN CONT</p>
                </div>
                    <form class="form-container" method="post" action="https://transpacific.vn/homepage-dich-vu-uy-thac-xuat-nhap-khau/fcl/">
                        <div class="row-form-container">
                            <div class="column">
                                <select class="select-port" id="seaport4" name="search3" required>
                                    <option value="Cang-di" selected hidden>-- Cảng đi --</option>
                                    <?php
                                    while ($row = mysqli_fetch_array($result)) {
                                        echo "<option value='" . $row['nation'] . "'>'" . $row['nation'] . "'</option>";
                                    }
                                    ?>
                                </select>
                            </div>
                    
                            <div class="column">
                                <select class="select-port" id="seaport5" name="search4" required>
                                <option value="Cang-den" selected hidden>-- Cảng đến --</option>
                                    <?php
                                    while ($row2 = mysqli_fetch_array($result2)) {
                                        echo "<option value='" . $row2['nation'] . "'>'" . $row2['nation'] . "'</option>";
                                    }
                                    ?>
                                </select>
                            </div>
                        </div>
                        <div class="row-form-container-qual">
                            <div class="column">
                                <p>20'DC</p>
                                <div class="row-qual-fcl">
                                <span class="input-number-decrement">–</span>
                                <input name="dc20" id="20dc" class="input-number" type="number" value="0" min="0" max="100" required>
                                <span class="input-number-increment">+</span>
                                </div>
                            </div>

                            <div class="column">
                                <p>40'DC</p>
                                <div class="row-qual-fcl">
                                <span class="input-number-decrement">–</span>
                                <input name="dc40" id="40dc" class="input-number2" type="number" value="0" min="0" max="100" required>
                                <span class="input-number-increment">+</span>
                                  </div>
                            </div>

                            <div class="column">
                                <p>40'HC</p>
                                <div class="row-qual-fcl">
                                <span class="input-number-decrement">–</span>
                                <input name="hc40" id="40hc" class="input-number3" type="number" value="0" min="0" max="100" required>
                                <span class="input-number-increment">+</span>
                                  </div>
                            </div>
                        </div>
                        <div class="row-form-container-btn">
							<input type="button" onclick="location.href='https://transpacific.vn/quy-doi-cbm/';" id="btn-3" value="QUY ĐỔI">
							<button type="submit" name="submit2" onclick="getDataFcl()" id="btn-4">TÍNH PHÍ</button>
                        </div> 
                    </form>
                </div><!--  container-tab -->
            </div>
            <div id="AIR" class="tabcontent">
                <div class="container-tab">
                <div class="headline">
                  <p>YÊU CẦU BÁO GIÁ HÀNG AIR</p>
                </div>
                    <!-- <form action="/wp-content/themes/TPG theme/air.php">
                    <div class="row1-form-container">
                            <div class="poa">
                                <select class="cang-di" id="airport1" required name="search3" disable>
                                </select>
                            </div>
                    
                            <div class="column">
                                <select class="cang-den" id="airport2" required name="search3" disable>
                                </select>
                            </div>
                        </div>
                        <div class="row2-form-container">
                            <div class="column">
                                <input class="trongluong" type="text" id="kgair" placeholder="" required disable>
                            </div>
                    
                            <div class="column">
                                <input class="kichthuoc" type="text" id="cbmair" placeholder="" required disable>
                            </div>
                        </div> -->
                        <div class="row-form-container-btn">
                            <button onclick="location.href='https://transpacific.vn/quy-doi-cbm/';" id="btn-1">QUY ĐỔI</button>
                            <button onclick="location.href='https://transpacific.vn/booking-air/';" id="btn-2">BÁO GIÁ</button>
                        </div> 
                      <!-- </form> -->
                    
                </div><!--  container-tab -->
            </div><!--  air -->
			</div> <!-- container tab price -->
        </div>
        <!---------------------------Video hero------------------->

				
				<div class="hero-video">
					<div class="container-video">
							<a id="play-video" class="video-play-button" href="#">
								<div class="icon">
									  <img style="height: 40px; width: auto;" src="https://transpacific.vn/wp-content/themes/TPG theme/icons/play.svg" alt="">

					</div>
								<p>HƯỚNG DẪN DÙNG CÔNG CỤ TÍNH GIÁ</p>
							</a>
					</div>

					<div id="video-overlay" class="video-overlay">
					<a class="video-overlay-close">&times;</a>
					</div>
				</div>
		</div>
        <!------------
Our Partners
-------------------------------------------------------->
<div class="row2-tab-tinh-gia">

<div id="partner" class="partner-home">		
	<div class="title">
        <h4>01</h4>
        <p>OUR PARTNERS</p>
        <svg version="1.1" id="Layer_1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px"
	 viewBox="0 0 173.5 8.6" style="enable-background:new 0 0 173.5 8.6;" xml:space="preserve">
<line class="st0" x1="0" y1="4.7" x2="174" y2="4.7"/>
</svg>
    </div>
	
    <div class="container-partner">
        <div class="column1">
            <h4>HELLO.</h4>
			<p>TPG Global Trading là một trong những công ty forwarder logistics Việt Nam chuyên vận tải xuất nhập khẩu các loại hàng lẻ và hàng nguyên container đi nước ngoài. Trong hơn 10 năm, chúng tôi đã làm việc với hơn 5000 doanh nghiệp lớn nhỏ và sở hữu mạng lưới đối tác logistics toàn cầu lên đến 1.000.000 đại lý.</p>
            <div class="social-media">
                <a href="" class="youtube"><i class="fab fa-youtube"></i></a>
                <a href="" class="twitter"><i class="fab fa-twitter"></i></a>
                <a href="" class="skype"><i class="fab fa-skype"></i></a>
                <a href="" class="facebook"><i class="fab fa-facebook"></i></a>
            </div>
        </div>
    
        <div class="column2">
            <div class="headline-bg">
                <p>T</p>
            </div>
            <div class="signature">
                <p class="headline">TPG GLOBAL TRADING</p>
                <p class="description"> Alway beside your cargo </p>
            </div>
        </div>
    </div>
    <!-- partial:index.partial.html -->
<div class="logo-slider">
	<div class="logo-slide-track">
		<div class="slide">
			<img src="https://transpacific.vn/wp-content/uploads/2022/01/client-2.png" alt="" />
		</div>
		<div class="slide">
			<img src="https://transpacific.vn/wp-content/uploads/2022/01/client-1.png" alt="" />
		</div>
		<div class="slide">
			<img src="https://transpacific.vn/wp-content/uploads/2022/01/client-3.png" alt="" />
		</div>
		<div class="slide">
			<img src="https://transpacific.vn/wp-content/uploads/2022/01/client-4.png" alt="" />
		</div>
		<div class="slide">
			<img src="https://transpacific.vn/wp-content/uploads/2022/01/client-5.png" alt="" />
		</div>
		<div class="slide">
			<img src="https://transpacific.vn/wp-content/uploads/2022/01/client-6.png" alt="" />
		</div>
		<div class="slide">
			<img src="https://transpacific.vn/wp-content/uploads/2022/01/client-7.png" alt="" />
        </div>
        <div class="slide">
			<img src="https://transpacific.vn/wp-content/uploads/2022/01/client-8.png" alt="" />
        </div>
		<div class="slide">
			<img src="https://transpacific.vn/wp-content/uploads/2022/01/client-9.png" alt="" />
        </div>
		<div class="slide">
			<img src="https://transpacific.vn/wp-content/uploads/2022/01/client-2.png" alt="" />
		</div>
		<div class="slide">
			<img src="https://transpacific.vn/wp-content/uploads/2022/01/client-1.png" alt="" />
		</div>
		<div class="slide">
			<img src="https://transpacific.vn/wp-content/uploads/2022/01/client-3.png" alt="" />
		</div>
		<div class="slide">
			<img src="https://transpacific.vn/wp-content/uploads/2022/01/client-4.png" alt="" />
		</div>
		<div class="slide">
			<img src="https://transpacific.vn/wp-content/uploads/2022/01/client-5.png" alt="" />
		</div>
		<div class="slide">
			<img src="https://transpacific.vn/wp-content/uploads/2022/01/client-6.png" alt="" />
		</div>
		<div class="slide">
			<img src="https://transpacific.vn/wp-content/uploads/2022/01/client-7.png" alt="" />
        </div>
        <div class="slide">
			<img src="https://transpacific.vn/wp-content/uploads/2022/01/client-8.png" alt="" />
        </div>
		<div class="slide">
			<img src="https://transpacific.vn/wp-content/uploads/2022/01/client-9.png" alt="" />
        </div>
	</div>
</div>
<!-- partial -->
</div>
</div>
</section> <!------------End tool tính giá------------>

<section id="services" class="services-home">
    <div class="title">
        <h4>02</h4>
        <p>OUR SERVICES</p>
        <svg version="1.1" id="Layer_1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px"
	 viewBox="0 0 173.5 8.6" style="enable-background:new 0 0 173.5 8.6;" xml:space="preserve">
<line class="st0" x1="0" y1="4.7" x2="174" y2="4.7"/>
</svg>
    </div>

    <div class="container-service">
		    <div class="container-box">
								<a href="https://transpacific.vn/van-chuyen-hang-le-lcl/">
		<div class="box">
			<div class="item-service">
             <svg version="1.1" id="Capa_1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px"
	 viewBox="0 0 480 480" style="enable-background:new 0 0 480 480;" xml:space="preserve">
<g>
	<g>
		<path d="M232,336h-48c-4.418,0-8,3.582-8,8v40c0,4.418,3.582,8,8,8h48c4.418,0,8-3.582,8-8v-40C240,339.582,236.418,336,232,336z
			 M224,376h-32v-24h32V376z"/>
	</g>
</g>
<g>
	<g>
		<rect x="384" y="344" width="16" height="16"/>
	</g>
</g>
<g>
	<g>
		<rect x="416" y="344" width="32" height="16"/>
	</g>
</g>
<g>
	<g>
		<rect x="384" y="376" width="64" height="16"/>
	</g>
</g>
<g>
	<g>
		<path d="M479.944,127.712c-0.034-0.842-0.201-1.674-0.496-2.464c-0.072-0.176-0.112-0.36-0.192-0.528
			c-0.08-0.168-0.048-0.2-0.096-0.296l-32-64c-1.355-2.712-4.128-4.425-7.16-4.424H184c-3.032-0.001-5.805,1.712-7.16,4.424l-32,64
			c-0.048,0.096-0.056,0.2-0.104,0.296c-0.048,0.096-0.112,0.352-0.184,0.528c-0.295,0.79-0.462,1.622-0.496,2.464
			c0,0.096-0.056,0.184-0.056,0.288v40H0v16h144v16H32v16h112v200c0,4.418,3.582,8,8,8h320c4.418,0,8-3.582,8-8V128
			C480,127.896,479.944,127.816,479.944,127.712z M435.056,72l24,48h-108l-6-48H435.056z M295.064,72h33.872l6,48h-45.872
			L295.064,72z M288,136h48v96h-48V136z M188.936,72h90l-6,48h-108L188.936,72z M464,408H160V216h48v-16h-48v-16h48v-16h-48v-32h112
			v104c0,4.418,3.582,8,8,8h64c4.418,0,8-3.582,8-8V136h112V408z"/>
	</g>
</g>
<g>
	<g>
		<rect y="304" width="128" height="16"/>
	</g>
</g>
<g>
	<g>
		<rect x="32" y="336" width="96" height="16"/>
	</g>
</g>
</svg>
							</div><!-- icon-service -->
				<div class="icon-title">
					<p>VẬN CHUYỂN HÀNG LẺ</p>
				</div><!-- icon-title -->
			</div>
						</a>
				                <a href="https://transpacific.vn/van-chuyen-hang-full-container/">
			<div class="box">
		    <div class="item-service">
                    <svg version="1.1" id="Capa_1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px"
	 viewBox="0 0 480 480" style="enable-background:new 0 0 480 480;" xml:space="preserve">
<g>
	<g>
		<rect x="40" y="216" width="16" height="64"/>
	</g>
</g>
<g>
	<g>
		<rect x="80" y="216" width="16" height="64"/>
	</g>
</g>
<g>
	<g>
		<rect x="120" y="216" width="16" height="64"/>
	</g>
</g>
<g>
	<g>
		<rect x="160" y="216" width="16" height="64"/>
	</g>
</g>
<g>
	<g>
		<rect x="200" y="216" width="16" height="64"/>
	</g>
</g>
<g>
	<g>
		<path d="M248.004,352c-0.001,0-0.003,0-0.004,0H8c-4.417-0.001-7.999,3.579-8,7.996c0,0.001,0,0.003,0,0.004v112
			c-0.001,4.417,3.579,7.999,7.996,8c0.001,0,0.003,0,0.004,0h240c4.417,0.001,7.999-3.579,8-7.996c0-0.001,0-0.003,0-0.004V360
			C256.001,355.583,252.421,352.001,248.004,352z M240,464H16v-96h224V464z"/>
	</g>
</g>
<g>
	<g>
		<rect x="40" y="384" width="16" height="64"/>
	</g>
</g>
<g>
	<g>
		<rect x="80" y="384" width="16" height="64"/>
	</g>
</g>
<g>
	<g>
		<rect x="120" y="384" width="16" height="64"/>
	</g>
</g>
<g>
	<g>
		<rect x="160" y="384" width="16" height="64"/>
	</g>
</g>
<g>
	<g>
		<rect x="200" y="384" width="16" height="64"/>
	</g>
</g>
<g>
	<g>
		<path d="M472.004,208c-0.001,0-0.003,0-0.004,0h-32V73.795c17.625-13.212,21.202-38.21,7.99-55.835
			c-13.212-17.625-38.21-21.202-55.835-7.99c-9.282,6.958-15.075,17.612-15.868,29.185L160,16.781V8
			c0.001-4.417-3.579-7.999-7.996-8c-0.001,0-0.003,0-0.004,0h-48c-4.417-0.001-7.999,3.579-8,7.996C96,7.997,96,7.999,96,8v40
			c-0.001,4.417,3.579,7.999,7.996,8c0.001,0,0.003,0,0.004,0h16v24c-0.001,4.417,3.579,7.999,7.996,8c0.001,0,0.003,0,0.004,0h4
			c11.046,0,20,8.954,20,20s-8.954,20-20,20s-20-8.954-20-20H96c0.038,11.007,5.136,21.385,13.825,28.143L14.109,184H8
			c-4.417-0.001-7.999,3.579-8,7.996c0,0.001,0,0.003,0,0.004v112c-0.001,4.417,3.579,7.999,7.996,8c0.001,0,0.003,0,0.004,0h240
			c4.417,0.001,7.999-3.579,8-7.996c0-0.001,0-0.003,0-0.004V192c0.001-4.417-3.579-7.999-7.996-8c-0.001,0-0.003,0-0.004,0h-13.977
			l-83.805-45.126c17.112-9.997,22.879-31.972,12.882-49.084c-5.738-9.821-15.792-16.341-27.1-17.572V56h16
			c4.417,0.001,7.999-3.579,8-7.996c0-0.001,0-0.003,0-0.004V32.874l218.503,22.604c2.629,7.285,7.318,13.649,13.497,18.318V208h-72
			c-4.417-0.001-7.999,3.579-8,7.996c0,0.001,0,0.003,0,0.004v112h-16c-4.417-0.001-7.999,3.579-8,7.996c0,0.001,0,0.003,0,0.004
			v136c-0.001,4.417,3.579,7.999,7.996,8c0.001,0,0.003,0,0.004,0h176c4.417,0.001,7.999-3.579,8-7.996c0-0.001,0-0.003,0-0.004V216
			C480.001,211.583,476.421,208.001,472.004,208z M240,200v96H16v-96H240z M200.263,184H49.892l77.972-38.984L200.263,184z M144,40
			h-32V16h32V40z M416,18c13.255,0,24,10.745,24,24s-10.745,24-24,24s-24-10.745-24-24C392.014,28.751,402.751,18.014,416,18z
			 M432,257.082l26.648,22.207L432,297.053V257.082z M458.648,351.289L432,369.053v-39.97L458.648,351.289z M458.648,423.289
			L432,441.053v-39.97L458.648,423.289z M416,464H304V344h112V464z M416,328h-88V224h88V328z M424,208h-16V81.191
			c5.279,1.078,10.721,1.078,16,0V208z M464,464h-32v-3.719l32-21.333V464z M464,406.917l-26.648-22.207L464,366.947V406.917z
			 M464,334.917l-26.648-22.207L464,294.947V334.917z M464,262.917l-32-26.667V224h32V262.917z"/>
	</g>
</g>
<g>
	<g>
		<path d="M416,30c-6.627,0-12,5.373-12,12c0.007,6.624,5.376,11.993,12,12c6.627,0,12-5.373,12-12S422.627,30,416,30z M416,46
			c-2.209,0-4-1.791-4-4c0.003-2.208,1.792-3.997,4-4c2.209,0,4,1.791,4,4S418.209,46,416,46z"/>
	</g>
</g>
</svg>
				</div><!-- icon-service -->
				<div class="icon-title">
					<p>HÀNG FULL CONTAINER</p>
				</div><!-- icon-title -->
				</div>
				</a>
				<a href="https://transpacific.vn/van-chuyen-hang-khong/">
			<div class="box">
    <div class="item-service">
             <svg id="Capa_1" enable-background="new 0 0 512 512" viewBox="0 0 512 512"  xmlns="http://www.w3.org/2000/svg"><g><path d="m506.748 423.628-32.363-52.913 6.539-7.55c.025-.03.051-.059.076-.089 10.621-12.655 16.483-26.045 16.951-38.714.523-13.839-1.233-31.917-12.572-39.5-4.013-2.737-8.81-3.844-13.894-3.887-1.756-36.083-12.516-71.191-31.341-102.006-2.159-3.536-6.776-4.65-10.31-2.491s-4.649 6.775-2.49 10.31c17.789 29.121 27.838 62.365 29.23 96.5-4.412 1.271-8.691 2.93-12.53 4.642-11.591 5.203-21.807 15.643-29.546 30.191-.017.033-.034.066-.051.099l-4.562 8.894-61.135-10.304c-13.905-2.609-26.676 4.14-32.126 12.178l-6.593 9.754c-3.49 5.188-4.492 10.126-2.976 14.678 2.432 7.304 10.405 10.085 12.96 10.975l33.427 12.01 26.342 9.386-11.718 22.843-30.67-6.782c-11.549-2.457-22.316 3.248-26.992 10.165l-3.6 5.345c-3.047 4.505-3.904 8.854-2.55 12.927 2.025 6.089 8.161 8.542 10.749 9.459l30.752 15.183c-1.021 5.542-.38 10.926 1.733 15.479-27.308 14.008-57.682 21.58-88.549 22.038 1.293-17.609-1.992-39.33-14.792-55.395-9.866-12.383-23.972-19.418-40.792-20.344-15.553-.861-22.607-1.379-26.837-4.647-4.703-3.635-8.762-12.641-16.13-28.99l-.853-1.892c-8.416-18.656-27.612-30.242-50.104-30.242-.009 0-.019 0-.028 0-15.997.007-30.408 5.658-39.932 15.087-9.224-23.048-14.309-48.185-14.309-74.491 0-.416.011-.83.014-1.246 10.769 4.233 20.825 6.352 30.139 6.352 16.69 0 31.002-6.79 42.785-20.355 2.717-3.127 2.384-7.864-.743-10.58s-7.863-2.384-10.581.744c-9.554 10.999-26.163 23.454-60.868 7.87 3.548-41.327 19.803-80.639 46.711-112.474h94.282c4.79 0 9.489-.908 13.969-2.698 20.44-6.955 34.154-26.111 34.154-47.743 0-7.182-1.516-14.014-4.229-20.205 5.057-.383 10.126-.598 15.166-.598 26.544 0 52.491 5.275 76.494 15.178 8.306 12.783 12.148 22.424 11.715 29.414-.359 5.815-3.844 10.054-8.255 15.42-8.195 9.971-19.407 23.611-12.175 53.269 3.127 22.147-13.119 37.771-30.877 41.781-14.224 3.213-33.165-.667-39.719-22.174-7.27-23.862-31.074-40.838-57.886-41.283-.372-.006-.739-.009-1.109-.009-26.004 0-46.706 15.28-55.507 41.066-2.256 6.641-4.273 11.996-6.351 16.852-1.628 3.809.14 8.216 3.948 9.845 3.807 1.628 8.215-.139 9.845-3.947 2.23-5.217 4.379-10.913 6.757-17.914 9.68-28.355 32.758-31.041 42.169-30.894 20.385.338 38.389 12.945 43.787 30.657 7.325 24.038 26.314 33.812 45.102 33.811 4.142 0 8.276-.476 12.27-1.377 24.599-5.556 47.048-27.592 42.359-58.961-.035-.234-.081-.466-.139-.695-5.601-22.599 1.547-31.294 9.114-40.501 9.742-11.852 16.207-22.674 8.011-43.069 19.273 11.014 36.806 25.249 51.738 42.352 1.482 1.699 3.561 2.567 5.652 2.567 1.75 0 3.508-.609 4.93-1.85 3.12-2.724 3.441-7.462.717-10.582-21.522-24.652-48.065-43.778-77.424-56.404-.507-.289-1.04-.522-1.594-.685-26.174-11.007-54.542-16.866-83.571-16.866-8.149 0-16.375.474-24.509 1.402-9.208-9.877-22.312-16.069-36.84-16.069-.924 0-1.851.026-2.778.078-2.977-14.514-10.452-27.765-21.511-37.91-13.077-11.996-30.062-18.602-47.826-18.602-20.833 0-40.13 8.896-53.597 24.559-.94-.063-1.895-.095-2.857-.095-21.75 0-39.57 17.142-40.656 38.623-15.571 8.926-25.388 25.623-25.388 43.818 0 21.628 13.711 40.782 34.144 47.74 4.454 1.792 9.146 2.701 13.95 2.701h35.354c-25.306 33.68-40.209 74.047-42.85 116.15-.04.33-.06.66-.056.989-.242 4.169-.378 8.352-.378 12.55 0 57.687 22.444 111.919 63.197 152.706 40.758 40.791 94.951 63.256 152.6 63.256 36.088 0 71.671-9.07 103.178-26.259 2.228.809 4.667 1.266 7.225 1.266 4.371 0 9.077-1.324 13.621-4.419l25.366 22.724c1.745 1.979 6.027 6.473 12.053 6.473.245 0 .494-.007.745-.023 4.282-.262 7.989-2.673 11.021-7.169l3.601-5.346c4.688-6.935 5.966-19.076-.653-28.846l-17.586-26.086 16.677-19.253 18.544 20.97 23.528 26.457c1.755 2.023 6.969 8.037 14.26 8.036.262 0 .527-.008.795-.024 4.806-.288 9.024-3.069 12.541-8.267l6.597-9.758c5.41-8.049 6.89-22.42-.726-34.346zm-467.145-278.454c-.152-.063-.306-.12-.462-.172-14.439-4.841-24.141-18.342-24.141-33.596 0-13.975 8.237-26.693 20.986-32.401 2.878-1.288 4.643-4.238 4.416-7.382-.044-.616-.066-1.274-.066-1.956 0-14.172 11.533-25.701 25.709-25.701 1.646 0 3.221.14 4.68.415 2.791.526 5.641-.569 7.36-2.831 10.653-14.012 26.842-22.048 44.415-22.048 28.997 0 52.875 21.753 55.543 50.598.197 2.134 1.298 4.082 3.024 5.352s3.914 1.74 6.01 1.292c2.511-.536 5.047-.808 7.538-.808 19.526 0 35.413 15.912 35.413 35.47 0 15.254-9.702 28.755-24.141 33.596-.149.05-.297.104-.442.164-2.743 1.116-5.616 1.682-8.539 1.682h-148.812c-2.925-.001-5.782-.564-8.491-1.674zm318.894 217.108-33.474-12.026c-1.871-.652-2.903-1.223-3.437-1.583.156-.353.424-.864.882-1.544l6.578-9.732c1.706-2.516 8.344-7.477 16.982-5.836.052.01.103.019.154.028l56.519 9.527-16.01 31.212zm-38.123 63.454c-.341-.119-.639-.231-.896-.336l3.363-4.993c.997-1.474 5.557-5.135 11.377-3.895l26.773 5.921-9.534 18.586-30.222-14.921c-.279-.139-.567-.26-.861-.362zm-244.04-44.462c5.942-9.276 18.723-15.328 33.079-15.334h.022c16.764 0 30.382 8.003 36.429 21.409l.851 1.888c8.633 19.155 12.967 28.769 20.633 34.695 8.097 6.257 17.717 6.79 35.183 7.757 12.605.694 22.66 5.644 29.886 14.714 10.331 12.966 12.771 31.077 11.515 45.726-73.397-4.365-136.301-48.36-167.598-110.855zm286.904 85.37c-2.722-1.775-4.279-6.3-1.688-12.439l17.057-33.253c.085-.148.159-.303.235-.458l18.076-35.238c.025-.044.046-.091.069-.135l30.778-60.002c6.155-11.556 13.907-19.683 22.403-23.497 5.451-2.431 10.559-4.111 14.911-4.983.321-.036.632-.099.939-.174 4.934-.876 8.803-.654 10.92.797.029.021.06.041.09.061 4.11 2.732 6.438 13.123 5.933 26.479-.343 9.296-4.981 19.526-13.414 29.586l-9.943 11.479c-.093.101-.182.205-.269.311l-33.592 38.781c-.215.223-.419.452-.602.695l-23.915 27.609c-.199.109-.397.225-.589.355-1.344.906-2.295 2.173-2.823 3.584l-23.305 26.905c-3.898 4.18-8.213 5.534-11.271 3.537zm56.453 7.654c3.359 4.959 1.655 10.566.646 12.058l-3.337 4.955c-.192-.199-.406-.432-.643-.703-.204-.235-.423-.457-.655-.665l-25.109-22.493 13.767-15.893zm75.345-24.708-6.584 9.738c-.467.69-.845 1.135-1.116 1.415-.535-.366-1.458-1.125-2.784-2.654l-23.576-26.512-19.859-22.456 22.962-26.508 29.914 48.908c.029.047.058.094.088.14 4.754 7.404 2.638 15.425.955 17.929z"/></g></svg>
		    </div>
		<div class="icon-title">
			<p>VẬN CHUYỂN HÀNG KHÔNG</p>
		</div><!-- icon-title -->
				</div>
				</a>
				<a href="https://transpacific.vn/van-chuyen-noi-dia/">
			<div class="box">
    <div class="item-service">
	<svg version="1.1" id="Capa_1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px"
	 viewBox="0 0 511.999 511.999" style="enable-background:new 0 0 511.999 511.999;" xml:space="preserve">
<g>
	<g>
		<path d="M95.758,344.692h-0.081c-4.142,0-7.459,3.358-7.459,7.5c0,4.142,3.398,7.5,7.54,7.5c4.142,0,7.5-3.358,7.5-7.5
			C103.258,348.05,99.9,344.692,95.758,344.692z"/>
	</g>
</g>
<g>
	<g>
		<path d="M159.887,344.692h-0.08c-4.142,0-7.46,3.358-7.46,7.5c0,4.142,3.398,7.5,7.54,7.5c4.142,0,7.5-3.358,7.5-7.5
			C167.387,348.05,164.029,344.692,159.887,344.692z"/>
	</g>
</g>
<g>
	<g>
		<path d="M424.419,344.692h-0.08c-4.142,0-7.46,3.358-7.46,7.5c0,4.142,3.398,7.5,7.54,7.5c4.142,0,7.5-3.358,7.5-7.5
			C431.919,348.05,428.561,344.692,424.419,344.692z"/>
	</g>
</g>
<g>
	<g>
		<path d="M505.107,254.016l-10.084-10.084l-20.315-60.946c3.031-0.963,5.228-3.798,5.228-7.147c0-4.142-3.358-7.5-7.5-7.5h-72.661
			v-32.578c0-8.556-6.96-15.516-15.516-15.516H15.516C6.96,120.245,0,127.206,0,135.761v176.354c0,8.556,6.96,15.516,15.516,15.516
			h8.532v16.544c0,8.556,6.96,15.516,15.516,15.516h17.271c3.516,18.24,19.591,32.064,38.842,32.064
			c13.182,0,24.871-6.486,32.064-16.428c7.194,9.942,18.883,16.428,32.065,16.428c19.251,0,35.327-13.824,38.842-32.064h186.848
			c3.516,18.24,19.591,32.064,38.842,32.064c21.816,0,39.564-17.749,39.564-39.564c0-0.172-0.011-0.341-0.013-0.512h32.594
			c8.556,0,15.516-6.96,15.516-15.516v-65.508C512,264.37,509.552,258.461,505.107,254.016z M56.835,344.692H39.564
			c-0.285,0-0.516-0.231-0.516-0.516v-16.544h25.645C60.813,332.518,58.06,338.334,56.835,344.692z M95.677,376.757
			c-13.545,0-24.564-11.02-24.564-24.564c0-13.493,10.937-24.477,24.411-24.561h0.308c13.474,0.083,24.411,11.067,24.411,24.561
			C120.242,365.737,109.222,376.757,95.677,376.757z M159.807,376.757c-13.545,0-24.565-11.02-24.565-24.564
			c0-13.493,10.937-24.477,24.411-24.561h0.308c13.474,0.083,24.411,11.067,24.411,24.561
			C184.371,365.737,173.352,376.757,159.807,376.757z M385.497,344.692H198.649c-1.225-6.358-3.978-12.175-7.859-17.061h145.371
			c4.142,0,7.5-3.358,7.5-7.5c0-4.142-3.358-7.5-7.5-7.5H15.516c-0.285,0-0.516-0.231-0.516-0.516V135.761
			c0-0.285,0.231-0.516,0.516-0.516h368.742c0.285,0,0.516,0.231,0.516,0.516v176.871h-16.545c-4.142,0-7.5,3.358-7.5,7.5
			c0,4.142,3.358,7.5,7.5,7.5h25.126C389.474,332.518,386.722,338.334,385.497,344.692z M480.734,248.499h-48.379
			c-0.285,0-0.516-0.231-0.516-0.516v-32.581h37.863L480.734,248.499z M424.339,376.757c-13.545,0-24.564-11.02-24.564-24.564
			c0-13.493,10.937-24.477,24.411-24.561h0.154c0.017,0,0.034-0.002,0.052-0.003c13.521,0.028,24.513,11.036,24.513,24.563
			C448.903,365.737,437.884,376.757,424.339,376.757z M497,336.165c0,0.285-0.231,0.516-0.516,0.516h-35.752
			c-6.045-14.127-20.08-24.052-36.393-24.052c-0.052,0-0.102,0.004-0.154,0.004h-24.41V183.858v-0.004
			c0-0.285,0.231-0.516,0.516-0.516h58.723l5.688,17.064h-40.363c-4.142,0-7.5,3.358-7.5,7.5v40.081
			c0,8.556,6.96,15.516,15.516,15.516h61.022l1.124,1.124c1.611,1.612,2.499,3.754,2.499,6.033v17.928h-8.532
			c-4.142,0-7.5,3.358-7.5,7.5c0,4.142,3.358,7.5,7.5,7.5H497V336.165z"/>
	</g>
</g>
<g>
	<g>
		<path d="M360.209,280.567H39.564c-4.142,0-7.5,3.358-7.5,7.5c0,4.142,3.358,7.5,7.5,7.5h320.645c4.142,0,7.5-3.358,7.5-7.5
			C367.709,283.925,364.351,280.567,360.209,280.567z"/>
	</g>
</g>
</svg>
		</div><!-- icon-service -->
		<div class="icon-title">
			<p>VẬN CHUYỂN NỘI ĐỊA</p>
		</div><!-- icon-title -->
    </div>
				</a>
				<a href="https://transpacific.vn/thu-tuc-hai-quan/">
		<div class="box">
    <div class="item-service">
	<svg version="1.1" id="Capa_1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px"
	 viewBox="0 0 512.001 512.001" style="enable-background:new 0 0 512.001 512.001;" xml:space="preserve">
<g>
	<g>
		<path d="M345.999,449c-5.52,0-10,4.48-10,10c0,5.52,4.48,10,10,10c5.52,0,10-4.48,10-10C355.999,453.48,351.519,449,345.999,449z"
			/>
	</g>
</g>
<g>
	<g>
		<path d="M440.428,359.785c-10.185-14.982-24.474-26.425-41.322-33.094l-73.357-29.031c19.183-18.662,30.25-44.387,30.25-71.66
			c0-10.783-1.686-21.285-5.013-31.341c3.054-1.758,5.013-5.034,5.013-8.659v-30.639l17.453-34.907l17.019-8.509
			c3.389-1.694,5.528-5.157,5.528-8.944V73c0-4.304-2.754-8.125-6.838-9.487l-28.438-9.479L292.035,2.027
			C290.298,0.712,288.178,0,285.999,0h-60c-2.18,0-4.299,0.712-6.036,2.027l-68.688,52.006l-28.438,9.479
			c-4.084,1.361-6.838,5.183-6.838,9.487v30c0,3.788,2.14,7.25,5.528,8.944l17.019,8.509l17.453,34.907V186
			c0,3.625,1.957,6.9,5.012,8.659c-3.329,10.053-5.012,20.553-5.012,31.341c0,27.272,11.066,52.996,30.242,71.652l-73.363,29.04
			c-16.845,6.667-31.131,18.111-41.314,33.093C61.381,374.765,56,392.258,56,410.37V502c0,5.523,4.478,10,10,10h179.987
			c0.008,0,0.015,0.001,0.023,0.001c0.007,0,0.015-0.001,0.022-0.001h19.937c0.007,0,0.015,0.001,0.022,0.001
			c0.008,0,0.015-0.001,0.023-0.001h179.987c5.522,0,10-4.477,10-10v-91.62C455.999,392.264,450.615,374.769,440.428,359.785z
			 M357.173,331.605L295.999,432.95v-30.28c0-6.458-2.133-12.853-6-18l-17.651-23.536c8.21-5.359,13.651-14.62,13.651-25.134
			v-14.597c7.449-2.335,14.568-5.524,21.275-9.545L357.173,331.605z M154.943,108.528c-0.968-1.935-2.537-3.505-4.473-4.472
			l-14.472-7.236V80.208l23.162-7.721c1.034-0.345,2.005-0.856,2.874-1.514L229.357,20h53.283l67.322,50.973
			c0.869,0.658,1.84,1.169,2.874,1.514l23.162,7.721V96.82l-14.472,7.236c-1.936,0.968-3.505,2.537-4.473,4.472L339.818,143H172.179
			L154.943,108.528z M175.999,163h160v15.758l-26.151,8.601c-17.456,5.734-35.61,8.641-53.96,8.641
			c-9.195,0-18.446-0.741-27.496-2.202c-9.032-1.458-18.052-3.663-26.802-6.551l-19.315-6.392c-0.86-1.003-1.932-1.853-3.195-2.47
			c-0.998-0.487-2.037-0.785-3.081-0.923V163z M175.999,226c0-8.558,1.329-16.883,3.941-24.852l15.374,5.089
			c9.76,3.221,19.816,5.679,29.891,7.306c10.1,1.631,20.424,2.458,30.684,2.458c20.473,0,40.728-3.243,60.205-9.641l15.96-5.247
			c2.618,7.981,3.946,16.32,3.946,24.888c0,26.541-13.103,51.256-35.069,66.196c-0.155,0.097-0.304,0.203-0.454,0.308
			c-8.146,5.469-17.123,9.345-26.691,11.515c-11.584,2.631-23.986,2.631-35.574,0c-9.622-2.182-18.658-6.094-26.865-11.631
			C189.213,277.478,175.999,252.66,175.999,226z M265.999,325.495V336c0,5.514-4.487,10-10,10c-2.668,0-5.179-1.041-7.068-2.931
			c-1.891-1.89-2.932-4.401-2.932-7.069v-10.505c3.317,0.33,6.655,0.505,10,0.505C259.344,326,262.682,325.825,265.999,325.495z
			 M204.714,311.848c6.716,4.027,13.838,7.219,21.285,9.554V336c0,8.01,3.121,15.543,8.79,21.212
			c1.495,1.494,3.122,2.806,4.85,3.936l-17.635,23.515c-3.872,5.154-6.005,11.549-6.005,18.007v30.284l-61.174-101.357
			L204.714,311.848z M75.999,492v-81.63c0-28.899,17.365-54.445,44.239-65.082l15.731-6.227l80.639,133.607L228.28,492H75.999z
			 M275.998,466.083L260.355,492h-8.713l-15.644-25.91v-63.42c0-2.153,0.708-4.281,2-6l18-24.002l18.005,24.009
			c1.287,1.712,1.995,3.84,1.995,5.993V466.083z M283.716,492l92.314-152.932l15.719,6.221c26.881,10.639,44.25,36.189,44.25,65.091
			V492H283.716z"/>
	</g>
</g>
<g>
	<g>
		<path d="M255.999,43c-22.056,0-40,17.944-40,40c0,22.056,17.944,40,40,40c22.056,0,40-17.944,40-40
			C295.999,60.944,278.055,43,255.999,43z M255.999,103c-11.028,0-20-8.972-20-20s8.971-20,20-20c11.028,0,20,8.972,20,20
			S267.027,103,255.999,103z"/>
	</g>
</g>
<g>
	<g>
		<path d="M405.999,449h-20c-5.522,0-10,4.477-10,10s4.478,10,10,10h20c5.522,0,10-4.477,10-10S411.521,449,405.999,449z"/>
	</g>
</g>
</svg>
			</div><!-- icon-service -->
		<div class="icon-title">
			<p>THỦ TỤC HẢI QUAN</p>
		</div><!-- icon-title -->
			</div>
			            </a>
				<a href="https://transpacific.vn/service/uy-thac-xuat-nhap-khau/">
			<div class="box">
    <div class="item-service">
                <svg viewBox="0 0 480.01574 480" xmlns="http://www.w3.org/2000/svg"><path d="m424.015625 120.007812v-80c0-4.417968-3.582031-8-8-8h-32v16h24v72zm0 0"/><path d="m56.015625 240.007812v200c0 4.417969 3.582031 8 8 8h320c4.417969 0 8-3.582031 8-8v-56h-16v48h-304v-192zm0 0"/><path d="m315.328125.808594c-.25-.113282-.488281-.175782-.746094-.265625-.667969-.230469-1.363281-.367188-2.070312-.414063-.175781-.0312498-.328125-.1210935-.496094-.1210935h-248c-4.417969 0-8 3.5820315-8 7.9999995v16h16v-8h232v64c0 4.417969 3.582031 8 8 8h64v40h16v-48c0-.167968-.085937-.320312-.097656-.496093-.042969-.707031-.183594-1.402344-.414063-2.070313-.089844-.257812-.152344-.496094-.265625-.746094-.386719-.871093-.929687-1.664062-1.597656-2.34375l-72-72c-.675781-.644531-1.457031-1.167968-2.3125-1.542968zm49.375 71.199218h-44.6875v-44.6875zm0 0"/><path d="m184.015625 336.007812v64c0 4.417969 3.582031 8 8 8h104v-16h-96v-48h40v-16h-48c-4.417969 0-8 3.582032-8 8zm0 0"/><path d="m216.015625 360.007812h48v16h-48zm0 0"/><path d="m424.015625 136.007812c-30.910156.039063-55.960937 25.089844-56 56v.800782l-40.800781 43.070312-25.542969-25.542968c-3.125-3.125-8.1875-3.125-11.3125 0l-72 72c-3.121094 3.125-3.121094 8.1875 0 11.3125l112 112c3.125 3.121093 8.1875 3.121093 11.3125 0l24-24 42.34375-42.328126v124.6875h-312v16h320c4.417969 0 8-3.582031 8-8v-192h-16v36.6875l-27.886719-27.886718 43.085938-40.800782h.800781c30.929687 0 56-25.070312 56-56 0-30.929687-25.070313-56-56-56zm-88 252.6875-100.6875-100.6875 12.6875-12.6875 100.6875 100.6875zm60.6875-60.6875-36.6875 36.6875-100.6875-100.6875 36.6875-36.6875 20.191406 20.191407-18 18.992187c-3.007812 3.152344-2.9375 8.128906.152344 11.199219l40 40c3.0625 3.0625 8.007813 3.128906 11.152344.152344l19-18zm27.3125-96h-4c-2.046875 0-4.015625.785157-5.503906 2.191407l-70.34375 66.609375-28.953125-28.953125 66.640625-70.34375c1.398437-1.492188 2.167969-3.460938 2.160156-5.503907v-4c0-22.089843 17.910156-40 40-40s40 17.910157 40 40c0 22.089844-17.910156 40-40 40zm0 0"/><path d="m152.015625 232.007812h80v16h-80zm0 0"/><path d="m104.015625 264.007812h96v16h-96zm0 0"/><path d="m176.015625 200.007812h96v16h-96zm0 0"/><path d="m104.015625 296.007812h48v16h-48zm0 0"/><path d="m104.015625 328.007812h64v16h-64zm0 0"/><path d="m104.015625 360.007812h64v16h-64zm0 0"/><path d="m104.015625 392.007812h64v16h-64zm0 0"/><path d="m104.015625 232.007812h32v16h-32zm0 0"/><path d="m168.015625 296.007812h32v16h-32zm0 0"/><path d="m200.015625 160.007812h80v16h-80zm0 0"/><path d="m96.015625 224.007812c51.667969-.058593 94.023437-41.003906 95.832031-92.640624 4.320313 3.617187 9.902344 5.363281 15.511719 4.847656 4.121094 4.9375 10.222656 7.792968 16.65625 7.792968s12.535156-2.855468 16.65625-7.792968c6.40625.574218 12.734375-1.722656 17.28125-6.269532 4.546875-4.546874 6.84375-10.875 6.269531-17.28125 4.941406-4.121093 7.792969-10.222656 7.792969-16.65625 0-6.433593-2.851563-12.535156-7.792969-16.65625.574219-6.40625-1.722656-12.734374-6.269531-17.28125-4.546875-4.546874-10.875-6.84375-17.28125-6.269531-4.121094-4.9375-10.222656-7.792969-16.65625-7.792969s-12.535156 2.855469-16.65625 7.792969c-6.40625-.574219-12.734375 1.722657-17.28125 6.269531-4.546875 4.546876-6.84375 10.875-6.269531 17.28125-1.183594.976563-2.257813 2.082032-3.199219 3.296876-22.195313-41.398438-71.082031-60.65625-115.546875-45.519532-44.464844 15.140625-71.449219 60.226563-63.773438 106.566406 7.675782 46.339844 47.757813 80.320313 94.726563 80.3125zm99.726563-133.28125c2.132812-.757812 3.84375-2.382812 4.710937-4.472656.863281-2.089844.804687-4.449218-.164063-6.492187-1.039062-2.148438-.605468-4.714844 1.078126-6.402344 1.6875-1.683594 4.253906-2.117187 6.402343-1.078125 2.042969.96875 4.402344 1.027344 6.492188.164062 2.089843-.867187 3.714843-2.578124 4.472656-4.710937.792969-2.238281 2.90625-3.734375 5.28125-3.734375s4.488281 1.496094 5.28125 3.734375c.757813 2.132813 2.382813 3.84375 4.472656 4.710937 2.089844.863282 4.449219.804688 6.496094-.164062 2.144531-1.039062 4.710937-.605469 6.398437 1.078125 1.683594 1.6875 2.117188 4.253906 1.078126 6.402344-.96875 2.042969-1.027344 4.402343-.164063 6.492187.867187 2.089844 2.578125 3.714844 4.710937 4.472656 2.238282.792969 3.734376 2.90625 3.734376 5.28125s-1.496094 4.488282-3.734376 5.28125c-2.132812.757813-3.84375 2.382813-4.710937 4.472657-.863281 2.089843-.804687 4.449219.164063 6.496093 1.105468 2.136719.65625 4.75-1.101563 6.398438-1.65625 1.742188-4.257813 2.1875-6.402344 1.105469-2.042969-.972657-4.402343-1.03125-6.492187-.164063-2.089844.863282-3.714844 2.574219-4.472656 4.707032-.792969 2.238281-2.910157 3.734374-5.28125 3.734374-2.375 0-4.488282-1.496093-5.28125-3.734374-.757813-2.136719-2.386719-3.847657-4.480469-4.710938-.972657-.398438-2.011719-.605469-3.0625-.609375-1.1875.003906-2.359375.277344-3.425781.800781-2.144532 1.035156-4.710938.601563-6.398438-1.082031-1.683594-1.6875-2.117188-4.253906-1.078125-6.398437.96875-2.042969 1.027344-4.402344.164063-6.492188-.867188-2.09375-2.578126-3.71875-4.710938-4.476562-2.238281-.789063-3.734375-2.90625-3.734375-5.28125 0-2.371094 1.496094-4.488282 3.734375-5.277344zm-99.726563-42.71875c44.183594 0 80 35.816407 80 80 0 44.183594-35.816406 80-80 80s-80-35.816406-80-80c.046875-44.164062 35.835937-79.953124 80-80zm0 0"/><path d="m58.359375 173.664062c3.125 3.121094 8.1875 3.121094 11.3125 0l80-80-11.3125-11.3125-74.34375 74.34375-18.34375-18.34375-11.3125 11.3125zm0 0"/></svg>
		</div><!-- icon-service -->
		<div class="icon-title">
			<p>ỦY THÁC XUẤT NHẬP KHẨU</p>
		</div><!-- icon-title -->
		</div>
				</a>
				<a href="https://transpacific.vn/lam-chung-tu-c-o/">
	<div class="box">
    <div class="item-service">
		<svg id="Capa_1" enable-background="new 0 0 512 512" viewBox="0 0 512 512" xmlns="http://www.w3.org/2000/svg"><g><g><path d="m504.5 120.477c-4.143 0-7.5 3.358-7.5 7.5v265.167h-189.429l-3.082-5.339c4.116-4.177 7.689-8.886 10.625-14.007h120.695c4.143 0 7.5-3.358 7.5-7.5v-10.102c0-9.233 7.512-16.744 16.744-16.744h10.102c4.143 0 7.5-3.358 7.5-7.5v-212.132c0-4.142-3.357-7.5-7.5-7.5h-10.102c-9.232 0-16.744-7.511-16.744-16.744v-10.102c0-4.142-3.357-7.5-7.5-7.5h-277.318c-4.142 0-7.5 3.358-7.5 7.5s3.358 7.5 7.5 7.5h269.817v2.602c0 17.503 14.24 31.744 31.744 31.744h2.602v197.134h-2.602c-17.504 0-31.744 14.24-31.744 31.744v2.602h-106.848c1.713-5.965 2.65-12.256 2.65-18.764 0-37.556-30.554-68.11-68.109-68.11s-68.11 30.554-68.11 68.11c0 6.509.937 12.799 2.65 18.764h-106.85v-2.602c0-17.504-14.24-31.744-31.744-31.744h-2.602v-197.134h2.602c17.503 0 31.744-14.24 31.744-31.744v-2.602h39.781c4.142 0 7.5-3.358 7.5-7.5s-3.358-7.5-7.5-7.5h-47.281c-4.142 0-7.5 3.358-7.5 7.5v10.102c0 9.232-7.511 16.744-16.744 16.744h-10.101c-4.142 0-7.5 3.358-7.5 7.5v212.134c0 4.142 3.358 7.5 7.5 7.5h10.102c9.232 0 16.744 7.511 16.744 16.744v10.102c0 4.142 3.358 7.5 7.5 7.5h120.695c2.936 5.121 6.509 9.829 10.626 14.007l-3.082 5.338h-189.431v-60.48c0-4.142-3.358-7.5-7.5-7.5s-7.5 3.358-7.5 7.5v67.98c0 4.142 3.358 7.5 7.5 7.5h188.269l-16.612 28.772c-.995 1.723-1.264 3.77-.75 5.691.515 1.921 1.772 3.56 3.495 4.554l34.993 20.203c1.181.682 2.471 1.006 3.743 1.006 2.592 0 5.113-1.346 6.502-3.751l28.86-49.986 28.859 49.986c.994 1.723 2.633 2.979 4.554 3.495.639.171 1.291.255 1.941.255 1.305 0 2.6-.341 3.75-1.005l34.992-20.203c3.587-2.071 4.816-6.658 2.745-10.245l-16.611-28.772h188.27c4.143 0 7.5-3.358 7.5-7.5v-272.668c0-4.142-3.357-7.5-7.5-7.5zm-248.5 166.449c29.284 0 53.109 23.825 53.109 53.11s-23.825 53.109-53.109 53.109c-29.285 0-53.11-23.825-53.11-53.109s23.825-53.11 53.11-53.11zm-38.099 163.699-22.003-12.703 23.411-40.55c7.147 4.59 15.199 7.882 23.83 9.538zm76.199 0-25.239-43.714c8.631-1.657 16.682-4.949 23.83-9.539l23.411 40.55z"/><path d="m504.5 43.629h-497c-4.142 0-7.5 3.358-7.5 7.5v246.514c0 4.142 3.358 7.5 7.5 7.5s7.5-3.358 7.5-7.5v-239.014h482v34.3c0 4.142 3.357 7.5 7.5 7.5s7.5-3.358 7.5-7.5v-41.8c0-4.142-3.357-7.5-7.5-7.5z"/><path d="m256 373.8c18.618 0 33.765-15.146 33.765-33.764s-15.147-33.765-33.765-33.765-33.764 15.147-33.764 33.765 15.146 33.764 33.764 33.764zm0-52.529c10.347 0 18.765 8.418 18.765 18.765s-8.418 18.764-18.765 18.764-18.764-8.417-18.764-18.764 8.417-18.765 18.764-18.765z"/><path d="m316.609 157.625c4.143 0 7.5-3.358 7.5-7.5v-32.325c0-4.142-3.357-7.5-7.5-7.5h-121.219c-4.142 0-7.5 3.358-7.5 7.5v32.325c0 4.142 3.358 7.5 7.5 7.5zm-113.719-32.325h106.219v17.325h-106.219z"/><path d="m107.077 214.775c0 4.142 3.358 7.5 7.5 7.5h282.846c4.143 0 7.5-3.358 7.5-7.5s-3.357-7.5-7.5-7.5h-282.846c-4.142 0-7.5 3.358-7.5 7.5z"/><path d="m147.484 182.45c0 4.142 3.358 7.5 7.5 7.5h202.033c4.143 0 7.5-3.358 7.5-7.5s-3.357-7.5-7.5-7.5h-202.033c-4.142 0-7.5 3.358-7.5 7.5z"/><path d="m397.423 239.6h-282.846c-4.142 0-7.5 3.358-7.5 7.5s3.358 7.5 7.5 7.5h282.846c4.143 0 7.5-3.358 7.5-7.5s-3.358-7.5-7.5-7.5z"/><path d="m149.625 302.657c4.396 1.766 9.356.698 12.635-2.723l2.52-2.629c.641 3.492 3.7 6.138 7.376 6.138 4.142 0 7.5-3.358 7.5-7.5v-7.117c0-4.738-2.841-8.941-7.237-10.708-4.396-1.765-9.355-.699-12.635 2.723l-2.396 2.5v-1.886c0-4.685-2.796-8.87-7.125-10.663-4.328-1.792-9.265-.811-12.576 2.502l-28.413 28.413c-2.929 2.929-2.929 7.678 0 10.606 1.464 1.465 3.384 2.197 5.303 2.197s3.839-.732 5.303-2.197l22.507-22.507v2.143c.001 4.738 2.842 8.941 7.238 10.708z"/><path d="m374.892 302.657c4.395 1.765 9.355.697 12.634-2.723l2.521-2.63c.641 3.492 3.7 6.138 7.377 6.138 4.143 0 7.5-3.358 7.5-7.5v-7.117c0-4.738-2.841-8.941-7.237-10.708s-9.355-.698-12.635 2.722l-2.396 2.5v-1.885c0-4.685-2.797-8.87-7.124-10.662-4.327-1.794-9.265-.81-12.578 2.502l-28.412 28.413c-2.929 2.929-2.929 7.678 0 10.606 1.465 1.464 3.385 2.197 5.304 2.197s3.839-.732 5.304-2.197l22.507-22.507v2.143c-.003 4.738 2.838 8.941 7.235 10.708z"/></g></g></svg>
		</div><!-- icon-service -->
		<div class="icon-title">
			<p>CHỨNG TỪ C/O</p>
		</div><!-- icon-title -->
	</div>
		</a>
				<a href="https://transpacific.vn/chuyen-phat-nhanh/">
	<div class="box">
    <div class="item-service">
   <svg viewBox="0 0 512 512" xmlns="http://www.w3.org/2000/svg"><g id="Outline"><path d="m422.584 118.483c9.31-36.022 5.225-64.028-11.907-81.16-12.611-12.611-30.922-18.149-54.431-16.473-20.807 1.488-44.752 8.593-71.188 21.091a219.277 219.277 0 0 0 -29.058-1.941 216 216 0 0 0 -216 216 219.277 219.277 0 0 0 1.941 29.058c-12.5 26.436-19.6 50.381-21.091 71.188-1.68 23.506 3.862 41.82 16.473 54.431 11.153 11.153 26.913 16.779 46.5 16.779a139.81 139.81 0 0 0 34.657-4.877 216.014 216.014 0 0 0 304.107-304.1zm-65.2-81.673c18.669-1.333 32.793 2.644 41.976 11.827 8.2 8.2 15.943 24.3 10.092 55.366-.242-.245-.477-.494-.72-.738a214.75 214.75 0 0 0 -95.928-55.748c16.337-6.117 31.47-9.77 44.583-10.707zm-135.1 22.047-6.094 27.407a8 8 0 0 0 5.28 9.325l44.205 14.736 6.736 20.2a8 8 0 0 0 3.151 4.126l19.31 12.873-5.919 23.676-49.11 35.079-19.22-12.814-31.823-23.865a8 8 0 0 0 -10.457.743l-24 24a8 8 0 0 0 -2.343 5.657v36.686l-12.5 12.5-38.475 15.39a8 8 0 0 0 -3.685 2.99l-16 24a7.993 7.993 0 0 0 -1.34 4.434v36l-6.8 5.1a198.842 198.842 0 0 1 -17.2-81.1c0-98.79 72-181.068 166.283-197.143zm-173.647 340.506c-9.183-9.182-13.162-23.305-11.827-41.976.937-13.113 4.59-28.246 10.707-44.58a214.75 214.75 0 0 0 55.748 95.928c.244.244.494.479.739.721-31.068 5.849-47.166-1.893-55.367-10.093zm101.263-20.941-12.285-18.422 12.6-18.9 14.522-14.522 26.686-13.344 20.137 13.425a7.993 7.993 0 0 0 4.44 1.341h12.687l10.695 10.7c-25.768 20.357-51.757 37.2-76.381 49.556zm100.862-28.35 7.585 7.585a8 8 0 0 0 7.6 2.1l24.813-6.2 4.807 14.443-5.892 17.675-20.2 6.736a8 8 0 0 0 -5.475 7.589v19.719l-20.438 13.625a8 8 0 0 0 -3.323 4.714l-4.239 16.942a198.85 198.85 0 0 1 -29.967-5.322l-6.112-42.812a8 8 0 0 0 -7.921-6.866h-13.333l-1.469-1.1c23.962-12.7 48.915-29.244 73.56-48.828zm-79.562 64.328a8 8 0 0 0 4.8 1.6h9.061l4.067 28.488a199.749 199.749 0 0 1 -51.925-27.7q11.7-4.188 23.977-9.907zm81.055 41.552 2.755-11.011 21.428-14.285a8 8 0 0 0 3.562-6.656v-18.234l18.53-6.177a8 8 0 0 0 5.059-5.059l8-24a7.992 7.992 0 0 0 0-5.06l-8-24a8 8 0 0 0 -9.529-5.231l-27.606 6.9-3.245-3.245q11.2-9.414 22.227-19.6l-10.872-11.74q-11.249 10.417-22.709 19.991l-14.2-14.2a8 8 0 0 0 -5.655-2.345h-13.578l-21.984-14.656a8 8 0 0 0 -8.016-.5l-32 16a7.986 7.986 0 0 0 -2.079 1.5l-16 16a8.052 8.052 0 0 0 -1 1.219l-16 24a8 8 0 0 0 0 8.876l16 24a8.014 8.014 0 0 0 1.857 1.961l7.36 5.52a237.33 237.33 0 0 1 -24.022 8.9 201.3 201.3 0 0 1 -42.12-53.131l12.382-9.289a8 8 0 0 0 3.2-6.4v-37.578l13.278-19.917 37.693-15.077a8.01 8.01 0 0 0 2.686-1.771l16-16a8 8 0 0 0 2.343-5.657v-36.687l16.75-16.75 26.45 19.837q.177.133.362.256l24 16a8 8 0 0 0 9.088-.146l56-40a8 8 0 0 0 3.111-4.57l8-32a8 8 0 0 0 -3.323-8.6l-21.716-14.478-7.133-21.4a8 8 0 0 0 -5.059-5.059l-41.155-13.711 5.774-25.975c5.558-.466 11.175-.717 16.851-.717a199.545 199.545 0 0 1 148.818 66.536c-6.156 20.121-16.333 42.079-30.3 65.347l13.718 8.234c12.381-20.63 21.942-40.376 28.556-58.91a199 199 0 0 1 36.855 88.126l-25.833 15.848a8 8 0 0 0 -3.578 4.879l-14.936 59.74-43.83 14.611a8 8 0 0 0 -5.47 7.589v44.686l-13.657 13.657a8 8 0 0 0 -1.289 9.626l16.9 29.581a198.8 198.8 0 0 1 -105.954 30.45c-1.252 0-2.5-.025-3.745-.048zm122.953-39.46-13.23-23.156 11.679-11.679a8 8 0 0 0 2.343-5.657v-42.234l42.53-14.177a8 8 0 0 0 5.231-5.649l15.208-60.83 16.593-10.179c.28 4.322.438 8.677.438 13.069a199.831 199.831 0 0 1 -80.792 160.492z"/>
	   <path d="m400 288v-64a8 8 0 0 0 -5.8-7.692l-56-16a7.991 7.991 0 0 0 -4.4 0l-56 16a8 8 0 0 0 -5.8 7.692v64a8 8 0 0 0 5.8 7.692l56 16a8 8 0 0 0 4.4 0l56-16a8 8 0 0 0 5.8-7.692zm-64-71.68 26.879 7.68-26.879 7.68-26.879-7.68zm-48 18.286 40 11.429v47.359l-40-11.428zm56 58.788v-47.359l40-11.429v47.36z"/>
	   <path d="m248 152h16v16h-16z"/>
	   <path d="m144 120h16v16h-16z"/>
	   <path d="m104 216h16v16h-16z"/>
	   <path d="m176 336h16v16h-16z"/>
	   <path d="m224 392h16v16h-16z"/>
	   <path d="m392 344h16v16h-16z"/>
	   </g>
		</svg>
			</div><!-- icon-service -->
				<div class="icon-title">
					<p>CHUYỂN PHÁT NHANH</p>
				</div><!-- icon-title -->
        </div><!-- box -->
		            </a>
		</div><!-- 		container-box -->
		</div> <!-- 	container-service	 -->
		</section>
<!------------
Our Promotions
-------------------------------------------------------->
	<section id="promotion" class="promotion-home">
    <div class="title">
        <h4>03</h4>
        <p>OUR PROMOTION</p>
        <svg version="1.1" id="Layer_1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px"
          viewBox="0 0 173.5 8.6" style="enable-background:new 0 0 173.5 8.6;" xml:space="preserve">
        <line class="st0" x1="0" y1="4.7" x2="174" y2="4.7"/>
        </svg>
    </div>
<div class="carousel-pro">
<div class="slider">
  <button id="prev" class="btn">
  <img src="https://transpacific.vn/wp-content/themes/TPG theme/icons/icon-arrow-left.svg" alt="">
	</button>
    <!-- Card -->
    <?php 
$args = array(
      
      'showposts' => 8,
      'category_name' => 'Promotion',
    );
    $the_query = new WP_Query( $args );

    if( $the_query->have_posts() ): 
        echo '<div class="card-content">';
                  while ( $the_query->have_posts()) : $the_query->the_post(); 
                echo '<div class="card">
                        <a href="'.get_the_permalink().'">
                        <h4>4.5</h4>
                        <img id="heart" src="https://transpacific.vn/wp-content/themes/TPG theme/icons/heart-icon.svg" alt="">
                          <div class="card-img">
                            <img src="'.get_the_post_thumbnail().'
                            <img class="blur" src="'.get_the_post_thumbnail().'
                          </div>
                          <div class="card-text">
                          <h2>'.get_the_title().'</h2>
                          <p>'.get_the_excerpt().'</p>
                          </div>
                        </a>
						</div>
                      ';
                  endwhile; 
        echo '</div>';
    endif;
    wp_reset_query(); 
  ?>
    <!-- Card End -->
   <button id="next" class="btn">
<img src="https://transpacific.vn/wp-content/themes/TPG theme/icons/icon-arrow-right.svg" alt="">
</button>
</div>
<!-- partial -->
</div>
</section>

<!------------
Our News
-------------------------------------------------------->
<section id="news" class="news-home">
    <div class="title">
        <h4>04</h4>
        <p>OUR NEWS</p>
        <svg version="1.1" id="Layer_1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px"
	 viewBox="0 0 173.5 8.6" style="enable-background:new 0 0 173.5 8.6;" xml:space="preserve">
<line class="st0" x1="0" y1="4.7" x2="174" y2="4.7"/>
</svg>
    </div>
        <div class="news-post">
            <?php 

 			$args = array(
              
              'showposts' => 6,
              'category_name' => 'Thủ tục xuất nhập khẩu',
            );
            $the_query = new WP_Query( $args );

            if( $the_query->have_posts() ): 

                echo '<div class="grid-post">
				<div class="container-grid">';
                while ( $the_query->have_posts()) : $the_query->the_post(); 
                    echo '<div class="grid">
							<a href="'.get_the_permalink().'">
							<div class="thumbnails">
								<img src="'.get_the_post_thumbnail().'
							</div>
								<div class="title-post"><p>'.get_the_title().'</p></div>
							</a>
						</div>';
                endwhile; 
                echo '</div></div>';

            endif; 

            wp_reset_query(); 
            ?>
        </div>
		<div class="text-background">
			<p> TPG GLOBAL TRADING </p>
		</div>
		</div>
</section>

<!------------
Our contact
-------------------------------------------------------->
<section id="contact" class="contact-home">
    <div class="title">
        <h4>05</h4>
        <p>CONTACT</p>
        <svg version="1.1" id="Layer_1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px"
	 viewBox="0 0 173.5 8.6" style="enable-background:new 0 0 173.5 8.6;" xml:space="preserve">
        <line class="st0" x1="0" y1="4.7" x2="174" y2="4.7"/>
        </svg>
    </div>
    <div class="content">
        <div class="info">
                <div class="headline-bg">
                    <p>T</p>
                </div>
                <div class="signature">
					<p class="headline">TPG GLOBAL TRADING</p>
					<p class="description"> Alway beside your cargo </p>
                </div>
                <div class="address">
					<p>No.1 Pho Quang Streets District Tan Binh Ho Chi Minh City Vietnam</p>
					<a href="mailto:alexander.bao@transpacificvn.com"><p>alexander.bao@transpacificvn.com (Alexander Nguyễn)</p></a><br/>
					<p>Jun Tuấn (Pricing)</p>
					<a href="tel:84379538387">+84379538387</a><br/>
                    <p>Benlee Tuấn (Customer Service)</p>
					<a href="tel:84971177761">+84971177761</a>
                </div>
        </div>
		<div class="formhome">
      <form method="GET" class="form-container" autocomplete="on" name="contactform">
                <p>TƯ VẤN MIỄN PHÍ</p>
				<input type="text" class="form-home" name="Name" id="fullnamehome" placeholder="Họ tên" value="" required>
				<input type="text" class="form-home" name="Email" id="emailhome" placeholder="Email" value="" required>
				<input type="text" class="form-home" name="Phone" id="phonehome" placeholder="Số điện thoại" value="" required>
				<input type="text" class="form-home" name="Messages" value="" id="messagehome" placeholder="Dịch vụ bạn quan tâm" required>
				<div class="submit-button">
					<button onclick="redirect();" type="submit">TƯ VẤN CHO TÔI</button>
				</div>
			</form>
		</div>
	</div>
</section>
<script>
	function redirect()
        {
            window.location.href="https://transpacific.vn/thank-you";
        }
</script>

	<script>
	// ================================================== contact form  ==================================================
const scriptURL2 = 'https://script.google.com/macros/s/AKfycbz8wbR9kVKYr_f3jE_1N87fNj61Kj-UdOLTUH0xT-4KB_HnvoHy/exec'
const form2 = document.forms['contactform']

form2.addEventListener('submit', e => {
    e.preventDefault()
    fetch(scriptURL2, { method: 'POST', body: new FormData(form2)})
    .then(response => alert("Thanks for Contacting us..! We Will Contact You Soon..."))
    .catch(error => console.error('Error!', error.message))
})
	
	</script>
<?php
get_footer();