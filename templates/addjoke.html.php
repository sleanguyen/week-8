<form action="" method="post" enctype="multipart/form-data" 
      style="display: flex; align-items: center; gap: 10px; flex-wrap: wrap;">

    <label for="joketext">Type your joke here:</label>
    <textarea id="joketext" name="joketext" rows="4" cols="40"></textarea>

    <label for="image">Select an image (optional):</label>
    <input type="file" name="image" id="image">

    <select name="author">
        <option value="">Select an author</option>
        <?php foreach ($authors as $author): ?>
            <option value="<?= $author['id'] ?>"><?= $author['name'] ?></option>
        <?php endforeach; ?>
    </select>

    <select name="category">
        <option value="">Select a category</option>
        <?php foreach ($categories as $category): ?>
            <option value="<?= $category['id'] ?>"><?= $category['category_name'] ?></option>
        <?php endforeach; ?>
    </select>

    <input type="submit" value="Add">
</form>
