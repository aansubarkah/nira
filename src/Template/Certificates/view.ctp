<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('Edit Certificate'), ['action' => 'edit', $certificate->id]) ?> </li>
        <li><?= $this->Form->postLink(__('Delete Certificate'), ['action' => 'delete', $certificate->id], ['confirm' => __('Are you sure you want to delete # {0}?', $certificate->id)]) ?> </li>
        <li><?= $this->Html->link(__('List Certificates'), ['action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Certificate'), ['action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Issuers'), ['controller' => 'Issuers', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Issuer'), ['controller' => 'Issuers', 'action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Users'), ['controller' => 'Users', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New User'), ['controller' => 'Users', 'action' => 'add']) ?> </li>
    </ul>
</nav>
<div class="certificates view large-9 medium-8 columns content">
    <h3><?= h($certificate->name) ?></h3>
    <table class="vertical-table">
        <tr>
            <th scope="row"><?= __('Issuer') ?></th>
            <td><?= $certificate->has('issuer') ? $this->Html->link($certificate->issuer->name, ['controller' => 'Issuers', 'action' => 'view', $certificate->issuer->id]) : '' ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Name') ?></th>
            <td><?= h($certificate->name) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Description') ?></th>
            <td><?= h($certificate->description) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Id') ?></th>
            <td><?= $this->Number->format($certificate->id) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Created') ?></th>
            <td><?= h($certificate->created) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Modified') ?></th>
            <td><?= h($certificate->modified) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Active') ?></th>
            <td><?= $certificate->active ? __('Yes') : __('No'); ?></td>
        </tr>
    </table>
    <div class="related">
        <h4><?= __('Related Users') ?></h4>
        <?php if (!empty($certificate->users)): ?>
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
            <?php foreach ($certificate->users as $users): ?>
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
