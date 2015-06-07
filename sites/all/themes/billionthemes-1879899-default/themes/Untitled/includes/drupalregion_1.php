<?php
    function Untitled_drupalregion_1() {
        global $bdpage_drupalregion_1;
        $is_preview = Untitled_has_url_param('theme');

        $current_region_content = empty($bdpage_drupalregion_1) ? '' : trim(render($bdpage_drupalregion_1));

        if ($current_region_content || $is_preview) {

            if (!$current_region_content && $is_preview) {
                echo '<!-- empty::begin -->';
            }

            ?>
            <div class=" bd-drupalregion-13"<?php if ($is_preview): ?> data-position="Drupal Region 1"<?php endif ?>>
                <?php echo $current_region_content; ?>
            </div>
            <?php

            if (!$current_region_content && $is_preview) {
                echo '<!-- empty::end -->';
            }
        }

        return $current_region_content;
    }