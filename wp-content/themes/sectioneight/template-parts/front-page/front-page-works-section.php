<?php

class Front_Page_Works_Section
{
public function __construct()
{
    $section_works = get_field('section_works');
    $this->title = $section_works['title'];
    $this->subtitle = $section_works['subtitle'];
    $this->list = $section_works['list'];
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

<section class="works" id="works">
    <div class="container">
        <div class="works__sticky">
            <?php if(!empty($this->title)) : ?>
                <h2 class="section__title"><?php echo $this->title; ?></h2>
            <?php endif; ?>
            <?php if(!empty($this->subtitle)) : ?>
                <h2 class="section__text center"><?php echo $this->subtitle; ?> </h2>
            <?php endif; ?>
        </div>
        <?php if(!empty($this->list)) : ?>
            <div class="works__block">
                <div class="works__gradient"> </div>
                <ul class="works__list">
                    <?php foreach ($this->list as $item) : ?>
                    <li class="works__item">
                        <div class="works__count"><?php echo $item['count']; ?></div>

                        <div class="works__content">
                            <h3 class="works__content-title"><?php echo $item['title']; ?></h3>
                            <div class="works__content-info" >
                                <div class="img">
                                    <img src="<?php echo $item['image']; ?>" alt="">
                                </div>
                                <ul class="works__content-list" >
                                    <?php foreach($item['contents'] as $content ) : ?>
                                    <li><?php echo $content['text']; ?></li>
                                    <?php endforeach; ?>
                                </ul>
                            </div>
                        </div>
                    </li>
                    <?php endforeach; ?>
                </ul>
            </div>
        <?php endif; ?>


    </div>
    <!--        <div class="swipe-section">-->
    <!--            <div class="panel">Panel 1</div>-->
    <!--            <div class="panel y-100">Panel 2</div>-->
    <!--            <div class="panel y-100">Panel 3</div>-->
    <!--        </div>-->
</section>

<?php }}