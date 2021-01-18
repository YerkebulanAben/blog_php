<a href = "<?=ROOT?>">Main page</a>
<br>
<form method = "post">
    Title: <br>
    <input type = "text" name = "title" value ="<?=$title?>">
    <br>
    Content: <br>
    <textarea name = "content" cols = "60" rows = "10"><?=$content?></textarea>
    <br>
    Category: 
    <select name = "category">
        <?foreach($cats as $id => $cat): ?>
            <option value =<?=$cat['id_cat'] ?>
            <? if($category === $cat['id_cat']) : echo "selected"?>
            <? endif; ?>>
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