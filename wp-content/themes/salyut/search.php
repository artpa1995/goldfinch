<?php

/**

 * The template for displaying search results pages

 *

 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/#search-result

 *

 */

/*

    Template name: search

*/



get_header();?>



<?php 

if(isset($_GET['search'])) {

    $search = $_GET['search'];



    $argscatpord = array(

        'post_type'      => 'product',

        's'           => $search,

        'posts_per_page' => -1,

        'orderby'        => 'ASC',

        'meta_query' => [],

        'tax_query'      => array('relation' => 'AND')

    );



}



$loop = new WP_Query( $argscatpord );



?>

<div class="search_block_page">

   <div class="content-category__items _container">

    <?php      

        if ( $loop->have_posts() ) :

            while ( $loop->have_posts() ) : $loop->the_post();

            global $product; 

            

            $product_id       = $product->get_id();

            $price1           = $product->get_price();

            $price2           = $product->get_regular_price();

            $price_difference = round($price2-$price1);

            $pracent          = round(100-($price1*100)/$price2);

           

            

        

        ?>





                                <div class="favorite__item item-favorite">

                                        <div class="favorite__slide-top">

                                        <?php

                                             $news =  get_field('new-product', $product_id );

                                            if(isset($news) && !empty($news)): ?>

                                            <p class="favorite__slide-new">NEW</p>

                                            <? endif;?>

                                            <div class="favorite__slide-option">

                                                <p>Глубина</p>

                                                <span><?php echo get_field('глубина-фильтр', $product_id )?> см</span>

                                            </div>

                                            <div class="favorite__slide-option">

                                                <p>Ширина</p>

                                                <span><?php echo get_field('ширина-фильтр', $product_id )?> см</span>

                                            </div>

                                            <div class="favorite__slide-option">

                                                <p>Длина</p>

                                                <span><?php echo get_field('длина-фильтр', $product_id )?> см</span>

                                            </div>

                                            <div class="single__price">

                                                <button type="button" class="fireworks_main_types_catalogue_item_details_icons1 like_open <?= $heart !== false ? '_active' : ''?>">

            										<svg width="24" height="21" viewBox="0 0 24 21" fill="none" xmlns="http://www.w3.org/2000/svg">

            											<path fill="#9E948A" d="M12 1.81689C9.17301 -0.693511 4.8255 -0.602442 2.10883 2.0901C-0.702944 4.87689 -0.702944 9.39518 2.10883 12.182L10.3029 20.3033C11.2402 21.2322 12.7598 21.2322 13.6971 20.3033L21.8912 12.182C24.7029 9.39518 24.7029 4.87689 21.8912 2.0901C19.1745 -0.602442 14.827 -0.693511 12 1.81689Z"></path>

            										</svg>

            										<svg width="24" height="21" viewBox="0 0 28 24" fill="none" xmlns="http://www.w3.org/2000/svg">

            										<path d="M14 2.07645C10.7018 -0.792584 5.62975 -0.688505 2.4603 2.38868C-0.820101 5.57359 -0.820101 10.7374 2.4603 13.9223L12.0201 23.2038C13.1136 24.2654 14.8864 24.2654 15.9799 23.2038L25.5397 13.9223C28.8201 10.7374 28.8201 5.57359 25.5397 2.38868C22.3702 -0.688505 17.2982 -0.792584 14 2.07645ZM12.3598 4.31095L13.0101 4.94227C13.5568 5.47309 14.4432 5.47309 14.9899 4.94227L15.6402 4.31095C17.8271 2.18767 21.3729 2.18767 23.5598 4.31095C25.7467 6.43422 25.7467 9.87673 23.5598 12L14 21.2815L4.4402 12C2.25327 9.87673 2.25327 6.43422 4.4402 4.31095C6.62714 2.18767 10.1729 2.18767 12.3598 4.31095Z" fill="#999999"></path>

            										</svg>

    									        </button>

                                            </div>

                                        </div>

                                        <!-- <img src="<?php echo bloginfo("template_url"); ?>/img/p1.png" alt=""> -->

                                        <?php $image = wp_get_attachment_image_src( get_post_thumbnail_id( $loop->post->ID ), 'single-post-thumbnail' );?>



                                            <img src="<?php  echo $image[0]; ?>" data-id="<?php echo $loop->post->ID; ?>" style="margin-top:50px">

                                        <a href="<?php echo get_permalink( $loop->post->ID ); ?>"><p class="favorite__slide-title"><?php echo $product->get_name(); ?></p></a>

                                        <p class="favorite__slide-price"><?php echo $product->get_regular_price();?>  ₽</p>

                                        <div class="favorite__slide-buttons">

                                            <button type="button" class="favorite__slide-favoriteBtn _icon-fav like_open" name="<? echo  $product_id;?>">В избранное</button>

                                            <button class="favorite__slide-cartBtn _icon-cart add_cart" name="<? echo  $product_id ;?>"><input type="hidden" value="<?php echo $product->get_name(); ?>" class="productsname"> В корзину</button>

                                        </div>

                                    </div>





        <?

        endwhile;

        endif;

        ?>

   </div>



   </div>



<?php get_footer(); ?>