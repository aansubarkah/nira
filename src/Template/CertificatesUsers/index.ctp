<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('New Certificates User'), ['action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Certificates'), ['controller' => 'Certificates', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Certificate'), ['controller' => 'Certificates', 'action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Users'), ['controller' => 'Users', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New User'), ['controller' => 'Users', 'action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Evidences'), ['controller' => 'Evidences', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Evidence'), ['controller' => 'Evidences', 'action' => 'add']) ?></li>
    </ul>
</nav>
<div class="certificatesUsers index large-9 medium-8 columns content">
    <h3><?= __('Certificates Users') ?></h3>
    <table cellpadding="0" cellspacing="0">
        <thead>
            <tr>
                <th scope="col"><?= $this->Paginator->sort('id') ?></th>
                <th scope="col"><?= $this->Paginator->sort('certificate_id') ?></th>
                <th scope="col"><?= $this->Paginator->sort('user_id') ?></th>
                <th scope="col"><?= $this->Paginator->sort('evidence_id') ?></th>
                <th scope="col"><?= $this->Paginator->sort('held') ?></th>
                <th scope="col"><?= $this->Paginator->sort('created') ?></th>
                <th scope="col"><?= $this->Paginator->sort('modified') ?></th>
                <th scope="col"><?= $this->Paginator->sort('active') ?></th>
                <th scope="col" class="actions"><?= __('Actions') ?></th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($certificatesUsers as $certificatesUser): ?>
            <tr>
                <td><?= $this->Number->format($certificatesUser->id) ?></td>
                <td><?= $certificatesUser->has('certificate') ? $this->Html->link($certificatesUser->certificate->name, ['controller' => 'Certificates', 'action' => 'view', $certificatesUser->certificate->id]) : '' ?></td>
                <td><?= $certificatesUser->has('user') ? $this->Html->link($certificatesUser->user->name, ['controller' => 'Users', 'action' => 'view', $certificatesUser->user->id]) : '' ?></td>
                <td><?= $certificatesUser->has('evidence') ? $this->Html->link($certificatesUser->evidence->name, ['controller' => 'Evidences', 'action' => 'view', $certificatesUser->evidence->id]) : '' ?></td>
                <td><?= h($certificatesUser->held) ?></td>
                <td><?= h($certificatesUser->created) ?></td>
                <td><?= h($certificatesUser->modified) ?></td>
                <td><?= h($certificatesUser->active) ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['action' => 'view', $certificatesUser->id]) ?>
                    <?= $this->Html->link(__('Edit'), ['action' => 'edit', $certificatesUser->id]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $certificatesUser->id], ['confirm' => __('Are you sure you want to delete # {0}?', $certificatesUser->id)]) ?>
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
