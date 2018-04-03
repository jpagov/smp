<?php echo $header; ?>

<section class="content">
    <article>
        <h1>Site metadata</h1>

        <p>Isikan butiran berkenaan sistem. Butiran ini boleh dikemaskini dikemudian hari.</p>
    </article>

    <form method="post" action="<?php echo Uri::to('metadata'); ?>" autocomplete="off">
        <?php echo $messages; ?>

        <fieldset>
            <p>
                <label for="site_name">Site Name</label>
                <i>What’s your app called?.</i>

                <input id="site_name" name="site_name" value="<?php echo Input::previous('site_name', 'Sistem Direktori Pegawai'); ?>">
            </p>

            <p>
                <label for="site_description">Site Description</label>
                <i>A little bit about you or your app.</i>

                <textarea id="site_description" name="site_description"><?php echo Input::previous('site_description', 'Sistem Direktori Pegawai JPA'); ?></textarea>
            </p>

            <p>
                <label for="site_path">Site Path</label>
                <i>SMP’s folder. Change if this is wrong.</i>
                <input id="site_path" name="site_path" value="<?php echo Input::previous('site_path', $site_path); ?>">
            </p>

            <?php if (count($themes) > 1) : ?>
            <p>
                <label for="theme">Theme</label>
                <i>Your SMP theme.</i>
                <select id="theme" name="theme">
                    <?php foreach ($themes as $dir => $theme) : ?>
                    <option value="<?php echo $dir; ?>"><?php echo $theme['name']; ?> by <?php echo $theme['author']; ?></option>
                    <?php endforeach; ?>
                </select>
            </p>
            <?php else : $theme = key($themes); ?>
            <input name="theme" type="hidden" value="<?php echo $theme; ?>">
            <?php endif; ?>

            <p>
                <label for="rewrite">Clean Urls</label>
                <i>Url rewiting</i>

            <?php if(mod_rewrite()): ?>

                <div class="more">Looks like you are running apache with <code>mod_rewrite</code> enabled.<br>
                The installer will create the htaccess for you.</div>

            <?php elseif(is_apache()): ?>

                <div class="more">Looks like you are running apache, but <code>mod_rewrite</code> is not enabled.</div>

                <div class="more"><input id="rewrite" name="rewrite" type="checkbox" value="1">
                Create the htaccess file for me anyway.</div>

            <?php elseif(is_cgi()): ?>

                <div class="more">Anda menggunakan <code>PHP</code> sebagai fastcgi process.<br>
                Anda hendaklah mengkonfigurasi url rewriting.</div>

            <?php endif; ?>
            </p>
        </fieldset>

        <section class="options">
            <a href="<?php echo uri_to('database'); ?>" class="btn quiet">&laquo; Kembali</a>
            <button type="submit" class="btn">Langkah Seterusnya &raquo;</button>
        </section>
    </form>
</section>

<?php echo $footer; ?>
