<div class="panel panel-default">
    <div class="panel-heading">
<?php
echo $this->Form->create(null, [
    'url' => ['controller' => 'Users', 'action' => 'index'],
    'type' => 'get'
]);
?>
        <div class="input-group custom-search-form">
<?php
echo $this->Form->text('search', [
    'class' => 'form-control',
    'placeholder' => 'Pencarian Nama Lengkap',
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
                    <th>
<?php
echo $this->Paginator->sort('username', 'Username');
?>
                    </th>
                    <th>
<?php
echo $this->Paginator->sort('fullname', 'Nama Lengkap');
?>
                    </th>
                    <th>
<?php
echo $this->Paginator->sort('nira', 'NIRA');
?>
                    </th>
                    <th>Email</th>
                    <th>
<?php
echo $this->Paginator->sort('verified', 'Verifikasi');
?>
                    </th>
                    <th>
<?php
echo $this->Paginator->sort('Roles.name', 'Level');
?>
                    </th>
                </tr>
            </thead>
            <tbody>
<?php
// get current page
$numberPage = $this->Paginator->counter('{{page}}');
$sequence = ($numberPage - 1) * $limit;
foreach($users as $person)
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
    echo $person['username'];
?>
                    </td>
                    <td>
<?php
    echo $this->Html->link(
        $person->fullname,
        ['controller' => 'Users', 'action' => 'view', $person->id],
        ['escape' => false]
    );

?>
                    </td>
                    <td>
<?php
    echo $this->Html->link(
        $person->nira,
        ['controller' => 'Users', 'action' => 'view', $person->id],
        ['escape' => false]
    );
?>
                    </td>
                    <td>
<?php
    echo $person->has('emails') ? $this->Html->link($person['emails'][0]['name'], ['controller' => 'Emails', 'action' => 'view', $person['emails'][0]['id']]) : '';
?>
                    </td>
                    <td>
<?php
    if ($person->verified) {
        echo 'Sudah';
    } else {
        echo 'Belum';
        echo $this->Html->link(
            '<i class="fa fa-check-circle-o fa-fw"></i>',
            ['controller' => 'Users', 'action' => 'verify', $person->id],
            ['escape' => false, 'confirm' => 'Verifikasi Pengguna ' . $person->fullname . '?']
        );
    }
?>
                    </td>
                    <td>
<?php
    echo $person->has('role') ? $this->Html->link($person['role']['name'], ['controller' => 'Roles', 'action' => 'view', $person['role']['id']]) : '';
    echo $this->Html->link(
        '<i class="fa fa-pencil fa-fw"></i>',
        ['controller' => 'Users', 'action' => 'edit', $person->id],
        ['escape' => false]
    );
    echo $this->Html->link(
        '<i class="fa fa-trash fa-fw"></i>',
        ['controller' => 'Users', 'action' => 'delete', $person->id],
        ['escape' => false, 'confirm' => 'Ingin Menghapus Pengguna ' . $person->fullname . '?']
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
