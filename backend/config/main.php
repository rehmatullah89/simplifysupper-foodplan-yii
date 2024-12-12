<?php

/**
 * main.php
 *
 * @author: antonio ramirez <antonio@clevertech.biz>
 * Date: 7/22/12
 * Time: 5:48 PM
 *
 * This file holds the configuration settings of your backend application.
 * */
$backendConfigDir = dirname(__FILE__);

$root = $backendConfigDir . DIRECTORY_SEPARATOR . '..' . DIRECTORY_SEPARATOR . '..';

$params = require_once($backendConfigDir . DIRECTORY_SEPARATOR . 'params.php');

// Setup some default path aliases. These alias may vary from projects.
Yii::setPathOfAlias('root', $root);
Yii::setPathOfAlias('common', $root . DIRECTORY_SEPARATOR . 'common');
Yii::setPathOfAlias('backend', $root . DIRECTORY_SEPARATOR . 'backend');
Yii::setPathOfAlias('www', $root . DIRECTORY_SEPARATOR . 'backend' . DIRECTORY_SEPARATOR . 'www');
Yii::setPathOfAlias('fe_www', $root . DIRECTORY_SEPARATOR . 'frontend' . DIRECTORY_SEPARATOR . 'www');
/* uncomment if you need to use frontend folders */
/* Yii::setPathOfAlias('frontend', $root . DIRECTORY_SEPARATOR . 'frontend'); */


$mainLocalFile = $backendConfigDir . DIRECTORY_SEPARATOR . 'main-local.php';
$mainLocalConfiguration = file_exists($mainLocalFile) ? require($mainLocalFile) : array();

$mainEnvFile = $backendConfigDir . DIRECTORY_SEPARATOR . 'main-env.php';
$mainEnvConfiguration = file_exists($mainEnvFile) ? require($mainEnvFile) : array();

return CMap::mergeArray(
                array(
            'name' => 'SimplifySupper Admin',
            // @see http://www.yiiframework.com/doc/api/1.1/CApplication#basePath-detail
            'basePath' => 'backend',
            // set parameters
            'params' => $params,
            // preload components required before running applications
            // @see http://www.yiiframework.com/doc/api/1.1/CModule#preload-detail
            'preload' => array('bootstrap', 'log'),
            // @see http://www.yiiframework.com/doc/api/1.1/CApplication#language-detail
            'language' => 'en',
            // using bootstrap theme ? not needed with extension
//		'theme' => 'bootstrap',
            // setup import paths aliases
            // @see http://www.yiiframework.com/doc/api/1.1/YiiBase#import-detail
            'import' => array(
                //comment module
                //=======Notes Module included here
                'common.modules.notes.NotesModule',
                'common.modules.notes.models.Note',
                'common.modules.notes.components.*',
                'common.components.*',
                'common.extensions.*',
                /* uncomment if required */
                /* 'common.extensions.behaviors.*', */
                /* 'common.extensions.validators.*', */
                'common.models.*',
                // uncomment if behaviors are required
                // you can also import a specific one
                /* 'common.extensions.behaviors.*', */
                // uncomment if validators on common folder are required
                /* 'common.extensions.validators.*', */
                'application.extensions.*',
                'application.components.*',
                'application.controllers.*',
                'application.models.*',
                'ext.select2.*',
                'ext.typeahead.*',
                'ext.dynamictabularform.*',
            ),
            /* uncomment and set if required */
            // @see http://www.yiiframework.com/doc/api/1.1/CModule#setModules-detail
            'modules' => array(
                'usercomment' => array('class' => 'common.modules.usercomment.UsercommentModule'),
                'invite' => array('class' => 'common.modules.invite.InviteModule'),
                'notes' => array('class' => 'common.modules.notes.NotesModule'),
                'gii' => array(
                    'class' => 'system.gii.GiiModule',
                    'password' => '123456',
                    'generatorPaths' => array(
                        'bootstrap.gii'
                    )
                )
            ),
            'components' => array(
                'user' => array(
                    'allowAutoLogin' => true,
                ),
                /* load bootstrap components */
                'bootstrap' => array(
                    'class' => 'common.extensions.bootstrap.components.Bootstrap',
                    'responsiveCss' => true,
                ),
                'errorHandler' => array(
                    // @see http://www.yiiframework.com/doc/api/1.1/CErrorHandler#errorAction-detail
                    'errorAction' => 'site/error'
                ),
                'db' => array(
                    'connectionString' => $params['db.connectionString'],
                    'username' => $params['db.username'],
                    'password' => $params['db.password'],
                    'schemaCachingDuration' => YII_DEBUG ? 0 : 86400000, // 1000 days
                    'enableParamLogging' => YII_DEBUG,
                    'charset' => 'utf8'
                ),
                'urlManager' => array(
                    'urlFormat' => 'path',
                    'showScriptName' => false,
                    //'caseSensitive'=>false,
                    'urlSuffix' => '/',
                    'rules' => $params['url.rules']
                ),
            /* make sure you have your cache set correctly before uncommenting */
            /* 'cache' => $params['cache.core'], */
            /* 'contentCache' => $params['cache.content'] */
            ),
                ), CMap::mergeArray($mainEnvConfiguration, $mainLocalConfiguration)
);
