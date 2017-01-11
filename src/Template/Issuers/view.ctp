<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('Edit Issuer'), ['action' => 'edit', $issuer->id]) ?> </li>
        <li><?= $this->Form->postLink(__('Delete Issuer'), ['action' => 'delete', $issuer->id], ['confirm' => __('Are you sure you want to delete # {0}?', $issuer->id)]) ?> </li>
        <li><?= $this->Html->link(__('List Issuers'), ['action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Issuer'), ['action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Certificates'), ['controller' => 'Certificates', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Certificate'), ['controller' => 'Certificates', 'action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Trainings'), ['controller' => 'Trainings', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Training'), ['controller' => 'Trainings', 'action' => 'add']) ?> </li>
    </ul>
</nav>
<div class="issuers view large-9 medium-8 columns content">
    <h3><?= h($issuer->name) ?></h3>
    <table class="vertical-table">
        <tr>
            <th scope="row"><?= __('Name') ?></th>
            <td><?= h($issuer->name) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Id') ?></th>
            <td><?= $this->Number->format($issuer->id) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Active') ?></th>
            <td><?= $issuer->active ? __('Yes') : __('No'); ?></td>
        </tr>
    </table>
    <div class="related">
        <h4><?= __('Related Certificates') ?></h4>
        <?php if (!empty($issuer->certificates)): ?>
        <table cellpadding="0" cellspacing="0">
            <tr>
                <th scope="col"><?= __('Id') ?></th>
                <th scope="col"><?= __('Issuer Id') ?></th>
                <th scope="col"><?= __('Name') ?></th>
                <th scope="col"><?= __('Description') ?></th>
                <th scope="col"><?= __('Created') ?></th>
                <th scope="col"><?= __('Modified') ?></th>
                <th scope="col"><?= __('Active') ?></th>
                <th scope="col" class="actions"><?= __('Actions') ?></th>
            </tr>
            <?php foreach ($issuer->certificates as $certificates): ?>
            <tr>
                <td><?= h($certificates->id) ?></td>
                <td><?= h($certificates->issuer_id) ?></td>
                <td><?= h($certificates->name) ?></td>
                <td><?= h($certificates->description) ?></td>
                <td><?= h($certificates->created) ?></td>
                <td><?= h($certificates->modified) ?></td>
                <td><?= h($certificates->active) ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['controller' => 'Certificates', 'action' => 'view', $certificates->id]) ?>
                    <?= $this->Html->link(__('Edit'), ['controller' => 'Certificates', 'action' => 'edit', $certificates->id]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['controller' => 'Certificates', 'action' => 'delete', $certificates->id], ['confirm' => __('Are you sure you want to delete # {0}?', $certificates->id)]) ?>
                </td>
            </tr>
            <?php endforeach; ?>
        </table>
        <?php endif; ?>
    </div>
    <div class="related">
        <h4><?= __('Related Trainings') ?></h4>
        <?php if (!empty($issuer->trainings)): ?>
        <table cellpadding="0" cellspacing="0">
            <tr>
                <th scope="col"><?= __('Id') ?></th>
                <th scope="col"><?= __('Issuer Id') ?></th>
                <th scope="col"><?= __('Name') ?></th>
                <th scope="col"><?= __('Description') ?></th>
                <th scope="col"><?= __('Started') ?></th>
                <th scope="col"><?= __('Ended') ?></th>
                <th scope="col"><?= __('Created') ?></th>
                <th scope="col"><?= __('Modified') ?></th>
                <th scope="col"><?= __('Held') ?></th>
                <th scope="col"><?= __('Active') ?></th>
                <th scope="col" class="actions"><?= __('Actions') ?></th>
            </tr>
            <?php foreach ($issuer->trainings as $trainings): ?>
            <tr>
                <td><?= h($trainings->id) ?></td>
                <td><?= h($trainings->issuer_id) ?></td>
                <td><?= h($trainings->name) ?></td>
                <td><?= h($trainings->description) ?></td>
                <td><?= h($trainings->started) ?></td>
                <td><?= h($trainings->ended) ?></td>
                <td><?= h($trainings->created) ?></td>
                <td><?= h($trainings->modified) ?></td>
                <td><?= h($trainings->held) ?></td>
                <td><?= h($trainings->active) ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['controller' => 'Trainings', 'action' => 'view', $trainings->id]) ?>
                    <?= $this->Html->link(__('Edit'), ['controller' => 'Trainings', 'action' => 'edit', $trainings->id]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['controller' => 'Trainings', 'action' => 'delete', $trainings->id], ['confirm' => __('Are you sure you want to delete # {0}?', $trainings->id)]) ?>
                </td>
            </tr>
            <?php endforeach; ?>
        </table>
        <?php endif; ?>
    </div>
</div>
