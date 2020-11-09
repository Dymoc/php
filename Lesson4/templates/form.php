<form enctype="multipart/form-data" action="<?= $post_file_path ?>" method="POST">
     <h3><?= $post_file_path ?></h3>
     <input type="hidden" name="MAX_FILE_SIZE" value="300000" />
     <input name="userfile" type="file" />
     <br>
     <br>
     <input type="submit" value="Отправить файл" />
</form>