<?php
declare(strict_types=1);

namespace WP_Rocket\Addon\Cloudflare\Auth;

class APIKey implements AuthInterface {
	/**
	 * Cloudflare email
	 *
	 * @var string
	 */
	private $email;

	/**
	 * Cloudflare API Key
	 *
	 * @var string
	 */
	private $api_key;

	/**
	 * Constructor
	 *
	 * @param string $email Cloudflare email.
	 * @param string $api_key Cloudflare API key.
	 */
	public function __construct( string $email, string $api_key ) {
		$this->email   = $email;
		$this->api_key = $api_key;
	}

	/**
	 * @inheritDoc
	 */
	public function get_headers(): array {
		return [
			'X-Auth-Email' => $this->email,
			'X-Auth-Key'   => $this->api_key,
		];
	}

	/**
	 * @inheritDoc
	 */
	public function is_authorized(): bool {
		return (
			isset( $this->email, $this->api_key )
			&&
			false !== filter_var( $this->email, FILTER_VALIDATE_EMAIL )
		);
	}
}
