<!DOCTYPE HTML>
<html lang="en-US">
<head>
    @include('layouts.head')
</head>
<body>
    <!-- Google Tag Manager (noscript) -->
<noscript><iframe src="https://www.googletagmanager.com/ns.html?id=GTM-WNBKT3J7"
height="0" width="0" style="display:none;visibility:hidden"></iframe></noscript>
<!-- End Google Tag Manager (noscript) -->
	<!--==================================================-->
	<!----- Start	NVQ Header Top Menu Area Css ----->
	<!--==================================================-->
	@php
        $contact = DB::table('contact_us')->select('*')->first();
        $links = DB::table('social_links')->select('*')->first();
    @endphp
	
	<div class="header_top_menu pt-2 pb-2 bg_color">
		<div class="container">
			<div class="row">
				<div class="col-lg-9 col-sm-9">
					<div class="header_top_menu_address">
						<div class="header_top_menu_address_inner">
							<ul>
								<li><a href="mailto:{{$contact->email ?? ''}}"><i class="fa fa-envelope-o"></i>{{$contact->email ?? ''}}</a></li>
								<li><a href="https://www.google.com/maps/search/?q={{urlencode($contact->address ?? '')}}"><i class="fa fa-map-marker"></i>{{$contact->address ?? ''}}</a></li>
								<li><a href="tel:{{$contact->phone ?? ''}}"><i class="fa fa-phone"></i>{{$contact->phone ?? ''}}</a></li>
							</ul>
						</div>
					</div>
				</div>
				<div class="col-lg-3 col-sm-3">
					<div class="header_top_menu_icon">
						<div class="header_top_menu_icon_inner">
						    <ul>
								<li><a href="{{$links->facebook ?? ''}}"><i class="fa fa-facebook"></i></a></li>
								<li><a href="{{$links->twitter ?? ''}}"><i class="fa fa-twitter"></i></a></li>
								<li><a href="{{$links->pinterest ?? ''}}"><i class="fa fa-pinterest"></i></a></li>
								<li><a href="{{$links->linkedIn ?? ''}}"><i class="fa fa-linkedin"></i></a></li>
							</ul>
						</div>
					</div>
				</div>
				
			</div>
		</div>
	</div>
	@include('flash-message')
	<!--==================================================-->
	<!----- End	NVQ Header Top Menu Area Css ----->
	<!--===================================================-->



	<!--==================================================-->
	<!----- Start NVQ Main Menu Area ----->
	<!--==================================================-->
	<div id="sticky-header" class="NVQ_nav_manu d-md-none d-lg-block d-sm-none d-none">
		@include('layouts.nav')
	</div>
    	<!-- NVQ Mobile Menu Area -->
	<div class="mobile-menu-area d-sm-block d-md-block d-lg-none">
    @include('layouts.mobilenav')
	</div>
	
	

    @yield('content')
	<!--==================================================-->
	<!----- End NVQ Blog Area ----->
	<!--==================================================-->
	
	<!--==================================================-->
	<!----- Start NVQ Footer Middle Area ----->
	<!--==================================================-->
	<div class="footer-middle pt-95"> 
	    @include('layouts.footer')
	</div>		
	<!--==================================================-->
	<!----- End NVQ Footer Middle Area ----->
	<!--==================================================-->
	<!-- jquery js -->	
	<script type="text/javascript" src="{{ asset('frontend/assets/js/vendor/jquery-3.2.1.min.js') }}"></script>
	<!-- bootstrap js -->	
	<script type="text/javascript" src="{{ asset('frontend/assets/js/bootstrap.min.js') }}"></script>
	<!-- carousel js -->
	<script type="text/javascript" src="{{ asset('frontend/assets/js/owl.carousel.min.js') }}"></script>
	<!-- counterup js -->
	<script type="text/javascript" src="{{ asset('frontend/assets/js/jquery.counterup.min.js') }}"></script>
	<!-- waypoints js -->
	
	<script type="text/javascript" src="{{ asset('frontend/assets/js/waypoints.min.js') }}"></script>
	<!-- wow js -->
	<script type="text/javascript" src="{{ asset('frontend/assets/js/wow.js') }}"></script>
	<!-- imagesloaded js -->
	<script type="text/javascript" src="{{ asset('frontend/assets/js/imagesloaded.pkgd.min.js') }}"></script>
	<!-- venobox js -->
	<script type="text/javascript" src="venobox/venobox.js"></script>
	<!-- ajax mail js -->
	<script type="text/javascript" src="{{ asset('frontend/assets/js/ajax-mail.js') }}"></script>
	<!--  testimonial js -->	
	<script type="text/javascript" src="{{ asset('frontend/assets/js/testimonial.js') }}"></script>
	<!--  animated-text js -->	
	<script type="text/javascript" src="{{ asset('frontend/assets/js/animated-text.js') }}"></script>
	<!-- venobox min js -->
	<script type="text/javascript" src="{{ asset('frontend/assets/venobox/venobox.min.js') }}"></script>
	<!-- isotope js -->
	<script type="text/javascript" src="{{ asset('frontend/assets/js/isotope.pkgd.min.js') }}"></script>
	<!-- jquery nivo slider pack js -->
	<script type="text/javascript" src="{{ asset('frontend/assets/js/jquery.nivo.slider.pack.js') }}"></script>
	<!-- jquery meanmenu js -->	
	<script type="text/javascript" src="{{ asset('frontend/assets/js/jquery.meanmenu.js') }}"></script>
	
	<!-- jquery scrollup js -->	
	<script type="text/javascript" src="{{ asset('frontend/assets/js/jquery.scrollUp.js') }}"></script>
	<script src="{{ asset('frontend/assets/js/extensions/revolution.extension.actions.min.js') }}"></script>
	<script src="{{ asset('frontend/assets/js/extensions/revolution.extension.carousel.min.js') }}"></script>
	<script src="{{ asset('frontend/assets/js/extensions/revolution.extension.kenburn.min.js') }}"></script>
	<script src="{{ asset('frontend/assets/js/extensions/revolution.extension.migration.min.js') }}"></script>
	<script src="{{ asset('frontend/assets/js/extensions/revolution.extension.parallax.min.js') }}"></script>
	<script src="{{ asset('frontend/assets/js/extensions/revolution.extension.video.min.js') }}"></script>
	<script src="{{ asset('frontend/assets/js/jquery.themepunch.revolution.min.js') }}"></script>
	<script src="{{ asset('frontend/assets/js/jquery.themepunch.tools.min.js') }}"></script>
	<script type="text/javascript" src="{{ asset('frontend/assets/js/extensions/revolution.extension.slideanims.min.js') }}"></script>
	<script type="text/javascript" src="{{ asset('frontend/assets/js/extensions/revolution.extension.layeranimation.min.js') }}"></script>
	<script type="text/javascript" src="{{ asset('frontend/assets/js/extensions/revolution.extension.navigation.min.js') }}"></script>
	<!-- theme js -->	
	<script type="text/javascript" src="{{ asset('frontend/assets/js/theme.js') }}"></script>
		<!-- jquery js -->	
		
				
