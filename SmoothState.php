<?php
namespace macrowish\widgets;

use yii\base\Widget;
use yii\helpers\Html;


class SmoothState extends Widget
{
    public $options = [];

    public function init()
    {
        if (!isset($this->options['id'])) {
            $this->options['id'] = $this->getId();
        }
        ob_start();
    }

    public function run()
    {
        $options = $this->options;
        $div_id = $options['id'];
        $view = $this->getView();
        $view->registerJsFile('//cdnjs.cloudflare.com/ajax/libs/smoothState.js/0.7.2/jquery.smoothState.min.js', ['depends' => [\yii\web\JqueryAsset::className()]]);

        $js = <<<JS
                $(function() {
                  $('$div_id').smoothState();
                });
JS;

        $content = ob_get_clean();
        $response = Html::beginTag('div', ['id'=>$options['id']]) . $content . Html::endTag('div');
        return $response;
    }

}
