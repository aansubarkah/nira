<div class="container">
    <div class="row row-offcanvas row-offcanvas-right">
        <div class="col-xs-12 col-sm-9">
            <p class="pull-right visible-xs">
                <button type="button" class="btn btn-primary btn-xs" data-toggle="offcanvas">Toggle nav</button>
            </p>
            <div class="row">
                <div class="col-xs-6 col-lg-4">
<?php
echo $this->Html->link(
    '<h3>Info Pribadi <small class="fa fa-pencil fa-fw"></small></h3>',
    ['controller' => 'users', 'action' => 'profileEdit'],
    ['escape' => false]
);
?>
                    <address>
                        <h5><small>Nama</small> <?php echo $profile['name']; ?></h5>
                        <h5><small>Nama Beserta Gelar</small> <?php echo $profile['fullname']; ?></h5>
                        <h5><small>NIK</small> <?php echo $profile['nik']; ?></h5>
                        <h5><small>Jenis Kelamin</small> <?php echo $profile['sex'] ? 'Pria' : 'Wanita'; ?></h5>
                        <h5><small>Status</small> <?php echo $profile['marital'] ? 'Menikah' : 'Lajang'; ?></h5>
                        <h5><small>Tanggal Lahir</small> <span id="birthday"></span></h5>
                        <h5><small>Tempat Lahir</small> <?php echo $profile['birthplace']; ?></h5>

                    </address>
                </div><!--/.col-xs-6.col-lg-4-->
                <div class="col-xs-6 col-lg-4">
<?php
echo $this->Html->link(
    '<h3>Kontak <small class="fa fa-search-plus fa-fw"></small></h3>',
    ['controller' => 'emails', 'action' => 'profile'],
    ['escape' => false]
);
?>
                    <address>
<?php
if (count($profile['emails']) > 0) {
    foreach ($profile['emails'] as $email) {
        echo '<h5><small>Email</small> ' . $email['name'] . '</h5>';
    }
}

if (count($profile['phones']) > 0) {
    foreach ($profile['phones'] as $phone) {
        echo '<h5><small>Telepon</small> ' . $phone['name'] . '</h5>';
    }
}

?>
                    </address>
                </div><!--/.col-xs-6.col-lg-4-->
                <div class="col-xs-6 col-lg-4">
<?php
echo $this->Html->link(
    '<h3>Info Perawat <small class="fa fa-search-plus fa-fw"></small></h3>',
    ['controller' => 'offices', 'action' => 'profile'],
    ['escape' => false]
);
?>
                    <address>
<?php
echo '<h5><small>NIRA</small> ' . $profile['nira'] . '</h5>';
if (count($profile['offices']) > 0) {
    foreach ($profile['offices'] as $office) {
        echo '<h5><small>Alamat</small> ' . $office['name'] . '</h5>';
    }
}
?>
                    </address>
                </div><!--/.col-xs-6.col-lg-4-->
            </div><!--/row-->
            <div class="row">
            <div class="col-xs-6 col-lg-4">
<?php
echo $this->Html->link(
    '<h3>Alamat <small class="fa fa-search-plus fa-fw"></small></h3>',
    ['controller' => 'addresses', 'action' => 'profile'],
    ['escape' => false]
);
?>
                    <address>
<?php
if (count($profile['addresses']) > 0) {
    foreach ($profile['addresses'] as $address) {
        echo '<h5><small>Alamat</small> ' . $address['street'] . '</h5>';
    }
}
?>
                    </address>
                </div><!--/.col-xs-6.col-lg-4-->
                <div class="col-xs-6 col-lg-4">
<?php
echo $this->Html->link(
    '<h3>Pendidikan <small class="fa fa-search-plus fa-fw"></small></h3>',
    ['controller' => 'educations', 'action' => 'profile'],
    ['escape' => false]
);
?>
                    <address>
<?php
if (count($profile['educations']) > 0) {
    foreach ($profile['educations'] as $education) {
        echo '<h5><small>' . $education['level_id'] . '</small> ' . $education['name'] . '</h5>';
    }
}
?>
                    </address>
                </div><!--/.col-xs-6.col-lg-4-->
                <div class="col-xs-6 col-lg-4">
<?php
echo $this->Html->link(
    '<h3>Pelatihan <small class="fa fa-search-plus fa-fw"></small></h3>',
    ['controller' => 'trainings', 'action' => 'profile'],
    ['escape' => false]
);
?>
                    <address>
<?php
if (count($profile['trainings']) > 0) {
    foreach ($profile['trainings'] as $training) {
        echo '<h5><small>Pelatihan</small> ' . $training['name'] . '</h5>';
    }
}
?>
                    </address>
                </div><!--/.col-xs-6.col-lg-4-->
            </div><!--/.row-->
            <div class="row">
            <div class="col-xs-6 col-lg-4">
<?php
echo $this->Html->link(
    '<h3>Sertifikasi <small class="fa fa-search-plus fa-fw"></small></h3>',
    ['controller' => 'certificates', 'action' => 'profile'],
    ['escape' => false]
);
?>
                    <address>
<?php
if (count($profile['certificates']) > 0) {
    foreach ($profile['certificates'] as $certificate) {
        echo '<h5><small>Sertifikasi</small> ' . $certificate['name'] . '</h5>';
    }
}
?>
                    </address>
                </div><!--/.col-xs-6.col-lg-4-->
                <div class="col-xs-6 col-lg-4">
<?php
echo $this->Html->link(
    '<h3>Praktek <small class="fa fa-search-plus fa-fw"></small></h3>',
    ['controller' => 'companies', 'action' => 'profile'],
    ['escape' => false]
);
?>
                    <address>
<?php
if (count($profile['companies']) > 0) {
    foreach ($profile['companies'] as $company) {
        echo '<h5><small>Praktek</small> ' . $company['name'] . '</h5>';
    }
}
?>
                    </address>
                </div><!--/.col-xs-6.col-lg-4-->
            </div><!--/.row-->
        </div><!--/.col-xs-12.col-sm-9-->
    </div><!--/.row row-offcanvas row-offcanvas-right-->
</div><!--/.container-->
<script type='text/javascript'>
    $(function(){
        moment.locale('id');
        birthday = moment('<?php echo $this->Time->format($profile['birthday'], 'yyyy-MM-dd HH:mm'); ?>').format('D MMMM YYYY');
        $('#birthday').text(birthday);
    });

</script>
