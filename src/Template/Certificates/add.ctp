<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('List Certificates'), ['action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('List Issuers'), ['controller' => 'Issuers', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Issuer'), ['controller' => 'Issuers', 'action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Users'), ['controller' => 'Users', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New User'), ['controller' => 'Users', 'action' => 'add']) ?></li>
    </ul>
</nav>
<div class="certificates form large-9 medium-8 columns content">
    <?= $this->Form->create($certificate) ?>
    <fieldset>
        <legend><?= __('Add Certificate') ?></legend>
        <?php
            echo $this->Form->input('issuer_id', ['options' => $issuers]);
            echo $this->Form->input('name');
            echo $this->Form->input('description');
            echo $this->Form->input('active');
            echo $this->Form->input('users._ids', ['options' => $users]);
        ?>
    </fieldset>
    <?= $this->Form->button(__('Submit')) ?>
    <?= $this->Form->end() ?>
</div>
