<div class="panel panel-default">
    <div class="panel-heading">
<?php
echo $this->Form->create(null, [
    'url' => ['controller' => 'Offices', 'action' => 'index'],
    'type' => 'get'
]);
?>
        <div class="input-group custom-search-form">
<?php
echo $this->Form->text('search', [
    'class' => 'form-control',
    'placeholder' => 'Pencarian Nama',
    'autocomplete' => false,
    'value' => $querySearchOld
]);
?>
            <span class="input-group-btn">
                <button class="btn btn-default" type="submit">
                    <i class="fa fa-search"></i>
                </button>
            </span>
        </div>
        <!-- /.custom-search-form -->
<?php
echo $this->Form->end();
?>
    </div>
    <!-- /.panel-heading -->
    <div class="panel-body">
        <div class="row">
        <table width="100%" class="table table-striped" id="dataTables-letters">
            <thead>
                <tr>
                    <th>#</th>
                    <th>Pengampu</th>
                    <th>
<?php
echo $this->Paginator->sort('name', 'Nama');
?>
                    </th>
                    <th>
<?php
echo $this->Paginator->sort('number', 'Kode');
?>
                    </th>
                    <th>Kabupaten/Kota</th>
                </tr>
            </thead>
            <tbody>
<?php
// get current page
$numberPage = $this->Paginator->counter('{{page}}');
$sequence = ($numberPage - 1) * $limit;
foreach($offices as $office)
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
    echo $office['username'];
?>
                    </td>
                    <td>
<?php
    echo $this->Html->link(
        $office->fullname,
        ['controller' => 'Offices', 'action' => 'view', $office->id],
        ['escape' => false]
    );

?>
                    </td>
                    <td>
<?php
    echo $this->Html->link(
        $office->nira,
        ['controller' => 'Offices', 'action' => 'view', $office->id],
        ['escape' => false]
    );
?>
                    </td>
                    <td>
<?php
    echo $office->has('emails') ? $this->Html->link($office['emails'][0]['name'], ['controller' => 'Emails', 'action' => 'view', $office['emails'][0]['id']]) : '';
?>
                    </td>
                    <td>
<?php
    if ($office->verified) {
        echo 'Sudah';
    } else {
        echo 'Belum';
        echo $this->Html->link(
            '<i class="fa fa-check-circle-o fa-fw"></i>',
            ['controller' => 'Offices', 'action' => 'verify', $office->id],
            ['escape' => false, 'confirm' => 'Verifikasi Pengguna ' . $office->fullname . '?']
        );
    }
?>
                    </td>
                    <td>
<?php
    echo $office->has('role') ? $this->Html->link($office['role']['name'], ['controller' => 'Roles', 'action' => 'view', $office['role']['id']]) : '';
    echo $this->Html->link(
        '<i class="fa fa-pencil fa-fw"></i>',
        ['controller' => 'Offices', 'action' => 'edit', $office->id],
        ['escape' => false]
    );
    echo $this->Html->link(
        '<i class="fa fa-trash fa-fw"></i>',
        ['controller' => 'Offices', 'action' => 'delete', $office->id],
        ['escape' => false, 'confirm' => 'Ingin Menghapus Pengguna ' . $office->fullname . '?']
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
    <!-- /.panel-body -->
</div>
<!-- /.panel-default>
