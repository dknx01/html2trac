<?php

class html2trac_transformTags
{
    /**
     * transform all br
     * @return \html2trac_transformTags
     */
    public function brTag()
    {
        $pattern = '/<br[^>]*>/i';
        $replacement = '[[BR]]';
        $this->simpleReplace($pattern, $replacement);
        return $this;
    }
    /**
     * transform all heading
     * @return \html2trac_transformTags
     */
    public function headingTags()
    {
        for ($i=1; $i<4; $i++) {
            $this->h($i);
        } 
        return $this;
    }
    
    /**
     * transform one kind of headings
     * @param int $number
     * @return \html2trac_transformTags
     */
    protected function h($number)
    {
        $pattern = '/<h' . $number . '[^>]*>(.*?)<\/h' . $number . '>/i';
        $tagReplacement = str_repeat('=', $number);
        $replace = $tagReplacement . '$1' . $tagReplacement;
        html2trac_store::getInstance()->setTransformedData(
                preg_replace($pattern, 
                            $replace,
                            html2trac_store::getInstance()->getTransformedData())
            );
        return $this;
    }
    
    /**
     * transform bold tags
     * @return \html2trac_transformTags
     */
    public function boldTags()
    {
        $pattern = '/<b[^>]*>(.*?)<\/b>/i';
        $replacement = '\'\'\'$1\'\'\'';
        $this->simpleReplace($pattern, $replacement);
        return $this;
    }
    
    /**
     * transform italics tags
     * @return \html2trac_transformTags
     */
    public function italicsTags()
    {
        $pattern = '/<i[^>]*>(.*?)<\/i>/i';
        $replacement = '\'\'$1\'\'';
        $this->simpleReplace($pattern, $replacement);
        return $this;
    }
    
    /**
     * transform underline tags
     * @return \html2trac_transformTags
     */
    public function underlineTags()
    {
        $pattern = '/<u[^>]*>(.*?)<\/u>/i';
        $replacement = '__$1__';
        $this->simpleReplace($pattern, $replacement);
        return $this;
    }
    
    /**
     * transform monospace text tags
     * @param string $replaceCharacter (` or { allowed)
     * @return \html2trac_transformTags
     */
    public function monospaceTags($replaceCharacter = '`')
    {
        if (!in_array($replaceCharacter, array('{', '`'))) {
            throw new Exception ('Replacement character can only be { or `');
        }
        $pattern = '/<tt[^>]*>(.*?)<\/tt>/i';
        if ($replaceCharacter == '`') {
            $replacement = '`$1`';
        } elseif ($replaceCharacter == '{') {
            $replacement = '{{{$1}}}';
        }
        $this->simpleReplace($pattern, $replacement);
        return $this;
    }
    
    /**
     * transform strike through tags
     * @return \html2trac_transformTags
     */
    public function strikeThroughTags()
    {
        $pattern = '/<del[^>]*>(.*?)<\/del>/i';
        $replacement = '~~$1~~';
        $this->simpleReplace($pattern, $replacement);
        return $this;
    }
    
    /**
     * transform super script tags
     * @return \html2trac_transformTags
     */
    public function superTags()
    {
        $pattern = '/<sup[^>]*>(.*?)<\/sup>/i';
        $replacement = '^$1^';
        $this->simpleReplace($pattern, $replacement);
        return $this;
    }
    
    /**
     * transform sub script tags
     * @return \html2trac_transformTags
     */
    public function subTags()
    {
        $pattern = '/<sub[^>]*>(.*?)<\/sub>/i';
        $replacement = ',,$1,,';
        $this->simpleReplace($pattern, $replacement);
        return $this;
    }
    
    /**
     * escpape all Trac Wiki parser characters
     * @return \html2trac_transformTags
     */
    public function escapeParser()
    {
        //@TODO 
        return $this;
    }
    /**
     * transform all unordered list tags
     * @return \html2trac_transformTags
     */
    public function unorderedListTags()
    {
        //@TODO 
        return $this;
    }
    /**
     * transforms all ordered list tags
     * @return \html2trac_transformTags
     */
    public function orderedListTags()
    {
        //@TODO 
        return $this;
    }
    /**
     * transform a table
     * @return \html2trac_transformTags
     */
    public function tableTags()
    {
        //@TODO 
        return $this;
    }
    /**
     * transform an image tags
     * @return \html2trac_transformTags
     */
    public function imageTags()
    {
        //@TODO 
        return $this;
    }
    /**
     * transform a link tag
     * @return \html2trac_transformTags
     */
    public function linkTags()
    {
        //@TODO 
        return $this;
    }
    
    /**
     * proccess a simple replacement
     * @param string $pattern
     * @param string $replacement
     */
    protected function simpleReplace($pattern, $replacement)
    {
        html2trac_store::getInstance()->setTransformedData(
                preg_replace($pattern, $replacement,
                html2trac_store::getInstance()->getTransformedData())
                );
    }
}