<?php
use yii\helpers\Html;

/* @var $this \yii\web\View */
/* @var $content string */
?>

<header class="main-header">

    <?= Html::a('<span class="logo-mini">PLN SPKB</span><span class="logo-lg">SIM PLN SPKB</span>', Yii::$app->homeUrl, ['class' => 'logo']) ?>

    <nav class="navbar navbar-static-top" role="navigation">

        <a href="#" class="sidebar-toggle" data-toggle="push-menu" role="button">
            <span class="sr-only">Toggle navigation</span>
        </a>

        <div class="navbar-custom-menu">

            <ul class="nav navbar-nav">
                <li class="dropdown user user-menu">
                    <?php if(Yii::$app->user->isGuest){
                    ?>
                        <a href="./?r=site/login">Login</a>
                    <?php } else{?>
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                        <img src="<?= $directoryAsset ?>/img/user.jpg" class="user-image" alt="User Image"/>
                        <span class="hidden-xs"><?= ucfirst(Yii::$app->user->identity->nama) ?></span>
                    </a>
                    <ul class="dropdown-menu">
                        <!-- User image -->
                        <li class="user-header">
                            <img src="<?= $directoryAsset ?>/img/user.jpg" class="img-circle"
                                 alt="User Image"/>

                            <p>
                                <?= ucfirst(Yii::$app->user->identity->nama) ?><br><?= Yii::$app->user->identity->user_level ?>
                            </p>
                        </li>
                
                        <!-- Menu Footer-->
                        <li class="user-footer">
                            <div class="pull-right">
                                <?= Html::a(
                                    'Sign out',
                                    ['/site/logout'],
                                    ['data-method' => 'post', 'class' => 'btn btn-default btn-flat']
                                ) ?>
                            </div>
                        </li>
                    </ul>
                    <?php } ?>
                </li>
            </ul>
        </div>
    </nav>
</header>
