<?php
/**
 * The header for our theme
 *
 * This is the template that displays all of the <head> section and everything up until <div id="content">
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package TPG_theme
 */

?>
<!doctype html>
<html <?php language_attributes(); ?>>
<head>
	    <!-- Required meta tags -->
	<meta charset="<?php bloginfo( 'charset' ); ?>">
	<meta http-equiv="X-UA-Compatible" content="ie=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no, maximum-scale=1">
	<meta name="google-site-verification" content="G17GOx4wo9OJW1AJnoU_Q1yMmES0p7K5Hz3vi8hhBL0" />
	<?php wp_head(); ?>
</head>
<body class="preloading" <?php body_class(); ?>>
<?php wp_body_open(); ?>
	<!-- Preload -->
<div id="preload" class="preload-container">
    <div class="preloader">
        <div class="preloader__ring">
            <div class="preloader__sector">L</div>
            <div class="preloader__sector">o</div>
            <div class="preloader__sector">a</div>
            <div class="preloader__sector">d</div>
            <div class="preloader__sector">i</div>
            <div class="preloader__sector">n</div>
            <div class="preloader__sector">g</div>
            <div class="preloader__sector">.</div>
            <div class="preloader__sector">.</div>
            <div class="preloader__sector">.</div>
            <div class="preloader__sector"></div>
            <div class="preloader__sector"></div>
            <div class="preloader__sector"></div>
            <div class="preloader__sector"></div>
            <div class="preloader__sector"></div>
            <div class="preloader__sector"></div>
            <div class="preloader__sector"></div>
            <div class="preloader__sector"></div>
            <div class="preloader__sector"></div>
            <div class="preloader__sector"></div>
            <div class="preloader__sector"></div>
            <div class="preloader__sector"></div>
            <div class="preloader__sector"></div>
            <div class="preloader__sector"></div>
            <div class="preloader__sector"></div>
            <div class="preloader__sector"></div>
            <div class="preloader__sector"></div>
            <div class="preloader__sector"></div>
            <div class="preloader__sector"></div>
            <div class="preloader__sector"></div>
        </div>
        <div class="preloader__ring">
            <div class="preloader__sector">T</div>
            <div class="preloader__sector">P</div>
            <div class="preloader__sector">G</div>
            <div class="preloader__sector">.</div>
            <div class="preloader__sector">G</div>
            <div class="preloader__sector">L</div>
            <div class="preloader__sector">O</div>
            <div class="preloader__sector">B</div>
            <div class="preloader__sector">A</div>
            <div class="preloader__sector">L</div>
			<div class="preloader__sector">.</div>
            <div class="preloader__sector">T</div>
            <div class="preloader__sector">R</div>
            <div class="preloader__sector">A</div>
            <div class="preloader__sector">D</div>
            <div class="preloader__sector">I</div>
            <div class="preloader__sector">N</div>
            <div class="preloader__sector">G</div>
            <div class="preloader__sector"></div>
            <div class="preloader__sector"></div>
            <div class="preloader__sector"></div>
            <div class="preloader__sector"></div>
            <div class="preloader__sector"></div>
            <div class="preloader__sector"></div>
            <div class="preloader__sector"></div>
            <div class="preloader__sector"></div>
            <div class="preloader__sector"></div>
        </div>
    </div>
</div> <!----- END PRELOAD ---->
						<div class="navbar-x">
                            <div class="navbar-logo">
							<a href="https://transpacific.vn/" target="new">
								<img src="https://transpacific.vn/wp-content/uploads/2022/01/logo-tpg.png">
								</a>
                            </div>
                            <div class="navbar-icon" style="display: flex;
                                                            width: 40%;
                                                            justify-content: flex-end;
                                                            padding-right: 15px;">
                                <a href="#" onclick="openSlideMenu()">
                                <svg width="30" height="30">
									  <path d="M0,5 30,5" stroke="black" stroke-width="2"/>
									  <path d="M0,14 30,14" stroke="black" stroke-width="2"/>
									  <path d="M0,23 30,23" stroke="black" stroke-width="2"/>
								  </svg>
								</a>
                            </div>
                        </div>
						<div id="side-menu" class="side-nav">
								<a href="#" class="btn-close" onclick="closeSlideMenu()">&times;</a>
								<a href="https://transpacific.vn/" target="new">
									<img src="https://transpacific.vn/wp-content/uploads/2021/05/logo-tpg-white.png"></a>

						<li><a class="smoothscroll" href="https://transpacific.vn/about/" title="About us">About us</a></li>
                        <li><a class="smoothscroll" href="https://transpacific.vn/service" title="Services">Services</a></li>
                        <li><a class="smoothscroll" href="https://transpacific.vn/promotion/" title="Promotion">Promotion</a></li>
                        <li><a class="smoothscroll" href="https://transpacific.vn/kien-thuc/" title="News">News</a></li>
                        <li><a class="smoothscroll" href="https://transpacific.vn/contact" title="Contact">Contact</a></li>                        
        </div>
    <header class="x-header">
            <div class="header-logo">
                <a href="https://transpacific.vn/">
					<img src="https://transpacific.vn/wp-content/uploads/2022/01/logo-tpg.png">
				</a>
            </div>

            <div class="header__content">
                <nav class="header__nav-wrap">
                    <ul class="header__nav">
                        <li><a class="smoothscroll" href="https://transpacific.vn/about/" title="About us">About us</a></li>
                        <li><a class="smoothscroll" href="https://transpacific.vn/service" title="Services">Services</a></li>
                        <li><a class="smoothscroll" href="https://transpacific.vn/promotion/" title="Promotion">Promotion</a></li>
                        <li><a class="smoothscroll" href="https://transpacific.vn/kien-thuc/" title="News">News</a></li>
                        <li><a class="smoothscroll" href="https://transpacific.vn/contact" title="Contact">Contact</a></li>                    
                    </ul>
                </nav> <!-- end header__nav-wrap -->      
            </div> <!-- end header-content -->
<script>
		function openSlideMenu(){
	  document.getElementById('side-menu').style.width = '240px';
	}

	function closeSlideMenu(){
	  document.getElementById('side-menu').style.width = '0';
	}
	
	$text = str_replace( "&nbsp","",get_the_excerpt() );

		</script>
    </header><!-----------END HEADER -------------------------------------------------->
    
