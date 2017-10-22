<?php
require_once('../library/phpQuery/phpQuery.php');

class Parsing{
    protected $curl;

    public function __construct(){
        $this->curl = new Curl();
    }

    protected function phpQueryConnection(Curl $curl, $currentUrl){
        //Get data for Curl
        $getSitePage = $curl->get_page($currentUrl);

        //phpQuery connection
        return phpQuery::newDocument($getSitePage);
    }
}