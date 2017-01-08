<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('Edit Addresses Company'), ['action' => 'edit', $addressesCompany->id]) ?> </li>
        <li><?= $this->Form->postLink(__('Delete Addresses Company'), ['action' => 'delete', $addressesCompany->id], ['confirm' => __('Are you sure you want to delete # {0}?', $addressesCompany->id)]) ?> </li>
        <li><?= $this->Html->link(__('List Addresses Companies'), ['action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Addresses Company'), ['action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Addresses'), ['controller' => 'Addresses', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Address'), ['controller' => 'Addresses', 'action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Companies'), ['controller' => 'Companies', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Company'), ['controller' => 'Companies', 'action' => 'add']) ?> </li>
    </ul>
</nav>
<div class="addressesCompanies view large-9 medium-8 columns content">
    <h3><?= h($addressesCompany->id) ?></h3>
    <table class="vertical-table">
        <tr>
            <th scope="row"><?= __('Address') ?></th>
            <td><?= $addressesCompany->has('address') ? $this->Html->link($addressesCompany->address->id, ['controller' => 'Addresses', 'action' => 'view', $addressesCompany->address->id]) : '' ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Company') ?></th>
            <td><?= $addressesCompany->has('company') ? $this->Html->link($addressesCompany->company->name, ['controller' => 'Companies', 'action' => 'view', $addressesCompany->company->id]) : '' ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Id') ?></th>
            <td><?= $this->Number->format($addressesCompany->id) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Started') ?></th>
            <td><?= h($addressesCompany->started) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Ended') ?></th>
            <td><?= h($addressesCompany->ended) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Created') ?></th>
            <td><?= h($addressesCompany->created) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Modified') ?></th>
            <td><?= h($addressesCompany->modified) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Active') ?></th>
            <td><?= $addressesCompany->active ? __('Yes') : __('No'); ?></td>
        </tr>
    </table>
</div>
