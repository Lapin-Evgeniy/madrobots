<?php

namespace Lapin\Review\Services;

use Lapin\Review\Tables\RaitingTable;

class RaitingService
{
    public static function updateOrCreate($productId, $raitingNumber)
    {
        $raiting = RaitingTable::getList([
            'select' => ['id'],
            'filter' => ['productId' => $productId],
        ])->fetch();

        if ($raiting) {
            RaitingTable::update($raiting['id'], [
                'averageRating' => $raitingNumber,
            ]);
        } else {
            RaitingTable::add([
                'productId' => $productId,
                'averageRating' => $raitingNumber,
            ]);
        }
    }
}