<?php $this->layout('layouts/mainLayout', ['title' => 'Sign in']) ?>

<?php if (isset($_SESSION['error'])) : ?>

    <div class="error-container">
        <p class="error"><?= $_SESSION['error']; ?></p>
    </div>
    <?php unset($_SESSION['error']); ?>
<?php endif ?>
<div class="reg-container">
    <form action="<?= '/auth/register' ?>" method="POST">
        <h3>Registration</h3>
        <div>
            <label for="name">Username</label>
            <input type="text" class="name" name="name">
        </div>
        <div>
            <label for="email">Email</label>
            <input type="email" class="email" name="email">
        </div>
        <div>
            <label for="password">Password</label>
            <input type="password" class="password" name="password">
        </div>
        <div>
            <label for="confirm">Confirm</label>
            <input type="password" class="confirm" name="confirm">
        </div>
        <div>
            <button type="button" class="reg-btn">Sign in</button>
        </div>
    </form>
</div>




<?php $this->start('includes') ?>

<script src="/js/auth/regForm.js">

</script>

<?php $this->stop() ?>