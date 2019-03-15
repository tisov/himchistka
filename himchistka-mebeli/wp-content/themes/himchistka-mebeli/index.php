<!-- header -->
<?php get_header(); ?>

<!-- section cleaning offer -->
<div class="container" id="services">
   <section class="sec-1 section">
      <h2 class="section_title">
         <?php echo get_theme_mod('service-title') ?>
      </h2>
      <div class="cleaning-offer-slider">
         <!-- our services slider -->
         <?php
         $services_post = new WP_Query( array( 
            'post_type' => 'services' 
            ) );
         $service_posts_count = 1;
      
         while ( $services_post->have_posts() ) : 
            $services_post->the_post();
         ?>
         <div>
            <div class="c-cleaning-offer">
            <div class="info">
               <div class="item-count">
                  <?php echo '0'.$service_posts_count++ ?>
                  <?php echo '/'.'0'.count($services_post->posts) ?>
               </div>
               <h3 class="title"><?php the_title() ?></h3>
               <span class="text">
                  <?php the_content() ?>
               </span>
               <a href="#price-calculate" class="c-btn c-btn--orange">Расчитать стоимость</a>
               <button class="c-slider-btn c-slider-btn--orange" type="button">
                  <i class="fal fa-angle-left"></i>
               </button>
            </div>
            <div class="thumb" style="background-image: url('<?php echo get_the_post_thumbnail_url()?>')">
               <button class="c-slider-btn c-slider-btn--blue" type="button">
                  <i class="fal fa-angle-right"></i>
               </button>
            </div>
            </div>

         </div>
         <?php endwhile; wp_reset_query(); ?>
      </div>
   </section>
</div>

<!-- advantages -->
<div class="container" id="advantages">
   <section class="sec-2 section">
   <h2 class="section_title">
      <?php echo get_theme_mod('advantages-title') ?>      
   </h2>
   <div class="adv-wrap">
      <!-- item 1 -->
      <div class="c-adv">
         <div class="thumb">
            <img src="<?php echo wp_get_attachment_url(get_theme_mod('advantages-1-thumb')) ?>" alt="">
         </div>
         <p class="text">
            <?php echo get_theme_mod('advantages-1-text') ?>
         </p>
      </div>
      <!-- item 2 -->
      <div class="c-adv">
         <div class="thumb">
            <img src="<?php echo wp_get_attachment_url(get_theme_mod('advantages-2-thumb')) ?>" alt="">
         </div>
         <p class="text">
            <?php echo get_theme_mod('advantages-2-text') ?>
         </p>
      </div>
      <!-- item 3 -->
      <div class="c-adv">
         <div class="thumb">
            <img src="<?php echo wp_get_attachment_url(get_theme_mod('advantages-3-thumb')) ?>" alt="">
         </div>
         <p class="text">
            <?php echo get_theme_mod('advantages-3-text') ?>
         </p>
      </div>
      <!-- item 4 -->
      <div class="c-adv">
         <div class="thumb">
            <img src="<?php echo wp_get_attachment_url(get_theme_mod('advantages-4-thumb')) ?>" alt="">
         </div>
         <p class="text">
            <?php echo get_theme_mod('advantages-4-text') ?>
         </p>
      </div>
      <!-- item 5 -->
      <div class="c-adv">
         <div class="thumb">
            <img src="<?php echo wp_get_attachment_url(get_theme_mod('advantages-5-thumb')) ?>" alt="">
         </div>
         <p class="text">
            <?php echo get_theme_mod('advantages-5-text') ?>
         </p>
      </div>
      <!-- item 6 -->
      <div class="c-adv">
         <div class="thumb">
            <img src="<?php echo wp_get_attachment_url(get_theme_mod('advantages-6-thumb')) ?>" alt="">
         </div>
         <p class="text">
            <?php echo get_theme_mod('advantages-6-text') ?>
         </p>
      </div>

   </div>
   </section>
</div>

