<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('Edit Companies Phone'), ['action' => 'edit', $companiesPhone->id]) ?> </li>
        <li><?= $this->Form->postLink(__('Delete Companies Phone'), ['action' => 'delete', $companiesPhone->id], ['confirm' => __('Are you sure you want to delete # {0}?', $companiesPhone->id)]) ?> </li>
        <li><?= $this->Html->link(__('List Companies Phones'), ['action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Companies Phone'), ['action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Companies'), ['controller' => 'Companies', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Company'), ['controller' => 'Companies', 'action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Phones'), ['controller' => 'Phones', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Phone'), ['controller' => 'Phones', 'action' => 'add']) ?> </li>
    </ul>
</nav>
<div class="companiesPhones view large-9 medium-8 columns content">
    <h3><?= h($companiesPhone->id) ?></h3>
    <table class="vertical-table">
        <tr>
            <th scope="row"><?= __('Company') ?></th>
            <td><?= $companiesPhone->has('company') ? $this->Html->link($companiesPhone->company->name, ['controller' => 'Companies', 'action' => 'view', $companiesPhone->company->id]) : '' ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Phone') ?></th>
            <td><?= $companiesPhone->has('phone') ? $this->Html->link($companiesPhone->phone->name, ['controller' => 'Phones', 'action' => 'view', $companiesPhone->phone->id]) : '' ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Id') ?></th>
            <td><?= $this->Number->format($companiesPhone->id) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Created') ?></th>
            <td><?= h($companiesPhone->created) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Modified') ?></th>
            <td><?= h($companiesPhone->modified) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Active') ?></th>
            <td><?= $companiesPhone->active ? __('Yes') : __('No'); ?></td>
        </tr>
    </table>
</div>
