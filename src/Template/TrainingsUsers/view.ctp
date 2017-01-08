<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('Edit Trainings User'), ['action' => 'edit', $trainingsUser->id]) ?> </li>
        <li><?= $this->Form->postLink(__('Delete Trainings User'), ['action' => 'delete', $trainingsUser->id], ['confirm' => __('Are you sure you want to delete # {0}?', $trainingsUser->id)]) ?> </li>
        <li><?= $this->Html->link(__('List Trainings Users'), ['action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Trainings User'), ['action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Trainings'), ['controller' => 'Trainings', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Training'), ['controller' => 'Trainings', 'action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Users'), ['controller' => 'Users', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New User'), ['controller' => 'Users', 'action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Evidences'), ['controller' => 'Evidences', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Evidence'), ['controller' => 'Evidences', 'action' => 'add']) ?> </li>
    </ul>
</nav>
<div class="trainingsUsers view large-9 medium-8 columns content">
    <h3><?= h($trainingsUser->id) ?></h3>
    <table class="vertical-table">
        <tr>
            <th scope="row"><?= __('Training') ?></th>
            <td><?= $trainingsUser->has('training') ? $this->Html->link($trainingsUser->training->name, ['controller' => 'Trainings', 'action' => 'view', $trainingsUser->training->id]) : '' ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('User') ?></th>
            <td><?= $trainingsUser->has('user') ? $this->Html->link($trainingsUser->user->name, ['controller' => 'Users', 'action' => 'view', $trainingsUser->user->id]) : '' ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Evidence') ?></th>
            <td><?= $trainingsUser->has('evidence') ? $this->Html->link($trainingsUser->evidence->name, ['controller' => 'Evidences', 'action' => 'view', $trainingsUser->evidence->id]) : '' ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Id') ?></th>
            <td><?= $this->Number->format($trainingsUser->id) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Created') ?></th>
            <td><?= h($trainingsUser->created) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Modified') ?></th>
            <td><?= h($trainingsUser->modified) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Active') ?></th>
            <td><?= $trainingsUser->active ? __('Yes') : __('No'); ?></td>
        </tr>
    </table>
</div>
