<?php


namespace Design\AbstractFactory;

interface ItemDao
{

    /**
     * @param  int $item_id
     * @return Item
     **/
    public function findById ($item_id);
}

