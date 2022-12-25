<?php
/**
 * Thankyou page
 *
 * This template can be overridden by copying it to yourtheme/woocommerce/checkout/thankyou.php.
 *
 * HOWEVER, on occasion WooCommerce will need to update template files and you
 * (the theme developer) will need to copy the new files to your theme to
 * maintain compatibility. We try to do this as little as possible, but it does
 * happen. When this occurs the version of the template file will be bumped and
 * the readme will list any important changes.
 *
 * @see https://docs.woocommerce.com/document/template-structure/
 * @package WooCommerce\Templates
 * @version 3.7.0
 */

defined( 'ABSPATH' ) || exit;
?>

<div class="woocommerce-order">

	<?php
	if ( $order ) :

		do_action( 'woocommerce_before_thankyou', $order->get_id() );
		?>

		<?php if ( $order->has_status( 'failed' ) ) : ?>

			<p class="woocommerce-notice woocommerce-notice--error woocommerce-thankyou-order-failed"><?php esc_html_e( 'Unfortunately your order cannot be processed as the originating bank/merchant has declined your transaction. Please attempt your purchase again.', 'woocommerce' ); ?></p>

			<p class="woocommerce-notice woocommerce-notice--error woocommerce-thankyou-order-failed-actions">
				<a href="<?php echo esc_url( $order->get_checkout_payment_url() ); ?>" class="button pay"><?php esc_html_e( 'Pay', 'woocommerce' ); ?></a>
				<?php if ( is_user_logged_in() ) : ?>
					<a href="<?php echo esc_url( wc_get_page_permalink( 'myaccount' ) ); ?>" class="button pay"><?php esc_html_e( 'My account', 'woocommerce' ); ?></a>
				<?php endif; ?>
			</p>

		<?php else : ?>

			<p class="woocommerce-notice woocommerce-notice--success woocommerce-thankyou-order-received"><?php echo apply_filters( 'woocommerce_thankyou_order_received_text', esc_html__( 'Thank you. Your order has been received.', 'woocommerce' ), $order ); // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped ?></p>

			<ul class="woocommerce-order-overview woocommerce-thankyou-order-details order_details">

				<li class="woocommerce-order-overview__order order">
					<?php esc_html_e( 'Order number:', 'woocommerce' ); ?>
					<strong><?php echo $order->get_order_number(); // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped ?></strong>
				</li>

				<li class="woocommerce-order-overview__date date">
					<?php esc_html_e( 'Date:', 'woocommerce' ); ?>
					<strong><?php echo wc_format_datetime( $order->get_date_created() ); // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped ?></strong>
				</li>

				<?php if ( is_user_logged_in() && $order->get_user_id() === get_current_user_id() && $order->get_billing_email() ) : ?>
					<li class="woocommerce-order-overview__email email">
						<?php esc_html_e( 'Email:', 'woocommerce' ); ?>
						<strong><?php echo $order->get_billing_email(); // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped ?></strong>
					</li>
				<?php endif; ?>

				<li class="woocommerce-order-overview__total total">
					<?php esc_html_e( 'Total:', 'woocommerce' ); ?>
					<strong><?php echo $order->get_formatted_order_total(); // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped ?></strong>
				</li>

				<?php if ( $order->get_payment_method_title() ) : ?>
					<li class="woocommerce-order-overview__payment-method method">
						<?php esc_html_e( 'Payment method:', 'woocommerce' ); ?>
						<strong><?php echo wp_kses_post( $order->get_payment_method_title() ); ?></strong>
					</li>
				<?php endif; ?>

			</ul>

		<?php endif; ?>

		<?php do_action( 'woocommerce_thankyou_' . $order->get_payment_method(), $order->get_id() ); ?>
		<?php do_action( 'woocommerce_thankyou', $order->get_id() ); ?>

	<?php else : ?>

		<p class="woocommerce-notice woocommerce-notice--success woocommerce-thankyou-order-received"><?php echo apply_filters( 'woocommerce_thankyou_order_received_text', esc_html__( 'Thank you. Your order has been received.', 'woocommerce' ), null ); // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped ?></p>

	<?php endif; ?>

</div>

<?php
/*
    Template name: ordering
*/
// session_start();

get_header();
?>

           <main>
                 
                  <section  class="ordering">
                      <div class="ordering_wrapper">
                          <div class="ordering_links_main_wrapper">
                              <div class="ordering_links_wrapper">
                               <a class="ordering_link"  href="">Персональный раздел
                                    <svg width="5" height="5" viewBox="0 0 5 5" fill="none" xmlns="http://www.w3.org/2000/svg"><g clip-path="url(#clip0)"><path d="M3.79328 2.36279L1.48063 0.0565417C1.40486 -0.0189756 1.28218 -0.0188486 1.20654 0.0569323C1.13095 0.132704 1.13115 0.255447 1.20693 0.331023L3.38192 2.50001L1.20685 4.66898C1.13108 4.74457 1.13089 4.86724 1.20646 4.94302C1.24438 4.98101 1.29406 5 1.34374 5C1.39329 5 1.44277 4.98113 1.48062 4.94341L3.79328 2.63722C3.82977 2.60091 3.85025 2.55149 3.85025 2.50001C3.85025 2.44852 3.82971 2.39917 3.79328 2.36279Z" fill="#838383"/></g><defs><clipPath id="clip0"><rect width="5" height="5" fill="white"/></clipPath></defs></svg>
                               </a>
                               <a  class="ordering_link" href="">Мои заказы
                                  <svg width="5" height="5" viewBox="0 0 5 5" fill="none" xmlns="http://www.w3.org/2000/svg"><g clip-path="url(#clip0)"><path d="M3.79328 2.36279L1.48063 0.0565417C1.40486 -0.0189756 1.28218 -0.0188486 1.20654 0.0569323C1.13095 0.132704 1.13115 0.255447 1.20693 0.331023L3.38192 2.50001L1.20685 4.66898C1.13108 4.74457 1.13089 4.86724 1.20646 4.94302C1.24438 4.98101 1.29406 5 1.34374 5C1.39329 5 1.44277 4.98113 1.48062 4.94341L3.79328 2.63722C3.82977 2.60091 3.85025 2.55149 3.85025 2.50001C3.85025 2.44852 3.82971 2.39917 3.79328 2.36279Z" fill="#838383"/></g><defs><clipPath id="clip0"><rect width="5" height="5" fill="white"/></clipPath></defs></svg>
                               </a>
                               <a class="ordering_link"  href="">Оформление заказа</a>
                          </div>
                          </div>
                          
                          <div class="ordering_info_link_wrapper">
                              <h1 class="ordering_info_title">Ваш заказ №1245 от 12.03.2021 12:56 успешно создан. Номер
                                вашей оплаты: №493027
                            </h1>
                            <div class="ordering_info_box">
                                 <p class="ordering_info_text">Вы можете следить за выполнением своего заказа в личном кабинете сайта.Обратите внимание, что для входа в этот раздел вам необходимо будет ввести логин и пароль пользователя сайта.</p>
                            </div>
                              <a href="" class="ordering_info_link">Личный кабинет</a>
                          </div>
                      </div>
                  </section>
              
                 
              
           </main>
          
<?php
   get_footer();
?>
