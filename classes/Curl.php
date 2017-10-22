<?php
class Curl{
    public function get_page($url) {
        $ch = curl_init($url);

        //Curl settings
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
        curl_setopt($ch, CURLOPT_USERAGENT, 'Mozilla/5.0 (Windows NT 10.0; Win64; x64; rv:50.0) Gecko/20100101 Firefox/50.0');
        curl_setopt($ch, CURLOPT_REFERER, $url);
        $page = curl_exec($ch);
        curl_close($ch);

        return $page;
    }

    public function test(){
    }
}