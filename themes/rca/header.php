<?php
/**
 * The Header template for our theme
 *
 * Displays all of the <head> section and everything up till <div id="main">
 *
 * @package WordPress
 * @subpackage Twenty_Twelve
 * @since Twenty Twelve 1.0
 */
?><!DOCTYPE html>
<!--[if IE 7]>
<html class="ie ie7" <?php language_attributes(); ?>>
<![endif]-->
<!--[if IE 8]>
<html class="ie ie8" <?php language_attributes(); ?>>
<![endif]-->
<!--[if !(IE 7) | !(IE 8)  ]><!-->
<html <?php language_attributes(); ?>>
<!--<![endif]-->
<head>
<meta charset="<?php bloginfo( 'charset' ); ?>" />
<meta name="viewport" content="width=device-width" />
<title><?php wp_title( '|', true, 'right' ); ?></title>
<link rel="profile" href="http://gmpg.org/xfn/11" />
<link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>" />
<?php // Loads HTML5 JavaScript file to add support for HTML5 elements in older IE versions. ?>
<!--[if lt IE 9]>
<script src="<?php echo get_template_directory_uri(); ?>/js/html5.js" type="text/javascript"></script>
<![endif]-->
<?php wp_head(); ?>
<script type="text/javascript">
setTimeout(function(){var a=document.createElement("script");
var b=document.getElementsByTagName("script")[0];
a.src=document.location.protocol+"//script.crazyegg.com/pages/scripts/0017/1576.js?"+Math.floor(new Date().getTime()/3600000);
a.async=true;a.type="text/javascript";b.parentNode.insertBefore(a,b)}, 1);
</script>
<script type='text/javascript' src='https://smartzonessva.com/tag?639'></script>
<script type="text/javascript">
var _ss = _ss || [];
_ss.push(['_setDomain', 'https://koi-3QMGUWHS20.marketingautomation.services/net']);
_ss.push(['_setAccount', 'KOI-3QYOJMP1ZC']);
_ss.push(['_trackPageView']);
(function() {
    var ss = document.createElement('script');
    ss.type = 'text/javascript'; ss.async = true;

    ss.src = ('https:' == document.location.protocol ? 'https://' : 'http://') + 'koi-3QMGUWHS20.marketingautomation.services/client/ss.js?ver=1.1.1';
    var scr = document.getElementsByTagName('script')[0];
    scr.parentNode.insertBefore(ss, scr);
})();
</script>
<!-- Google Tag Manager -->
<script>(function(w,d,s,l,i){w[l]=w[l]||[];w[l].push({'gtm.start':
new Date().getTime(),event:'gtm.js'});var f=d.getElementsByTagName(s)[0],
j=d.createElement(s),dl=l!='dataLayer'?'&l='+l:'';j.async=true;j.src=
'https://www.googletagmanager.com/gtm.js?id='+i+dl;f.parentNode.insertBefore(j,f);
})(window,document,'script','dataLayer','GTM-PK6DK6');</script>
<!-- End Google Tag Manager -->

</head>

<body <?php body_class(); ?>>
<!-- Google Tag Manager (noscript) -->
<noscript><iframe src="https://www.googletagmanager.com/ns.html?id=GTM-PK6DK6"
height="0" width="0" style="display:none;visibility:hidden"></iframe></noscript>
<!-- End Google Tag Manager (noscript) -->

<div id="page" class="hfeed site">
	<header id="masthead" class="site-header" role="banner">
	  <table width="100%" border="0" cellspacing="0" cellpadding="0">
	    <tr bgcolor="#cc6600">
	      <td width="68%"><div id="headlogo"><a href="/"><img src="/wp-content/themes/rca/image/logo.jpg" width="406" height="64" border="0"></a></div></td>
	      <td width="32%">
          <div id="homesearch" margin= "1rem">
	<?php get_search_form(); ?>
