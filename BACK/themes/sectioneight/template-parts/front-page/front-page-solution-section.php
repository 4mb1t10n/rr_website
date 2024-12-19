<?php

class Front_Page_Solution_Section
{
public function __construct()
{
 $section_solution = get_field('section_solution');
 $this->title = $section_solution['title'];
 $this->subtitle = $section_solution['subtitle'];
 $this->slider = $section_solution['slider'];
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
<section class="solution">
    <div class="container">
        <?php if(!empty($this->title)) : ?>
        <h2 class="section__title"><?php echo $this->title; ?></h2>
        <?php endif; ?>

        <?php if(!empty($this->subtitle)) : ?>
        <h2 class="section__text center"><?php echo $this->subtitle; ?></h2>
        <?php endif; ?>
        <div class="solution__block">
            <div class="swiper solution__slider">
                <?php if(!empty($this->slider)) : ?>
                <div class="solution__list swiper-wrapper">
                    <?php foreach ($this->slider as $item) : ?>
                    <div class="solution__item swiper-slide">
                        <div class="solution__header">
                            <h2 class="solution__title"><?php echo $item['title']; ?></h2>
                            <div class="solution__icon img">
                                <img src="<?php echo $item['image'] ?>" alt="">
                            </div>
                        </div>
                        <p class="section__text">
                            <?php echo $item['text']; ?>
                        </p>
                    </div>
                    <?php endforeach; ?>
                </div>
                <?php endif; ?>
            </div>
            <div class="solution__nav section__nav">
                <button class="swiper-button-prev solution__prev section__prev"></button>
                <div class="swiper-pagination solution__pagination section__pagination"></div>
                <button class="swiper-button-next solution__next section__next"></button>

            </div>
        </div>
    </div>
</section>


<!--    <section class="solution">-->
<!--        <div class="container">-->
<!--            <h2 class="section__title">Our Full-Service Solution</h2>-->
<!--            <h2 class="section__text center">Advantages of cooperation with the company</h2>-->
<!--            <div class="solution__block">-->
<!--                <div class="swiper solution__slider">-->
<!--                    <div class="solution__list swiper-wrapper">-->
<!--                        <div class="solution__item swiper-slide">-->
<!--                            <div class="solution__header">-->
<!--                                <h2 class="solution__title">Advantage</h2>-->
<!--                                <div class="solution__icon img">-->
<!--                                    <img src="./img/coins.svg" alt="">-->
<!--                                </div>-->
<!--                            </div>-->
<!--                            <p class="section__text">-->
<!--                                A brief explanation of Section 8: Explain what the program A brief explanation of Section 8: Explain what the program is and how it guarantees a stable A brief explanation of Section 8: Explain what the program is and how it guarantees a stable A brief explanation of Section 8: Explain what the program is and how it guarantees a stable-->
<!--                            </p>-->
<!--                        </div>-->
<!--                        <div class="solution__item swiper-slide">-->
<!--                            <div class="solution__header">-->
<!--                                <h2 class="solution__title">Advantage</h2>-->
<!--                                <div class="solution__icon img">-->
<!--                                    <img src="./img/coins.svg" alt="">-->
<!--                                </div>-->
<!--                            </div>-->
<!--                            <p class="section__text">-->
<!--                                A brief explanation of Section 8: Explain what the program is and how it guarantees a stable A brief explanation of Section 8: Explain what the program is and how it guarantees a stable A brief explanation of Section 8: Explain what the program is and how it guarantees a stable-->
<!--                            </p>-->
<!--                        </div>-->
<!--                        <div class="solution__item swiper-slide">-->
<!--                            <div class="solution__header">-->
<!--                                <h2 class="solution__title">Advantage</h2>-->
<!--                                <div class="solution__icon img">-->
<!--                                    <img src="./img/coins.svg" alt="">-->
<!--                                </div>-->
<!--                            </div>-->
<!--                            <p class="section__text">-->
<!--                                A brief explanation of Section 8: Explain what the program is and how it guarantees a stable A brief explanation of Section 8: Explain what the program is and how it guarantees a stable A brief explanation of Section 8: Explain what the program is and how it guarantees a stable-->
<!--                            </p>-->
<!--                        </div>-->
<!---->
<!--                    </div>-->
<!--                </div>-->
<!--                <div class="solution__nav section__nav">-->
<!--                    <button class="swiper-button-prev solution__prev section__prev"></button>-->
<!--                    <div class="swiper-pagination solution__pagination section__pagination"></div>-->
<!--                    <button class="swiper-button-next solution__next section__next"></button>-->
<!---->
<!--                </div>-->
<!--            </div>-->
<!--        </div>-->
<!--    </section>-->
<?php }}