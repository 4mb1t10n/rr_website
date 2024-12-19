<?php

class Front_Page_Faq_Section
{
public function __construct()
{
    $section_faq = get_field('section_faq');
    $this->title = $section_faq['title'];
    $this->subtitle = $section_faq['subtitle'];
    $this->list = $section_faq['list'];
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

<section class="faq" id="faq">
    <div class="container ">
        <?php if(!empty($this->title)) : ?>
        <h2 class="section__title"><?php echo $this->title; ?></h2>
        <?php endif; ?>
        <?php if(!empty($this->subtitle)) : ?>
        <h2 class="section__text center"><?php echo $this->subtitle; ?> </h2>
        <?php endif; ?>
        <?php if(!empty($this->list)) : ?>
        <ul class="faq__list">
            <?php foreach ($this->list as $item) : ?>
            <li class="faq__item">
                <div class="faq__header">
                    <h3><?php echo $item['header']; ?></h3>
                </div>
                <div class="faq__content content">
                    <p><?php echo $item['content']; ?></p>
                </div>
            </li>
            <?php endforeach; ?>
        </ul>
        <?php endif; ?>

    </div>
</section>

<?php }}