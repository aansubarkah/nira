<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('Edit Training'), ['action' => 'edit', $training->id]) ?> </li>
        <li><?= $this->Form->postLink(__('Delete Training'), ['action' => 'delete', $training->id], ['confirm' => __('Are you sure you want to delete # {0}?', $training->id)]) ?> </li>
        <li><?= $this->Html->link(__('List Trainings'), ['action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Training'), ['action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Issuers'), ['controller' => 'Issuers', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Issuer'), ['controller' => 'Issuers', 'action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Users'), ['controller' => 'Users', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New User'), ['controller' => 'Users', 'action' => 'add']) ?> </li>
    </ul>
</nav>
<div class="trainings view large-9 medium-8 columns content">
    <h3><?= h($training->name) ?></h3>
    <table class="vertical-table">
        <tr>
            <th scope="row"><?= __('Issuer') ?></th>
            <td><?= $training->has('issuer') ? $this->Html->link($training->issuer->name, ['controller' => 'Issuers', 'action' => 'view', $training->issuer->id]) : '' ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Name') ?></th>
            <td><?= h($training->name) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Description') ?></th>
            <td><?= h($training->description) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Id') ?></th>
            <td><?= $this->Number->format($training->id) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Started') ?></th>
            <td><?= h($training->started) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Ended') ?></th>
            <td><?= h($training->ended) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Created') ?></th>
            <td><?= h($training->created) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Modified') ?></th>
            <td><?= h($training->modified) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Held') ?></th>
            <td><?= h($training->held) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Active') ?></th>
            <td><?= $training->active ? __('Yes') : __('No'); ?></td>
        </tr>
    </table>
    <div class="related">
        <h4><?= __('Related Users') ?></h4>
        <?php if (!empty($training->users)): ?>
        <table cellpadding="0" cellspacing="0">
            <tr>
                <th scope="col"><?= __('Id') ?></th>
                <th scope="col"><?= __('Username') ?></th>
                <th scope="col"><?= __('Password') ?></th>
                <th scope="col"><?= __('Name') ?></th>
                <th scope="col"><?= __('Fullname') ?></th>
                <th scope="col"><?= __('Nira') ?></th>
                <th scope="col"><?= __('Nik') ?></th>
                <th scope="col"><?= __('Localnumber') ?></th>
                <th scope="col"><?= __('Role Id') ?></th>
                <th scope="col"><?= __('Created') ?></th>
                <th scope="col"><?= __('Modified') ?></th>
                <th scope="col"><?= __('Verified') ?></th>
                <th scope="col"><?= __('Marital') ?></th>
                <th scope="col"><?= __('Birthday') ?></th>
                <th scope="col"><?= __('Birthplace') ?></th>
                <th scope="col"><?= __('Sex') ?></th>
                <th scope="col"><?= __('Active') ?></th>
                <th scope="col" class="actions"><?= __('Actions') ?></th>
            </tr>
            <?php foreach ($training->users as $users): ?>
            <tr>
                <td><?= h($users->id) ?></td>
                <td><?= h($users->username) ?></td>
                <td><?= h($users->password) ?></td>
                <td><?= h($users->name) ?></td>
                <td><?= h($users->fullname) ?></td>
                <td><?= h($users->nira) ?></td>
                <td><?= h($users->nik) ?></td>
                <td><?= h($users->localnumber) ?></td>
                <td><?= h($users->role_id) ?></td>
                <td><?= h($users->created) ?></td>
                <td><?= h($users->modified) ?></td>
                <td><?= h($users->verified) ?></td>
                <td><?= h($users->marital) ?></td>
                <td><?= h($users->birthday) ?></td>
                <td><?= h($users->birthplace) ?></td>
                <td><?= h($users->sex) ?></td>
                <td><?= h($users->active) ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['controller' => 'Users', 'action' => 'view', $users->id]) ?>
                    <?= $this->Html->link(__('Edit'), ['controller' => 'Users', 'action' => 'edit', $users->id]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['controller' => 'Users', 'action' => 'delete', $users->id], ['confirm' => __('Are you sure you want to delete # {0}?', $users->id)]) ?>
                </td>
            </tr>
            <?php endforeach; ?>
        </table>
        <?php endif; ?>
    </div>
</div>
