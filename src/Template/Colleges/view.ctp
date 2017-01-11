<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('Edit College'), ['action' => 'edit', $college->id]) ?> </li>
        <li><?= $this->Form->postLink(__('Delete College'), ['action' => 'delete', $college->id], ['confirm' => __('Are you sure you want to delete # {0}?', $college->id)]) ?> </li>
        <li><?= $this->Html->link(__('List Colleges'), ['action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New College'), ['action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Educations'), ['controller' => 'Educations', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Education'), ['controller' => 'Educations', 'action' => 'add']) ?> </li>
    </ul>
</nav>
<div class="colleges view large-9 medium-8 columns content">
    <h3><?= h($college->name) ?></h3>
    <table class="vertical-table">
        <tr>
            <th scope="row"><?= __('Name') ?></th>
            <td><?= h($college->name) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Id') ?></th>
            <td><?= $this->Number->format($college->id) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Active') ?></th>
            <td><?= $college->active ? __('Yes') : __('No'); ?></td>
        </tr>
    </table>
    <div class="related">
        <h4><?= __('Related Educations') ?></h4>
        <?php if (!empty($college->educations)): ?>
        <table cellpadding="0" cellspacing="0">
            <tr>
                <th scope="col"><?= __('Id') ?></th>
                <th scope="col"><?= __('College Id') ?></th>
                <th scope="col"><?= __('Level Id') ?></th>
                <th scope="col"><?= __('Name') ?></th>
                <th scope="col"><?= __('Periods') ?></th>
                <th scope="col"><?= __('Created') ?></th>
                <th scope="col"><?= __('Modified') ?></th>
                <th scope="col"><?= __('Active') ?></th>
                <th scope="col" class="actions"><?= __('Actions') ?></th>
            </tr>
            <?php foreach ($college->educations as $educations): ?>
            <tr>
                <td><?= h($educations->id) ?></td>
                <td><?= h($educations->college_id) ?></td>
                <td><?= h($educations->level_id) ?></td>
                <td><?= h($educations->name) ?></td>
                <td><?= h($educations->periods) ?></td>
                <td><?= h($educations->created) ?></td>
                <td><?= h($educations->modified) ?></td>
                <td><?= h($educations->active) ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['controller' => 'Educations', 'action' => 'view', $educations->id]) ?>
                    <?= $this->Html->link(__('Edit'), ['controller' => 'Educations', 'action' => 'edit', $educations->id]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['controller' => 'Educations', 'action' => 'delete', $educations->id], ['confirm' => __('Are you sure you want to delete # {0}?', $educations->id)]) ?>
                </td>
            </tr>
            <?php endforeach; ?>
        </table>
        <?php endif; ?>
    </div>
</div>
