<?php
/**
 * Template name: LCL
 *
 *
 * Version: 1.1.0

 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package TPG_theme
 */
get_header();

$con = new PDO("mysql:host=localhost;dbname=transpac_15122021",'transpac_15122021','Tpg@123456789');
// $con = new PDO("mysql:host=localhost;dbname=demo",'root','root');

if (isset($_POST["submit"])) {
	$pod = $_POST["search2"];
	$pol = $_POST["search"];
	$sth = $con->prepare("SELECT * FROM `LCL` WHERE pod = '$pod' AND pol = '$pol'");
	$sth->setFetchMode(PDO:: FETCH_OBJ);
	$sth -> execute();

	if($row = $sth->fetch())
	{
	?>

	<?php 
	}
	
	else 
	{
		echo "<script>
		alert('Bảng giá hiện tại không có sẵn, bạn vui lòng liên hệ để nhận báo giá miễn phí nhé !');
		window.location.href='https://transpacific.vn/booking-lcl/';
		</script>";
	}
	}

if (isset($_POST["submit"])) {

	// Ocean Freight EXPORT
      $kglcl = $_POST['kglcl'];
      $cbmlcl = $_POST['cbmlcl'];
      $cbmlcltotal = $cbmlcl*1000;
      $priceof = $row->OF;
//       $pricehk = $row->OFHK;
//       $pricesing = $row->OFSING;
	
// CBM OR  KGS
if($kglcl>$cbmlcltotal)
      {
	$box = $kglcl/1000;
      } else 
     {  
	$box = $cbmlcl;
	}

      // Ocean Frieght
      if ($box>1){
        $resultlcl=$box*$priceof;
//         $resulthk = $box*$pricehk;
//         $resultsing = $box*$pricesing;
      }
      else {
        $box = 1;
        $resultlcl = $box*$priceof;
//         $resulthk = $box*$pricehk;
//         $resultsing = $box*$pricesing;
      }

      //============= Local Charged===============

      // DOC
      $pricedoc = $row->DOCS; // variables of data
      $resultdoc = $pricedoc*1; 

      // THC
      $pricethc = $row->THC; // variables of data
      $qualthc = $box; // quality of container

      $resultthc = $pricethc*$qualthc; 

      // CFS
      $pricecfs = $row->CFS; // variables of data
      $qualcfs = $box; // quality of container

      $resultcfs = $pricecfs*$qualcfs; 
	
	 // Telex
	 $pricetelex = $row->TELEX;
	$qualtelex = 1;
	$resulttelex = $pricetelex*$qualtelex; 

//       // LSS
//       $pricelss = $row->LSS;
//       $quallss = $box;

//       $resultlss = $pricelss*$quallss;
				
//  // DDC/EBS
//  $priceddc = $row->DDC;
//  $qualddc = $box;
// $resultddc = $priceddc*$qualddc;

// // RR
// $pricerr = $row->RR;
//  $qualrr = $box;
//  $resultrr = $pricerr*$qualrr;
 
// DO
 $pricedo = $row->DO;
 $qualdo = 1;
 $resultdo = $pricedo*$qualdo;

// HANDLING
 $pricehandl = $row->HANDL;
 $qualhandl = $box;

 $resulthandl = $pricehandl*$qualhandl;

// // CIC
//  $pricecic = $row->CIC;
//  $qualcic = $box;

//  $resultcic = $pricecic*$qualcic;


 //Total
$total=$resultlcl+$resultdoc+$resultthc+$resultcfs+$resultdo+$resulthandl;
   
// $totalhk=$resulthk+$resultdoc+$resultthc+$resultcfs+$resultdo+$resulthandl;
   
// $totalsing=$resultsing+$resultdoc+$resultthc+$resultcfs+$resultdo+$resulthandl;
	
}
?>

	<div class="container-body">
    <div class="rowlcl1">
      <div class="columnlcl1">
          <div class="decor-box">
            <p>CƯỚC PHÍ VẬN CHUYỂN VÀ PHỤ PHÍ</p>
          </div>
      </div>
      <div class="columnlcl2">
        <table class="tablelcl">
          <tbody>
          <tr>
            <td data-title="ID" >Cảng đi</td>
            <td style="text-align: right;" data-title="aplcl"><?php echo $row->pol; ?></td>
          </tr>
          <tr>
            <td data-title="ID">Cảng đến</td>
            <td style="text-align: right;" data-title="dplcl"><?php echo $row->pod; ?></td>
          </tr>
<!--           <tr>
            <td  data-title="ID">Cắt máng (Hạn cuối đóng hàng)</td>
            <td  data-title=""><?php echo $row->CUT_OFF; ?></td>
          </tr> -->
          <tr>
            <td data-title="ID">Điểm đóng hàng</td>
            <td style="text-align: right;" data-title=""><?php echo $row->STUFFING; ?></td>
          </tr>
        </tbody>
        </table>
      </div>
    </div><div class="containertab"><div class="row1"><table id="table" class="table2 table-hover table-mc-light-blue">
		<thead>
			<tr>
				<th>Các loại phụ phí</th>
				<th>Đơn giá</th>
				<th>Số lượng</th>
				<th>Thành tiền</th>
			</tr></thead>
		<tbody>
			<tr>
				<td style="text-align: left;" data-title="ID">Phí chứng từ (DOC)</td>
				<td data-title="price"><?php echo $row->DOCS." usd/shipment"; ?></td>
				<td data-title="quality">1</td>
				<td data-title="result"><?php echo $resultdoc; ?></td>
			</tr>
			<tr>
				<td style="text-align: left;" data-title="ID">Phí xếp dỡ (THC)</td>
								<td data-title="price"><?php echo $row->THC." usd/cbm"; ?></td>
				<td data-title="quality"><?php echo $box; ?></td>
				<td data-title="result"><?php echo $resultthc; ?></td></tr>
			<tr>
				<td style="text-align: left;" data-title="ID">Phí kho hàng lẻ (CFS)</td>
								<td data-title="price"><?php echo $row->CFS." usd/cbm"; ?></td>
				<td data-title="quality"><?php echo $box; ?></td>
				<td data-title="result"><?php echo $resultcfs; ?></td>
			</tr>
			<tr>
				<td style="text-align: left;" data-title="ID">Phí điện tín (TELEX)</td>
								<td data-title="price"><?php echo $row->TELEX." usd/shipment"; ?></td>
				<td data-title="quality"><?php echo $qualtelex; ?></td>
				<td data-title="result"><?php echo $resulttelex; ?></td>
			</tr>
