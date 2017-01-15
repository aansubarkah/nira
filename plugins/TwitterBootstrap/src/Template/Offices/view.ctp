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
    '<h3>Info <small class="fa fa-pencil fa-fw"></small></h3>',
    ['controller' => 'offices', 'action' => 'edit', $office['id']],
    ['escape' => false]
);
?>
                    <address>
                        <h5><small>Nama</small> <?php echo $office['name']; ?></h5>
                        <h5><small>Kode</small> <?php echo $office['number']; ?></h5>
                        <h5><small>Induk</small> <?php echo $office['parent_id'] == null ? 'PPNI' : $office['parent_office']['name']; ?></h5>
                    </address>
                </div><!--/.col-xs-6.col-lg-4-->
                <div class="col-xs-6 col-lg-4">
<?php
echo '<h3>Kontak</h3>';
/*echo $this->Html->link(
    '<h3>Kontak <small class="fa fa-search-plus fa-fw"></small></h3>',
    ['controller' => 'emails', 'action' => 'profile'],
    ['escape' => false]
);*/
?>
                    <address>
<?php
if (count($office['emails']) > 0) {
    foreach ($office['emails'] as $email) {
        echo '<h5><small>Email</small> ' . $email['name'] . '</h5>';
    }
}

if (count($office['phones']) > 0) {
    foreach ($office['phones'] as $phone) {
        echo '<h5><small>Telepon</small> ' . $phone['name'] . '</h5>';
    }
}

?>
                    </address>
                </div><!--/.col-xs-6.col-lg-4-->
                <div class="col-xs-6 col-lg-4">
<?php
echo '<h3>Alamat</h3>';
/*echo $this->Html->link(
    '<h3>Alamat <small class="fa fa-search-plus fa-fw"></small></h3>',
    ['controller' => 'offices', 'action' => 'profile'],
    ['escape' => false]
);*/
?>
                    <address>
<?php
$office['regency']['kind'] ? $city = 'Kabupaten' : $city = 'Kota';
echo '<h5><small>Lokasi</small> ' . $city . ' ' . $office['regency']['name'] . '</h5>';
if (count($office['addresses']) > 0) {
    foreach ($office['addresses'] as $address) {
        echo '<h5><small>Alamat</small> ' . $address['street'] . '</h5>';
    }
}
?>
                    </address>
                </div><!--/.col-xs-6.col-lg-4-->
            </div><!--/row-->
<?php
if (count($office['child_offices']) > 0) {
?>
            <div class="row">
                <div class="panel panel-default">
                    <div class="panel-heading">
                        <h3 class="panel-title">Membawahi</h3>
                    </div>
                    <div class="panel-body">
                        <div class="row">
                        <table width="100%" class="table table-striped" id="dataTables-letters">
                            <thead>
                                <tr>
                                    <th>#</th>
                                    <th>
<?php
echo $this->Paginator->sort('Offices.name', 'Nama');
?>
                                    </th>
                                    <th>
<?php
echo $this->Paginator->sort('Offices.number', 'Kode');
?>
                                    </th>
                                    <th>Alamat</th>
                                    <th>Telepon</th>
                                </tr>
                            </thead>
                            <tbody>
<?php
// get current page
$numberPage = $this->Paginator->counter('{{page}}');
$sequence = ($numberPage - 1) * $limit;
foreach($children as $child)
{
?>
                                <tr>
                                    <td>
<?php
    $sequence++;
    echo $sequence;
?>
                                    </td>
                                    <td>
<?php
    echo $this->Html->link(
        $child->name,
        ['controller' => 'Offices', 'action' => 'view', $child->id],
        ['escape' => false]
    );
?>
                                    </td>
                                    <td>
<?php
    echo $child->number;
?>
                                    </td>
                                    <td>
<?php
    if (count($child->addresses) > 0) {
        echo $child->addresses[0]['street'];
    }
?>
                    </td>
                    <td>
<?php
    if (count($child->phones) > 0) {
        echo $child->phones[0]['name'];
    }
    echo $this->Html->link(
        '<i class="fa fa-pencil fa-fw"></i>',
        ['controller' => 'Offices', 'action' => 'edit', $child->id],
        ['escape' => false]
    );
    echo $this->Html->link(
        '<i class="fa fa-trash fa-fw"></i>',
        ['controller' => 'Offices', 'action' => 'delete', $child->id],
        ['escape' => false, 'confirm' => 'Ingin Menghapus ' . $child->category->name . ' ' . $child->name . '?']
    );
?>
                    </td>
                                </tr>
<?php
}
?>
                            </tbody>
                        </table>
                    </div>
                    <div class="row pull-right">
                        <div class="col-md-10 col-md-offset-2">
                        <ul class="pagination">
<?php
echo $this->Paginator->first('&laquo;',['escape' => false]);
echo $this->Paginator->prev('&lsaquo;',['escape' => false]);
echo $this->Paginator->numbers();
echo $this->Paginator->next('&rsaquo;',['escape' => false]);
echo $this->Paginator->last('&raquo;',['escape' => false]);
?>
                        </ul>
                        </div>
                </div>
                <!-- /.row -->
                </div>
                <!-- /.panel-body-->
            </div>
            <!-- /.panel-default-->
            </div><!--/.row-->
<?php
}
?>
        </div><!--/.col-xs-12.col-sm-9-->
    </div><!--/.row row-offcanvas row-offcanvas-right-->
</div><!--/.container-->
