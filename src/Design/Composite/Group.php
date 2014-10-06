<?php


namespace Design\Composite;

class Group extends OrganizationEntry
{

    /**
     * @var array
     */
    private $entries;


    /**
     * @param  string $code
     * @param  string $name
     * @return void
     */
    public function __construct ($code, $name)
    {
        parent::__construct($code, $name);
        $this->entries = array();
    }


    /**
     * @param  OrganizationEntry $entry
     * @return void
     */
    public function add (OrganizationEntry $entry)
    {
        array_push($this->entries, $entry);
    }


    /**
     * @return void
     */
    public function dump ()
    {
        parent::dump();
        foreach ($this->entries as $entry) {
            $entry->dump();
        }
    }
}

