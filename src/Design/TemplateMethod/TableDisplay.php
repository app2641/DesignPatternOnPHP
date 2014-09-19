<?php


namespace Design\TemplateMethod;

class TableDisplay extends AbstractDisplay
{

    /**
     * @return void
     **/
    protected function _displayHeader ()
    {
        echo '<table>'.PHP_EOL;
    }


    /**
     * @return void
     **/
    protected function _displayBody ()
    {
        $data = $this->getData();
        foreach ($data as $name => $stand) {
            echo '<tr>'.PHP_EOL;
            echo '<th>Name: '.$name.'</th>'.PHP_EOL;
            echo '<td>'.$stand.'</td>'.PHP_EOL;
            echo '</tr>'.PHP_EOL;
        }
    }


    /**
     * @return void
     **/
    protected function _displayFooter ()
    {
        echo '</table>'.PHP_EOL;
    }
}

