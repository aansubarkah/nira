<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Form->postLink(
                __('Delete'),
                ['action' => 'delete', $officesUser->id],
                ['confirm' => __('Are you sure you want to delete # {0}?', $officesUser->id)]
            )
        ?></li>
        <li><?= $this->Html->link(__('List Offices Users'), ['action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('List Offices'), ['controller' => 'Offices', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Office'), ['controller' => 'Offices', 'action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Users'), ['controller' => 'Users', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New User'), ['controller' => 'Users', 'action' => 'add']) ?></li>
    </ul>
</nav>
<div class="officesUsers form large-9 medium-8 columns content">
    <?= $this->Form->create($officesUser) ?>
    <fieldset>
        <legend><?= __('Edit Offices User') ?></legend>
        <?php
            echo $this->Form->input('office_id', ['options' => $offices]);
            echo $this->Form->input('user_id', ['options' => $users]);
            echo $this->Form->input('started', ['empty' => true]);
            echo $this->Form->input('ended', ['empty' => true]);
            echo $this->Form->input('active');
        ?>
    </fieldset>
    <?= $this->Form->button(__('Submit')) ?>
    <?= $this->Form->end() ?>
</div>
