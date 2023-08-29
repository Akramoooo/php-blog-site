<?php $this->layout('layouts/mainLayout', ['title' => 'Блоги']) ?>


<div class="main-blog-container">
    <!-- Ваш HTML-код для отображения блога -->
</div>

<div class="blog-main-container">
    <h1 class="blog-icon">Blogs</h1>
    <div class="add-blog-container">
        <button>Добавить</button>
        <form id="myForm" method="POST" enctype="multipart/form-data">
            <div class="leave-btn">
                <h3>Add Blog</h3>
                <p>выход</p>
            </div>
            <div>
                <input type="text" id="title"  name="title" placeholder="title">
            </div>
            <div>
                <textarea name="description" id="" cols="22" rows="5" placeholder="description"></textarea>
            </div>
            <div>
                <input type="file" id="file" name="image" placeholder="image">
            </div>
            <div>
                <select id="category" name="category_id">
                    <?php foreach ($categories as $category) : ?>
                        <option  value="<?= $category['id'] ?>"><?= $category['title'] ?></option>
                    <?php endforeach ?>
                </select><br>
            </div>
            <button type="button">Submit</button>
        </form>

    </div>
    <?php for ($i = 0; $i < count($posts); $i++) : ?>
        <div class="blog-card">
            <img src="<?= '/' . $posts[$i]['image'] ?>" alt="изображение">
            <div class="card-info">
                <p class="card-title"><?= $posts[$i]['title'] ?></p>
                <a href="#">
                    <p class="card-desc"><?= $posts[$i]['description'] ?></p>
                </a>
                <div class="cacki">
                    <p class="card-category"><?= $categories[$posts[$i]['category_id']]['title']; ?></p>
                </div>

            </div>
        </div>
    <?php endfor ?>
</div>







<?php $this->start('includes') ?>
<script src="/js/blog/blog.js">
</script>

<?php $this->stop() ?>