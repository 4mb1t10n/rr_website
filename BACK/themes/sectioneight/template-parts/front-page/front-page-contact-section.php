<?php

class Front_Page_Contact_Section
{
    public function __construct()
    {
        $section_contact = get_field('section_contact');
        $this->title = $section_contact['title'];
        $this->form_text_name = $section_contact['form_text_name'];
        $this->form_phone_text = $section_contact['form_phone_text'];
        $this->check_box_text = $section_contact['check_box_text'];
        $this->button = $section_contact['button'];
        $this->email_text = $section_contact['email_text'];
        $this->email = $section_contact['email'];
        $this->image_email = $section_contact['image_email'];
        $this->phone_text = $section_contact['phone_text'];
        $this->phone = $section_contact['phone'];
        $this->image_phone = $section_contact['image_phone'];
        $this->image = $section_contact['image'];
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

        <div class="contact" id="contact" style="display: none">
            <div class="container">
                <div class="contact__flex">
                    <div class="contact__form">
                        <form action="" class="form form__contact">
                            <?php if(!empty($this->title)) : ?>
                            <h2 class="section__title"><?php  echo $this->title; ?></h2>
                            <?php endif; ?>
                            <input type="hidden" name="action" value="contact">
                            <?php if(!empty($this->form_text_name)) : ?>
                            <div class="form__input">
                                <input type="text" name="name" placeholder="<?php echo $this->form_text_name; ?>">
                            </div>
                            <?php endif; ?>
                            <?php if(!empty($this->form_phone_text)) : ?>
                            <div class="form__input">
                                <input type="text" name="phone" placeholder="<?php echo $this->form_phone_text; ?>">
                            </div>
                            <?php endif; ?>

                            <?php if(!empty($this->check_box_text)) : ?>
                            <div class="form__checkbox">
                                <input type="checkbox" id="check" name="terms_conditions">
                                <label for="check"><?php echo $this->check_box_text; ?></label>
                            </div>
                            <?php endif; ?>
                            <?php if(!empty($this->button)) : ?>
                            <button class="section__button "><?php echo $this->button; ?></button>
                            <?php endif; ?>

                            <div class="form__link">
                                <?php if(!empty($this->phone) && !empty($this->phone_text) && !empty($this->image_phone)): ?>
                                <a href="tel:<?php echo $this->phone; ?>"> <div class="form__link-blue"><img src="<?php echo $this->image_phone; ?>" alt=""><span><?php echo $this->phone_text; ?></span></div><span><?php echo $this->phone; ?></span></a>
                                <?php endif; ?>

                                <?php if(!empty($this->email) && !empty($this->email_text) && !empty($this->image_email)): ?>
                                <a href="mailto:<?php echo $this->email; ?>"> <div class="form__link-blue"><img src="<?php echo $this->image_email; ?>" alt=""><span><?php echo $this->email_text; ?></span></div><span><?php echo $this->email; ?></span></a>
                                <?php endif; ?>
                            </div>
                        </form>
                    </div>
                    <?php if(!empty($this->image)) : ?>
                    <div class="contact__img img">
                        <img src="<?php echo $this->image; ?>" alt="">
                    </div>
                    <?php endif; ?>
                </div>

            </div>
        </div>


    <?php }}
