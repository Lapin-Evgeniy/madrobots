<?php

use Bitrix\Main\Loader;
use Reviews\ReviewsHelper;

Class lapin_review extends CModule
{
    var $MODULE_ID = "lapin.review";
    var $MODULE_DEVELOPER = 'lapin';
    var $MODULE_VERSION = 1.0;
    var $MODULE_VERSION_DATE;
    var $MODULE_NAME = 'Reviews form';


    public function installEvent()
    {
        $eventManager = \Bitrix\Main\EventManager::getInstance();
        $eventManager->registerEventHandlerCompatible(
            'lapin.review',
            '\Lapin\Review\Review::onAfterAdd',
            $this->MODULE_ID,
            '\Lapin\Review\Handlers\ReviewEventHandler',
            'onAfterAdd'
        );
    }

    public function removeEvent()
    {
        $eventManager = \Bitrix\Main\EventManager::getInstance();
        $eventManager->unRegisterEventHandler(
            'lapin.review',
            '\Lapin\Review\Review::onAfterAdd',
            $this->MODULE_ID,
            '\Lapin\Review\Handlers\ReviewEventHandler',
            'onAfterAdd'
        );
    }

    public function installDB()
    {
        $connection = \Bitrix\Main\Application::getConnection();
        \Lapin\review\entities\ReviewTable::getEntity()->createDbTable();
        \Lapin\review\entities\RaitingTable::getEntity()->createDbTable();
    }

    public function unInstallDB()
    {
        $connection = \Bitrix\Main\Application::getConnection();

        $connection->dropTable(\Lapin\review\entities\ReviewTable::getTableName());
        $connection->dropTable(\Lapin\review\entities\RaitingTable::getTableName());
    }

    function InstallFiles()
    {
        CopyDirFiles($_SERVER["DOCUMENT_ROOT"]."/local/modules/". $this->MODULE_ID."/install/components",
            $_SERVER["DOCUMENT_ROOT"]."/local/components", true, true);
        return true;
    }

    function UnInstallFiles()
    {
        DeleteDirFilesEx($_SERVER["DOCUMENT_ROOT"]."/local/components/madrobots/review.main");
        return true;
    }

    function doInstall()
    {
        global $APPLICATION;

        RegisterModule($this->MODULE_ID);

        if(\Bitrix\Main\Loader::includeModule($this->MODULE_ID)) {
            $this->installDB();
            $this->installEvent();
            $this->InstallFiles();
        }
    }

    function doUninstall()
    {
        global $APPLICATION;

        if(\Bitrix\Main\Loader::includeModule($this->MODULE_ID)) {
            $this->unInstallDB();
            $this->UnInstallFiles();
        }
        UnRegisterModule($this->MODULE_ID);
    }
}
?>