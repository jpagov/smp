<!doctype html>
<html lang="en-gb">
    <head>
        <meta charset="utf-8">
        <title>Pemasangan Sistem Direktori Pegawai</title>
        <meta name="robots" content="noindex, nofollow">

        <link rel="stylesheet" href="<?php echo asset('views/assets/css/install.css'); ?>">
        <link rel="stylesheet" href="<?php echo asset('views/assets/css/chosen.css'); ?>">
    </head>
    <body>

        <nav>
            <img width="24" height="22" src="<?php echo asset('views/assets/img/jata-92x74.png'); ?>">

            <ul>
                <li class="start database metadata account complete">Bahasa dan timezone</li>
                <li class="database metadata account complete">Database setup</li>
                <li class="metadata account complete">Metadata</li>
                <li class="account complete">Akaun</li>
                <li class="complete">Siap!</li>
            </ul>
        </nav>

        <script>
            (function(w, d, u) {
                var parts = "<?php echo Uri::current(); ?>".split('/'), url = parts.pop(), li = d.getElementsByClassName(url);
                if(url == 'complete') d.body.parentNode.className += 'small';
                for(var i = 0; i < li.length; i++) li[i].className += ' elapsed';
            }(window, document));
        </script>
