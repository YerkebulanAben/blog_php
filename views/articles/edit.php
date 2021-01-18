<a href = "<?=ROOT?>">Main page</a><form method = "post">
<br>
<form>
    Title: <br>
    <input type = "text" name ="title" value = "<?=$article[0]['title']?>">
    <br>
    Content: <br>
    <textarea cols = "60" rows = "10" name = "content"><?=$article[0]['content']?></textarea>
    <br>
    Category: <br>
    <select name = "category">
        <?foreach($cats as $id => $cat): ?>
            <option value =<?=$cat['id_cat'] ?>
                <? if($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['submit'])) : ?>
                    <? if($category === $cat['id_cat']) : echo "selected"?>
                    <? endif; ?>>
                <? else : ?>
                    <? if($cat['id_cat'] === $article[0]['id_cat']) : echo "selected"?>
                    <? endif; ?>>
                <? endif; ?>
                <?=$cat['title']?>
            </option>
        <? endforeach; ?>
    </select>
    <br><br>
    <input type = "submit" name = "submit" value = "Submit">
</form>
<? if(!empty($errors)) : ?>
    <? foreach($errors as $error) : ?>
        <h3><?=$error?></h3>
    <? endforeach; ?>
<? endif; ?>