<!-- 			<tr>
				<td style="text-align: left;" data-title="ID">Phí hàng xuất (DDC)</td>
								<td data-title="price"><?php echo $row->DDC." usd/cbm"; ?></td>
				<td data-title="quality"><?php echo $box; ?></td>
				<td data-title="result"><?php echo $resultddc; ?></td>
			</tr> -->
<!-- 				<tr>
					<td style="text-align: left;" data-title="ID">Phí giảm thải lưu huỳnh (LSS)</td>
									<td data-title="price"><?php echo $row->LSS." usd/cbm"; ?></td>
					<td data-title="quality"><?php echo $box; ?></td>
					<td data-title="result"><?php echo $resultlss; ?></td>
				</tr> -->
<!-- 			<tr>
				<td style="text-align: left;" data-title="ID">Phí phục hồi (RR)</td>
				<td data-title="price"><?php echo $row->RR." usd/cbm"; ?></td>
				<td data-title="quality"><?php echo $box; ?></td>
				<td data-title="result"><?php echo $resultrr; ?></td>
			</tr> -->
			<tr>
				<td style="text-align: left;" data-title="ID">Phí lệnh giao hàng (DO)</td>
								<td data-title="price"><?php echo $row->DO." usd/shiptment"; ?></td>
				<td data-title="quality"><?php echo $box; ?></td>
				<td data-title="result"><?php echo $resultdo; ?></td>
			</tr>
			<tr>
				<td style="text-align: left;" data-title="ID">Phí làm hàng (Handling)</td>
				<td data-title="price"><?php echo $row->HANDL." usd/cbm"; ?></td>
				<td data-title="quality"><?php echo $box; ?></td>
				<td data-title="result"><?php echo $resulthandl; ?></td>
			</tr>
<!-- 			<tr>
				<td style="text-align: left;" data-title="ID">Phí cân bằng cont (CIC)</td>
				<td data-title="price"><?php echo $row->CIC." usd/cbm"; ?></td>
				<td data-title="quality"><?php echo $box; ?></td>
				<td data-title="result"><?php echo $resultcic; ?></td>
			</tr>  -->
		</tbody>
		</table></div>
		<div class="row2"><table id="table" class="table table-hover table-mc-light-blue">
            <thead>
				<tr><th style="font-weight: bold;text-align: center;" colspan="5">Các Gói Vận Chuyển</th></tr>
              <tr>
				<th>Chuyển tải </th>
                <th>Cước phí O/F</th>
                <th>Ngày tàu chạy</th>
                <th>Thời gian vận chuyển</th>
                <th style="font-weight: bold;">Tổng chi phí (USD)</th>
              </tr>
            </thead>
            <tbody>
              <tr>
                <td style="text-align: center;" data-title="viadirectEX"><?php echo $row->ROUT; ?></td>
                <td style="text-align: center;" data-title="O/Fdirect"><?php echo $priceof. " usd/cbm"; ?></td>
                <td style="text-align: center;" data-title="Etddirect"><?php echo $row->ETD; ?></td>
                <td style="text-align: center;" data-title="T/tdirect"><?php echo $row->TT; ?></td>
				<td style="text-align: center;" colspan="4" data-title="Totaldirect"><?php echo $total; ?> usd</td>
              </tr>
<!--               <tr>
                <td style="text-align: center;" data-title="viahk"><?php echo $row->ROUTHK; ?></td>
                <td style="text-align: center;" data-title="O/Fhk"><?php echo $pricehk. " usd/cbm"; ?></td>
                <td style="text-align: center;" data-title="Etdhk"><?php echo $row->ETDHK; ?></td>
                <td style="text-align: center;" data-title="T/thk"><?php echo $row->TTHK; ?></td>
                <td style="text-align: center;" data-title="Totalhk"><?php echo $totalhk; ?> usd</td>
              </tr>
              <tr>
                <td style="text-align: center;" data-title="viasing"><?php echo $row->ROUTSING; ?></td>
                <td style="text-align: center;" data-title="O/Fsing"><?php echo $pricesing. " usd/cbm"; ?></td>
                <td style="text-align: center;" data-title="Etdsing"><?php echo $row->ETDSING; ?></td>
                <td style="text-align: center;" data-title="T/tsing"><?php echo $row->TTSING; ?></td>
                <td style="text-align: center;" data-title="Totalsing"><?php echo $totalsing; ?> usd</td>
              </tr> -->
            </tbody>
          </table>
			<div class="booking-lcl">
				<button onclick="location.href='https://transpacific.vn/';" id="back-home"> << Tra Cước Khác</button>
				<button onclick="location.href='https://transpacific.vn/booking-lcl/';" id="booking-lcl"> Booking >> </button>
		</div>
		</div>
</div>
        
        <div class="container-lcl">
          <div class="content-lcl">
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
        <?php get_footer();
