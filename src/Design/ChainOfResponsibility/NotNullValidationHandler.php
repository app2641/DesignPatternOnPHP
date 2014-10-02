<?php


namespace Design\ChainOfResponsibility;

class NotNullValidationHandler extends ValidationHandler
{

    /**
     * @param  string $input
     * @return boolean
     **/
    public function execValidation ($input)
    {
        return (is_string($input) && $input !== '');
    }


    /**
     * @return string
     **/
    public function getErrorMessage ()
    {
        return '入力されていません';
    }
}

