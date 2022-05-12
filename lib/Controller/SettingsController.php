<?php
namespace OCA\ExternalPassword\Controller;

use OCP\IRequest;
use OCP\IConfig;
use OCP\AppFramework\Http\JSONResponse;
use OCP\AppFramework\Controller;

class SettingsController extends Controller {

    /** @var IConfig */
    private $config;

	public function __construct($AppName, IRequest $request, IConfig $config) {
        parent::__construct($AppName, $request);
        $this->config = $config;
	}

	/**
     * @param string
	 */
	public function save(string $changePasswordUrl, string $descriptionText, string $buttonText): JSONResponse {
        $this->config->setAppValue('externalpassword', 'changePasswordUrl', $changePasswordUrl);
        $this->config->setAppValue('externalpassword', 'descriptionText', $descriptionText);
        $this->config->setAppValue('externalpassword', 'buttonText', $buttonText);
        $parameters = [
            'changePasswordUrl' => $changePasswordUrl,
            'descriptionText' => $descriptionText,
            'buttonText' => $buttonText
        ];
        return new JSONResponse($parameters);
	}

}
