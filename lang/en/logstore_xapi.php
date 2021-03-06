<?php
// This file is part of Moodle - http://moodle.org/
//
// Moodle is free software: you can redistribute it and/or modify
// it under the terms of the GNU General Public License as published by
// the Free Software Foundation, either version 3 of the License, or
// (at your option) any later version.
//
// Moodle is distributed in the hope that it will be useful,
// but WITHOUT ANY WARRANTY; without even the implied warranty of
// MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
// GNU General Public License for more details.
//
// You should have received a copy of the GNU General Public License
// along with Moodle.  If not, see <http://www.gnu.org/licenses/>.

/**
 * External xapi log store plugin
 *
 * @package    logstore_xapi
 * @copyright  2015 Jerrett Fowler <jfowler@charitylearning.org>
 *                  Ryan Smith <ryan.smith@ht2.co.uk>
 * @license    http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */

defined('MOODLE_INTERNAL') || die();

$string['endpoint'] = 'Endpoint';
$string['settings'] = 'General Settings';
$string['xapifieldset'] = 'Custom example fieldset';
$string['xapi'] = 'xAPI';
$string['password'] = 'Password';
$string['pluginadministration'] = 'Logstore xAPI administration';
$string['pluginname'] = 'Logstore xAPI';
$string['submit'] = 'Submit';
$string['username'] = 'Username';
$string['xapisettingstitle'] = 'Logstore xAPI Settings';
$string['backgroundmode'] = 'Send statements by scheduled task?';
$string['backgroundmode_desc'] = 'This will force Moodle to send the statements to the LRS in the background,
        via a cron task. This will make the process less close to real time, but will help to prevent unpredictable
        Moodle performance linked to the performance of the LRS.';
$string['taskemit'] = 'Emit records to LRS';