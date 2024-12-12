<?php

/*
 * Notes Module Class file
 * @Author : M Fahad Akram
 * Project : Babylon
 * Date    : 9th July 2013
 * This Module is created to provide functionality to add , edit , remove the notes 
 * Write registerScripts() function for including Moudle Css and JS files
 * ASSET MANAGER : Yii addresses this by use of CAssetManager, available as Yii::app()->assetManager, 
 * which can take a module's private resource files and automatically publish them to the web-visible area 
 * (typically, webroot/assets/) on demand, giving the assets a non-conflicting unique name , 
 * that can be later referenced in the code.This copying/publishing is done the first time a module's resources are used, 
 * returning a URL to the application to use when generating HTML.
 */

class NotesModule extends CWebModule {

    public $defaultController = 'Notes';

    public function init() {

        //  called when the module is being created and import the module-level models and components
        // you may place code here to customize the module or the application

        $this->setImport(array(
            'notes.models.*',
            'notes.components.*',
        ));

        $this->registerScripts();
    }

    /*
     * Function to register Scripts
     * Asset Manager : manages the publishing of private asset files.
     * getAssetManager() :{return} CAssetManager the asset manager component
     */

    public function registerScripts() {
        $assets = Yii::app()->getAssetManager()->publish(Yii::getPathOfAlias('common.modules.notes') . '/assets');
        $cs = Yii::app()->getClientScript();
        $cs->registerCssFile($assets . '/notes.css');
        $cs->registerScriptFile($assets . '/notes.js');
        $cs->registerScriptFile($assets . '/noteshead.js', CClientScript::POS_HEAD);
    }

    /*
     * This funciton is called before any module controller action is performed
     */

    public function beforeControllerAction($controller, $action) {
        if (parent::beforeControllerAction($controller, $action)) {
            // you may place customized code here
            return true;
        }
        else
            return false;
    }

    public static function renderNotes($parentId, $parentType) {
        Yii::app()->controller->widget('common.modules.notes.components.widgets.MNote', array(
            'parent_id' => $parentId,
            'noteTypes' => $parentType,
        ));
    }

}
