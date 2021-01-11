<div>
<a href = "<?=ROOT?>article/add/">Add article</a>
<a href = "<?=ROOT?>user/login/">Login</a>
<a href = "<?=ROOT?>user/logout/">Logout</a>
<? foreach($content as $id => $article): ?>
    <a href = "article/<?=$article['id_article'];?>/">
        <h2><?=$article['title']?></h2>
    </a>
    <p><?=$article['dt_add']?></p>
    <hr>
<? endforeach; ?>
</div>
