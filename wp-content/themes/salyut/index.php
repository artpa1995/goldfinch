<?php
// die;
get_header();
/*
    Template name: home

*/

$args = array(
       'taxonomy'     => 'product_cat',
       'orderby'      => 'name',
       'show_count'   => 0,
       'pad_counts'   => 0,
       'hierarchical' => 1,
       'title_li'     => '',
       'hide_empty'   => 0
);

 $args3 =  get_terms( 'product_cat', array(
    'child_of'     => 0,
    'taxonomy'     => 'product_cat',
    'orderby'      => 'name',
    'show_count'   => 0,
    'pad_counts'   => 0,
    'hierarchical' => 1,
    'title_li'     => '',
    'hide_empty'   => 0
));
?>
<?php
                                // параметры по умолчанию
                                $posts = get_posts( array(
                                'numberposts' => -1,
                                'post_type'   => 'buklet',
                                'suppress_filters' => true, // подавление работы фильтров изменения SQL запроса
                                ) );
                                foreach($posts as $post ){
									$value = get_field( "buklet_1", $post->ID );
									// echo "<pre>";
									// print_r($post);
									// print_r($value);
									// print_r($post->ID);


									 if( have_rows('buklet_1') ){
										while( have_rows('buklet_1') ) : the_row(); 
										$sub_value1 = get_sub_field('buklet_1_1', $post->ID );
										
										// echo "<pre>";
										// print_r($sub_value1);
									 endwhile;
									}

										
									//die;
								}
                              ?>
			<main class="page">
				<section class="section intro">
					<div class="intro__inner">
						<div class="swiper intro__slider">
							<div class="swiper-wrapper intro__wrapper">
							    	<? if( have_rows('slide') ):

												// Loop through rows.
												while( have_rows('slide') ) : the_row();  ?>

													
													<div class="swiper-slide intro__slide">
                    									<div class="_container-small intro__container-small">
                    										<img src="<?= $sub_value1 = get_sub_field('image', 5 );?>" alt="">
                    										<p><?= $sub_value2 = get_sub_field('title', 5 );?></p>
                    										<span><?= $sub_value3 = get_sub_field('text', 5 );?></span>
                    									</div>
                    								</div>

									    	<?	endwhile;
										else : echo "";
																			
										endif; ?>
									
						
							</div>
						</div>
						<div class="intro__controls _container-small">
							<div class="intro__controls-inner">
								<div class="intro__button-prev _icon-arrow-right"></div>
								<div class="swiper-pagination intro__pagination"></div>
								<div class="intro__button-next _icon-arrow-right"></div>
							</div>
						</div>
					</div>
				</section>


				<section class="section mebel">
					<div class="mebel__title">
						<div class="mebel__title-container _container-small">
							<p>Мебель для комнат</p>
						</div>
					</div>
					<div class="mebel__container _container">
						<div class="mebel__inner">
							<div class="mebel__controls">
								<div class="mebel__button-prev _icon-arrow-right"></div>
								<div class="swiper-pagination mebel__pagination"></div>
								<div class="mebel__button-next _icon-arrow-right"></div>
								<div class="mebel__decor-def"></div>
							</div>
							<div class="swiper mebel__slider">
								<div class="swiper-wrapper mebel__wrapper">
								    
        							 <?php 
                                      foreach(   $args3 as $prod_cat ) :
                                        if($prod_cat->parent == 0):
                                        // print_r($prod_cat );
                                        $cat_thumb_id = get_woocommerce_term_meta( $prod_cat->term_id, 'thumbnail_id', true );
                                        $shop_catalog_img = wp_get_attachment_image_src( $cat_thumb_id, 'shop_catalog', "full" );
                                        $term_link = get_term_link( $prod_cat, 'product_cat' );
                                        
                                        
                                               if( $shop_catalog_img[0] != "http://goldfinchwood.u1246912.cp.regruhosting.ru/wp-includes/images/media/default.png" ): ?>
                
                                                  <!--<a href="<?php echo get_term_link($prod_cat->slug, 'product_cat')?>">-->
                                                       <div class="swiper-slide mebel__slide">
                    								        <a style="display:block;     height: 100%;" href=" <?php echo get_term_link($prod_cat->slug, 'product_cat')?>" class="select_a_category_item_first">
                    								    	    <p><?php echo $prod_cat->name ?></p>
                    										    <img src="<?php echo $shop_catalog_img[0]; ?>" alt="">
                    										 </a>   
                								        </div>
                									<!--</a>-->
                
                                               <?php 
                                               endif;
                                         endif;
                                      endforeach;
                                        wp_reset_query();
                                            ?>

								</div>
							</div>
							<div class="mebel__mobile-cont">
							     <?php 
                                      foreach(   $args3 as $prod_cat ) :
                                        if($prod_cat->parent == 0):
                                        // print_r($prod_cat );
                                        $cat_thumb_id = get_woocommerce_term_meta( $prod_cat->term_id, 'thumbnail_id', true );
                                        $shop_catalog_img = wp_get_attachment_image_src( $cat_thumb_id, 'shop_catalog', "full" );
                                        $term_link = get_term_link( $prod_cat, 'product_cat' );
                                        
                                        
                                               if( $shop_catalog_img[0] != "http://goldfinchwood.u1246912.cp.regruhosting.ru/wp-includes/images/media/default.png" ): ?>
                                                    <a href=" <?php echo get_term_link($prod_cat->slug, 'product_cat')?>">
                									<div class="mebel__mobile-item">
                    									<img src="<?php echo $shop_catalog_img[0]; ?>" alt="">
                    									<a href=" <?php echo get_term_link($prod_cat->slug, 'product_cat')?>" class="select_a_category_item_first">
                								    	    <p><?php echo $prod_cat->name ?></p>
                								    	</a>
                    								</div>
                                                </a>
                                               <?php 
                                               endif;
                                         endif;
                                      endforeach;
                                    wp_reset_query();?>
								
							</div>
						</div>
					</div>
				</section>

				<section class="section contact">
					<div class="contact__container _container">
						<div class="contact__inner">
							<div class="contact__cont">
								<div class="contact__title">
									<p>Контакты</p>
								</div>
								<div class="contact__adress adress-contact">
									<div class="adress-contact__title">
										<p>Адреса</p>
									</div>
									<div class="adress-contact__item _icon-arrow-right">
										<div class="adress-contact__item-inner">
											<p class="adress-contact__city"><?= get_field('text1', 22)?></p>
											<p class="adress-contact__building"><?= get_field('text2', 22)?></p>
											<p class="adress-contact__worktime"><?= get_field('text3', 22)?></p>
										</div>
									</div>
									<div class="adress-contact__item _icon-arrow-right">
										<div class="adress-contact__item-inner">
											<p class="adress-contact__city"><?= get_field('text4', 22)?></p>
											<p class="adress-contact__building"><?= get_field('text5', 22)?></p>
											<p class="adress-contact__worktime"><?= get_field('text6', 22)?></p>
										</div>
									</div>
								</div>
								<div class="contact__info info-contact">
									<div class="info-contact__title">
										<p>Способы связи</p>
									</div>
									<div class="info-contact__phone">
										<a href="tel:<?= get_field('text7', 22)?>" class="_icon-arrow-right"><?= get_field('text7', 22)?></a>
									</div>
									<div class="info-contact__mail">
										<a href="mailto:<?= get_field('text8', 22)?>" class="_icon-arrow-right"><?= get_field('text8', 22)?></a>
									</div>
									<div class="info-contact__social _icon-arrow-right">
										<a href="<?= get_field('instagram', 22)?>" class="_icon-insta"></a>
										<a href="<?= get_field('vk', 22)?>" class="_icon-vk"></a>
										<a href="<?= get_field('facebook', 22)?>" class="_icon-fb"></a>
										<a href="<?= get_field('youtube', 22)?>" class="_icon-yt"></a>
									</div>
								</div>
							</div>
							<div class="contact__map">
							<div id="map" style="width: 100%; height: 658px"></div>
								<!-- <div style="position:relative;overflow:hidden;"><a href="https://yandex.com/maps/213/moscow/?utm_medium=mapframe&utm_source=maps" style="color:#eee;font-size:12px;position:absolute;top:0px;">Moscow</a><a href="https://yandex.com/maps/geo/moskva/53166393/?ll=37.646930%2C55.725146&utm_medium=mapframe&utm_source=maps&z=10.44" style="color:#eee;font-size:12px;position:absolute;top:14px;">Moscow — Yandex.Maps</a><iframe src="https://yandex.com/map-widget/v1/-/CCUa4ITV0A" width="560" height="400" frameborder="1" allowfullscreen="true" style="position:relative;"></iframe></div> -->
							</div>
						</div>
					</div>
				</section>
			</main>
	 <?php get_footer()?>