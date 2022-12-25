<?php

get_header();

/*
    Template name: favorits-empty
*/
// session_start();

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
							
						</div>
					</div>
				</section>

				<section class="section favorite">
					<div class="favorite__container _container">
						<div class="favorite__inner">
							<div class="favorite__title">
								<p>Избранное</p>
							</div>
							<div class="favorite__empty">
								<div class="favorite__empty-text">
									<p>Увы, сейчас здесь пусто, но&nbsp;вы&nbsp;можете это&nbsp;исправить :)</p>
								</div>
								<div class="favorite__empty-link">
									<a href="/catalog/">Перейти в каталог</a>
								</div>
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
							<button class="recomended__slide-cartBtn _icon-cart add_cart" name="<? echo  $product_id;?>"><input type="hidden" value="<?php echo $product->get_name(); ?>" class="productsname"><input type="hidden" value="<?php echo $product->get_name(); ?>" class="productsname">  В корзину</button>
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