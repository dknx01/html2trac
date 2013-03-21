<?php
/**
 * prepare the data
 * @author dknx01
 */
class html2trac_prepare
{
    /**
     * the constructor
     */
    public function __construct()
    {
        html2trac_store::getInstance()
                ->setTransformedData(html2trac_store::getInstance()->getInputData());
    }
    
    /**
     * extract the body part if exists
     */
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