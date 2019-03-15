<?php

// wp customize register
function himchistka_customize_register( $wp_customize ) {
   
   // CONTACTS CUSTOMIZER --------------------------------------
   // Header contacts 
   $wp_customize->add_section('contacts', [
      'title' => __('Контакты', 'himchistka'),

   ]);
   
   $wp_customize->add_setting('header-contact-icon', [
      'type' => 'theme_mod',
      'default' => '<i class="fab fa-whatsapp icon"></i>'
   ]);
   $wp_customize->add_setting('header-contact-type', [
      'type' => 'theme_mod',
      'default' => 'Написать WhatsApp:'
   ]);
   $wp_customize->add_setting('header-contact-1', [
      'type' => 'theme_mod',
      'default' => '8 (777) 777 77 77'
   ]);
   $wp_customize->add_setting('header-contact-2', [
      'type' => 'theme_mod',
      'default' => '8 7172 878 87 87'
   ]);
   
   $wp_customize->add_control('header-contact-icon', [
      'type' => 'input',
      'section' => 'contacts',
      'label' => __('Иконка ', 'himchistka'),
      'input_attrs' => [
         'style' => 'width:100%'
      ]
   ]);
   $wp_customize->add_control('header-contact-type', [
      'type' => 'input',
      'section' => 'contacts',
      'label' => __('Тип связи', 'himchistka'),
      'input_attrs' => [
         'style' => 'width:100%'
      ]
   ]);
   $wp_customize->add_control('header-contact-1', [
      'type' => 'input',
      'section' => 'contacts',
      'label' => __('Контакт 1', 'himchistka'),
      'input_attrs' => [
         'style' => 'width:100%'
      ]
   ]);
   $wp_customize->add_control('header-contact-2', [
      'type' => 'input',
      'section' => 'contacts',
      'label' => __('Контакт 2', 'himchistka'),
      'input_attrs' => [
         'style' => 'width:100%'
      ]
   ]);



   // SLOGAN CUSTOMIZER --------------------------------------

   $wp_customize->add_section('slogan', [
      'title' => __('Слоган сайта', 'himchistka'),

   ]);

   $wp_customize->add_setting('slogan', [
      'type' => 'theme_mod',
      'default' => 'Чистка мягкой мебели в Астане'
   ]);
   $wp_customize->add_setting('subtitle', [
      'type' => 'theme_mod',
      'default' => 'Закажите услугу чистки мягкой мебели, матрасов,
                     ковров, штор сейчас и получите 
                     индивидуальную скидку'
   ]);
   
   $wp_customize->add_control('slogan', [
      'type' => 'textarea',
      'section' => 'slogan',
      'label' => __('Заголовок', 'himchistka'),
      'input_attrs' => [
         'style' => 'width:100%'
      ]
   ]);
   $wp_customize->add_control('subtitle', [
      'type' => 'textarea',
      'section' => 'slogan',
      'label' => __('Подзаголовок', 'himchistka'),
      'input_attrs' => [
         'style' => 'width:100%'
      ]
   ]);

   // SITE HEADINGS CUSTOMIZER --------------------------------------
   // Our services
   $wp_customize->add_section('headings', [
      'title' => __('Заголовки', 'himchistka'),
   ]);

   $wp_customize->add_setting('service-title', [
      'type' => 'theme_mod',
      'default' => 'Мы предлагаем чистку'
   ]);
   
   $wp_customize->add_control('service-title', [
      'type' => 'input',
      'section' => 'headings',
      'label' => __('Заголовок секции Услуги', 'himchistka'),
      'input_attrs' => [
         'style' => 'width:100%'
      ]
   ]);

   // Advantages 
   $wp_customize->add_setting('advantages-title', [
      'type' => 'theme_mod',
      'default' => 'Преимущества'
   ]);
   
   $wp_customize->add_control('advantages-title', [
      'type' => 'input',
      'section' => 'headings',
      'label' => __('Заголовок секции Преимущества', 'himchistka'),
      'input_attrs' => [
         'style' => 'width:100%'
      ]
   ]);

   // Online calc
   $wp_customize->add_setting('online-calc-title', [
      'type' => 'theme_mod',
      'default' => 'Онлайн-калькулятор'
   ]);
   
   $wp_customize->add_control('online-calc-title', [
      'type' => 'input',
      'section' => 'headings',
      'label' => __('Заголовок секции Калькулятора', 'himchistka'),
      'input_attrs' => [
         'style' => 'width:100%'
      ]
   ]);

   // Our prices
   $wp_customize->add_setting('prices-title', [
      'type' => 'theme_mod',
      'default' => 'При заказе на сумму от'
   ]);
   
   $wp_customize->add_control('prices-title', [
      'type' => 'input',
      'section' => 'headings',
      'label' => __('Заголовок секции Скидки', 'himchistka'),
      'input_attrs' => [
         'style' => 'width:100%'
      ]
   ]);

   // Suppliers
   $wp_customize->add_setting('suppliers-title', [
      'type' => 'theme_mod',
      'default' => 'ПОСТАВЩИКИ'
   ]);
   
   $wp_customize->add_control('suppliers-title', [
      'type' => 'input',
      'section' => 'headings',
      'label' => __('Заголовок секции поставщики', 'himchistka'),
      'input_attrs' => [
         'style' => 'width:100%'
      ]
   ]);

   // Our works
   $wp_customize->add_setting('our-works-title', [
      'type' => 'theme_mod',
      'default' => 'НАШИ РАБОТЫ'
   ]);
   
   $wp_customize->add_control('our-works-title', [
      'type' => 'input',
      'section' => 'headings',
      'label' => __('Заголовок секции Работы', 'himchistka'),
      'input_attrs' => [
         'style' => 'width:100%'
      ]
   ]);

   // Our reviews
   $wp_customize->add_setting('reviews-title', [
      'type' => 'theme_mod',
      'default' => 'Отзывы о нас'
   ]);
   
   $wp_customize->add_control('reviews-title', [
      'type' => 'input',
      'section' => 'headings',
      'label' => __('Заголовок секции Отзывы', 'himchistka'),
      'input_attrs' => [
         'style' => 'width:100%'
      ]
   ]);

   // About Us
   $wp_customize->add_setting('about-us-title', [
      'type' => 'theme_mod',
      'default' => 'Чистка мягкой мебели в Астане'
   ]);
   
   $wp_customize->add_control('about-us-title', [
      'type' => 'input',
      'section' => 'headings',
      'label' => __('Заголовок секции О нас', 'himchistka'),
      'input_attrs' => [
         'style' => 'width:100%'
      ]
   ]);

   // ADVANTAGES CUSTOMIZER --------------------------------------
   // Advantages 1
   $wp_customize->add_section('advantages', [
      'title' => __('Преимущества', 'himchistka'),

   ]);

   $wp_customize->add_setting('advantages-1-text', [
      'type' => 'theme_mod',
      'default' => 'Бесплатный выезд специалиста прямо к Вам домой!'
   ]);
   $wp_customize->add_setting('advantages-1-thumb', [
      'type' => 'theme_mod',
      'default' => '',
      'capability' => 'edit_theme_options'
   ]);
   
   $wp_customize->add_control( new WP_Customize_Media_Control( $wp_customize, 'advantages-1-thumb', array(
      'label' => __( 'Иконка преимуществ 1', 'himchistka' ),
      'section' => 'advantages',
      'mime_type' => 'image',
   )));

   $wp_customize->add_control('advantages-1-text', [
      'type' => 'textarea',
      'section' => 'advantages',
      'label' => __('Текст преимуществ 1', 'himchistka'),
      'input_attrs' => [
         'style' => 'width:100%'
      ]
   ]);

   // Advantages 2
   $wp_customize->add_setting('advantages-2-text', [
      'type' => 'theme_mod',
      'default' => 'Бесплатный выезд специалиста прямо к Вам домой!'
   ]);
   $wp_customize->add_setting('advantages-2-thumb', [
      'type' => 'theme_mod',
      'default' => '',
      'capability' => 'edit_theme_options'
   ]);
   
   $wp_customize->add_control( new WP_Customize_Media_Control( $wp_customize, 'advantages-2-thumb', array(
      'label' => __( 'Иконка преимуществ 2', 'himchistka' ),
      'section' => 'advantages',
      'mime_type' => 'image',
   )));

   $wp_customize->add_control('advantages-2-text', [
      'type' => 'textarea',
      'section' => 'advantages',
      'label' => __('Текст преимуществ 2', 'himchistka'),
      'input_attrs' => [
         'style' => 'width:100%'
      ]
   ]);

   // Advantages 3
   $wp_customize->add_setting('advantages-3-text', [
      'type' => 'theme_mod',
      'default' => 'Бесплатный выезд специалиста прямо к Вам домой!'
   ]);
   $wp_customize->add_setting('advantages-3-thumb', [
      'type' => 'theme_mod',
      'default' => '',
      'capability' => 'edit_theme_options'
   ]);
   
   $wp_customize->add_control( new WP_Customize_Media_Control( $wp_customize, 'advantages-3-thumb', array(
      'label' => __( 'Иконка преимуществ 3', 'himchistka' ),
      'section' => 'advantages',
      'mime_type' => 'image'
   )));

   $wp_customize->add_control('advantages-3-text', [
      'type' => 'textarea',
      'section' => 'advantages',
      'label' => __('Текст преимуществ 3', 'himchistka'),
      'input_attrs' => [
         'style' => 'width:100%'
      ]
   ]);
   
   // Advantages 4
   $wp_customize->add_setting('advantages-4-text', [
      'type' => 'theme_mod',
      'default' => 'Бесплатный выезд специалиста прямо к Вам домой!'
   ]);
   $wp_customize->add_setting('advantages-4-thumb', [
      'type' => 'theme_mod',
      'default' => '',
      'capability' => 'edit_theme_options'
   ]);
   
   $wp_customize->add_control( new WP_Customize_Media_Control( $wp_customize, 'advantages-4-thumb', array(
      'label' => __( 'Иконка преимуществ 4', 'himchistka' ),
      'section' => 'advantages',
      'mime_type' => 'image'
   )));

   $wp_customize->add_control('advantages-4-text', [
      'type' => 'textarea',
      'section' => 'advantages',
      'label' => __('Текст преимуществ 4', 'himchistka'),
      'input_attrs' => [
         'style' => 'width:100%'
      ]
   ]);

   // Advantages 5
   $wp_customize->add_setting('advantages-5-text', [
      'type' => 'theme_mod',
      'default' => 'Бесплатный выезд специалиста прямо к Вам домой!'
   ]);
   $wp_customize->add_setting('advantages-5-thumb', [
      'type' => 'theme_mod',
      'default' => '',
      'capability' => 'edit_theme_options'
   ]);
   
   $wp_customize->add_control( new WP_Customize_Media_Control( $wp_customize, 'advantages-5-thumb', array(
      'label' => __( 'Иконка преимуществ 5', 'himchistka' ),
      'section' => 'advantages',
      'mime_type' => 'image',
   )));

   $wp_customize->add_control('advantages-5-text', [
      'type' => 'textarea',
      'section' => 'advantages',
      'label' => __('Текст преимуществ 5', 'himchistka'),
      'input_attrs' => [
         'style' => 'width:100%'
      ]
   ]);

   // Advantages 6
   $wp_customize->add_setting('advantages-6-text', [
      'type' => 'theme_mod',
      'default' => 'Бесплатный выезд специалиста прямо к Вам домой!'
   ]);
   $wp_customize->add_setting('advantages-6-thumb', [
      'type' => 'theme_mod',
      'default' => '',
      'capability' => 'edit_theme_options'
   ]);
   
   $wp_customize->add_control( new WP_Customize_Media_Control( $wp_customize, 'advantages-6-thumb', array(
      'label' => __( 'Иконка преимуществ 6', 'himchistka' ),
      'section' => 'advantages',
      'mime_type' => 'image',
   )));

   $wp_customize->add_control('advantages-6-text', [
      'type' => 'textarea',
      'section' => 'advantages',
      'label' => __('Текст преимуществ 6', 'himchistka'),
      'input_attrs' => [
         'style' => 'width:100%'
      ]
   ]);

   // PRICES/SALES CUSTOMIZER --------------------------------------
   // Price 1
   $wp_customize->add_section('prices', [
      'title' => __('Скидки', 'himchistka'),
   ]);

   // price 1
   $wp_customize->add_setting('price-1', [
      'type' => 'theme_mod',
      'default' => '10000 тенге скидка 10%'
   ]);

   $wp_customize->add_control('price-1', [
      'type' => 'input',
      'section' => 'prices',
      'label' => __('Cкидка 1', 'himchistka'),
      'input_attrs' => [
         'style' => 'width:100%'
      ]
   ]);

   // price 2
   $wp_customize->add_setting('price-2', [
      'type' => 'theme_mod',
      'default' => '15 000 тенге скидка 15%'
   ]);

   $wp_customize->add_control('price-2', [
      'type' => 'input',
      'section' => 'prices',
      'label' => __('Cкидка 2', 'himchistka'),
      'input_attrs' => [
         'style' => 'width:100%'
      ]
   ]);

   // price 3
   $wp_customize->add_setting('price-3', [
      'type' => 'theme_mod',
      'default' => '20 000 тенге скидка 20%'
   ]);

   $wp_customize->add_control('price-3', [
      'type' => 'input',
      'section' => 'prices',
      'label' => __('Cкидка 3', 'himchistka'),
      'input_attrs' => [
         'style' => 'width:100%'
      ]
   ]);

   // COPYRIGHTS CUSTOMIZER --------------------------------------
   // Copright
   $wp_customize->add_section('copyright', [
      'title' => __('Копирайты', 'himchistka'),
   ]);

   $wp_customize->add_setting('copyright', [
      'type' => 'theme_mod',
      'default' => '<a href="#home">Creative team</a> - Создание и продвижение сайтов'
   ]);

   $wp_customize->add_control('copyright', [
      'type' => 'textarea',
      'section' => 'copyright',
      'label' => __('Копирайт', 'himchistka'),
      'input_attrs' => [
         'style' => 'width:100%'
      ]
   ]);

   $wp_customize->add_setting('copyright-date', [
      'type' => 'theme_mod',
      'default' => '2019'
   ]);

   $wp_customize->add_control('copyright-date', [
      'type' => 'input',
      'section' => 'copyright',
      'label' => __('Дата', 'himchistka'),
      'input_attrs' => [
         'style' => 'width:100%'
      ]
   ]);

   // SUPPLIERS CUSTOMIZER --------------------------------------
   // Suppliers 1
   $wp_customize->add_section('suppliers', [
      'title' => __('Поставщики', 'himchistka'),
   ]);

   $wp_customize->add_setting('supplier-1', [
      'type' => 'theme_mod',
      'default' => ''
   ]);

   $wp_customize->add_control( new WP_Customize_Media_Control( $wp_customize, 'supplier-1', array(
      'label' => __( 'Поставщик 1', 'himchistka' ),
      'section' => 'suppliers',
      'mime_type' => 'image',
   )));

   // Suppliers 2
   $wp_customize->add_setting('supplier-2', [
      'type' => 'theme_mod',
      'default' => ''
   ]);

   $wp_customize->add_control( new WP_Customize_Media_Control( $wp_customize, 'supplier-2', array(
      'label' => __( 'Поставщик 2', 'himchistka' ),
      'section' => 'suppliers',
      'mime_type' => 'image',
   )));

   // Suppliers 3
   $wp_customize->add_setting('supplier-3', [
      'type' => 'theme_mod',
      'default' => ''
   ]);

   $wp_customize->add_control( new WP_Customize_Media_Control( $wp_customize, 'supplier-3', array(
      'label' => __( 'Поставщик 3', 'himchistka' ),
      'section' => 'suppliers',
      'mime_type' => 'image',
   )));

   // Suppliers 4
   $wp_customize->add_setting('supplier-4', [
      'type' => 'theme_mod',
      'default' => ''
   ]);

   $wp_customize->add_control( new WP_Customize_Media_Control( $wp_customize, 'supplier-4', array(
      'label' => __( 'Поставщик 4', 'himchistka' ),
      'section' => 'suppliers',
      'mime_type' => 'image',
   )));

   // Suppliers 5
   $wp_customize->add_setting('supplier-5', [
      'type' => 'theme_mod',
      'default' => ''
   ]);

   $wp_customize->add_control( new WP_Customize_Media_Control( $wp_customize, 'supplier-5', array(
      'label' => __( 'Поставщик 5', 'himchistka' ),
      'section' => 'suppliers',
      'mime_type' => 'image',
   )));

   // Suppliers 6
   $wp_customize->add_setting('supplier-6', [
      'type' => 'theme_mod',
      'default' => ''
   ]);

   $wp_customize->add_control( new WP_Customize_Media_Control( $wp_customize, 'supplier-6', array(
      'label' => __( 'Поставщик 6', 'himchistka' ),
      'section' => 'suppliers',
      'mime_type' => 'image',
   )));

   // Suppliers 7
   $wp_customize->add_setting('supplier-7', [
      'type' => 'theme_mod',
      'default' => ''
   ]);

   $wp_customize->add_control( new WP_Customize_Media_Control( $wp_customize, 'supplier-7', array(
      'label' => __( 'Поставщик 7', 'himchistka' ),
      'section' => 'suppliers',
      'mime_type' => 'image',
   )));


   // ABOUT US CUSTOMIZER --------------------------------------
   // About us text 1
   $wp_customize->add_section('about-us', [
      'title' => __('О нас', 'himchistka'),
   ]);

   $wp_customize->add_setting('about-us-text-1', [
      'type' => 'theme_mod',
      'default' => ''
   ]);

   $wp_customize->add_control('about-us-text-1', [
      'type' => 'textarea',
      'section' => 'about-us',
      'label' => __('О нас текст 1', 'himchistka'),
      'input_attrs' => [
         'style' => 'width:100%'
      ]
   ]);

   // About us text 2
   $wp_customize->add_setting('about-us-text-2', [
      'type' => 'theme_mod',
      'default' => ''
   ]);

   $wp_customize->add_control('about-us-text-2', [
      'type' => 'textarea',
      'section' => 'about-us',
      'label' => __('О нас текст 2', 'himchistka'),
      'input_attrs' => [
         'style' => 'width:100%'
      ]
   ]);


   // FOOTER WIDGETS CUSTOMIZER --------------------------------------
   // Contacts widget
   $wp_customize->add_section('footer-widgets', [
      'title' => __('Футер виджеты', 'himchistka'),
   ]);

   $wp_customize->add_setting('contacts-widget-title', [
      'type' => 'theme_mod',
      'default' => 'Контакты'
   ]);

   $wp_customize->add_control('contacts-widget-title', [
      'type' => 'input',
      'section' => 'footer-widgets',
      'label' => __('Заголовок виджет контакты', 'himchistka'),
      'input_attrs' => [
         'style' => 'width:100%'
      ]
   ]);

   $wp_customize->add_setting('contacts-widget-contact-type', [
      'type' => 'theme_mod',
      'default' => 'WhatsApp:'
   ]);

   $wp_customize->add_control('contacts-widget-contact-type', [
      'type' => 'input',
      'section' => 'footer-widgets',
      'label' => __('Тип контакта', 'himchistka'),
      'input_attrs' => [
         'style' => 'width:100%'
      ]
   ]);

   $wp_customize->add_setting('contacts-widget-contact-num', [
      'type' => 'theme_mod',
      'default' => '8 707 788 78 78'
   ]);

   $wp_customize->add_control('contacts-widget-contact-num', [
      'type' => 'input',
      'section' => 'footer-widgets',
      'label' => __('Номер', 'himchistka'),
      'input_attrs' => [
         'style' => 'width:100%'
      ]
   ]);

   // Contact form widget
   $wp_customize->add_setting('contact-form-widget-title', [
      'type' => 'theme_mod',
      'default' => 'Остались вопросы?'
   ]);

   $wp_customize->add_control('contact-form-widget-title', [
      'type' => 'input',
      'section' => 'footer-widgets',
      'label' => __('Заголовок формы', 'himchistka'),
      'input_attrs' => [
         'style' => 'width:100%'
      ]
   ]);

   $wp_customize->add_setting('contact-form-widget-text', [
      'type' => 'theme_mod',
      'default' => 'Оставьте вашу заявку и наши менеджера ответят на ВСЕ Ваши вопросы!'
   ]);

   $wp_customize->add_control('contact-form-widget-text', [
      'type' => 'textarea',
      'section' => 'footer-widgets',
      'label' => __('Текст формы обратной связи', 'himchistka'),
      'input_attrs' => [
         'style' => 'width:100%'
      ]
   ]);

   // OUR WORKS CUSTOMIZER --------------------------------------
   // our works small images
   $wp_customize->add_section('our-works', [
      'title' => __('Наши работы', 'himchistka'),
   ]);

   // compare images - img 1
   $wp_customize->add_setting('our-work-compare-img-1', [
      'type' => 'theme_mod',
      'default' => ''
   ]);

   $wp_customize->add_control( new WP_Customize_Cropped_Image_Control( $wp_customize, 'our-work-compare-img-1', array(
      'label' => __( 'Изображение для сравнении До', 'himchistka' ),
      'description' => __('Рекомендуемый размер изображения - 970x400 px'),
      'section' => 'our-works',
      'height' => 400,
      'width' => 970,
      'flex_width ' => false,
      'flex_height ' => false,
   )));

   // compare images - img 2
   $wp_customize->add_setting('our-work-compare-img-2', [
      'type' => 'theme_mod',
      'default' => ''
   ]);

   $wp_customize->add_control( new WP_Customize_Cropped_Image_Control( $wp_customize, 'our-work-compare-img-2', array(
      'label' => __( 'Изображение для сравнении После', 'himchistka' ),
      'description' => __('Рекомендуемый размер изображения - 970x400 px'),
      'section' => 'our-works',
      'height' => 400,
      'width' => 970,
      'flex_width ' => false,
      'flex_height ' => false,
   )));

   // image small 1
   $wp_customize->add_setting('our-work-img-1', [
      'type' => 'theme_mod',
      'default' => ''
   ]);

   $wp_customize->add_control( new WP_Customize_Media_Control( $wp_customize, 'our-work-img-1', array(
      'label' => __( 'Изображение работы 1', 'himchistka' ),
      'section' => 'our-works',
      'mime_type' => 'image',
   )));

   // image small 2
   $wp_customize->add_setting('our-work-img-2', [
      'type' => 'theme_mod',
      'default' => ''
   ]);

   $wp_customize->add_control( new WP_Customize_Media_Control( $wp_customize, 'our-work-img-2', array(
      'label' => __( 'Изображение работы 2', 'himchistka' ),
      'section' => 'our-works',
      'mime_type' => 'image',
   )));

   // image small 3
   $wp_customize->add_setting('our-work-img-3', [
      'type' => 'theme_mod',
      'default' => ''
   ]);

   $wp_customize->add_control( new WP_Customize_Media_Control( $wp_customize, 'our-work-img-3', array(
      'label' => __( 'Изображение работы 3', 'himchistka' ),
      'section' => 'our-works',
      'mime_type' => 'image',
   )));

   // image small 4
   $wp_customize->add_setting('our-work-img-4', [
      'type' => 'theme_mod',
      'default' => ''
   ]);

   $wp_customize->add_control( new WP_Customize_Media_Control( $wp_customize, 'our-work-img-4', array(
      'label' => __( 'Изображение работы 4', 'himchistka' ),
      'section' => 'our-works',
      'mime_type' => 'image',
   )));
}
add_action( 'customize_register', 'himchistka_customize_register' );