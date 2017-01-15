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
                    <th>Induk</th>
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
                    <th>Kabupaten/Kota</th>
                    <th>Alamat</th>
                    <th>Telepon</th>
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
    if ($office->parent_id == null) {
        echo 'PPNI';
    } else {
        echo $this->Html->link(
            $office->parent_office->name,
            ['controller' => 'Offices', 'action' => 'view', $office->parent_office->id],
            ['escape' => false]
        );
    }
?>
                    </td>
                    <td>
<?php
    echo $this->Html->link(
        $office->category->name . '&nbsp;' . $office->name,
        ['controller' => 'Offices', 'action' => 'view', $office->id],
        ['escape' => false]
    );
?>
                    </td>
                    <td>
<?php
    echo $office->number;
?>
                    </td>
                    <td>
<?php
    echo $office->regency->kind ? 'Kabupaten' : 'Kota';
    echo '&nbsp;';
    echo $office->regency->name;
?>
                    </td>
                    <td>
<?php
    if (count($office->addresses) > 0) {
        echo $office->addresses[0]['street'];
    }
?>
                    </td>
                    <td>
<?php
    if (count($office->phones) > 0) {
        echo $office->phones[0]['name'];
    }
    echo $this->Html->link(
        '<i class="fa fa-pencil fa-fw"></i>',
        ['controller' => 'Offices', 'action' => 'edit', $office->id],
        ['escape' => false]
    );
    echo $this->Html->link(
        '<i class="fa fa-trash fa-fw"></i>',
        ['controller' => 'Offices', 'action' => 'delete', $office->id],
        ['escape' => false, 'confirm' => 'Ingin Menghapus ' . $office->category->name . ' ' . $office->name . '?']
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
