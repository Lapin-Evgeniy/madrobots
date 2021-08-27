<?php

namespace Lapin\review\repository;

use Bitrix\Main\Entity;
use Lapin\review\entities\RaitingTable;

class RaitingRepository
{
    public static function updateOrCreate($productId, $raitingNumber)
    {
        $raiting = RaitingTable::getList([
            'select' => ['id'],
            'filter' => ['product_id' => $productId],
        ])->fetch();

        if ($raiting) {
            RaitingTable::update($raiting['id'], [
                'average_rating' => $raitingNumber,
            ]);
        } else {
            RaitingTable::add([
                'product_id' => $productId,
                'average_rating' => $raitingNumber,
            ]);
        }
    }
}