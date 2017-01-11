<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('New Addresses Company'), ['action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Addresses'), ['controller' => 'Addresses', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Address'), ['controller' => 'Addresses', 'action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Companies'), ['controller' => 'Companies', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Company'), ['controller' => 'Companies', 'action' => 'add']) ?></li>
    </ul>
</nav>
<div class="addressesCompanies index large-9 medium-8 columns content">
    <h3><?= __('Addresses Companies') ?></h3>
    <table cellpadding="0" cellspacing="0">
        <thead>
            <tr>
                <th scope="col"><?= $this->Paginator->sort('id') ?></th>
                <th scope="col"><?= $this->Paginator->sort('address_id') ?></th>
                <th scope="col"><?= $this->Paginator->sort('company_id') ?></th>
                <th scope="col"><?= $this->Paginator->sort('started') ?></th>
                <th scope="col"><?= $this->Paginator->sort('ended') ?></th>
                <th scope="col"><?= $this->Paginator->sort('created') ?></th>
                <th scope="col"><?= $this->Paginator->sort('modified') ?></th>
                <th scope="col"><?= $this->Paginator->sort('active') ?></th>
                <th scope="col" class="actions"><?= __('Actions') ?></th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($addressesCompanies as $addressesCompany): ?>
            <tr>
                <td><?= $this->Number->format($addressesCompany->id) ?></td>
                <td><?= $addressesCompany->has('address') ? $this->Html->link($addressesCompany->address->id, ['controller' => 'Addresses', 'action' => 'view', $addressesCompany->address->id]) : '' ?></td>
                <td><?= $addressesCompany->has('company') ? $this->Html->link($addressesCompany->company->name, ['controller' => 'Companies', 'action' => 'view', $addressesCompany->company->id]) : '' ?></td>
                <td><?= h($addressesCompany->started) ?></td>
                <td><?= h($addressesCompany->ended) ?></td>
                <td><?= h($addressesCompany->created) ?></td>
                <td><?= h($addressesCompany->modified) ?></td>
                <td><?= h($addressesCompany->active) ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['action' => 'view', $addressesCompany->id]) ?>
                    <?= $this->Html->link(__('Edit'), ['action' => 'edit', $addressesCompany->id]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $addressesCompany->id], ['confirm' => __('Are you sure you want to delete # {0}?', $addressesCompany->id)]) ?>
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