<!-- servie calc section -->
<section class="sec-3 section section--calc" id="price-calculate" style="background-image: url('<?php echo ROOT.'/public' ?>/img/design-your-own-house-in-modern-style-1.png')">
   <div class="bg-item" style="background-image: url('<?php echo ROOT.'/public' ?>/img/Group 126.png')"></div>
   <div class="c-service-calc">
   <h2 class="section_title">
      <?php echo get_theme_mod('online-calc-title') ?>      
   </h2>
   <!-- calc tab navs -->
   <div class="nav furniture-type c-btn-group ">
      <a class="c-btn c-btn--outline-blue " data-toggle="pill" href="#light-furniture">МЯГКАЯ МЕБЕЛЬ</a>
      <a class="c-btn c-btn--outline-blue" data-toggle="pill" href="#matress">МАТРАС</a>
      <a class="c-btn c-btn--outline-blue active" data-toggle="pill" href="#carpet">КОВЕР</a>
   </div>
   <!-- calc tab content -->
   <div class="tab-content calc-tab-content" >
      <!-- light furniture calc -->
      <div class="calc-options light-furniture fade " id="light-furniture" >
         <div class="c-form_row">
         <div class="c-form_group">
            <label for="type-light-furniture" class="c-form_label">Вид мебели</label>
            <select name="" id="type-light-furniture" class="custom-select">
               <option value="" data-price="600">Стул со спинкой</option>
               <option value="" data-price="650">Стул без спинки</option>
               <option value="" data-price="700">Диван (1 посадка)</option>
               <option value="" data-price="220">Кресло</option>
            </select>
         </div>
         <div class="c-form_group">
            <label for="cost" class="c-form_label">Стоимость (тг)</label>
            <input type="text" class="c-form_input out-input" value="">
         </div>
         </div>
      </div>
      <!-- matress calc -->
      <div class="calc-options tab-pane fade" id="matress">
         <div class="c-form_row">
         <div class="c-form_group">
            <label for="type-matress" class="c-form_label">Вид матрасов</label>
            <select name="" id="type-matress" class="custom-select">

               <option value="" data-price="220">Детский</option>
               <option value="" data-price="340">1 спальный</option>
               <option value="" data-price="450">1,5 полуторка</option>
               <option value="" data-price="500">2х спальный</option>
            </select>
         </div>
         <div class="c-form_group">
            <label for="cost" class="c-form_label">Стоимость (тг)</label>
            <input type="text" class="c-form_input out-input" value="6000">
         </div>
         </div>
      </div>
      <!-- carpet calc -->
      <div class="fade calc-options tab-pane show active" id="carpet">
         <div class="c-form_row">
         <div class="c-form_group">
            <label for="square" class="c-form_label">Площадь (кв/м)</label>
            <input type="text" id="square" class="c-form_input square" value="1">
         </div>
         <div class="c-form_group" id="price-per-unit">
            <label for="price" class="c-form_label">Цена</label>
            <input type="text" class="c-form_input" value="">
         </div>
         </div>
         <div class="c-form_row">
            <div class="c-form_group">
               <label for="type-carpet" class="c-form_label">Вид ковра</label>
               <select name="" id="type-carpet" class="custom-select">
                  <option value="Kovrolan" data-price="300">Ковролан</option>
                  <option value="carpet" data-price="400">Ковер</option>
               </select>
            </div>
            <div class="c-form_group">
               <label for="cost" class="c-form_label">Стоимость (тг)</label>
               <input type="text" class="c-form_input out-input" value="">
            </div>
         </div>
      </div>
   </div>
   <button class="c-btn c-btn--orange js-price-calc">Рассчитать стоимость</button>
   </div>
</section>

<!-- our prices -->
<section class="sec-4 section section--prices" id="sales">
   <div class="container">
   <div class="c-prices" style="background-image: url('<?php echo ROOT.'/public' ?>/img/Mask Group 2.png')">
      <h3 class="title">
         <?php echo get_theme_mod('prices-title') ?>            
      </h3>
      <ul class="price-list">
         <li><?php echo get_theme_mod('price-1') ?></li>
         <li><?php echo get_theme_mod('price-2') ?></li>
         <li><?php echo get_theme_mod('price-3') ?></li>
      </ul>
      <div class="buttons-group">
         <a href="tel:<?php echo get_theme_mod('header-contacts-1') ?>" class="c-btn c-btn--orange">Позвонить</a>
         <a href="#contacts" class="c-btn scroll">Оставить заявку</a>
      </div>
   </div>
   <div class="prices-sec-img">
      <div class="row justify-content-end">
         <div class="col-md-6 col-lg-7 col-xl-9 d-none d-md-block">
         <div class="prices-section-img">
            <img src="<?php echo ROOT.'/public'; ?>/img/563564-PL2J85-888.png" alt="">
         </div>
         </div>
      </div>
   </div>
   </div>
</section>

<!-- suppliers -->
<section class="sec-5 section section--providers" id="suppliers">
   <div class="c-providers">
   <h5 class="title">
      <?php echo get_theme_mod('suppliers-title') ?>
   </h5>
   <ul class="providers-list">
      <li class="item">
         <img src="<?php echo wp_get_attachment_url(get_theme_mod('supplier-1')) ?>" alt="">
      </li>
      <li class="item">
         <img src="<?php echo wp_get_attachment_url(get_theme_mod('supplier-2')) ?>" alt="">
      </li>
      <li class="item">
         <img src="<?php echo wp_get_attachment_url(get_theme_mod('supplier-3')) ?>" alt="">
      </li>
      <li class="item">
         <img src="<?php echo wp_get_attachment_url(get_theme_mod('supplier-4')) ?>" alt="">
      </li>
      <li class="item">
         <img src="<?php echo wp_get_attachment_url(get_theme_mod('supplier-5')) ?>" alt="">
      </li>
      <li class="item">
         <img src="<?php echo wp_get_attachment_url(get_theme_mod('supplier-6')) ?>" alt="">
      </li>
      <li class="item">
         <img src="<?php echo wp_get_attachment_url(get_theme_mod('supplier-7')) ?>" alt="">
      </li>
   </ul>
   </div>
