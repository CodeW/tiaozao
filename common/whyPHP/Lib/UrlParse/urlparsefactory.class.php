<?php
class UrlParseFactory
{
    private $url;
    
    public function __construct($url)
    {
        $this->url = $url;
    }
    
    public function getUrlParseObject()
    {
        switch(URL_MODEL)
        {
            case 0: 
                return new PathInfo($this->url);
            default:
                return new PathInfo($this->url);
        }   
    }
}