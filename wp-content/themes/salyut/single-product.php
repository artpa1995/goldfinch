<?php
get_header( ); ?>

	<?php
		/**
		 * woocommerce_before_main_content hook.
		 *
		 * @hooked woocommerce_output_content_wrapper - 10 (outputs opening divs for the content)
		 * @hooked woocommerce_breadcrumb - 20
		 */
		//do_action( 'woocommerce_before_main_content' );

        /*
             Template name: firework_product
        */

		
         $data = empty($_COOKIE['like_product']) ? [] : unserialize($_COOKIE['like_product']);

                                              
	?>
			<main class="page">
	<?php while ( have_posts() ) : ?>
			<?php the_post(); 

			 global $product; 
		
             $product_id       = $product->get_id();
			 $price1           = $product->get_price();
             $price2           = $product->get_regular_price();
             $price_difference = round($price2-$price1);
             $pracent          = round(100-($price1*100)/$price2);
		     $heart = array_search(intval($product_id), $data );
		     $stock = get_post_meta(  $product_id, '_stock_status', true );

  
?>
<style>
    

      .swiper {
        width: 100%;
        height: 100%;
      }

      .swiper-slide {
        text-align: center;
        font-size: 18px;
        background: #fff;

        /* Center slide text vertically */
        display: -webkit-box;
        display: -ms-flexbox;
        display: -webkit-flex;
        display: flex;
        -webkit-box-pack: center;
        -ms-flex-pack: center;
        -webkit-justify-content: center;
        justify-content: center;
        -webkit-box-align: center;
        -ms-flex-align: center;
        -webkit-align-items: center;
        align-items: center;
      }

      .swiper-slide img {
        display: block;
        width: 100%;
        height: 100%;
        object-fit: cover;
      }


      .swiper {
        width: 100%;
        height: 300px;
        margin-left: auto;
        margin-right: auto;
      }

      .swiper-slide {
        background-size: cover;
        background-position: center;
      }

      .mySwiper2 {
        height: 80%;
        width: 100%;
      }

      .mySwiper {
        height: 20%;
        box-sizing: border-box;
        padding: 10px 0;
      }

      .mySwiper .swiper-slide {
        width: 25%;
        height: 100%;
        opacity: 0.4;
      }

      .mySwiper .swiper-slide-thumb-active {
        opacity: 1;
      }

      .swiper-slide img {
        display: block;
        width: 100%;
        height: 100%;
        object-fit: cover;
      }
    </style>

				<section class="navigate">
					<div class="navigate__container _container">
						<div class="navigate__inner">
							<a href="/" class="navigate__link">Главная</a>
							<p>/</p>
							<a href="/catalog/" class="navigate__link">Каталог</a>
							<p>/</p>
							    <?php
                                   $terms = get_the_terms($product->ID, 'product_cat');
                                   foreach ($terms as $term) { 
                             
                                     $product_cat_id = $term->term_id;
                                     $link = get_term_link( $product_cat_id, 'product_cat' );
                                     $product_cat = $term->name;
                                  
                                  ?>
        							<a href="<? echo $link; ?>" class="navigate__link">	
                                      <? echo $product_cat; ?>
                                    </a>
                                <?      
                                         
                              }
                             ?>
							<p>/</p>
							<a href="#" class="navigate__link"><?php echo $product->get_name(); ?></a>
						</div>
					</div>
				</section>
				<section class="section single">
					<div class="single__container _container">
						<div class="single__inner">
<section>