<script type="text/javascript">

    jQuery('#rev_slider_1').show().revolution({
        delay: 7000,
        responsiveLevels: [1200, 1140, 778, 480],
        gridwidth: [1140, 920, 700, 380],
        sliderLayout: 'fullscreen',
        navigation: {
            arrows: {
                enable: true,
                style: "vor_arrows",
                hide_onleave: false,
                left: {
                    container: 'slider',
                    h_align: 'left',
                    v_align: 'center',
                    h_offset: 26,
                    v_offset: 0
                },
                right: {
                    container: 'slider',
                    h_align: 'right',
                    v_align: 'center',
                    h_offset: 26,
                    v_offset: 0
                }
            },
            bullets: {
                enable: true,
                style: "vor_bullet",
                hide_onleave: false,
                h_align: "center",
                v_align: "bottom",
                h_offset: 0,
                v_offset: 40,
                space: 12

            }
        }
    });
    jQuery('#rev_slider_2').show().revolution({
        delay: 7000,
        responsiveLevels: [1200, 1140, 778, 480],
        gridwidth: [1140, 920, 700, 380],
        jsFileLocation: "js/",
        sliderLayout: "auto",
        minHeight: 800,
        navigation: {
            arrows: {
                enable: true,
                style: "vor_arrows",
                hide_onleave: false,
                left: {
                    container: 'slider',
                    h_align: 'left',
                    v_align: 'center',
                    h_offset: 26,
                    v_offset: 0
                },
                right: {
                    container: 'slider',
                    h_align: 'right',
                    v_align: 'center',
                    h_offset: 26,
                    v_offset: 0
                }
            },
            bullets: {
                enable: true,
                style: "vor_bullet",
                hide_onleave: false,
                h_align: "center",
                v_align: "bottom",
                h_offset: 0,
                v_offset: 23,
                space: 12

            }
        }
    });
    jQuery('#rev_slider_3').show().revolution({
        delay: 7000,
        responsiveLevels: [1200, 1140, 778, 480],
        gridwidth: [1140, 920, 700, 380],
        sliderLayout: 'fullscreen',
        navigation: {
            arrows: {
                enable: false
            },
            bullets: {
                enable: true,
                style: "vor_bullet",
                hide_onleave: false,
                h_align: "center",
                v_align: "bottom",
                h_offset: 0,
                v_offset: 33,
                space: 12
            }
        }
    });
</script>

<!-- Google tag (gtag.js) -->
<script async src="https://www.googletagmanager.com/gtag/js?id=G-VRJL0E42VQ"></script>
<script>
  window.dataLayer = window.dataLayer || [];
  function gtag(){dataLayer.push(arguments);}
  gtag('js', new Date());

  gtag('config', 'G-VRJL0E42VQ');
</script>
</body>
</html>