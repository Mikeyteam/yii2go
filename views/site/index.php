<?php

/* @var $this yii\web\View */

$this->title = Yii::$app->name;
?>
<div class="site-index">
<div class="jumbotron">
        <h1>Congratulations!</h1>
        <p class="lead">Жалий бложик</p>
    </div>

    <div class="body-content">

        <div class="row">
            <?foreach ($posts as $post) { ?>
                <div class="col-lg-4">
                    <h2><?= $post->author_id ? $post->author_id : 'Нет автора' ;?></h2>
                    <p><?= $post->text;?></p>
                    <p><a class="btn btn-default" href="post/<?=$post->id ?>">Посмотреть</a></p>
                </div>
            <?}?>


        </div>

    </div>
</div>
