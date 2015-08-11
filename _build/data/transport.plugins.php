<?php
$plugins = array();

/** create the plugin object */
$plugins[0] = $modx->newObject('modPlugin');
$plugins[0]->set('name','blockup');
$plugins[0]->set('description','Adds Uploadcare uploader as a ContentBlocks Field Input Type');
$plugins[0]->set('plugincode', getSnippetContent($sources['plugins'] . 'blockup.plugin.php'));

$events = include $sources['data'].'transport.plugin.events.php';

if (is_array($events) && !empty($events)) {
    $plugins[0]->addMany($events);
    $modx->log(xPDO::LOG_LEVEL_INFO,'Packaged in '.count($events).' Plugin Events for blockup.'); flush();
} else {
    $modx->log(xPDO::LOG_LEVEL_ERROR,'Could not find plugin events for blockup!');
}
unset($events);

return $plugins;
