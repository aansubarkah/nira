<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('New Companies Email'), ['action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Companies'), ['controller' => 'Companies', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Company'), ['controller' => 'Companies', 'action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Emails'), ['controller' => 'Emails', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Email'), ['controller' => 'Emails', 'action' => 'add']) ?></li>
    </ul>
</nav>
<div class="companiesEmails index large-9 medium-8 columns content">
    <h3><?= __('Companies Emails') ?></h3>
    <table cellpadding="0" cellspacing="0">
        <thead>
            <tr>
                <th scope="col"><?= $this->Paginator->sort('id') ?></th>
                <th scope="col"><?= $this->Paginator->sort('company_id') ?></th>
                <th scope="col"><?= $this->Paginator->sort('email_id') ?></th>
                <th scope="col"><?= $this->Paginator->sort('created') ?></th>
                <th scope="col"><?= $this->Paginator->sort('modified') ?></th>
                <th scope="col"><?= $this->Paginator->sort('active') ?></th>
                <th scope="col" class="actions"><?= __('Actions') ?></th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($companiesEmails as $companiesEmail): ?>
            <tr>
                <td><?= $this->Number->format($companiesEmail->id) ?></td>
                <td><?= $companiesEmail->has('company') ? $this->Html->link($companiesEmail->company->name, ['controller' => 'Companies', 'action' => 'view', $companiesEmail->company->id]) : '' ?></td>
                <td><?= $companiesEmail->has('email') ? $this->Html->link($companiesEmail->email->name, ['controller' => 'Emails', 'action' => 'view', $companiesEmail->email->id]) : '' ?></td>
                <td><?= h($companiesEmail->created) ?></td>
                <td><?= h($companiesEmail->modified) ?></td>
                <td><?= h($companiesEmail->active) ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['action' => 'view', $companiesEmail->id]) ?>
                    <?= $this->Html->link(__('Edit'), ['action' => 'edit', $companiesEmail->id]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $companiesEmail->id], ['confirm' => __('Are you sure you want to delete # {0}?', $companiesEmail->id)]) ?>
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