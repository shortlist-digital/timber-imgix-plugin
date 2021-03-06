<?php namespace TimberImgixPlugin\Hooks;

use add_filter;
use Twig_SimpleFilter;
use stdClass;

class TimberTwig {

  public function __construct() {
    // add_filter('get_twig', array($this, 'add_to_twig'), 10);
	add_action('timber/twig/filters', array($this, 'add_to_twig'), 10);
    add_action('twig_apply_filters', array($this, 'add_to_twig'), 10);
  }

  public function add_to_twig($twig){

    $twig->addFilter(new Twig_SimpleFilter('resize',
      array('TimberImgixPlugin\Services\Imgix', 'resize')));
	  
    return $twig;
  }
}
