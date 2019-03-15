<!DOCTYPE html>
<html lang="<?php bloginfo('language') ?>">
<head>
  <meta charset="<?php bloginfo('charset') ?>">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <title><?php bloginfo('name') ?></title>
  <?php wp_head(); ?>
</head>
<body>
  <!-- header -->
  <header class="header" id="home">
    <!-- top bar -->
    <div class="l-top-bar">
      <div class="container">
        <div class="c-header-contacts">
          <div class="contact-type">
            <?php echo get_theme_mod('header-contact-icon') ?>
            <span class="text">
              <?php echo get_theme_mod('header-contact-type') ?> 
            </span>
          </div>
          <a href="tel:<?php echo get_theme_mod('header-contact-2') ?>" class="phone-dark">
            <?php echo get_theme_mod('header-contact-1') ?>
          </a>
          <a href="tel:<?php echo get_theme_mod('header-contact-2') ?>" class="phone">
            <?php echo get_theme_mod('header-contact-2') ?>
          </a>
        </div>
      </div>
    </div>
    <!-- navbar -->
    <div class="l-navbar">
      <div class="container">
        <div class="row align-items-center">
          <div class="col-4 col-sm-2 col-md-1 ">
            <a href="" class="logo">
              <?php 
                $custom_logo_id = get_theme_mod( 'custom_logo' );
                $logo = wp_get_attachment_image_src( $custom_logo_id , 'full' );
                if ( has_custom_logo() ) {
                  echo '<img src="'. esc_url( $logo[0] ) .'">';
                }
              ?>
            </a>
          </div>
          <div class="col-8 col-sm-10 col-md-11">
            <nav class="nav">
              <?php wp_nav_menu([
                'theme_location' => 'header-menu',
                'container' => false,
                'menu_class' => 'c-nav-menu d-none d-xl-flex',
                'walker' => new My_Walker_Nav_Menu()
              ]) ?>
              <button type="button" class="c-mmenu-toggler d-xl-none">
                <i class="far fa-bars"></i>
              </button>
            </nav>
          </div>
        </div>
      </div>
    </div>
    <!-- banner area -->
    <div class="l-banner-area" style="background-image: url('<?php echo ROOT.'/public'; ?>/img/Group154@2x.png')">
      <div class="c-slogan">
         <h1 class="c-slogan_title">
            <?php echo get_theme_mod('slogan') ?>
         </h1>
        <p class="c-slogan_subtitle">
            <?php echo get_theme_mod('subtitle') ?>          
        </p>
        <div>
          <a href="tel:<?php echo get_theme_mod('header-contacts-1') ?>" class="c-btn c-btn--sm c-btn--orange">Позвонить</a>
          <a href="#contacts" class="c-btn c-btn--sm scroll">Оставить заявку</a>
        </div>
      </div>
      <span class="bottom-left-item">
        <img src="<?php echo ROOT.'/public'; ?>/img/Group 131.png" alt="">
      </span>
      <span class="top-left-item">
        <img src="<?php echo ROOT.'/public'; ?>/img/Group 149.png" alt="">
      </span>
      <span class="top-right-item">
        <img src="<?php echo ROOT.'/public'; ?>/img/Group 135.png" alt="">
      </span>
      <span class="bottom-right-item">
        <img src="<?php echo ROOT.'/public'; ?>/img/Group 148.png" alt="">
      </span>
    </div>
  </header>