<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('Edit Emails User'), ['action' => 'edit', $emailsUser->id]) ?> </li>
        <li><?= $this->Form->postLink(__('Delete Emails User'), ['action' => 'delete', $emailsUser->id], ['confirm' => __('Are you sure you want to delete # {0}?', $emailsUser->id)]) ?> </li>
        <li><?= $this->Html->link(__('List Emails Users'), ['action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Emails User'), ['action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Emails'), ['controller' => 'Emails', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Email'), ['controller' => 'Emails', 'action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Users'), ['controller' => 'Users', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New User'), ['controller' => 'Users', 'action' => 'add']) ?> </li>
    </ul>
</nav>
<div class="emailsUsers view large-9 medium-8 columns content">
    <h3><?= h($emailsUser->id) ?></h3>
    <table class="vertical-table">
        <tr>
            <th scope="row"><?= __('Email') ?></th>
            <td><?= $emailsUser->has('email') ? $this->Html->link($emailsUser->email->name, ['controller' => 'Emails', 'action' => 'view', $emailsUser->email->id]) : '' ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('User') ?></th>
            <td><?= $emailsUser->has('user') ? $this->Html->link($emailsUser->user->name, ['controller' => 'Users', 'action' => 'view', $emailsUser->user->id]) : '' ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Id') ?></th>
            <td><?= $this->Number->format($emailsUser->id) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Created') ?></th>
            <td><?= h($emailsUser->created) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Modified') ?></th>
            <td><?= h($emailsUser->modified) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Active') ?></th>
            <td><?= $emailsUser->active ? __('Yes') : __('No'); ?></td>
        </tr>
    </table>
</div>
