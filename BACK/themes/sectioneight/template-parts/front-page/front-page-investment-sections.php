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
                                <div class="investment__address">
                                    <h3><?php echo $item['adress']; ?></h3>
                                </div>
                                <?php if (!empty($item['prices_left']) && !empty($item['prices_right'])) : ?>
                                    <div class="investment__price-wrap">

                                        <div class="investment__price">
                                            <?php foreach ($item['prices_left'] as $price_left) : ?>
                                                <?php

                                                $is_bold = !empty($price_left['bold']) && $price_left ['bold'];
                                                ?>
                                                <div class="investment__price-item <?php echo $is_bold ? 'bold' : ''; ?>">
                                                    <h3><?php echo $price_left['title']; ?></h3><span><?php echo $price_left['price']; ?></span>
                                                </div>
                                            <?php endforeach; ?>
                                        </div>

                                        <div class="investment__price">
                                            <?php foreach ($item['prices_right'] as  $price_right) : ?>
                                                <?php

                                                $is_bold = !empty($price_right['bold']) && $price_right['bold'];
                                                ?>
                                                <div class="investment__price-item <?php echo $is_bold ? 'bold' : ''; ?>">
                                                    <h3><?php echo $price_right['title']; ?></h3><span><?php echo $price_right['price']; ?></span>
                                                </div>
                                            <?php endforeach; ?>
                                        </div>
                                    </div>
                                <?php endif; ?>
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
