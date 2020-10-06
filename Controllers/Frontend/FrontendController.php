<?php

namespace BasePlugin\Controllers\Frontend;

class FrontendController
{

    private $BasePlugin;
    private $version;

    public function __construct($BasePlugin, $version)
    {
        $this->BasePlugin = $BasePlugin;
        $this->version = $version;
    }

    public function enqueueStyles(): void
    {

       // wp_enqueue_style( $this->BasePlugin, plugin_dir_url( __FILE__ ) . 'css/base-plugin-public.css', array(), $this->version, 'all' );
    }

    public function enqueueScripts(): void
    {
       // wp_enqueue_script( $this->BasePlugin, plugin_dir_url( __FILE__ ) . 'js/base-plugin-public.js', array( 'jquery' ), $this->version, false );
    }

}