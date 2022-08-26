<?php
namespace WP_Rocket\Tests\Unit\inc\Engine\Preload\Subscriber;

use Mockery;
use WP_Rocket\Admin\Options_Data;
use WP_Rocket\Engine\Preload\Activation\Activation;
use WP_Rocket\Engine\Preload\Controller\ClearCache;
use WP_Rocket\Engine\Preload\Controller\LoadInitialSitemap;
use WP_Rocket\Engine\Preload\Controller\Queue;
use WP_Rocket\Engine\Preload\Database\Queries\Cache;
use WP_Rocket\Engine\Preload\Database\Tables\Cache as CacheTable;
use WP_Rocket\Engine\Preload\Subscriber;
use WP_Rocket\Tests\Unit\TestCase;
use WP_Rocket_Mobile_Detect;

class Test_OnPermalinkChanged extends TestCase
{
	protected $subscriber;

	protected $options;
	protected $controller;
	protected $query;
	protected $activation;
	protected $mobile_detect;
	protected $clear_cache;
	protected $queue;
	protected $table;

	protected function setUp(): void
	{
		parent::setUp();
		$this->options = Mockery::mock(Options_Data::class);
		$this->controller = Mockery::mock(LoadInitialSitemap::class);
		$this->query = $this->createMock(Cache::class);
		$this->activation = Mockery::mock(Activation::class);
		$this->mobile_detect = Mockery::mock(WP_Rocket_Mobile_Detect::class);
		$this->clear_cache = Mockery::mock(ClearCache::class);
		$this->queue = Mockery::mock(Queue::class);
		$this->table = $this->createMock(CacheTable::class);
		$this->subscriber = new Subscriber($this->options, $this->controller, $this->query, $this->activation, $this->mobile_detect, $this->clear_cache, $this->queue, $this->table );
	}

	public function testShouldDoAsExpected() {
		$this->controller->expects()->load_initial_sitemap();
		$this->query->expects(self::once())->method('remove_all');
		$this->subscriber->on_permalink_changed();
	}
}
