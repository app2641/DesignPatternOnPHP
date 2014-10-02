<?php


namespace Design\ChainOfResponsibility;

class AlphabetValidationHandler extends ValidationHandler
{

    /**
     * @param  string $input
     * @return boolean
     **/
    public function execValidation ($input)
    {
        return preg_match('/^[a-z]*$/i', $input);
    }


    /**
     * @return string
     **/
    public function getErrorMessage ()
    {
        return '半角英字で入力してください';
    }
}

