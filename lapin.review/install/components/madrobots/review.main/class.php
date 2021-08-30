<?php
if (!defined('B_PROLOG_INCLUDED') || B_PROLOG_INCLUDED !== true) {
    die();
}

use Bitrix\Main\Application;
use Bitrix\Main\Loader;

class ReviewsComponent extends CBitrixComponent
{
    protected $request;

    public function __construct($component = null)
    {
        global $USER;
        parent::__construct($component);
        if(!Loader::includeModule("lapin.review")) {
            throw new Exception('модуль lapin.review не установлен');
        }

        $this->request = Application::getInstance()->getContext()->getRequest();
        $this->user = $USER;
    }

    public function executeComponent()
    {
        if($this->user->IsAuthorized()) {
            #TODO deny entry
        }

        if($this->request->getPost('send')) {
            $validatedData = $this->getValidated($this->getRequest());
            $this->createReview($validatedData);
        }

        $this->includeComponentTemplate();
    }

    public function getRequest()
    {
        return [
            'userId' => $this->user->GetID(),
            'text' => $this->request->getPost('text'),
            'raiting' => $this->request->getPost('raiting'),
            'productId' => $this->arParams['ELEMENT_ID']
        ];
    }

    public function createReview($request)
    {
        $result = \Lapin\Review\Tables\ReviewTable::add($request);
        if ($result->isSuccess()) {
            $this->arResult['formSucces'] = true;
        }
        else {
            $this->arResult['formErrors'] = $result->getErrorMessages();
        }
    }

    public function getValidated($data) : array
    {
        #TODO validation
        return $data;
    }
}