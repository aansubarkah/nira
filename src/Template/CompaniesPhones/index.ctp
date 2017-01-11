<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('New Companies Phone'), ['action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Companies'), ['controller' => 'Companies', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Company'), ['controller' => 'Companies', 'action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Phones'), ['controller' => 'Phones', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Phone'), ['controller' => 'Phones', 'action' => 'add']) ?></li>
    </ul>
</nav>
<div class="companiesPhones index large-9 medium-8 columns content">
    <h3><?= __('Companies Phones') ?></h3>
    <table cellpadding="0" cellspacing="0">
        <thead>
            <tr>
                <th scope="col"><?= $this->Paginator->sort('id') ?></th>
                <th scope="col"><?= $this->Paginator->sort('company_id') ?></th>
                <th scope="col"><?= $this->Paginator->sort('phone_id') ?></th>
                <th scope="col"><?= $this->Paginator->sort('created') ?></th>
                <th scope="col"><?= $this->Paginator->sort('modified') ?></th>
                <th scope="col"><?= $this->Paginator->sort('active') ?></th>
                <th scope="col" class="actions"><?= __('Actions') ?></th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($companiesPhones as $companiesPhone): ?>
            <tr>
                <td><?= $this->Number->format($companiesPhone->id) ?></td>
                <td><?= $companiesPhone->has('company') ? $this->Html->link($companiesPhone->company->name, ['controller' => 'Companies', 'action' => 'view', $companiesPhone->company->id]) : '' ?></td>
                <td><?= $companiesPhone->has('phone') ? $this->Html->link($companiesPhone->phone->name, ['controller' => 'Phones', 'action' => 'view', $companiesPhone->phone->id]) : '' ?></td>
                <td><?= h($companiesPhone->created) ?></td>
                <td><?= h($companiesPhone->modified) ?></td>
                <td><?= h($companiesPhone->active) ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['action' => 'view', $companiesPhone->id]) ?>
                    <?= $this->Html->link(__('Edit'), ['action' => 'edit', $companiesPhone->id]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $companiesPhone->id], ['confirm' => __('Are you sure you want to delete # {0}?', $companiesPhone->id)]) ?>
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
