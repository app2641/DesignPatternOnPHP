<?php


namespace Design\FactoryMethod;

use Design\FactoryMethod\CsvFileReader;
use Design\FactoryMethod\XmlFileReader;

class ReaderFactory
{

    /**
     * Readerクラスを生成する
     *
     * @param  string $file_path
     * @return Reader
     **/
    public function getReader ($file_path)
    {
        $info = pathinfo($file_path);

        switch ($info['extension']) {
            case 'csv':
                $reader = new CsvFileReader();
                break;

            case 'xml':
                $reader = new XmlFileReader();
                break;

            default:
                throw new \Exception('サポートされていないファイルです');
                break;
        }
        
        $reader->setFilePath($file_path);
        return $reader;
    }
}

