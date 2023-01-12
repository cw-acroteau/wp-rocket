<?php
namespace WP_Rocket\Engine\Admin\Beacon;

use WP_Rocket\AbstractServiceProvider;
use WP_Rocket\Engine\Support\ServiceProvider as SupportServiceProvider;
/**
 * Service Provider for Beacon
 *
 * @since 3.3
 */
class ServiceProvider extends AbstractServiceProvider {

	public function get_admin_subscribers(): array
	{
		return [
			$this->generate_container_id('beacon')
		];
	}

	/**
	 * Registers items with the container
	 *
	 * @return void
	 */
	public function register() {
		$this->share( 'beacon', Beacon::class )
			->addArgument( $this->get_external( 'options' ) )
			->addArgument( $this->get_external( 'template_path' ) . '/settings' )
			->addArgument( $this->get_external( 'support_data', SupportServiceProvider::class) )
			->addTag( 'admin_subscriber' );
	}
}
