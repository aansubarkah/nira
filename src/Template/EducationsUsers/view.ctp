<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('Edit Educations User'), ['action' => 'edit', $educationsUser->id]) ?> </li>
        <li><?= $this->Form->postLink(__('Delete Educations User'), ['action' => 'delete', $educationsUser->id], ['confirm' => __('Are you sure you want to delete # {0}?', $educationsUser->id)]) ?> </li>
        <li><?= $this->Html->link(__('List Educations Users'), ['action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Educations User'), ['action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Educations'), ['controller' => 'Educations', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Education'), ['controller' => 'Educations', 'action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Users'), ['controller' => 'Users', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New User'), ['controller' => 'Users', 'action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Evidences'), ['controller' => 'Evidences', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Evidence'), ['controller' => 'Evidences', 'action' => 'add']) ?> </li>
    </ul>
</nav>
<div class="educationsUsers view large-9 medium-8 columns content">
    <h3><?= h($educationsUser->id) ?></h3>
    <table class="vertical-table">
        <tr>
            <th scope="row"><?= __('Education') ?></th>
            <td><?= $educationsUser->has('education') ? $this->Html->link($educationsUser->education->name, ['controller' => 'Educations', 'action' => 'view', $educationsUser->education->id]) : '' ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('User') ?></th>
            <td><?= $educationsUser->has('user') ? $this->Html->link($educationsUser->user->name, ['controller' => 'Users', 'action' => 'view', $educationsUser->user->id]) : '' ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Evidence') ?></th>
            <td><?= $educationsUser->has('evidence') ? $this->Html->link($educationsUser->evidence->name, ['controller' => 'Evidences', 'action' => 'view', $educationsUser->evidence->id]) : '' ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Id') ?></th>
            <td><?= $this->Number->format($educationsUser->id) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Held') ?></th>
            <td><?= h($educationsUser->held) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Started') ?></th>
            <td><?= h($educationsUser->started) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Ended') ?></th>
            <td><?= h($educationsUser->ended) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Created') ?></th>
            <td><?= h($educationsUser->created) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Modified') ?></th>
            <td><?= h($educationsUser->modified) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Active') ?></th>
            <td><?= $educationsUser->active ? __('Yes') : __('No'); ?></td>
        </tr>
    </table>
</div>
