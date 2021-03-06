<?php

use yii\helpers\Html;
use yii\helpers\Url;
use yii\widgets\DetailView;
use modules\users\Module;

/* @var $this yii\web\View */
/* @var $model modules\users\models\User */

$this->registerJs("$('#status_link_" . $model->id . "').click(handleAjaxLink);", \yii\web\View::POS_READY);
?>
<div class="row">
    <div class="col-sm-2">
        <?php if ($model->avatar) : ?>
            <?= Html::img($model->getAvatarPath(), [
                'class' => 'profile-user-img img-responsive img-circle',
                'style' => 'margin-bottom:10px; width:auto',
                'alt' => 'avatar_' . $model->username,
            ]); ?>
        <?php else : ?>
            <?= $model->getGravatar(null, 80, 'mm', 'g', true, [
                'class' => 'profile-user-img img-responsive img-circle',
                'style' => 'margin-bottom:10px; width:auto',
                'alt' => 'avatar_' . $model->username,
            ]); ?>
        <?php endif; ?>
    </div>
    <div class="col-sm-10">
        <?= DetailView::widget([
            'model' => $model,
            'attributes' => [
                'id',
                'username',
                'first_name',
                'last_name',
                'email:email',
                [
                    'attribute' => 'role',
                    'format' => 'raw',
                    'value' => $model->userRoleName,
                ],
                [
                    'attribute' => 'status',
                    'format' => 'raw',
                    'value' => Html::a($model->statusLabelName, Url::to(['status', 'id' => $model->id]), [
                        'id' => 'status_link_' . $model->id,
                        'title' => Module::t('module', 'Click to change the status'),
                        'data' => [
                            'toggle' => 'tooltip',
                        ],
                    ]),
                    'contentOptions' => [
                        'class' => 'link-decoration-none',
                    ],
                ],
                [
                    'attribute' => 'created_at',
                    'format' => 'raw',
                    'value' => Yii::$app->formatter->asDatetime($model->created_at, 'd LLL yyyy, H:mm:ss'),
                ],
                [
                    'attribute' => 'updated_at',
                    'format' => 'raw',
                    'value' => Yii::$app->formatter->asDatetime($model->updated_at, 'd LLL yyyy, H:mm:ss'),
                ],
                [
                    'attribute' => 'last_visit',
                    'format' => 'raw',
                    'value' => Yii::$app->formatter->asDatetime($model->last_visit, 'd LLL yyyy, H:mm:ss'),
                ],
                [
                    'attribute' => 'registration_type',
                    'format' => 'raw',
                    'value' => $model->registrationType,
                ],
            ],
        ]) ?>
    </div>

    <div class="col-sm-offset-2 col-sm-10">

        <?= Html::a('<span class="glyphicon glyphicon-pencil"></span> ' . Module::t('module', 'Update'), ['update', 'id' => $model->id], [
            'class' => 'btn btn-primary',
        ]) ?>

        <?= Html::a('<span class="glyphicon glyphicon-trash"></span> ' . Module::t('module', 'Delete'), ['delete', 'id' => $model->id], [
            'class' => 'btn btn-danger',
            'data' => [
                'confirm' => Module::t('module', 'Are you sure you want to delete the record?'),
                'method' => 'post',
            ],
        ]) ?>

    </div>

</div>