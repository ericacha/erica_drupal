<?php

function Untitled_headline_1() {
    global $bdpage_front_page;
    $bdpage_site_name  = variable_get('site_name', null);
    $bdpage_title      = variable_get('title', null);
    if ($bdpage_site_name) {
?>
    
    <div class=" bd-headline-1">
        <div class="bd-container-inner">
            <?php if ($bdpage_title): ?>
                <h1>
                    <a href="<?php print $bdpage_front_page; ?>" title="<?php print t('Home'); ?>" rel="home"><?php print $bdpage_site_name; ?></a>
                </h1>
            <?php else: /* Use h3 for a while instead of h1 when the content title is empty */ ?>
                <h3>
                    <a href="<?php print $bdpage_front_page; ?>" title="<?php print t('Home'); ?>" rel="home"><?php print $bdpage_site_name; ?></a>
                </h3>
            <?php endif; ?>
        </div>
    </div>
      
<?php
    }
}