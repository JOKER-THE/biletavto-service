<?php

namespace application\widgets;

use yii\base\Widget;

/**
 * Виджет бокового меню.
 */
class Sidebar extends Widget
{
    /**
     * @return mixed
     */
    public function run()
    {
        return $this->render('sidebar');
    }
}
