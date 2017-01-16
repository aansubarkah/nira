<script>
    moment.locale('id');
</script>

<div class="col-lg-12">
<?php
echo '<div class="alert alert-success" role="alert">';
echo '<i class="fa fa-address-card-o fa-fw"></i>&nbsp;';
echo $this->Html->link(
    'Tambah Sertifikasi',
    ['controller' => 'certificates', 'action' => 'profileAdd'],
    ['escape' => false]
);
echo '</div>';

if (count($certificates) > 0) {
    foreach ($certificates as $certificate) {
        echo '<div class="alert alert-info" role="alert">';
        echo '<span class="badge"><i class="fa fa-address-card-o fa-fw"></i></span>&nbsp;';
        echo $certificate['certificate']['name'] . '&nbsp;dari&nbsp;' . $certificate['certificate']['issuer']['name'];
        echo '&nbsp;(';
        echo '<script>';
        echo 'date = moment("' . $this->Time->format($certificate['held'], 'yyyy-MM-dd') . '").format("D MMMM YYYY");';
        echo 'document.write(date);';
        echo '</script>';
        echo ')';

        echo $this->Html->link(
            '<i class="fa fa-pencil fa-fw"></i>',
            ['controller' => 'certificates', 'action' => 'profileEdit', $certificate['id']],
            ['escape' => false]
        );
        echo $this->Html->link(
            '<i class="fa fa-trash fa-fw"></i>',
            ['controller' => 'certificatesUsers', 'action' => 'profileDelete', $certificate['id']],
            ['escape' => false, 'confirm' => 'Ingin Menghapus Sertifikasi ' . $certificate['certificate']['name'] . ' dari ' . $certificate['certificate']['issuer']['name'] . '?']
        );
        echo '</div>';
    }
}
?>
</div><!--/.col-lg-12-->
