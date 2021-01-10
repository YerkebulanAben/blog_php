<h1><?=$content['title']?></h1>
<p>Category: <?=$content['cat_title']?></p>
<hr>
<div>
    <?=$content['content']?>
</div>
<hr>
<a href = "<?=ROOT?>article/remove/<?=$content['id_article']?>">Remove article</a>
<p>Date added:<?=$content['dt_add']?></p>