<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('New Offices Phone'), ['action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Offices'), ['controller' => 'Offices', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Office'), ['controller' => 'Offices', 'action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Phones'), ['controller' => 'Phones', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Phone'), ['controller' => 'Phones', 'action' => 'add']) ?></li>
    </ul>
</nav>
<div class="officesPhones index large-9 medium-8 columns content">
    <h3><?= __('Offices Phones') ?></h3>
    <table cellpadding="0" cellspacing="0">
        <thead>
            <tr>
                <th scope="col"><?= $this->Paginator->sort('id') ?></th>
                <th scope="col"><?= $this->Paginator->sort('office_id') ?></th>
                <th scope="col"><?= $this->Paginator->sort('phone_id') ?></th>
                <th scope="col"><?= $this->Paginator->sort('created') ?></th>
                <th scope="col"><?= $this->Paginator->sort('modified') ?></th>
                <th scope="col"><?= $this->Paginator->sort('active') ?></th>
                <th scope="col" class="actions"><?= __('Actions') ?></th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($officesPhones as $officesPhone): ?>
            <tr>
                <td><?= $this->Number->format($officesPhone->id) ?></td>
                <td><?= $officesPhone->has('office') ? $this->Html->link($officesPhone->office->name, ['controller' => 'Offices', 'action' => 'view', $officesPhone->office->id]) : '' ?></td>
                <td><?= $officesPhone->has('phone') ? $this->Html->link($officesPhone->phone->name, ['controller' => 'Phones', 'action' => 'view', $officesPhone->phone->id]) : '' ?></td>
                <td><?= h($officesPhone->created) ?></td>
                <td><?= h($officesPhone->modified) ?></td>
                <td><?= h($officesPhone->active) ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['action' => 'view', $officesPhone->id]) ?>
                    <?= $this->Html->link(__('Edit'), ['action' => 'edit', $officesPhone->id]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $officesPhone->id], ['confirm' => __('Are you sure you want to delete # {0}?', $officesPhone->id)]) ?>
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
