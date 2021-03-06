<?php
/**
 * Created by PhpStorm.
 * User: Alexey Shevchenko <ivanovosity@gmail.com>
 * Date: 18.10.16
 * Time: 10:43
 */
use yii\helpers\Html;

$this->title = $name;
?>
<div class="site-error">
    <div class="error-page">
        <h2 class="headline text-yellow"> <?= nl2br(Html::encode($exception->statusCode)); ?></h2>

        <div class="error-content">
            <h3>
                <i class="fa fa-warning text-yellow"></i> <?= Yii::t('app', 'Oops!') ?> <?= nl2br(Html::encode($exception->getMessage())); ?>
            </h3>

            <p>
                <?= Yii::t('app', 'Meanwhile, you may {:Link} or try using the search form.', [':Link' => Html::a(Yii::t('app', 'return to dashboard'), Yii::$app->homeUrl)]); ?>
            </p>

            <form class="search-form">
                <div class="input-group">
                    <input type="text" name="search" class="form-control" placeholder="<?= Yii::t('app', 'Search'); ?>">

                    <div class="input-group-btn">
                        <button type="submit" name="submit" class="btn btn-warning btn-flat"><i
                                class="fa fa-search"></i>
                        </button>
                    </div>
                </div>
            </form>

        </div>
    </div>

</div>