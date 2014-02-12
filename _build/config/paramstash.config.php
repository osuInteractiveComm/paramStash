<?php

 /*               DO NOT EDIT THIS FILE

  Edit the file in the MyComponent config directory
  and run ExportObjects

 */



$packageNameLower = 'paramstash'; /* No spaces, no dashes */

$components = array(
    /* These are used to define the package and set values for placeholders */
    'packageName' => 'paramStash',  /* No spaces, no dashes */
    'packageNameLower' => $packageNameLower,
    'packageDescription' => 'Grabs URL parameters from the query string and stashes them in the user session for later use.',
    'version' => '1.2.1',
    'release' => 'pl',
    'author' => 'Corey Hinshaw',
    'email' => '<hinshaw.25@osu.edu>',
    'authorUrl' => '',
    'authorSiteName' => '',
    'packageDocumentationUrl' => '',
    'copyright' => '2014',

    /* no need to edit this except to change format */
    'createdon' => strftime('%m-%d-%Y'),

    'gitHubUsername' => 'osuInteractiveComm',
    'gitHubRepository' => 'paramStash',

    /* two-letter code of your primary language */
    'primaryLanguage' => 'en',

    /* Set directory and file permissions for project directories */
    'dirPermission' => 0755,  /* No quotes!! */
    'filePermission' => 0644, /* No quotes!! */

    /* Define source and target directories */

    /* path to MyComponent source files */
    'mycomponentRoot' => $this->modx->getOption('mc.root', null,
        MODX_CORE_PATH . 'components/mycomponent/'),

    /* path to new project root */
    'targetRoot' => MODX_ASSETS_PATH . 'mycomponents/' . $packageNameLower . '/',


    /* *********************** NEW SYSTEM SETTINGS ************************ */

    /* If your extra needs new System Settings, set their field values here.
     * You can also create or edit them in the Manager (System -> System Settings),
     * and export them with exportObjects. If you do that, be sure to set
     * their namespace to the lowercase package name of your extra */

    'newSystemSettings' => array(
        'paramstash.lifetime' => array(
            'key' => 'paramstash.lifetime',
            'name' => 'Stash lifetime',
            'description' => 'The number of seconds a URL parameter should be kept in the parameter stash. Leaving the setting blank means cached parameters will never expire.',
            'namespace' => 'paramstash',
            'xtype' => 'textfield',
            'value' => '3600',
        ),
        'paramstash.params' => array(
            'key' => 'paramstash.params',
            'name' => 'Stash parameters',
            'description' => 'Comma separated list of URL parameters to place in the parameter stash. If not set, all parameters will be added.',
            'namespace' => 'paramstash',
            'xtype' => 'textfield',
            'value' => '',
        ),
    ),


    /* ************************ NAMESPACE(S) ************************* */
    /* (optional) Typically, there's only one namespace which is set
     * to the $packageNameLower value. Paths should end in a slash
    */

    'namespaces' => array(
        'paramstash' => array(
            'name' => 'paramstash',
            'path' => '{core_path}components/paramstash/',
            'assets_path' => '{assets_path}components/paramstash/',
        ),

    ),


    /* ************************* CATEGORIES *************************** */
    /* (optional) List of categories. This is only necessary if you
     * need to categories other than the one named for packageName
     * or want to nest categories.
    */

    'categories' => array(
        'paramStash' => array(
            'category' => 'paramStash',
            'parent' => '',  /* top level category */
        ),
    ),


    /* ************************* ELEMENTS **************************** */

    /* Array containing elements for your extra. 'category' is required
       for each element, all other fields are optional.
       Property Sets (if any) must come first!

       The standard file names are in this form:
           SnippetName.snippet.php
           PluginName.plugin.php
           ChunkName.chunk.html
           TemplateName.template.html

       If your file names are not standard, add this field:
          'filename' => 'actualFileName',
    */


    'elements' => array(

        'snippets' => array(
            'paramStash' => array(
                'category' => 'paramStash',
                'description' => "Retrieves URL parameters that have been stored for this user's session.",
                'static' => false,
            ),
        ),

        'plugins' => array(
            'paramStash' => array(
                'category' => 'paramStash',
                'description' => 'Stores new URL parameters in session variables and purges stale values from the parameter stash.',
                'static' => false,
                'events' => array(
                    'OnWebPageInit' => array(
                        'priority' => '0',
                        'group' => 'plugins',
                        'propertySet' => 'Default',
                    ),
                ),
            ),
        ),

    ),
    /* (optional) will make all element objects static - 'static' field above will be ignored */
    'allStatic' => false,


    /* Array of languages for which you will have language files,
     *  and comma-separated list of topics
     *  ('.inc.php' will be added as a suffix). */
    'languages' => array(
        'en' => array(
            'default',
        ),
    ),

    /* ********************************************* */
    /* Define optional directories to create under assets.
     * Add your own as needed.
     * Set to true to create directory.
     * Set to hasAssets = false to skip.
     * Empty js and/or css files will be created.
     */
    'hasAssets' => false,


    /* ********************************************* */
    /* Define basic directories and files to be created in project*/

    'docs' => array(
        'readme.txt',
        'license.txt',
        'changelog.txt',
    ),

    /* (optional) Description file for GitHub project home page */
    'readme.md' => true,
    /* assume every package has a core directory */
    'hasCore' => true,


    /* *******************************************
     * These settings control exportObjects.php  *
     ******************************************* */
    /* ExportObjects will update existing files. If you set dryRun
       to '1', ExportObjects will report what it would have done
       without changing anything. Note: On some platforms,
       dryRun is *very* slow  */

    'dryRun' => '0',

    /* Array of elements to export. All elements set below will be handled.
     *
     * To export resources, be sure to list pagetitles and/or IDs of parents
     * of desired resources
    */
    'process' => array(
        'snippets',
        'plugins',
        'systemSettings',
    ),


    /* ******************** LEXICON HELPER SETTINGS ***************** */
    /* These settings are used by LexiconHelper */
    'rewriteCodeFiles' => false,  /* remove ~~descriptions */
    'rewriteLexiconFiles' => true, /* automatically add missing strings to lexicon files */
    /* ******************************************* */

    /* Array of aliases used in code for the properties array.
     * Used by the checkproperties utility to check properties in code against
     * the properties in your properties transport files.
     * if you use something else, add it here (OK to remove ones you never use.
     * Search also checks with '$this->' prefix -- no need to add it here. */
    'scriptPropertiesAliases' => array(
        'props',
        'sp',
        'config',
        'scriptProperties'
    ),

);

return $components;