<!doctype html>
<html lang="de">
<head>
    <meta charset="utf-8" />
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <meta name="description" content="Wenn es darum geht, Unternehmen und Produkte klar positioniert und mit Nachhaltigkeit zu bewerben, sind Sie bei Agentur 22 genau richtig" />
    <meta name="keywords" content="Agentur22, Bilder, Wir, sind, Freunde, von, Farben, Strategie, Schema, Konzept, Agentur Website, Agentur, wirsindfreundevon, Freunde" />
    <meta name="author" content="Christian Bachleitner">
    <meta name="publisher" content="Agentur22">
    <meta name="robots" content="index,follow">
    <meta property="og:locale" content="de_DE">
    <meta property="og:type" content="website">
    <meta property="og:title" content="#wirsindfreundevon by Agentur22 - Full Service Werbeagentur in München">
    <meta property="og:description" content="Wenn es darum geht, Unternehmen und Produkte klar positioniert und mit Nachhaltigkeit zu bewerben, sind Sie bei Agentur 22 genau richtig">
    <meta property="og:url" content="https://wirsindfreundevon.de/">
    <meta property="og:site_name" content="wirsindfreundevon.de">
    <link rel="canonical" href="https://wirsindfreundevon.de/">

    <title>#wirsindfreundevon by Agentur22 - Full Service Werbeagentur in München</title>

    <script async src="https://www.googletagmanager.com/gtag/js?id=UA-48411034-28"></script>
    <script>
        window.dataLayer = window.dataLayer || [];
        function gtag(){dataLayer.push(arguments);}
        gtag('js', new Date());
        gtag('config', 'UA-48411034-28', { 'anonymize_ip': true });
    </script>

    <link rel="shortcut icon" href="<?php echo base_url(); ?>img/favicon.ico" type="image/x-icon">
    <link rel="apple-touch-icon" sizes="57x57" href="<?php echo base_url(); ?>img/apple-icon-57x57.png">
    <link rel="apple-touch-icon" sizes="60x60" href="<?php echo base_url(); ?>img/apple-icon-60x60.png">
    <link rel="apple-touch-icon" sizes="72x72" href="<?php echo base_url(); ?>img/apple-icon-72x72.png">
    <link rel="apple-touch-icon" sizes="76x76" href="<?php echo base_url(); ?>img/apple-icon-76x76.png">
    <link rel="apple-touch-icon" sizes="114x114" href="<?php echo base_url(); ?>img/apple-icon-114x114.png">
    <link rel="apple-touch-icon" sizes="120x120" href="<?php echo base_url(); ?>img/apple-icon-120x120.png">
    <link rel="apple-touch-icon" sizes="144x144" href="<?php echo base_url(); ?>img/apple-icon-144x144.png">
    <link rel="apple-touch-icon" sizes="152x152" href="<?php echo base_url(); ?>img/apple-icon-152x152.png">
    <link rel="apple-touch-icon" sizes="180x180" href="<?php echo base_url(); ?>img/apple-icon-180x180.png">
    <link rel="icon" type="image/png" sizes="192x192"  href="<?php echo base_url(); ?>img/android-icon-192x192.png">
    <link rel="icon" type="image/png" sizes="32x32" href="<?php echo base_url(); ?>img/favicon-32x32.png">
    <link rel="icon" type="image/png" sizes="96x96" href="<?php echo base_url(); ?>img/favicon-96x96.png">
    <link rel="icon" type="image/png" sizes="16x16" href="<?php echo base_url(); ?>img/favicon-16x16.png">
    <link rel="manifest" href="<?php echo base_url(); ?>img/manifest.json">
    <meta name="msapplication-TileColor" content="#ffffff">
    <meta name="msapplication-TileImage" content="<?php echo base_url(); ?>img/ms-icon-144x144.png">
    <meta name="theme-color" content="#ffffff">
    <script src='<?php base_url(); ?>js/vendor/jquery.min.js'></script>
</head>
<body>
    <header>

        <?php
            if ($this->uri->segment(1) !== "login") {
                $this->load->view('partials/navigation');
            }
        ?>

        <div class="headline">
            <div class="row">
                <div class="large-12 columns">
                    <h1>#wirsind<span>freundevon</span></h1>
                </div>
                <div class="large-1 columns">
                    <a class='show-for-large big-blob' href='https://www.agentur22.de/' target='_blank'>
                        <img class='blob' src='<?php echo base_url(); ?>img/sprechblase_rot.png' width='80px' alt='Sprechblase: A friend for your brand!'>
                    </a>
                </div>
                <?php
                /* Admin - Area */
                if ($this->ion_auth->logged_in()) {
                    echo "<div class='admin'><div class='large-12 columns'>
                        <h2><button class='icon-Plus-Icon-23' data-open='upload'></button></h2>
                        <h2><button class='icon-Minus-Icon-24' data-open='delete'></button></h2>
                        <h2><a href=".base_url()."logout>Logout</a></h2>
                    </div></div>";
                }
                ?>
            </div>
        </div>
    </header>
