<div class="col-lg-12">
<?php
echo '<div class="alert alert-success" role="alert">';
echo '<i class="fa fa-envelope fa-fw"></i>&nbsp;';
echo $this->Html->link(
    'Tambah Email',
    ['controller' => 'Emails', 'action' => 'profileAdd'],
    ['escape' => false]
);
echo '</div>';

if (count($emails) > 0) {
    foreach ($emails as $email) {
        echo '<div class="alert alert-info" role="alert">';
        echo '<span class="badge"><i class="fa fa-envelope fa-fw"></i></span>&nbsp;';
        echo $email['email']['name'];
        echo $this->Html->link(
            '<i class="fa fa-pencil fa-fw"></i>',
            ['controller' => 'Emails', 'action' => 'profileEdit', $email['email']['id']],
            ['escape' => false]
        );
        echo $this->Html->link(
            '<i class="fa fa-trash fa-fw"></i>',
            ['controller' => 'EmailsUsers', 'action' => 'profileDelete', $email['id']],
            ['escape' => false, 'confirm' => 'Ingin Menghapus Email ' . $email['email']['name'] . '?']
        );
        echo '</div>';
    }
}

echo '<div class="alert alert-success" role="alert">';
echo '<i class="fa fa-phone-square fa-fw"></i>&nbsp;';
echo $this->Html->link(
    'Tambah Telepon',
    ['controller' => 'Phones', 'action' => 'profileAdd'],
    ['escape' => false]
);
echo '</div>';

if (count($phones) > 0) {
    foreach ($phones as $phone) {
        echo '<div class="alert alert-info" role="alert">';
        echo '<span class="badge"><i class="fa fa-phone-square fa-fw"></i></span>&nbsp;';
        echo $phone['phone']['name'];
        echo $this->Html->link(
            '<i class="fa fa-pencil fa-fw"></i>',
            ['controller' => 'Phones', 'action' => 'profileEdit', $phone['phone']['id']],
            ['escape' => false]
        );
        echo $this->Html->link(
            '<i class="fa fa-trash fa-fw"></i>',
            ['controller' => 'PhonesUsers', 'action' => 'profileDelete', $phone['id']],
            ['escape' => false, 'confirm' => 'Ingin Menghapus Telepon ' . $phone['phone']['name'] . '?']
        );
        echo '</div>';
    }
}

?>
</div><!--/.col-lg-12-->
