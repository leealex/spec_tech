<?php

use app\modules\admin\widgets\Settings;

/* @var $this yii\web\View */
/* @var $settings \app\modules\admin\models\Settings[] */

$this->title = 'Настройки';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="settings-index">

    <?= Settings::widget(['settings' => $settings])?>

</div>
