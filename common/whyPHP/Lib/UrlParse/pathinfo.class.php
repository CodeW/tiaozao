<?php
class PathInfo extends UrlParse
{
    public function __construct($url)
    {
        parent::__construct($url);
    }
    
    public function getController()
    {
        return '123';
    }
    
    public function getAction()
    {
        
    }
    
    public function getParams()
    {
        
    }
}