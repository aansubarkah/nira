<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('New Education'), ['action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Colleges'), ['controller' => 'Colleges', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New College'), ['controller' => 'Colleges', 'action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Levels'), ['controller' => 'Levels', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Level'), ['controller' => 'Levels', 'action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Users'), ['controller' => 'Users', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New User'), ['controller' => 'Users', 'action' => 'add']) ?></li>
    </ul>
</nav>
<div class="educations index large-9 medium-8 columns content">
    <h3><?= __('Educations') ?></h3>
    <table cellpadding="0" cellspacing="0">
        <thead>
            <tr>
                <th scope="col"><?= $this->Paginator->sort('id') ?></th>
                <th scope="col"><?= $this->Paginator->sort('college_id') ?></th>
                <th scope="col"><?= $this->Paginator->sort('level_id') ?></th>
                <th scope="col"><?= $this->Paginator->sort('name') ?></th>
                <th scope="col"><?= $this->Paginator->sort('periods') ?></th>
                <th scope="col"><?= $this->Paginator->sort('created') ?></th>
                <th scope="col"><?= $this->Paginator->sort('modified') ?></th>
                <th scope="col"><?= $this->Paginator->sort('active') ?></th>
                <th scope="col" class="actions"><?= __('Actions') ?></th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($educations as $education): ?>
            <tr>
                <td><?= $this->Number->format($education->id) ?></td>
                <td><?= $education->has('college') ? $this->Html->link($education->college->name, ['controller' => 'Colleges', 'action' => 'view', $education->college->id]) : '' ?></td>
                <td><?= $education->has('level') ? $this->Html->link($education->level->name, ['controller' => 'Levels', 'action' => 'view', $education->level->id]) : '' ?></td>
                <td><?= h($education->name) ?></td>
                <td><?= h($education->periods) ?></td>
                <td><?= h($education->created) ?></td>
                <td><?= h($education->modified) ?></td>
                <td><?= h($education->active) ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['action' => 'view', $education->id]) ?>
                    <?= $this->Html->link(__('Edit'), ['action' => 'edit', $education->id]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $education->id], ['confirm' => __('Are you sure you want to delete # {0}?', $education->id)]) ?>
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
