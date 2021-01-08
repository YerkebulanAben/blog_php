<div>
<? foreach($content as $id => $article): ?>
    <h2><?=$article['title']?></h2>
    <p><?=$article['dt_add']?></p>
    <hr>
<? endforeach; ?>
</div>
