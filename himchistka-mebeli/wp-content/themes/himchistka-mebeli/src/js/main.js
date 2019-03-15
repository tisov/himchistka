// eslint-disable-next-line no-undef
(function ($) {
   let sportShop = {
      initialized: false,
      version: 1.0,
      mobile: false,
      $window: $(window),
      windowSize: null,
      init: function() {
         if (!this.initialized) {
            this.initialized = true;
         }
         else {
            return;
         }

         /* functions initialization */
         this.mobileMenu();
         this.cleaningOfferSlider();
         this.select();
         this.reviewSlider();
         this.localScroll();
         this.stickyNavbar();
         this.onlineCalc();
         this.photoCompare();
      },

      /* functions declaration */

      // get window width
      getWindowSize: () => {
         $(window).on('resize load', () => {
            this.windowSize = $(this).outerWidth();
         });
      },


      // malihu custom scrollbar
      scrollbar: () => {
         $('.js-scrollbar').mCustomScrollbar();
      },

      // custom select
      select: () => {
         $('.custom-select').customSelect({
            placeholder: '<span class="">Выбрать вид</span>',
            block: 'type-select',
            modifier: 'carpet-type--sm',
            includeValue: true
         });
      },

      // sticky navbar
      stickyNavbar: () => {
         let navbar = $('.l-navbar');

         $(window).on('scroll load', function () {
            if ($(this).scrollTop() > 100) {
               navbar.addClass('sticky');
            }
            else {
               navbar.removeClass('sticky');
            }
         });

      },

      // mobile menu
      mobileMenu: () => {
         let menuBtn = $('.c-mmenu-toggler'),
            bgOverlay = $('.bg-overlay'),
            menuContainer = $('.c-mmenu'),
            menuCloseBtn = $('.c-mmenu_close-btn'),
            desktopMenu = $('.c-nav-menu'),
            desktopMenuLinks = desktopMenu.find('>li > a'),
            mmenuList = menuContainer.find('.c-mmenu_list'),
            mmenuListItem = '<li class="c-mmenu_list-item"></li>',
            listItemCount = 0;

         // append links to mobile menu
         desktopMenuLinks.each(function () {
            let curLink = $(this).clone();

            curLink.attr('class', 'c-mmenu_nav-link');

            mmenuList.append(mmenuListItem)
               .children().eq(listItemCount++)
               .append(curLink);
         });

         menuBtn.on('click', function () {
            menuContainer.toggleClass('show');
            bgOverlay.addClass('show');
         });

         menuCloseBtn.on('click', function () {
            menuContainer.removeClass('show');
            bgOverlay.removeClass('show');

         });

         bgOverlay.on('click', function () {
            menuContainer.removeClass('show');
            bgOverlay.removeClass('show');
         });
      },

      // cleaning offer slider
      cleaningOfferSlider() {
         $('.cleaning-offer-slider').slick({
            slidesToShow: 1,
            dots: false,
            nextArrow: $('.c-slider-btn--blue'),
            prevArrow: $('.c-slider-btn--orange')
         });
      },

      // review slider
      reviewSlider() {
         $('.review-slider').slick({
            slidesToShow: 2,
            dots: false,
            nextArrow: $('.js-review-next'),
            prevArrow: $('.js-review-prev'),
            responsive: [
               {
                  breakpoint: 768,
                  settings: {
                     slidesToShow: 1
                  }
               }
            ]
         });
      },

      // Nav menus local scroll
      localScroll() {

         let headerMenu = $('.c-nav-menu');
         let headerMenuLinks = headerMenu.find('a');
         let footerMenu = $('footer .links');
         let footerMenuLinks = footerMenu.find('a');
         let serviceLinks = $('.cleaning-offer-slider').find('a');
         let otherLinks = $('.scroll, .scroll a').filter('a');
         
         headerMenuLinks.each(addHash);
         footerMenuLinks.each(addHash);

         headerMenu.on('click', 'a', localScrollInit);
         footerMenu.on('click', 'a', localScrollInit);
         serviceLinks.on('click', localScrollInit);
         otherLinks.on('click', localScrollInit);
         
         
         // add hash to links
         function addHash(){
            let new_attr = $(this).attr('href');

            new_attr = new_attr.replace(window.location.href, '#');
            if (new_attr.length <= 1) {
               new_attr += 'home';
            }
            new_attr = new_attr.replace('/', '');

            $(this).attr('href', new_attr);
         }

         // local scroll function
         function localScrollInit() {
            event.preventDefault();
            let $target = $(this).attr('href');
            let pos = 100;

            if ($target.indexOf('contacts') !== -1) {
               pos = 0;
            }
            if ($target.indexOf('price-calculate') !== -1) {
               pos = 150;
            }

            $('html').animate({
               scrollTop: $($target).offset().top - pos
            }, 1000);
            
         }
      },

      // online calc
      onlineCalc() {
         let parent = $('#price-calculate');
         let outInput = parent.find('.out-input');
         let typeSelectButtons = parent.find('.nav .c-btn');
         let optionSelect = parent.find('.custom-select');

         typeSelectButtons.on('click', function () {
            if ($(this).hasClass('active')) return;
            outInput.val('');
            
            optionSelect.each(function () {
               $(this).val('');
            }); 
            optionSelect.next().children('button').html('Выбрать вид');
         });


         parent.find('.custom-select').on('change', function () {
            let price = $(this).children('option:selected')
               .attr('data-price');
            let unitPriceHolder = parent.find('#price-per-unit input');

            outInput.val(price);
            unitPriceHolder.val(price);
            
         });

         $('.js-price-calc').on('click', function () {
            let parent = $(this).parent();
            let serviceType = $(this).parent().children('.tab-content')
               .children('.active').attr('id');
            let price = parent.find('.custom-select')
               .children('option:selected').attr('data-price');
            let square = parent.find('.square').val();
            let resInput = parent.find('.out-input');

            if (typeof price === 'undefined') return;

            if (serviceType == 'carpet') {              
               resInput.val(price * square);
            }
            
         });
      },

      // photo compare
      photoCompare() {
         let parent = $('.compare-wrap');
         let item2 = parent.find('.compare-item').eq(1);
         let slideControl = parent.find('.slider-control');
         let defaultWidth = 847.5;
         let items = parent.find('.compare-item');

         $(window).on('scroll load', function () {
            let parentWidth = parent.width();

            if (parentWidth < defaultWidth) {
               if ($(this).outerWidth() < 768) {
                  items.css('background-size', 'cover');
                  let size = (defaultWidth - parentWidth) * 0.2;
                  items.css('background-position', '-' + size + 'px 0px');

               }
               else {
                  let size = defaultWidth - parentWidth;
                  items.css('background-position', '-' + size + 'px 0px');
               }
            }
            else {
               let size = (parentWidth - defaultWidth) * 0.4;
               items.css('background-position', '-' + size + 'px 0px');
            }
         });

         parent.on('mousemove', function (e) {
            let moveX = e.clientX - $(this).offset().left;

            item2.css('width', moveX + 'px');
            slideControl.css('left', moveX + 'px');            
         });
      }
      

   };

   /* website functions init */
   sportShop.init();



   

   // eslint-disable-next-line no-undef
})(jQuery);

