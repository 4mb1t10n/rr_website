<footer class="footer">
    <?php wp_footer(); ?>
    <div class="container">
        <?php
        $footer = get_field('footer_option','option');
        $logotype_footer = $footer['logotype_footer'];
        $text = $footer['text'];
        $title = $footer['title'];
        $phone = $footer['phone'];
        $email = $footer['email'];
        $socials = $footer['socials'];
        ?>
        <div class="footer__flex">
            <?php if(!empty($logotype_footer) && !empty($text)) : ?>
            <div class="footer__block">
                <div class="footer__logo img">
                    <img src="<?php echo $logotype_footer; ?>" alt="">
                </div>
                <p class="section__text"> <?php echo $text; ?></p>
            </div>
            <?php endif; ?>
            <div class="footer__block">
                <?php if(!empty($title)) : ?>
                <h2 class="footer__contact"><?php echo $title; ?></h2>
                <?php endif; ?>

                <?php if(!empty($phone)) : ?>
                <a href="tel:<?php echo $phone; ?>"><?php echo $phone; ?></a>
                <?php endif; ?>

                <?php if(!empty($email)) : ?>
                <a href="mailto:<?php echo $email; ?>"><?php echo $email; ?></a>
                <?php endif; ?>

                <?php if(!empty($socials)) : ?>
                <div class="footer__social">
                    <?php foreach ($socials as $social) : ?>
                    <a href="<?php echo $social['link'] ; ?>" class="img">
                        <img src="<?php echo $social['image_socials']; ?>" alt="">
                    </a>
                    <?php endforeach; ?>
                </div>
                <?php endif; ?>
            </div>
        </div>

    </div>
</footer>
<!-- /FOOTER -->
</div>

<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.4/jquery.min.js"></script>
<script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
<script type="text/javascript" src="<?= TEMPLATE_PATH ?>/scripts/plagins/device.js" ></script>
<script type="text/javascript" src="<?= TEMPLATE_PATH ?>/scripts/plagins/jquery.validate.min.js" ></script>
<script src="https://unpkg.com/aos@2.3.1/dist/aos.js"></script>
<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/gsap/3.12.5/gsap.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/gsap/3.12.5/ScrollTrigger.min.js "></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.13/js/select2.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/swiper@8/swiper-bundle.min.js"></script>
<script type="text/javascript" src="<?= TEMPLATE_PATH ?>/scripts/develop/index.js" ></script>

</body>
</html>