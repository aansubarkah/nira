<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Form->postLink(
                __('Delete'),
                ['action' => 'delete', $companiesEmail->id],
                ['confirm' => __('Are you sure you want to delete # {0}?', $companiesEmail->id)]
            )
        ?></li>
        <li><?= $this->Html->link(__('List Companies Emails'), ['action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('List Companies'), ['controller' => 'Companies', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Company'), ['controller' => 'Companies', 'action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Emails'), ['controller' => 'Emails', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Email'), ['controller' => 'Emails', 'action' => 'add']) ?></li>
    </ul>
</nav>
<div class="companiesEmails form large-9 medium-8 columns content">
    <?= $this->Form->create($companiesEmail) ?>
    <fieldset>
        <legend><?= __('Edit Companies Email') ?></legend>
        <?php
            echo $this->Form->input('company_id', ['options' => $companies]);
            echo $this->Form->input('email_id', ['options' => $emails]);
            echo $this->Form->input('active');
        ?>
    </fieldset>
    <?= $this->Form->button(__('Submit')) ?>
    <?= $this->Form->end() ?>
</div>
