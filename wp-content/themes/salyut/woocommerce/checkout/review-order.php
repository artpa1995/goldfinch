<?php
/**
 * Review order table
 *
 * This template can be overridden by copying it to yourtheme/woocommerce/checkout/review-order.php.
 *
 * HOWEVER, on occasion WooCommerce will need to update template files and you
 * (the theme developer) will need to copy the new files to your theme to
 * maintain compatibility. We try to do this as little as possible, but it does
 * happen. When this occurs the version of the template file will be bumped and
 * the readme will list any important changes.
 *
 * @see https://docs.woocommerce.com/document/template-structure/
 * @package WooCommerce\Templates
 * @version 5.2.0
 */

defined( 'ABSPATH' ) || exit;
do_action( 'woocommerce_review_order_before_cart_contents' );
?>



										<div class="cart__details details-cart">
											<div class="details-cart__title">
												<p>Детали заказа</p>
											</div>
											<?php
											foreach ( WC()->cart->get_cart() as $cart_item_key => $cart_item ) :
												$_product   = apply_filters( 'woocommerce_cart_item_product', $cart_item['data'], $cart_item, $cart_item_key );
												$product_id = apply_filters( 'woocommerce_cart_item_product_id', $cart_item['product_id'], $cart_item, $cart_item_key );

													//$_product =  wc_get_product( $cart_item['data']->get_id() );
												//  echo "<pre>";
												// print_r($product_id);
												
												if ( $_product && $_product->exists() && $cart_item['quantity'] > 0 && apply_filters( 'woocommerce_cart_item_visible', true, $cart_item, $cart_item_key ) ) :
													$product_permalink   = apply_filters( 'woocommerce_cart_item_permalink', $_product->is_visible() ? $_product->get_permalink( $cart_item ) : '', $cart_item, $cart_item_key );
													global $woocommerce;
													$total_product_price = $woocommerce->cart->get_cart_total();
													$price = explode('₽', $total_product_price); 
													

										?>
												
											<div class="details-cart__item">
												<p><?php
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
												?></p>
													<span><? echo  $cart_item['quantity'];?></span>
											</div>
										
											<? endif;   endforeach;?>
												<div class="details-cart__count">
												<p>Всего товаров:</p>
												<span><?php echo WC()->cart->get_cart_contents_count(); ?></span>
											</div>
											<div class="details-cart__total">
												<p>Итого:</p>
												<span><?php wc_cart_totals_order_total_html(); ?> ₽</span>
											</div>
											<?
												do_action( 'woocommerce_review_order_after_cart_contents' );

												?>
											<div class="details-cart__button">
												<button >Оформить заказ</button>
											</div>
										</div>



					

					

	
