<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('Edit Companies Email'), ['action' => 'edit', $companiesEmail->id]) ?> </li>
        <li><?= $this->Form->postLink(__('Delete Companies Email'), ['action' => 'delete', $companiesEmail->id], ['confirm' => __('Are you sure you want to delete # {0}?', $companiesEmail->id)]) ?> </li>
        <li><?= $this->Html->link(__('List Companies Emails'), ['action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Companies Email'), ['action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Companies'), ['controller' => 'Companies', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Company'), ['controller' => 'Companies', 'action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Emails'), ['controller' => 'Emails', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Email'), ['controller' => 'Emails', 'action' => 'add']) ?> </li>
    </ul>
</nav>
<div class="companiesEmails view large-9 medium-8 columns content">
    <h3><?= h($companiesEmail->id) ?></h3>
    <table class="vertical-table">
        <tr>
            <th scope="row"><?= __('Company') ?></th>
            <td><?= $companiesEmail->has('company') ? $this->Html->link($companiesEmail->company->name, ['controller' => 'Companies', 'action' => 'view', $companiesEmail->company->id]) : '' ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Email') ?></th>
            <td><?= $companiesEmail->has('email') ? $this->Html->link($companiesEmail->email->name, ['controller' => 'Emails', 'action' => 'view', $companiesEmail->email->id]) : '' ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Id') ?></th>
            <td><?= $this->Number->format($companiesEmail->id) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Created') ?></th>
            <td><?= h($companiesEmail->created) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Modified') ?></th>
            <td><?= h($companiesEmail->modified) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Active') ?></th>
            <td><?= $companiesEmail->active ? __('Yes') : __('No'); ?></td>
        </tr>
    </table>
</div>
