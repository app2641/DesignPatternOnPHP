<?php


namespace Design\TemplateMethod;

class ListDisplay extends AbstractDisplay
{

    /**
     * @return void
     **/
    protected function _displayHeader ()
    {
        echo '<dl>'.PHP_EOL;
    }


    /**
     * @return void
     **/
    protected function _displayBody ()
    {
        $data = $this->getData();
        foreach ($data as $name => $stand) {
            echo '<dt>Name: '.$name.'</dt>'.PHP_EOL;
            echo '<dd>'.$stand.'</dd>'.PHP_EOL;
        }
    }


    /**
     * @return void
     **/
    protected function _displayFooter ()
    {
        echo '</dl>'.PHP_EOL;
    }
}
