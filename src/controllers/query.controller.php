<?php

namespace controllers;

class QueryController
{
    private array $queryArray = [];
    private string $DOMEN;
    private string $ENDPOINT;
    private string $API_KEY;
    private string $STORE_KEY;

    public function __construct($DOMEN, $ENDPOINT, $API_KEY, $STORE_KEY)
    {
        $this->DOMEN = $DOMEN;
        $this->ENDPOINT = $ENDPOINT;
        $this->API_KEY = $API_KEY;
        $this->STORE_KEY = $STORE_KEY;
    }

    public function pageCursor(string $hash)
    {
        array_push($this->queryArray, "&page_cursor=$hash");
        return $this;
    }

    public function productsPerPage($count = 5)
    {
        array_push($this->queryArray, "&count=$count");
        return $this;
    }

    public function modifiedToday()
    {
        $currentDate = date("Y-m-d");
        array_push($this->queryArray, "&modified_from=$currentDate");
        return $this;
    }

    public function modifiedYesterday()
    {
        $yesterdayDate = date("Y-m-d", strtotime("-1 day"));
        array_push($this->queryArray, "&modified_from=$yesterdayDate");
        return $this;
    }

    public function responseFields()
    {
        array_push($this->queryArray, "&response_fields={pagination,result{product{id,model,name,description,price,create_at,modified_at,images}}}");
        return $this;
    }

    public function makeQueryString()
    {
        array_unshift($this->queryArray, $this->DOMEN . $this->ENDPOINT . 'api_key=' . $this->API_KEY . '&store_key=' . $this->STORE_KEY);
        return implode("", $this->queryArray);
    }
}
