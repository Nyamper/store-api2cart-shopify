<?php

namespace controllers;

class NavigationController
{
    private QueryController $queryController;

    public function __construct($queryController)
    {
        $this->queryController = $queryController;
    }

    public function allProducts()
    {
        return $this->queryController->productsPerPage()->responseFields()->makeQueryString();
    }

    public function today()
    {
        return $this->queryController->productsPerPage()->modifiedToday()->responseFields()->makeQueryString();
    }

    public function yesterday()
    {
        return $this->queryController->productsPerPage()->modifiedYesterday()->responseFields()->makeQueryString();
    }

    public function pagination($hash)
    {
        return $this->queryController->pageCursor($hash)->responseFields()->makeQueryString();
    }
}
