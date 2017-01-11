<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('List Users'), ['action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('List Roles'), ['controller' => 'Roles', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Role'), ['controller' => 'Roles', 'action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Addresses'), ['controller' => 'Addresses', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Address'), ['controller' => 'Addresses', 'action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Certificates'), ['controller' => 'Certificates', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Certificate'), ['controller' => 'Certificates', 'action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Companies'), ['controller' => 'Companies', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Company'), ['controller' => 'Companies', 'action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Educations'), ['controller' => 'Educations', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Education'), ['controller' => 'Educations', 'action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Emails'), ['controller' => 'Emails', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Email'), ['controller' => 'Emails', 'action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Offices'), ['controller' => 'Offices', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Office'), ['controller' => 'Offices', 'action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Phones'), ['controller' => 'Phones', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Phone'), ['controller' => 'Phones', 'action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Trainings'), ['controller' => 'Trainings', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Training'), ['controller' => 'Trainings', 'action' => 'add']) ?></li>
    </ul>
</nav>
<div class="users form large-9 medium-8 columns content">
    <?= $this->Form->create($user) ?>
    <fieldset>
        <legend><?= __('Add User') ?></legend>
        <?php
            echo $this->Form->input('username');
            echo $this->Form->input('password');
            echo $this->Form->input('name');
            echo $this->Form->input('fullname');
            echo $this->Form->input('nira');
            echo $this->Form->input('nik');
            echo $this->Form->input('localnumber');
            echo $this->Form->input('role_id', ['options' => $roles]);
            echo $this->Form->input('verified');
            echo $this->Form->input('marital');
            echo $this->Form->input('birthday');
            echo $this->Form->input('birthplace');
            echo $this->Form->input('sex');
            echo $this->Form->input('active');
            echo $this->Form->input('addresses._ids', ['options' => $addresses]);
            echo $this->Form->input('certificates._ids', ['options' => $certificates]);
            echo $this->Form->input('companies._ids', ['options' => $companies]);
            echo $this->Form->input('educations._ids', ['options' => $educations]);
            echo $this->Form->input('emails._ids', ['options' => $emails]);
            echo $this->Form->input('offices._ids', ['options' => $offices]);
            echo $this->Form->input('phones._ids', ['options' => $phones]);
            echo $this->Form->input('trainings._ids', ['options' => $trainings]);
        ?>
    </fieldset>
    <?= $this->Form->button(__('Submit')) ?>
    <?= $this->Form->end() ?>
</div>
