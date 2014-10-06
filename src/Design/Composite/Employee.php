<?php


namespace Design\Composite;

class Employee extends OrganizationEntry
{

    /**
     * @return void
     */
    public function __construct ($code, $name)
    {
        parent::__construct($code, $name);
    }


    /**
     * @param  OrganizationEntry $entry
     * @return void
     */
    public function add (OrganizationEntry $entry)
    {
        throw new \Exception('使用できないメソッドです');
    }
}

