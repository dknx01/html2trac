<?php

class html2trac_transformTags
{
    public function brTag()
    {
        $search = array('<br>', '<br />', '<br/>');
        $data = html2trac_store::getInstance()->getTransformedData();
        $pattern = '/<br[^>]*>/i';
        $data = preg_replace($pattern, '[[BR]]', $data);
        html2trac_store::getInstance()->setTransformedData($data);
        return $this;
    }
    
    public function headingTags()
    {
        for ($i=1; $i<4; $i++) {
            $this->h($i);
        }
//        $this->h1();
        
    }
    protected function h($number)
    {
        $pattern = '/<h' . $number . '[^>]*>(.*?)<\/h' . $number . '>/i';
        $tagReplacement = str_repeat('=', $number);
        $replace = $tagReplacement . ' $1 ' . $tagReplacement;
        html2trac_store::getInstance()->setTransformedData(
                preg_replace($pattern, 
                            $replace,
                            html2trac_store::getInstance()->getTransformedData())
            );
        return $this;
    }
}