<div style="--swiper-navigation-color: #fff; --swiper-pagination-color: #fff" class="swiper mySwiper2" >
      <div class="swiper-wrapper">
          
      
        <?php
            global $product;
            
            $attachment_ids = $product->get_gallery_image_ids();
   
            foreach( $attachment_ids as $attachment_id ) {
                $image_link = wp_get_attachment_url( $attachment_id, 'full' ); 
				?>
				<div class="swiper-slide">
					<a href="<?php echo  $image_link; ?>" data-fancybox="images" style="display:block" class="img_size_big">
							<img src="<?php echo  $image_link; ?>" class="imgMain">
					</a>
				</div>
         <?php }?>
        
        
      </div>
      <div class="swiper-button-next"></div>
      <div class="swiper-button-prev"></div>
    </div>
    
    <div thumbsSlider="" class="swiper mySwiper">
      <div class="swiper-wrapper">
          
          
          <?php
            global $product;
            
            $attachment_ids = $product->get_gallery_image_ids();
            
            foreach( $attachment_ids as $attachment_id ) {
                $image_link = wp_get_attachment_url( $attachment_id, 'full' );
        
        ?>
        <div class="swiper-slide">
          	<img src="<?php echo  $image_link; ?>">
        </div>
         <?php }?>
       
      </div>
    </div>



	</section>




       <!--                     <div class="single__img">-->
							<!--	<div class="single__img-main">-->
							<!--		<button type="button" class="_icon-arrow-right single__img-arrowPrev "></button>-->

									<!-- <a data-fancybox="gallery" href="<?php //echo wp_get_attachment_url( $product->get_image_id(), "full" ); ?>">	
									<img src="<?php //echo wp_get_attachment_url( $product->get_image_id(), "full" ); ?>" alt=""></a> -->
									
							<!--		<a href="<?php //echo wp_get_attachment_url( $product->get_image_id(), "full" ); ?>" data-fancybox="images" style="display:block" class="img_size_big">-->
							<!--			<img src="<?php //echo wp_get_attachment_url( $product->get_image_id(), "full" ); ?>" alt="" class="imgMain">-->
							<!--		</a>-->

							<!--		<button type="button" class="_icon-arrow-right single__img-arrowNext "></button>-->
							<!--	</div>-->
							<!--	<ul>-->
							<!--		<li class="smoll_img_click">-->
							<!--			<img src="<?php //echo wp_get_attachment_url( $product->get_image_id(), "full" ); ?>" alt="">-->
							<!--		</li>-->
									
								<?php
    //   <!--                                 global $product;-->

    //   <!--                                 $attachment_ids = $product->get_gallery_image_ids();-->

    //   <!--                                 foreach( $attachment_ids as $attachment_id ) {-->
    //   <!--                                      $image_link = wp_get_attachment_url( $attachment_id, 'full' );-->
                                        
                                ?>
       <!--                                     <li class="smoll_img_click">-->
       <!-- 										<img src="<?php //echo  $image_link; ?>" alt="">-->
       <!-- 									</li>-->

       <!--                             <?php //}?>-->
							<!--	</ul>-->
							<!--</div>-->










							<!--<div class="single__img">-->
							<!--	<div class="single__img-main">-->
							<!--		<button type="button" class="_icon-arrow-right single__img-arrowPrev "></button>-->

									<!-- <a data-fancybox="gallery" href="<?php //echo wp_get_attachment_url( $product->get_image_id(), "full" ); ?>">	<img src="<?php //echo wp_get_attachment_url( $product->get_image_id(), "full" ); ?>" alt=""></a> -->
									
							<!--		<a href="<?php //echo wp_get_attachment_url( $product->get_image_id(), "full" ); ?>" data-fancybox="images" style="display:block" class="img_size_big">-->
							<!--			<img src="<?php //echo wp_get_attachment_url( $product->get_image_id(), "full" ); ?>" alt="" class="imgMain">-->
							<!--		</a>-->

							<!--		<button type="button" class="_icon-arrow-right single__img-arrowNext "></button>-->
							<!--	</div>-->
							<!--	<ul>-->
							<!--		<li class="smoll_img_click">-->
							<!--			<img src="<?php //echo wp_get_attachment_url( $product->get_image_id(), "full" ); ?>" alt="">-->
							<!--		</li>-->
									
								<?php
    //   <!--                                 global $product;-->

    //   <!--                                 $attachment_ids = $product->get_gallery_image_ids();-->

    //   <!--                                 foreach( $attachment_ids as $attachment_id ) {-->
    //   <!--                                      $image_link = wp_get_attachment_url( $attachment_id, 'full' );
                                        
                                    ?>
       <!--                                     <li class="smoll_img_click">-->
       <!-- 										<img src="<?php //echo  $image_link; ?>" alt="">-->
       <!-- 									</li>-->

    				<?php //}?>
							<!--	</ul>-->
							<!--</div>-->
							
							
							
							
							
							
							
							
							

							<div class="single__cont">
								<div class="single__title" data-da=".single__inner,1000,first">
									<p><?php echo $product->get_name(); ?></p>
								</div>
								<div class="single__price">
									<p><?= $price1; ?> ₽</p>
									<input type="hidden" value="<?= $price1; ?>" class="prod_price" data-price="<?= $price1; ?>">
									<span> <?php if(isset($stock) && $stock == "instock"): echo "В наличии"; else: echo "Под заказ"; endif;?></span>
									<button type="button" class="fireworks_main_types_catalogue_item_details_icons1 like_open <?= $heart !== false ? '_active' : ''?>" name="<?php echo  $product_id; ?>">
										<svg width="24" height="21" viewBox="0 0 24 21" fill="none" xmlns="http://www.w3.org/2000/svg">
											<path fill="#9E948A" d="M12 1.81689C9.17301 -0.693511 4.8255 -0.602442 2.10883 2.0901C-0.702944 4.87689 -0.702944 9.39518 2.10883 12.182L10.3029 20.3033C11.2402 21.2322 12.7598 21.2322 13.6971 20.3033L21.8912 12.182C24.7029 9.39518 24.7029 4.87689 21.8912 2.0901C19.1745 -0.602442 14.827 -0.693511 12 1.81689Z"/>
										</svg>
										<svg width="24" height="21" viewBox="0 0 28 24" fill="none" xmlns="http://www.w3.org/2000/svg">
										<path d="M14 2.07645C10.7018 -0.792584 5.62975 -0.688505 2.4603 2.38868C-0.820101 5.57359 -0.820101 10.7374 2.4603 13.9223L12.0201 23.2038C13.1136 24.2654 14.8864 24.2654 15.9799 23.2038L25.5397 13.9223C28.8201 10.7374 28.8201 5.57359 25.5397 2.38868C22.3702 -0.688505 17.2982 -0.792584 14 2.07645ZM12.3598 4.31095L13.0101 4.94227C13.5568 5.47309 14.4432 5.47309 14.9899 4.94227L15.6402 4.31095C17.8271 2.18767 21.3729 2.18767 23.5598 4.31095C25.7467 6.43422 25.7467 9.87673 23.5598 12L14 21.2815L4.4402 12C2.25327 9.87673 2.25327 6.43422 4.4402 4.31095C6.62714 2.18767 10.1729 2.18767 12.3598 4.31095Z" fill="#999999"/>
										</svg>
									</button>
								</div>
								<div class="single__color">
									<div class="single__color-title">
										<p>Цвет</p>
									</div>
									<div class="single__color-cont">
									<? 
											if( have_rows('цвет') ):

												// Loop through rows.
												while( have_rows('цвет') ) : the_row();  ?>

												<label class="single__color-item ">
														<input type="checkbox" hidden value="<?= $sub_value = get_sub_field('цена',$product_id );?>" name="<?= $sub_value = get_sub_field('цена',$product_id );?>" class="color_price" data-text="<?= $sub_value = get_sub_field('текст-цвета',$product_id );?>">
														<img src="<?= $sub_value = get_sub_field('img',$product_id );?>" alt="" class="img_for_color">
													</label>

    										<?	endwhile;
												else : echo "";
																				
											endif; ?>
									    
									    
									<?php 
										$images = get_field('colors',$product_id  );
									
										if( $images ): ?>
											
												<?php foreach( $images as $image_id ): ?>
													<label class="single__color-item ">
														<input type="checkbox" hidden>
														<img src="<?php echo $image_id ;?> " alt="">

													</label>
												<?php endforeach; ?>
											
										<?php endif; ?>
									    
										
									</div>
								</div>
								<div class="single__options">
									<div class="single__options-item">
										<p>Глубина:</p>
										<ul>

										 <? 
											if( have_rows('глубина') ):
												// Loop through rows.
												while( have_rows('глубина') ) : the_row();  ?>
    										
													<li class="depthRadio">
														<label>
															<p class="z_price"><?= $sub_value = get_sub_field('значение',$product_id );?> см</p>
															<input class="z_value" name="<?= $sub_value = get_sub_field('значение',$product_id );?>" type="radio" hidden value="<?= $sub_value = get_sub_field('цена',$product_id );?>" >
														</label>
													</li>
    									
    										<?	endwhile;
											else: echo "";
																				
											endif; ?>

										</ul>
									</div>
									<div class="single__options-item">
										<p>Ширина:</p>
										<ul>
											
										<? 
											if( have_rows('ширина') ):

												// Loop through rows.
												while( have_rows('ширина') ) : the_row();  ?>
    										
    										<li class="widthRadio">
    												<label>
    													<p class="x_price"><?= $sub_value = get_sub_field('значение',$product_id );?> см</p>
    													<input class="x_value" name="<?= $sub_value = get_sub_field('значение',$product_id );?>" type="radio" hidden value="<?= $sub_value = get_sub_field('цена',$product_id );?>">
    												</label>
    											</li>
    									
    										<?	endwhile;
												else : echo "";
																				
											endif; ?>
										</ul>
									</div>
									<div class="single__options-item">
										<p>Длина:</p>
										<ul>
											
										<? 
											if( have_rows('длина') ):

												// Loop through rows.
												while( have_rows('длина') ) : the_row();  ?>
    										
    										<li class="heightRadio">
    												<label>
    													<p class="y_price"><?= $sub_value = get_sub_field('значение',$product_id );?> см</p>
    													<input class="y_value" name="<?= $sub_value = get_sub_field('значение',$product_id );?>" type="radio" hidden value="<?= $sub_value = get_sub_field('цена',$product_id );?>">
    												</label>
    											</li>
    									
    										<?	endwhile;
												else : echo "";
																				
											endif; ?>
										</ul>
									</div>
								</div>
								<div class="single__material">
									<div class="single__material-title">
										<p>Материал</p>
									</div>
									<div class="single__material-items">
									     <!-- <? //$fabric_values_col = get_the_terms( $product->id, 'pa_metal');
									    // foreach ( $fabric_values_col as $fabric_value ):  ?>
										<label class="single__material-item">
											<input hidden type="radio" name="materialRadio" value="<? //$fabric_value->name?>">
											<p><? //$fabric_value->name?></p>
										</label>
									
										<? //endforeach;?> -->
										<?php	if( have_rows('материал') ):
										
										// Loop through rows.
										while( have_rows('материал') ) : the_row();  ?>

										<label class="single__material-item">
											<input hidden type="radio" name="materialRadio" value="<?= $sub_value = get_sub_field('цена',$product_id );?>" class="metal_price">
											<p class="metal_type"><?= $sub_value = get_sub_field('тип',$product_id );?></p>
										</label>
										
										<?	endwhile;
											else : echo "";
																		
										endif; ?>

									</div>
								</div>
								<div class="single__tabs">
									<div class="single__tabs-top">
										<div class="single__tab-trigger">
											<button data-show="#singleDest" class="_active" type="button">Описание</button>
										</div>
										<div class="single__tab-trigger">
										  
											<button data-show="#singleDelivery" type="button"><a class="dos" href="/delivery/" > Доставка</a></button>
										</div>
										<div class="single__tab-trigger">
											<button data-show="#singlePay" type="button">  <a class="dos" href="/payment-page/" > Оплата</a></button>
										</div>
									</div>
									<div class="single__tabs-cont">
										<div id="singleDest" class="single__tabs-item _active">
											<p>Объем: <?php echo $product->get_attribute( 'obyom' );?> м3</p>
											<p>Вес: <?php echo $product->get_attribute( 'ves' );?> кг</p>
											<p><?php echo $product->get_description();?></p>
										</div>
										<div id="singleDelivery" class="single__tabs-item">
											<p>Объем: <?php echo $product->get_attribute( 'obyom' );?> м3</p>
											<p>Вес: <?php echo $product->get_attribute( 'ves' );?> кг</p>
											<p><?php echo $product->get_description();?></p>
										</div>
										<div id="singlePay" class="single__tabs-item">
											<p>Объем: <?php echo $product->get_attribute( 'obyom' );?> м3</p>
											<p>Вес: <?php echo $product->get_attribute( 'ves' );?> кг</p>
                                            <p><?php echo $product->get_description();?></p>
                                        </div>
									</div>
								</div>
								<div class="pro_qty_block" data-da=".single__price,1000,last">
								<div class="item-cart__info-count" >
									<button class="item-cart__info-minusBtn but_input_qty">-</button>
										<input type="hidden" value="<? echo $product_id; ?>"  class="input_qty">
										<input type="hidden" value=""  class="qty_cart">
										<span class="">1</span>
									<button class="item-cart__info-plusBtn but_input_qty">+</button>
								</div>
								<div class="single__cartBtn" style="" >
									<button  class="_icon-cart add_cart" name="<?php echo $product_id; ?>"> <input type="hidden" value="<?php echo $product->get_name(); ?>" class="productsname"> В корзину</button>
								</div>
								</div>
							
								
							</div>

						</div>
					</div>
				</section>

