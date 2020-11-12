<form enctype="multipart/form-data" action="<?= $post_file_path ?>" method="POST">
     <input type="hidden" name="MAX_FILE_SIZE" value="20000" />
     <input name="userfile" type="file" />
     <br>
     <br>
     <input type="submit" value="Отправить файл" />
</form>