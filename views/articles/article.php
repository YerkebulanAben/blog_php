<h1><?=$content['title']?></h1>
<a href = "<?=ROOT?>bycategory/<?=$content['id_cat']?>"><p>Category: <?=$content['cat_title']?></p></a>
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