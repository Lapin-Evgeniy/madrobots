<?php
namespace Lapin\Review\Handlers;

class ReviewEventHandler
{
    public static function onAfterAdd(Entity\Event $event)
    {
        var_dump('test');
        die();

        /*$productId = $event->getParameters()['fields']['product_id'];
        $result = self::getList([
            'select' => ['raiting'],
            'filter' => [
                'product_id' => $productId
            ],
        ]);
        $reviews = $result->fetchAll();

        $reviewsCount = count($reviews);

        $totalRaiting = 0;
        foreach ($reviews as $review) {s
            $totalRaiting += $review['raiting'];
        }

        $raitingNumber = $totalRaiting / $reviewsCount;
        RaitingRepository::updateOrCreate($productId, $raitingNumber);*/

    }
}