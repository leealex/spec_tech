<?php
/**
 * @var $this yii\web\View
 * @var $model \app\modules\admin\models\Feedback
 */

use app\modules\admin\widgets\Text;

?>
<div class="site-contacts">
  <section class="">
    <div class="container">
      <div class="row">
        <div class="col-md-10 col-md-offset-1">
          <div class="icon contacts wow bounceInLeft"></div>
          <h2 class="wow bounceInLeft">Контакты</h2>
            <?= Text::widget([
                'key' => 'contacts',
                'htmlOptions' => ['class' => 'wow bounceInRight']
            ]) ?>
        </div>
      </div>
    </div>
  </section>
  <iframe src="https://yandex.ru/map-widget/v1/-/CGgdVSk~" width="100%" height="500" frameborder="0"></iframe>
</div>
