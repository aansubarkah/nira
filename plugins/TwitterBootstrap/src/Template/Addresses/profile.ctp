<div class="col-lg-12">
<?php
echo '<div class="alert alert-success" role="alert">';
echo '<i class="fa fa-home fa-fw"></i>&nbsp;';
echo $this->Html->link(
    'Tambah Alamat',
    ['controller' => 'addresses', 'action' => 'profileAdd'],
    ['escape' => false]
);
echo '</div>';

if (count($addresses) > 0) {
    foreach ($addresses as $address) {
        echo '<div class="alert alert-info" role="alert">';
        echo '<span class="badge"><i class="fa fa-home fa-fw"></i></span>&nbsp;';
        echo $address['address']['street'] . ',&nbsp;' . $address['address']['district'];
        echo ',&nbsp;'. $address['address']['regency']['name'];
        echo $this->Html->link(
            '<i class="fa fa-pencil fa-fw"></i>',
            ['controller' => 'addresses', 'action' => 'profileEdit', $address['id']],
            ['escape' => false]
        );
        echo $this->Html->link(
            '<i class="fa fa-trash fa-fw"></i>',
            ['controller' => 'AddressesUsers', 'action' => 'profileDelete', $address['id']],
            ['escape' => false, 'confirm' => 'Ingin Menghapus Alamat ' . $address['address']['street'] . '?']
        );
        echo '</div>';
    }
}
?>
</div><!--/.col-lg-12-->
