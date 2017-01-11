<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('New Educations User'), ['action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Educations'), ['controller' => 'Educations', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Education'), ['controller' => 'Educations', 'action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Users'), ['controller' => 'Users', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New User'), ['controller' => 'Users', 'action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Evidences'), ['controller' => 'Evidences', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Evidence'), ['controller' => 'Evidences', 'action' => 'add']) ?></li>
    </ul>
</nav>
<div class="educationsUsers index large-9 medium-8 columns content">
    <h3><?= __('Educations Users') ?></h3>
    <table cellpadding="0" cellspacing="0">
        <thead>
            <tr>
                <th scope="col"><?= $this->Paginator->sort('id') ?></th>
                <th scope="col"><?= $this->Paginator->sort('education_id') ?></th>
                <th scope="col"><?= $this->Paginator->sort('user_id') ?></th>
                <th scope="col"><?= $this->Paginator->sort('evidence_id') ?></th>
                <th scope="col"><?= $this->Paginator->sort('held') ?></th>
                <th scope="col"><?= $this->Paginator->sort('started') ?></th>
                <th scope="col"><?= $this->Paginator->sort('ended') ?></th>
                <th scope="col"><?= $this->Paginator->sort('created') ?></th>
                <th scope="col"><?= $this->Paginator->sort('modified') ?></th>
                <th scope="col"><?= $this->Paginator->sort('active') ?></th>
                <th scope="col" class="actions"><?= __('Actions') ?></th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($educationsUsers as $educationsUser): ?>
            <tr>
                <td><?= $this->Number->format($educationsUser->id) ?></td>
                <td><?= $educationsUser->has('education') ? $this->Html->link($educationsUser->education->name, ['controller' => 'Educations', 'action' => 'view', $educationsUser->education->id]) : '' ?></td>
                <td><?= $educationsUser->has('user') ? $this->Html->link($educationsUser->user->name, ['controller' => 'Users', 'action' => 'view', $educationsUser->user->id]) : '' ?></td>
                <td><?= $educationsUser->has('evidence') ? $this->Html->link($educationsUser->evidence->name, ['controller' => 'Evidences', 'action' => 'view', $educationsUser->evidence->id]) : '' ?></td>
                <td><?= h($educationsUser->held) ?></td>
                <td><?= h($educationsUser->started) ?></td>
                <td><?= h($educationsUser->ended) ?></td>
                <td><?= h($educationsUser->created) ?></td>
                <td><?= h($educationsUser->modified) ?></td>
                <td><?= h($educationsUser->active) ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['action' => 'view', $educationsUser->id]) ?>
                    <?= $this->Html->link(__('Edit'), ['action' => 'edit', $educationsUser->id]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $educationsUser->id], ['confirm' => __('Are you sure you want to delete # {0}?', $educationsUser->id)]) ?>
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
