<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('Edit Addresses Office'), ['action' => 'edit', $addressesOffice->id]) ?> </li>
        <li><?= $this->Form->postLink(__('Delete Addresses Office'), ['action' => 'delete', $addressesOffice->id], ['confirm' => __('Are you sure you want to delete # {0}?', $addressesOffice->id)]) ?> </li>
        <li><?= $this->Html->link(__('List Addresses Offices'), ['action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Addresses Office'), ['action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Addresses'), ['controller' => 'Addresses', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Address'), ['controller' => 'Addresses', 'action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Offices'), ['controller' => 'Offices', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Office'), ['controller' => 'Offices', 'action' => 'add']) ?> </li>
    </ul>
</nav>
<div class="addressesOffices view large-9 medium-8 columns content">
    <h3><?= h($addressesOffice->id) ?></h3>
    <table class="vertical-table">
        <tr>
            <th scope="row"><?= __('Address') ?></th>
            <td><?= $addressesOffice->has('address') ? $this->Html->link($addressesOffice->address->id, ['controller' => 'Addresses', 'action' => 'view', $addressesOffice->address->id]) : '' ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Office') ?></th>
            <td><?= $addressesOffice->has('office') ? $this->Html->link($addressesOffice->office->name, ['controller' => 'Offices', 'action' => 'view', $addressesOffice->office->id]) : '' ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Id') ?></th>
            <td><?= $this->Number->format($addressesOffice->id) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Started') ?></th>
            <td><?= h($addressesOffice->started) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Ended') ?></th>
            <td><?= h($addressesOffice->ended) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Created') ?></th>
            <td><?= h($addressesOffice->created) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Modified') ?></th>
            <td><?= h($addressesOffice->modified) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Active') ?></th>
            <td><?= $addressesOffice->active ? __('Yes') : __('No'); ?></td>
        </tr>
    </table>
</div>
