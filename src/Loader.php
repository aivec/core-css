<?php

namespace Aivec\Core\CSS;

/**
 * CSS loader class
 */
class Loader
{
    const CORE_VERSION = 'v1';

    /**
     * Loads core CSS
     *
     * Must be used from within a **plugin** directory.
     *
     * If you are using `coenjacobs/mozart` to namespace composer packages,
     * make sure this package is not deleted from `vendor` in the build step.
     *
     * @author Evan D Shaw <evandanielshaw@gmail.com>
     * @return void
     */
    public static function pluginLoadCoreCss() {
        $url = plugin_dir_url(__FILE__);
        wp_enqueue_style(
            'aivec-core-' . self::CORE_VERSION,
            $url . '/vendor/aivec/core-css/dist/core.css',
            [],
            self::CORE_VERSION
        );
    }

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
    public static function themeLoadCoreCss() {
        $url = get_stylesheet_directory_uri();
        wp_enqueue_style(
            'aivec-core-' . self::CORE_VERSION,
            $url . '/vendor/aivec/core-css/dist/core.css',
            [],
            self::CORE_VERSION
        );
    }
}
