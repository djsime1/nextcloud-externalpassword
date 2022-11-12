<?php
/**
 * @copyright Copyright (c) 2022 Raoul Snyman <raoul@snyman.info>
 *
 * @author Raoul Snyman <raoul@snyman.info>
 *
 * @license GNU AGPL version 3 or any later version
 *
 * This program is free software: you can redistribute it and/or modify
 * it under the terms of the GNU Affero General Public License as
 * published by the Free Software Foundation, either version 3 of the
 * License, or (at your option) any later version.
 *
 * This program is distributed in the hope that it will be useful,
 * but WITHOUT ANY WARRANTY; without even the implied warranty of
 * MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
 * GNU Affero General Public License for more details.
 *
 * You should have received a copy of the GNU Affero General Public License
 * along with this program.  If not, see <http://www.gnu.org/licenses/>.
 *
 */
namespace OCA\ExternalPassword\Controller;

use OCP\AppFramework\Controller;
use OCP\AppFramework\Http\JSONResponse;
use OCP\IConfig;
use OCP\IRequest;

class SettingsController extends Controller {

    /** @var IConfig */
    private $config;

    /**
     * @param string $AppName
     * @param IRequest $request
     * @param IConfig $config
     */
	public function __construct($AppName, IRequest $request, IConfig $config) {
        parent::__construct($AppName, $request);
        $this->config = $config;
	}

	/**
     * @param string $changePasswordUrl
     * @param string $descriptionText
     * @param string $buttonText
	 */
    public function save(string $changePasswordUrl, string $descriptionText, string $buttonText,
                         string $billingUrl, string $billingDescriptionText, string $billingButtonText): JSONResponse {
        $this->config->setAppValue('externalpassword', 'changePasswordUrl', $changePasswordUrl);
        $this->config->setAppValue('externalpassword', 'descriptionText', $descriptionText);
        $this->config->setAppValue('externalpassword', 'buttonText', $buttonText);
        $this->config->setAppValue('externalpassword', 'billingUrl', $billingUrl);
        $this->config->setAppValue('externalpassword', 'billingDescriptionText', $billingDescriptionText);
        $this->config->setAppValue('externalpassword', 'billingButtonText', $billingButtonText);
        $parameters = [
            'status' => 'success',
            'data' => [
                'message' => 'Saved'
            ]
        ];
        return new JSONResponse($parameters);
	}
}
