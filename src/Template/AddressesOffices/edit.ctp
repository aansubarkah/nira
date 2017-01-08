<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Form->postLink(
                __('Delete'),
                ['action' => 'delete', $addressesOffice->id],
                ['confirm' => __('Are you sure you want to delete # {0}?', $addressesOffice->id)]
            )
        ?></li>
        <li><?= $this->Html->link(__('List Addresses Offices'), ['action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('List Addresses'), ['controller' => 'Addresses', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Address'), ['controller' => 'Addresses', 'action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Offices'), ['controller' => 'Offices', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Office'), ['controller' => 'Offices', 'action' => 'add']) ?></li>
    </ul>
</nav>
<div class="addressesOffices form large-9 medium-8 columns content">
    <?= $this->Form->create($addressesOffice) ?>
    <fieldset>
        <legend><?= __('Edit Addresses Office') ?></legend>
        <?php
            echo $this->Form->input('address_id', ['options' => $addresses]);
            echo $this->Form->input('office_id', ['options' => $offices]);
            echo $this->Form->input('started', ['empty' => true]);
            echo $this->Form->input('ended', ['empty' => true]);
            echo $this->Form->input('active');
        ?>
    </fieldset>
    <?= $this->Form->button(__('Submit')) ?>
    <?= $this->Form->end() ?>
</div>
