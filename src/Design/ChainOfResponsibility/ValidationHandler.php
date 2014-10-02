<?php


namespace Design\ChainOfResponsibility;

abstract class ValidationHandler
{

    /**
     * @var ValidationHandler
     **/
    private $next_handler;


    /**
     * @param  ValidationHandler
     * @return ValidationHandler
     **/
    public function setHandler (ValidationHandler $handler)
    {
        $this->next_handler = $handler;
        return $this;
    }


    /**
     * @return ValidationHandler
     **/
    public function getNextHandler ()
    {
        return $this->next_handler;
    }


    /**
     * チェーンの実行
     *
     * @param  string $input
     * @return mixed
     **/
    public function validate ($input)
    {
        $result = $this->execValidation($input);
        if (! $result) {
            return $this->getErrorMessage();
        } elseif (! is_null($this->getNextHandler())) {
            return $this->getNextHandler()->validate($input);
        } else {
            return true;
        }
    }


    /**
     * @param  string $input
     * @return boolean
     **/
    abstract public function execValidation ($input);


    /**
     * @return string
     **/
    abstract public function getErrorMessage ();
}

