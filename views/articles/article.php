<h1><?=$content['title']?></h1>
<p>Category: <?=$content['cat_title']?></p>
<hr>
<div>
    <?=$content['content']?>
</div>
<hr>
<? if($GLOBALS['session'] && $author) : ?>
    <a href = "<?=ROOT?>article/remove/<?=$content['id_article']?>">Remove article</a>
    <a href = "<?=ROOT?>article/edit/<?=$content['id_article']?>">Edit article</a>
<? endif; ?>
<p>Date added:<?=$content['dt_add']?></p>