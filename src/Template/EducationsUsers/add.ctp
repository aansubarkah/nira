<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('List Educations Users'), ['action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('List Educations'), ['controller' => 'Educations', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Education'), ['controller' => 'Educations', 'action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Users'), ['controller' => 'Users', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New User'), ['controller' => 'Users', 'action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Evidences'), ['controller' => 'Evidences', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Evidence'), ['controller' => 'Evidences', 'action' => 'add']) ?></li>
    </ul>
</nav>
<div class="educationsUsers form large-9 medium-8 columns content">
    <?= $this->Form->create($educationsUser) ?>
    <fieldset>
        <legend><?= __('Add Educations User') ?></legend>
        <?php
            echo $this->Form->input('education_id', ['options' => $educations]);
            echo $this->Form->input('user_id', ['options' => $users]);
            echo $this->Form->input('evidence_id', ['options' => $evidences]);
            echo $this->Form->input('held', ['empty' => true]);
            echo $this->Form->input('started', ['empty' => true]);
            echo $this->Form->input('ended', ['empty' => true]);
            echo $this->Form->input('active');
        ?>
    </fieldset>
    <?= $this->Form->button(__('Submit')) ?>
    <?= $this->Form->end() ?>
</div>
