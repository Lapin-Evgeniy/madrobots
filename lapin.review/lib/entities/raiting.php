<?php
namespace Lapin\review\entities;

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
            new Entity\IntegerField('product_id', [
                'required' => true,
                'unique' => true,
            ]),
            new Entity\FloatField('average_rating', [
                'required' => true,
            ]),
        ];
    }
}