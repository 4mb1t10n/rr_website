<?php /*Template Name: Front Page*/ ?>
<?php var_dump(14);die; ?>
<?php
global $this_page_styles;
global $this_page_scripts;
$pageSections = [
    new Front_Page_Banner_Section(),
    new Front_Page_Why_Section(),
    new Front_Page_Invest_Section(),
    new Front_Page_Statistics_Section(),
    new Front_Page_Solution_Section(),
    new Front_Page_Works_Section(),
    new Front_Page_Investment_Section(),
    new Front_Page_Packages_Section(),
    new Front_Page_Contact_Section(),
    new Front_Page_Faq_Section(),
];

$this_page_styles = [];
$this_page_scripts = [];

foreach ($pageSections as $pageSection) {
    $this_page_styles = array_merge($this_page_styles, $pageSection->sectionStyles());
    $this_page_scripts = array_merge($this_page_scripts, $pageSection->sectionScripts());
}

get_header();

foreach ($pageSections as $pageSection) {
    $pageSection->render();
}
get_footer(); ?>