/* global OC */

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
window.addEventListener('DOMContentLoaded', function () {
  $('#externalpassword-save').click(function () {
    var formData = $('#externalpassword-form').serialize();
    $('#externalpassword-error-msg').hide();
    $('#externalpassword-save').attr('disabled', 'disabled');
    $.post(OC.generateUrl('apps/externalpassword/settings'), formData, function (response) {
      if (typeof(response.data) !== "undefined") {
        OC.msg.finishedSaving('#externalpassword-error-msg', response);
      } else {
        OC.msg.finishedSaving('#externalpassword-error-msg', {
          'status' : 'error',
          'data' : {
            'message' : t('externalpassword', 'Unable to save settings')
          }
        });
      }
      $("#externalpassword-save").removeAttr('disabled');
    });
    return false;
  });
});
