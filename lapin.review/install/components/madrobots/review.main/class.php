<?php
if (!defined('B_PROLOG_INCLUDED') || B_PROLOG_INCLUDED !== true) {
    die();
}

use Bitrix\Main\Application;
use Bitrix\Main\Loader;


class ReviewsComponent extends CBitrixComponent
{
    public function executeComponent()
    {
        global $USER;

        if($USER->IsAuthorized()) {
            #TODO deny entry
        }

        $request = Application::getInstance()->getContext()->getRequest();
        $text = $request->getPost('text');
        $product_id = $this->arParams['ELEMENT_ID'];
        $raiting = $request->getPost('raiting');

        if($request->getPost('send')) {
            if(Loader::includeModule("lapin.review")) {

                $result = \Lapin\review\entities\ReviewTable::add([
                    'user_id' => $USER->GetID(),
                    'product_id' => $product_id,
                    'raiting' => $raiting,
                    'text' => $text,
                ]);

                if (!$result->isSuccess())
                {
                    $this->arResult['formErrors'] = $result->getErrorMessages();
                }
                else {
                    if($result) {
                        $this->arResult['formSucces'] = true;
                    }
                }
            }
        }

        $this->includeComponentTemplate();
    }
}