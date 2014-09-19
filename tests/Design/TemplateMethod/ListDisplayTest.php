<?php


use Design\TemplateMethod\ListDisplay;

class ListDisplayTest extends PHPUnit_Framework_TestCase
{

    /**
     * @var ListDisplay
     **/
    private $list;


    /**
     * @var array
     **/
    private $data;


    /**
     * @return void
     **/
    public function setUp ()
    {
        $this->list = new ListDisplay();
        $this->data = array(
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
     * @group list-not-set-data
     * @group list
     */
    public function パラメータデータを指定していない場合 ()
    {
        $this->list->display();
    }


    /**
     * @test
     * @group list-display
     * @group list
     */
    public function 正常な処理 ()
    {
        $this->list->setData($this->data);
        $this->list->display();

        $result = file_get_contents(ROOT.'/data/TemplateMethod/ListResult.html');
        $this->expectOutputString($result);
    }
}
