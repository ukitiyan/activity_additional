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

\OCP\JSON::checkLoggedIn();
\OCP\JSON::checkAppEnabled('activity_additional');
\OCP\JSON::callCheck();

$l = \OCP\Util::getL10N('activity');

$email_batch_time = 60 * 5;
if ($_POST['notify_setting_batchtime'] == \OCA\Activity\UserSettings::EMAIL_SEND_DAILY) {
	$email_batch_time = 3600 * 24;
}
if ($_POST['notify_setting_batchtime'] == \OCA\Activity\UserSettings::EMAIL_SEND_WEEKLY) {
	$email_batch_time = 3600 * 24 * 7;
}
if ($_POST['notify_setting_batchtime'] == \OCA\Activity\UserSettings::EMAIL_SEND_HOURLY) {
	$email_batch_time = 3600;
}
if ($_POST['notify_setting_batchtime'] == \OCA\Activity_Additional\Lib\UserSettings::EMAIL_SEND_15MINUTES) {
	$email_batch_time = 60 * 15;
}
\OCP\Config::setUserValue(\OCP\User::getUser(), 'activity', 'notify_setting_batchtime', $email_batch_time);

\OCP\JSON::success(array("data" => array( "message" => $l->t('Your settings have been updated.'))));
