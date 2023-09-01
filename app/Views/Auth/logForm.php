<?php $this->layout('layouts/mainLayout', ['title' => 'Log in']) ?>


<div class="reg-container">
    <form action="<?= '/auth/loginer' ?>" method="POST">
        <h3>Authorization</h3>

        <div>
            <label for="email">Email</label>
            <input type="email" class="email" name="email">
        </div>
        <div>
            <label for="password">Password</label>
            <input type="password" class="password" name="password">
        </div>

        <div>
            <button type="button" class="reg-btn">Log in</button>
        </div>
    </form>
</div>




<?php $this->start('includes') ?>

<script src="/js/auth/logForm.js">

</script>

<?php $this->stop() ?>