<?php

class html2trac
{
    
    public function __construct($input = null)
    {
        html2trac_store::getInstance($input);
    }
    
    public function transform()
    {
        $prepare = new html2trac_prepare();
        $transformTags = new html2trac_transformTags();
        $prepare->extractBody();
        $transformTags->brTag()
                      ->headingTags();
        return html2trac_store::getInstance()->getTransformedData();
    }
}