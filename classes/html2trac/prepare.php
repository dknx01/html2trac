<?php

class html2trac_prepare
{
    public function __construct()
    {
        html2trac_store::getInstance()
                ->setTransformedData(html2trac_store::getInstance()->getInputData());
    }
    
    public function extractBody()
    {
        $data = html2trac_store::getInstance()->getTransformedData();
        if (strpos($data, '<body')) {
            $pattern = '/<body[^>]*>(.*?)<\/body>/is';
            preg_match($pattern, $data, $matches);
            $transformedData = $matches[1];
            html2trac_store::getInstance()->setTransformedData($transformedData);
        }
    }
}