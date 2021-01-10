<form method = "post">
    Title: <br>
    <input type = "text" name = "title">
    <br>
    Content: <br>
    <textarea name = "content"> </textarea>
    <br>
    Category: 
    <select name = "category">
        <?foreach($cats as $id => $cat): ?>
            <option value =<?=$cat['id_cat'] ?>><?=$cat['title']?></option>
        <? endforeach; ?>
    </select>
    <br><br>
    <input type = "submit" name = "submit" value = "Submit">
</form>