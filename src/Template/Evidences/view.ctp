<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('Edit Evidence'), ['action' => 'edit', $evidence->id]) ?> </li>
        <li><?= $this->Form->postLink(__('Delete Evidence'), ['action' => 'delete', $evidence->id], ['confirm' => __('Are you sure you want to delete # {0}?', $evidence->id)]) ?> </li>
        <li><?= $this->Html->link(__('List Evidences'), ['action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Evidence'), ['action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Certificates Users'), ['controller' => 'CertificatesUsers', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Certificates User'), ['controller' => 'CertificatesUsers', 'action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Educations Users'), ['controller' => 'EducationsUsers', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Educations User'), ['controller' => 'EducationsUsers', 'action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Trainings Users'), ['controller' => 'TrainingsUsers', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Trainings User'), ['controller' => 'TrainingsUsers', 'action' => 'add']) ?> </li>
    </ul>
</nav>
<div class="evidences view large-9 medium-8 columns content">
    <h3><?= h($evidence->name) ?></h3>
    <table class="vertical-table">
        <tr>
            <th scope="row"><?= __('Name') ?></th>
            <td><?= h($evidence->name) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Filetype') ?></th>
            <td><?= h($evidence->filetype) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Id') ?></th>
            <td><?= $this->Number->format($evidence->id) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Created') ?></th>
            <td><?= h($evidence->created) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Modified') ?></th>
            <td><?= h($evidence->modified) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Active') ?></th>
            <td><?= $evidence->active ? __('Yes') : __('No'); ?></td>
        </tr>
    </table>
    <div class="related">
        <h4><?= __('Related Certificates Users') ?></h4>
        <?php if (!empty($evidence->certificates_users)): ?>
        <table cellpadding="0" cellspacing="0">
            <tr>
                <th scope="col"><?= __('Id') ?></th>
                <th scope="col"><?= __('Certificate Id') ?></th>
                <th scope="col"><?= __('User Id') ?></th>
                <th scope="col"><?= __('Evidence Id') ?></th>
                <th scope="col"><?= __('Held') ?></th>
                <th scope="col"><?= __('Created') ?></th>
                <th scope="col"><?= __('Modified') ?></th>
                <th scope="col"><?= __('Active') ?></th>
                <th scope="col" class="actions"><?= __('Actions') ?></th>
            </tr>
            <?php foreach ($evidence->certificates_users as $certificatesUsers): ?>
            <tr>
                <td><?= h($certificatesUsers->id) ?></td>
                <td><?= h($certificatesUsers->certificate_id) ?></td>
                <td><?= h($certificatesUsers->user_id) ?></td>
                <td><?= h($certificatesUsers->evidence_id) ?></td>
                <td><?= h($certificatesUsers->held) ?></td>
                <td><?= h($certificatesUsers->created) ?></td>
                <td><?= h($certificatesUsers->modified) ?></td>
                <td><?= h($certificatesUsers->active) ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['controller' => 'CertificatesUsers', 'action' => 'view', $certificatesUsers->id]) ?>
                    <?= $this->Html->link(__('Edit'), ['controller' => 'CertificatesUsers', 'action' => 'edit', $certificatesUsers->id]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['controller' => 'CertificatesUsers', 'action' => 'delete', $certificatesUsers->id], ['confirm' => __('Are you sure you want to delete # {0}?', $certificatesUsers->id)]) ?>
                </td>
            </tr>
            <?php endforeach; ?>
        </table>
        <?php endif; ?>
    </div>
    <div class="related">
        <h4><?= __('Related Educations Users') ?></h4>
        <?php if (!empty($evidence->educations_users)): ?>
        <table cellpadding="0" cellspacing="0">
            <tr>
                <th scope="col"><?= __('Id') ?></th>
                <th scope="col"><?= __('Education Id') ?></th>
                <th scope="col"><?= __('User Id') ?></th>
                <th scope="col"><?= __('Evidence Id') ?></th>
                <th scope="col"><?= __('Held') ?></th>
                <th scope="col"><?= __('Started') ?></th>
                <th scope="col"><?= __('Ended') ?></th>
                <th scope="col"><?= __('Created') ?></th>
                <th scope="col"><?= __('Modified') ?></th>
                <th scope="col"><?= __('Active') ?></th>
                <th scope="col" class="actions"><?= __('Actions') ?></th>
            </tr>
            <?php foreach ($evidence->educations_users as $educationsUsers): ?>
            <tr>
                <td><?= h($educationsUsers->id) ?></td>
                <td><?= h($educationsUsers->education_id) ?></td>
                <td><?= h($educationsUsers->user_id) ?></td>
                <td><?= h($educationsUsers->evidence_id) ?></td>
                <td><?= h($educationsUsers->held) ?></td>
                <td><?= h($educationsUsers->started) ?></td>
                <td><?= h($educationsUsers->ended) ?></td>
                <td><?= h($educationsUsers->created) ?></td>
                <td><?= h($educationsUsers->modified) ?></td>
                <td><?= h($educationsUsers->active) ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['controller' => 'EducationsUsers', 'action' => 'view', $educationsUsers->id]) ?>
                    <?= $this->Html->link(__('Edit'), ['controller' => 'EducationsUsers', 'action' => 'edit', $educationsUsers->id]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['controller' => 'EducationsUsers', 'action' => 'delete', $educationsUsers->id], ['confirm' => __('Are you sure you want to delete # {0}?', $educationsUsers->id)]) ?>
                </td>
            </tr>
            <?php endforeach; ?>
        </table>
        <?php endif; ?>
    </div>
    <div class="related">
        <h4><?= __('Related Trainings Users') ?></h4>
        <?php if (!empty($evidence->trainings_users)): ?>
        <table cellpadding="0" cellspacing="0">
            <tr>
                <th scope="col"><?= __('Id') ?></th>
                <th scope="col"><?= __('Training Id') ?></th>
                <th scope="col"><?= __('User Id') ?></th>
                <th scope="col"><?= __('Evidence Id') ?></th>
                <th scope="col"><?= __('Created') ?></th>
                <th scope="col"><?= __('Modified') ?></th>
                <th scope="col"><?= __('Active') ?></th>
                <th scope="col" class="actions"><?= __('Actions') ?></th>
            </tr>
            <?php foreach ($evidence->trainings_users as $trainingsUsers): ?>
            <tr>
                <td><?= h($trainingsUsers->id) ?></td>
                <td><?= h($trainingsUsers->training_id) ?></td>
                <td><?= h($trainingsUsers->user_id) ?></td>
                <td><?= h($trainingsUsers->evidence_id) ?></td>
                <td><?= h($trainingsUsers->created) ?></td>
                <td><?= h($trainingsUsers->modified) ?></td>
                <td><?= h($trainingsUsers->active) ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['controller' => 'TrainingsUsers', 'action' => 'view', $trainingsUsers->id]) ?>
                    <?= $this->Html->link(__('Edit'), ['controller' => 'TrainingsUsers', 'action' => 'edit', $trainingsUsers->id]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['controller' => 'TrainingsUsers', 'action' => 'delete', $trainingsUsers->id], ['confirm' => __('Are you sure you want to delete # {0}?', $trainingsUsers->id)]) ?>
                </td>
            </tr>
            <?php endforeach; ?>
        </table>
        <?php endif; ?>
    </div>
</div>
