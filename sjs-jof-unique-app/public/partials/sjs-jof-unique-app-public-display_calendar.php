<?php

/**
 * Provide a public-facing view for the plugin
 *
 * This file is used to markup the public-facing aspects of the plugin.
 *
 * @link       http://example.com
 * @since      1.0.0
 *
 * @package    sjs_jof_unique_app
 * @subpackage sjs_jof_unique_app/public/partials
 */
?>

<!-- This file should primarily consist of HTML with a little bit of PHP. -->
CALENDAR
<?php
$result = wp_remote_get('https://api.uniqueschoolapp.ie/feeds/calendar?idschool=230');
?>
<?php print_r($calendar); ?>