</section>

<!-- section our-works -->
<section class="sec-6 section secion--our-works" id="our-works">
   <div class="container">
   <div class="row justify-content-center">
      <div class="col-lg-9">
         <div class="c-our-works">
            <div class="head">
               <h2 class="title">
                  <?php echo get_theme_mod('our-works-title') ?>
               </h2>
               <span class="title-img">
                  <img src="<?php echo ROOT.'/public'; ?>/img/Group 140@2x.png" alt="">
               </span>
            </div>
            <div class="compare-titles">
               <span class="before">До</span>
               <span class="after">После</span>
            </div>
            <div class="compare-wrap">
               <div class="compare-item" style="background-image: url('<?php echo wp_get_attachment_url(get_theme_mod('our-work-compare-img-1')) ?>')">
               </div>
               <div class="slider-control">
                  <span class="control-circle-top"></span>
                  <span class="control-line"></span>
                  <span class="control-circle-bottom"></span>
               </div>
               <div class="compare-item" style="background-image: url('<?php echo wp_get_attachment_url(get_theme_mod('our-work-compare-img-2')) ?>')">
                  
               </div>
            </div>
            <div class="row">
               <div class="col-6 col-md-3 mb-3 mb-lg-0">
                  <img src="<?php echo wp_get_attachment_url(get_theme_mod('our-work-img-1')) ?>" alt="">
               </div>
               <div class="col-6 col-md-3 mb-3 mb-lg-0">
                  <img src="<?php echo wp_get_attachment_url(get_theme_mod('our-work-img-2')) ?>" alt="">
               </div>
               <div class="col-6 col-md-3 mb-3 mb-lg-0">
                  <img src="<?php echo wp_get_attachment_url(get_theme_mod('our-work-img-3')) ?>" alt="">
               </div>
               <div class="col-6 col-md-3 mb-3 mb-lg-0">
                  <img src="<?php echo wp_get_attachment_url(get_theme_mod('our-work-img-4')) ?>" alt="">
               </div>
            </div>
         </div>
      </div>
   </div>
   </div>
</section>

<!-- reviews section -->
<section class="sec-7 section section--reviews" id="reviews">
   <div class="container">
      <h2 class="title section_title">
         <?php echo get_theme_mod('reviews-title') ?>      
      </h2>
      <div class="d-flex align-items-center">
         <button class="c-slider-btn c-slider-btn--orange js-review-prev">
            <i class="fal fa-angle-left"></i>
         </button>
         <!-- reviews slider -->
         <div class="review-slider">
            <?php
            $services_post = new WP_Query( array( 
               'post_type' => 'reviews' 
               ) );

            while ( $services_post->have_posts() ) : 
               $services_post->the_post();
            ?>
            <div>
               <div class="c-review">
                  <span class="text">
                     <?php the_content() ?>
                  </span>
                  <div class="author">
                     <div class="avatar">
                        <img src="<?php echo get_the_post_thumbnail_url() ?>" alt="">
                     </div>
                     <div class="name">
                        <?php the_title() ?>
                     </div>
                  </div>
               </div>
            </div>
            <?php endwhile; wp_reset_query(); ?>
         </div>
         <button class="c-slider-btn c-slider-btn--blue js-review-next">
            <i class="fal fa-angle-right"></i>
         </button>
      </div>

   </div>
</section>

<!-- about us -->
<section class="sec-8 section section--about" id="about-us">
   <div class="container">
   <div class="c-about" style="background-image: url('<?php echo ROOT.'/public' ?>/img/design-your-own-house-in-modern-style-1.png')">
      <div class="inner">
         <div class="row ">
         <div class="col-sm-9 col-lg-5 ">
            <h3 class="title">
               <?php echo get_theme_mod('about-us-title') ?>            
            </h3>
         </div>
         </div>
         <div class="row justify-content-center justify-content-sm-between">
         <div class="col-sm-9 col-lg-5 mb-5">
            <p class="text">
               <?php echo get_theme_mod('about-us-text-1') ?>
            </p>
         </div>
         <div class="col-sm-9 col-lg-4 order-3 order-lg-2">
            <p class="text">
               <?php echo get_theme_mod('about-us-text-2') ?>
            </p>
         </div>
         <div class="col-4 col-sm-3 col-lg-2 order-2 order-lg-3 mb-5">
            <?php 
               $custom_logo_id = get_theme_mod( 'custom_logo' );
               $logo = wp_get_attachment_image_src( $custom_logo_id , 'full' );
               if ( has_custom_logo() ) {
               echo '<img src="'. esc_url( $logo[0] ) .'">';
               }
            ?>
         </div>
         </div>
      </div>
   </div>
   </div>
</section>

<!-- footer -->
<?php get_footer(); ?>