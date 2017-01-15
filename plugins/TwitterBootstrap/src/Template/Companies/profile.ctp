<script>
    moment.locale('id');
</script>

<div class="col-lg-12">
<?php
echo '<div class="alert alert-success" role="alert">';
echo '<i class="fa fa-ambulance fa-fw"></i>&nbsp;';
echo $this->Html->link(
    'Tambah Praktek',
    ['controller' => 'companies', 'action' => 'profileAdd'],
    ['escape' => false]
);
echo '</div>';

if (count($companies) > 0) {
    foreach ($companies as $company) {
        echo '<div class="alert alert-info" role="alert">';
        echo '<span class="badge"><i class="fa fa-ambulance fa-fw"></i></span>&nbsp;';
        echo $company['company']['category']['name'] . ' ' . $company['company']['name'];
        echo '&nbsp;(';
        echo '<script>';
        echo 'date = moment("' . $this->Time->format($company['started'], 'yyyy-MM-dd') . '").format("D MMMM YYYY");';
        echo 'document.write(date);';
        echo '</script>';
        echo '&nbsp;-&nbsp;';
        if (!empty($company['ended'])) {
            echo '<script>';
            echo 'date = moment("' . $this->Time->format($company['ended'], 'yyyy-MM-dd') . '").format("D MMMM YYYY");';
            echo 'document.write(date);';
            echo '</script>';
        } else {
            echo 'Sekarang';
        }
        echo ')';

        echo $this->Html->link(
            '<i class="fa fa-pencil fa-fw"></i>',
            ['controller' => 'companies', 'action' => 'profileEdit', $company['id']],
            ['escape' => false]
        );
        echo $this->Html->link(
            '<i class="fa fa-trash fa-fw"></i>',
            ['controller' => 'companiesUsers', 'action' => 'profileDelete', $company['id']],
            ['escape' => false, 'confirm' => 'Ingin Menghapus Praktek ' . $company['company']['category']['name'] . ' ' . $company['company']['name'] . '?']
        );
        echo '</div>';
    }
}
?>
</div><!--/.col-lg-12-->
