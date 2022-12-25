<?php
/*
    Template name: contact
*/
// session_start();

get_header();
?>
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
										<a href="#" class="_icon-arrow-right"><?= get_field('text7', 22)?></a>
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
								<!-- <div style="position:relative;overflow:hidden;"><a href="https://yandex.com/maps/213/moscow/?utm_medium=mapframe&amp;utm_source=maps" style="color:#eee;font-size:12px;position:absolute;top:0px;">Moscow</a><a href="https://yandex.com/maps/geo/moskva/53166393/?ll=37.646930%2C55.725146&amp;utm_medium=mapframe&amp;utm_source=maps&amp;z=10.44" style="color:#eee;font-size:12px;position:absolute;top:14px;">Moscow — Yandex.Maps</a><iframe src="https://yandex.com/map-widget/v1/-/CCUa4ITV0A" width="560" height="400" frameborder="1" allowfullscreen="true" style="position:relative;"></iframe></div> -->
									<div id="map" style="width: 100%; height: 658px"></div>
							</div>
						</div>
					</div>
				</section>
         
<?php
   get_footer();
?>


