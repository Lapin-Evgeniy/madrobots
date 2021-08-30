<?php
use Bitrix\Main\Loader;
Use Bitrix\Main\Application;

\Bitrix\Main\Loader::registerAutoLoadClasses('lapin.review', [
    '\Lapin\Review\Tables\RaitingTable' => '/lib/Tables/RaitingTable.php',
    '\Lapin\Review\Tables\ReviewTable' => '/lib/Tables/ReviewTable.php',
    '\Lapin\Review\Servies\RaitingService' => '/lib/Tables/RaitingService.php',
    '\Lapin\Review\Handlers\ReviewEventHandler' => '/lib/Handlers/ReviewEventHandler.php',
]);