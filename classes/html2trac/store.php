<?php

class html2trac_store
{
    static private $instance = null;
    protected $inputData = null;
    protected $transformedData = null;
    
    /**
     * 
     * @param type $input
     * @return html2trac_store
     */
    static public function getInstance($input = null)
    {
        if (is_null(self::$instance)) {
            self::$instance = new self($input);
        }
        return self::$instance;
    }
    
    private function __clone()
    {}
    
    /**
     * 
     * @param type $input
     */
    protected function __construct($input)
    {
        $this->inputData = $input;
    }
    
    /**
     * 
     * @return type
     */
    public function getInputData()
    {
        return $this->inputData;
    }
    
    /**
     * 
     * @param type $inputData
     * @return \html2trac_store
     */
    public function setInputData($inputData)
    {
        $this->inputData = $inputData;
        return $this;
    }

    /**
     * 
     * @return type
     */
    public function getTransformedData()
    {
        return $this->transformedData;
    }

    /**
     * 
     * @param type $transformedData
     * @return \html2trac_store
     */
    public function setTransformedData($transformedData)
    {
        $this->transformedData = $transformedData;
        return $this;
    }
}