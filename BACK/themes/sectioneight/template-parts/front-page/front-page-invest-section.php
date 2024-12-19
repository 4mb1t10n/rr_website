<?php

class Front_Page_Invest_Section
{
    public function __construct()
    {
        $section_invest = get_field('section_invest');
        $this-> title = $section_invest['title'];
        $this-> list = $section_invest['list'];
        $this-> big_image = $section_invest['big_image'];
        $this-> text = $section_invest['text'];
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

        <section class="invest">
            <div class="container">
                <?php if(!empty($this->title)) : ?>
                <h2 class="section__title">
                    <?php echo $this->title; ?>
                </h2>
                <?php endif; ?>

                <?php if(!empty($this->text)): ?>
                <h2 class="section__text center">
                    <?php echo $this->text; ?>
                </h2>
                <?php endif;  ?>
                <?php if(!empty($this->list)) : ?>
                <div class="invest__list">
                    <?php foreach ($this->list as $item) : ?>
                        <div class="invest__item">
                            <div class="invest__img img">
                                <img src="<?php echo $item['image']; ?>" alt="">
                            </div>
                            <div class="invest__flex">
                                <h3 class="invest__title">
                                    <?php echo $item['title']; ?>
                                </h3>
                                <span class="invest__subtitle">
                            <?php echo $item['subtitle']; ?>
                        </span>
                            </div>
                        </div>
                    <?php endforeach; ?>
                </div>
                <?php endif; ?>

                <?php if(!empty($this->big_image)) : ?>
                <div class="invest__banner img">
                    <img src="<?php echo $this->big_image;?>" alt="">
                <?php endif; ?>

            </div>


        </section>

<?php }}
