<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('New Emails Office'), ['action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Offices'), ['controller' => 'Offices', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Office'), ['controller' => 'Offices', 'action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Emails'), ['controller' => 'Emails', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Email'), ['controller' => 'Emails', 'action' => 'add']) ?></li>
    </ul>
</nav>
<div class="emailsOffices index large-9 medium-8 columns content">
    <h3><?= __('Emails Offices') ?></h3>
    <table cellpadding="0" cellspacing="0">
        <thead>
            <tr>
                <th scope="col"><?= $this->Paginator->sort('id') ?></th>
                <th scope="col"><?= $this->Paginator->sort('office_id') ?></th>
                <th scope="col"><?= $this->Paginator->sort('email_id') ?></th>
                <th scope="col"><?= $this->Paginator->sort('created') ?></th>
                <th scope="col"><?= $this->Paginator->sort('modified') ?></th>
                <th scope="col"><?= $this->Paginator->sort('active') ?></th>
                <th scope="col" class="actions"><?= __('Actions') ?></th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($emailsOffices as $emailsOffice): ?>
            <tr>
                <td><?= $this->Number->format($emailsOffice->id) ?></td>
                <td><?= $emailsOffice->has('office') ? $this->Html->link($emailsOffice->office->name, ['controller' => 'Offices', 'action' => 'view', $emailsOffice->office->id]) : '' ?></td>
                <td><?= $emailsOffice->has('email') ? $this->Html->link($emailsOffice->email->name, ['controller' => 'Emails', 'action' => 'view', $emailsOffice->email->id]) : '' ?></td>
                <td><?= h($emailsOffice->created) ?></td>
                <td><?= h($emailsOffice->modified) ?></td>
                <td><?= h($emailsOffice->active) ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['action' => 'view', $emailsOffice->id]) ?>
                    <?= $this->Html->link(__('Edit'), ['action' => 'edit', $emailsOffice->id]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $emailsOffice->id], ['confirm' => __('Are you sure you want to delete # {0}?', $emailsOffice->id)]) ?>
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
