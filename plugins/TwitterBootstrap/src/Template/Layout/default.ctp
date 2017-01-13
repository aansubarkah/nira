<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
    <title>
Perawat -
<?php
echo $title;
?>
    </title>

<?php
echo $this->Html->meta('icon', $this->Url->image('/nurse1.png'));

echo $this->Html->script([
    'jquery-3.1.1.min',
    'moment-with-locales.min',
    'bootstrap.min',
    'sb-admin-2.min',
    'metisMenu.min'
]);
echo $this->Html->css([
    'bootstrap.min',
    'metisMenu.min',
    'sb-admin-2.min',
    'morris',
    'font-awesome.min'
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
    <div id="wrapper">
<!-- Navigation -->
        <nav class="navbar navbar-default navbar-static-top" role="navigation" style="margin-bottom: 0">
            <div class="navbar-header">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
<?php
echo $this->Html->link(
    'Sistem Informasi Profil Perawat',
    ['controller' => 'users', 'action' => 'profile'],
    ['class' => 'navbar-brand']
);
?>
            </div>
            <!-- /.navbar-header -->

            <!-- /.navbar-top-links -->

            <div class="navbar-default sidebar" role="navigation">
                <div class="sidebar-nav navbar-collapse">
                    <ul class="nav" id="side-menu">
<?php
echo '<li>';
echo $this->Html->link(
    '<i class="fa fa-home fa-fw"></i> Profil',
    ['controller' => 'users',
    'action' => 'profile'],
    ['escape' => false]
);
echo '</li>';

echo '<li>';
echo $this->Html->link(
    '<i class="fa fa-envelope fa-fw"></i> Kontak',
    ['controller' => 'emails',
    'action' => 'profile'],
    ['escape' => false]
);
echo '</li>';

echo '<li>';
echo $this->Html->link(
    '<i class="fa fa-home fa-fw"></i> Profesi',
    ['controller' => 'emails',
    'action' => 'profile'],
    ['escape' => false]
);
echo '</li>';

echo '<li>';
echo $this->Html->link(
    '<i class="fa fa-home fa-fw"></i> Alamat',
    ['controller' => 'emails',
    'action' => 'profile'],
    ['escape' => false]
);
echo '</li>';

echo '<li>';
echo $this->Html->link(
    '<i class="fa fa-mortar-board fa-fw"></i> Pendidikan',
    ['controller' => 'letters',
    'action' => 'index'],
    ['escape' => false]
);
echo '</li>';

echo '<li>';
echo $this->Html->link(
    '<i class="fa fa-group fa-fw"></i> Pelatihan',
    ['controller' => 'dispositions',
    'action' => 'index'],
    ['escape' => false]
);
echo '</li>';

echo '<li>';
echo $this->Html->link(
    '<i class="fa fa-address-card-o fa-fw"></i> Sertifikasi',
    ['controller' => 'departements',
    'action' => 'index'],
    ['escape' => false]
);

echo '<li>';
echo $this->Html->link(
    '<i class="fa fa-ambulance fa-fw"></i> Praktek',
    ['controller' => 'users', 'action' => 'index'],
    ['escape' => false]
);
echo '</li>';

if (isset($user) && $user['role_id'] === 1) {
    echo '<li>';
    echo $this->Html->link(
        '<i class="fa fa-user-circle-o fa-fw"></i> Pengguna',
        ['controller' => 'users', 'action' => 'index'],
        ['escape' => false]
    );
    echo '</li>';

    echo '<li>';
    echo $this->Html->link(
        '<i class="fa fa-bank fa-fw"></i> DPD/Komisariat',
        ['controller' => 'entities', 'action' => 'index'],
        ['escape' => false]
    );
    echo '</li>';

}

echo '<li>';
echo $this->Html->link(
    '<i class="fa fa-refresh fa-fw"></i> Ubah Password',
    ['controller' => 'users', 'action' => 'changePassword'],
    ['escape' => false]
);
echo '</li>';

echo '<li>';
echo $this->Html->link(
    '<i class="fa fa-sign-out fa-fw"></i> Logout',
    ['controller' => 'users', 'action' => 'logout'],
    ['escape' => false]
);
echo '</li>';

?>
                    </ul>
                </div>
                <!-- /.sidebar-collapse -->
            </div>
            <!-- /.navbar-static-side -->
        </nav>

        <!-- Page Content -->
        <div id="page-wrapper">
            <div style="height: 5px;"></div>
            <!-- Breadcrumbs -->
            <div class="row">
                <div class="col-lg-12">
                    <ol class="breadcrumb">
                        <li>
<?php
echo $this->Html->link('Profil', [
    'controller' => 'users',
    'action' => 'profile'
]);
?>
</li>
<?php
if (isset($breadcrumbs))
{
    foreach($breadcrumbs as $key=>$value)
    {
        if (intval($key) == intval(count($breadcrumbs) - 1))
        {
            echo '<li class="active">';
            echo $value[1];
        } else {
            echo '<li>';
            echo $this->Html->link($value[1], $value[0]);
        }
        echo '</li>';
    }
}
?>
                        </ol>
                    </div>
                </div>
                <!-- /.breadcrumbs -->
                <!-- alert -->
                <div class="row">
<?php
if (isset($isError))
{
?>
<div class="col-lg-12">
    <div class="alert alert-danger alert-dismissible" role="alert">
        <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <?php echo $this->Flash->render(); ?>
    </div>
</div>
<?php
}
?>
                </div>
                <!-- /.alert -->
                <div class="row">
                    <div class="col-lg-12">
                        <h1 class="page-header">
<?php
echo $title;
if (isset($isShowAddButton))
{
    echo $this->Html->link(
        '<i class="fa fa-edit fa-fw"></i>',
        ['controller' => $this->name, 'action' => 'add'],
        ['escape' => false]
    );
}
if (isset($isShowEditButton))
{
    echo $this->Html->link(
        '<i class="fa fa-pencil fa-fw"></i>',
        ['controller' => $this->name, 'action' => 'edit', $controllerObjectId],
        ['escape' => false]
    );
    echo $this->Html->link(
        '<i class="fa fa-trash fa-fw"></i>',
        ['controller' => $this->name, 'action' => 'delete', $controllerObjectId],
        ['escape' => false, 'confirm' => 'Ingin Menghapus?']
    );

}
?>
                        </h1>
                    </div>
                    <!-- /.col-lg-12 -->
                </div>
                <!-- /.row -->
                <div class="row">
                    <div class="col-lg-12">
                        <?= $this->fetch('content') ?>
                    </div>
                    <!-- /.col-lg-12 -->
                </div>
                <!-- /.row -->
        </div>
        <!-- /#page-wrapper -->
    </div>
    <!-- /#wrapper -->
    </body>
</html>
