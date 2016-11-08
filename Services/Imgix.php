<?php namespace TimberImgixPlugin\Services;

use \Imgix\UrlBuilder;

class Imgix {
	public static function resize($imageUrl, $width, $height = null, $params = array()) {

		// collect domain/key from options set in imgix-configuration
		$domain = get_field('imgix_account_domain', 'imgix-configuration');
		if (!$domain) {
			throw new \Exception('Please set Imgix settings');
		}
		$secret_key = get_field('imgix_account_secret_key', 'imgix-configuration');

		// collect default options from imgix-configuration
		$format = get_field('imgix_default_options_format', 'imgix-configuration');
		$quality = get_field('imgix_default_options_quality', 'imgix-configuration');

		// set default parameters
		$default_params = array(
			'q' => $quality ? '60' : null,
			'fm' => $format ? 'pjpg' : null,
			'fit' => isset($height) ? 'crop' : null,
			'h' => isset($height) ? $height : null,
			'w' => $width
		);

		// construct initial url
		$builder = new UrlBuilder($domain);
		$builder->setUseHttps(true);
		$builder->setSignKey($secret_key);

		// strip the protocol and domain
		$imagePath = parse_url($imageUrl, PHP_URL_PATH);

		// return complete url
		return $builder->createURL($imagePath, array_merge($default_params, $params));
	}
}
