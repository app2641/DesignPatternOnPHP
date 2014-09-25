<?php


namespace Design\AbstractFactory;

class DbItemDao implements ItemDao
{

    /**
     * @var array
     **/
    private $items = array();


    /**
     * @return void
     **/
    public function __construct ()
    {
        $fp = fopen(ROOT.'/data/AbstractFactory/item.csv', 'r');
        while ($data = fgetcsv($fp, 1000, ',')) {
            $item = new Item();
            $item->setId($data[0]);
            $item->setName($data[1]);
            $this->items[$item->getId()] = $item;
        }

        fclose($fp);
    }



    /**
     * @param  int $item_id
     * @return Item
     **/
    public function findById ($item_id)
    {
        if (array_key_exists($item_id, $this->items)) {
            return $this->items[$item_id];
        } else {
            return null;
        }
    }
}

