<?php

get_header();

/*
    Template name: Guarantees
*/

?>
 <main class="page">


<section class="navigate">
	<div class="navigate__container _container">
		<div class="navigate__inner">
			<a href="/" class="navigate__link">Главная</a>
			<p>/</p>
			<a href="#" class="navigate__link"><?php echo get_the_title(); ?></a>
		</div>
	</div>
</section>



<section class="section about-info">
	<div class="about-info__container _container">
		<div class="about-info__inner">
			<div class="about-info__title">
				<p><?php echo get_the_title(); ?></p>
			</div>
			 <div class=" _container">
		 
				<p style="line-height: 21px; font-size: 18px;"> <?php echo get_the_content(); ?> </p>	
			</div>
		
		</div>
	</div>
</section>





</main>

                    


<?php get_footer()?>