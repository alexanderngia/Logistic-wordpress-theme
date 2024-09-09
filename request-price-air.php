<?php
/**
 * Template name: Booking Air
 *
 *
 * Version: 1.1.0

 *
 * @package TPG_theme
 */


function booking_air_css() {
wp_enqueue_style( 'request-air-style', get_template_directory_uri() . '/css/request-air.css' );

}
add_action( 'wp_enqueue_scripts', 'booking_air_css' );

get_header();
?>
    <div class="container-air">
        <div class="container-form">
          <div class="form-headerair">
            <p class="h1">BOOKING HÀNG AIR</p>
            <p class="h2">Vui lòng cung cấp thông tin chi tiết lô hàng<br />để chúng tôi báo giá chính xác nhất</p>
            </div>
            <form class="form-container" method="post" autocomplete="off" name="air-pricing">
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
                </div><!--- row3 --->
                <div class="row4">
                    <div class="column">
                        <button class="btn-home" onclick="location.href='https://transpacific.vn/'"><i class="fas fa-home"></i> HOME</button>
                    </div>
                    <div class="column">
                        <button onclick="redirect();" type="submit" class="btn-submit"><i class="fas fa-check-circle"></i> BÁO GIÁ</button>
                    </div>
                </div><!----row5-->
            </form>
        </div> <!-- container-air  -->
    </div> <!---- container-form  -->
<script>
    const scriptURL = 'https://script.google.com/macros/s/AKfycbxz7xNHvFZfH4S8CsviKf0z5ebWqy5tlpOvSj4pvf1yW-kV5R8/exec'
    const form = document.forms['air-pricing']
  
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