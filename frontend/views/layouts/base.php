<?php

use yii\bootstrap\Nav;
use yii\bootstrap\NavBar;

/* @var $this \yii\web\View */
/* @var $content string */

$this->beginContent('@frontend/views/layouts/_clear.php');

$ads = getAds(['index-carousel']);

$url= Yii::$app->request->resolve();
$basePath = isset($url[1]['slug']) ? str_replace('view', $url[1]['slug'], $url[0]) : $url[0];
?>
<div class="wrap">
    <?php /* ?>
    <?php NavBar::begin([
        'brandLabel' => '必胜课',//Yii::$app->name,
        'brandUrl' => Yii::$app->homeUrl,
        'options' => [
            'class' => 'navbar-inverse navbar-fixed-top',
        ],
    ]); ?>
    <?php echo Nav::widget([
        'options' => ['class' => 'navbar-nav navbar-right'],
        'items' => [
            ['label' => Yii::t('frontend', 'Home'), 'url' => ['/']],
            ['label' => Yii::t('frontend', 'Articles'), 'url' => ['/article/index']],
            //['label' => Yii::t('frontend', 'About'), 'url' => ['/page/view', 'slug'=>'about']],
            //['label' => Yii::t('frontend', 'Contact'), 'url' => ['/site/contact']],
            ['label' => Yii::t('frontend', 'Signup'), 'url' => ['/user/sign-in/signup'], 'visible'=>Yii::$app->user->isGuest],
            ['label' => Yii::t('frontend', 'Login'), 'url' => ['/user/sign-in/login'], 'visible'=>Yii::$app->user->isGuest],
            [
                'label' => Yii::$app->user->isGuest ? '' : Yii::$app->user->identity->getPublicIdentity(),
                'visible'=>!Yii::$app->user->isGuest,
                'items'=>[
                    [
                        'label' => Yii::t('frontend', 'Settings'),
                        'url' => ['/user/default/index']
                    ],
                    [
                        'label' => Yii::t('frontend', 'Backend'),
                        'url' => Yii::getAlias('@backendUrl'),
                        'visible'=>Yii::$app->user->can('manager')
                    ],
                    [
                        'label' => Yii::t('frontend', 'Logout'),
                        'url' => ['/user/sign-in/logout'],
                        'linkOptions' => ['data-method' => 'post']
                    ]
                ]
            ],
            [
                'label'=>Yii::t('frontend', 'Language'),
                'items'=>array_map(function ($code) {
                    return [
                        'label' => Yii::$app->params['availableLocales'][$code],
                        'url' => ['/site/set-locale', 'locale'=>$code],
                        'active' => Yii::$app->language === $code
                    ];
                }, array_keys(Yii::$app->params['availableLocales']))
            ]
        ]
        ]); ?>
    <?php NavBar::end(); ?>
    <?php */?>

    <div class="header-top">
        <div class="wide clearfix">
            <div class="pull-right">
                <!--<a href="#"><i class="icon icon-charge"></i> 充值</a>
                &emsp;
                -->
                <?php if (Yii::$app->user->isGuest):?>
                    <a href="/user/sign-in/login">登录</a> &nbsp;
                    | &nbsp;
                    <a href="/user/sign-in/signup">注册</a>
                <?php else:?>
                    欢迎 <a href="/user/default/index"><em><?=Yii::$app->user->identity->getPublicIdentity()?></em></a>
                    &emsp;
                    <a href="/user/sign-in/logout">退出</a>
                <?php endif?>
            </div>
            <div class="text-center">
                <span><i class="icon icon-phone"></i> 服务热线：400-0123-456 (9:00-22:30)</span>
                <a class="icon icon-qq" href="#"></a>
                <a class="icon icon-wx" href="#"></a>
                <a class="icon icon-wb" href="#"></a>
                <a class="icon icon-contact" href="#"></a>
            </div>
        </div>
    </div>
    <h1 class="header-logo wide">
        <img src="/img/logo-whole.png" alt=""/>
        &emsp;&emsp; &emsp;&emsp;
        <small>只要还有明天——今日永远是新起点！！！</small>
    </h1>
    <div class="header-nav">
        <ul class="wide clearfix">
            <li><a href="/" class="<?=$basePath === '' ? 'on' : ''?>">首页</a></li>
            <li><a href="/exam/category" class="<?=$basePath === 'exam/category' ? 'on' : ''?>">中考试卷</a></li>
            <li><a href="/question/category" class="<?=$basePath === 'question/category' ? 'on' : ''?>">精品题库</a></li>
            <li><a href="/page/videos" class="<?=$basePath === 'page/videos' ? 'on' : ''?>">视频课程</a></li>
            <li><a href="/page/study" class="<?=$basePath === 'page/study' ? 'on' : ''?>">学习交流</a></li>
            <li><a href="/page/teachers" class="<?=$basePath === 'page/teachers' ? 'on' : ''?>">一对一老师资源库</a></li>
            <li><a href="/page/about" class="<?=$basePath === 'page/about' ? 'on' : ''?>">关于我们</a></li>
        </ul>
    </div>
    <?php if (isset($ads['index-carousel'])): ?>
    <div class="header-carousel">
        <div class="carousel slide" data-ride="carousel" id="header-carousel">
          <!-- Indicators -->
          <ol class="carousel-indicators">
            <?php foreach($ads['index-carousel'] as $index=>$item): ?>
            <li data-slide-to="<?=$index?>" class="<?=$index === 0 ? 'active' : ''?>" data-target="#header-carousel"></li>
            <?php endforeach?>
          </ol>
          <!-- Wrapper for slides -->
          <div class="carousel-inner" role="listbox">
            <?php foreach($ads['index-carousel'] as $index=>$item): ?>
                <div class="item <?=$index === 0 ? 'active' : ''?>">
                  <a href="<?=$item->url?>" target="_blank"><img src="<?=$item->getImageUrl()?>" alt=""/></a>
                  <div class="carousel-caption">
                    <?=$item->text1?>
                  </div>
                </div>
            <?php endforeach?>
          </div>
        </div>
    </div>
    <?php endif?>
    <!--
    <div class="header-grade">
        <div class="wide row text-center">
            <div class="col-sm-4"><a href="#">七年级</a></div>
            <div class="col-sm-4"><a href="#">八年级</a></div>
            <div class="col-sm-4"><a href="#">九年级</a></div>
        </div>
    </div>
    -->

    <div class="search-form wide">
        <form class="clearfix" action="/search">
            <div class="pull-left">
                <img src="/img/logo-whole.png" alt=""/>
            </div>
            <div class="pull-right">
                <div class="input-group input-group-lg">
                    <div class="input-group-btn">
                        <?php $qType = Yii::$app->request->getQueryParam('type', 1)?>
                        <input data-role="button" type="hidden" name="type" value="<?=$qType?>"/>
                        <button class="btn btn-default dropdown-toggle" type="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            <span class="text"><?=$qType == 2 ? '试卷' : '试题'?></span>
                            <span class="caret"></span>
                        </button>
                        <ul class="dropdown-menu">
                            <li><a href="#" data-key="1">试题</a></li>
                            <li><a href="#" data-key="2">试卷</a></li>
                        </ul>
                    </div>
                    <input class="form-control" type="text" name="text" value="<?=Yii::$app->request->getQueryParam('text', '')?>">
                    <span class="input-group-btn"><button class="btn btn-default" type="submit">搜索</button></span>
                </div>
            </div>
        </form>
    </div>

    <?php echo $content ?>

</div>

<div class="footer">
    <div class="footer-seperator"></div>
    <div class="clearfix wide">
        <div class="pull-left">
            <p>
                <a href="" target="_blank">商务合作</a>
                <a href="" target="_blank">服务条款</a>
                <a href="" target="_blank">联系我们</a>
                <a href="" target="_blank">帮助中心</a>
                <a href="" target="_blank">站长统计</a>
                <a href="/site/contact" target="_blank">意见反馈</a>
            </p>
            <p>冀ICP备16003770号-1 &copy;2003-<?=date('Y')?></p>
        </div>
        <div class="pull-right"><p>河北省市场监管<br/>主体身份认证</p></div>
    </div>
</div>

<script>
var _hmt = _hmt || [];
(function() {
  var hm = document.createElement("script");
  //hm.src = "//hm.baidu.com/hm.js?d0d008cd3e5c866ccfc5dedd3133a34a";
  hm.src = "//hm.baidu.com/hm.js?339f9695460282049909eb49d26573fb";
  var s = document.getElementsByTagName("script")[0];
  s.parentNode.insertBefore(hm, s);
})();
</script>
<?php $this->endContent() ?>
