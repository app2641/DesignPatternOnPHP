<?php


use Design\TemplateMethod\TableDisplay;

class TableDisplayTest extends PHPUnit_Framework_TestCase
{
    
    /**
     * @var TableDisplay
     **/
    private $table;


    /**
     * @return void
     **/
    public function __construct ()
    {
        $this->table = new TableDisplay();
        $this->data  = array(
            'ジョナサン' => null,
            'ジョセフ' => 'ハーミットパープル',
            '空条承太郎' => 'スタープラチナ',
            '東方仗助' => 'クレイジーダイヤモンド',
            'ジョルノ' => 'ゴールドエクスペリエンス',
            '空条徐倫' => 'ストーンフリー',
            'ジョニィ' => 'タスク',
            '東方定助' => 'ソフト&ウェット'
        );
    }


    /**
     * @test
     * @expectedException           Exception
     * @expectedExceptionMessage    データを指定してください
     * @group table-not-set-data
     * @group table
     */
    public function パラメータデータを指定していない場合 ()
    {
        $this->table->display();
    }


    /**
     * @test
     * @group table
     * @group table-display
     */
    public function 正常な処理 ()
    {
        $this->table->setData($this->data);
        $this->table->display();

        $result = file_get_contents(ROOT.'/data/TemplateMethod/TableResult.html');
        $this->expectOutputString($result);
    }
}