<?php endwhile;?>


<section class="section recomended">
	<div class="recomended__title">
		<div class="recomended__title-container _container-small">
			<p>Рекомендуемые товары</p>
		</div>
	</div>
	<div class="recomended__container _container">
		<div class="recomended__inner">
			<div class="recomended__controls">
				<div class="recomended__button-prev _icon-arrow-right swiper-button-disabled" tabindex="-1" role="button" aria-label="Previous slide" aria-controls="swiper-wrapper-6d1af2e65b8108203" aria-disabled="true"></div>
				<div class="swiper-pagination recomended__pagination swiper-pagination-bullets swiper-pagination-horizontal"><span class="swiper-pagination-bullet swiper-pagination-bullet-active"></span><span class="swiper-pagination-bullet"></span><span class="swiper-pagination-bullet"></span><span class="swiper-pagination-bullet"></span><span class="swiper-pagination-bullet"></span></div>
				<div class="recomended__button-next _icon-arrow-right" tabindex="0" role="button" aria-label="Next slide" aria-controls="swiper-wrapper-6d1af2e65b8108203" aria-disabled="false"></div>
				<div class="recomended__decor-def"></div>
			</div>
			<div class="swiper recomended__slider swiper-initialized swiper-horizontal swiper-pointer-events">
				<div class="swiper-wrapper recomended__wrapper" id="swiper-wrapper-6d1af2e65b8108203" aria-live="polite" style="transform: translate3d(0px, 0px, 0px);">
