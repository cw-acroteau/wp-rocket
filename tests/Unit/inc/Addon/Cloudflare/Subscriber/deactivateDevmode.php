<?php

namespace WP_Rocket\Tests\Unit\Inc\Addon\Cloudflare\Subscriber;

use Mockery;
use WP_Rocket\Addon\Cloudflare\Subscriber;
use WP_Rocket\Addon\Cloudflare\Cloudflare;
use WP_Rocket\Admin\{Options, Options_Data};
use WP_Rocket\Tests\Unit\TestCase;

/**
 * @covers WP_Rocket\Addon\Cloudflare\Subscriber::deactivate_devmode
 *
 * @group Cloudflare
 */
class TestDeactivateDevmode extends TestCase {
	private $options_api;
	private $options;
	private $cloudflare;
	private $subscriber;

	protected function setUp(): void {
		$this->options_api = Mockery::mock( Options::class );
		$this->options     = Mockery::mock( Options_Data::class );
		$this->cloudflare  = Mockery::mock( Cloudflare::class );
		$this->subscriber  = new Subscriber( $this->cloudflare, $this->options, $this->options_api );
	}

	public function testShouldDoExpected() {
		$this->options->expects()
			->set( 'cloudflare_devmode', 'off' )
			->once();

		$this->options->expects()
			->get_options()
			->andReturn( [
				'cloudflare_devmode' => 'off'
			] );

		$this->options_api->expects()
			->set( 'settings', [
				'cloudflare_devmode' => 'off'
			] )
			->once();

		$this->subscriber->deactivate_devmode();
	}
}