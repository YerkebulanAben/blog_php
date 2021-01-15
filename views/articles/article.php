<a href = "<?=ROOT?>">Main page</a>
<h1><?=$content[0]['title']?></h1>
<a href = "<?=ROOT?>bycategory/<?=$content[0]['id_cat']?>"><p>Category: <?=$content[0]['cat_title']?></p></a>
<hr>
<div>
    <?=$content[0]['content']?>
</div>
<hr>
<? if($GLOBALS['session'] && $author) : ?>
    <a href = "<?=ROOT?>article/remove/<?=$content[0]['id_article']?>">Remove article</a>
    <a href = "<?=ROOT?>article/edit/<?=$content[0]['id_article']?>">Edit article</a>
<? endif; ?>
<p>Date added:<?=$content[0]['dt_add']?></p>