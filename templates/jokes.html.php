<?php if (isset($error)): ?>
    <p><?= htmlspecialchars($error, ENT_QUOTES, 'UTF-8') ?></p>
<?php else: ?>

    <p style="font-weight: bold; margin-bottom: 10px;">
        Total jokes in database: <?= $totalJokes ?>
    </p>

    <table border="1" cellpadding="8" cellspacing="0" style="border-collapse: collapse; width: 100%; text-align: center;">
        <thead style="background-color: #ecf0f1;">
            <tr>
                <th width="300">Joke Text</th>
                <th width="150">Date</th>
                <th width="150">Image</th>
                <th width="150">Category</th>
                <th width="200">Author</th>
                <th width="150">Actions</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($jokes as $joke): ?>
                <tr>
                    <td><?= htmlspecialchars($joke['joketext'], ENT_QUOTES, 'UTF-8') ?></td>

                    <td>
                        <?php
                        $display_date = '';
                        if (!empty($joke['jokedate'])) {
                            $display_date = date("D d M Y", strtotime($joke['jokedate']));
                        }
                        ?>
                        <?= htmlspecialchars($display_date, ENT_QUOTES, 'UTF-8') ?>
                    </td>

                    <td>
                        <?php if (!empty($joke['imagePath'])): ?>
                            <img src="<?= htmlspecialchars($joke['imagePath'], ENT_QUOTES, 'UTF-8') ?>"
                                 alt="joke image"
                                 height="100"
                                 style="border-radius: 8px; box-shadow: 0 2px 6px rgba(0,0,0,0.2);">
                        <?php else: ?>
                            <em>(No image)</em>
                        <?php endif; ?>
                    </td>

                    <td>
                        <?= htmlspecialchars($joke['category_name'], ENT_QUOTES, 'UTF-8') ?>
                    </td>

                    <td>
                        <a href="mailto:<?= htmlspecialchars($joke['email'], ENT_QUOTES, 'UTF-8') ?>">
                            <?= htmlspecialchars($joke['name'], ENT_QUOTES, 'UTF-8') ?>
                        </a>
                    </td>

                    <td>
                        <form action="deletejoke.php" method="post" style="display: inline;">
                            <input type="hidden" name="id" value="<?= htmlspecialchars($joke['joke_id'], ENT_QUOTES, 'UTF-8') ?>">
                            <input type="submit" value="Delete">
                        </form>
                        <a href="editjoke.php?id=<?= htmlspecialchars($joke['joke_id'], ENT_QUOTES, 'UTF-8') ?>" style="margin-left: 10px;">Edit</a>
                    </td>
                </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
<?php endif; ?>
