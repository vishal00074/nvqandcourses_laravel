<!-- Google Tag Manager -->
<script>(function(w,d,s,l,i){w[l]=w[l]||[];w[l].push({'gtm.start':
new Date().getTime(),event:'gtm.js'});var f=d.getElementsByTagName(s)[0],
j=d.createElement(s),dl=l!='dataLayer'?'&l='+l:'';j.async=true;j.src=
'https://www.googletagmanager.com/gtm.js?id='+i+dl;f.parentNode.insertBefore(j,f);
})(window,document,'script','dataLayer','GTM-WNBKT3J7');</script>
<!-- End Google Tag Manager -->
<meta charset="UTF-8">
	<meta http-equiv="x-ua-compatible" content="ie=edge">
		<meta name="viewport" content="width=device-width, initial-scale=1">
		
		<meta name="google-site-verification" content="ZsK7C2lkRIFgMYV5ArdDSqL--TtyT99-84aAe3CEdYw" />
	
	@include('meta::manager', [
        'title' => $seo->seo_title ?? '',
        'keyword' => $seo->seo_keyword ?? '',
        'description' => $seo->seo_description ?? '',
   
    ])
	<!-- Favicon -->
	<link rel="icon" type="image/png" href="{{ asset('frontend/assets/images/1.png') }}">
	<!-- bootstrap CSS -->
	<link rel="stylesheet" href="{{ asset('frontend/assets/css/bootstrap.min.css') }}" type="text/css" media="all" />
	<!-- carousel CSS -->
	<link rel="stylesheet" href="{{ asset('frontend/assets/css/owl.carousel.min.css') }}" type="text/css" media="all" />	
	<!-- nivo-slider CSS -->
	<link rel="stylesheet" href="{{ asset('frontend/assets/css/nivo-slider.css') }}" type="text/css" media="all" />
	<!-- animate CSS -->
	<link rel="stylesheet" href="{{ asset('frontend/assets/css/animate.css') }}" type="text/css" media="all" />	
	<!-- animated-text CSS -->
	<link rel="stylesheet" href="{{ asset('frontend/assets/css/animated-text.css') }}" type="text/css" media="all" />	
	<!-- font-awesome CSS -->
	<link type="text/css" rel="stylesheet" href="{{ asset('frontend/assets/fonts/font-awesome/css/font-awesome.min.css') }}">
	<!-- font-flaticon CSS -->
	<link rel="stylesheet" href="{{ asset('frontend/assets/css/flaticon.css') }}" type="text/css" media="all" />	
	<!-- theme-default CSS -->
	<link rel="stylesheet" href="{{ asset('frontend/assets/css/theme-default.css') }}" type="text/css" media="all" />	
	<!-- meanmenu CSS -->
	<link rel="stylesheet" href="{{ asset('frontend/assets/css/meanmenu.min.css') }}" type="text/css" media="all" />	
	<!-- Main Style CSS -->
	<link rel="stylesheet"  href="{{ asset('frontend/assets/css/style.css') }}" type="text/css" media="all" />
	<!-- transitions CSS -->
	<link rel="stylesheet" href="{{ asset('frontend/assets/css/owl.transitions.css') }}" type="text/css" media="all" />
	<!-- venobox CSS -->
	<link rel="stylesheet" href="{{ asset('frontend/assets/css/venobox.css') }}" type="text/css" media="all" />
	<!-- widget CSS -->
	<link rel="stylesheet" href="{{ asset('frontend/assets/css/widget.css') }}" type="text/css" media="all" />
	<!-- settings CSS -->
	<link rel="stylesheet" href="{{ asset('frontend/assets/css/settings.css') }}" type="text/css" media="all" />
	<!-- responsive CSS -->
	<link rel="stylesheet" href="{{ asset('frontend/assets/css/responsive.css') }}" type="text/css" media="all" />
	<!-- modernizr js -->	
	<script type="text/javascript" src="{{ asset('frontend/assets/js/vendor/modernizr-3.5.0.min.js') }}"></script>
	
	<!-- Google tag (gtag.js) -->
<script async src="https://www.googletagmanager.com/gtag/js?id=AW-11352833194">
</script>
<script>
  window.dataLayer = window.dataLayer || [];
  function gtag(){dataLayer.push(arguments);}
  gtag('js', new Date());

  gtag('config', 'AW-11352833194');
</script>
