<?php echo $header; ?>

<section class="content">
    <article>
        <h1>Pemasangan Sistem Direktori Pegawai</h1>

        <p>Halaman ini adalah permulaan kepada pemasangan sistem. Sila isikan butiran dibawah:</p>
    </article>

    <form method="post" action="<?php echo uri_to('start'); ?>" autocomplete="off">
        <?php echo $messages; ?>

        <fieldset>
            <p>
                <label for="lang">
                    <strong>Bahasa</strong>
                    <span class="info">SMP</span>
                </label>
                <select id="lang" class="chosen-select" name="language">
                    <?php foreach ($languages as $lang) : ?>
                    <?php $selected = in_array($lang, $prefered_languages) ? ' selected' : ''; ?>
                    <option<?php echo $selected; ?>><?php echo $lang; ?></option>
                    <?php endforeach; ?>
                </select>
            </p>

            <p>
                <label for="timezone">
                    <strong>Timezone</strong>
                    <span class="info">zon masa anda sekarang.</span>
                </label>
                <select id="timezone" class="chosen-select" name="timezone">
                    <?php $set = false; ?>
                    <?php foreach ($timezones as $zone) : ?>
                    <?php $selected = ($set === false and $current_timezone == $zone['offset']) ? ' selected' : ''; ?>
                    <option value="<?php echo $zone['timezone_id']; ?>"<?php echo $selected; ?>>
                        <?php echo $zone['label']; ?>
                    </option>
                    <?php if ($selected) {
                        $set = true;
                    } ?>
                    <?php endforeach; ?>
                </select>
            </p>
        </fieldset>

        <section class="options">
            <button type="submit" class="btn">Langkah Seterusnya &raquo;</button>
        </section>
    </form>
</section>

<?php echo $footer; ?>
