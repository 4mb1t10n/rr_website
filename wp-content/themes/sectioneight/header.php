<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title></title>

    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1.0, user-scalable=no">

    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper@8/swiper-bundle.min.css"/>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.13/css/select2.min.css"/>
    <link rel="stylesheet" href="https://code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
    <link rel="stylesheet" href="https://code.jquery.com/ui/1.12.1/themes/smoothness/jquery-ui.css">
    <!--    <link rel="stylesheet" href="https://unpkg.com/swiper/swiper-bundle.min.css">-->
    <link rel="stylesheet" href="<?= TEMPLATE_PATH ?>/styles/normalize.css">
    <link rel="stylesheet" href="<?= TEMPLATE_PATH ?>/styles/critical.css">
    <link rel="stylesheet" href="<?= TEMPLATE_PATH ?>/styles/index.css">

</head>
<?php wp_head(); ?>
<body>

<?php
$header = get_field('header_option', 'option');
$logotype = $header['logotype_header'];
$menu = $header['menu'];
$image_phone = $header['image_phone'];
$phone = $header['phone'];
$mobile_clouse = $header['mobile_close'];
?>

<div class="wrap">
    <!-- HEADER -->
    <header class="header" >
        <div class="container">
            <div class="header__flex">
                <div class="header__burger"><span></span><span></span><span></span></div>
                <div class="header__block">
                    <?php if(!empty($logotype)) : ?>
                    <a class="header__logo img " href="./../index.html">
                        <img src="<?php echo $logotype; ?>" alt="Logo">
                    </a>
                    <?php endif; ?>

                    <div class="header__menu">
                        <?php if(!empty($menu)) : ?>
                        <div class="header__menu-list">
                            <?php foreach ($menu as $item) : ?>
                            <a href="<?php echo $item['menu_item']['url']?>"><?php echo $item['menu_item']['title'];?></a>
                            <?php endforeach; ?>
                        </div>
                        <?php endif; ?>
                    </div>
                </div>
                <div class="header__right">
                    <?php if(!empty($image_phone) && !empty($phone)) : ?>
                    <a href="tel:<?php echo $phone; ?>" class="header__phone ">
                        <span class="img"> <img src="<?php echo $image_phone; ?>" alt=""></span>
                        <span><?php echo $phone; ?></span>
                    </a>

                    <a class="header__phone-mob img" href="tel:<?php echo $phone; ?>">
                        <img src="<?php echo $image_phone; ?>" alt="">
                    </a>
                    <?php endif; ?>

                    <?php  ?>

                    <?php if(!empty($mobile_clouse)) : ?>
                    <button class="header__close">
                        <img src="<?php echo $mobile_clouse; ?>" alt="">
                    </button>
                    <?php endif; ?>
                </div>
            </div>
        </div>
    </header>


    <?php
    $thank = get_field('thank', 'option');
    $title = $thank['title'];
    $text = $thank['text'];
    $image_close = $thank['image_close'];
    ?>
    <div class="modal modal__thank">
        <div class="modal__wrap">
            <div class="modal__content ">
                <?php if(!empty($image_close)) : ?>
                <div class="modal__close img">
                    <img src="<?php echo $image_close; ?>" alt="">
                </div>
                <?php endif; ?>
                <div class="modal__overflow">
                    <?php if(!empty($title) && !empty($text)) : ?>
                    <div class="modal__block">
                        <h3 class="section__title"><?php echo $title; ?> </h3>
                        <p class="section__text"><?php echo $text; ?></p>
                    </div>
                    <?php endif; ?>
                </div>
            </div>
        </div>
    </div>

    <?php
    $modal_form = get_field('modal_form', 'option');
    $title = $modal_form['title'];
    $text_form_name = $modal_form['text_form_name'];
    $text_form_phone = $modal_form['text_form_phone'];
    $text_check_box = $modal_form['text_check_box'];
    $button = $modal_form['button'];
    $image_close = $modal_form['image_close'];

    ?>
    <div class="modal modal__contact">
        <div class="modal__wrap">
            <div class="modal__content ">
                <?php if(!empty($image_close)) : ?>
                <div class="modal__close img">
                    <img src="<?php echo $image_close; ?>" alt="">
                </div>
                <?php endif; ?>
                <div class="modal__overflow">
                    <form action="" class="form form__contact-modal">
                        <?php if(!empty($title)) : ?>
                        <h2 class="section__title"><?php echo $title; ?></h2>
                        <?php endif; ?>
                        <input type="hidden" name="action" value="contact">
                        <?php if(!empty($text_form_name)) : ?>
                        <div class="form__input">
                            <input type="text" name="name" placeholder="<?php echo $text_form_name;?>">
                        </div>
                        <?php endif; ?>
                        <?php if(!empty($text_form_phone)) : ?>
                        <div class="form__input">
                            <input type="text" name="phone" placeholder="<?php echo $text_form_phone; ?>">
                        </div>
                        <?php endif; ?>
                        <?php if(!empty($text_check_box)) : ?>
                        <div class="form__checkbox">
                            <input type="checkbox" id="check1" name="terms_conditions">
                            <label for="check1"><?php echo $text_check_box; ?></label>
                        </div>
                        <?php endif; ?>
                        <?php if(!empty($button)) : ?>
                        <button class="section__button "><?php echo $button; ?></button>
                        <?php endif; ?>

                    </form>

                </div>
            </div>
        </div>
    </div>
    <div class="modal modal__video">
        <div class="modal__wrap">
            <div class="modal__content ">
                <div class="modal__close img">
                    <img src="<?php echo $image_close; ?>" alt="">
                </div>
                <div class="modal__overflow">
                    <div class="modal__video-content">
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="modal modal__thank">
        <div class="modal__wrap">
            <div class="modal__content ">
                <div class="modal__close img">
                    <img src="<?php echo $image_close; ?>" alt="">
                </div>
                <div class="modal__overflow">
                    <div class="modal__block">
                        <h3 class="section__title">Thank you! </h3>
                        <p class="section__text">text text text</p>
                    </div>
                </div>
            </div>
        </div>
    </div>