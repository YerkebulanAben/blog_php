<form method = "post">
    Username: <br>
    <input type = "text" name = "username" value = <?=$un?>>
    <br>
    Password: <br>
    <input type = "password" name = "password">
    <br><br>
    <input type = "submit" name = "submit">
</form>
<? if(isset($error)): ?>
 <div><?=$error?></div
<? endif; ?>