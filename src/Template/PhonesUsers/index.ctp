<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('New Phones User'), ['action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Phones'), ['controller' => 'Phones', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Phone'), ['controller' => 'Phones', 'action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Users'), ['controller' => 'Users', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New User'), ['controller' => 'Users', 'action' => 'add']) ?></li>
    </ul>
</nav>
<div class="phonesUsers index large-9 medium-8 columns content">
    <h3><?= __('Phones Users') ?></h3>
    <table cellpadding="0" cellspacing="0">
        <thead>
            <tr>
                <th scope="col"><?= $this->Paginator->sort('id') ?></th>
                <th scope="col"><?= $this->Paginator->sort('phone_id') ?></th>
                <th scope="col"><?= $this->Paginator->sort('user_id') ?></th>
                <th scope="col"><?= $this->Paginator->sort('created') ?></th>
                <th scope="col"><?= $this->Paginator->sort('modified') ?></th>
                <th scope="col"><?= $this->Paginator->sort('active') ?></th>
                <th scope="col" class="actions"><?= __('Actions') ?></th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($phonesUsers as $phonesUser): ?>
            <tr>
                <td><?= $this->Number->format($phonesUser->id) ?></td>
                <td><?= $phonesUser->has('phone') ? $this->Html->link($phonesUser->phone->name, ['controller' => 'Phones', 'action' => 'view', $phonesUser->phone->id]) : '' ?></td>
                <td><?= $phonesUser->has('user') ? $this->Html->link($phonesUser->user->name, ['controller' => 'Users', 'action' => 'view', $phonesUser->user->id]) : '' ?></td>
                <td><?= h($phonesUser->created) ?></td>
                <td><?= h($phonesUser->modified) ?></td>
                <td><?= h($phonesUser->active) ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['action' => 'view', $phonesUser->id]) ?>
                    <?= $this->Html->link(__('Edit'), ['action' => 'edit', $phonesUser->id]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $phonesUser->id], ['confirm' => __('Are you sure you want to delete # {0}?', $phonesUser->id)]) ?>
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
