<?php
/**
 * snippets transport file for paramStash extra
 *
 * @package paramstash
 * @subpackage build
 */

if (! function_exists('stripPhpTags')) {
    function stripPhpTags($filename) {
        $o = file_get_contents($filename);
        $o = str_replace('<' . '?' . 'php', '', $o);
        $o = str_replace('?>', '', $o);
        $o = trim($o);
        return $o;
    }
}
/* @var $modx modX */
/* @var $sources array */
/* @var xPDOObject[] $snippets */


$snippets = array();

$snippets[1] = $modx->newObject('modSnippet');
$snippets[1]->fromArray(array (
  'id' => 1,
  'property_preprocess' => false,
  'name' => 'paramStash',
  'description' => 'Retrieves URL parameters that have been stored for this user\'s session.',
), '', true, true);
$snippets[1]->setContent(file_get_contents($sources['source_core'] . '/elements/snippets/paramstash.snippet.php'));


$properties = include $sources['data'].'properties/properties.paramstash.snippet.php';
$snippets[1]->setProperties($properties);
unset($properties);

return $snippets;
