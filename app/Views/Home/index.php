<?php $this->layout('layouts/mainLayout', ['title' => 'Главная']) ?>
<div class="main-home-container">
    <div>
        <p><?php var_dump($_SESSION)?></p>
    </div>
    <div class="home-info-container">
        <h1 style="margin-bottom: 10px;">О проекте</h1>
        <span>Проект разрабатывается не опытным разработчиком, который улучшает свои навыки
            разработки и пытается стать лучшим в своем деле. До этого сайта, у меня было пару проектов, 
            которые стыдно выкладывать на свой репозиторий, но я считаю, что лучше сделать плохо, чем ничего не сделать.
            Нужно пытаться практиковать свои навыки , ведь без практики ничего не получится.Как говорят 20% - теории, 80% - практики)
        </span>
    </div>
    <div class="shares">
        <div class="my-github">
            <img src="site_images/github.jpg" alt="github">
            <p><span>Akramoooo</span></p>
            <p><span>19лет</span></p>
            <p><span>Разрабатываю сайты и развиваюсь в своем направлении</span></p>
            <p><a href="https://github.com/Akramoooo?tab=repositories" target="_blank" style="color: blue;">Ссылка</a></p>
        </div>
        <div class="my-telegram">
            <img src="site_images/telegram.png" alt="github">
            <p>Имя:<span>Akramo_19</span></p>
            <p><span>Fullstack web developer</span></p>
            <p><span>Ссылка телеграм для связи с разработчиком</span></p>
            <p><a href="https://web.telegram.org/a/" target="_blank" style="color: blue;">Ссылка</a></p>
        </div>
    </div>
</div>



<?php $this->start('includes') ?>

<script src="js/home/shares.js">

</script>

<?php $this->stop() ?>