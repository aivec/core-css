<?php

namespace Aivec\Core\CSS;

/**
 * CSS loader class
 */
class PluginLoader
{
    /**
     * Loads core CSS
     *
     * Must be used from within a **plugin** directory.
     *
     * @author Evan D Shaw <evandanielshaw@gmail.com>
     * @return void
     */
    public static function loadCoreCss() {
        $url = plugin_dir_url(__FILE__);
        wp_enqueue_style(
            'aivec-core-' . Meta::CORE_VERSION,
            $url . '/css/core.css',
            [],
            Meta::CORE_VERSION
        );
    }
}
