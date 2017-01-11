<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('New Training'), ['action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Issuers'), ['controller' => 'Issuers', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Issuer'), ['controller' => 'Issuers', 'action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Users'), ['controller' => 'Users', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New User'), ['controller' => 'Users', 'action' => 'add']) ?></li>
    </ul>
</nav>
<div class="trainings index large-9 medium-8 columns content">
    <h3><?= __('Trainings') ?></h3>
    <table cellpadding="0" cellspacing="0">
        <thead>
            <tr>
                <th scope="col"><?= $this->Paginator->sort('id') ?></th>
                <th scope="col"><?= $this->Paginator->sort('issuer_id') ?></th>
                <th scope="col"><?= $this->Paginator->sort('name') ?></th>
                <th scope="col"><?= $this->Paginator->sort('description') ?></th>
                <th scope="col"><?= $this->Paginator->sort('started') ?></th>
                <th scope="col"><?= $this->Paginator->sort('ended') ?></th>
                <th scope="col"><?= $this->Paginator->sort('created') ?></th>
                <th scope="col"><?= $this->Paginator->sort('modified') ?></th>
                <th scope="col"><?= $this->Paginator->sort('held') ?></th>
                <th scope="col"><?= $this->Paginator->sort('active') ?></th>
                <th scope="col" class="actions"><?= __('Actions') ?></th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($trainings as $training): ?>
            <tr>
                <td><?= $this->Number->format($training->id) ?></td>
                <td><?= $training->has('issuer') ? $this->Html->link($training->issuer->name, ['controller' => 'Issuers', 'action' => 'view', $training->issuer->id]) : '' ?></td>
                <td><?= h($training->name) ?></td>
                <td><?= h($training->description) ?></td>
                <td><?= h($training->started) ?></td>
                <td><?= h($training->ended) ?></td>
                <td><?= h($training->created) ?></td>
                <td><?= h($training->modified) ?></td>
                <td><?= h($training->held) ?></td>
                <td><?= h($training->active) ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['action' => 'view', $training->id]) ?>
                    <?= $this->Html->link(__('Edit'), ['action' => 'edit', $training->id]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $training->id], ['confirm' => __('Are you sure you want to delete # {0}?', $training->id)]) ?>
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
