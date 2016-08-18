<?php
namespace macrowish\widgets;

use yii\base\Widget;
use yii\helpers\Html;


class SmoothState extends Widget
{
    public $options = [];
    public $divOptions = [];

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
        $(document).ready(function(){
           $('#$div_id').smoothState();
        });
JS;

        $view->registerJs($js);

        $content = ob_get_clean();
        $response = Html::beginTag('div', $options) . $content . Html::endTag('div');
        return $response;
    }

}
