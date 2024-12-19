<?php

class Front_Page_Packages_Section
{
public function __construct()
{
    $section_packages = get_field('section_packages');
    $this->title = $section_packages['title'];
    $this->subtitle = $section_packages['subtitle'];
    $this->icon = $section_packages['icon'];
    $this->investment = $section_packages['investment'];
    $this->list = $section_packages['list'];
    $this->button = $section_packages['button'];
    $this->total_item = $section_packages['total_item'];
    $this->total_price_title = $section_packages['total_price_title'];
    $this->total_price = $section_packages['total_price'];
    $this->total_inclusive_title = $section_packages['total_inclusive_title'];
    $this->total_inclusive_price = $section_packages['total_inclusive_price'];
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

    <section class="packages">
        <div class="container">
            <?php if(!empty($this->title)) : ?>
            <h2 class="section__title"><?php echo $this->title; ?></h2>
            <?php endif; ?>
            <?php if(!empty($this->subtitle)) : ?>
            <p class="section__text center"><?php echo $this->subtitle; ?></p>
            <?php endif; ?>
            <div class="packages__block">

                <div class="packages__investment">
                    <?php if(!empty($this->icon)) : ?>
                    <div class="packages__investment-icon img">
                        <img src="<?php echo $this->icon; ?>" alt="">
                    </div>
                    <?php endif; ?>
                    <?php if(!empty($this->investment)) : ?>
                    <h3><?php echo $this->investment; ?></h3>
                    <?php endif; ?>

                    <?php if(!empty($this->list)) : ?>
                    <ul class="packages__investment-list">
                        <?php foreach ($this->list as $item) : ?>
                        <li><?php echo $item['text']; ?></li>
                        <?php endforeach; ?>
                    </ul>
                    <?php endif;?>
                    <?php if(!empty($this->button)) : ?>
                    <button class="section__button packages__reserved "><?php echo $this->button; ?></button>
                    <?php endif; ?>
                </div>

                <div class="packages__total">
                    <?php if(!empty($this->total_item)) : ?>
                    <ul class="packages__total-list">
                        <?php foreach ($this->total_item as $total_item) : ?>
                        <li class="packages__total-item">
                            <h2><?php echo $total_item['title']; ?></h2>
                            <span><?php echo $total_item['price']; ?></span>
                        </li>
                        <?php endforeach; ?>
                    </ul>
                    <?php endif; ?>
                    <div class="packages__total-bottom">
                        <?php if(!empty($this->total_price) && !empty($this->total_price_title)) : ?>
                        <div class="packages__total-price">
                            <h2><?php echo $this->total_price_title; ?></h2>
                            <h3><?php echo $this->total_price; ?></h3>
                        </div>
                        <?php endif; ?>
                        <?php if(!empty($this->total_inclusive_title) && !empty($this->total_inclusive_price)) : ?>
                        <div class="packages__total-inclusive">
                            <h2><?php echo $this->total_inclusive_title; ?></h2>
                            <h3><?php echo $this->total_inclusive_price; ?></h3>
                        </div>
                        <?php endif; ?>
                    </div>
                </div>
            </div>
        </div>

    </section>

<?php }}