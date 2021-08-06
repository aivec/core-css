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
     * If you are using `coenjacobs/mozart` to namespace composer packages,
     * make sure this package is not deleted from `vendor` in the build step.
     *
     * @author Evan D Shaw <evandanielshaw@gmail.com>
     * @return void
     */
    public static function loadCoreCss() {
        $url = get_stylesheet_directory_uri();
        wp_enqueue_style(
            'aivec-core-' . Meta::CORE_VERSION,
            $url . '/vendor/aivec/core-css/src/css/core.css',
            [],
            Meta::CORE_VERSION
        );
    }
}
