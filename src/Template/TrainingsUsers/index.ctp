<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('New Trainings User'), ['action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Trainings'), ['controller' => 'Trainings', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Training'), ['controller' => 'Trainings', 'action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Users'), ['controller' => 'Users', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New User'), ['controller' => 'Users', 'action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Evidences'), ['controller' => 'Evidences', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Evidence'), ['controller' => 'Evidences', 'action' => 'add']) ?></li>
    </ul>
</nav>
<div class="trainingsUsers index large-9 medium-8 columns content">
    <h3><?= __('Trainings Users') ?></h3>
    <table cellpadding="0" cellspacing="0">
        <thead>
            <tr>
                <th scope="col"><?= $this->Paginator->sort('id') ?></th>
                <th scope="col"><?= $this->Paginator->sort('training_id') ?></th>
                <th scope="col"><?= $this->Paginator->sort('user_id') ?></th>
                <th scope="col"><?= $this->Paginator->sort('evidence_id') ?></th>
                <th scope="col"><?= $this->Paginator->sort('created') ?></th>
                <th scope="col"><?= $this->Paginator->sort('modified') ?></th>
                <th scope="col"><?= $this->Paginator->sort('active') ?></th>
                <th scope="col" class="actions"><?= __('Actions') ?></th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($trainingsUsers as $trainingsUser): ?>
            <tr>
                <td><?= $this->Number->format($trainingsUser->id) ?></td>
                <td><?= $trainingsUser->has('training') ? $this->Html->link($trainingsUser->training->name, ['controller' => 'Trainings', 'action' => 'view', $trainingsUser->training->id]) : '' ?></td>
                <td><?= $trainingsUser->has('user') ? $this->Html->link($trainingsUser->user->name, ['controller' => 'Users', 'action' => 'view', $trainingsUser->user->id]) : '' ?></td>
                <td><?= $trainingsUser->has('evidence') ? $this->Html->link($trainingsUser->evidence->name, ['controller' => 'Evidences', 'action' => 'view', $trainingsUser->evidence->id]) : '' ?></td>
                <td><?= h($trainingsUser->created) ?></td>
                <td><?= h($trainingsUser->modified) ?></td>
                <td><?= h($trainingsUser->active) ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['action' => 'view', $trainingsUser->id]) ?>
                    <?= $this->Html->link(__('Edit'), ['action' => 'edit', $trainingsUser->id]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $trainingsUser->id], ['confirm' => __('Are you sure you want to delete # {0}?', $trainingsUser->id)]) ?>
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
