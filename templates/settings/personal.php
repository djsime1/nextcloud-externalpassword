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
?>
<?php if ($_['changePasswordUrl']) { ?>
<div id="security-external-password" class="section">
	<h2><?php p($l->t('Password'));?></h2>
    <div>
        <p class="settings-hint"><?php p($_['descriptionText']); ?></p>
        <p><a href="<?php p($_['changePasswordUrl']); ?>" class="button" target="_blank"><?php p($_['buttonText']); ?></a></p>
    </div>
</div>
<?php } ?>
