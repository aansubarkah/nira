<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Form->postLink(
                __('Delete'),
                ['action' => 'delete', $phonesUser->id],
                ['confirm' => __('Are you sure you want to delete # {0}?', $phonesUser->id)]
            )
        ?></li>
        <li><?= $this->Html->link(__('List Phones Users'), ['action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('List Phones'), ['controller' => 'Phones', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Phone'), ['controller' => 'Phones', 'action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Users'), ['controller' => 'Users', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New User'), ['controller' => 'Users', 'action' => 'add']) ?></li>
    </ul>
</nav>
<div class="phonesUsers form large-9 medium-8 columns content">
    <?= $this->Form->create($phonesUser) ?>
    <fieldset>
        <legend><?= __('Edit Phones User') ?></legend>
        <?php
            echo $this->Form->input('phone_id', ['options' => $phones]);
            echo $this->Form->input('user_id', ['options' => $users]);
            echo $this->Form->input('active');
        ?>
    </fieldset>
    <?= $this->Form->button(__('Submit')) ?>
    <?= $this->Form->end() ?>
</div>
