

<div class=" col-md-6 comment-section">
        <h2>Написать отзыв</h2>
        <?php if(!empty($error)): ?>
    <div style="background-color: red"><?= $error?></div>
    <?php endif; ?>
        <form class="comment-form" action="/articles/add" method="POST">
            <!-- <label for="name">Ваше имя</label>
            <input type="text" id="name" name="name" placeholder="Enter your name"  value="<?= $_POST['name'] ?? '' ?>" size="50">
    
            <label for="comment">Ваш комментарий</label>
            <textarea id="comment" name="comment" placeholder="Write your comment here..." rows="3" required><?= $_POST['text'] ?? '' ?></textarea> -->
            <label for="name">Название статьи</label><br>
            <input type="text" name="name" id="name" value="<?= $_POST['name'] ?? '' ?>" size="50"><br>
            <br>
            <label for="text">Текст статьи</label><br>
            <textarea name="text" id="text" rows="10" cols="80"><?= $_POST['text'] ?? '' ?></textarea><br>
            <br>
            <input type="submit" valu e="Создать">
            <!-- <button type="submit">Создать</button> -->
        </form>
    
        
</div>
