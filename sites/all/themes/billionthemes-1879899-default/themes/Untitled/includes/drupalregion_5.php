<?php
    function Untitled_drupalregion_5() {
        global $bdpage_drupalregion_5;
        $is_preview = Untitled_has_url_param('theme');

        $current_region_content = empty($bdpage_drupalregion_5) ? '' : trim(render($bdpage_drupalregion_5));

        if ($current_region_content || $is_preview) {

            if (!$current_region_content && $is_preview) {
                echo '<!-- empty::begin -->';
            }

            ?>
            <div class=" bd-drupalregion-6"<?php if ($is_preview): ?> data-position="footerRegion2"<?php endif ?>>
                <?php echo $current_region_content; ?>
            </div>
            <?php

            if (!$current_region_content && $is_preview) {
                echo '<!-- empty::end -->';
            }
        }

        return $current_region_content;
    }