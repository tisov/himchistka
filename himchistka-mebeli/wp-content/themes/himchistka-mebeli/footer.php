   <footer class="footer" id="contacts">
      <div class="c-footer">
         <div class="container">
            <div class="row">
               <div class="col-lg-7 bor-right d-flex mb-5 mb-lg-0 wp-group">
               <div class="c-widget-footer">
                  <div class="icon">
                     <i class="fal fa-map-marker-alt"></i>
                  </div>
                  <div class="info">
                     <h3 class="title">
                        <?php echo get_theme_mod('contacts-widget-title') ?>
                     </h3>
                     <div class="body">
                        <span>
                           <?php echo get_theme_mod('contacts-widget-contact-type') ?>
                        </span>
                        <a href="tel:87077887878" class="phone-num">
                           <?php echo get_theme_mod('contacts-widget-contact-num') ?>
                        </a>
                     </div>
                  </div>
               </div>
               <div class="c-widget-footer ml-auto ">
                  <div class="icon">
                     <i class="far fa-bars"></i>
                  </div>
                  <div class="info">
                     <h3 class="title">Навигационное меню</h3>
                     <div class="body">
                     <div class="links">
                        <?php wp_nav_menu([
                           'theme_location' => 'footer-menu-1',
                           'container' => false,
                           'menu_class' => 'links-list',
                        ]) ?>
                        <?php wp_nav_menu([
                           'theme_location' => 'footer-menu-2',
                           'container' => false,
                           'menu_class' => 'links-list',
                        ]) ?>
                     </div>
                     </div>
                  </div>
               </div>
               </div>
               <div class=" col-lg-5">
               <div class="c-widget-footer">
                  <div class="icon">
                     <i class="fal fa-question-circle"></i>
                  </div>
                  <div class="info">
                     <h3 class="title">
                        <?php echo get_theme_mod('contact-form-widget-title') ?>
                     </h3>
                     <div class="body">
                        <p class="mb-5">
                           <?php echo get_theme_mod('contact-form-widget-text') ?>
                        </p>
                        <?php echo do_shortcode('[happyforms id="83" /]') ?>
                     </div>
                     </div>
                  </div>
               </div>
            </div>
         </div>
      </div>
      <!-- copyright -->
      <div class="copyright-section">
         <div class="container">
            <div class="copyright scroll">
               <span class="text">
                  <?php echo get_theme_mod('copyright') ?>
               </span>
               <span class="date">
                  <?php echo get_theme_mod('copyright-date') ?>
               </span>
            </div>
         </div>
      </div>
   </footer>

   <!-- modal windows -->
   <!-- bg overlay -->
   <div class="bg-overlay"></div>
   <!-- mobile menu -->
   <nav class="c-mmenu">
      <div class="c-mmenu_head">
         <div class="c-mmenu_prev-btn"><i class="far fa-angle-left"></i></div>
         <div class="c-mmenu_menu-title"></div>
         <div class="c-mmenu_close-btn"><i class="far fa-times"></i></div>
      </div>
      <div class="c-mmenu_body">
         <ul class="c-mmenu_list">
   
         </ul>
      </div>
   </nav>
   <?php wp_footer(); ?>
</body>
</html>