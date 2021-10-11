<?php

namespace Aivec\Core\CSS;

/**
 * CSS loader class for plugins and themes
 */
class Loader
{
    const THEME_DIR_PATTERN = '/wp-content/themes/';
    const PLUGIN_DIR_PATTERN = '/wp-content/plugins/';
    const PACKAGE_PATH_TO_CSS = '/css/core.css';

    /**
     * Loads core CSS
     *
     * Must be used from within a **theme** or **plugin** directory.
     *
     * This method assumes that the themes and plugins directories exist as
     * subdirectories of `ABSPATH` at `/wp-content/`
     *
     * @author Evan D Shaw <evandanielshaw@gmail.com>
     * @return void
     */
    public static function loadCoreCss() {
        $path = dirname(__FILE__);
        if (strpos($path, self::THEME_DIR_PATTERN) !== false) {
            $url = get_stylesheet_directory_uri();
            $ppieces = explode(self::THEME_DIR_PATTERN, $path);
            $upieces = explode(self::THEME_DIR_PATTERN, $url);
            $url = $upieces[0] . self::THEME_DIR_PATTERN . $ppieces[1];
            self::loadCoreCssDirectly($url . self::PACKAGE_PATH_TO_CSS);
            return;
        }

        if (strpos($path, self::PLUGIN_DIR_PATTERN) !== false) {
            $url = plugin_dir_url(__FILE__);
            self::loadCoreCssDirectly($url . self::PACKAGE_PATH_TO_CSS);
        }
    }

    /**
     * Enqueues core CSS at the given URL location
     *
     * @author Evan D Shaw <evandanielshaw@gmail.com>
     * @param string $corecssurl
     * @return void
     */
    public static function loadCoreCssDirectly($corecssurl) {
        wp_enqueue_style(
            'aivec-core-' . Meta::CORE_VERSION,
            $corecssurl,
            [],
            Meta::CORE_VERSION
        );
    }
}
