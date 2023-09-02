<?php $this->layout('layouts/mainLayout', ['title' => 'Комментарии']) ?>



<div class="blog-card" data-post-id="<?= $post['id'] ?>">

    <img src="<?= '/' . $post['image'] ?>" alt="изображение">
    <div class="card-info">

        <p class="card-title"><?= $post['title'] ?></p>
        <p class="card-desc"><?= $post['description'] ?></p>
        <div class="cacki">
            <p class="card-category"><?= $categories[$post['category_id']]['title']; ?></p>
        </div>
    </div>
</div>
<div class="comment-main-container">
    <div class="comments-container">
        <div class="comment-chat">
            <p class="comment-message">комментарий</p>
        </div>
        <div class="send-comment"><input type="text" name="comment" placeholder="send message..."></div>
    </div>
    <button>Отправить</button>
</div>




<?php $this->start('includes') ?>
<script src="/js/blog/show.js">
</script>
<?php $this->stop() ?>