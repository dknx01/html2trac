<?php

class html2trac_store
{
    static private $instance = null;
    protected $inputData = null;
    protected $transformedData = null;
    
    /**
     * 
     * @param string $input
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
     * @param string $input
     */
    protected function __construct($input)
    {
        $this->setInputData($input);
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
     * @param string $inputData
     * @return \html2trac_store
     */
    public function setInputData($inputData)
    {
        if (!is_string($inputData)) {
            throw new Exception('Input data must be a string');
        }
        $this->inputData = $inputData;
        return $this;
    }

    /**
     * 
     * @return string
     */
    public function getTransformedData()
    {
        return $this->transformedData;
    }

    /**
     * 
     * @param string $transformedData
     * @return \html2trac_store
     */
    public function setTransformedData($transformedData)
    {
        $this->transformedData = $transformedData;
        return $this;
    }
}