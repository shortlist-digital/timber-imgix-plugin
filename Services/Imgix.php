<?php namespace TimberImgixPlugin\Services;

use \Imgix\UrlBuilder;

class Imgix {
  public static function resize($imageUrl, $width, $height = null, $params = array()) {

    $domain = get_field('imgix_account_domain', 'imgix-configuration');
    if (!$domain) {
      throw new \Exception('Please set Imgix settings');
    }

    $secret_key = get_field('imgix_account_secret_key', 'imgix-configuration');

    $builder = new UrlBuilder($domain);
    $builder->setUseHttps(true);
    $builder->setSignKey($secret_key);

    $params['w'] = $width;
    if ($height) {
      $params['h'] = $height;
    }

    $imagePath = parse_url($imageUrl, PHP_URL_PATH); // Strip the protocol and domain

    return $builder->createURL($imagePath, $params);
  }
}
