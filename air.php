<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>TPG Global Trading Co.Ltd</title>
    <link rel="stylesheet" href="./css/tablelcl.css">
    <link rel="stylesheet" href="./css/style.css">
</head>
<body>
    						<nav class="navbar">
							<a class="navbar-logo" href="https://transpacific.vn/" target="new">
								<img src="https://transpacific.vn/wp-content/uploads/2020/10/logo.png">
							</a>        <span class="open-slide">
								<a href="#" onclick="openSlideMenu()">
								  <svg width="30" height="30">
									  <path d="M0,5 30,5" stroke="black" stroke-width="2"/>
									  <path d="M0,14 30,14" stroke="black" stroke-width="2"/>
									  <path d="M0,23 30,23" stroke="black" stroke-width="2"/>
								  </svg>
								</a>
							  </span>
						</nav>
						<div id="side-menu" class="side-nav">
								<a href="#" class="btn-close" onclick="closeSlideMenu()">&times;</a>
								<a href="https://transpacific.vn/" target="new"><img src="https://transpacific.vn/wp-content/uploads/2020/10/logo.png"></a>

						<li><a class="smoothscroll" href="https://transpacific.vn/about/" title="About us">About us</a></li>
                        <li><a class="smoothscroll" href="https://transpacific.vn/#partner" title="Partner">Partner</a></li>
                        <li><a class="smoothscroll" href="https://transpacific.vn/service" title="Services">Services</a></li>
                        <li><a class="smoothscroll" href="https://transpacific.vn/promotion/" title="Promotion">Promotion</a></li>
                        <li><a class="smoothscroll" href="https://transpacific.vn/kien-thuc/" title="News">News</a></li>
                        <li><a class="smoothscroll" href="https://transpacific.vn/contact" title="Contact">Contact</a></li>                        
        </div>
    <header class="x-header">
            <div class="header-logo">
                <a href="https://transpacific.vn/">
                    <img src="https://transpacific.vn/wp-content/uploads/2020/10/logo.png" alt="Homepage">
                </a>
            </div>

            <div class="header__content">
                <nav class="header__nav-wrap">
                    <ul class="header__nav">
                        <li><a class="smoothscroll" href="https://transpacific.vn/about/" title="About us">About us</a></li>
                        <li><a class="smoothscroll" href="https://transpacific.vn/#partner" title="Partner">Partner</a></li>
                        <li><a class="smoothscroll" href="https://transpacific.vn/service" title="Services">Services</a></li>
                        <li><a class="smoothscroll" href="https://transpacific.vn/promotion/" title="Promotion">Promotion</a></li>
                        <li><a class="smoothscroll" href="https://transpacific.vn/kien-thuc/" title="News">News</a></li>
                        <li><a class="smoothscroll" href="https://transpacific.vn/contact" title="Contact">Contact</a></li>                    
                    </ul>
                </nav> <!-- end header__nav-wrap -->      
            </div> <!-- end header-content -->
    </header><!-----------END HEADER -------------------------------------------------->
    <div class="containertab">
        <table id="table" class="table table-hover table-mc-light-blue">
            <thead>
              <tr>
                <th colspan="2">Thông tin vận chuyển</th>
              </tr>
            </thead>
            <tbody>
              <tr>
                <td data-title="ID" >Cảng đi</td>
                <td data-title="airport1"><span id="data"></span></td>
              </tr>
              <tr>
                <td data-title="ID">Cảng đến</td>
                <td data-title="airport2"><span id="data2"></span></td>
           
              </tr>
              <tr>
                <td data-title="ID">Trọng lượng (KGS)</td>
                <td data-title="kgair"><span id="data3"></span></td>
              </tr>
              <tr>
                <td data-title="ID">Số khối theo kích thước (CBM)</td>
                <td data-title="cbmair"><span id="data4"></span></td>
              </tr>
              <tr>
                <td data-title="ID">Ngày tàu chạy</td>
                <td data-title="frequency"><span id=""></span></td>
              </tr>
              <tr>
                <td data-title="ID">Thời gian vận chuyển</td>
                <td data-title="t/t"><span id=""></span></td>
              </tr>
              <tr>
                <td data-title="ID">Cắt máng</td>
                <td data-title=""><span id=""></span></td>
              </tr>
              
            </tbody>
          </table>
          
          
          <table id="table" class="table2 table-hover table-mc-light-blue">
            <thead>
              <tr>
                <th>Các loại cước phí</th>
                <th>Đơn giá</th>
                <th>Số lượng</th>
                <th>Thành tiền</th>
              </tr>
            </thead>
            <tbody>
              <tr>
                <td data-title="ID" >Cước phí vận chuyển</td>
                <td data-title=""><span id=""></span></td>
                <td data-title=""><span id=""></span></td>
                <td data-title=""><span id=""></span></td>
              </tr>
              <tr>
                <td data-title="ID">Phí chứng từ (DOC)</td>
                <td data-title=""><span id=""></span></td>
                <td data-title=""><span id=""></span></td>
                <td data-title=""><span id=""></span></td>

              </tr>
              <tr>
                <td data-title="ID">Phí xếp dỡ (THC)</td>
                <td data-title=""><span id=""></span></td>
                <td data-title=""><span id=""></span></td>
                <td data-title=""><span id=""></span></td>
              </tr>
              <tr>
                <td data-title="ID">Phí kho hàng lẻ (CFS)</td>
                <td data-title=""><span id=""></span></td>
                <td data-title=""><span id=""></span></td>
                <td data-title=""><span id=""></span></td>

              </tr>
              <tr>
                <td data-title="ID">Phụ phí hàng xuất (DDC)/ (EBS)</td>
                <td data-title=""><span id=""></span></td>
                <td data-title=""><span id=""> </span></td>
                <td data-title=""><span id=""></span></td>

              </tr>
              <tr>
                <td data-title="ID">Tổng chi phí vận chuyển (USD)</td>
                <td colspan="3" data-title=""><span id=""></span></td>
              </tr>
              
              
            </tbody>
          </table>

    <script>
    //displaying the value from local storage to another page by their respective Ids
    document.getElementById("data4").innerHTML=localStorage.getItem("cbmair");
    document.getElementById("data3").innerHTML=localStorage.getItem("kgair");
    document.getElementById("data2").innerHTML=localStorage.getItem("airport2");
    document.getElementById("data").innerHTML=localStorage.getItem("airport1");
    
    </script>
</body>
</html>