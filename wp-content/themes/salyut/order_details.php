<?php
/*
    Template name: order_details
*/
// session_start();

get_header();
  /**
         * Checkout Form
         *
         * This template can be overridden by copying it to yourtheme/woocommerce/checkout/form-checkout.php.
         *
         * HOWEVER, on occasion WooCommerce will need to update template files and you
         * (the theme developer) will need to copy the new files to your theme to
         * maintain compatibility. We try to do this as little as possible, but it does
         * happen. When this occurs the version of the template file will be bumped and
         * the readme will list any important changes.
         *
         * @see https://docs.woocommerce.com/document/template-structure/
         * @package WooCommerce\Templates
         * @version 3.5.0
         */
        $checkout= WC()->checkout();
        if ( ! defined( 'ABSPATH' ) ) {
            exit;
        }

        global $woocommerce;

$fields = WC()->checkout()->checkout_fields;



?>
 <?php
       
      
      
        
       do_action( 'woocommerce_before_checkout_form', $checkout );
       
       // If checkout registration is disabled and not logged in, the user cannot checkout.
       if ( ! $checkout->is_registration_enabled() && $checkout->is_registration_required() && ! is_user_logged_in() ) {
           echo esc_html( apply_filters( 'woocommerce_checkout_must_be_logged_in_message', __( 'You must be logged in to checkout.', 'woocommerce' ) ) );
           return;
       }
       
       ?>
 <main class="page chechout_page_main" >
				<section class="navigate">
					<div class="navigate__container _container">
						<div class="navigate__inner">
							<a href="/" class="navigate__link">Главная</a>
							<p>/</p>
							<a href="#" class="navigate__link">Корзина</a>
						</div>
					</div>
				</section>

				<section class="section cart">
					<div class="cart__container _container">
						<div class="cart__inner">
							<div class="cart__title">
								<p>Корзина</p>
								<div class="filter-category__count popup-cart__clean">
									<p>Очистить корзину </p>
									<a type="button" href="/product-category/beds/">
										<svg width="15" height="15" viewBox="0 0 15 15" fill="none" xmlns="http://www.w3.org/2000/svg"><path d="M9.79822 10.5643C10.0098 10.7758 10.3527 10.7758 10.5643 10.5643C10.7758 10.3527 10.7758 10.0098 10.5643 9.79822L8.26616 7.50013L10.5643 5.20204C10.7758 4.9905 10.7758 4.64754 10.5643 4.43601C10.3527 4.22447 10.0098 4.22447 9.79822 4.43601L7.50013 6.7341L5.20203 4.43599C4.99049 4.22446 4.64753 4.22446 4.43599 4.43599C4.22446 4.64753 4.22446 4.99049 4.43599 5.20203L6.7341 7.50013L4.43599 9.79823C4.22446 10.0098 4.22446 10.3527 4.43599 10.5643C4.64753 10.7758 4.99049 10.7758 5.20203 10.5643L7.50013 8.26616L9.79822 10.5643Z" fill="#999999"></path></svg>												
									</a>
								</div>
							</div>
							<div class="cart__cont">

								<div class="cart__items">


									<?
                                    
					
                                    foreach ( WC()->cart->get_cart() as $cart_item_key => $cart_item ) {
                                        $WC_Cart = new WC_Cart();
                                            // echo "<pre>";
                                            // print_r($cart_item);

                                        $_product   = apply_filters( 'woocommerce_cart_item_product', $cart_item['data'], $cart_item, $cart_item_key );
                                        $product_id = apply_filters( 'woocommerce_cart_item_product_id', $cart_item['product_id'], $cart_item, $cart_item_key );
                                    
                                        if ( $_product && $_product->exists() && $cart_item['quantity'] > 0 && apply_filters( 'woocommerce_cart_item_visible', true, $cart_item, $cart_item_key ) ) {
                                            $product_permalink = apply_filters( 'woocommerce_cart_item_permalink', $_product->is_visible() ? $_product->get_permalink( $cart_item ) : '', $cart_item, $cart_item_key );
                                    ?>
                                    <?php 
                                            if ( empty( $product_id ) ) {
                                                global $product;
                                                $product_id = $product->id;
                                                 $stock = get_post_meta(  $product_id, '_stock_status', true );
                                            }
                                        
                                            $wc_cart = WC()->cart;
										
                                        
                                            $product_cart_id = $wc_cart->generate_cart_id( $product_id );
                                            $in_cart = $wc_cart->find_product_in_cart( $product_cart_id );
                                            $cart = $wc_cart->get_cart();
                                    ?>

									<div class="cart__item item-cart">
										<div class="item-cart__img">
                                        <?php
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
										<div class="item-cart__info">
											<div class="item-cart__info-title">
                                            <?php
                                                    if ( ! $product_permalink ) {
                                                        echo wp_kses_post( apply_filters( 'woocommerce_cart_item_name', $_product->get_name(), $cart_item, $cart_item_key ) . '&nbsp;' );
                                                    } else {
                                                        echo wp_kses_post( apply_filters( 'woocommerce_cart_item_name', sprintf( '<a class="basket_item_box_info" href="%s">%s</a>', esc_url( $product_permalink ), $_product->get_name() ), $cart_item, $cart_item_key ) );
                                                    }

                                                    do_action( 'woocommerce_after_cart_item_name', $cart_item, $cart_item_key );

                                                    // Meta data.
                                                    echo wc_get_formatted_cart_item_data( $cart_item ); // PHPCS: XSS ok.

                                                    // Backorder notification.
                                                    if ( $_product->backorders_require_notification() && $_product->is_on_backorder( $cart_item['quantity'] ) ) {
                                                        echo wp_kses_post( apply_filters( 'woocommerce_cart_item_backorder_notification', '<p class="backorder_notification">' . esc_html__( 'Available on backorder', 'woocommerce' ) . '</p>', $product_id ) );
                                                    } ?>
												<button class="item-cart__info-clear cart__delete" type="button">
												     <input type="hidden" value="<?= $cart_item_key;?>" name="<?=  $_product->get_id()?>">
                                                <?php
                                                // echo apply_filters( 'woocommerce_cart_item_remove_link', sprintf(
                                                //     '<a href="%s" class="remove icon-cart-delete" data-item='.$cart_item_key.' aria-label="%s" data-product_id="%s" data-product_sku="%s">													<svg width="15" height="15" viewBox="0 0 15 15" fill="none" xmlns="http://www.w3.org/2000/svg"><path d="M9.79822 10.5643C10.0098 10.7758 10.3527 10.7758 10.5643 10.5643C10.7758 10.3527 10.7758 10.0098 10.5643 9.79822L8.26616 7.50013L10.5643 5.20204C10.7758 4.9905 10.7758 4.64754 10.5643 4.43601C10.3527 4.22447 10.0098 4.22447 9.79822 4.43601L7.50013 6.7341L5.20203 4.43599C4.99049 4.22446 4.64753 4.22446 4.43599 4.43599C4.22446 4.64753 4.22446 4.99049 4.43599 5.20203L6.7341 7.50013L4.43599 9.79823C4.22446 10.0098 4.22446 10.3527 4.43599 10.5643C4.64753 10.7758 4.99049 10.7758 5.20203 10.5643L7.50013 8.26616L9.79822 10.5643Z" fill="#999999"/></svg>
                                                //     </a>',
                                                //     esc_url( wc_get_cart_remove_url( $cart_item_key ) ),
                                                //     __( 'Remove this item', 'woocommerce' ),
                                                //     esc_attr( $product_id ),
                                                //     esc_attr( $_product->get_sku() )
                                                // ), $cart_item_key );
                                            ?>
                                             <svg width="15" height="15" viewBox="0 0 15 15" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                                    <path d="M9.79822 10.5643C10.0098 10.7758 10.3527 10.7758 10.5643 10.5643C10.7758 10.3527 10.7758 10.0098 10.5643 9.79822L8.26616 7.50013L10.5643 5.20204C10.7758 4.9905 10.7758 4.64754 10.5643 4.43601C10.3527 4.22447 10.0098 4.22447 9.79822 4.43601L7.50013 6.7341L5.20203 4.43599C4.99049 4.22446 4.64753 4.22446 4.43599 4.43599C4.22446 4.64753 4.22446 4.99049 4.43599 5.20203L6.7341 7.50013L4.43599 9.79823C4.22446 10.0098 4.22446 10.3527 4.43599 10.5643C4.64753 10.7758 4.99049 10.7758 5.20203 10.5643L7.50013 8.26616L9.79822 10.5643Z" fill="#999999"/>
                                                    </svg>
												</button>
											</div>
									
											<div class="item-cart__info-bottom">
												<div class="item-cart__info-options">
													<div class="item-cart__info-col">
														<div class="item-cart__info-col-item">
															<p>Глубина:</p>
															<span><?php if(empty($cart_item["custom_z_index"])): echo get_field('глубина-фильтр', $product_id ); else: echo $cart_item["custom_z_index"]; endif;?> см</span>
														</div>
														<div class="item-cart__info-col-item">
															<p>Ширина:</p>
															<span><?php if(empty($cart_item["custom_x_index"])): echo get_field('ширина-фильтр', $product_id ); else: echo $cart_item["custom_x_index"]; endif;?> см</span>
														</div>
														<div class="item-cart__info-col-item">
															<p>Длина:</p>
															<span><?php if(empty($cart_item["custom_y_index"])): echo get_field('длина-фильтр', $product_id ); else: echo $cart_item["custom_y_index"]; endif;?> см</span>
														</div>
													</div>
													<div class="item-cart__info-col">
														<div class="item-cart__info-col-item">
															<p>Материал:</p>
															<span> <? if(empty($cart_item["custom_material"])): echo get_field('заводской-материал', $product_id ); else: echo $cart_item["custom_material"]; endif;?></span>
														</div>
														<div class="item-cart__info-col-item">
															<p>Цвет:</p>
															<span> <? if(empty($cart_item["custom_color"])): echo get_field('заводской-цвет', $product_id ); else: echo $cart_item["custom_color"]; endif;?></span>
														</div>
														<div class="item-cart__info-col-item">
															<p>Наличие:</p>
															<span><?php if(isset($stock) && $stock == "instock"): echo "В наличии"; else: echo "Под заказ"; endif;?></span>
														</div>
													</div>
												</div>
												<div class="item-cart__info-price">
                                                <p class="">
                                                        <?php
                                                        if(!empty($cart_item["custom_price"])){
                                                            echo $cart_item["custom_price"];
                                                        }else{
                                                            echo apply_filters( 'woocommerce_cart_item_price', WC()->cart->get_product_price( $_product ), $cart_item, $cart_item_key );
                                                        }
														
                                                            //echo apply_filters( 'woocommerce_cart_item_price', WC()->cart->get_product_price( $_product ), $cart_item, $cart_item_key ); 
                                                        ?> 
                                                </p>
													
												</div>
											</div>
										</div>
									</div>


                                    <?php }}?>

                                    </div>
								
								<div class="cart__details details-cart">
									<div class="details-cart__title">
										<p>Детали заказа</p>
									</div>
                                    <?php
                                     foreach ( WC()->cart->get_cart() as $cart_item_key => $cart_item ) {
                                        $WC_Cart = new WC_Cart();

										
									
                                        $_product   = apply_filters( 'woocommerce_cart_item_product', $cart_item['data'], $cart_item, $cart_item_key );
                                        $product_id = apply_filters( 'woocommerce_cart_item_product_id', $cart_item['product_id'], $cart_item, $cart_item_key );
                                    
                                        if ( $_product && $_product->exists() && $cart_item['quantity'] > 0 && apply_filters( 'woocommerce_cart_item_visible', true, $cart_item, $cart_item_key ) ) {
                                            $product_permalink = apply_filters( 'woocommerce_cart_item_permalink', $_product->is_visible() ? $_product->get_permalink( $cart_item ) : '', $cart_item, $cart_item_key );
                                    ?>
                                    
									<div class="details-cart__item">
                                    <?php
                                                    if ( ! $product_permalink ) {
                                                        echo wp_kses_post( apply_filters( 'woocommerce_cart_item_name', $_product->get_name(), $cart_item, $cart_item_key ) . '&nbsp;' );
                                                    } else {
                                                        echo wp_kses_post( apply_filters( 'woocommerce_cart_item_name', sprintf( '<a class="basket_item_box_info" href="%s">%s</a>', esc_url( $product_permalink ), $_product->get_name() ), $cart_item, $cart_item_key ) );
                                                    }

                                                    do_action( 'woocommerce_after_cart_item_name', $cart_item, $cart_item_key );

                                                    // Meta data.
                                                    echo wc_get_formatted_cart_item_data( $cart_item ); // PHPCS: XSS ok.

                                                    // Backorder notification.
                                                    if ( $_product->backorders_require_notification() && $_product->is_on_backorder( $cart_item['quantity'] ) ) {
                                                        echo wp_kses_post( apply_filters( 'woocommerce_cart_item_backorder_notification', '<p class="backorder_notification">' . esc_html__( 'Available on backorder', 'woocommerce' ) . '</p>', $product_id ) );
                                                    } ?>
										<span><? echo  $cart_item['quantity'];?></span>
									</div>
									<?php }
                                
                                    }?>
									<div class="details-cart__count">
										<p>Всего товаров:</p>
										<span><?php echo WC()->cart->get_cart_contents_count(); ?></span>
									</div>
									<div class="details-cart__total">
										<p>Итого:</p>
										<span><?php echo  $woocommerce->cart->total; ?> ₽</span>
									</div>
									<div class="details-cart__button">
										<button type="button">Оформить заказ</button>
									</div>
								</div>


							</div>
						</div>
					</div>
				</section>
									


				<form name="checkout" method="post" class="checkout woocommerce-checkout ordering_details_wrapper" action="<?php echo esc_url( wc_get_checkout_url() ); ?>" enctype="multipart/form-data">
				
					<?php if ( $checkout->get_checkout_fields() ) : ?>
        
					<?php do_action( 'woocommerce_checkout_before_customer_details' ); ?>
				<!-- <section class="section checkouts"> -->

					<div class="checkout__container _container">
				
						<div class="checkout__inner">
							<div class="checkout__title">
								<p>Оформление заказа</p>
							</div>
							<div class="checkout__cont">


								<div class="checkout__adress adress-checkout">
									<div class="adress-checkout__title">
										<div class="adress-checkout__title-num">
											<p>1</p>
										</div>
										<p>Адрес доставки</p>
									</div>
									<div class="adress-checkout__inputs">
										<div class="adress-checkout__input">
											<?php // woocommerce_form_field( "billing_country", $fields['billing']['billing_country']); ?>
											<?php  woocommerce_form_field( "billing_country2", $fields['billing']['billing_country2']); ?>
											<!-- <input autocomplete="off" type="text" name="form[]" data-error="Ошибка" data-value="Страна*" class="input"> -->
										</div>
										<div class="adress-checkout__input">
										<?php woocommerce_form_field( "billing_city", $fields['billing']['billing_city']); ?>
											<!-- <input autocomplete="off" type="text" name="form[]" data-error="Ошибка" data-value="Город*" class="input"> -->
										</div>
										<div class="adress-checkout__input">
										<?php woocommerce_form_field( "billing_postcode", $fields['billing']['billing_postcode']); ?>
											<!-- <input autocomplete="off" type="text" name="form[]" data-error="Ошибка" data-value="Индекс" class="input"> -->
										</div>
										<div class="adress-checkout__input">
										<?php woocommerce_form_field( "billing_state", $fields['billing']['billing_state']); ?>
											<!-- <input autocomplete="off" type="text" name="form[]" data-error="Ошибка" data-value="Регион / область*" class="input"> -->
										</div>
										<div class="adress-checkout__input">
											<?php woocommerce_form_field( "billing_address_2", $fields['billing']['billing_address_2']); ?>
											<!-- <input autocomplete="off" type="text" name="form[]" data-error="Ошибка" data-value="Основной адрес*" class="input"> -->
										</div>
										<div class="adress-checkout__accept">
											<label class="filter-category__style-item">
												<input type="checkbox" hidden>
												<span><svg width="11" height="11" viewBox="0 0 11 11" fill="none" xmlns="http://www.w3.org/2000/svg">
													<path fill-rule="evenodd" clip-rule="evenodd" d="M10.6978 1.00269C10.938 1.18094 10.9883 1.5202 10.81 1.76045L4.58084 10.1563C4.48116 10.2906 4.325 10.3714 4.15775 10.3751C3.9905 10.3787 3.83093 10.3049 3.72544 10.1751L0.204602 5.84177C0.0159575 5.60959 0.0512483 5.26845 0.283426 5.0798C0.515604 4.89116 0.856748 4.92645 1.04539 5.15863L4.12641 8.95064L9.93999 1.11495C10.1182 0.874696 10.4575 0.824435 10.6978 1.00269Z" fill="#333333"/>
													</svg></span>
												<p>Адрес доставки совпадает с адресом плательщика</p>
											</label>
										</div>
									</div>
								</div>
								


								<div class="checkout__method method-checkout">
									<div class="method-checkout__title">
										<div class="method-checkout__title-num">
											<p>2</p>
										</div>
										<p>Способ доставки</p>
										<a href="/delivery/">Подробная информация о доставке</a>
									</div>
									<div class="method-checkout__items test">
										<label class="method-checkout__item _active">
										    <input type="hidden" value="Доставка до подъезда" class="pay_text">
											<p>Доставка до подъезда</p>
											<span>Рассчитывается с менеджером</span>
											<input type="radio" hidden name="method-checkout-radio" class="pay_radio">
										</label>
										<label class="method-checkout__item test">
										    <input type="hidden" value="Доставка транспортной компанией" class="pay_text">
											<p>Доставка транспортной компанией</p>
											<span>от 5000 ₽</span>
											<input type="radio" hidden name="method-checkout-radio" class="pay_radio">
										</label>
										<label class="method-checkout__item test">
										    <input type="hidden" value="Самовывоз с адреса производства" class="pay_text">
											<p>Самовывоз с адреса производства</p>
											<span>Бесплатно</span>
											<input type="radio" hidden name="method-checkout-radio" class="pay_radio">
										</label>
									</div>
								</div>
                                <div style="display:none;">
                                    <?php woocommerce_form_field( "billing_orders_devi", $fields['billing']['billing_orders_devi']); ?>
                                </div>

								<div class="checkout__contact contact-checkout">
									<div class="contact-checkout__title">
										<div class="contact-checkout__title-num">
											<p>3</p>
										</div>
										<p>Контактные данные</p>
									</div>
									<div class="contact-checkout__inputs">
										<div class="contact-checkout__input">
										<?php woocommerce_form_field( "billing_first_name", $fields['billing']['billing_first_name']); ?>
											<!-- <input autocomplete="off" type="text" name="form[]" data-error="Ошибка" data-value="Имя, отчество*" class="input"> -->
										</div>
										<div class="contact-checkout__input">
										<?php woocommerce_form_field( "billing_email", $fields['billing']['billing_email']); ?>
											<!-- <input autocomplete="off" type="text" name="form[]" data-error="Ошибка" data-value="E-mail*" class="input"> -->
										</div>
										<div class="contact-checkout__input">
											<?php woocommerce_form_field( "billing_last_name", $fields['billing']['billing_last_name']); ?>
											<!-- <input autocomplete="off" type="text" name="form[]" data-error="Ошибка" data-value="Фамилия*" class="input"> -->
										</div>
										<div class="contact-checkout__input">
										<?php woocommerce_form_field( "billing_phone", $fields['billing']['billing_phone']); ?>
											<!-- <input autocomplete="off" type="text" name="form[]" data-error="Ошибка" data-value="Телефон*" class="input"> -->
										</div>
									</div>
								</div>


								<div class="checkout__pay pay-checkout">
									<div class="pay-checkout__title">
										<div class="pay-checkout__title-num">
											<p>4</p>
										</div>
										<p>Способ оплаты</p>
										<a href="#">Подробная информация об оплате</a>
									</div>
									<div class="pay-checkout__items">
										<label class="pay-checkout__item _active pay1">
											<p>Переводом с карты на карту</p>
											<ul>
												<li>
													<img src="<?php echo get_template_directory_uri();?>/img/pay1.png" alt="">
												</li>
												<li>
													<img src="<?php echo get_template_directory_uri();?>/img/pay2.png" alt="">
												</li>
												<li>
													<img src="<?php echo get_template_directory_uri();?>/img/pay3.png" alt="">
												</li>
											</ul>
											<input type="radio" hidden name="pay-checkout-radio">
										</label>
										<label class="pay-checkout__item pay2">
											<p>Безналичной оплатой с оплатой на расчёт организации</p>
											<ul>
												<li>
													<img src="<?php echo get_template_directory_uri();?>/img/pay4.png" alt="">
												</li>
											</ul>
											<input type="radio" hidden name="pay-checkout-radio">
										</label>
										<label class="pay-checkout__item pay3">
											<p>Оплата через он-лайн эквайринг paykeeper</p>
											<ul>
												<li>
													<img src="<?php echo get_template_directory_uri();?>/img/pay5.png" alt="">
												</li>
											</ul>
											<input type="radio" hidden name="pay-checkout-radio">
										</label>
									</div>
								</div>


								<div class="checkout__comment comment-checkout">
									<div class="comment-checkout__title">
										<div class="comment-checkout__title-num">
											<p>5</p>
										</div>
										<p>Комментарий к заказу</p>
									</div>
									<div class="comment-checkout__cont">
										<div class="comment-checkout__textarea">
										<?php woocommerce_form_field( "billing_coment", $fields['billing']['billing_coment']); ?>
											<!-- <textarea autocomplete="off" name="form[]" data-value="Ваш комментарий к заказу" data-error="Ошибка" class="input"></textarea> -->
										</div>
										<div id="order_review" class="woocommerce-checkout-review-order">
	
											<?php do_action( 'woocommerce_checkout_order_review' ); ?>
										</div>
									
									</div>
								</div>


							</div>
						</div>
					
					</div>
					<?php do_action( 'woocommerce_checkout_after_customer_details' ); ?>
    
	<?php endif; ?>
	
	<?php do_action( 'woocommerce_checkout_before_order_review_heading' ); ?>
   
   
	<?php do_action( 'woocommerce_checkout_before_order_review' ); ?>

 
	<?php do_action( 'woocommerce_checkout_after_order_review' ); ?>

</form>

<?php do_action( 'woocommerce_after_checkout_form', $checkout ); ?>
				
				<!-- </section> -->
				
   
        
       



       
			</main>
<?  get_footer();?>




									

