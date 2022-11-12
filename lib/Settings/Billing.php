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
namespace OCA\ExternalPassword\Settings;

use OCP\AppFramework\Http\TemplateResponse;
use OCP\IConfig;
use OCP\IL10N;
use OCP\Settings\ISettings;

class Billing implements ISettings {

    /** @var IConfig */
    private $config;

    /** @var IL10N */
    private $l;

    /**
     * Admin constructor.
     *
     * @param IConfig $config
     * @param IL10N $l
     */
    public function __construct(IConfig $config, IL10N $l) {
        $this->config = $config;
        $this->l = $l;
    }

    /**
     * @return TemplateResponse
     */
    public function getForm() {
        $billingUrl = $this->config->getAppValue('externalpassword', 'billingUrl', '');
        $billingDescriptionText = $this->config->getAppValue('externalpassword', 'billingDescriptionText',
            'Your account billing is managed externally, please click the button below to manage your account.');
        $billingButtonText = $this->config->getAppValue('externalpassword', 'billingButtonText', 'Manage billing');
        $parameters = [
            'billingUrl' => $billingUrl,
            'billingDescriptionText' => $billingDescriptionText,
            'billingButtonText' => $billingButtonText
        ];
        return new TemplateResponse('externalpassword', 'settings/billing', $parameters);
    }

    /**
     * @return string the section ID, e.g. 'sharing'
     */
    public function getSection() {
        $billingUrl = $this->config->getAppValue('externalpassword', 'billingUrl', '');
        if (!$billingUrl) {
            return null;
        }
        else {
            return 'billing';
        }
    }

    /**
     * @return int whether the form should be rather on the top or bottom of
     * the admin section. The forms are arranged in ascending order of the
     * priority values. It is required to return a value between 0 and 100.
     */
    public function getPriority() {
        return 10;
    }

}
