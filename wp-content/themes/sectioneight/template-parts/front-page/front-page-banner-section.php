<?php

class Front_Page_Banner_Section
{
public function __construct()
{
    $section_banner = get_field('section_banner');
    $this->title = $section_banner['title'];
    $this->text = $section_banner['text'];
    $this->text_button = $section_banner['text_button'];
    $this->youtube = $section_banner['youtube'];
    $this->image_banner = $section_banner['image_banner'];
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

<section class="banner">
    <div class="container">
        <div class="banner__flex">
            <div class="banner__info">
                <?php if(!empty($this->title)) : ?>
                <h1 class="banner__title"><?php echo $this->title; ?></h1>
                <?php endif; ?>

                <?php if(!empty($this->text)) : ?>
                <p class="section__subtitle"><?php echo $this->text; ?></p>
                <?php endif;  ?>

                <?php if(!empty($this->text_button)) : ?>
                <button class="section__button"><?php echo $this->text_button ?></button>
                <?php endif; ?>
            </div>



            <?php if(!empty($this->image_banner) && !empty($this->youtube)) : ?>
            <div class="banner__img ">
                <div class="banner__video img">
                    <img class="banner__video-poster" src="<?php echo $this->image_banner; ?>" data-video="https://www.youtube.com/embed/<?php echo GetYouTubeId($this->youtube); ?>">
                    <div class="banner__video-play"></div>
                </div>
            </div>
            <?php endif; ?>
        </div>
    </div>

</section>

<?php }}