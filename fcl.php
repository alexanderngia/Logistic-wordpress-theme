<?php

/**
 * Template name: FCL
 *
 *
 * Version: 1.1.0

 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package TPG_theme
 */
get_header();
$myHTML = "&nbsp;abc"; 
$converted = strtr($myHTML, array_flip(get_html_translation_table(HTML_ENTITIES, ENT_QUOTES))); 
trim($converted, chr(0xC2).chr(0xA0));

$con = new PDO("mysql:host=localhost;dbname=transpac_15122021",'transpac_15122021','Tpg@123456789');
// $con = new PDO("mysql:host=localhost;dbname=demo",'root','root');

if (isset($_POST["submit2"])) {
	$pod = $_POST["search4"];
	$pol = $_POST["search3"];
	$sth = $con->prepare("SELECT * FROM `FCL` WHERE pod = '$pod' AND pol = '$pol'");

	$sth->setFetchMode(PDO:: FETCH_OBJ);
	$sth -> execute();

	if($row = $sth->fetch())
	{
		?>

	<?php 
	}
	else{
		echo "<script>
		alert('Bảng giá hiện tại không có sẵn, bạn vui lòng liên hệ để nhận báo giá miễn phí nhé !');
		window.location.href='https://transpacific.vn/booking-fcl/';
		</script>";
		}
  }

// <!-- calculation FCL -->
          // Ocean Freight
            if(isset($_POST['submit2'])) // button name FCL
            {
            $price20dc = $row->dc20; // variables of data
            $price40dc = $row->dc40;
            $price40hc = $row->hc40;

            $dc20 = $_POST['dc20']; // variables of value input
            $dc40 = $_POST['dc40'];
            $hc40 = $_POST['hc40'];
				$resultfcl = $price20dc*$dc20;
            $resultfcl2 = $price40dc*$dc40;
            $resultfcl3 = $price40hc*$hc40;

          // Local Charged

            // DOC
            $pricedoc = $row->bill; // variables of data
			$qualdoc = 1;
            $resultdoc = $pricedoc*$qualdoc; 

            // THC
            $pricethc20 = $row->thc20; // variables of data
            $qualthc20 = $dc20; // quality of container

            $resultthc20 = $pricethc20*$qualthc20; 
			$pricethc40 = $row->thc40; // variables of data
			$qualthc40 = $dc40+$hc40; // quality of container
			
			$resultthc40 = $pricethc40*$qualthc40; 

            // SEAL
            $priceseal = $row->seal; // variables of data
            $qualseal = $dc20+$dc40+$hc40; // quality of container

            $resultseal = $priceseal*$qualseal;
				  
			// TELEX
            $pricetelex = $row->telex; // variables of data
			$qualtelex = 1;
            $resulttelex = $pricetelex*$qualtelex;
			
			// D/O
            $pricedo = $row->do; // variables of data
			$qualdo = 1;
            $resultdo = $pricedo*$qualdo; 
			
				// Cleaning
            $pricecleaning = $row->cleaning; // variables of data
			$qualcleaning = $dc20+$dc40+$hc40;
            $resultcleaning = $pricecleaning*$qualcleaning; 
				
				// Lift on/off
            $pricelift = $row->lift; // variables of data
			$quallift = $dc20+$dc40+$hc40;
            $resultlift = $pricelift*$quallift; 
				
			//Total
$total=$resultfcl+$resultfcl2+$resultfcl3+$resultdoc+$resultthc20+$resultthc40+$resultseal+$resulttelex+$resultdo+$resultcleaning+$resultlift;
}
?>

