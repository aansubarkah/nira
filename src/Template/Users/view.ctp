<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('Edit User'), ['action' => 'edit', $user->id]) ?> </li>
        <li><?= $this->Form->postLink(__('Delete User'), ['action' => 'delete', $user->id], ['confirm' => __('Are you sure you want to delete # {0}?', $user->id)]) ?> </li>
        <li><?= $this->Html->link(__('List Users'), ['action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New User'), ['action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Roles'), ['controller' => 'Roles', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Role'), ['controller' => 'Roles', 'action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Addresses'), ['controller' => 'Addresses', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Address'), ['controller' => 'Addresses', 'action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Certificates'), ['controller' => 'Certificates', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Certificate'), ['controller' => 'Certificates', 'action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Companies'), ['controller' => 'Companies', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Company'), ['controller' => 'Companies', 'action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Educations'), ['controller' => 'Educations', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Education'), ['controller' => 'Educations', 'action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Emails'), ['controller' => 'Emails', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Email'), ['controller' => 'Emails', 'action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Offices'), ['controller' => 'Offices', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Office'), ['controller' => 'Offices', 'action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Phones'), ['controller' => 'Phones', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Phone'), ['controller' => 'Phones', 'action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Trainings'), ['controller' => 'Trainings', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Training'), ['controller' => 'Trainings', 'action' => 'add']) ?> </li>
    </ul>
</nav>
<div class="users view large-9 medium-8 columns content">
    <h3><?= h($user->name) ?></h3>
    <table class="vertical-table">
        <tr>
            <th scope="row"><?= __('Username') ?></th>
            <td><?= h($user->username) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Password') ?></th>
            <td><?= h($user->password) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Name') ?></th>
            <td><?= h($user->name) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Fullname') ?></th>
            <td><?= h($user->fullname) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Nira') ?></th>
            <td><?= h($user->nira) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Nik') ?></th>
            <td><?= h($user->nik) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Localnumber') ?></th>
            <td><?= h($user->localnumber) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Role') ?></th>
            <td><?= $user->has('role') ? $this->Html->link($user->role->name, ['controller' => 'Roles', 'action' => 'view', $user->role->id]) : '' ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Birthplace') ?></th>
            <td><?= h($user->birthplace) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Id') ?></th>
            <td><?= $this->Number->format($user->id) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Created') ?></th>
            <td><?= h($user->created) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Modified') ?></th>
            <td><?= h($user->modified) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Birthday') ?></th>
            <td><?= h($user->birthday) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Verified') ?></th>
            <td><?= $user->verified ? __('Yes') : __('No'); ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Marital') ?></th>
            <td><?= $user->marital ? __('Yes') : __('No'); ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Sex') ?></th>
            <td><?= $user->sex ? __('Yes') : __('No'); ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Active') ?></th>
            <td><?= $user->active ? __('Yes') : __('No'); ?></td>
        </tr>
    </table>
    <div class="related">
        <h4><?= __('Related Addresses') ?></h4>
        <?php if (!empty($user->addresses)): ?>
        <table cellpadding="0" cellspacing="0">
            <tr>
                <th scope="col"><?= __('Id') ?></th>
                <th scope="col"><?= __('Regency Id') ?></th>
                <th scope="col"><?= __('Number') ?></th>
                <th scope="col"><?= __('Street') ?></th>
                <th scope="col"><?= __('Rt') ?></th>
                <th scope="col"><?= __('Rw') ?></th>
                <th scope="col"><?= __('Village') ?></th>
                <th scope="col"><?= __('District') ?></th>
                <th scope="col"><?= __('Postal') ?></th>
                <th scope="col"><?= __('Created') ?></th>
                <th scope="col"><?= __('Modified') ?></th>
                <th scope="col"><?= __('Active') ?></th>
                <th scope="col" class="actions"><?= __('Actions') ?></th>
            </tr>
            <?php foreach ($user->addresses as $addresses): ?>
            <tr>
                <td><?= h($addresses->id) ?></td>
                <td><?= h($addresses->regency_id) ?></td>
                <td><?= h($addresses->number) ?></td>
                <td><?= h($addresses->street) ?></td>
                <td><?= h($addresses->rt) ?></td>
                <td><?= h($addresses->rw) ?></td>
                <td><?= h($addresses->village) ?></td>
                <td><?= h($addresses->district) ?></td>
                <td><?= h($addresses->postal) ?></td>
                <td><?= h($addresses->created) ?></td>
                <td><?= h($addresses->modified) ?></td>
                <td><?= h($addresses->active) ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['controller' => 'Addresses', 'action' => 'view', $addresses->id]) ?>
                    <?= $this->Html->link(__('Edit'), ['controller' => 'Addresses', 'action' => 'edit', $addresses->id]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['controller' => 'Addresses', 'action' => 'delete', $addresses->id], ['confirm' => __('Are you sure you want to delete # {0}?', $addresses->id)]) ?>
                </td>
            </tr>
            <?php endforeach; ?>
        </table>
        <?php endif; ?>
    </div>
    <div class="related">
        <h4><?= __('Related Certificates') ?></h4>
        <?php if (!empty($user->certificates)): ?>
        <table cellpadding="0" cellspacing="0">
            <tr>
                <th scope="col"><?= __('Id') ?></th>
                <th scope="col"><?= __('Issuer Id') ?></th>
                <th scope="col"><?= __('Name') ?></th>
                <th scope="col"><?= __('Description') ?></th>
                <th scope="col"><?= __('Created') ?></th>
                <th scope="col"><?= __('Modified') ?></th>
                <th scope="col"><?= __('Active') ?></th>
                <th scope="col" class="actions"><?= __('Actions') ?></th>
            </tr>
            <?php foreach ($user->certificates as $certificates): ?>
            <tr>
                <td><?= h($certificates->id) ?></td>
                <td><?= h($certificates->issuer_id) ?></td>
                <td><?= h($certificates->name) ?></td>
                <td><?= h($certificates->description) ?></td>
                <td><?= h($certificates->created) ?></td>
                <td><?= h($certificates->modified) ?></td>
                <td><?= h($certificates->active) ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['controller' => 'Certificates', 'action' => 'view', $certificates->id]) ?>
                    <?= $this->Html->link(__('Edit'), ['controller' => 'Certificates', 'action' => 'edit', $certificates->id]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['controller' => 'Certificates', 'action' => 'delete', $certificates->id], ['confirm' => __('Are you sure you want to delete # {0}?', $certificates->id)]) ?>
                </td>
            </tr>
            <?php endforeach; ?>
        </table>
        <?php endif; ?>
    </div>
    <div class="related">
        <h4><?= __('Related Companies') ?></h4>
        <?php if (!empty($user->companies)): ?>
        <table cellpadding="0" cellspacing="0">
            <tr>
                <th scope="col"><?= __('Id') ?></th>
                <th scope="col"><?= __('Category Id') ?></th>
                <th scope="col"><?= __('Name') ?></th>
                <th scope="col"><?= __('Created') ?></th>
                <th scope="col"><?= __('Modified') ?></th>
                <th scope="col"><?= __('Active') ?></th>
                <th scope="col" class="actions"><?= __('Actions') ?></th>
            </tr>
            <?php foreach ($user->companies as $companies): ?>
            <tr>
                <td><?= h($companies->id) ?></td>
                <td><?= h($companies->category_id) ?></td>
                <td><?= h($companies->name) ?></td>
                <td><?= h($companies->created) ?></td>
                <td><?= h($companies->modified) ?></td>
                <td><?= h($companies->active) ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['controller' => 'Companies', 'action' => 'view', $companies->id]) ?>
                    <?= $this->Html->link(__('Edit'), ['controller' => 'Companies', 'action' => 'edit', $companies->id]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['controller' => 'Companies', 'action' => 'delete', $companies->id], ['confirm' => __('Are you sure you want to delete # {0}?', $companies->id)]) ?>
                </td>
            </tr>
            <?php endforeach; ?>
        </table>
        <?php endif; ?>
    </div>
    <div class="related">
        <h4><?= __('Related Educations') ?></h4>
        <?php if (!empty($user->educations)): ?>
        <table cellpadding="0" cellspacing="0">
            <tr>
                <th scope="col"><?= __('Id') ?></th>
                <th scope="col"><?= __('College Id') ?></th>
                <th scope="col"><?= __('Level Id') ?></th>
                <th scope="col"><?= __('Name') ?></th>
                <th scope="col"><?= __('Periods') ?></th>
                <th scope="col"><?= __('Created') ?></th>
                <th scope="col"><?= __('Modified') ?></th>
                <th scope="col"><?= __('Active') ?></th>
                <th scope="col" class="actions"><?= __('Actions') ?></th>
            </tr>
            <?php foreach ($user->educations as $educations): ?>
            <tr>
                <td><?= h($educations->id) ?></td>
                <td><?= h($educations->college_id) ?></td>
                <td><?= h($educations->level_id) ?></td>
                <td><?= h($educations->name) ?></td>
                <td><?= h($educations->periods) ?></td>
                <td><?= h($educations->created) ?></td>
                <td><?= h($educations->modified) ?></td>
                <td><?= h($educations->active) ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['controller' => 'Educations', 'action' => 'view', $educations->id]) ?>
                    <?= $this->Html->link(__('Edit'), ['controller' => 'Educations', 'action' => 'edit', $educations->id]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['controller' => 'Educations', 'action' => 'delete', $educations->id], ['confirm' => __('Are you sure you want to delete # {0}?', $educations->id)]) ?>
                </td>
            </tr>
            <?php endforeach; ?>
        </table>
        <?php endif; ?>
    </div>
    <div class="related">
        <h4><?= __('Related Emails') ?></h4>
        <?php if (!empty($user->emails)): ?>
        <table cellpadding="0" cellspacing="0">
            <tr>
                <th scope="col"><?= __('Id') ?></th>
                <th scope="col"><?= __('Name') ?></th>
                <th scope="col"><?= __('Created') ?></th>
                <th scope="col"><?= __('Modified') ?></th>
                <th scope="col"><?= __('Active') ?></th>
                <th scope="col" class="actions"><?= __('Actions') ?></th>
            </tr>
            <?php foreach ($user->emails as $emails): ?>
            <tr>
                <td><?= h($emails->id) ?></td>
                <td><?= h($emails->name) ?></td>
                <td><?= h($emails->created) ?></td>
                <td><?= h($emails->modified) ?></td>
                <td><?= h($emails->active) ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['controller' => 'Emails', 'action' => 'view', $emails->id]) ?>
                    <?= $this->Html->link(__('Edit'), ['controller' => 'Emails', 'action' => 'edit', $emails->id]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['controller' => 'Emails', 'action' => 'delete', $emails->id], ['confirm' => __('Are you sure you want to delete # {0}?', $emails->id)]) ?>
                </td>
            </tr>
            <?php endforeach; ?>
        </table>
        <?php endif; ?>
    </div>
    <div class="related">
        <h4><?= __('Related Offices') ?></h4>
        <?php if (!empty($user->offices)): ?>
        <table cellpadding="0" cellspacing="0">
            <tr>
                <th scope="col"><?= __('Id') ?></th>
                <th scope="col"><?= __('Category Id') ?></th>
                <th scope="col"><?= __('Regency Id') ?></th>
                <th scope="col"><?= __('Name') ?></th>
                <th scope="col"><?= __('Created') ?></th>
                <th scope="col"><?= __('Modified') ?></th>
                <th scope="col"><?= __('Active') ?></th>
                <th scope="col"><?= __('Parent Id') ?></th>
                <th scope="col"><?= __('Lft') ?></th>
                <th scope="col"><?= __('Rght') ?></th>
                <th scope="col" class="actions"><?= __('Actions') ?></th>
            </tr>
            <?php foreach ($user->offices as $offices): ?>
            <tr>
                <td><?= h($offices->id) ?></td>
                <td><?= h($offices->category_id) ?></td>
                <td><?= h($offices->regency_id) ?></td>
                <td><?= h($offices->name) ?></td>
                <td><?= h($offices->created) ?></td>
                <td><?= h($offices->modified) ?></td>
                <td><?= h($offices->active) ?></td>
                <td><?= h($offices->parent_id) ?></td>
                <td><?= h($offices->lft) ?></td>
                <td><?= h($offices->rght) ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['controller' => 'Offices', 'action' => 'view', $offices->id]) ?>
                    <?= $this->Html->link(__('Edit'), ['controller' => 'Offices', 'action' => 'edit', $offices->id]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['controller' => 'Offices', 'action' => 'delete', $offices->id], ['confirm' => __('Are you sure you want to delete # {0}?', $offices->id)]) ?>
                </td>
            </tr>
            <?php endforeach; ?>
        </table>
        <?php endif; ?>
    </div>
    <div class="related">
        <h4><?= __('Related Phones') ?></h4>
        <?php if (!empty($user->phones)): ?>
        <table cellpadding="0" cellspacing="0">
            <tr>
                <th scope="col"><?= __('Id') ?></th>
                <th scope="col"><?= __('Type Id') ?></th>
                <th scope="col"><?= __('Name') ?></th>
                <th scope="col"><?= __('Created') ?></th>
                <th scope="col"><?= __('Modified') ?></th>
                <th scope="col"><?= __('Active') ?></th>
                <th scope="col" class="actions"><?= __('Actions') ?></th>
            </tr>
            <?php foreach ($user->phones as $phones): ?>
            <tr>
                <td><?= h($phones->id) ?></td>
                <td><?= h($phones->type_id) ?></td>
                <td><?= h($phones->name) ?></td>
                <td><?= h($phones->created) ?></td>
                <td><?= h($phones->modified) ?></td>
                <td><?= h($phones->active) ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['controller' => 'Phones', 'action' => 'view', $phones->id]) ?>
                    <?= $this->Html->link(__('Edit'), ['controller' => 'Phones', 'action' => 'edit', $phones->id]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['controller' => 'Phones', 'action' => 'delete', $phones->id], ['confirm' => __('Are you sure you want to delete # {0}?', $phones->id)]) ?>
                </td>
            </tr>
            <?php endforeach; ?>
        </table>
        <?php endif; ?>
    </div>
    <div class="related">
        <h4><?= __('Related Trainings') ?></h4>
        <?php if (!empty($user->trainings)): ?>
        <table cellpadding="0" cellspacing="0">
            <tr>
                <th scope="col"><?= __('Id') ?></th>
                <th scope="col"><?= __('Issuer Id') ?></th>
                <th scope="col"><?= __('Name') ?></th>
                <th scope="col"><?= __('Description') ?></th>
                <th scope="col"><?= __('Started') ?></th>
                <th scope="col"><?= __('Ended') ?></th>
                <th scope="col"><?= __('Created') ?></th>
                <th scope="col"><?= __('Modified') ?></th>
                <th scope="col"><?= __('Held') ?></th>
                <th scope="col"><?= __('Active') ?></th>
                <th scope="col" class="actions"><?= __('Actions') ?></th>
            </tr>
            <?php foreach ($user->trainings as $trainings): ?>
            <tr>
                <td><?= h($trainings->id) ?></td>
                <td><?= h($trainings->issuer_id) ?></td>
                <td><?= h($trainings->name) ?></td>
                <td><?= h($trainings->description) ?></td>
                <td><?= h($trainings->started) ?></td>
                <td><?= h($trainings->ended) ?></td>
                <td><?= h($trainings->created) ?></td>
                <td><?= h($trainings->modified) ?></td>
                <td><?= h($trainings->held) ?></td>
                <td><?= h($trainings->active) ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['controller' => 'Trainings', 'action' => 'view', $trainings->id]) ?>
                    <?= $this->Html->link(__('Edit'), ['controller' => 'Trainings', 'action' => 'edit', $trainings->id]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['controller' => 'Trainings', 'action' => 'delete', $trainings->id], ['confirm' => __('Are you sure you want to delete # {0}?', $trainings->id)]) ?>
                </td>
            </tr>
            <?php endforeach; ?>
        </table>
        <?php endif; ?>
    </div>
</div>
