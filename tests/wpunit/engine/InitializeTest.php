<?php

namespace Tasmota_Device_Manager\Tests\WPUnit;

class InitializeTest extends \Codeception\TestCase\WPTestCase {
	/**
	 * @var string
	 */
	protected $root_dir;

	public function setUp() {
		parent::setUp();

		// your set up methods here
		$this->root_dir = dirname( dirname( dirname( __FILE__ ) ) );

	wp_set_current_user(0);
	wp_logout();
	wp_safe_redirect(wp_login_url());
	}

	public function tearDown() {
		parent::tearDown();
	}

	/**
	 * @test
	 * it should be front
	 */
	public function it_should_be_front() {
		$classes   = array();
		$classes[] = 'Tasmota_Device_Manager\Internals\PostTypes';
		$classes[] = 'Tasmota_Device_Manager\Internals\Shortcode';
		$classes[] = 'Tasmota_Device_Manager\Internals\Transient';
		$classes[] = 'Tasmota_Device_Manager\Integrations\CMB';
		$classes[] = 'Tasmota_Device_Manager\Integrations\Cron';
		$classes[] = 'Tasmota_Device_Manager\Integrations\FakePage';
		$classes[] = 'Tasmota_Device_Manager\Integrations\Template';
		$classes[] = 'Tasmota_Device_Manager\Integrations\Widgets';
		$classes[] = 'Tasmota_Device_Manager\Ajax\Ajax';
		$classes[] = 'Tasmota_Device_Manager\Ajax\Ajax_Admin';
		$classes[] = 'Tasmota_Device_Manager\Frontend\Enqueue';
		$classes[] = 'Tasmota_Device_Manager\Frontend\extras\Body_Class';

		foreach( $classes as $class ) {
			$this->assertTrue( class_exists( $class ) );
		}
	}

}
