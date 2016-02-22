<!DOCTYPE html>
<html xmlns="http<?php echo (is_ssl())? 's' : ''; ?>://www.w3.org/1999/xhtml" <?php language_attributes(); ?>>
<head>
  <?php
  if( isset( $_SERVER['HTTP_USER_AGENT'] ) &&
      ( strpos($_SERVER['HTTP_USER_AGENT'], 'MSIE' ) !== false )
  ) {
    echo '<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />';
  }
  ?>


  <meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>

  <title>
    <?php
    if ( defined('WPSEO_VERSION') ) {
      wp_title('');
    } else {
      bloginfo('name'); ?> <?php wp_title(' - ', true, 'left');
    }
    ?>
  </title>

  <?php global $smof_data, $woocommerce; ?>

  <!--[if lte IE 8]>
  <script type="text/javascript" src="<?php echo get_template_directory_uri(); ?>/js/html5shiv.js"></script>
  <![endif]-->


  <?php $isiPad = (bool) strpos($_SERVER['HTTP_USER_AGENT'],'iPad');
  if($smof_data['responsive']):
    if(!$isiPad || !$smof_data['ipad_potrait']):
      ?>
      <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1" />
    <?php endif; endif; ?>

  <?php if($smof_data['favicon']): ?>
    <link rel="shortcut icon" href="<?php echo $smof_data['favicon']; ?>" type="image/x-icon" />
  <?php endif; ?>

  <?php if($smof_data['iphone_icon']): ?>
    <!-- For iPhone -->
    <link rel="apple-touch-icon-precomposed" href="<?php echo $smof_data['iphone_icon']; ?>">
  <?php endif; ?>

  <?php if($smof_data['iphone_icon_retina']): ?>
    <!-- For iPhone 4 Retina display -->
    <link rel="apple-touch-icon-precomposed" sizes="114x114" href="<?php echo $smof_data['iphone_icon_retina']; ?>">
  <?php endif; ?>

  <?php if($smof_data['ipad_icon']): ?>
    <!-- For iPad -->
    <link rel="apple-touch-icon-precomposed" sizes="72x72" href="<?php echo $smof_data['ipad_icon']; ?>">
  <?php endif; ?>

  <?php if($smof_data['ipad_icon_retina']): ?>
    <!-- For iPad Retina display -->
    <link rel="apple-touch-icon-precomposed" sizes="144x144" href="<?php echo $smof_data['ipad_icon_retina']; ?>">
  <?php endif; ?>

<!-- Headlines -->
<link href='https://fonts.googleapis.com/css?family=Prata' rel='stylesheet' type='text/css'>
<!-- Body Copy -->
<link href='https://fonts.googleapis.com/css?family=Merriweather' rel='stylesheet' type='text/css'>

  <?php wp_head(); ?>

  <?php
  $object_id = get_queried_object_id();
  if((get_option('show_on_front') && get_option('page_for_posts') && is_home()) ||
      (get_option('page_for_posts') && is_archive() && !is_post_type_archive()) && !(is_tax('product_cat') || is_tax('product_tag')) || (get_option('page_for_posts') && is_search())) {
    $c_pageID = get_option('page_for_posts');
  } else {
    if(isset($object_id)) {
      $c_pageID = $object_id;
    }

  }
  ?>

  <!--[if lte IE 8]>
  <script type="text/javascript">
    jQuery(document).ready(function() {
      var imgs, i, w;
      var imgs = document.getElementsByTagName( 'img' );
      for( i = 0; i < imgs.length; i++ ) {
        w = imgs[i].getAttribute( 'width' );
        imgs[i].removeAttribute( 'width' );
        imgs[i].removeAttribute( 'height' );
      }
    });
  </script>

  <script src="<?php echo get_template_directory_uri(); ?>/js/excanvas.js"></script>

  <![endif]-->

  <!--[if lte IE 9]>
  <script type="text/javascript">
    jQuery(document).ready(function() {

      // Combine inline styles for body tag
      jQuery('body').each( function() {
        var combined_styles = '<style type="text/css">';

        jQuery( this ).find( 'style' ).each( function() {
          combined_styles += jQuery(this).html();
          jQuery(this).remove();
        });

        combined_styles += '</style>';

        jQuery( this ).prepend( combined_styles );
      });
    });
  </script>

  <![endif]-->

  <script type="text/javascript">
    /*@cc_on
     @if (@_jscript_version == 10)
     document.write('<style type="text/css">.search input,.searchform input {padding-left:10px;} .avada-select-parent .select-arrow,.select-arrow{height:33px;<?php if($smof_data['form_bg_color']): ?>background-color:<?php echo $smof_data['form_bg_color']; ?>;<?php endif; ?>}.search input{padding-left:5px;}header .tagline{margin-top:3px;}.star-rating span:before {letter-spacing: 0;}.avada-select-parent .select-arrow,.gravity-select-parent .select-arrow,.wpcf7-select-parent .select-arrow,.select-arrow{background: #fff;}.star-rating{width: 5.2em;}.star-rating span:before {letter-spacing: 0.1em;}</style>');
     @end
     @*/

    var doc = document.documentElement;
    doc.setAttribute('data-useragent', navigator.userAgent);
  </script>






  <?php echo $smof_data['space_head']; ?>
</head>


<body>
<header class="fusion-header-wrapper" style="">
  <div class="wrapper">

    <div class="fusion-header-v1 fusion-logo-left fusion-mobile-logo- fusion-mobile-menu-design-modern">
      <a href="<?php echo home_url(); ?>">
                <img src="<?php echo get_stylesheet_directory_uri(); ?>/img/fflogo.jpg" alt="<?php bloginfo('name'); ?>" class="normal_logo" />

              </a>
       <h1 class="branding">Film-Forward</h1>
      <div class="fusion-header" style="height: 276px; top: 0px; overflow: visible;">
        <div class="fusion-row" style="padding-top: 0px; padding-bottom: 0px;">
          <?php get_template_part( 'advert/home-970x90'); ?>


	  <?php
	  get_template_part( 'framework/templates/header' );
	  avada_header_template( 'Below' );

	  ?>

	  <?php if(is_page_template('contact.php') && $smof_data['recaptcha_public'] && $smof_data['recaptcha_private']): ?>
	    <script type="text/javascript">
	      var RecaptchaOptions = {
		theme : '<?php echo $smof_data['recaptcha_color_scheme']; ?>'
	      };
	    </script>
	  <?php endif; ?>
	  <?php if(is_page_template('contact.php') && $smof_data['gmap_address'] && !$smof_data['status_gmap']): ?>
	  <?php endif; ?>
	</div>
<div class="wrapper logowrapper">
          <div class="col1">
            
          </div>
          <div class="col2">


            <div class="gcs">
	      <?php get_template_part( 'gcs'); ?>
            </div>
          </div>
        </div>
      </div>
    </div>
    </div>
</header>


