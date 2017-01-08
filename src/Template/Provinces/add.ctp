<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('List Provinces'), ['action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('List Regencies'), ['controller' => 'Regencies', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Regency'), ['controller' => 'Regencies', 'action' => 'add']) ?></li>
    </ul>
</nav>
<div class="provinces form large-9 medium-8 columns content">
    <?= $this->Form->create($province) ?>
    <fieldset>
        <legend><?= __('Add Province') ?></legend>
        <?php
            echo $this->Form->input('name');
            echo $this->Form->input('active');
        ?>
    </fieldset>
    <?= $this->Form->button(__('Submit')) ?>
    <?= $this->Form->end() ?>
</div>