<div class="containerfcl-body">
	 <div class="rowfcl1">
      <div class="columnfcl1">
          <div class="decor-boxfcl">
            <p>CƯỚC PHÍ VẬN CHUYỂN FCL VÀ PHỤ PHÍ</p>
          </div>
          </div>

          <div class="columnfcl2">
          <table class="tablefcl">
          <tbody>
		  <tr>
			  <td data-title="ID" >Cảng đi</td>
            <td style="text-align: right;" data-title="aplcl"><?php echo $row->pol; ?></td>
          </tr>
          <tr>
            <td data-title="ID">Cảng đến</td>
            <td style="text-align: right;" data-title="dplcl"><?php echo $row->pod; ?></td>
			  </tr>
			  <tr>
            <td data-title="ID">Hãng tàu</td>
            <td style="text-align: right;" data-title="frequency"><?php echo $row->carrier; ?></td>
          </tr>
          <tr>
            <td data-title="ID">Ngày tàu chạy</td>
            <td style="text-align: right;" data-title="frequency"><?php echo $row->freequency; ?></td>
          </tr>
          <tr>
            <td data-title="ID">Thời gian vận chuyển</td>
            <td style="text-align: right;" data-title="t/t"><?php echo $row->tt; ?></td>
          </tr>
			<tr>
            <td data-title="ID">Giá trị đến ngày</td>
            <td style="text-align: right;" data-title="valid"><?php echo $row->valid; ?></td>
          </tr>
        </tbody>
        </table>
      </div>
    </div>
	
    <div class="containertab-fcl"><div class="containertabfcl"><div class="column-1"><table id="table" class="tablefcl1 table-hover table-mc-light-blue">
		 <thead>
          <tr>
            <th>Các loại phụ phí</th>
            <th>Đơn giá</th>
            <th>Số lượng</th>
            <th>Thành tiền</th>
          </tr>
        </thead>
        <tbody>
			<tr>
            <td style="text-align: left;" id="id" data-title="ID">Phí chứng từ (DOC)</td>
            <td style="text-align: center;" data-title="price"><?php echo $row->bill." usd/shipment"; ?></td>
			<td style="text-align: center;" data-title="quality"><?php echo $qualdoc ?></td>
            <td style="text-align: center;" data-title="result"><?php echo $resultdoc ?></td>
          </tr>
		<tr>
            <td style="text-align: left;" id="id" data-title="ID">Phí gọi điện (TELEX)</td>
            <td style="text-align: center;" data-title="price"><?php echo $row->telex." usd/shipment"; ?> </td>
			<td style="text-align: center;" data-title="quality"><?php echo $qualtelex ?></td>
            <td style="text-align: center;" data-title="result"><?php echo $resulttelex ?></td>
          </tr>
		 <tr>
            <td style="text-align: left;" id="id" data-title="ID">Phí xếp dỡ (THC)</td>
            <td style="text-align: center;" data-title="price"><?php echo $row->thc20." usd/20'"; ?></td>
			 <td style="text-align: center;" data-title="quality"><?php echo $qualthc20 ?></td>
            <td style="text-align: center;" data-title="result"><?php echo $resultthc20 ?></td>
          </tr>
			<tr>
            <td style="text-align: left;" id="id" data-title="ID">Phí xếp dỡ (THC)</td>
            <td style="text-align: center;" data-title="price"><?php echo $row->thc40." usd/40'"; ?> </td>
			<td style="text-align: center;" data-title="quality"><?php echo $qualthc40 ?></td>
            <td style="text-align: center;" data-title="result"><?php echo $resultthc40 ?></td>
          </tr>
          <tr>
            <td style="text-align: left;" id="id" data-title="ID">Phí niêm phong (SEAL)</td>
            <td style="text-align: center;" data-title="price"><?php echo $row->seal." usd/cont"; ?></td>
			<td style="text-align: center;" data-title="quality"><?php echo $qualseal ?></td>
            <td style="text-align: center;" data-title="result"><?php echo $resultseal ?></td>
          </tr>
			<tr>
            <td style="text-align: left;" id="id" data-title="ID">Phí Lệnh Giao Hàng (D/O)</td>
            <td style="text-align: center;" data-title="price"><?php echo $row->do." usd/shipment"; ?></td>
			<td style="text-align: center;" data-title="quality"><?php echo $qualdo ?></td>
            <td style="text-align: center;" data-title="result"><?php echo $resultdo ?></td>
          </tr>
			<tr>
            <td style="text-align: left;" id="id" data-title="ID">Phí Vệ Sinh (Cleaning)</td>
            <td style="text-align: center;" data-title="price"><?php echo $row->cleaning." usd/cont"; ?></td>
			<td style="text-align: center;" data-title="quality"><?php echo $qualcleaning ?></td>
            <td style="text-align: center;" data-title="result"><?php echo $resultcleaning ?></td>
          </tr>
			<tr>
            <td style="text-align: left;" id="id" data-title="ID">Phí nâng hạ (Lift on/off)</td>
            <td style="text-align: center;" data-title="price"><?php echo $row->lift." usd/cont"; ?></td>
			<td style="text-align: center;" data-title="quality"><?php echo $quallift ?></td>
            <td style="text-align: center;" data-title="result"><?php echo $resultlift ?></td>
          </tr>
        </tbody>
      </table>
		</div>
		
		<div class="column-2">
    <table id="table" class="tablefcl2 table-hover table-mc-light-blue">
        <thead>
		<tr>
				<th>Giá cước vận chuyển</th>
				<th>Đơn giá</th>
				<th>Số lượng</th>
				<th>Thành tiền</th>
          </tr>
        </thead>
        <tbody>
			  <tr>
            <td style="text-align: left;" id="id" data-title="ID" >Container 20'DC</td>
            <td style="text-align: center;" data-title="price"><?php echo $row->dc20." usd/cont"; ?></td>
			<td style="text-align: center;" data-title="quality"><?php echo $dc20." container"; ?></td>
            <td style="text-align: center;" data-title="result"><?php echo $resultfcl ?></td>
          </tr>
          <tr>
            <td style="text-align: left;" id="id" data-title="ID" >Container 40'DC</td>
            <td style="text-align: center;" data-title="price"><?php echo $row->dc40." usd/cont"; ?></td>
			<td style="text-align: center;" data-title="quality"><?php echo $dc40." container"; ?></td>
            <td style="text-align: center;" data-title="result"><?php echo $resultfcl2 ?></td>
          </tr>
          <tr>
            <td style="text-align: left;" id="id" data-title="ID" >Container 40'HC</td>
            <td style="text-align: center;" data-title="price"><?php echo $row->hc40." usd/cont"; ?></td>
			<td style="text-align: center;" data-title="quality"><?php echo $hc40." container"; ?></td>
            <td style="text-align: center;" data-title="result"><?php echo $resultfcl3 ?></td>
          </tr>
			 <tr>
            <td style="text-align: left; font-weight: bold;" id="id" data-title="ID">Tổng chi phí vận chuyển (USD)</td>
            <td style="text-align: right; font-weight: bold;" colspan="3" data-title=""><?php echo $total." usd" ?></td>
          </tr>
        </tbody>
      </table>
			<div class="booking-fcl">
				<input type="button" onclick="location.href='https://transpacific.vn/';" id="back-home" value="<< Tra Cước Khác"> 
				<button onclick="location.href='https://transpacific.vn/booking-fcl/';" id="booking-fcl"> Booking >> </button>
    </div>
		</div>
      </div>
		</div>
            <div class="container-fcl">
          <div class="content-fcl">
			  <div class="paragraph">
				  <h2>DỊCH VỤ HỖ TRỢ </h2>
				  <p>Phí khai báo hải quan: 600.000 VND/ shipment (chưa bao gồm VAT).<br />
				  Phí GRI: $20/cbm đối với các tuyến nhập chuyển tải Hongkong.<br/>
				  Phí Other EMS ( Phí khai báo Manifest hải quan China)</p>
			</div>
			  <div class="paragraph">
            <h2>CHÚ THÍCH</h2>
            <h3>O/F (Ocean Freight)</h3>
            <p>O/F là chi phí vận tải đơn thuần từ cảng đi đến cảng đích hay còn được gọi là cước biển.</p>
			  </div>
			  <div class="paragraph">
            <h3>Phí chứng từ (DOC)</h3>
            <p>Đối với lô hàng xuất khẩu thì các Hãng tàu / Forwarder phải phát hành một cái gọi là Bill of Lading (hàng vận tải bằng đường biển) hoặc Airway Bill (hàng vận tải bằng đường không). Phí này là phí chứng từ để hãng tàu làm vận đơn và các thủ tục về giấy tờ cho lô hàng. Đối với lô hàng nhập khẩu vào Việt Nam thì consignee phải đến Hãng tàu/Forwarder để lấy lệnh giao hàng, mang ra ngoài cảng xuất trình cho kho (hàng lẻ)/làm phiếu EIR(hàng container FCL) thì mới lấy được hàng. Thường một lô hàng có một D/O nên phí này là phí FWD thu để trả cho hãng tàu.</p>
			  </div>
			  <div class="paragraph">
            <h3>Phí THC (Terminal Handling Charge)</h3>
            <p>THC là phụ phí xếp dỡ tại cảng là khoản phí thu trên mỗi container để bù đắp chi phí cho các hoạt động làm hàng tại cảng, như: xếp dỡ, tập kết container từ CY ra cầu tàu… Thực chất cảng thu hãng tàu phí xếp dỡ và các phí liên quan khác và hãng tàu sau đó thu lại từ chủ hàng (người gửi và người nhận hàng) khoản phí gọi là THC.</p>
			  </div>
			  <div class="paragraph">
            <h3>Phí CFS (Container Freight Station fee)</h3>
            <p>CFS là phí cho một lô hàng lẻ xuất/nhập khẩu thì các công ty Consol / Forwarder phải dỡ hàng hóa từ container đưa vào kho hoặc ngược lại và họ thu phí CFS.</p>
			  </div>
			  <div class="paragraph">
            <h3>Phí CIC (Container Imbalance Charge) hay “Equipment Imbalance Surcharge”</h3>
            <p>CIC là phụ phí mất cân đối vỏ container hay còn gọi là phí phụ trội hàng nhập. Có thể hiểu là phụ phí chuyển vỏ container rỗng. Đây là một loại phụ phí cước biển mà các hãng tàu thu để bù đắp chi phí phát sinh từ việc điều chuyển một lượng lớn container rỗng từ nơi thừa đến nơi thiếu.</p>
			  </div>
			  <div class="paragraph">
            <h3>Phí EBS (Emergency Bunker Surcharge)</h3>
            <p>EBS là phụ phí xăng dầu. Phụ phí này bù đắp chi phí “hao hụt” do sự biến động giá xăng dầu trên thế giới cho hãng tàu.</p>
			  </div>
			  <div class="paragraph">
            <h3>Phí Handling (Handling fee)</h3>
            <p>Handling là phí đại lý theo dõi quá trình giao nhận và vận chuyển hàng hóa cũng như khai báo manifest với cơ quan hải quan trước khi tàu cập.</p>
			  </div><!------ end paragraph ------->
          </div>
        </div>
	</div><!-- end container body -->
    
<script>
	$("tablefcl1 tr").each(function() {
  var sold = $(this).find(":nth-child(4)");
  if (parseFloat(sold.text()) === 0)
    $(this).hide();
});

$("tablefcl2 tr").each(function() {
  var sold = $(this).find(":nth-child(4)");
  if (parseFloat(sold.text()) === 0)
    $(this).hide();
});
</script>
<?php
get_footer();
