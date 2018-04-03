<?php echo $header; ?>

<section class="content">

    <article>
        <h1>Akaun Pentadbir</h1>

        <p>Terbaik! pemasangan hampir siap! Sila isikan akaun pentadbir yang akan log masuk ke dalam sistem.</p>
    </article>

    <form method="post" action="<?php echo uri_to('account'); ?>" autocomplete="off">
        <?php echo $messages; ?>

        <fieldset>
            <p>
                <label for="username">Username</label>
                <i>You use this to log in.</i>
                <input tabindex="1" id="username" name="username" value="<?php echo Input::previous('username', 'admin'); ?>">
            </p>

            <p>
                <label for="email">Email address</label>
                <i>Needed if you can’t log in.</i>

                <input tabindex="2" id="email" type="email" name="email" value="<?php echo Input::previous('email'); ?>">
            </p>

            <p>
                <label>Password</label>
                <i>Make sure to <a href="http://bash.org/?244321" target="_blank">pick a secure password</a>.</i>
                <input tabindex="3" name="password" type="password" value="<?php echo Input::previous('password'); ?>">
            </p>
        </fieldset>

        <section class="options">
            <a href="<?php echo uri_to('metadata'); ?>" class="btn quiet">&laquo; Kembali</a>
            <button type="submit" class="btn">Langkah Terakhir</button>
        </section>
    </form>
</section>

<?php echo $footer; ?>
