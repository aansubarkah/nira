<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('New Addresses User'), ['action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Addresses'), ['controller' => 'Addresses', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Address'), ['controller' => 'Addresses', 'action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Users'), ['controller' => 'Users', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New User'), ['controller' => 'Users', 'action' => 'add']) ?></li>
    </ul>
</nav>
<div class="addressesUsers index large-9 medium-8 columns content">
    <h3><?= __('Addresses Users') ?></h3>
    <table cellpadding="0" cellspacing="0">
        <thead>
            <tr>
                <th scope="col"><?= $this->Paginator->sort('id') ?></th>
                <th scope="col"><?= $this->Paginator->sort('address_id') ?></th>
                <th scope="col"><?= $this->Paginator->sort('user_id') ?></th>
                <th scope="col"><?= $this->Paginator->sort('started') ?></th>
                <th scope="col"><?= $this->Paginator->sort('ended') ?></th>
                <th scope="col"><?= $this->Paginator->sort('created') ?></th>
                <th scope="col"><?= $this->Paginator->sort('modified') ?></th>
                <th scope="col"><?= $this->Paginator->sort('active') ?></th>
                <th scope="col" class="actions"><?= __('Actions') ?></th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($addressesUsers as $addressesUser): ?>
            <tr>
                <td><?= $this->Number->format($addressesUser->id) ?></td>
                <td><?= $addressesUser->has('address') ? $this->Html->link($addressesUser->address->id, ['controller' => 'Addresses', 'action' => 'view', $addressesUser->address->id]) : '' ?></td>
                <td><?= $addressesUser->has('user') ? $this->Html->link($addressesUser->user->name, ['controller' => 'Users', 'action' => 'view', $addressesUser->user->id]) : '' ?></td>
                <td><?= h($addressesUser->started) ?></td>
                <td><?= h($addressesUser->ended) ?></td>
                <td><?= h($addressesUser->created) ?></td>
                <td><?= h($addressesUser->modified) ?></td>
                <td><?= h($addressesUser->active) ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['action' => 'view', $addressesUser->id]) ?>
                    <?= $this->Html->link(__('Edit'), ['action' => 'edit', $addressesUser->id]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $addressesUser->id], ['confirm' => __('Are you sure you want to delete # {0}?', $addressesUser->id)]) ?>
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
