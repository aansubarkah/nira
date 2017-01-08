<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('List Educations'), ['action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('List Colleges'), ['controller' => 'Colleges', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New College'), ['controller' => 'Colleges', 'action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Levels'), ['controller' => 'Levels', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Level'), ['controller' => 'Levels', 'action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Users'), ['controller' => 'Users', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New User'), ['controller' => 'Users', 'action' => 'add']) ?></li>
    </ul>
</nav>
<div class="educations form large-9 medium-8 columns content">
    <?= $this->Form->create($education) ?>
    <fieldset>
        <legend><?= __('Add Education') ?></legend>
        <?php
            echo $this->Form->input('college_id', ['options' => $colleges]);
            echo $this->Form->input('level_id', ['options' => $levels]);
            echo $this->Form->input('name');
            echo $this->Form->input('periods');
            echo $this->Form->input('active');
            echo $this->Form->input('users._ids', ['options' => $users]);
        ?>
    </fieldset>
    <?= $this->Form->button(__('Submit')) ?>
    <?= $this->Form->end() ?>
</div>
