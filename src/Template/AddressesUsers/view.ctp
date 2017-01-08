<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('Edit Addresses User'), ['action' => 'edit', $addressesUser->id]) ?> </li>
        <li><?= $this->Form->postLink(__('Delete Addresses User'), ['action' => 'delete', $addressesUser->id], ['confirm' => __('Are you sure you want to delete # {0}?', $addressesUser->id)]) ?> </li>
        <li><?= $this->Html->link(__('List Addresses Users'), ['action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Addresses User'), ['action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Addresses'), ['controller' => 'Addresses', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Address'), ['controller' => 'Addresses', 'action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Users'), ['controller' => 'Users', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New User'), ['controller' => 'Users', 'action' => 'add']) ?> </li>
    </ul>
</nav>
<div class="addressesUsers view large-9 medium-8 columns content">
    <h3><?= h($addressesUser->id) ?></h3>
    <table class="vertical-table">
        <tr>
            <th scope="row"><?= __('Address') ?></th>
            <td><?= $addressesUser->has('address') ? $this->Html->link($addressesUser->address->id, ['controller' => 'Addresses', 'action' => 'view', $addressesUser->address->id]) : '' ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('User') ?></th>
            <td><?= $addressesUser->has('user') ? $this->Html->link($addressesUser->user->name, ['controller' => 'Users', 'action' => 'view', $addressesUser->user->id]) : '' ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Id') ?></th>
            <td><?= $this->Number->format($addressesUser->id) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Started') ?></th>
            <td><?= h($addressesUser->started) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Ended') ?></th>
            <td><?= h($addressesUser->ended) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Created') ?></th>
            <td><?= h($addressesUser->created) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Modified') ?></th>
            <td><?= h($addressesUser->modified) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Active') ?></th>
            <td><?= $addressesUser->active ? __('Yes') : __('No'); ?></td>
        </tr>
    </table>
</div>
