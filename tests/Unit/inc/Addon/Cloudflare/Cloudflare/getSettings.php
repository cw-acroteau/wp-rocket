<?php

namespace WP_Rocket\Tests\Unit\Inc\Addon\Cloudflare\Cloudflare;

use Brain\Monkey\Functions;
use Mockery;
use WP_Rocket\Addon\Cloudflare\Cloudflare;
use WP_Rocket\Addon\Cloudflare\API\Endpoints;
use WP_Rocket\Admin\Options_Data;
use WP_Rocket\Tests\Unit\TestCase;

/**
 * @covers WP_Rocket\Addon\Cloudflare\Cloudflare::get_settings
 *
 * @group Cloudflare
 */
class TestGetSettings extends TestCase {
	private $options;
	private $endpoints;
	private $cloudflare;

	protected function setUp(): void {
		Functions\when( 'get_transient' )
			->justReturn( true );

		$this->options    = Mockery::mock( Options_Data::class );
		$this->endpoints  = Mockery::mock( Endpoints::class );
		$this->cloudflare = new Cloudflare( $this->options, $this->endpoints );
	}

	/**
	 * @dataProvider configTestData
	 */
	public function testShouldReturnExpected( $config, $expected ) {
		Functions\when( 'is_wp_error' )
			->justReturn( false );

		Functions\when( 'wp_json_encode' )
			->alias( function( $string ) {
				return json_encode( $string );
			} );

		$this->options->expects()
			->get( 'cloudflare_zone_id', '' )
			->andReturn( $config['zone_id'] );

		if ( 'exception' === $config['response'] ) {
			$this->endpoints->expects()
				->get_settings( $config['zone_id'] )
				->andThrow( new \Exception() );
		} else {
			$this->endpoints->expects()
				->get_settings( $config['zone_id'] )
				->atMost()
				->once()
				->andReturn( $config['response'] );
		}

		$result = $this->cloudflare->get_settings();

		if ( 'error' === $expected ) {
			$this->assertInstanceOf(
				'WP_Error',
				$result
			);
		} else {
			$this->assertSame(
				$expected,
				$result
			);
		}
	}
}
