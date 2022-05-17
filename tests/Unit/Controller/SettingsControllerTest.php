<?php

namespace OCA\ExternalPassword\Tests\Unit\Controller;

use PHPUnit_Framework_TestCase;

use OCP\AppFramework\Http\JSONResponse;

use OCA\ExternalPassword\Controller\SettingsController;


class SettingsControllerTest extends PHPUnit_Framework_TestCase {
	private $controller;

	public function setUp() {
		$request = $this->getMockBuilder('OCP\IRequest')->getMock();
		$config = $this->getMockBuilder('OCP\IConfig')->getMock();

		$this->controller = new SettingsController(
			'externalpassword', $request, $config
		);
	}

	public function testSave() {
        $changePasswordUrl = 'https://example.com/change-password';
        $descriptionText = 'Use the link below to change your password';
        $buttonText = 'Change password';

		$result = $this->controller->saveSettings($changePasswordUrl, $descriptionText, $buttonText);
		$this->assertTrue($result instanceof JSONResponse);
	}

}
