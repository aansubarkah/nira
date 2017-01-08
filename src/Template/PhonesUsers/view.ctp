<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('Edit Phones User'), ['action' => 'edit', $phonesUser->id]) ?> </li>
        <li><?= $this->Form->postLink(__('Delete Phones User'), ['action' => 'delete', $phonesUser->id], ['confirm' => __('Are you sure you want to delete # {0}?', $phonesUser->id)]) ?> </li>
        <li><?= $this->Html->link(__('List Phones Users'), ['action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Phones User'), ['action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Phones'), ['controller' => 'Phones', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Phone'), ['controller' => 'Phones', 'action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Users'), ['controller' => 'Users', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New User'), ['controller' => 'Users', 'action' => 'add']) ?> </li>
    </ul>
</nav>
<div class="phonesUsers view large-9 medium-8 columns content">
    <h3><?= h($phonesUser->id) ?></h3>
    <table class="vertical-table">
        <tr>
            <th scope="row"><?= __('Phone') ?></th>
            <td><?= $phonesUser->has('phone') ? $this->Html->link($phonesUser->phone->name, ['controller' => 'Phones', 'action' => 'view', $phonesUser->phone->id]) : '' ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('User') ?></th>
            <td><?= $phonesUser->has('user') ? $this->Html->link($phonesUser->user->name, ['controller' => 'Users', 'action' => 'view', $phonesUser->user->id]) : '' ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Id') ?></th>
            <td><?= $this->Number->format($phonesUser->id) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Created') ?></th>
            <td><?= h($phonesUser->created) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Modified') ?></th>
            <td><?= h($phonesUser->modified) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Active') ?></th>
            <td><?= $phonesUser->active ? __('Yes') : __('No'); ?></td>
        </tr>
    </table>
</div>
