<?php


namespace Design\Facade;

use Design\Facade\Item;

class ItemDao
{
    
    /**
     * @var ItemDao
     */
    private static $instance;


    /**
     * @var array
     */
    private $items;


    /**
     * @return void
     */
    private function __construct ()
    {
        $fp = fopen(ROOT.'/data/Facade/item.csv', 'r');
        while ($data = fgetcsv($fp, 1000, ',')) {
            $item = new Item();
            $item->setId($data[0]);
            $item->setName($data[1]);
            $item->setPrice($data[2]);
            $this->items[$item->getId()] = $item;
        }

        fclose($fp);
    }


    /**
     * @return ItemDao
     */
    public static function getInstance ()
    {
        if (is_null(self::$instance)) {
            self::$instance = new ItemDao();
        }

        return self::$instance;
    }


    /**
     * @param  int $id 
     * @return Item
     */
    public function fetchById ($id)
    {
        if (array_key_exists($id, $this->items)) {
            return $this->items[$id];
        } else {
            return null;
        }
    }
}

