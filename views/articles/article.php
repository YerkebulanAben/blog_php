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
<hr>
<h2>Comments:</h2>
<table>
<? foreach($comments as $id => $comment) : ?>
    <tr>
        <td><?=$comment['username'] ?></td>
        <td><?=$comment['text'] ?></td>
        <td><?=$comment['dt_add']?></td>
    </tr>
<? endforeach; ?>
</table>
<? if($GLOBALS['session']) : ?>
    <h3>Add your comment</h3>
    <form method = 'post'>
        <textarea name = "text" rows = "5" cols = "50"><?=$user_comment?></textarea>
        <br><br>
        <input type = "submit" name = "submit" value = "Add comment">
    </form>
<? endif; ?>
<? if($error) :?>
    <p><?=$error?></p>
<? endif; ?>