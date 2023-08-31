<?php $this->layout('layouts/mainLayout', ['title' => 'Log in']) ?>

<?php if (isset($_SESSION['error'])) : ?>

    <div class="error-container">
        <p class="error"><?= $_SESSION['error']; ?></p>
    </div>
    <?php unset($_SESSION['error']); ?>
<?php endif ?>

<div class="reg-container">
    <form action="<?= '/auth/loginer' ?>" method="POST">
        <h3>Authorization</h3>

        <div>
            <label for="email">Email</label>
            <input type="email" name="email">
        </div>
        <div>
            <label for="password">Password</label>
            <input type="password" name="password">
        </div>

        <div>
            <button type="submit" class="reg-btn">Log in</button>
        </div>
    </form>
</div>




<?php $this->start('includes') ?>

<script src="/js/auth/logForm.js">

</script>

<?php $this->stop() ?>