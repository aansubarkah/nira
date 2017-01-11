<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('List Issuers'), ['action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('List Certificates'), ['controller' => 'Certificates', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Certificate'), ['controller' => 'Certificates', 'action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Trainings'), ['controller' => 'Trainings', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Training'), ['controller' => 'Trainings', 'action' => 'add']) ?></li>
    </ul>
</nav>
<div class="issuers form large-9 medium-8 columns content">
    <?= $this->Form->create($issuer) ?>
    <fieldset>
        <legend><?= __('Add Issuer') ?></legend>
        <?php
            echo $this->Form->input('name');
            echo $this->Form->input('active');
        ?>
    </fieldset>
    <?= $this->Form->button(__('Submit')) ?>
    <?= $this->Form->end() ?>
</div>
