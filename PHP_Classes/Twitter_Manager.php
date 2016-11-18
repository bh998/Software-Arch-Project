<?php

//php twitter library found on github
//link is https://github.com/jublonet/codebird-php
require_once('../Libraries/codebird-php-develop/src/codebird.php');

class Twitter_Manager {

    var $token = "AAAAAAAAAAAAAAAAAAAAANrjxwAAAAAAJIr47%2FLI4jbswGYCrG7ZT2t%2F2uE%3DpcRa27XvcsY2WG0kETHuKn0Yasp2rFxGv2Eq3lUPtrayVKdbUu";

    public function getStockTweets($stock){
        $cb = \Codebird\Codebird::getInstance();
        \Codebird\Codebird::setBearerToken($this->token);
        $cb->setReturnFormat(CODEBIRD_RETURNFORMAT_JSON);
        $reply = (array)$cb->search_tweets('q=$' . $stock, true);
        return $reply;
    }

}
?>
