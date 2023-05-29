<?php

use ImportWP\EventHandler;
use ImportWPAddon\RehubFields\Importer\Template\RehubFields;

function iwp_rehub_iwp_register_events(EventHandler $event_handler)
{
    $rehub_iwp = new RehubFields($event_handler);
}

add_action('iwp/register_events', 'iwp_rehub_iwp_register_events');
