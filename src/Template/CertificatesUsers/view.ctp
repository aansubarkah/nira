<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('Edit Certificates User'), ['action' => 'edit', $certificatesUser->id]) ?> </li>
        <li><?= $this->Form->postLink(__('Delete Certificates User'), ['action' => 'delete', $certificatesUser->id], ['confirm' => __('Are you sure you want to delete # {0}?', $certificatesUser->id)]) ?> </li>
        <li><?= $this->Html->link(__('List Certificates Users'), ['action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Certificates User'), ['action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Certificates'), ['controller' => 'Certificates', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Certificate'), ['controller' => 'Certificates', 'action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Users'), ['controller' => 'Users', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New User'), ['controller' => 'Users', 'action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Evidences'), ['controller' => 'Evidences', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Evidence'), ['controller' => 'Evidences', 'action' => 'add']) ?> </li>
    </ul>
</nav>
<div class="certificatesUsers view large-9 medium-8 columns content">
    <h3><?= h($certificatesUser->id) ?></h3>
    <table class="vertical-table">
        <tr>
            <th scope="row"><?= __('Certificate') ?></th>
            <td><?= $certificatesUser->has('certificate') ? $this->Html->link($certificatesUser->certificate->name, ['controller' => 'Certificates', 'action' => 'view', $certificatesUser->certificate->id]) : '' ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('User') ?></th>
            <td><?= $certificatesUser->has('user') ? $this->Html->link($certificatesUser->user->name, ['controller' => 'Users', 'action' => 'view', $certificatesUser->user->id]) : '' ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Evidence') ?></th>
            <td><?= $certificatesUser->has('evidence') ? $this->Html->link($certificatesUser->evidence->name, ['controller' => 'Evidences', 'action' => 'view', $certificatesUser->evidence->id]) : '' ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Id') ?></th>
            <td><?= $this->Number->format($certificatesUser->id) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Held') ?></th>
            <td><?= h($certificatesUser->held) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Created') ?></th>
            <td><?= h($certificatesUser->created) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Modified') ?></th>
            <td><?= h($certificatesUser->modified) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Active') ?></th>
            <td><?= $certificatesUser->active ? __('Yes') : __('No'); ?></td>
        </tr>
    </table>
</div>
