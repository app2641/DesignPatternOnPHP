<?php


namespace Design\ChainOfResponsibility;

class NumberValidationHandler extends ValidationHandler
{

    /**
     * @param  string $input
     * @return boolean
     **/
    public function execValidation ($input)
    {
        return (preg_match('/^[0-9]*$/', $input) > 0);
    }


    /**
     * @return string
     **/
    public function getErrorMessage ()
    {
        return '半角数字で入力してください';
    }
}

