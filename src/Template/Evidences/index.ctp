<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('New Evidence'), ['action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Certificates Users'), ['controller' => 'CertificatesUsers', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Certificates User'), ['controller' => 'CertificatesUsers', 'action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Educations Users'), ['controller' => 'EducationsUsers', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Educations User'), ['controller' => 'EducationsUsers', 'action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Trainings Users'), ['controller' => 'TrainingsUsers', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Trainings User'), ['controller' => 'TrainingsUsers', 'action' => 'add']) ?></li>
    </ul>
</nav>
<div class="evidences index large-9 medium-8 columns content">
    <h3><?= __('Evidences') ?></h3>
    <table cellpadding="0" cellspacing="0">
        <thead>
            <tr>
                <th scope="col"><?= $this->Paginator->sort('id') ?></th>
                <th scope="col"><?= $this->Paginator->sort('name') ?></th>
                <th scope="col"><?= $this->Paginator->sort('filetype') ?></th>
                <th scope="col"><?= $this->Paginator->sort('created') ?></th>
                <th scope="col"><?= $this->Paginator->sort('modified') ?></th>
                <th scope="col"><?= $this->Paginator->sort('active') ?></th>
                <th scope="col" class="actions"><?= __('Actions') ?></th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($evidences as $evidence): ?>
            <tr>
                <td><?= $this->Number->format($evidence->id) ?></td>
                <td><?= h($evidence->name) ?></td>
                <td><?= h($evidence->filetype) ?></td>
                <td><?= h($evidence->created) ?></td>
                <td><?= h($evidence->modified) ?></td>
                <td><?= h($evidence->active) ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['action' => 'view', $evidence->id]) ?>
                    <?= $this->Html->link(__('Edit'), ['action' => 'edit', $evidence->id]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $evidence->id], ['confirm' => __('Are you sure you want to delete # {0}?', $evidence->id)]) ?>
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
