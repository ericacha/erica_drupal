<?php
    function Untitled_preview_drupalregion_11() {
        global $bdpage_drupalregion_11;
        $is_preview = Untitled_preview_has_url_param('theme');

        $current_region_content = empty($bdpage_drupalregion_11) ? '' : trim(render($bdpage_drupalregion_11));

        if ($current_region_content || $is_preview) {

            if (!$current_region_content && $is_preview) {
                echo '<!-- empty::begin -->';
            }

            ?>
            <div class="data-control-id-430855 bd-drupalregion-12"<?php if ($is_preview): ?> data-position="Drupal Region 1"<?php endif ?>>
                <?php echo $current_region_content; ?>
            </div>
            <?php

            if (!$current_region_content && $is_preview) {
                echo '<!-- empty::end -->';
            }
        }

        return $current_region_content;
    }