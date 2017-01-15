<script>
    moment.locale('id');
</script>

<div class="col-lg-12">
<?php
echo '<div class="alert alert-success" role="alert">';
echo '<i class="fa fa-address-card fa-fw"></i>&nbsp;';
echo 'Nomor Induk Registrasi Anggota (NIRA): ' . $profile['nira'];
echo $this->Html->link(
    '<i class="fa fa-pencil fa-fw"></i>',
    ['controller' => 'Offices', 'action' => 'niraEdit'],
    ['escape' => false]
);
echo '</div>';

echo '<div class="alert alert-success" role="alert">';
echo '<i class="fa fa-bank fa-fw"></i>&nbsp;';
echo $this->Html->link(
    'Pindah DPD/Komisariat',
    ['controller' => 'Offices', 'action' => 'profileAdd'],
    ['escape' => false]
);
echo '</div>';

if (count($offices) > 0) {
    foreach ($offices as $office) {
        echo '<div class="alert alert-info" role="alert">';
        echo '<span class="badge"><i class="fa fa-bank fa-fw"></i></span>&nbsp;';
        echo $office['office']['category']['name'] . ' ' . $office['office']['name'];
        echo '&nbsp;(';
        echo '<script>';
        echo 'date = moment("' . $this->Time->format($office['started'], 'yyyy-MM-dd') . '").format("D MMMM YYYY");';
        echo 'document.write(date);';
        echo '</script>';
        echo '&nbsp;-&nbsp;';
        if (!empty($office['ended'])) {
            echo '<script>';
            echo 'date = moment("' . $this->Time->format($office['ended'], 'yyyy-MM-dd') . '").format("D MMMM YYYY");';
            echo 'document.write(date);';
            echo '</script>';
        } else {
            echo 'Sekarang';
        }
        echo ')';

        echo $this->Html->link(
            '<i class="fa fa-pencil fa-fw"></i>',
            ['controller' => 'Offices', 'action' => 'profileEdit', $office['id']],
            ['escape' => false]
        );
        echo $this->Html->link(
            '<i class="fa fa-trash fa-fw"></i>',
            ['controller' => 'OfficesUsers', 'action' => 'profileDelete', $office['id']],
            ['escape' => false, 'confirm' => 'Ingin Menghapus DPD/DPK ' . $office['office']['name'] . '?']
        );
        echo '</div>';
    }
}
?>
</div><!--/.col-lg-12-->
