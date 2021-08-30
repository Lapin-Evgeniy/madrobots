<?php
namespace Lapin\Review\Tables;

use Bitrix\Main\Entity;

class RaitingTable extends Entity\DataManager
{
    public static function getTableName()
    {
        return "lapin_raiting";
    }

    public static function getMap()
    {
        return [
            new Entity\IntegerField('id', [
                'primary' => true,
                'autocomplete' => true,
            ]),
            new Entity\IntegerField('productId', [
                'required' => true,
                'unique' => true,
            ]),
            new Entity\FloatField('averageRating', [
                'required' => true,
            ]),
        ];
    }
}