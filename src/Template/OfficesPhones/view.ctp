<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('Edit Offices Phone'), ['action' => 'edit', $officesPhone->id]) ?> </li>
        <li><?= $this->Form->postLink(__('Delete Offices Phone'), ['action' => 'delete', $officesPhone->id], ['confirm' => __('Are you sure you want to delete # {0}?', $officesPhone->id)]) ?> </li>
        <li><?= $this->Html->link(__('List Offices Phones'), ['action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Offices Phone'), ['action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Offices'), ['controller' => 'Offices', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Office'), ['controller' => 'Offices', 'action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Phones'), ['controller' => 'Phones', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Phone'), ['controller' => 'Phones', 'action' => 'add']) ?> </li>
    </ul>
</nav>
<div class="officesPhones view large-9 medium-8 columns content">
    <h3><?= h($officesPhone->id) ?></h3>
    <table class="vertical-table">
        <tr>
            <th scope="row"><?= __('Office') ?></th>
            <td><?= $officesPhone->has('office') ? $this->Html->link($officesPhone->office->name, ['controller' => 'Offices', 'action' => 'view', $officesPhone->office->id]) : '' ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Phone') ?></th>
            <td><?= $officesPhone->has('phone') ? $this->Html->link($officesPhone->phone->name, ['controller' => 'Phones', 'action' => 'view', $officesPhone->phone->id]) : '' ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Id') ?></th>
            <td><?= $this->Number->format($officesPhone->id) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Created') ?></th>
            <td><?= h($officesPhone->created) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Modified') ?></th>
            <td><?= h($officesPhone->modified) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Active') ?></th>
            <td><?= $officesPhone->active ? __('Yes') : __('No'); ?></td>
        </tr>
    </table>
</div>
