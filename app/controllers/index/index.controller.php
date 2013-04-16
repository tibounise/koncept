<?php

$fetcher = $a->getFetcher();

$fetcher->loadElement(0);

var_dump($fetcher);

var_dump($fetcher->listElements());

?>