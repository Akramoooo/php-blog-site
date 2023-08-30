<?php $this->layout('layouts/mainLayout', ['title' => 'Sign in']) ?>


<div class="reg-container">
    <form action="" method="POST">
        <h3>Registration</h3>
        <div>
            <label for="name">Username</label>
            <input type="text" name="name">
        </div>
        <div>
            <label for="email">Email</label>
            <input type="email" name="email">
        </div>
        <div>
            <label for="password">Password</label>
            <input type="password" name="password">
        </div>
        <div>
            <label for="confirm">Confirm</label>
            <input type="password" name="confirm">
        </div>
        <div>
            <button type="submit" class="reg-btn">Sign in</button>
        </div>
    </form>
</div>




<?php $this->start('includes') ?>

<script>

</script>

<?php $this->stop() ?>