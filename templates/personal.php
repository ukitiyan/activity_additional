<?php
/**
 * ownCloud - activity_additional
 *
 * This file is licensed under the Affero General Public License version 3 or
 * later. See the COPYING file.
 *
 * @author Begood Technology Corp. <y-takahashi@begood-tech.com>
 * @copyright Begood Technology Corp. 2014
 */

?>

<form id="activity_additional" class="section">
	<h2 class="inlineblock"><?php p($l->t('Mail Notifications')); ?></h2>
	<span id="activity_additional_msg" class="msg inlineblock"></span>
	<br>
	<?php p(OC_L10N::get('activity')->t('Send emails:')); ?>
	<select id="mail_notify_setting_batchtime" name="notify_setting_batchtime">
		<option value="3"<?php if ($_['setting_batchtime'] === \OCA\Activity_Additional\Lib\UserSettings::EMAIL_SEND_5MINUTES): ?> selected="selected"<?php endif; ?>><?php p($l->t('Every 5Minutes')); ?></option>
		<option value="4"<?php if ($_['setting_batchtime'] === \OCA\Activity_Additional\Lib\UserSettings::EMAIL_SEND_15MINUTES): ?> selected="selected"<?php endif; ?>><?php p($l->t('Every 15Minutes')); ?></option>
		<option value="0"<?php if ($_['setting_batchtime'] === \OCA\Activity\UserSettings::EMAIL_SEND_HOURLY): ?> selected="selected"<?php endif; ?>><?php p(OC_L10N::get('activity')->t('Hourly')); ?></option>
		<option value="1"<?php if ($_['setting_batchtime'] === \OCA\Activity\UserSettings::EMAIL_SEND_DAILY): ?> selected="selected"<?php endif; ?>><?php p(OC_L10N::get('activity')->t('Daily')); ?></option>
		<option value="2"<?php if ($_['setting_batchtime'] === \OCA\Activity\UserSettings::EMAIL_SEND_WEEKLY): ?> selected="selected"<?php endif; ?>><?php p(OC_L10N::get('activity')->t('Weekly')); ?></option>
	</select>
	<div id="hide_activity_message" style="display: none"><?php p(OC_L10N::get('activity')->t('Send emails:')); ?></div>
</form>
