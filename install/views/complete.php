<?php echo $header; ?>

<section class="content small">
	<h1>Install complete!</h1>

	<?php if($htaccess): ?>
	<p class="code">Kami tidak dapat menyediakan fail <code>htaccess</code> untuk anda, salinkan
	kandungan dibawah ke dalam <code>.htaccess</code> dan letakkan ke dalam root folder SMP.
	<textarea id="htaccess"><?php echo $htaccess; ?></textarea></p>

	<script>document.getElementById('htaccess').select();</script>
	<?php endif; ?>

	<section class="options">
		<a href="<?php echo $admin_uri; ?>" class="button">Lawati admin panel</a>
		<a href="<?php echo $site_uri; ?>" class="right">Lawati Sistem Direktori</a>
	</section>
</section>

<?php echo $footer; ?>
