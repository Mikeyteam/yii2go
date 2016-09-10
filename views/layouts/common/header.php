<?php
use yii\helpers\Html;
use yii\bootstrap\Nav;
use yii\bootstrap\NavBar;

if(Yii::$app->controller->id == "site" && Yii::$app->controller->action->id == "index") {
    NavBar::begin(['brandLabel' => yii::$app->name]);
} else {
    NavBar::begin([
        'brandLabel' => yii::$app->name,
        'brandUrl' => Yii::$app->homeUrl,
        'options' => [
            'class' => 'navbar-inverse navbar-fixed-top',
        ],
    ]);
}

echo Nav::widget([
    'options' => ['class' => 'navbar-nav navbar-right'],
    'items' => [
        ['label' => Yii::t('app', 'NAV_HOME'), 'url' => ['/site/index']],
        ['label' => Yii::t('app', 'NAV_ABOUT'), 'url' => ['/site/about']],
        ['label' => Yii::t('app', 'NAV_CONTACT'), 'url' => ['/site/contact']],
        Yii::$app->user->identity->login == 'admin' ? (['label' => Yii::t('app', 'NAV_USERS'), 'url' => ['/site/users']]) : (''),
        Yii::$app->user->isGuest ? ('') : (['label' => Yii::t('app', 'NAV_ARTICLES'), 'url' => ['/post/index']]),
        Yii::$app->user->identity->login == '' ? (['label' => Yii::t('app', 'NAV_REG'), 'url' => ['/site/signup']]) : (''),
        Yii::$app->user->isGuest ? (
        ['label' => Yii::t('app', 'NAV_LOGIN'), 'url' => ['/site/login']]
        ) : (
            '<li>'
            . Html::beginForm(['/site/logout'], 'post', ['class' => 'navbar-form'])
            . Html::submitButton(
                Yii::t('app', 'NAV_LOGOUT') . ' (' . Yii::$app->user->identity->login . ')',
                ['class' => 'btn btn-link']
            )
            . Html::endForm()
            . '</li>'
        ),

    ],
]);
NavBar::end();