<? 
$slug =''; 
if ( is_product_category() ){
    global $wp_query;
    $cat = $wp_query->get_queried_object();
    $slug  = $cat->slug;
}

$argscatpord = array(
                    'post_type'      => 'product',
                    'posts_per_page' => 8,
                    'product_cat'    => $slug,
                    'paged' => $paged,
                    'orderby'        => 'ASC',
                    'meta_query' => [],
                    'tax_query'      => array('relation' => 'AND')
                );?>
					
                        <?$loop = new WP_Query( $argscatpord );

                            $count = 0;
                            if ( $loop->have_posts() ) :
                                while ( $loop->have_posts() ) : $loop->the_post();
                                global $product; 
                                
                                $product_id       = $product->get_id();
                                $price1           = $product->get_price();
                                $price2           = $product->get_regular_price();
                                $price_difference = round($price2-$price1);
                                $pracent          = round(100-($price1*100)/$price2);
                                $count            =  $count+1;
                                
                               
                        ?>
            

					<div class="swiper-slide recomended__slide" role="group" aria-label="8 / 8" style="margin-right: 40px;">
						<div class="recomended__slide-top">
							
							<?php
                                 $news =  get_field('new-product', $product_id );
                                if(isset($news) && !empty($news)): ?>
                                <p class="recomended__slide-new">NEW</p>
                                <? endif;?>
							<div class="recomended__slide-option">
								<p>Глубина</p>
								<span><?php echo get_field('глубина-фильтр', $product_id )?> см</span>
							</div>
							<div class="recomended__slide-option">
								<p>Ширина</p>
								<span><?php echo get_field('ширина-фильтр', $product_id )?> см</span>
							</div>
							<div class="recomended__slide-option">
								<p>Длина</p>
								<span><?php echo get_field('длина-фильтр', $product_id )?> см</span>
							</div>
						</div>
						<?php $image = wp_get_attachment_image_src( get_post_thumbnail_id( $loop->post->ID ), 'single-post-thumbnail' );?>
						<a href="<?php echo get_permalink( $loop->post->ID ); ?>" style="display: -webkit-inline-box;">
						<img src="<?php  echo $image[0]; ?>" data-id="<?php echo $loop->post->ID; ?>" style="margin-top:50px">
						<p class="recomended__slide-title"><?php echo $product->get_name(); ?></p>
						<p class="recomended__slide-price"><?php echo $product->get_regular_price();?>  ₽</p>
						</a>
						<div class="recomended__slide-buttons">
							<button type="button" class="recomended__slide-favoriteBtn _icon-fav like_open" name="<? echo  $product_id;?>">В избранное</button>
							<button class="recomended__slide-cartBtn _icon-cart add_cart" name="<? echo  $product_id;?>"> <input type="hidden" value="<?php echo $product->get_name(); ?>" class="productsname"> В корзину</button>
						</div>
					</div>

                <?php endwhile;  endif;?>
					
				</div>
			<span class="swiper-notification" aria-live="assertive" aria-atomic="true"></span></div>
			<div class="recomended__mobile-cont">
			    <? $argscatpord = array(
                    'post_type'      => 'product',
                    'posts_per_page' => 8,
                    'product_cat'    => $slug,
                    'paged' => $paged,
                    'orderby'        => 'ASC',
                    'meta_query' => [],
                    'tax_query'      => array('relation' => 'AND')
                );?>
				
                        <?$loop = new WP_Query( $argscatpord );

                            $count = 0;
                            if ( $loop->have_posts() ) :
                                while ( $loop->have_posts() ) : $loop->the_post();
                                global $product; 
                                
                                $product_id       = $product->get_id();
                                $price1           = $product->get_price();
                                $price2           = $product->get_regular_price();
                                $price_difference = round($price2-$price1);
                                $pracent          = round(100-($price1*100)/$price2);
                               
                                $count            =  $count+1;
                                
                               
                        ?>
				<div class="recomended__slide">
					<div class="recomended__slide-top">
							<?php
                                 $news =  get_field('new-product', $product_id );
                                if(isset($news) && !empty($news)): ?>
                                <p class="recomended__slide-new">NEW</p>
                                <? endif;?>
							<div class="recomended__slide-option">
								<p>Глубина</p>
								<span><?php echo get_field('глубина-фильтр', $product_id )?> см</span>
							</div>
							<div class="recomended__slide-option">
								<p>Ширина</p>
								<span><?php echo get_field('ширина-фильтр', $product_id )?> см</span>
							</div>
							<div class="recomended__slide-option">
								<p>Длина</p>
								<span><?php echo get_field('длина-фильтр', $product_id )?> см</span>
							</div>
					</div>
					<?php $image = wp_get_attachment_image_src( get_post_thumbnail_id( $loop->post->ID ), 'single-post-thumbnail' );?>
					<a href="<?php echo get_permalink( $loop->post->ID ); ?>" id="testimg" style="display">
						<img src="<?php  echo $image[0]; ?>" data-id="<?php echo $loop->post->ID; ?>" style="margin-top:50px">
					<p class="recomended__slide-title"><?php echo $product->get_name(); ?></p>
					<p class="recomended__slide-price"><?php echo $product->get_regular_price();?> ₽</p>
					
					</a>
					<div class="recomended__slide-buttons">
						<button type="button" class="recomended__slide-favoriteBtn _icon-fav like_open" name="<? echo  $product_id;?>">В избранное</button>
						<button class="recomended__slide-cartBtn _icon-cart add_cart" name="<? echo  $product_id;?>"> <input type="hidden" value="<?php echo $product->get_name(); ?>" class="productsname"> В корзину</button>
					</div>
				</div>

            <?php endwhile;  endif;?>
				



			</div>
		</div>
	</div>
				</section>
			</main>
			
			
			
			
			  <script>
      var swiper = new Swiper(".mySwiper", {
        loop: true,
        spaceBetween: 10,
        slidesPerView: 4,
        freeMode: true,
        watchSlidesProgress: true,
      });
      var swiper2 = new Swiper(".mySwiper2", {
        loop: true,
        spaceBetween: 10,
        navigation: {
          nextEl: ".swiper-button-next",
          prevEl: ".swiper-button-prev",
        },
        thumbs: {
          swiper: swiper,
        },
      });
    </script>
<?php get_footer()?>