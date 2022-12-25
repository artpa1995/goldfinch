<?php
get_header();
$sayt_url=  site_url();
// $argssub =  get_terms( 'product_cat', array(

//     'child_of'     => 0,

//     'taxonomy'     => $taxonomy,

//     'orderby'      => $orderby,

//     'title_li'     => $title,

// ));

$argssub =  get_terms( 'product_cat', array(

    'child_of'     => 0,

    'taxonomy'     => 'product_cat',

    'orderby'      => 'name',

    'show_count'   => 0,

    'pad_counts'   => 0,

    'hierarchical' => 1,

    'title_li'     => '',

    'hide_empty'   => 0

));

$sayt_url=  site_url();
$old_url_sort_price    = removeqsvar( 'sort_price');
$old_url_caliber       = removeqsvar( 'sort_caliber');
$old_url_duration      = removeqsvar( 'sort_duration');
if ( is_product_category() ){
    global $wp_query;
    $cat = $wp_query->get_queried_object();
    $slug  = $cat->slug;
}

?>

	<main class="page">

				<section class="navigate">

					<div class="navigate__container _container">

						<div class="navigate__inner">

							<a href="/" class="navigate__link">Главная</a>

							<p>/</p>

							<a href="/catalog/" class="navigate__link">Каталог</a>

							<p>/</p>

							<a href="#" class="navigate__link">  <?

                             if ( is_product_category() ){

                                global $wp_query;

                                $cat = $wp_query->get_queried_object();

                                echo $cat->name;

                            }

                             ?></a>

						</div>

					</div>

				</section>



				<section class="section category">

					<div class="category__container _container">

						<div class="category__inner">

							<div class="category__title">

								<p> <?

                             if ( is_product_category() ){

                                global $wp_query;

                                $cat = $wp_query->get_queried_object();

                                echo $cat->name;

                            }

                             ?></p>

							</div>

                            <form action="" method="get">

							<div class="category__cont">

                          

								<div class="category__filter filter-category">

									<div class="filter-category__title">

										<p>Категории</p>

									</div>

									<div class="filter-category__links links-filter">

										<ul data-spollers="0,min" class="links-filter__list">

										  <?php foreach(   category_dom() as $prod_cat ) : ?>

                                                        

                                                     <?php $room  = get_field("room", 'product_cat_'.$prod_cat->term_id);?>

                                                         

                                                     

                                                      

                                                            <?php if(empty($prod_cat->sub_categories) ):  ?>

                                                             

                                                                

                                                                  <li class="links-filter__item">

                    												<a href="<?php echo get_term_link($prod_cat->slug, 'product_cat')?>" class="links-filter__link"><?php echo $prod_cat->name ?></a>

                    											 </li>

                                                            <?php else:  ?>

                                                            

                                                              

                                                                 

                                                                 	<li class="links-filter__item links-filter__spoller">

                        												<button type="button"  data-spoller class="links-filter__spoller-btn _icon-arrow-right"><?php echo $prod_cat->name ?></button>

                        												<ul>

                        												    <?php foreach($prod_cat->sub_categories as $sub_cat ) : ?>

                            													<li>

                            														<a href="<?php echo get_term_link($sub_cat->slug, 'product_cat')?>"><?php echo $sub_cat->name ?></a>

                            													</li>

                        												 <?php endforeach;?>

                        													

                        												</ul>

                        											</li>



                                                            <?php endif;?>

                                                  

                                                

                                                    

                                          <?php endforeach;?>

                                          

                                           <?php  wp_reset_query(); ?>

										</ul>

									</div>



									<div class="filter-category__options">

                                        

										<div class="filter-category__options-title">

											<p>Фильтр</p>

										</div>

                                        

										<div class="filter-category__price">

											<div class="filter-category__price-title">

												<p>Цена</p>

											</div>

											<div class="filter-category__price-inputs">

												<input autocomplete="off" type="text" name="price1" data-error="Ошибка" data-value="От" class="input">

												<input autocomplete="off" type="text" name="price2" data-error="Ошибка" data-value="До" class="input" style="padding:10px!important">

											</div>

											<div class="filter-category__price-range">

												<input type="text" class="js-range-slider1 js-range-slider" name="my_range" value="" />

											</div>

										</div>



										<div class="filter-category__style">

											<div class="filter-category__style-title">

												<p>Стиль</p>

											</div>

                                           

											<label class="filter-category__style-item <?php echo isset($_GET['styles1']) && array_search("Эксклюзив",$_GET['styles1'],true) !== false ? "_active" : "" ?>">

												<input type="checkbox" hidden <?php isset($_GET['styles1']) && $_GET['styles1'] == 'Эксклюзив' ? "checked" : "" ?> name="styles1" value="Эксклюзив">

												<span><svg width="11" height="11" viewBox="0 0 11 11" fill="none" xmlns="http://www.w3.org/2000/svg">

													<path fill-rule="evenodd" clip-rule="evenodd" d="M10.6978 1.00269C10.938 1.18094 10.9883 1.5202 10.81 1.76045L4.58084 10.1563C4.48116 10.2906 4.325 10.3714 4.15775 10.3751C3.9905 10.3787 3.83093 10.3049 3.72544 10.1751L0.204602 5.84177C0.0159575 5.60959 0.0512483 5.26845 0.283426 5.0798C0.515604 4.89116 0.856748 4.92645 1.04539 5.15863L4.12641 8.95064L9.93999 1.11495C10.1182 0.874696 10.4575 0.824435 10.6978 1.00269Z" fill="#333333"/>

													</svg></span>

												<p>Эксклюзив</p>

											</label>

											<label class="filter-category__style-item <?php echo isset($_GET['styles2']) && array_search("Скандинавский",$_GET['styles2'],true) !== false ? "_active" : "" ?>">

												<input type="checkbox" hidden <?php isset($_GET['styles2']) && $_GET['styles2'] == 'style2' ? "checked" : "" ?> name="styles2" value="Скандинавский">

												<span><svg width="11" height="11" viewBox="0 0 11 11" fill="none" xmlns="http://www.w3.org/2000/svg">

													<path fill-rule="evenodd" clip-rule="evenodd" d="M10.6978 1.00269C10.938 1.18094 10.9883 1.5202 10.81 1.76045L4.58084 10.1563C4.48116 10.2906 4.325 10.3714 4.15775 10.3751C3.9905 10.3787 3.83093 10.3049 3.72544 10.1751L0.204602 5.84177C0.0159575 5.60959 0.0512483 5.26845 0.283426 5.0798C0.515604 4.89116 0.856748 4.92645 1.04539 5.15863L4.12641 8.95064L9.93999 1.11495C10.1182 0.874696 10.4575 0.824435 10.6978 1.00269Z" fill="#333333"/>

													</svg></span>

												<p>Скандинавский</p>

											</label>

											<label class="filter-category__style-item <?php echo isset($_GET['styles3']) && array_search("Рустика-кантри",$_GET['styles3'],true) !== false ? "_active" : "" ?>">

												<input type="checkbox" hidden <?php isset($_GET['styles3']) && $_GET['styles3'] == 'Рустика-кантри' ? "checked" : "" ?> name="styles3" value="Рустика-кантри">

												<span><svg width="11" height="11" viewBox="0 0 11 11" fill="none" xmlns="http://www.w3.org/2000/svg">

													<path fill-rule="evenodd" clip-rule="evenodd" d="M10.6978 1.00269C10.938 1.18094 10.9883 1.5202 10.81 1.76045L4.58084 10.1563C4.48116 10.2906 4.325 10.3714 4.15775 10.3751C3.9905 10.3787 3.83093 10.3049 3.72544 10.1751L0.204602 5.84177C0.0159575 5.60959 0.0512483 5.26845 0.283426 5.0798C0.515604 4.89116 0.856748 4.92645 1.04539 5.15863L4.12641 8.95064L9.93999 1.11495C10.1182 0.874696 10.4575 0.824435 10.6978 1.00269Z" fill="#333333"/>

													</svg></span>

												<p>Рустика кантри</p>

											</label>

											<label class="filter-category__style-item <?php echo isset($_GET['styles4']) && array_search("Винтажный",$_GET['styles4'],true) !== false ? "_active" : "" ?>">

												<input type="checkbox" hidden <?php isset($_GET['styles4']) && $_GET['styles4'] == 'Винтажный' ? "checked" : "" ?> name="styles4" value="Винтажный">

												<span><svg width="11" height="11" viewBox="0 0 11 11" fill="none" xmlns="http://www.w3.org/2000/svg">

													<path fill-rule="evenodd" clip-rule="evenodd" d="M10.6978 1.00269C10.938 1.18094 10.9883 1.5202 10.81 1.76045L4.58084 10.1563C4.48116 10.2906 4.325 10.3714 4.15775 10.3751C3.9905 10.3787 3.83093 10.3049 3.72544 10.1751L0.204602 5.84177C0.0159575 5.60959 0.0512483 5.26845 0.283426 5.0798C0.515604 4.89116 0.856748 4.92645 1.04539 5.15863L4.12641 8.95064L9.93999 1.11495C10.1182 0.874696 10.4575 0.824435 10.6978 1.00269Z" fill="#333333"/>

													</svg></span>

												<p>Винтажный</p>

											</label>

											<label class="filter-category__style-item <?php echo isset($_GET['styles5']) && array_search("Лофт",$_GET['styles5'],true) !== false ? "_active" : "" ?>">

												<input type="checkbox" hidden <?php isset($_GET['styles5']) && $_GET['styles5'] == 'Лофт' ? "checked" : "" ?> name="styles5" value="Лофт">

												<span><svg width="11" height="11" viewBox="0 0 11 11" fill="none" xmlns="http://www.w3.org/2000/svg">

													<path fill-rule="evenodd" clip-rule="evenodd" d="M10.6978 1.00269C10.938 1.18094 10.9883 1.5202 10.81 1.76045L4.58084 10.1563C4.48116 10.2906 4.325 10.3714 4.15775 10.3751C3.9905 10.3787 3.83093 10.3049 3.72544 10.1751L0.204602 5.84177C0.0159575 5.60959 0.0512483 5.26845 0.283426 5.0798C0.515604 4.89116 0.856748 4.92645 1.04539 5.15863L4.12641 8.95064L9.93999 1.11495C10.1182 0.874696 10.4575 0.824435 10.6978 1.00269Z" fill="#333333"/>

													</svg></span>

												<p>Лофт</p>

											</label>

											<label class="filter-category__style-item <?php echo isset($_GET['styles6']) && array_search("Восточный",$_GET['styles6'],true) !== false ? "_active" : "" ?>">

												<input type="checkbox" hidden <?php isset($_GET['styles6']) && $_GET['styles6'] == 'Восточный' ? "checked" : "" ?> name="styles6" value="Восточный">

												<span><svg width="11" height="11" viewBox="0 0 11 11" fill="none" xmlns="http://www.w3.org/2000/svg">

													<path fill-rule="evenodd" clip-rule="evenodd" d="M10.6978 1.00269C10.938 1.18094 10.9883 1.5202 10.81 1.76045L4.58084 10.1563C4.48116 10.2906 4.325 10.3714 4.15775 10.3751C3.9905 10.3787 3.83093 10.3049 3.72544 10.1751L0.204602 5.84177C0.0159575 5.60959 0.0512483 5.26845 0.283426 5.0798C0.515604 4.89116 0.856748 4.92645 1.04539 5.15863L4.12641 8.95064L9.93999 1.11495C10.1182 0.874696 10.4575 0.824435 10.6978 1.00269Z" fill="#333333"/>

													</svg></span>

												<p>Восточный</p>

											</label>

										</div>



										<div class="filter-category__price">

											<div class="filter-category__price-title">

												<p>Ширина (см)</p>

											</div>

											<div class="filter-category__price-inputs">

												<input autocomplete="off" type="text" name="x_index1" data-error="Ошибка" data-value="От" class="input">

												<input autocomplete="off" type="text" name="x_index2" data-error="Ошибка" data-value="До" class="input">

											</div>

											<div class="filter-category__price-range">

												<input type="text" class="js-range-slider2 js-range-slider" name="my_range" value="" />

											</div>

										</div>



										<div class="filter-category__price">

											<div class="filter-category__price-title">

												<p>Глубина (см)</p>

											</div>

											<div class="filter-category__price-inputs">

												<input autocomplete="off" type="text" name="z_index1" data-error="Ошибка" data-value="От" class="input">

												<input autocomplete="off" type="text" name="z_index2" data-error="Ошибка" data-value="До" class="input">

											</div>

											<div class="filter-category__price-range">

												<input type="text" class="js-range-slider3 js-range-slider" name="my_range" value="" />

											</div>

										</div>



										<div class="filter-category__price">

											<div class="filter-category__price-title">

												<p>Высота (см)</p>

											</div>

											<div class="filter-category__price-inputs">

												<input autocomplete="off" type="text" name="y_index1" data-error="Ошибка" data-value="От" class="input">

												<input autocomplete="off" type="text" name="y_index2" data-error="Ошибка" data-value="До" class="input">

											</div>

											<div class="filter-category__price-range">

												<input type="text" class="js-range-slider4 js-range-slider" name="my_range" value="" />

											</div>

										</div>



										<div class="filter-category__count">

											<p>Найдено <span class='filter-category__count_num'>0</span> товара</p>

											<a type="button" href="<?= $sayt_url?>">

												<svg width="15" height="15" viewBox="0 0 15 15" fill="none" xmlns="http://www.w3.org/2000/svg"><path d="M9.79822 10.5643C10.0098 10.7758 10.3527 10.7758 10.5643 10.5643C10.7758 10.3527 10.7758 10.0098 10.5643 9.79822L8.26616 7.50013L10.5643 5.20204C10.7758 4.9905 10.7758 4.64754 10.5643 4.43601C10.3527 4.22447 10.0098 4.22447 9.79822 4.43601L7.50013 6.7341L5.20203 4.43599C4.99049 4.22446 4.64753 4.22446 4.43599 4.43599C4.22446 4.64753 4.22446 4.99049 4.43599 5.20203L6.7341 7.50013L4.43599 9.79823C4.22446 10.0098 4.22446 10.3527 4.43599 10.5643C4.64753 10.7758 4.99049 10.7758 5.20203 10.5643L7.50013 8.26616L9.79822 10.5643Z" fill="#999999"/></svg>												

											</a>

										</div>

										<div class="filter-category__use">

											<button type="submit">Применить</button>

										</div>

                                        

									</div>



									



								</div>



								<div class="category__content content-category">

									<div class="content-category__top">

                                    <!-- <form action="" method="get"> -->

										<div class="content-category__open">

											<button  type="button"  class="_icon-arrow-right">Фильтр</button>

										</div>

										<? $price1    = removeqsvar( 'price1');?>

										<? $price2    = removeqsvar( 'price2');?>

										<? $z_index1  = removeqsvar('z_index1');?>

										<? $z_index2  = removeqsvar('z_index2');?>

										<? $z_index1  = removeqsvar('z_index1');?>

										<? $x_index1  = removeqsvar( 'x_index1');?>

										<? $x_index2  = removeqsvar( 'x_index2');?>

										<? $y_index1  = removeqsvar('y_index1');?>

										<? $y_index2  = removeqsvar('y_index2');?>

										<? $styles1   = removeqsvar('styles1');?>

										<? $styles2   = removeqsvar('styles2');?>

										<? $styles3   = removeqsvar('styles3');?>

										<? $styles4   = removeqsvar('styles4');?>

										<? $styles5   = removeqsvar('styles5');?>

										<? $styles6   = removeqsvar('styles6');?>

										

									<div class="content-category__keys">

									    

									

									

											<div class="content-category__keys-item" style="<?php echo isset($_GET['price1']) ? "" : "display:none" ?>">

												<p>Цена:от <?= $_GET['price1']; ?></p>

												<a type="button" href="<?= $price1 ?>">

													<svg width="15" height="15" viewBox="0 0 15 15" fill="none" xmlns="http://www.w3.org/2000/svg"><path d="M9.79822 10.5643C10.0098 10.7758 10.3527 10.7758 10.5643 10.5643C10.7758 10.3527 10.7758 10.0098 10.5643 9.79822L8.26616 7.50013L10.5643 5.20204C10.7758 4.9905 10.7758 4.64754 10.5643 4.43601C10.3527 4.22447 10.0098 4.22447 9.79822 4.43601L7.50013 6.7341L5.20203 4.43599C4.99049 4.22446 4.64753 4.22446 4.43599 4.43599C4.22446 4.64753 4.22446 4.99049 4.43599 5.20203L6.7341 7.50013L4.43599 9.79823C4.22446 10.0098 4.22446 10.3527 4.43599 10.5643C4.64753 10.7758 4.99049 10.7758 5.20203 10.5643L7.50013 8.26616L9.79822 10.5643Z" fill="#999999"/></svg>												

												</a>

											</div>

											<div class="content-category__keys-item" style="<?php echo isset($_GET['price2']) ? "" : "display:none" ?>">

												<p>Цена: <?= $_GET['price2']; ?> до</p>

												<a type="button" href="<?= $price2; ?>">

													<svg width="15" height="15" viewBox="0 0 15 15" fill="none" xmlns="http://www.w3.org/2000/svg"><path d="M9.79822 10.5643C10.0098 10.7758 10.3527 10.7758 10.5643 10.5643C10.7758 10.3527 10.7758 10.0098 10.5643 9.79822L8.26616 7.50013L10.5643 5.20204C10.7758 4.9905 10.7758 4.64754 10.5643 4.43601C10.3527 4.22447 10.0098 4.22447 9.79822 4.43601L7.50013 6.7341L5.20203 4.43599C4.99049 4.22446 4.64753 4.22446 4.43599 4.43599C4.22446 4.64753 4.22446 4.99049 4.43599 5.20203L6.7341 7.50013L4.43599 9.79823C4.22446 10.0098 4.22446 10.3527 4.43599 10.5643C4.64753 10.7758 4.99049 10.7758 5.20203 10.5643L7.50013 8.26616L9.79822 10.5643Z" fill="#999999"/></svg>												

												</a>

											</div>

											

											<div class="content-category__keys-item" style="<?php echo isset($_GET['x_index1']) ? "" : "display:none" ?>">

												<p>Ширина: от  <?= $_GET['x_index1']; ?> см</p>

												<a type="button" href="<?= $x_index1; ?>">

													<svg width="15" height="15" viewBox="0 0 15 15" fill="none" xmlns="http://www.w3.org/2000/svg"><path d="M9.79822 10.5643C10.0098 10.7758 10.3527 10.7758 10.5643 10.5643C10.7758 10.3527 10.7758 10.0098 10.5643 9.79822L8.26616 7.50013L10.5643 5.20204C10.7758 4.9905 10.7758 4.64754 10.5643 4.43601C10.3527 4.22447 10.0098 4.22447 9.79822 4.43601L7.50013 6.7341L5.20203 4.43599C4.99049 4.22446 4.64753 4.22446 4.43599 4.43599C4.22446 4.64753 4.22446 4.99049 4.43599 5.20203L6.7341 7.50013L4.43599 9.79823C4.22446 10.0098 4.22446 10.3527 4.43599 10.5643C4.64753 10.7758 4.99049 10.7758 5.20203 10.5643L7.50013 8.26616L9.79822 10.5643Z" fill="#999999"/></svg>												

												</a>

											</div>

												<div class="content-category__keys-item" style="<?php echo isset($_GET['x_index2']) ? "" : "display:none" ?>">

												<p>Ширина:  <?= $_GET['x_index2']; ?> см до</p>

												<a type="button" href="<?= $x_index2; ?>">

													<svg width="15" height="15" viewBox="0 0 15 15" fill="none" xmlns="http://www.w3.org/2000/svg"><path d="M9.79822 10.5643C10.0098 10.7758 10.3527 10.7758 10.5643 10.5643C10.7758 10.3527 10.7758 10.0098 10.5643 9.79822L8.26616 7.50013L10.5643 5.20204C10.7758 4.9905 10.7758 4.64754 10.5643 4.43601C10.3527 4.22447 10.0098 4.22447 9.79822 4.43601L7.50013 6.7341L5.20203 4.43599C4.99049 4.22446 4.64753 4.22446 4.43599 4.43599C4.22446 4.64753 4.22446 4.99049 4.43599 5.20203L6.7341 7.50013L4.43599 9.79823C4.22446 10.0098 4.22446 10.3527 4.43599 10.5643C4.64753 10.7758 4.99049 10.7758 5.20203 10.5643L7.50013 8.26616L9.79822 10.5643Z" fill="#999999"/></svg>												

												</a>

											</div>

											

												<div class="content-category__keys-item" style="<?php echo isset($_GET['y_index1']) ? "" : "display:none" ?>">

												<p>Высота: от  <?= $_GET['y_index1']; ?> см </p>

												<a type="button" href="<?= $y_index1; ?>">

													<svg width="15" height="15" viewBox="0 0 15 15" fill="none" xmlns="http://www.w3.org/2000/svg"><path d="M9.79822 10.5643C10.0098 10.7758 10.3527 10.7758 10.5643 10.5643C10.7758 10.3527 10.7758 10.0098 10.5643 9.79822L8.26616 7.50013L10.5643 5.20204C10.7758 4.9905 10.7758 4.64754 10.5643 4.43601C10.3527 4.22447 10.0098 4.22447 9.79822 4.43601L7.50013 6.7341L5.20203 4.43599C4.99049 4.22446 4.64753 4.22446 4.43599 4.43599C4.22446 4.64753 4.22446 4.99049 4.43599 5.20203L6.7341 7.50013L4.43599 9.79823C4.22446 10.0098 4.22446 10.3527 4.43599 10.5643C4.64753 10.7758 4.99049 10.7758 5.20203 10.5643L7.50013 8.26616L9.79822 10.5643Z" fill="#999999"/></svg>												

												</a>

											</div>

												<div class="content-category__keys-item" style="<?php echo isset($_GET['y_index2']) ? "" : "display:none" ?>">

												<p>Высота:  <?= $_GET['y_index2']; ?> см до</p>

												<a type="button" href="<?= $y_index2; ?>">

													<svg width="15" height="15" viewBox="0 0 15 15" fill="none" xmlns="http://www.w3.org/2000/svg"><path d="M9.79822 10.5643C10.0098 10.7758 10.3527 10.7758 10.5643 10.5643C10.7758 10.3527 10.7758 10.0098 10.5643 9.79822L8.26616 7.50013L10.5643 5.20204C10.7758 4.9905 10.7758 4.64754 10.5643 4.43601C10.3527 4.22447 10.0098 4.22447 9.79822 4.43601L7.50013 6.7341L5.20203 4.43599C4.99049 4.22446 4.64753 4.22446 4.43599 4.43599C4.22446 4.64753 4.22446 4.99049 4.43599 5.20203L6.7341 7.50013L4.43599 9.79823C4.22446 10.0098 4.22446 10.3527 4.43599 10.5643C4.64753 10.7758 4.99049 10.7758 5.20203 10.5643L7.50013 8.26616L9.79822 10.5643Z" fill="#999999"/></svg>												

												</a>

											</div>

												<div class="content-category__keys-item" style="<?php echo isset($_GET['z_index1']) ? "" : "display:none" ?>">

												<p>Глубина: от <?= $_GET['z_index1']; ?> см </p>

												<a type="button" href="<?= $z_index1; ?>">

													<svg width="15" height="15" viewBox="0 0 15 15" fill="none" xmlns="http://www.w3.org/2000/svg"><path d="M9.79822 10.5643C10.0098 10.7758 10.3527 10.7758 10.5643 10.5643C10.7758 10.3527 10.7758 10.0098 10.5643 9.79822L8.26616 7.50013L10.5643 5.20204C10.7758 4.9905 10.7758 4.64754 10.5643 4.43601C10.3527 4.22447 10.0098 4.22447 9.79822 4.43601L7.50013 6.7341L5.20203 4.43599C4.99049 4.22446 4.64753 4.22446 4.43599 4.43599C4.22446 4.64753 4.22446 4.99049 4.43599 5.20203L6.7341 7.50013L4.43599 9.79823C4.22446 10.0098 4.22446 10.3527 4.43599 10.5643C4.64753 10.7758 4.99049 10.7758 5.20203 10.5643L7.50013 8.26616L9.79822 10.5643Z" fill="#999999"/></svg>												

												</a>

											</div>

												<div class="content-category__keys-item" style="<?php echo isset($_GET['z_index2']) ? "" : "display:none" ?>">

												<p>Глубина:  <?= $_GET['z_index2'] ?> см до</p>

												<a type="button" href="<?= $z_index2; ?>">

													<svg width="15" height="15" viewBox="0 0 15 15" fill="none" xmlns="http://www.w3.org/2000/svg"><path d="M9.79822 10.5643C10.0098 10.7758 10.3527 10.7758 10.5643 10.5643C10.7758 10.3527 10.7758 10.0098 10.5643 9.79822L8.26616 7.50013L10.5643 5.20204C10.7758 4.9905 10.7758 4.64754 10.5643 4.43601C10.3527 4.22447 10.0098 4.22447 9.79822 4.43601L7.50013 6.7341L5.20203 4.43599C4.99049 4.22446 4.64753 4.22446 4.43599 4.43599C4.22446 4.64753 4.22446 4.99049 4.43599 5.20203L6.7341 7.50013L4.43599 9.79823C4.22446 10.0098 4.22446 10.3527 4.43599 10.5643C4.64753 10.7758 4.99049 10.7758 5.20203 10.5643L7.50013 8.26616L9.79822 10.5643Z" fill="#999999"/></svg>												

												</a>

											</div>

											

										

											

											

											<div class="content-category__keys-item" style="<?php echo isset($_GET['styles1']) ? "" : "display:none" ?>">

												<p> <?= $_GET['styles1']; ?></p>

												<a type="button" href="<?= $styles1 ?>">

													<svg width="15" height="15" viewBox="0 0 15 15" fill="none" xmlns="http://www.w3.org/2000/svg"><path d="M9.79822 10.5643C10.0098 10.7758 10.3527 10.7758 10.5643 10.5643C10.7758 10.3527 10.7758 10.0098 10.5643 9.79822L8.26616 7.50013L10.5643 5.20204C10.7758 4.9905 10.7758 4.64754 10.5643 4.43601C10.3527 4.22447 10.0098 4.22447 9.79822 4.43601L7.50013 6.7341L5.20203 4.43599C4.99049 4.22446 4.64753 4.22446 4.43599 4.43599C4.22446 4.64753 4.22446 4.99049 4.43599 5.20203L6.7341 7.50013L4.43599 9.79823C4.22446 10.0098 4.22446 10.3527 4.43599 10.5643C4.64753 10.7758 4.99049 10.7758 5.20203 10.5643L7.50013 8.26616L9.79822 10.5643Z" fill="#999999"/></svg>												

												</a>

											</div>

											<div class="content-category__keys-item" style="<?php echo isset($_GET['styles2']) ? "" : "display:none" ?>">

												<p> <?= $_GET['styles2']; ?></p>

												<a type="button" href="<?= $styles2 ?>">

													<svg width="15" height="15" viewBox="0 0 15 15" fill="none" xmlns="http://www.w3.org/2000/svg"><path d="M9.79822 10.5643C10.0098 10.7758 10.3527 10.7758 10.5643 10.5643C10.7758 10.3527 10.7758 10.0098 10.5643 9.79822L8.26616 7.50013L10.5643 5.20204C10.7758 4.9905 10.7758 4.64754 10.5643 4.43601C10.3527 4.22447 10.0098 4.22447 9.79822 4.43601L7.50013 6.7341L5.20203 4.43599C4.99049 4.22446 4.64753 4.22446 4.43599 4.43599C4.22446 4.64753 4.22446 4.99049 4.43599 5.20203L6.7341 7.50013L4.43599 9.79823C4.22446 10.0098 4.22446 10.3527 4.43599 10.5643C4.64753 10.7758 4.99049 10.7758 5.20203 10.5643L7.50013 8.26616L9.79822 10.5643Z" fill="#999999"/></svg>												

												</a>

											</div>

											<div class="content-category__keys-item" style="<?php echo isset($_GET['styles3']) ? "" : "display:none" ?>">

												<p> <?= $_GET['styles3']; ?></p>

												<a type="button" href="<?= $styles3 ?>">

													<svg width="15" height="15" viewBox="0 0 15 15" fill="none" xmlns="http://www.w3.org/2000/svg"><path d="M9.79822 10.5643C10.0098 10.7758 10.3527 10.7758 10.5643 10.5643C10.7758 10.3527 10.7758 10.0098 10.5643 9.79822L8.26616 7.50013L10.5643 5.20204C10.7758 4.9905 10.7758 4.64754 10.5643 4.43601C10.3527 4.22447 10.0098 4.22447 9.79822 4.43601L7.50013 6.7341L5.20203 4.43599C4.99049 4.22446 4.64753 4.22446 4.43599 4.43599C4.22446 4.64753 4.22446 4.99049 4.43599 5.20203L6.7341 7.50013L4.43599 9.79823C4.22446 10.0098 4.22446 10.3527 4.43599 10.5643C4.64753 10.7758 4.99049 10.7758 5.20203 10.5643L7.50013 8.26616L9.79822 10.5643Z" fill="#999999"/></svg>												

												</a>

											</div>

											<div class="content-category__keys-item" style="<?php echo isset($_GET['styles4']) ? "" : "display:none" ?>">

												<p><?= $_GET['styles4']; ?></p>

												<a type="button" href="<?= $styles4 ?>">

													<svg width="15" height="15" viewBox="0 0 15 15" fill="none" xmlns="http://www.w3.org/2000/svg"><path d="M9.79822 10.5643C10.0098 10.7758 10.3527 10.7758 10.5643 10.5643C10.7758 10.3527 10.7758 10.0098 10.5643 9.79822L8.26616 7.50013L10.5643 5.20204C10.7758 4.9905 10.7758 4.64754 10.5643 4.43601C10.3527 4.22447 10.0098 4.22447 9.79822 4.43601L7.50013 6.7341L5.20203 4.43599C4.99049 4.22446 4.64753 4.22446 4.43599 4.43599C4.22446 4.64753 4.22446 4.99049 4.43599 5.20203L6.7341 7.50013L4.43599 9.79823C4.22446 10.0098 4.22446 10.3527 4.43599 10.5643C4.64753 10.7758 4.99049 10.7758 5.20203 10.5643L7.50013 8.26616L9.79822 10.5643Z" fill="#999999"/></svg>												

												</a>

											</div>

											<div class="content-category__keys-item" style="<?php echo isset($_GET['styles5']) ? "" : "display:none" ?>">

												<p> <?= $_GET['styles5']; ?></p>

												<a type="button" href="<?= $styles5 ?>">

													<svg width="15" height="15" viewBox="0 0 15 15" fill="none" xmlns="http://www.w3.org/2000/svg"><path d="M9.79822 10.5643C10.0098 10.7758 10.3527 10.7758 10.5643 10.5643C10.7758 10.3527 10.7758 10.0098 10.5643 9.79822L8.26616 7.50013L10.5643 5.20204C10.7758 4.9905 10.7758 4.64754 10.5643 4.43601C10.3527 4.22447 10.0098 4.22447 9.79822 4.43601L7.50013 6.7341L5.20203 4.43599C4.99049 4.22446 4.64753 4.22446 4.43599 4.43599C4.22446 4.64753 4.22446 4.99049 4.43599 5.20203L6.7341 7.50013L4.43599 9.79823C4.22446 10.0098 4.22446 10.3527 4.43599 10.5643C4.64753 10.7758 4.99049 10.7758 5.20203 10.5643L7.50013 8.26616L9.79822 10.5643Z" fill="#999999"/></svg>												

												</a>

											</div>

											<div class="content-category__keys-item" style="<?php echo isset($_GET['styles6']) ? "" : "display:none" ?>">

												<p> <?= $_GET['styles6']; ?></p>

												<a type="button" href="<?= $styles6 ?>">

													<svg width="15" height="15" viewBox="0 0 15 15" fill="none" xmlns="http://www.w3.org/2000/svg"><path d="M9.79822 10.5643C10.0098 10.7758 10.3527 10.7758 10.5643 10.5643C10.7758 10.3527 10.7758 10.0098 10.5643 9.79822L8.26616 7.50013L10.5643 5.20204C10.7758 4.9905 10.7758 4.64754 10.5643 4.43601C10.3527 4.22447 10.0098 4.22447 9.79822 4.43601L7.50013 6.7341L5.20203 4.43599C4.99049 4.22446 4.64753 4.22446 4.43599 4.43599C4.22446 4.64753 4.22446 4.99049 4.43599 5.20203L6.7341 7.50013L4.43599 9.79823C4.22446 10.0098 4.22446 10.3527 4.43599 10.5643C4.64753 10.7758 4.99049 10.7758 5.20203 10.5643L7.50013 8.26616L9.79822 10.5643Z" fill="#999999"/></svg>												

												</a>

											</div>

											

										

            

										</div>

										<div class="content-category__filter">

											<select name="sort[]" class="form">

												<option value="1" <?php if(!isset($_GET['sort'])){ echo "selected='selected'";} echo isset($_GET['sort']) && $_GET['sort'][0] == '1'  ? "selected='selected'" : ""  ?> >Сначала в наличии</option>

												<option value="2" <?php if(!isset($_GET['sort'])){ echo "";} echo isset($_GET['sort']) && $_GET['sort'][0] == '2'  ? "selected='selected'" : ""  ?>>Сначала новые</option>

												<option value="3" <?php if(!isset($_GET['sort'])){ echo "";} echo isset($_GET['sort']) && $_GET['sort'][0] == '3'  ? "selected='selected'" : ""  ?>>Сначала старые</option>

											</select>

										</div>

                                

									</div>

                            

                                    <div class="content-category__items">

                        <?php



                            $paged = (get_query_var('page')) ? get_query_var('page') : 1;

                            $argscatpord = array(

                                'post_type'      => 'product',

                                'posts_per_page' => -1,

                                'product_cat'    => $slug,

                                'paged' => $paged,

                                'orderby'        => 'ASC',

                                'meta_query' => [],

                                'tax_query'      => array('relation' => 'AND')

                            );



                            if(!empty($_GET)) {

                                

                                if (isset($_GET['sort']) && $_GET['sort'][0] == '1'  ){

                                   

                                    // $argscatpord = array(

                                    //     'post_type'      => 'product',

                                    //     'posts_per_page' => -1,

                                    //     'product_cat'    => $slug,

                                    //     'paged' => $paged,

                                    //     'orderby'        => 'ASC',

                                    //     'meta_query' => [],

                                    //     'orderby' => 'meta_value_num',

                                    //     'order' => 'asc',

                                    //     'meta_key' => '_stock_status',

                                    //     'tax_query'      => array('relation' => 'AND', [

                                    //                                         '_stock_status' => [

                                    //                                             'key'     => '_stock_status',

                                    //                                             'compare' => 'EXISTS',

                                    //                                         ]])

                                    // );

                                     $argscatpord = array(

                                                            'post_type' => 'product',

                                                            'posts_per_page' => -1,

                                                            'product_cat'    => $slug,

                                                            'stock_status' => 'instock',

                                                            'meta_query' => array(

                                                                array(

                                                                    'key' => '_stock_status',

                                                                    'value' => 'instock'

                                                                ),

                                                                // array(

                                                                //     'key' => '_backorders',

                                                                //     'value' => 'no'

                                                                // ),

                                                            )

                                                        );

                                }

                                if (isset($_GET['sort']) && $_GET['sort'][0] == '2'  ){

                                    $argscatpord = array(

                                        'post_type'      => 'product',

                                        'posts_per_page' => -1,

                                        'product_cat'    => $slug,

                                        'paged' => $paged,

                                        'orderby'        => 'DESC',

                                        'meta_query' => [],

                                        'orderby' => 'meta_value_num',

                                        'order' => 'desc',

                                        'meta_key' => '_price',

                                        'tax_query'      => array('relation' => 'AND')

                                    );

                                }

                                if (isset($_GET['sort']) && $_GET['sort'][0]  == '3'  ){

                                    $argscatpord = array(

                                        'post_type'      => 'product',

                                        'posts_per_page' => -1,

                                        'product_cat'    => $slug,

                                        'paged' => $paged,

                                        'orderby'        => 'ASC',

                                        'meta_query' => [],

                                        'orderby' => 'meta_value_num',

                                        'order' => 'asc',

                                        'meta_key' => '_price',

                                        'tax_query'      => array('relation' => 'AND')

                                    );

                                }



                        

                                if(isset($_GET['styles'])) {

                                

                                    $efect_query = [ 

                                        'taxonomy'        => 'pa_styles',

                                        'field'           => 'slug',

                                        'terms'           =>  array(),

                                        'operator'        => 'IN'

                                    ];

                                    

                                    foreach($_GET['styles'] as $efects)  {        

                                

                                        $efect_query['terms'][] = $efects;

                                        

                                    }



                                    $argscatpord['tax_query'][] = $efect_query;



                                } 



                                if(isset($_GET['price1']) && isset($_GET['price2'])) {



                                

                                    $pricemin = isset($_GET['price1']) ? $_GET['price1'] : 0; 

                                    $pricemax = isset($_GET['price2']) ? $_GET['price2'] : 250000; 



                                    $price_query = 

                                        array(

                                            'key'     => '_price',

                                            'value'   => array($pricemin, $pricemax),

                                            'compare' => 'BETWEEN',

                                            'type'    => 'NUMERIC'

                                            ) ;



                                    $argscatpord['meta_query'][] = $price_query;



                                    ?>

                                    <script>

                                        $(".js-range-slider1").ionRangeSlider({

                                            type: "double",

                                            min: 0,

                                            max: 100000,

                                            from: "<?php  echo $pricemin ?>",

                                            to: "<?php  echo $pricemax ?>"

                                        });

                                    </script>

                                    <?php 



                                } 

                                



                            if(isset($_GET['sale'])) {



                                $sale_query = 

                                    array(

                                        'key'           => '_sale_price',

                                        'value'         => 0,

                                        'compare'       => '>',

                                        'type'          => 'numeric'

                                    );



                                $argscatpord['meta_query'][] = $sale_query;



                            } 



                            if(isset($_GET['x_index1']) && isset($_GET['x_index2'])) {



                                

                                $durationmin = isset($_GET['x_index1']) ? $_GET['x_index1'] : 0; 

                                $durationmax = isset($_GET['x_index2']) ? $_GET['x_index2'] : 250000; 

                            

                                ?>

                                <script>

                                        $(".js-range-slider2").ionRangeSlider({

                                            type: "double",

                                            min: 0,

                                            max: 500,

                                            from: "<?php echo $durationmin ?>",

                                            to: "<?php echo $durationmax ?>"

                                        });

                                </script>



                                <?php

                            

                                $duration_query_min1 = array(

                                    'key' => 'ширина-фильтр',

                                    'value'   => $durationmin,

                                    'compare' => '>=',

                                    'type'    => 'NUMERIC'

                                ) ;

                            

                                $duration_query_max1 = array(

                                    'key'     => 'ширина-фильтр',

                                    'value'   => $durationmax ,

                                    'compare' => '<=',

                                    'type'    => 'NUMERIC'

                                ) ;



                                $argscatpord['meta_query'][] = $duration_query_min1;

                                $argscatpord['meta_query'][] = $duration_query_max1;

                            

                            } 





                            if(isset($_GET['y_index1']) && isset($_GET['y_index2'])) {



                                

                                $durationmin = isset($_GET['y_index1']) ? $_GET['y_index1'] : 0; 

                                $durationmax = isset($_GET['y_index2']) ? $_GET['y_index2'] : 500; 

                            

                                ?>

                                <script>

                                        $(".js-range-slider4").ionRangeSlider({

                                            type: "double",

                                            min: 0,

                                            max: 500,

                                            from: "<?php echo $durationmin ?>",

                                            to: "<?php echo $durationmax ?>"

                                        });

                                </script>



                                <?php

                            

                                $duration_query_min1 = array(

                                    'key' => 'длина-фильтр',

                                    'value'   => $durationmin,

                                    'compare' => '>=',

                                    'type'    => 'NUMERIC'

                                ) ;

                            

                                $duration_query_max1 = array(

                                    'key'     => 'длина-фильтр',

                                    'value'   => $durationmax ,

                                    'compare' => '<=',

                                    'type'    => 'NUMERIC'

                                ) ;



                                $argscatpord['meta_query'][] = $duration_query_min1;

                                $argscatpord['meta_query'][] = $duration_query_max1;

                            

                            } 







                            if(isset($_GET['z_index1']) && isset($_GET['z_index2'])) {



                                

                                $durationmin = isset($_GET['z_index1']) ? $_GET['z_index1'] : 0; 

                                $durationmax = isset($_GET['z_index2']) ? $_GET['z_index2'] : 500; 

                            

                                ?>

                                <script>

                                        $(".js-range-slider3").ionRangeSlider({

                                            type: "double",

                                            min: 0,

                                            max: 500,

                                            from: "<?php echo $durationmin ?>",

                                            to: "<?php echo $durationmax ?>"

                                        });

                                </script>



                                <?php

                            

                                $duration_query_min1 = array(

                                    'key' => 'глубина-фильтр',

                                    'value'   => $durationmin,

                                    'compare' => '>=',

                                    'type'    => 'NUMERIC'

                                ) ;

                            

                                $duration_query_max1 = array(

                                    'key'     => 'глубина-фильтр',

                                    'value'   => $durationmax ,

                                    'compare' => '<=',

                                    'type'    => 'NUMERIC'

                                ) ;



                                $argscatpord['meta_query'][] = $duration_query_min1;

                                $argscatpord['meta_query'][] = $duration_query_max1;

                            

                            } 



                        

                    



                            if(isset($_GET['search'])) {

                                $search = $_GET['search'];

                            

                                $argscatpord = array(

                                    'post_type'      => 'product',

                                    's'           => $search,

                                    'posts_per_page' => 6,

                                    'orderby'        => 'ASC',

                                    'meta_query' => [],

                                    'tax_query'      => array('relation' => 'AND')

                                );



                            }

                        }

                        



                            $data_    = unserialize($_COOKIE['like_product']);

                            $data = $data_ === false ? [] : $data_;

                            $loop = new WP_Query( $argscatpord );



                            $count = 0;

                            if ( $loop->have_posts() ) :

                                while ( $loop->have_posts() ) : $loop->the_post();

                                global $product; 

                                

                                $product_id       = $product->get_id();

                                $price1           = $product->get_price();

                                $price2           = $product->get_regular_price();

                                $price_difference = round($price2-$price1);

                                $pracent          = round(100-($price1*100)/$price2);

                                $heart            = array_search(intval($product_id), $data );

                                $count            =  $count+1;

                                

                               

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

                                            <button type="button" class="favorite__slide-heart">

                                                <svg width="28" height="24" viewBox="0 0 28 24" fill="none" xmlns="http://www.w3.org/2000/svg">

                                                    <path d="M14 2.07645C10.7018 -0.792584 5.62976 -0.688505 2.4603 2.38868C-0.820101 5.57359 -0.820101 10.7374 2.4603 13.9223L12.0201 23.2038C13.1136 24.2654 14.8864 24.2654 15.9799 23.2038L25.5397 13.9223C28.8201 10.7374 28.8201 5.57359 25.5397 2.38868C22.3702 -0.688505 17.2982 -0.792584 14 2.07645Z" fill="#9E948A"/>

                                                </svg>												

                                            </button>

                                        </div>

                                        <!-- <img src="<?php echo bloginfo("template_url"); ?>/img/p1.png" alt=""> -->

                                        <?php $image = wp_get_attachment_image_src( get_post_thumbnail_id( $loop->post->ID ), 'single-post-thumbnail' );?>



                                           <a href="<?php echo get_permalink( $loop->post->ID ); ?>">  <img src="<?php  echo $image[0]; ?>" data-id="<?php echo $loop->post->ID; ?>" style="margin-top:50px"></a>

                                        <a href="<?php echo get_permalink( $loop->post->ID ); ?>"><p class="favorite__slide-title"><?php echo $product->get_name(); ?></p></a>

                                        <p class="favorite__slide-price"><?php echo $product->get_regular_price();?>  ₽</p>

                                        

                                        <div class="favorite__slide-buttons">

                                            <button type="button" class="favorite__slide-favoriteBtn _icon-fav like_open" name="<? echo  $product_id;?>">В избранное</button>

                                            <button type="button" class="favorite__slide-cartBtn _icon-cart add_cart" name="<? echo  $product_id ;?>"> <input type="hidden" value="<?php echo $product->get_name(); ?>" class="productsname">В корзину</button>

                                        </div>

                                    </div>

                                    

                

                         <?php   endwhile;?>

                            <?  else:?>

                            <style>

                                .content-category__items{

                                    grid-template-columns: auto!important;

                                }

                            </style>

                             <div class="singe__empty">

                                <div class="favorite__empty">

        								<div class="favorite__empty-text">

        									<p>Увы, сейчас здесь пусто, но&nbsp;мы&nbsp; это&nbsp;уже исправляем :)</p>

        								</div>

        								<div class="favorite__empty-link">

        									<a href="/catalog/">Перейти в каталог</a>

        								</div>

        							</div>

        						</div

                         

                          <?   endif;?>



            </div>

								</div>

							</div>

                            </form>

                         

						</div>

					</div>

				</section>

			</main>

			    <script>

                            var currentLocation = window.location;

                             $('.filter-category__count').find('a').attr("href", currentLocation.pathname);

                             

                             $('.filter-category__count_num').html('<?= $count;?>')

                         </script>

       

       

<?php get_footer(); ?>