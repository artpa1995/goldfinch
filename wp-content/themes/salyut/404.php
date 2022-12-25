<?php

get_header();
?>
<main class="page">
				<section class="section notfound">
					<div class="notfound__container _container">
						<div class="notfound__inner">
							<div class="notfound__left">
								<div class="notfound__suptitle">
								<?php echo do_shortcode("[greeting]"); ?>
									<p>УПС!</p>
								</div>
								<div class="notfound__title">
									<p>Страница не найдена</p>
								</div>
								<div class="notfound__text">
									<p>Пока мы исправляем это, вы можете ознакомиться с нашим каталогом :)</p>
								</div>
								<div class="notfound__link">
									<a href="/catalog/">Перейти в каталог</a>
								</div>
							</div>
							<div class="notfound__right">
								<img src="<?php echo get_template_directory_uri(); ?>/img/bg-404.png" alt="">
							</div>
						</div>
					</div>
				</section>
			</main>




<?php get_footer(); ?>