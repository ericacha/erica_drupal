<?php
    function Untitled_preview_drupalregion_7() {
        global $bdpage_drupalregion_7;
        $is_preview = Untitled_preview_has_url_param('theme');

        $current_region_content = empty($bdpage_drupalregion_7) ? '' : trim(render($bdpage_drupalregion_7));

        if ($current_region_content || $is_preview) {

            if (!$current_region_content && $is_preview) {
                echo '<!-- empty::begin -->';
            }

            ?>
            <div class="data-control-id-3047 bd-drupalregion-8"<?php if ($is_preview): ?> data-position="footerRegion3"<?php endif ?>>
                <?php echo $current_region_content; ?>
            </div>
            <?php

            if (!$current_region_content && $is_preview) {
                echo '<!-- empty::end -->';
            }
        }

        return $current_region_content;
    }