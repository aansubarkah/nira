<script>
    moment.locale('id');
</script>

<div class="col-lg-12">
<?php
echo '<div class="alert alert-success" role="alert">';
echo '<i class="fa fa-group fa-fw"></i>&nbsp;';
echo $this->Html->link(
    'Tambah Pelatihan',
    ['controller' => 'trainings', 'action' => 'profileAdd'],
    ['escape' => false]
);
echo '</div>';

if (count($trainings) > 0) {
    foreach ($trainings as $training) {
        echo '<div class="alert alert-info" role="alert">';
        echo '<span class="badge"><i class="fa fa-group fa-fw"></i></span>&nbsp;';
        echo $training['training']['name'] . '&nbsp;oleh&nbsp;' . $training['training']['issuer']['name'];
        echo '&nbsp;(';
        echo '<script>';
        echo 'date = moment("' . $this->Time->format($training['training']['held'], 'yyyy-MM-dd') . '").format("D MMMM YYYY");';
        echo 'document.write(date);';
        echo '</script>';
        echo ')';

        echo $this->Html->link(
            '<i class="fa fa-pencil fa-fw"></i>',
            ['controller' => 'trainings', 'action' => 'profileEdit', $training['id']],
            ['escape' => false]
        );
        echo $this->Html->link(
            '<i class="fa fa-trash fa-fw"></i>',
            ['controller' => 'trainingsUsers', 'action' => 'profileDelete', $training['id']],
            ['escape' => false, 'confirm' => 'Ingin Menghapus Pelatihan ' . $training['training']['name'] . ' oleh ' . $training['training']['issuer']['name'] . '?']
        );
        echo '</div>';
    }
}
?>
</div><!--/.col-lg-12-->
