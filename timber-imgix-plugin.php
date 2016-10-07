<?php
namespace TimberImgixPlugin;

/**
* @wordpress-plugin
* Plugin Name: Timber Imgix Plugin
* Plugin URI: http://github.com/shortlist-digital/Timber Imgix Plugin
* Description: Timber extension for Imgix functionality, such as resizing images
* Version: 1.0.0
* Author: Shortlist Studio
* Author URI: http://shortlist.studio
* License: MIT
*/
class TimberImgixPlugin
{
    public function __construct()
    {
		new \TimberImgixPlugin\Hooks\TimberTwig();
		new \TimberImgixPlugin\Panels\Options();
    }
}
new TimberImgixPlugin();
