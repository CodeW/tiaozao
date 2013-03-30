<?php
abstract class UrlParse
{
    protected $url;
    
    protected function __construct($url)
    {
        $this->url = $url;
    }
    
    abstract protected function getController();
    abstract protected function getAction();
    abstract protected function getParams();
}