<?php
/*
    Template name: about
*/
// session_start();

get_header();
?>
          <main class="page">


				<section class="navigate">
					<div class="navigate__container _container">
						<div class="navigate__inner">
							<a href="/" class="navigate__link">Главная</a>
							<p>/</p>
							<a href="#" class="navigate__link">О компании</a>
						</div>
					</div>
				</section>


				<section class="section about-info">
					<div class="about-info__container _container">
						<div class="about-info__inner">
							<div class="about-info__title">
								<p>О компании</p>
							</div>
							<div class="about-info__cont">


								<div class="about-info__left">
									<p class="about-info__text"><?= get_field('text1', 15);?></p>
									<p class="about-info__adress"><?= get_field('text2', 15);?></p>
									<div class="about-info__required">Обязательно к прочтению: <a href="#">Качество изготовления изделий</a></div>
									<p class="about-info__bold"><?= get_field('text3', 15);?></p>
									<p class="about-info__author"><?= get_field('text4', 15);?></p>
									<div class="about-info__code">
										<p><?= get_field('text5', 15);?></p>
										<p><?= get_field('text5-2', 15);?></p>
									</div>
								</div>


								<div class="about-info__right">
								    <?= get_field('video', 15)?>
								</div>


							</div>
						</div>
					</div>
				</section>


				<section class="section about">
					<div class="about__title">
						<div class="about__title-container _container-small">
							<p>Фото наших изделий из разных пород дерева</p>
						</div>
					</div>
					<div class="about__container _container">
						<div class="about__inner">
							<div class="about__controls">
								<div class="about__button-prev _icon-arrow-right"></div>
								<div class="swiper-pagination about__pagination"></div>
								<div class="about__button-next _icon-arrow-right"></div>
								<div class="about__decor-def"></div>
							</div>


							<div class="swiper about__slider">
								<div class="swiper-wrapper about__wrapper">


							


									<? 
											if( have_rows('фото') ):

												// Loop through rows.
												while( have_rows('фото') ) : the_row();  ?>

												<label class="single__color-item ">
														<input type="checkbox" hidden value="<?= $sub_value = get_sub_field('цена',$product_id );?>" name="<?= $sub_value = get_sub_field('цена',$product_id );?>" class="color_price" data-text="<?= $sub_value = get_sub_field('текст-цвета',$product_id );?>">
														<img src="<?= $sub_value = get_sub_field('img',$product_id );?>" alt="" class="img_for_color">
													</label>
													
													
															<div class="swiper-slide about__slide">
                        										<div class="about__slide-item">
                        											<p><?= $sub_value = get_sub_field('name',15 );?></p>
                        											<img src="<?= $sub_value = get_sub_field('up',15 );?>" alt="">
                        										</div>
                        										<div class="about__slide-item">
                        											<p><?= $sub_value = get_sub_field('name2',15 );?></p>
                        											<img src="<?= $sub_value = get_sub_field('down',15 );?>" alt="">
                        										</div>
                        									</div>

    										<?	endwhile;
												else : echo "";
																				
											endif; ?>

								


							</div>
						</div>
					</div>


							<div class="about__mobile-cont">
								<div class="about__mobile-item">
									<img src="<?php echo bloginfo("template_url"); ?>/img/about-slider.png" alt="">
									<p>Кровать из массива сосны "Двуспальная кровать с реечным изголовьем"</p>
								</div>
							</div>
					</div>
				</section>


			</main>
         

<?php
   get_footer();
?>

