<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Form->postLink(
                __('Delete'),
                ['action' => 'delete', $emailsUser->id],
                ['confirm' => __('Are you sure you want to delete # {0}?', $emailsUser->id)]
            )
        ?></li>
        <li><?= $this->Html->link(__('List Emails Users'), ['action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('List Emails'), ['controller' => 'Emails', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Email'), ['controller' => 'Emails', 'action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Users'), ['controller' => 'Users', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New User'), ['controller' => 'Users', 'action' => 'add']) ?></li>
    </ul>
</nav>
<div class="emailsUsers form large-9 medium-8 columns content">
    <?= $this->Form->create($emailsUser) ?>
    <fieldset>
        <legend><?= __('Edit Emails User') ?></legend>
        <?php
            echo $this->Form->input('email_id', ['options' => $emails]);
            echo $this->Form->input('user_id', ['options' => $users]);
            echo $this->Form->input('active');
        ?>
    </fieldset>
    <?= $this->Form->button(__('Submit')) ?>
    <?= $this->Form->end() ?>
</div>
