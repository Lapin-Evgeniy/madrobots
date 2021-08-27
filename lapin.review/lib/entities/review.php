<?php
namespace Lapin\review\entities;

use Bitrix\Main\Entity;
use Lapin\Review\Repository\RaitingRepository;

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
            new Entity\IntegerField('user_id', [
                'required' => true,
            ]),
            new Entity\IntegerField('product_id', [
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