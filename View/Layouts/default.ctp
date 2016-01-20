<!DOCTYPE html>
<html>
<head>
    <?php echo $this->Html->charset(); ?>
    <title>Libraryβ版</title>
    <?php

    echo $this->Html->meta('icon');

    echo $this->Html->css('normalize');
    echo $this->Html->css('bootstrap.min');
    echo $this->Html->css('validationEngine.jquery.css');
    echo $this->Html->css('common');

    echo $this->Html->script('http://code.jquery.com/jquery-1.11.1.min.js');
    echo $this->Html->script('bootstrap.min');
    echo $this->Html->script('jquery.validationEngine.js');
    echo $this->Html->script('jquery.validationEngine-ja.js');
    echo $this->Html->script('common');

    echo $this->fetch('meta');
    echo $this->fetch('css');
    echo $this->fetch('script');
    ?>

</head>
<body>
<div id="wrap">
    <div class="navbar navbar-default navbar-fixed-top" role="navigation">
        <div class="container">
            <div class="navbar-collapse collapse">
                <form class="navbar-form navbar-left" action="/library/book_lists/search">
                    <div class="input-group">
                        <input type="search" class="form-control" placeholder="タイトルで検索" name="key_word" value="<?php if(!empty($key_word)){echo $key_word;} ?>">
                        <span class="input-group-btn">
                            <button type="submit" class="btn btn-default">
                                <span class="glyphicon glyphicon-search"></span>
                            </button>
                        </span>
                    </div>
                </form>
                <ul class="nav navbar-nav">
                    <!--
                    <?php if($user['role'] == 0): ?>
                    <li><a href="/library/admins">管理者ページ</a></li>
                    <?php endif;?>

                    <li><a href="#">ランキング</a></li>
                    <li><a href="#">本ソムリエ</a></li>
                    -->
                </ul>
                <ul class="nav navbar-nav navbar-right">
                    <li class="dropdown">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                            <?= $user['name'] ?>
                            <span class="caret"></span>
                        </a>
                        <ul class="dropdown-menu">
                            <li><a href="/library/Users/logout">ログアウト</a></li>
                        </ul>
                    </li>
                </ul>
            </div><!-- /.navbar-collapse -->
        </div><!-- /.container -->
    </div><!-- /.navbar -->

    <div class="container">
        <?php echo $this->fetch('content'); ?>
    </div>
</div>

<div id="footer">
    <div class="container">
        <div class="row">
            <p>サイトについてのお問い合わせはこちらまで &nbsp;&nbsp;&nbsp; k-takaishi@bit-isle.co.jp</p>
        </div>
    </div>
</div>


<!--
<button id="back-to-top" class="btn btn-success" style="position:fixed;right:5px;bottom:5px;display:none;opacity:0.8;">
    <i class="icon-arrow-up"></i>このページのトップへ
</button>
-->
<div id="back-to-top">
    <img src="/library/img/page_top.jpg" width="60px">
</div>

<?php //echo $this->element('sql_dump'); ?>
</body>
</html>
