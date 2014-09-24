<?php


namespace Design\Iterator;

class SalesmanIterator extends \FilterIterator
{

    /**
     * @param  ArrayIterator $iterator
     * @return void
     **/
    public function __construct ($iterator)
    {
        parent::__construct($iterator);
    }


    /**
     * @return boolean
     **/
    public function accept ()
    {
        $employee = $this->getInnerIterator()->current();
        return ($employee->getJob() == 'SALESMAN');
    }
}

