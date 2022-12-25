<?php
//$data_h       = unserialize($_COOKIE['like_product']);

global $woocommerce;
$sayt_url =  site_url();

$args = array(

       'taxonomy'     => 'product_cat',

       'orderby'      => 'name',

       'show_count'   => 0,

       'pad_counts'   => 0,

       'hierarchical' => 1,

       'title_li'     => '',

       'hide_empty'   => 0

);

$all_categories = get_categories( $args );

// echo "<pre>";

// print_r($all_categories);die;
$argssub =  get_terms( 'product_cat', array(

    'child_of'     => 0,

    'taxonomy'     => 'product_cat',

    'orderby'      => 'id',

    'order'        =>'asc',

    'show_count'   => 0,

    'pad_counts'   => 0,

    'hierarchical' => 1,

    'title_li'     => '',

    'hide_empty'   => 0

));

foreach(  $argssub as $prod_cat ) {

    // echo "<pre>";

    // print_r($prod_cat);

}?>

<!DOCTYPE html>

 <!--JustCode Development Company - https://justcodedigital.com/-->

<html lang="ru">

<head>

    <title><?php echo wp_get_document_title(); ?></title>

    <meta charset="UTF-8">

    <meta http-equiv="imagetoolbar" content="no" />

    <meta name="format-detection" content="telephone=no">

    <link rel="stylesheet" href="https://unpkg.com/swiper/swiper-bundle.min.css"/>

    <link rel="stylesheet" href="<?php echo get_template_directory_uri(); ?>/css/style.min.css">

    <!--<link rel="shortcut icon" href="favicon.ico">-->

    <!-- <meta name="robots" content="noindex, nofollow"> -->

    <!-- <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0"> -->

    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/ion-rangeslider/2.3.1/css/ion.rangeSlider.min.css"/>
    <!-- <link rel="stylesheet" href="/fancybox/jquery.fancybox-1.3.4.css" type="text/css" media="screen" /> -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/fancybox/3.5.7/jquery.fancybox.min.css">    <script src="https://unpkg.com/swiper/swiper-bundle.min.js"></script>

    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/ion-rangeslider/2.3.1/js/ion.rangeSlider.min.js"></script>

    <!-- <script type="text/javascript" src="/fancybox/jquery.mousewheel-3.0.4.pack.js"></script> -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/fancybox/3.5.7/jquery.fancybox.min.js"></script>
    <script src="https://api-maps.yandex.ru/2.1/?apikey=a915e9ef-8441-44d0-8e3b-c12798f673df API-ключ&lang=ru_RU" type="text/javascript"> </script>
    <script type="text/javascript">
    // Функция ymaps.ready() будет вызвана, когда
    // загрузятся все компоненты API, а также когда будет готово DOM-дерево.
    ymaps.ready(init);
    function init(){
        // Создание карты.
        var myMap = new ymaps.Map("map", {
             // Своё изображение иконки метки.
            iconImageHref: '<?php echo bloginfo("template_url"); ?>/img/logo-dark.png', // Адрес до картинки
            // Размеры метки.
             iconImageSize: [60, 84],
            // Смещение левого верхнего угла иконки относительно
            // её "ножки" (точки привязки).
            iconImageOffset: [-5, -38],
            // Координаты центра карты.
            // Порядок по умолчанию: «широта, долгота».
            // Чтобы не определять координаты центра карты вручную,
            // воспользуйтесь инструментом Определение координат.
            center: [56.283237, 43.995262],
            // Уровень масштабирования. Допустимые значения:
            // от 0 (весь мир) до 19.
            zoom: 17
        },{
            searchControlProvider: 'yandex#search'
        });
		var myGeoObject = new ymaps.GeoObject({
			geometry: {
				type: "Point", // тип геометрии - точка
				coordinates: [56.283237, 43.995262] // координаты точки
			}
		});

		// Размещение геообъекта на карте.
		myMap.geoObjects.add(myGeoObject); 
    }
</script>

    <script type="text/javascript">

       var ajaxUrl = "<?php  echo esc_url( admin_url('admin-ajax.php')); ?>"

    </script>
<script type="text/javascript">
	$("[data-fancybox]").fancybox({
        image : {
		protect: true
	}
	});    $("#testimg").fancybox({
		'hideOnContentClick': true
	});s
</script>
   

</head>

 <?php wp_head(); ?>

<body> 

