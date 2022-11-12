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

script('externalpassword', 'admin');
style('externalpassword', 'admin');
?>
<div id="security-externalpassword" class="section">
    <h2 class="inlineblock"><?php p($l->t('External Password'));?></h2>
    <span id="externalpassword-error-msg" class="msg success hidden">Saved</span>
    <p class="settings-hint"><?php p($l->t('To direct users to an external website in order to change their password or update their billing, set the URLs below.')); ?></p>
    <div class="admin-settings-externalpassword">
        <form id="externalpassword-form" method="POST">
            <div class="form-section">
                <label for="change-password-url"><?php p($l->t('External password URL')); ?></label>
                <input type="text" id="change-password-url" name="changePasswordUrl" value="<?php p($_['changePasswordUrl']); ?>" />
            </div>
            <div class="form-section">
                <label for="description-text"><?php p($l->t('Password description')); ?></label>
                <input type="text" id="description-text" name="descriptionText" value="<?php p($_['descriptionText']); ?>" />
            </div>
            <div class="form-section">
                <label for="button-text"><?php p($l->t('Password button text')); ?></label>
                <input type="text" id="button-text" name="buttonText" value="<?php p($_['buttonText']); ?>" class="small" />
            </div>
            <div class="form-section">
                <label for="billing-url"><?php p($l->t('External billing URL')); ?></label>
                <input type="text" id="billing-url" name="billingUrl" value="<?php p($_['billingUrl']); ?>" />
            </div>
            <div class="form-section">
                <label for="billing-description-text"><?php p($l->t('Billing description')); ?></label>
                <input type="text" id="billing-description-text" name="billingDescriptionText" value="<?php p($_['billingDescriptionText']); ?>" />
            </div>
            <div class="form-section">
                <label for="billing-button-text"><?php p($l->t('Billing button text')); ?></label>
                <input type="text" id="billing-button-text" name="billingButtonText" value="<?php p($_['billingButtonText']); ?>" class="small" />
            </div>
            <input type="submit" id="externalpassword-save" value="<?php p($l->t('Save')); ?>" />
        </form>
    </div>
</div>
