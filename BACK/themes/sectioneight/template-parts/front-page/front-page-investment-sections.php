<?php

class Front_Page_Investment_Section
{
    public function __construct()
    {
        $section_investment = get_field('section_investment');
        $this->title = $section_investment['title'];
        $this->subtitle = $section_investment['subtitle'];
        $this->slider = $section_investment['slider'];
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

        <section class="investment" id="investment">
            <div class="container">
                <?php if(!empty($this->title)) : ?>
                <h2 class="section__title"><?php echo $this->title; ?></h2>
                <?php endif; ?>

                <?php if(!empty($this->subtitle)) : ?>
                <p class="section__text center"><?php echo $this->subtitle; ?> </p>
                <?php endif; ?>
                <div class="investment__block">
                    <?php if(!empty($this->slider)) : ?>
                    <div class="swiper investment__slider">
                        <div class="investment__list swiper-wrapper">
                            <?php foreach ($this->slider as $item) : ?>
                            <div class="investment__item swiper-slide">
                                <div class="investment__img img">
                                    <img src="<?php echo $item['image']; ?>" alt="">
                                </div>
                                <?php if(!empty($item['prices'])) : ?>
                                <div class="investment__price">
                                    <?php  ?>
                                    <?php foreach ($item['prices'] as $index => $price ) : ?>
                                    <?php $is_fourth = ($index === 3); ?>
                                    <div class="investment__price-item <?php echo $is_fourth ? 'bold' : ''; ?> ">
                                        <h3><?php echo $price['title']; ?></h3><span><?php echo $price['price']; ?></span>
                                    </div>
                                    <?php endforeach; ?>
                                </div>
                                <?php endif; ?>
                                <div class="investment__quote">
                                    <div class="investment__quote-img img">
                                        <img src="<?php echo $item['icon'] ?>" alt="">
                                    </div>
                                    <p class="investment__quote-text">
                                         <?php echo $item['text']; ?>
                                    </p>
                                </div>

                            </div>
                            <?php endforeach; ?>
                        </div>
                    </div>
                    <?php endif; ?>
                    <div class="investment__nav section__nav">
                        <button class="swiper-button-prev investment__prev section__prev"></button>
                        <div class="swiper-pagination investment__pagination section__pagination"></div>
                        <button class="swiper-button-next investment__next section__next"></button>
                    </div>
                </div>
            </div>
        </section>

<?php }}
