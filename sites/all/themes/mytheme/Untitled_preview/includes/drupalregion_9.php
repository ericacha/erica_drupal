<?php
    function Untitled_preview_drupalregion_9() {
        global $bdpage_drupalregion_9;
        $is_preview = Untitled_preview_has_url_param('theme');

        $current_region_content = empty($bdpage_drupalregion_9) ? '' : trim(render($bdpage_drupalregion_9));

        if ($current_region_content || $is_preview) {

            if (!$current_region_content && $is_preview) {
                echo '<!-- empty::begin -->';
            }

            ?>
            <div class="data-control-id-3114 bd-drupalregion-10"<?php if ($is_preview): ?> data-position="footerRegion4"<?php endif ?>>
                <?php echo $current_region_content; ?>
            </div>
            <?php

            if (!$current_region_content && $is_preview) {
                echo '<!-- empty::end -->';
            }
        }

        return $current_region_content;
    }