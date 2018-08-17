<?php
/**
 * Super-simple webhook example that does two things:
 *      1. Subscribes new plugin users to MailChimp's mailing list.
 *      2. Send post uninstall custom email to users based on different uninstall reasons.
 *
 * @copyright   Copyright (c) 2016, Freemius, Inc.
 * @license     http://opensource.org/licenses/gpl-2.0.php GNU Public License
 * @since       1.0.3
 */

// Retrieve the request's body and parse it as JSON
$input = @file_get_contents("php://input");

$event_json = json_decode($input);

if ( ! isset($event_json->id))
{
    http_response_code(200);
    exit();
}

echo $event_json;

http_response_code(200);