<?php
/**
 * The template for displaying the footer
 *
 * Contains the closing of the #content div and all content after.
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package TPG_theme
 */

?>
        <!-- CTA -->
    <div class="cta_naviga_container">
        <div class="container_cta">
        <div class="cta_item">
            <a href="tel:+842835470377">
            <img src="https://transpacific.vn/wp-content/themes/TPG theme/icons/phone.svg" alt="">
            <p>Phone</p>
            </a>
        </div>
        <div class="cta_item">
            <a href="mailto:alexander.bao@transpacificvn.com">
            <img src="https://transpacific.vn/wp-content/themes/TPG theme/icons/mail.svg" alt="">
            <p>Email</p>
            </a>
        </div>
        <div class="cta_item">
            <a href="https://m.me/TransPacificGlobalCorp">
            <img src="https://transpacific.vn/wp-content/themes/TPG theme/icons/messenger.svg" alt="">
            <p>Messenger</p>
            </a>
        </div>
        <div class="cta_item">
            <a href="https://zalo.me/0944606333">
            <img src="https://transpacific.vn/wp-content/themes/TPG theme/icons/zalo.svg" alt="">
            <p>Zalo</p>
            </a>
        </div>
        </div>
    </div>     <!-- End CTA -->
	</div><!-- #content -->
	
	<footer>
				<p class="footer-info">All Right Reserved @Copyright by <a href="https://zalo.me/0944606333"><strong>Oroka</strong></a></p>
		</div><!-- .site-info -->
		</div><!--row-->
</div><!--container-->
	</footer><!-- #colophon -->
</div><!-- #page -->

<!-- script
    ================================================== -->
    <script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/three.js/r120/three.min.js" integrity="sha512-kgjZw3xjgSUDy9lTU085y+UCVPz3lhxAtdOVkcO4O2dKl2VSBcNsQ9uMg/sXIM4SoOmCiYfyFO/n1/3GSXZtSg==" crossorigin="anonymous"></script>
<script>
//Button menu 
		function openSlideMenu(){
		  document.getElementById('side-menu').style.width = '240px';
		}

		function closeSlideMenu(){
		  document.getElementById('side-menu').style.width = '0';
		}
</script>
<!------------------------- END BODY -------------------------------------------------->

<script>
// hide row without data
$("table tr").each(function() {
  var sold = $(this).find(":nth-child(4)");
  if (parseFloat(sold.text()) === 0)
    $(this).hide();
});
					
	$('.table tr:has(td:empty)').hide();
	$('.table tr').filter(function() {
    return $(this).find('td').filter(function() {
      return ! $.trim($(this).text());  
    }).length;
}).hide();
</script>
<?php wp_footer(); ?>

</body>
</html>
