<?php
    function Untitled_preview_drupalregion_3() {
        global $bdpage_drupalregion_3;
        $is_preview = Untitled_preview_has_url_param('theme');

        $current_region_content = empty($bdpage_drupalregion_3) ? '' : trim(render($bdpage_drupalregion_3));

        if ($current_region_content || $is_preview) {

            if (!$current_region_content && $is_preview) {
                echo '<!-- empty::begin -->';
            }

            ?>
            <div class="data-control-id-2913 bd-drupalregion-4"<?php if ($is_preview): ?> data-position="footerRegion1"<?php endif ?>>
                <?php echo $current_region_content; ?>
            </div>
            <?php

            if (!$current_region_content && $is_preview) {
                echo '<!-- empty::end -->';
            }
        }

        return $current_region_content;
    }