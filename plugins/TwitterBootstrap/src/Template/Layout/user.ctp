<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
        <title>Perawat</title>

    <?php
    echo $this->Html->meta('icon', $this->Url->image('/nurse1.png'));

    echo $this->Html->script([
        'jquery-3.1.1.min',
        'moment-with-locales.min',
        'bootstrap.min',
        'sb-admin-2.min',
        'metisMenu.min',
        'validator.min'
    ]);
    echo $this->Html->css([
        'bootstrap.min',
        'metisMenu.min',
        'sb-admin-2.min',
        'morris',
        'font-awesome.min',
        'offcanvas'
    ]);
        ?>
        <?= $this->fetch('meta') ?>

        <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
        <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
        <!--[if lt IE 9]>
          <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
          <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
        <![endif]-->
    </head>
    <body>
        <nav class="navbar navbar-default navbar-fixed-top">
          <div class="container">
            <div class="navbar-header">
              <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
                <span class="sr-only">Toggle navigation</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
              </button>
<?php
    echo $this->Html->link('Profil Perawat', '/', ['class' => 'navbar-brand']);
?>
            </div>
            <div id="navbar" class="collapse navbar-collapse">
              <!--<ul class="nav navbar-nav">
                <li class="active"><a href="#">Beranda</a></li>
                <li><a href="#about">Tentang</a></li>
                <li><a href="#contact">Kontak</a></li>
              </ul>-->
            </div><!-- /.nav-collapse -->
          </div><!-- /.container -->
        </nav><!-- /.navbar -->

        <div class="container">
          <div class="row row-offcanvas row-offcanvas-right">
<?php
    echo $this->fetch('content');
?>
          </div><!--/row-->

          <hr>

          <footer>
            <p>&copy; 2016 PPNI Jawa Timur</p>
          </footer>

        </div><!--/.container-->
    <script type="text/javascript">
        $(document).ready(function () {
            $('[data-toggle="offcanvas"]').click(function () {
                $('.row-offcanvas').toggleClass('active')
            });
        });
    </script>
    </body>
</html>
