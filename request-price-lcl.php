<?php
/**
 * Template name: Booking Lcl
 *
 *
 * Version: 1.1.0

 *
 * @package TPG_theme
 */


function booking_lcl_css() {
wp_enqueue_style( 'request-lcl-style', get_template_directory_uri() . '/css/request-lcl.css' );

}
add_action( 'wp_enqueue_scripts', 'booking_lcl_css' );

get_header();
?>
    <div class="container-lcl">
        <div class="container-form">
          <div class="form-headerlcl">
            <p class="h1">BOOKING LCL</p>
            <p class="h2">Vui lòng cung cấp thông tin chi tiết lô hàng<br />để chúng tôi báo giá chính xác nhất</p>
            </div>
            
            <form class="form-container" method="post" autocomplete="off" name="lcl-pricing">
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
                </div><!-- row1-->
                <div class="row2">
                    <div class="column">
                        <label class="label-form">(Port of Loading) Nơi đi</label>
                        <input name="Pol" class="input-row" type="text" required>
                    </div>
                    <div class="column">
                        <label class="label-form">(Port of Discharge) Nơi đến</label>
                        <input name="Pod" class="input-row" type="text" required>
                    </div>
                </div><!-- row2-->

                <div class="row3">
                    <div class="column">
                        <label class="label-form">Weight (Trọng lượng) Kg</label>
                        <input name="Kg" class="input-row" type="number" required>
                    </div>
                    <div class="column">
                        <label class="label-form">Packing (Đóng Hàng)</label>
                                <select name="Packing" class="input-row packing-input" required>
                                    <option style="color: #99A3BA; opacity: 0.6;" value="" selected hidden>-- Đóng hàng --</option>
                                    <option>Pallets</option>
                                    <option>Cartons</option>
                                </select>
                    </div>
                </div><!-- row3-->
                <div class="row4">
                    <div class="column">
                        <label class="label-form">Cbm (Số Khối)</label>
                        <div class="quality-input-container">
                            <button class="btn-down" onclick="this.parentNode.querySelector('.cbm-input').stepDown()" >-</button>
                                <input style="text-align: center; padding: 0; appearance: none;" name="Cbm" type="number" class="input-row cbm-input" value="0" min="0" max="1000" required>
                            <button class="btn-up" onclick="this.parentNode.querySelector('.cbm-input').stepUp()" class="plus">+</button>
                        </div>
                    </div>
                    <div class="column">
                        <label class="label-form">Quality (Số Kiện)</label>
                        <div class="quality-input-container">
                            <button class="btn-down" onclick="this.parentNode.querySelector('.quality-input').stepDown()" >-</button>
                                <input style="text-align: center; padding: 0; appearance: none;" name="Quality" type="number" class="input-row quality-input" value="0" min="0" max="1000" required>
                            <button class="btn-up" onclick="this.parentNode.querySelector('.quality-input').stepUp()" class="plus">+</button>
                        </div>
                    </div>
                    
                </div><!---row4-->
                <div class="row5">
                    <div class="column">
                        <button class="btn-home" onclick="location.href='https://transpacific.vn/'"><i class="fas fa-home"></i> HOME</button>
                    </div>
                    <div class="column">
                        <button onclick="redirect();" type="submit" class="btn-submit"><i class="fas fa-check-circle"></i> BÁO GIÁ</button>
                    </div>
                </div><!----row5-->

                    </form>
                </div> <!--container-form  -->
            </div> <!---- container-lcl  -->
              <script>
    const scriptURL = 'https://script.google.com/macros/s/AKfycbzfTrcEA7qTveZCNc8LF5P8lOG_voARlTD_lDv659Y3d62_xtFG/exec'
    const form = document.forms['lcl-pricing']
  
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