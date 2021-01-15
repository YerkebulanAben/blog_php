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
            <option value =<?=$cat['id_cat'] ?>><?=$cat['title']?></option>
        <? endforeach; ?>
    </select>
    <br><br>
    <input type = "submit" name = "submit" value = "Submit">
</form>