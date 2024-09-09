<?php
/**
 * Template name: Booking Fcl
 *
 *
 * Version: 1.1.0

 *
 * @package TPG_theme
 */


function booking_fcl_css() {
wp_enqueue_style( 'request-fcl-style', get_template_directory_uri() . '/css/request-fcl.css' );

}
add_action( 'wp_enqueue_scripts', 'booking_fcl_css' );

get_header();
?>
  <div class="container-fcl-booking">
    <div class="container-form">
      <div class="form-headerfcl">
        <p class="h1">BOOKING FCL</p>
        <p class="h2">Vui lòng cung cấp thông tin chi tiết lô hàng<br />để chúng tôi báo giá chính xác nhất</p>
        </div>
        <form class="form-container" method="post" autocomplete="off" name="fcl-pricing" >
          <div class="row1">
            <div class="column">
                <label class="label-form" >Name (Họ và tên)</label>
                    <input name="Name" class="input-row" type="text" required>
            </div>
            <div class="column">
                <label class="label-form">Email</label>
                    <input name="Email" class="input-row" type="email" required>
            </div>
            <div class="column">
                <label class="label-form">Phone (Số điện thoại)</label>
                    <input name="Phone" class="input-row" type="tel" required>
                </div>
        </div>
<div class="row2">
        <div class="column">
            <label class="label-form">(Port of Loading) Nơi đi</label>
                <input name="Pol" class="input-row" type="text" required>
                </div>
        <div class="column">
            <label class="label-form">(Port of Discharge) Nơi đến</label>
                <input name="Pod" class="input-row" type="text" required>
                </div>
            </div>
    <div class="row3">
        <div class="column">
            <label class="label-form">Container</label>
            <select name="Container" class="input-row kind-cont" required>
                <option style="color: #99A3BA; opacity: 0.6; " value="" hidden>-- Loại container --</option>
                <option value="" disabled>General Purpose</option>
                <option value="gp20">-20'GP</option>
                <option value="gp40">-40'GP</option>
                <option value="hq40">-40'HQ</option>
                <option value="hq45">-45'HQ</option>
                <option value="" disabled>Refrigerated</option>
                <option value="rf20">-20'RF</option>
                <option value="rf40">-40'RF</option>
                <option value="rq40">-40'RQ</option>
                <option value="rq45">-45'RQ</option>
                <option value="" disabled>Open Top</option>
                <option value="ot20">-20'OT</option>
                <option value="ot40">-40'OT</option>
                <option value="othq40">-40'OT HQ</option>
                <option value="" disabled>Flat Rack</option>
                <option value="fr20">-20'FR</option>
                <option value="fr40">-40'FR</option>
                <option value="frhq40">-40'FR HQ</option>
                <option value="" disabled>Tank</option>
                <option value="tk20">-20'TK</option>
                <option value="tk40">-40'TK</option>
            </select>
        </div>

        <div class="column">
            <label class="label-form">Weight (Trọng lượng) Kg</label>
                <input name="Kg" class="input-row" type="number" required>
        </div>

        <div class="column">
            <label class="label-form">Quality (Số Lượng Container)</label>
            <div class="quality-container">
            <button class="btn-down" onclick="this.parentNode.querySelector('.quality-cont').stepDown()" >-</button>
                <input style="text-align: center; padding: 0; appearance: none;" name="Quality" type="number" class="input-row quality-cont" value="0" min="0" max="1000" required>
            <button class="btn-up" onclick="this.parentNode.querySelector('.quality-cont').stepUp()" class="plus">+</button>
        </div>
        </div>
    </div>
        <div class="row5">
            <div class="column">
                <button class="btn-home" onclick="location.href='https://transpacific.vn/'"><i class="fas fa-home"></i> HOME</button>
            </div>
            <div class="column">
                <button onclick="redirect();" type="submit" class="btn-submit"><i class="fas fa-check-circle"></i> BÁO GIÁ</button>
            </div>
        </div>
        </form>
    </div><!-- container-form -->
  </div><!-- container-fcl-booking -->
  <script src='https://cdnjs.cloudflare.com/ajax/libs/jquery/3.4.0/jquery.min.js'></script>
    
<!-- form -->
    <script>
        const scriptURL = 'https://script.google.com/macros/s/AKfycbx8AEQhlf6X4K4MhidSLohWAPM0p0zo3F5c8DyKkciITvhHbruI/exec'
        const form = document.forms['fcl-pricing']
    
        form.addEventListener('submit', e => {
        e.preventDefault()
        fetch(scriptURL, { method: 'POST', body: new FormData(form)})
        .then(response => alert("Thanks for Contacting us..! We Will Contact You Soon..."))
            .catch(error => console.error('Error!', error.message))
        })

        function redirect()
        {
            window.location.href="https://transpacific.vn/thank-you";
        }
    </script>
<!-- form -->

<!-- Button number -->
    <script>
        var buttons = document.querySelectorAll('form button:not([type="submit"])');
for (i = 0; i < buttons.length; i++) {
  buttons[i].addEventListener('click', function(e) {
    e.preventDefault();
  });
}
    </script>
<!-- Button number -->
<?php
get_footer();