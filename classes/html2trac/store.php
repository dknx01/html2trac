<?php
/**
 * object to store the data
 * @author dknx01
 */
class html2trac_store
{
    /**
     *the instance
     * @var html2trac_store
     */
    static private $instance = null;
    /**
     *the original input data
     * @var string
     */
    protected $inputData = null;
    /**
     * the (partly) transformed data
     * @var string
     */
    protected $transformedData = null;
    
    /**
     * gets the instance or create one
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
    /**
     * overwrite clone
     */
    private function __clone()
    {}
    
    /**
     * construcor
     * @param string $input
     */
    protected function __construct($input)
    {
        $this->setInputData($input);
    }
    
    /**
     * get the input data
     * @return type
     */
    public function getInputData()
    {
        return $this->inputData;
    }
    
    /**
     * set the input data
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
     * get the transformed data
     * @return string
     */
    public function getTransformedData()
    {
        return $this->transformedData;
    }

    /**
     * set the transformed data
     * @param string $transformedData
     * @return \html2trac_store
     */
    public function setTransformedData($transformedData)
    {
        $this->transformedData = $transformedData;
        return $this;
    }
}