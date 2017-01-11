<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('New Emails User'), ['action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Emails'), ['controller' => 'Emails', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Email'), ['controller' => 'Emails', 'action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Users'), ['controller' => 'Users', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New User'), ['controller' => 'Users', 'action' => 'add']) ?></li>
    </ul>
</nav>
<div class="emailsUsers index large-9 medium-8 columns content">
    <h3><?= __('Emails Users') ?></h3>
    <table cellpadding="0" cellspacing="0">
        <thead>
            <tr>
                <th scope="col"><?= $this->Paginator->sort('id') ?></th>
                <th scope="col"><?= $this->Paginator->sort('email_id') ?></th>
                <th scope="col"><?= $this->Paginator->sort('user_id') ?></th>
                <th scope="col"><?= $this->Paginator->sort('created') ?></th>
                <th scope="col"><?= $this->Paginator->sort('modified') ?></th>
                <th scope="col"><?= $this->Paginator->sort('active') ?></th>
                <th scope="col" class="actions"><?= __('Actions') ?></th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($emailsUsers as $emailsUser): ?>
            <tr>
                <td><?= $this->Number->format($emailsUser->id) ?></td>
                <td><?= $emailsUser->has('email') ? $this->Html->link($emailsUser->email->name, ['controller' => 'Emails', 'action' => 'view', $emailsUser->email->id]) : '' ?></td>
                <td><?= $emailsUser->has('user') ? $this->Html->link($emailsUser->user->name, ['controller' => 'Users', 'action' => 'view', $emailsUser->user->id]) : '' ?></td>
                <td><?= h($emailsUser->created) ?></td>
                <td><?= h($emailsUser->modified) ?></td>
                <td><?= h($emailsUser->active) ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['action' => 'view', $emailsUser->id]) ?>
                    <?= $this->Html->link(__('Edit'), ['action' => 'edit', $emailsUser->id]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $emailsUser->id], ['confirm' => __('Are you sure you want to delete # {0}?', $emailsUser->id)]) ?>
                </td>
            </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
    <div class="paginator">
        <ul class="pagination">
            <?= $this->Paginator->first('<< ' . __('first')) ?>
            <?= $this->Paginator->prev('< ' . __('previous')) ?>
            <?= $this->Paginator->numbers() ?>
            <?= $this->Paginator->next(__('next') . ' >') ?>
            <?= $this->Paginator->last(__('last') . ' >>') ?>
        </ul>
        <p><?= $this->Paginator->counter(['format' => __('Page {{page}} of {{pages}}, showing {{current}} record(s) out of {{count}} total')]) ?></p>
    </div>
</div>
