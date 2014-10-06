<?php


namespace Design\Composite;

abstract class OrganizationEntry
{

    /**
     * @var string
     */
    private $code;


    /**
     * @var string
     */
    private $name;


    /**
     * @param  string $code
     * @param  string $name
     * @return void
     */
    public function __construct ($code, $name)
    {
        $this->code = $code;
        $this->name = $name;
    }


    /**
     * @return string
     */
    public function getCode ()
    {
        return $this->code;
    }


    /**
     * @return string
     */
    public function getName ()
    {
        return $this->name;
    }


    /**
     * @return void
     */
    public function dump ()
    {
        echo $this->code.': '.$this->name.PHP_EOL;
    }


    /**
     * @param  OrganizationEntry $entry
     * @return void
     */
    abstract public function add (OrganizationEntry $entry);
}

