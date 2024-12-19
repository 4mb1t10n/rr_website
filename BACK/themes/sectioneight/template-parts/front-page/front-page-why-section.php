<?php

class Front_Page_Why_Section
{
public function __construct()
{
  $section_why = get_field('section_why');
  $this->title = $section_why['title'];
  $this->why_items = $section_why['why_items'];
}

public function sectionStyles()
{
    return array();
}

public function sectionScripts()
{
    return array();
}

public function render()
{ ?>

<section class="why" id="why">
    <div class="container">
        <?php if(!empty($this->title)) : ?>
        <h2 class="section__title no-effect"><?php echo $this->title; ?></h2>
        <?php endif; ?>
        <div class="why__block">
            <div class="swiper why__slider">
                <?php if(!empty($this->why_items)) : ?>
                <div class="why__list swiper-wrapper">
                    <?php foreach ($this->why_items as $item) : ?>
                    <div class="why__item swiper-slide">
                        <div class="why__content">
                            <div class="why__img img">
                                <img src="<?php echo $item['image']; ?>" alt="">
                            </div>
                            <div class="why__right">
                                <div class="why__info">
                                    <h3><?php echo $item['title']; ?></h3>
                                    <p><?php echo $item['text']; ?></p>
                                </div>
                                <div class="why__nav section__nav">
                                    <button class="swiper-button-prev section__prev why__prev"></button>
                                    <button class="swiper-button-next section__next why__next"></button>
                                </div>
                            </div>
                        </div>
                    </div>
                    <?php endforeach; ?>
                </div>
                <?php endif; ?>
            </div>

        </div>
    </div>

</section>


<?php }
}