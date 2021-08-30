<?php
namespace Lapin\Review\Tables;

use Bitrix\Main\Entity;

class ReviewTable extends Entity\DataManager
{
    public static function getTableName()
    {
        return "lapin_review";
    }

    public static function getMap()
    {
        return [
            new Entity\IntegerField('id', [
                'primary' => true,
                'autocomplete' => true,
            ]),
            new Entity\IntegerField('userId', [
                'required' => true,
            ]),
            new Entity\IntegerField('productId', [
                'required' => true,
            ]),
            new Entity\BooleanField('published', [
                'values' => ['N', 'Y'],
                'default_value' => false
            ]),
            new Entity\IntegerField('raiting', [
                'required' => true,
            ]),
            new Entity\TextField('text', [
                'required' => true,
            ])
        ];
    }
}