<div class="wrapper">

    <header class="header">

        <div class="header__container">

            <div class="header__inner">

                <div class="header__top top-header">
                    <div class="top-header__container _container">

                        <div class="top-header__inner">

                            <div class="top-header__left top-left-header">

                                <button class='burger'>

                                    <span class='burger__line'></span>

                                </button>

                                <div class="top-left-header__social">

                                    <a  class="_icon-loc"><?= get_field('adres', 22)?></a>

                                    <a href="<?= get_field('instagram', 22)?>" class="_icon-insta-header">Мы в instagram</a>

                                </div>

                                <div class="top-left-header__menu">

                                    <p class="_icon-catalog">Каталог</p>

                                    <a href="/about/">О компании</a>

                                    <a href="/payment-page/">Оплата</a>

                                    <a href="/delivery/">Доставка</a>

                                    <a href="/contact/">Контакты</a>

                                </div>

                            </div>

                            <a href="/" class="top-header__middle">

                                <img src="<?php echo bloginfo("template_url"); ?>/img/logo-dark.png" alt="">

                            </a>

                            <div class="top-header__right top-right-header">

                                <div class="top-right-header__contact">

                                    <a  class="_icon-phone _open-modal-feedback" id="myBtn">Обратный звонок</a>

                                    <ul>

                                        <li>

                                            <a href="tel:<?= get_field('tel1', 22)?>"><?= get_field('tel1', 22)?></a>

                                        </li>

                                        <li>

                                            <a href="tel:<?= get_field('tel2', 22)?>"><?= get_field('tel2', 22)?></a>

                                        </li>

                                    </ul>

                                </div>

                                <div class="top-right-header__search">

                                    <div class="top-right-header__search-input _icon-search">

                                        <input autocomplete="off" type="text" name="form[]" data-error="Ошибка" data-value="Поиск" class="input search_input">

                                    </div>
                                    <button type="button" class="_icon-search _open-search"></button>

                                    <button> <a href="/like/" class="_icon-fav"></a></button>

                                    <button type="button" class="_icon-cart _icon-cart_count"><input type="hidden" value="<?php echo WC()->cart->get_cart_contents_count(); ?>" class="cart_count_button_header"> </button>

                                </div>

                            </div>

                        </div>

                    </div>
                    <div class="header__menu menu-header header-menu">

                        <div class="menu-header__container _container">

                            <div class="header-menu__cont">

                                <div class="header-menu__top">

                                    <div class="header-menu__adress" data-da=".header-menu__bottom,480,last">

                                        <p class="_icon-loc">г.Нижний Новгород ул.Нартова д.6 к.2</p>

                                    </div>

                                    <div class="header-menu__social" data-da=".header-menu__bottom,900,first">

                                        <a href="https://www.instagram.com/" class="_icon-insta">Мы в instagram</a>

                                        <a href="#" class="_icon-phone _open-modal-feedback">Обратный звонок</a>

                                    </div>

                                </div>

                                <div class="header-menu__bottom">

                                    <div class="header-menu__nav">

                                        <a href="#" class="header-menu__nav-link header-menu__nav-catalogBtn _icon-catalog">Каталог</a>

                                        <a href="/about/" class="header-menu__nav-link">О компании</a>

                                        <a href="/payment-page/" class="header-menu__nav-link">Оплата</a>

                                        <a href="/delivery/" class="header-menu__nav-link">Доставка</a>

                                        <a href="/contact/" class="header-menu__nav-link">Контакты</a>

                                    </div>

                                    <div class="header-menu__numbers" data-da=".header-menu__top,900,last">

                                        <a href="#">+7 (999) 141 - 96 - 57</a>

                                        <a href="#">+7 (831) 291 - 52 - 17</a>

                                    </div>

                                </div>

                            </div>

                            <div class="menu-header__inner" data-da=".header-menu__bottom,480,last">

                                <div class="menu-header__left">

                                    <div class="menu-header__col">

                                        <p class="menu-header__title">Категории</p>

                                        <ul data-spollers="0,min" class="menu-header__list">
                                              <?php foreach(   category_dom() as $prod_cat ) : ?>

                                                        

                                                     <?php $room  = get_field("room", 'product_cat_'.$prod_cat->term_id);?>

                                                         

                                                      <?php //if(!isset($room) ):  ?>

                                                      

                                                            <?php if(empty($prod_cat->sub_categories) ):  ?>

                                                             

                                                                  <li class="menu-header__item">

                                                                  

                                                                         <a href=" <?php echo get_term_link($prod_cat->slug, 'product_cat')?>" class="menu-header__link"><?php echo $prod_cat->name ?></a>

                                                                        

                                                                  </li>

                                                            <?php else:  ?>

                                                            

                                                                 <li class="menu-header__item">

                                                

                                                                    <button data-spoller type="button" class="menu-header__link menu-header__link-spoller _icon-arrow-right"><?php echo $prod_cat->name ?></button>

                                                                        <ul>

                                                                            <?php foreach($prod_cat->sub_categories as $sub_cat ) : ?>

                                                                                <li>

                                                                                    <a href="<?php echo get_term_link($sub_cat->slug, 'product_cat')?>"><?php echo $sub_cat->name ?></a>

                                                                                </li>

                                                                            <?php endforeach;?>

                                                                        </ul>

                                                                 </li>
                                                            <?php endif;?>

                                                  

                                                <?php  //endif;?>

                                                    

                                          <?php endforeach;?>

                                          

                                           <?php  wp_reset_query(); ?>
                                            
                                           
                                 

                                        </ul>

                                    </div>                                    <div class="menu-header__col">

                                        <p class="menu-header__title">Комнаты</p>

                                        <ul class="menu-header__list">
                                         <?php 

                                           foreach(  $argssub as $prod_cat ) :

                                             $room =    $prod_cat->description;

                                             

                                             if($prod_cat->parent == 0 && $room == "комната"):

                                         ?>

                                                  <li class="menu-header__item">

                                                         <a href=" <?php echo get_term_link($prod_cat->slug, 'product_cat')?>" class="menu-header__link"><?php echo $prod_cat->name ?></a>

                                                  </li>
                           

                                             <?php

                                         

                                              endif;

                                            endforeach;

                                             wp_reset_query();

                                            ?>
                                      

                                        </ul>

                                    </div>                                    <div class="menu-header__col">

                                        <p class="menu-header__title">Коллекции</p>

                                        <ul class="menu-header__list">

                                            <li class="menu-header__item">

                                                <a href="/collection-1/" class="menu-header__link">Коллекция 1</a>

                                            </li>

                                            <li class="menu-header__item">

                                                <a href="/collection-2/" class="menu-header__link">Коллекция 2</a>

                                            </li>

                                        </ul>

                                    </div>                                    <div class="menu-header__col">

                                        <p class="menu-header__title">Дополнительно</p>

                                        <ul class="menu-header__list">

                                            <li class="menu-header__item">

                                                <a href="http://goldfinchwood.u1246912.cp.regruhosting.ru/catalog/?sort=2" class="menu-header__link">Новинки</a>

                                            </li>

                                            <li class="menu-header__item">

                                                <a href="" class="menu-header__link">Акции</a>

                                            </li>

                                            <li class="menu-header__item">

                                                <a href="" class="menu-header__link">Распродажи</a>

                                            </li>

                                            <li class="menu-header__item">

                                                <a href="http://goldfinchwood.u1246912.cp.regruhosting.ru/catalog/?sort=1" class="menu-header__link">В наличии</a>

                                            </li>

                                        </ul>

                                    </div>                                </div>

                                <div class="menu-header__right">

                                    <img src="<?php echo bloginfo("template_url"); ?>/img/photoinkatalog.jpg" alt="">
                                    <div class="menu-header__right_collection_block">
                                        <p class="menu-header__right_collection_text" style="    font-size: 22px; color: black;     margin-bottom: 15px;">Встречайте новые коллекции!</p>
                                        <a href="/collection-1/" class="menu-header__right_collection_href">Перейти</a>
                                    </div>

                                </div>

                            </div>

                        </div>

                    </div>
                    <div class="header__cart-popup popup-cart _container">

                        <div class="popup-cart__inner">
                            <div class="popup-cart__top">

                                <div class="popup-cart__title">

                                    <p>Корзина</p>

                                </div>

                                <div class="popup-cart__clean">

                                    <button type="button">

                                        <p>Очистить корзину</p>

                                        <svg width="15" height="15" viewBox="0 0 15 15" fill="none" xmlns="http://www.w3.org/2000/svg">

                                            <path d="M9.79822 10.5643C10.0098 10.7758 10.3527 10.7758 10.5643 10.5643C10.7758 10.3527 10.7758 10.0098 10.5643 9.79822L8.26616 7.50013L10.5643 5.20204C10.7758 4.9905 10.7758 4.64754 10.5643 4.43601C10.3527 4.22447 10.0098 4.22447 9.79822 4.43601L7.50013 6.7341L5.20203 4.43599C4.99049 4.22446 4.64753 4.22446 4.43599 4.43599C4.22446 4.64753 4.22446 4.99049 4.43599 5.20203L6.7341 7.50013L4.43599 9.79823C4.22446 10.0098 4.22446 10.3527 4.43599 10.5643C4.64753 10.7758 4.99049 10.7758 5.20203 10.5643L7.50013 8.26616L9.79822 10.5643Z" fill="#999999"/>

                                        </svg>

                                    </button>

                                </div>

                            </div>
                            <div class="popup-cart__items">
                                

                                <?php

                                        foreach ( WC()->cart->get_cart() as $cart_item_key => $cart_item ) :

                                            $_product   = apply_filters( 'woocommerce_cart_item_product', $cart_item['data'], $cart_item, $cart_item_key );
                                            $product_id = apply_filters( 'woocommerce_cart_item_product_id', $cart_item['product_id'], $cart_item, $cart_item_key );

                                                //$_product =  wc_get_product( $cart_item['data']->get_id() );

                                            //  echo "<pre>";

                                             // print_r($product_id);

                                            if ( $_product && $_product->exists() && $cart_item['quantity'] > 0 && apply_filters( 'woocommerce_cart_item_visible', true, $cart_item, $cart_item_key ) ) {

                                                $product_permalink   = apply_filters( 'woocommerce_cart_item_permalink', $_product->is_visible() ? $_product->get_permalink( $cart_item ) : '', $cart_item, $cart_item_key );

                                                global $woocommerce;

                                                $total_product_price = $woocommerce->cart->get_cart_total();

                                                $price = explode('₽', $total_product_price); 

                                                

                                       ?>
                                      <div class="popup-cart__item item-popup-cart">

                                    <div class="item-popup-cart__img">

                                        <?php

                                            $size = array(
                                                'width' => 150,
                                                'height' => 150,
                                                'crop' => 0,
                                            );
                                                 $thumbnail = apply_filters( 'woocommerce_cart_item_thumbnail', $_product->get_image(), $cart_item, $cart_item_key );
                                                            ?>
                                                <?php
                                                    if ( ! $product_permalink ) {

                                                        

                                                        echo $thumbnail; // PHPCS: XSS ok.

                                                    } else {

                                                        printf( '<a href="%s">%s</a>', esc_url( $product_permalink ), $thumbnail ); // PHPCS: XSS ok.

                                                    }

                                                ?> 

                                    </div>

                                    <div class="item-popup-cart__info">

                                        <div class="item-popup-cart__info-top">

                                            <div class="item-popup-cart__title">

                                                <p>

                                                    

                                                     <?php

                                                            if ( ! $product_permalink ) {

                                                                echo wp_kses_post( apply_filters( 'woocommerce_cart_item_name', $_product->get_name(), $cart_item, $cart_item_key ) . '&nbsp;' );

                                                            } else {

                                                                echo wp_kses_post( apply_filters( 'woocommerce_cart_item_name', sprintf( '<a class="ordering_details_products_link" href="%s">%s</a>', esc_url( $product_permalink ), $_product->get_name() ), $cart_item, $cart_item_key ) );

                                                            }
                                                            do_action( 'woocommerce_after_cart_item_name', $cart_item, $cart_item_key );
                                                            // Meta data.

                                                            echo wc_get_formatted_cart_item_data( $cart_item ); // PHPCS: XSS ok.
                                                            // Backorder notification.

                                                            if ( $_product->backorders_require_notification() && $_product->is_on_backorder( $cart_item['quantity'] ) ) {

                                                                echo wp_kses_post( apply_filters( 'woocommerce_cart_item_backorder_notification', '<p class="backorder_notification">' . esc_html__( 'Available on backorder', 'woocommerce' ) . '</p>', $product_id ) );

                                                            }

                                                        ?>

                                                </p>

                                            </div>

                                            <div class="item-popup-cart__delete cart__delete">

                                                <input type="hidden" value="<?= $cart_item_key;?>" name="<?=  $_product->get_id()?>">

                                                <button type="button" name="">

                                                

                                                     <?php

                                                        // echo apply_filters( 'woocommerce_cart_item_remove_link', sprintf(

                                                        //     '<a href="%s" class="remove icon-cart-delete" data-item='.$cart_item_key.' aria-label="%s" data-product_id="%s" data-product_sku="%s">

                                                        //         <svg width="15" height="15" viewBox="0 0 15 15" fill="none" xmlns="http://www.w3.org/2000/svg">

                                                        //             <path d="M9.79822 10.5643C10.0098 10.7758 10.3527 10.7758 10.5643 10.5643C10.7758 10.3527 10.7758 10.0098 10.5643 9.79822L8.26616 7.50013L10.5643 5.20204C10.7758 4.9905 10.7758 4.64754 10.5643 4.43601C10.3527 4.22447 10.0098 4.22447 9.79822 4.43601L7.50013 6.7341L5.20203 4.43599C4.99049 4.22446 4.64753 4.22446 4.43599 4.43599C4.22446 4.64753 4.22446 4.99049 4.43599 5.20203L6.7341 7.50013L4.43599 9.79823C4.22446 10.0098 4.22446 10.3527 4.43599 10.5643C4.64753 10.7758 4.99049 10.7758 5.20203 10.5643L7.50013 8.26616L9.79822 10.5643Z" fill="#999999"/>

                                                        //         </svg>

                                                        //      </a>',

                                                        //     esc_url( wc_get_cart_remove_url( $cart_item_key ) ),

                                                        //     __( 'Remove this item', 'woocommerce' ),

                                                        //     esc_attr( $product_id ),

                                                        //     esc_attr( $_product->get_sku() )

                                                        // ), $cart_item_key );

                                                        // add_action( 'woocommerce_before_calculate_totals', 'woocommerce_cart_item_remove_link', 10, 2 );

                                                    ?>

                                                     <svg width="15" height="15" viewBox="0 0 15 15" fill="none" xmlns="http://www.w3.org/2000/svg">

                                                                    <path d="M9.79822 10.5643C10.0098 10.7758 10.3527 10.7758 10.5643 10.5643C10.7758 10.3527 10.7758 10.0098 10.5643 9.79822L8.26616 7.50013L10.5643 5.20204C10.7758 4.9905 10.7758 4.64754 10.5643 4.43601C10.3527 4.22447 10.0098 4.22447 9.79822 4.43601L7.50013 6.7341L5.20203 4.43599C4.99049 4.22446 4.64753 4.22446 4.43599 4.43599C4.22446 4.64753 4.22446 4.99049 4.43599 5.20203L6.7341 7.50013L4.43599 9.79823C4.22446 10.0098 4.22446 10.3527 4.43599 10.5643C4.64753 10.7758 4.99049 10.7758 5.20203 10.5643L7.50013 8.26616L9.79822 10.5643Z" fill="#999999"/>

                                                    </svg>

                                                </button>

                                            </div>

                                        </div>

                                        <div class="item-popup-cart__info-bottom">

                                            <div class="item-popup-cart__price">

                                                <p>

                                                    <?php

                                                         if(!empty($cart_item["custom_price"])): echo  $cart_item["custom_price"]; else: echo apply_filters( 'woocommerce_cart_item_price', WC()->cart->get_product_price( $_product ), $cart_item, $cart_item_key ); endif; 

                                                    ?>

                                                </p>

                                            </div>

                                            <div class="item-popup-cart__count">

                                                <p>x <? echo  $cart_item['quantity'];?> </p>

                                            </div>

                                        </div>

                                    </div>

                                </div>
                                       <?php } endforeach;?>

                                                            </div>
                            <div class="popup-cart__bottom">

                                <div class="popup-cart__bottom-count">

                                    <p>Всего товаров:</p>

                                    <p><?php echo WC()->cart->get_cart_contents_count(); ?></p>

                                </div>

                                <div class="popup-cart__bottom-total">

                                    <p>Итого:</p>

                                    <p><?php echo   $woocommerce->cart->total; ?> ₽</p>

                                </div>

                                <div class="popup-cart__bottom-submit">

                                    <a href="/checkout/">Перейти к оформлению</a>

                                </div>

                            </div>
                        </div>

                    </div>
                    <div class="header__search-popup popup-search">

                        <div class="popup-search__container _container">

                            <div class="popup-search__inner">

                                <div class="popup-search__cont">

                                </div>

                                <div class="popup-search__more" >

                                    <button type="button" class="see_more">Смотреть все результаты</button>

                                </div>

                            </div>

                        </div>

                    </div>
                </div>

                <div class="header__bottom bottom-header">

                    <div class="bottom-header__inner">

                        <div class="bottom-header__container _container">

                            <div class="bottom-header__cont">
                                <?php foreach(  category_dom() as $prod_cat ) :?>
                                    <?php $svgs = get_field("категория_", 284); ?>
                                    <?php foreach(  $svgs as $svg ) :?>
                                        <?php if(  $svg['категория'][0] == $prod_cat->term_id ) :?>
                                            <a href="<?php echo get_term_link($prod_cat->slug, 'product_cat')?>" class="bottom-header__item">
                                               <?php echo $svg['svg'];  ?> 
                                                <p><?php echo $prod_cat->name ?></p>
                                            </a>
                                        <?php endif; ?>
                                    <?php endforeach; ?>
                                 <?php endforeach; ?>        
                            </div>

                        </div>

                    </div>

                </div>

            </div>

        </div>

    </header>

