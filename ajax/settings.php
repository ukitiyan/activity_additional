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

$notify_email = $notify_stream = array();

$l = \OCP\Util::getL10N('activity');
$data = new \OCA\Activity\Data(\OC::$server->getActivityManager());
$types = $data->getNotificationTypes($l);
foreach ($types as $type => $desc) {
	\OCP\Config::setUserValue(\OCP\User::getUser(), 'activity', 'notify_email_' . $type, !empty($_POST[$type . '_email']));
	\OCP\Config::setUserValue(\OCP\User::getUser(), 'activity', 'notify_stream_' . $type, !empty($_POST[$type . '_stream']));
}

\OCP\Config::setUserValue(\OCP\User::getUser(), 'activity', 'notify_setting_self', !empty($_POST['notify_setting_self']));

\OCP\JSON::success(array("data" => array( "message" => $l->t('Your settings have been updated.'))));
