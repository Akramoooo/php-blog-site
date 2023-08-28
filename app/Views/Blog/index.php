<?php $this->layout('layouts/mainLayout', ['title' => 'Блоги']) ?>


<div class="main-blog-container">
    <!-- Ваш HTML-код для отображения блога -->
</div>

<div class="blog-main-container">
    <h1 class="blog-icon">Blogs</h1>

    <?php for($i=0;$i<count($posts);$i++) : ?>
        <div class="blog-card">
            <img src="<?=$posts[$i]['image']?>" alt="изображение">
            <div class="card-info">
                <p class="card-title"><?=$posts[$i]['title']?></p>
                <a href="#">
                    <p class="card-desc"><?=$posts[$i]['description']?></p>
                </a>
                <div class="cacki">
                    <p class="card-category"><?=$categories[$posts[$i]['category_id']]['title']; ?></p>
                </div>

            </div>
        </div>
    <?php endfor ?>
</div>







<?php $this->start('includes') ?>
<script src="/js/blog/blog.js">
</script>

<?php $this->stop() ?>