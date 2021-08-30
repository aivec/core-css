<?php

namespace Aivec\Core\CSS;

/**
 * CSS loader class for themes
 */
class ThemeLoader
{
    /**
     * Loads core CSS
     *
     * Must be used from within a **theme** directory.
     *
     * This method assumes that the themes directory exists as
     * a subdirectory of `ABSPATH` at `/wp-content/themes/`
     *
     * @author Evan D Shaw <evandanielshaw@gmail.com>
     * @return void
     */
    public static function loadCoreCss() {
        $path = dirname(__FILE__);
        $url = get_stylesheet_directory_uri();
        $separator = '/wp-content/themes/';
        $ppieces = explode($separator, $path);
        $upieces = explode($separator, $url);
        $url = $upieces[0] . $separator . $ppieces[1];
        wp_enqueue_style(
            'aivec-core-' . Meta::CORE_VERSION,
            $url . '/css/core.css',
            [],
            Meta::CORE_VERSION
        );
    }
}
