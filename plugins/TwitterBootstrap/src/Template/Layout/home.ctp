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

            <div class="col-xs-12 col-sm-9">
              <p class="pull-right visible-xs">
                <button type="button" class="btn btn-primary btn-xs" data-toggle="offcanvas">Toggle nav</button>
              </p>
              <div class="jumbotron">
                <h2>Sistem Informasi Profil Perawat</h2>
              </div>
              <div class="row">
                <div class="col-xs-6 col-lg-4">
                  <h3>Tentang</h3>
                    <p>
                        Adalah Sistem Informasi Profil Perawat sebagai sarana penyimpanan riwayat pendidikan, sertifikasi dan pekerjaan Perawat
                    </p>
                </div><!--/.col-xs-6.col-lg-4-->
                <div class="col-xs-6 col-lg-4">
                  <h3>Kontak</h3>
                    <address>
                        <strong>Tri A.</strong><br>
                        Jalan Jemursari<br>
                        Surabaya 60237<br>
                        <abbr title="Telepon"><span class="glyphicon glyphicon-phone-alt" aria-hidden="true"></span></abbr> (031) 123-456-7890<br>
                        <abbr title="Fax"><span class="fa fa-fax" aria-hidden="true"></span></abbr> (031) 123-456-7890<br>
                        <abbr title="Seluler"><span class="glyphicon glyphicon-phone" aria-hidden="true"></span></abbr> 0821-3969-4129
                    </address>
                </div><!--/.col-xs-6.col-lg-4-->
            </div><!--/row-->
            </div><!--/.col-xs-12.col-sm-9-->

            <div class="col-xs-6 col-sm-3 sidebar-offcanvas" id="sidebar">
                <div class="row">
                    <div class="panel panel-default">
                        <div class="panel-heading">Masuk</div>
                        <div class="panel-body">
<?php
    echo $this->Form->create(
        null,
        ['url' => ['controller' => 'Users', 'action' => 'login']]
    );
?>
                                <div class="form-group">
                                    <div class="input-group">
                                        <div class="input-group-addon">
                                            <span class="glyphicon glyphicon-user"></span>
                                        </div>
<?php
    echo $this->Form->text('username', [
        'label' => false,
        'class' => 'form-control',
        'placeholder' => 'Username',
        'autocomplete' => 'off',
        'id' => 'sender',
        'required',
        'data-error' => 'Username harus diisi',
    ]);
?>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <div class="input-group">
                                        <div class="input-group-addon">
                                            <span class="glyphicon glyphicon-lock"></span>
                                            </div>
<?php
    echo $this->Form->password('password', [
        'label' => false,
        'class' => 'form-control',
        'placeholder' => 'Pasword',
        'autocomplete' => 'off',
        'id' => 'password',
        'required',
        'data-error' => 'Password harus diisi',
    ]);
?>
                                    </div>
                                </div>
                                <div class="form-group">
<?php
echo $this->Form->button('Masuk', [
    'type' => 'submit',
    'class' => 'btn btn-success pull-right',
]);
?>
                                </div>
<?php
    echo $this->Form->end();
?>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="panel panel-default">
                        <div class="panel-heading">Daftar</div>
                        <div class="panel-body">
<?php
    echo $this->Form->create(
        null,
        [
            'url' => ['controller' => 'Users', 'action' => 'register'],
            'id' => 'register'
        ]
    );
?>
                                <div class="form-group">
                                    <div class="input-group">
                                        <div class="input-group-addon">
                                            <span class="fa fa-user-circle-o"></span>
                                            </div>
<?php
    echo $this->Form->text('username', [
        'label' => false,
        'class' => 'form-control',
        'placeholder' => 'Username',
        'autocomplete' => 'off',
        'id' => 'sender',
        'required',
        'data-error' => 'Username hanya Huruf, Angka dan Garis Bawah',
        'pattern' => '^\w+$'
    ]);
?>
                                    </div>
                                    <div class="help-block with-errors"></div>
                                </div>
                                <div class="form-group">
                                    <div class="input-group">
                                        <div class="input-group-addon">
                                            <span class="fa fa-lock"></span>
                                            </div>
<?php
    echo $this->Form->password('password', [
        'label' => false,
        'class' => 'form-control',
        'placeholder' => 'Password',
        'autocomplete' => 'off',
        'id' => 'password',
        'required',
        'data-error' => 'Password harus diisi'
    ]);
?>
                                    </div>
                                    <div class="help-block with-errors"></div>
                                </div>
                                <div class="form-group">
                                    <div class="input-group">
                                        <div class="input-group-addon">
                                            <span class="fa fa-lock"></span>
                                            </div>
<?php
    echo $this->Form->password('password2', [
        'label' => false,
        'class' => 'form-control',
        'placeholder' => 'Confirm Password',
        'autocomplete' => 'off',
        'id' => 'password2',
        'required',
        'data-error' => 'Password harus sama',
        'data-match' => '#password'
    ]);
?>
                                    </div>
                                    <div class="help-block with-errors"></div>
                                </div>
                                <div class="form-group">
                                    <div class="input-group">
                                        <div class="input-group-addon">
                                            <span class="fa fa-envelope"></span>
                                            </div>
<?php
    echo $this->Form->email('email', [
        'label' => false,
        'class' => 'form-control',
        'placeholder' => 'Email',
        'autocomplete' => 'off',
        'id' => 'email',
        'required',
        'data-error' => 'Format email Tidak Sesuai'
    ]);
?>
                                    </div>
                                    <div class="help-block with-errors"></div>
                                </div>
                                <!-- form-group -->
                                <div class="form-group">
                                    <div class="input-group">
                                        <div class="input-group-addon">
                                            <span class="glyphicon glyphicon-education"></span>
                                        </div>
<?php
    echo $this->Form->text('fullname', [
        'label' => false,
        'class' => 'form-control',
        'placeholder' => 'Nama Lengkap Beserta Gelar',
        'autocomplete' => 'off',
        'id' => 'sender',
        'required',
        'data-error' => 'Nama Lengkap harus diisi'
    ]);
?>
                                    </div>
                                    <div class="help-block with-errors"></div>
                                </div>
                                <!-- /.form-group -->
                                <!-- form-group -->
                                <div class="form-group">
                                    <div class="input-group">
                                        <div class="input-group-addon">
                                            <span class="fa fa-address-card"></span>
                                        </div>
<?php
    echo $this->Form->text('nira', [
        'label' => false,
        'class' => 'form-control',
        'placeholder' => 'NIRA',
        'autocomplete' => 'off',
        'id' => 'sender',
        'required',
        'data-error' => 'Nira hanya Angka',
        'pattern' => "^\\d+$"
    ]);
?>
                                    </div>
                                    <div class="help-block with-errors"></div>
                                </div>
                                <!-- /.form-group -->
                                <div class="form-group">
<?php
echo $this->Form->button('Daftar', [
    'type' => 'submit',
    'class' => 'btn btn-success pull-right',
]);
?>
                                </div>
<?php
    echo $this->Form->end();
?>
                        </div>
                    </div>
                </div>

            </div><!--/.sidebar-offcanvas-->
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

            $('#register').validator();
        });
    </script>
    </body>
</html>
