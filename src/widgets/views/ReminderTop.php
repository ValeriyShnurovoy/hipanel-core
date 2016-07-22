<?php
use yii\helpers\Html;
/* @var integer $count */
/* @var array $reminders */
/* @var \hipanel\models\Reminder $reminder */
$this->registerCss(<<<CSS
 
.navbar-nav>.reminders>.dropdown-menu>li .menu>li>a {
    margin: 0;
    padding: 10px 10px
}

.navbar-nav>.reminders>.dropdown-menu>li .menu>li>a>div>img {
    margin: auto 10px auto auto;
    width: 40px;
    height: 40px
}

.navbar-nav>.reminders>.dropdown-menu>li .menu>li>a>h4 {
    padding: 0;
    color: #444444;
    font-size: 15px;
    position: relative
}

.navbar-nav>.reminders>.dropdown-menu>li .menu>li>a>h4>small {
    color: #999999;
    font-size: 10px;
    position: absolute;
    top: 0;
    right: 0
}

.navbar-nav>.reminders>.dropdown-menu>li .menu>li>a>p {
    font-size: 12px;
    color: #888888
}

.navbar-nav>.reminders>.dropdown-menu>li .menu>li>a:before,
.navbar-nav>.reminders>.dropdown-menu>li .menu>li>a:after {
    content: " ";
    display: table
}

.navbar-nav>.messages-menu>.dropdown-menu>li .menu>li>a:after {
    clear: both
}
CSS

);
?>
<!-- Notifications Menu -->
<li class="dropdown notifications-menu reminders">
    <!-- Menu toggle button -->
    <a href="#" class="dropdown-toggle" data-toggle="dropdown">
        <i class="fa fa-bell-o"></i>
        <?php if ($count > 0) : ?>
            <span class="label label-warning"><?= $count ?></span>
        <?php endif ?>
    </a>
    <ul class="dropdown-menu">
        <li class="header"><?= Yii::t('hipanel', 'You have {0} notifications', [$count]) ?></li>
        <li>
            <ul class="menu">
                <?php foreach ($reminders as $reminder) : ?>
                    <li>
                        <a href="#">
                            <h4>
                                <?= Yii::t('hipanel/reminder', "{0} ID #{1}", ['Ticket', $reminder->object_id]) ?>
                                <small><?= Yii::t('hipanel/reminder', 'Next time') ?>: <?= $reminder->next_time ?></small>
                            </h4>
                            <p>
                                <?= \hipanel\helpers\StringHelper::truncateWords($reminder->message, 3) ?>
                            </p>
                            <small>
                                <?= Yii::t('hipanel/reminder', 'Remine in') ?>:
                                <button class="btn btn-xs btn-default">15m</button>
                                <button class="btn btn-xs btn-default">30m</button>
                                <button class="btn btn-xs btn-default">1h</button>
                                <button class="btn btn-xs btn-default">12h</button>
                                <button class="btn btn-xs btn-default">1d</button>
                            </small>
                        </a>
                    </li>
                <?php endforeach; ?>
            </ul>
        </li>
        <li class="footer"><?= Html::a(Yii::t('hipanel', 'View all'), ['/reminder/index']) ?></li>

    </ul>
</li>
