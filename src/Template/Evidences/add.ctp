<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('List Evidences'), ['action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('List Certificates Users'), ['controller' => 'CertificatesUsers', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Certificates User'), ['controller' => 'CertificatesUsers', 'action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Educations Users'), ['controller' => 'EducationsUsers', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Educations User'), ['controller' => 'EducationsUsers', 'action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Trainings Users'), ['controller' => 'TrainingsUsers', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Trainings User'), ['controller' => 'TrainingsUsers', 'action' => 'add']) ?></li>
    </ul>
</nav>
<div class="evidences form large-9 medium-8 columns content">
    <?= $this->Form->create($evidence) ?>
    <fieldset>
        <legend><?= __('Add Evidence') ?></legend>
        <?php
            echo $this->Form->input('name');
            echo $this->Form->input('filetype');
            echo $this->Form->input('active');
        ?>
    </fieldset>
    <?= $this->Form->button(__('Submit')) ?>
    <?= $this->Form->end() ?>
</div>
