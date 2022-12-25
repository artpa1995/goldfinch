<?php

   $data_h    = unserialize($_COOKIE['like_product']);
  

  if(empty( $data_h)){
    header("Location:/like-empty/");  exit();
 }
get_header();

/*
    Template name: favorits
*/
 $argscatpord = array(
                    'post_type'      => 'product',
                    'posts_per_page' => 8,
                    'product_cat'    => $slug,
                    'paged' => $paged,
                    'orderby'        => 'ASC',
                    'meta_query' => [],
                    'tax_query'      => array('relation' => 'AND')
                );



?>

			<main class="page">
				<section class="navigate">
					<div class="navigate__container _container">
						<div class="navigate__inner">
							<a href="/" class="navigate__link">Главная</a>
							<p>/</p>
							<a href="/catalog/" class="navigate__link">Каталог</a>
							<p>/</p>
							<a href="#" class="navigate__link">Избранное</a>
						</div>
					</div>
				</section>

				<section class="section favorite">
					<div class="favorite__container _container">
						<div class="favorite__inner">
							<div class="favorite__top">
								<div class="favorite__title">
									<p>Избранное</p>
								</div>
								<div class="favorite__clear">
									<button type="button" class="clear_favorits">
										<p>Очистить избранное</p>
										<svg width="15" height="15" viewBox="0 0 15 15" fill="none" xmlns="http://www.w3.org/2000/svg">
											<path d="M9.79822 10.5643C10.0098 10.7758 10.3527 10.7758 10.5643 10.5643C10.7758 10.3527 10.7758 10.0098 10.5643 9.79822L8.26616 7.50013L10.5643 5.20204C10.7758 4.9905 10.7758 4.64754 10.5643 4.43601C10.3527 4.22447 10.0098 4.22447 9.79822 4.43601L7.50013 6.7341L5.20203 4.43599C4.99049 4.22446 4.64753 4.22446 4.43599 4.43599C4.22446 4.64753 4.22446 4.99049 4.43599 5.20203L6.7341 7.50013L4.43599 9.79823C4.22446 10.0098 4.22446 10.3527 4.43599 10.5643C4.64753 10.7758 4.99049 10.7758 5.20203 10.5643L7.50013 8.26616L9.79822 10.5643Z" fill="#999999"/>
										</svg>											
									</button>
								</div>
							</div>
							<div class="favorite__cont">

                            <?
                            $data_h    = unserialize($_COOKIE['like_product']);
                            
                            $data = $data_h === false ? [] : $data_h;
                            if(!empty($data_h) && isset($data_h) &&  $data_h[0] !== 1000000):
                                
                                foreach ($data_h  as $key=> $product_id ) : 
                                   if($product_id >0):
                                    global $product; 
                                    $product          = wc_get_product($product_id );
                                    $price1           = $product->get_price();
                                    $price2           = $product->get_regular_price();
                                    $price_difference = round($price2-$price1);
                                    $pracent          = round(100-($price1*100)/$price2);
                                    $heart = array_search(intval($product_id), $data );
                                    //if(!empty( $product)):
                                   
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
										<button type="button" class="favorite__slide-heart like_open like_close" name="<? echo  $product_id ;?>">
											<svg width="28" height="24" viewBox="0 0 28 24" fill="none" xmlns="http://www.w3.org/2000/svg">
												<path d="M14 2.07645C10.7018 -0.792584 5.62976 -0.688505 2.4603 2.38868C-0.820101 5.57359 -0.820101 10.7374 2.4603 13.9223L12.0201 23.2038C13.1136 24.2654 14.8864 24.2654 15.9799 23.2038L25.5397 13.9223C28.8201 10.7374 28.8201 5.57359 25.5397 2.38868C22.3702 -0.688505 17.2982 -0.792584 14 2.07645Z" fill="#9E948A"/>
											</svg>												
										</button>
									</div>
                                    <a href="<?php echo get_permalink( $product_id ); ?>">
    									<img src="<?php echo wp_get_attachment_url( $product->get_image_id(), "full" ); ?>" alt="">
    									<p class="favorite__slide-title"><?php echo $product->get_name(); ?></p>
    									<p class="favorite__slide-price"><?= $price1; ?> ₽</p>
    								</a>
									<div class="favorite__slide-buttons">
                                        <button type="button" class="favorite__slide-favoriteBtn _icon-fav fireworks_main_types_catalogue_item_details_icons1 like_open <?= $heart !== false ? '_active' : ''?>" name="<?php echo  $product_id; ?>">
										   Убрать
										  </button>
										<button class="favorite__slide-cartBtn _icon-cart add_cart" name="<? echo  $product_id ;?>"><input type="hidden" value="<?php echo $product->get_name(); ?>" class="productsname"><input type="hidden" value="<?php echo $product->get_name(); ?>" class="productsname"> <input type="hidden" value="<?php echo $product->get_name(); ?>" class="productsname">  В корзину</button>
									</div>
								
								</div>
							        	<? endif;?>
								
								    <?  endforeach; 
								   
                             
                              endif;   ?>


							</div>
						</div>
					</div>
				</section>
					
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
						<a href="<?php echo get_permalink( $loop->post->ID ); ?>">
						<img src="<?php  echo $image[0]; ?>" data-id="<?php echo $loop->post->ID; ?>" style="margin-top:50px">
						<p class="recomended__slide-title"><?php echo $product->get_name(); ?></p>
						<p class="recomended__slide-price"><?php echo $product->get_regular_price();?>  ₽</p>
						</a>
						<div class="recomended__slide-buttons">
							<button type="button" class="recomended__slide-favoriteBtn _icon-fav like_open" name="<? echo  $product_id;?>">В избранное</button>
							<button class="recomended__slide-cartBtn _icon-cart add_cart" name="<? echo  $product_id;?>">В корзину</button>
						</div>
					</div>

                <?php endwhile;  endif;?>
					
				</div>
			<span class="swiper-notification" aria-live="assertive" aria-atomic="true"></span></div>
			<div class="recomended__mobile-cont">
				
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
					<a href="<?php echo get_permalink( $loop->post->ID ); ?>">
						<img src="<?php  echo $image[0]; ?>" data-id="<?php echo $loop->post->ID; ?>" style="margin-top:50px">
					<p class="recomended__slide-title"><?php echo $product->get_name(); ?></p>
					<p class="recomended__slide-price"><?php echo $product->get_regular_price();?> ₽</p>
					
					</a>
					<div class="recomended__slide-buttons">
						<button type="button" class="recomended__slide-favoriteBtn _icon-fav like_open" name="<? echo  $product_id;?>">В избранное</button>
						<button class="recomended__slide-cartBtn _icon-cart add_cart" name="<? echo  $product_id;?>">В корзину</button>
					</div>
				</div>

            <?php endwhile;  endif;?>
				



			</div>
		</div>
	</div>
				</section>
			</main>
<?php get_footer()?>