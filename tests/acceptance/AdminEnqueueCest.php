<?php
class AdminEnqueueCest {

	function _before(AcceptanceTester $I) {
		// will be executed at the beginning of each test
		$I->loginAsAdmin();
		$I->am('administrator');
	}

	function enqueue_admin_scripts(AcceptanceTester $I) {
		$I->wantTo('access to the plugin settings page and check the scripts enqueue');
		$I->amOnPage('/wp-admin/admin.php?page=tasmota-device-manager');
		$I->seeInPageSource('tasmota-device-manager-settings-script');
		$I->seeInPageSource('tasmota-device-manager-admin-script');
	}

	function enqueue_admin_styles(AcceptanceTester $I) {
		$I->wantTo('access to the plugin settings page and check the style enqueue');
		$I->amOnPage('/wp-admin/admin.php?page=tasmota-device-manager');
		$I->seeInPageSource('tasmota-device-manager-settings-styles-css');
		$I->seeInPageSource('tasmota-device-manager-admin-styles-css');
	}

}
