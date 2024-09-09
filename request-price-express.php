<?php
/**
 * Template name: Booking Express
 *
 *
 * Version: 1.1.0

 *
 * @package TPG_theme
 */


function booking_express_css() {
wp_enqueue_style( 'request-express-style', get_template_directory_uri() . '/css/request-express.css' );

}
add_action( 'wp_enqueue_scripts', 'booking_express_css' );

get_header();
?>
    <div class="container-express">
        <div class="container-form">
          <div class="form-headerexpress">
            <p class="h1">CHUYỂN PHÁT NHANH QUỐC TẾ</p>
            <p class="h2">Vui lòng cung cấp thông tin chi tiết để chúng tôi báo giá chính xác nhất <br />
                Đội ngũ của chúng tôi sẽ liên hệ với bạn trong vòng 30 phút để nhận hàng và báo giá</p>
            </div>
            <form class="form-container" method="post" autocomplete="off" name="express-pricing">
                <div class="row1">
                <div class="column">
                    <div class="row-title">
                        <p>SENDER'S CONTACT <br />(THÔNG TIN NGƯỜI GỬI)</p>
                    </div>
                    <div class="row">
                        <label class="label-form" >Name (Họ và tên)</label>
                            <input name="Name-sender" class="input-row" type="text" required>
                    </div>
                    <div class="row">
                        <label class="label-form">Email</label>
                            <input name="Email-sender" class="input-row" type="email" required>
                    </div>
                    <div class="row">
                        <label class="label-form">Phone (Số điện thoại)</label>
                            <input name="Phone-sender" class="input-row" type="tel" required>
                    </div>
                    <div class="row">
                        <label class="label-form">Address (Địa chỉ)</label>
                        <input name="Adress-sender" class="input-row" type="text" required>
                    </div>
                </div><!-- column-->
                <div class="column">
                    <div class="row-title">
                        <p>RECEIVER'S CONTACT <br />(THÔNG TIN NGƯỜI NHẬN)</p>
                    </div>
                    <div class="row">
                        <label class="label-form" >Name (Họ và tên)</label>
                            <input name="Name-receiver" class="input-row" type="text" required>
                    </div>
                    <div class="row">
                        <label class="label-form">Email</label>
                            <input name="Email-receiver" class="input-row" type="email" required>
                    </div>
                    <div class="row">
                        <label class="label-form">Phone (Số điện thoại)</label>
                            <input name="Phone-receiver" class="input-row" type="tel" required>
                    </div>
                    <div class="row">
                        <label class="label-form">Address (Địa chỉ)</label>
                        <input name="Adress-sender" class="input-row" type="text" required>
                    </div>
                </div><!-- column-->
            </div>
                
                
                <div class="row3">
                    <div class="column">
                        <button class="btn-home" onclick="location.href='https://transpacific.vn/'"><i class="fas fa-home"></i> HOME</button>
                    </div>
                    <div class="column">
                        <button onclick="redirect();" type="submit" class="btn-submit"><i class="fas fa-check-circle"></i> BÁO GIÁ</button>
                    </div>
                </div><!----row5-->
            </form>
        </div>
    </div>
    <script>
        const scriptURL = 'https://script.google.com/macros/s/AKfycbx05XMrZCqeh4AYPJjy-JO30nlwULs_VaBZxK9Un8-i1e3lDsk/exec'
        const form = document.forms['express-pricing']
      
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
<?php
get_footer();