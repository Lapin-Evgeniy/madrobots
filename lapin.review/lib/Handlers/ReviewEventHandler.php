<?php
namespace Lapin\Review\Handlers;

use Bitrix\Main\Event;
use Lapin\Review\Services\RaitingService;
use Lapin\Review\Tables\ReviewTable;

class ReviewEventHandler
{
    public static function onAfterAdd(Event  $event) //
    {
        $productId = $event->getParameters()['fields']['productId'];
        $result = ReviewTable::getList([
            'select' => ['raiting'],
            'filter' => [
                'productId' => $productId
            ],
        ])->fetchAll();

        $reviewsCount = count($result);

        $totalRaiting = 0;
        foreach ($result as $review) {
            $totalRaiting += $review['raiting'];
        }

        $raitingNumber = $totalRaiting / $reviewsCount;
        RaitingService::updateOrCreate($productId, $raitingNumber);
    }
}