</div>
<div id="homelink"><a href="/">Home</a></div>
<!-- .alignright -->
<!--end addition of search bar in header -->
          </td>
        </tr>
	    <tr>
	      <td colspan="2">
          <div id="menu">
          <ul>
          <li><a href="/people/"><img src="/wp-content/themes/rca/image/people.jpg" width="140" height="29" border="0"></a>
          <ul>
        <li><a href="/people/brian-matye/">Brian Matye </a></li>
        <li><a href="/people/seyed-khorashahi/">Seyed Khorashahi</a></li>
         <li><a href="/people/1071-2/">Sharon Ayd </a></li>
        <li><a href="/people/judy-purdom/">Judy Purdom</a></li>
        <li><a href="/people/lisa-l-michel/">Lisa L. Michels</a></li>
        <li><a href="/people/erika-porcelli/">Erika Porcelli</a></li>
        <li><a href="/people/brian-nelson/">Brian Nelson</a></li>
        <li><a href="/people/krista-kurth/">Krista Kurth</a></li>
        <li><a href="/people/principals/">Principals</a></li>
        <li><a href="/people/directors/">Directors</a></li>
        <li><a href="/people/tampa-office/">Tampa Office</a></li>
        <li><a href="/people/european-office/">European Office</a></li>
        </ul>
          </li><li><a href="/clients/"><img src="/wp-content/themes/rca/image/client.jpg" width="140" height="29" border="0"></a></li>
          <li><a href="/services/"><img src="/wp-content/themes/rca/image/service.jpg" width="140" height="29" border="0"></a>
          <ul>
        <li><a href="/services/services-regulatory-affairs/">Regulatory Affairs</a></li>
        <li><a href="/services/services-quality-services/">Quality Assurance</a></li>
        <li><a href="/services/services-compliance-assurance/">Compliance Assurance</a></li>
        <li><a href="/services/services-strategic-consulting/">Strategic Consulting</a></li>
        <li><a href="/services/services-product-development/">Product Development</a></li>
        <li><a href="/services-mergers-acquisitions/">Mergers & Acquisitions</a></li>
        <li><a href="/services/services-medical-devices/">Medical Devices</a></li>
        <li><a href="/services/services-pharmaceutical/">Pharmaceutical</a></li>
        <li><a href="/services/services-biotechnology/">Biotechnology</a></li>
        <li><a href="/services/services-training/">Training</a></li>
        <li><a href="/services/services-interim-management/">Interim Management</a></li>
        <li><a href="/services/services-project-management/">Project Management</a></li>
        <li><a href="/services/rcas-iso-certificate/">RCA’s ISO Certificate</a></li>
        <li><a href="/services/us-agent-services/">U.S. Agent Services</a></li>
        <li><a href="/services/rca-comprehensive-services/">All Services</a></li>
        </ul>
          </li><li><a href="/case-studies/"><img src="/wp-content/themes/rca/image/case.jpg" width="140" height="29" border="0"></a></li><li><a href="/new-and-views/"><img src="/wp-content/themes/rca/image/giving.jpg" width="138" height="29" border="0"></a></li><li><a href="/rca-talent-connection/"><img src="/wp-content/uploads/2017/06/opportunities.jpg" width="141" height="29" border="0"></a>
          <!--<ul>-->
        <!--<li><a href="/the-rca-difference/">The RCA Difference</a></li>-->
        <!--<li><a href="/rca-talent-management-team/">Meet the Talent Management Team</a></li>-->
        <!--<li><a href="/consulting-opportunities/ ">Consulting Opportunities</a></li>-->
        <!--<li><a href="http://chj.tbe.taleo.net/chj02/ats/careers/apply.jsp?org=RCA&cws=1">Submit Resume</a></li>-->
        <!--</ul>-->
      </li><li><a href="/contact-us/"><img src="/wp-content/themes/rca/image/contact.jpg" width="141" height="29" border="0"></a></li></td></tr></table>
<!--		<hgroup>
			<h1 class="site-title"><a href="<?php echo esc_url( home_url( '/' ) ); ?>" title="<?php echo esc_attr( get_bloginfo( 'name', 'display' ) ); ?>" rel="home"><?php bloginfo( 'name' ); ?></a></h1>
			<h2 class="site-description"><?php bloginfo( 'description' ); ?></h2>
		</hgroup>-->

		<!--<nav id="site-navigation" class="main-navigation" role="navigation">
			<h3 class="menu-toggle"><?php _e( 'Menu', 'twentytwelve' ); ?></h3>
			<a class="assistive-text" href="#content" title="<?php esc_attr_e( 'Skip to content', 'twentytwelve' ); ?>"><?php _e( 'Skip to content', 'twentytwelve' ); ?></a>
			<?php wp_nav_menu( array( 'theme_location' => 'primary', 'menu_class' => 'nav-menu' ) ); ?>
		</nav>--><!-- #site-navigation -->

		<?php if ( get_header_image() ) : ?>
		<a href="<?php echo esc_url( home_url( '/' ) ); ?>"><img src="<?php header_image(); ?>" class="header-image" width="<?php echo get_custom_header()->width; ?>" height="<?php echo get_custom_header()->height; ?>" alt="" /></a>
		<?php endif; ?>
	</header><!-- #masthead -->
<div id="innerbox">
<div id="main" class="wrapper">