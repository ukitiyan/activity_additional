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
namespace OCA\Activity_Additional\AppInfo;


// Personal settings for notifications and emails
\OCP\App::registerPersonal('activity_additional', 'personal');

// Cron job for sending Emails
\OCP\Backgroundjob::registerJob('OCA\Activity_Additional\Lib\BackgroundJob\EmailNotification');
