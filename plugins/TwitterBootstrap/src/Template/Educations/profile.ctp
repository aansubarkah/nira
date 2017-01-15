<script>
    moment.locale('id');
</script>

<div class="col-lg-12">
<?php
echo '<div class="alert alert-success" role="alert">';
echo '<i class="fa fa-mortar-board fa-fw"></i>&nbsp;';
echo $this->Html->link(
    'Tambah Pendidikan',
    ['controller' => 'educations', 'action' => 'profileAdd'],
    ['escape' => false]
);
echo '</div>';

if (count($educations) > 0) {
    foreach ($educations as $education) {
        echo '<div class="alert alert-info" role="alert">';
        echo '<span class="badge"><i class="fa fa-mortar-board fa-fw"></i></span>&nbsp;';
        echo $education['education']['level']['name'] . ' ' . $education['education']['college']['name'];
        echo ',&nbsp;Ijasah No:&nbsp;';
        echo $education['number'];
        echo '&nbsp;(';
        echo '<script>';
        echo 'date = moment("' . $this->Time->format($education['held'], 'yyyy-MM-dd') . '").format("D MMMM YYYY");';
        echo 'document.write(date);';
        echo '</script>';
        echo ')';

        echo $this->Html->link(
            '<i class="fa fa-pencil fa-fw"></i>',
            ['controller' => 'educations', 'action' => 'profileEdit', $education['id']],
            ['escape' => false]
        );
        echo $this->Html->link(
            '<i class="fa fa-trash fa-fw"></i>',
            ['controller' => 'educationsUsers', 'action' => 'profileDelete', $education['id']],
            ['escape' => false, 'confirm' => 'Ingin Menghapus Pendidikan ' . $education['education']['level']['name'] . ' ' . $education['education']['college']['name'] . '?']
        );
        echo '</div>';
    }
}
?>
</div><!--/.col-lg-12-->
