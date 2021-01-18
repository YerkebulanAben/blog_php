<div>
<a href = "<?=ROOT?>">Main page</a>
<? if($GLOBALS['session']): ?>
    <a href = "<?=ROOT?>article/add/">Add article</a>
    <a href = "<?=ROOT?>user/logout/">Logout</a>
<? else: ?>
    <a href = "<?=ROOT?>user/login/">Login</a>
<? endif; ?>
<? if(@$_SESSION['articleAdded']) : ?>
    <br>
    <p1>Article added</p1>
    <? unset($_SESSION['articleAdded']) ?>
<? elseif(@$_SESSION['articleRemoved']) : ?>
    <br>
    <p1>Article removed</p1>
    <? unset($_SESSION['articleRemoved']) ?>
<? endif; ?>
<? foreach($content as $id => $article): ?>
    <a href = "<?=ROOT?>article/<?=$article['id_article'];?>/">
        <h2><?=$article['title']?></h2>
    </a>
    <p><?=$article['dt_add']?></p>
    <hr>
<? endforeach; ?>
</div>
