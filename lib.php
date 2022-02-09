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
 * @package    tool_emailses
 * @copyright  2018 onwards Catalyst IT {@link http://www.catalyst-eu.net/}
 * @license    http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 * @author     Harry Barnard <harry.barnard@catalyst-eu.net>
 */

function tool_emailses_bulk_user_actions() {
    return [
        'tool_ses_reset_bounces' => new action_link(
            new moodle_url('/admin/tool/emailses/reset_bounces.php'),
            get_string('resetbounces', 'tool_emailses')
        ),
    ];
}


function tool_emailses_get_user_from_destination(string $destination) {
    global $DB;

    return $DB->get_record_sql('SELECT id, email FROM {user} WHERE email '. $DB->sql_like('email', ':destination', false),
        array('destination' => $destination));
}

