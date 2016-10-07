<?php namespace TimberImgixPlugin\Services;

use \Imgix\UrlBuilder;

class Imgix {
  public static function resize($imageUrl, $width, $height = null, $params = array()) {
    $builder = new UrlBuilder("stylist-files.imgix.net");
    $builder->setUseHttps(true);
    $builder->setSignKey("J9Q0iZLXYETqedy4");

    $params['w'] = $width;
    if ($height) {
      $params['h'] = $height;
    }

    $imagePath = parse_url($imageUrl, PHP_URL_PATH); // Strip the protocol and domain
    // var_dump(2234234, $params, $builder->createURL($imagePath, $params)); exit;

    return $builder->createURL($imagePath, $params);
  }
}
