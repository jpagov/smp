<?php echo $header; ?>

<section class="content">
    <article>
        <h1>Maklumat Pangkalan Data</h1>

        <p>Seterusnya, butiran pangkalan data.</p>
    </article>

    <form method="post" action="<?php echo uri_to('database'); ?>" autocomplete="off">
        <?php echo $messages; ?>

        <fieldset>
            <p>
                <label for="host">Database Host</label>
                <input id="host" name="host" value="<?php echo Input::previous('host', '127.0.0.1'); ?>">

                <i>Most likely <b>localhost</b> or <b>127.0.0.1</b>.</i>
            </p>

            <p>
                <label for="port">Port</label>
                <input id="port" name="port" value="<?php echo Input::previous('port', '3306'); ?>">

                <i>Usually <b>3306</b>.</i>
            </p>

            <p>
                <label for="user">Username</label>
                <input id="user" name="user" value="<?php echo Input::previous('user', 'root'); ?>">

                <i>The database user, usually <b>root</b>.</i>
            </p>

            <p>
                <label for="pass">Password</label>
                <input id="pass" name="pass" value="<?php echo Input::previous('pass'); ?>">

                <i>Leave blank for empty password.</i>
            </p>

            <p>
                <label for="name">Database Name</label>
                <input id="name" name="name" value="<?php echo Input::previous('name', 'smp'); ?>">

                <i>Your database’s name.</i>
            </p>

            <p>
                <label for="prefix">Table Prefix</label>
                <input id="prefix" name="prefix" value="<?php echo Input::previous('prefix', 'smp_'); ?>">

                <i>Database table name prefix.</i>
            </p>

            <p>
                <label for="collation">Collation</label>
                <select id="collation" class="chosen-select" name="collation">
                    <?php foreach ($collations as $code => $collation) : ?>
                    <?php $selected = ($code == Input::previous('collation', 'utf8_general_ci')) ? ' selected' : ''; ?>
                    <option value="<?php echo $code; ?>" <?php echo $selected; ?>>
                        <?php echo $code; ?>
                    </option>
                    <?php endforeach; ?>
                </select>

                <i>Change if <b>utf8_general_ci</b> doesn’t work.</i>
            </p>
        </fieldset>

        <section class="options">
            <a href="<?php echo uri_to('start'); ?>" class="btn quiet">&laquo; Kembali</a>
            <button type="submit" class="btn">Langkah Seterusnya &raquo;</button>
        </section>
    </form>
</section>

<?php echo $footer; ?>
