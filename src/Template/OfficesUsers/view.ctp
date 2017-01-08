<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('Edit Offices User'), ['action' => 'edit', $officesUser->id]) ?> </li>
        <li><?= $this->Form->postLink(__('Delete Offices User'), ['action' => 'delete', $officesUser->id], ['confirm' => __('Are you sure you want to delete # {0}?', $officesUser->id)]) ?> </li>
        <li><?= $this->Html->link(__('List Offices Users'), ['action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Offices User'), ['action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Offices'), ['controller' => 'Offices', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Office'), ['controller' => 'Offices', 'action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Users'), ['controller' => 'Users', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New User'), ['controller' => 'Users', 'action' => 'add']) ?> </li>
    </ul>
</nav>
<div class="officesUsers view large-9 medium-8 columns content">
    <h3><?= h($officesUser->id) ?></h3>
    <table class="vertical-table">
        <tr>
            <th scope="row"><?= __('Office') ?></th>
            <td><?= $officesUser->has('office') ? $this->Html->link($officesUser->office->name, ['controller' => 'Offices', 'action' => 'view', $officesUser->office->id]) : '' ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('User') ?></th>
            <td><?= $officesUser->has('user') ? $this->Html->link($officesUser->user->name, ['controller' => 'Users', 'action' => 'view', $officesUser->user->id]) : '' ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Id') ?></th>
            <td><?= $this->Number->format($officesUser->id) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Started') ?></th>
            <td><?= h($officesUser->started) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Ended') ?></th>
            <td><?= h($officesUser->ended) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Created') ?></th>
            <td><?= h($officesUser->created) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Modified') ?></th>
            <td><?= h($officesUser->modified) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Active') ?></th>
            <td><?= $officesUser->active ? __('Yes') : __('No'); ?></td>
        </tr>
    </table>
</div>
