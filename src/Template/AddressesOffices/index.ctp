<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('New Addresses Office'), ['action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Addresses'), ['controller' => 'Addresses', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Address'), ['controller' => 'Addresses', 'action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Offices'), ['controller' => 'Offices', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Office'), ['controller' => 'Offices', 'action' => 'add']) ?></li>
    </ul>
</nav>
<div class="addressesOffices index large-9 medium-8 columns content">
    <h3><?= __('Addresses Offices') ?></h3>
    <table cellpadding="0" cellspacing="0">
        <thead>
            <tr>
                <th scope="col"><?= $this->Paginator->sort('id') ?></th>
                <th scope="col"><?= $this->Paginator->sort('address_id') ?></th>
                <th scope="col"><?= $this->Paginator->sort('office_id') ?></th>
                <th scope="col"><?= $this->Paginator->sort('started') ?></th>
                <th scope="col"><?= $this->Paginator->sort('ended') ?></th>
                <th scope="col"><?= $this->Paginator->sort('created') ?></th>
                <th scope="col"><?= $this->Paginator->sort('modified') ?></th>
                <th scope="col"><?= $this->Paginator->sort('active') ?></th>
                <th scope="col" class="actions"><?= __('Actions') ?></th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($addressesOffices as $addressesOffice): ?>
            <tr>
                <td><?= $this->Number->format($addressesOffice->id) ?></td>
                <td><?= $addressesOffice->has('address') ? $this->Html->link($addressesOffice->address->id, ['controller' => 'Addresses', 'action' => 'view', $addressesOffice->address->id]) : '' ?></td>
                <td><?= $addressesOffice->has('office') ? $this->Html->link($addressesOffice->office->name, ['controller' => 'Offices', 'action' => 'view', $addressesOffice->office->id]) : '' ?></td>
                <td><?= h($addressesOffice->started) ?></td>
                <td><?= h($addressesOffice->ended) ?></td>
                <td><?= h($addressesOffice->created) ?></td>
                <td><?= h($addressesOffice->modified) ?></td>
                <td><?= h($addressesOffice->active) ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['action' => 'view', $addressesOffice->id]) ?>
                    <?= $this->Html->link(__('Edit'), ['action' => 'edit', $addressesOffice->id]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $addressesOffice->id], ['confirm' => __('Are you sure you want to delete # {0}?', $addressesOffice->id)]) ?>
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
