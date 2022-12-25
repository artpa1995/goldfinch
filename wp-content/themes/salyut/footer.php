<?php

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



?>

<footer class="footer">

    <div class="footer__container _container">

        <div class="footer__inner">



            <a href="/" class="footer__logo">

                <img src="<?php echo bloginfo("template_url"); ?>/img/logo-white.png" alt="">

            </a>



            <div class="footer__nav nav-footer">

                <div class="nav-footer__col">

                    <div class="nav-footer__title">

                        <p>Каталог</p>

                    </div>

                    <ul class="nav-footer__list">

                        

                        

                        

                                            <?php foreach(   category_dom() as $prod_cat ) :  ?>

                                                        

                                                     <?php $room  = get_field("room", 'product_cat_'.$prod_cat->term_id);?>

                                                         

                                                      <?php  $room =    $prod_cat->description;   ?>

                                                      

                                                            <?php if($prod_cat->category_parent == 0) : ?>

                                                            

                                                            

                                                             <li class="nav-footer__item">

                                                                 <a href=" <?php echo get_term_link($prod_cat->slug, 'product_cat')?>" class="menu-header__link"><?php echo $prod_cat->name ?></a>

                                                            </li>

                                                             

                                                 



                                                            <?php endif;?>

                                                  

                                               

                                                    

                                          <?php endforeach;?>

                                          

                                           <?php  wp_reset_query(); ?>

                        

                        

                        

                        

                        

                        

                        <!--<li class="nav-footer__item">-->

                        <!--    <a href="<? echo get_term_link($argssub["5"]->slug, 'product_cat');  ?>" class="nav-footer__link"><? echo $argssub["5"]->name; ?></a>-->

                        <!--</li>-->

                        <!--<li class="nav-footer__item">-->

                        <!--    <a href="<? echo get_term_link($argssub["14"]->slug, 'product_cat');  ?>" class="nav-footer__link"><? echo $argssub["14"]->name; ?></a>-->

                        <!--</li>-->

                        <!--<li class="nav-footer__item">-->

                        <!--    <a href="<? echo get_term_link($argssub["16"]->slug, 'product_cat');  ?>" class="nav-footer__link"><? echo $argssub["16"]->name; ?></a>-->

                        <!--</li>-->

                        <!--<li class="nav-footer__item">-->

                        <!--    <a href="<? echo get_term_link($argssub["12"]->slug, 'product_cat');  ?>" class="nav-footer__link"><? echo $argssub["12"]->name; ?></a>-->

                        <!--</li>-->

                        <!--<li class="nav-footer__item">-->

                        <!--    <a href="<? echo get_term_link($argssub["3"]->slug, 'product_cat');  ?>" class="nav-footer__link"><? echo $argssub["3"]->name; ?></a>-->

                        <!--</li>-->

                        <!--<li class="nav-footer__item">-->

                        <!--    <a href="<? echo get_term_link($argssub["10"]->slug, 'product_cat');  ?>" class="nav-footer__link"><? echo $argssub["10"]->name; ?></a>-->

                        <!--</li>-->

                        <!--<li class="nav-footer__item">-->

                        <!--    <a href="<? echo get_term_link($argssub["2"]->slug, 'product_cat');  ?>" class="nav-footer__link"><? echo $argssub["2"]->name; ?></a>-->

                        <!--</li>-->

                       

                    </ul>

                </div>



                <div class="nav-footer__col">

                    <div class="nav-footer__title">

                        <p>О компании</p>

                    </div>

                    <ul class="nav-footer__list">
                        

                        <li class="nav-footer__item">

                            <a href="/about/" class="nav-footer__link">О компании</a>

                        </li>

                        <li class="nav-footer__item">

                            <a href="/delivery/" class="nav-footer__link">Доставка</a>

                        </li>

                        <li class="nav-footer__item">

                            <a href="/guarantees/" class="nav-footer__link">Гарантии</a>

                        </li>

                        <li class="nav-footer__item">

                            <a href="/vacancies/" class="nav-footer__link">Вакансии</a>

                        </li>

                        <li class="nav-footer__item">

                            <a href="/payment-page/" class="nav-footer__link">Оплата</a>

                        </li>

                        <li class="nav-footer__item">

                            <a href="/return/" class="nav-footer__link">Возврат</a>

                        </li>

                        <li class="nav-footer__item">

                            <a href="/news/" class="nav-footer__link">Новости</a>

                        </li>

                        <li class="nav-footer__item">

                            <a href="/cooperation/" class="nav-footer__link">Сотрудничество</a>

                        </li>

                    </ul>

                </div>

            </div>



            <div class="nav-footer__contact">

                <div class="nav-footer__contact-phone">

                    <a href="tel:<?= get_field('tel1', 22)?>"><?= get_field('tel1', 22)?></a>

                    <a href="tel:<?= get_field('tel2', 22)?>"><?= get_field('tel2', 22)?></a>

                </div>

                <div class="nav-footer__mail">

                    <a href="mailto:<?= get_field('text8', 22)?>"><?= get_field('text8', 22)?></a>

                </div>

                <div class="nav-footer__social">

                   <a href="<?= get_field('instagram', 22)?>" class="_icon-insta"></a>

										<a href="<?= get_field('vk', 22)?>" class="_icon-vk"></a>

										<a href="<?= get_field('facebook', 22)?>" class="_icon-fb"></a>

										<a href="<?= get_field('youtube', 22)?>" class="_icon-yt"></a>

                </div>

            </div>

        </div>



        <div class="footer__copy">

            <p>‌‌‍‍JuctCode © 2021 - Goldfinchwoods</p>

        </div>



    </div>

</footer>

</div>

<div class="popup popup_popup">

    <div class="popup__content">

        <div class="popup__body">

            <div class="popup__close"></div>

        </div>

    </div>

</div>

<div class="popup popup_massagename-message">

    <div class="popup__content">

        <div class="popup__body">

            <div class="popup__close"></div>

        </div>

    </div>

</div>

<div class="popup popup_video">

    <div class="popup__content">

        <div class="popup__body">

            <div class="popup__close popup__close_video"></div>

            <div class="popup__video _video"></div>

        </div>

    </div>

</div>



<div id="myModal" class="modal">



  <!-- Modal content -->

  <div class="modal-content">

    <span class="close">&times;</span>

     <p class="call_modal_title" ></p>

    <div class="modal_contents">

        <h1 style="text-align: center; font-size:35px; font-weight: 700;">Обратный звонок</h1>

        <p style="text-align: center; font-size: 13px; margin-top:10px;">Веедите данные мы перезвоним вам </p>

        <div class="modal_content_inputs">

            <span class="call_inp_name_error erorrs_modal">введите ваше имя</span>

            <input type="text" name="имя" value="" placeholder="Имя*" class="modal_name modal_inputs">

            <span class="call_inp_phone_error erorrs_modal">введите ваш телефон</span>

            <input type="text" name="Телефон" value="" placeholder="Телефон*" class="modal_phone modal_inputs ">

            

        </div>

        <button class="modal_submit">Отправить</button>

        <p class="modal_text_footer" >Нажимая кнопку <<Отправить>>, вы соглашаетесь</p>

        <p class="modal_text_footer" style=" margin-top:8px;">с обработкой персональных данных</p>

    </div>

    

  </div>



</div>

<div class="product_name_popap"></div>


<!-- Swiper -->



<script src="<?php echo bloginfo("template_url"); ?>/js/vendors.min.js"></script>

<script src="<?php echo bloginfo("template_url"); ?>/js/app.min.js"></script>

</body>

</html>

<?php wp_footer();?>



