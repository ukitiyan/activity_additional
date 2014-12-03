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

\OCP\Util::addScript('activity_additional', 'settings');
\OCP\Util::addStyle('activity_additional', 'settings');

$template = new \OCP\Template('activity_additional', 'personal');
$template->assign('activities', $activities);
if (\OCA\Activity\UserSettings::getUserSetting($user, 'setting', 'batchtime') == 3600 * 24 * 7) {
	$template->assign('setting_batchtime', \OCA\Activity\UserSettings::EMAIL_SEND_WEEKLY);
}
else if (\OCA\Activity\UserSettings::getUserSetting($user, 'setting', 'batchtime') == 3600 * 24) {
	$template->assign('setting_batchtime', \OCA\Activity\UserSettings::EMAIL_SEND_DAILY);
}
else if (\OCA\Activity\UserSettings::getUserSetting($user, 'setting', 'batchtime') == 60 * 5) {
	$template->assign('setting_batchtime', \OCA\Activity_Additional\Lib\UserSettings::EMAIL_SEND_5MINUTES);
}
else if (\OCA\Activity\UserSettings::getUserSetting($user, 'setting', 'batchtime') == 60 * 15) {
	$template->assign('setting_batchtime', \OCA\Activity_Additional\Lib\UserSettings::EMAIL_SEND_15MINUTES);
}
else {
	$template->assign('setting_batchtime', \OCA\Activity\UserSettings::EMAIL_SEND_HOURLY);
}

return $template->fetchPage();
