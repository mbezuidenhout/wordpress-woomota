<?php

namespace Tasmota_Device_Manager\Tests\WPUnit;

class InitializeAdminTest extends \Codeception\TestCase\WPTestCase {
	/**
	 * @var string
	 */
	protected $root_dir;

	public function setUp() {
		parent::setUp();

		// your set up methods here
		$this->root_dir = dirname( dirname( dirname( __FILE__ ) ) );

	$user_id = $this->factory->user->create( array( 'role' => 'administrator' ) );
		wp_set_current_user( $user_id );
		set_current_screen( 'edit.php' );
	}

	public function tearDown() {
		parent::tearDown();
	}

	/**
	 * @test
	 * it should be admin
	 */
	public function it_should_be_admin() {
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
		$classes[] = 'Tasmota_Device_Manager\Backend\ActDeact';
		$classes[] = 'Tasmota_Device_Manager\Backend\Enqueue';
		$classes[] = 'Tasmota_Device_Manager\Backend\ImpExp';
		$classes[] = 'Tasmota_Device_Manager\Backend\Notices';
		$classes[] = 'Tasmota_Device_Manager\Backend\Pointers';
		$classes[] = 'Tasmota_Device_Manager\Backend\Settings_Page';
		$classes[] = 'Tasmota_Device_Manager\Backend\Display_Post_State';

		$this->assertTrue( is_admin() );
		foreach( $classes as $class ) {
			$this->assertTrue( class_exists( $class ) );
		}
	}

}
