<form action="" method="post">
  <input type="hidden" name="jokeid" value="<?= htmlspecialchars($joke['id'], ENT_QUOTES, 'UTF-8') ?>">

  <label for="joketext">Edit your joke here:</label><br>
  <textarea name="joketext" rows="4" cols="60"><?= htmlspecialchars($joke['joketext'], ENT_QUOTES, 'UTF-8') ?></textarea><br><br>

  <input type="submit" name="submit" value="Save">
</form>
