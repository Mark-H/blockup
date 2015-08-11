<?php
/**
 * @var modX $modx
 * @var ContentBlocks $contentBlocks
 * @var array $scriptProperties
 */
if ($modx->event->name == 'ContentBlocks_RegisterInputs') {
    // Load your own class. No need to require cbBaseInput, that's already loaded.
    $path = $modx->getOption('blockup.core_path', null, MODX_CORE_PATH . 'components/blockup/');
    require_once($path . 'elements/inputs/blockup.class.php');
    $modx->regClientStartupScript('https://ucarecdn.com/widget/2.3.5/uploadcare/uploadcare.full.min.js');
    $opts = array('assetsUrl' => $modx->getOption('blockup.assets_url', null, $modx->getOption('assets_url',null,'assets/') . 'components/blockup/'));
    $modx->regClientStartupHTMLBlock('<script>var ContentBlocksblockup = ' . $modx->toJson($opts) . '</script>');
    $pubkey = $modx->getOption('blockup.uploadcare_pub_key',null,'demopublickey');
    $lang = $modx->getOption('blockup.uploadcare_locale',null,'en');
    $modx->regClientStartupHTMLBlock("<script>UPLOADCARE_PUBLIC_KEY = '$pubkey';UPLOADCARE_LOCALE = '$lang';</script>");
    // Create an instance of your input type, passing the $contentBlocks var
    $instance = new blockupInput($contentBlocks);
    
    // Pass back your input reference as key, and the instance as value
    $modx->event->output(array(
        'blockup' => $instance
    ));
}