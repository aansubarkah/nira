<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('Edit Emails Office'), ['action' => 'edit', $emailsOffice->id]) ?> </li>
        <li><?= $this->Form->postLink(__('Delete Emails Office'), ['action' => 'delete', $emailsOffice->id], ['confirm' => __('Are you sure you want to delete # {0}?', $emailsOffice->id)]) ?> </li>
        <li><?= $this->Html->link(__('List Emails Offices'), ['action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Emails Office'), ['action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Offices'), ['controller' => 'Offices', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Office'), ['controller' => 'Offices', 'action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Emails'), ['controller' => 'Emails', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Email'), ['controller' => 'Emails', 'action' => 'add']) ?> </li>
    </ul>
</nav>
<div class="emailsOffices view large-9 medium-8 columns content">
    <h3><?= h($emailsOffice->id) ?></h3>
    <table class="vertical-table">
        <tr>
            <th scope="row"><?= __('Office') ?></th>
            <td><?= $emailsOffice->has('office') ? $this->Html->link($emailsOffice->office->name, ['controller' => 'Offices', 'action' => 'view', $emailsOffice->office->id]) : '' ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Email') ?></th>
            <td><?= $emailsOffice->has('email') ? $this->Html->link($emailsOffice->email->name, ['controller' => 'Emails', 'action' => 'view', $emailsOffice->email->id]) : '' ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Id') ?></th>
            <td><?= $this->Number->format($emailsOffice->id) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Created') ?></th>
            <td><?= h($emailsOffice->created) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Modified') ?></th>
            <td><?= h($emailsOffice->modified) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Active') ?></th>
            <td><?= $emailsOffice->active ? __('Yes') : __('No'); ?></td>
        </tr>
    </table>
</div>
