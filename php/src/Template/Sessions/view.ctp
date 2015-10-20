<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('Edit Session'), ['action' => 'edit', $session->id]) ?> </li>
        <li><?= $this->Form->postLink(__('Delete Session'), ['action' => 'delete', $session->id], ['confirm' => __('Are you sure you want to delete # {0}?', $session->id)]) ?> </li>
        <li><?= $this->Html->link(__('List Sessions'), ['action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Session'), ['action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Users'), ['controller' => 'Users', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New User'), ['controller' => 'Users', 'action' => 'add']) ?> </li>
    </ul>
</nav>
<div class="sessions view large-9 medium-8 columns content">
    <h3><?= h($session->id) ?></h3>
    <table class="vertical-table">
        <tr>
            <th><?= __('Id') ?></th>
            <td><?= h($session->id) ?></td>
        </tr>
        <tr>
            <th><?= __('User') ?></th>
            <td><?= $session->has('user') ? $this->Html->link($session->user->id, ['controller' => 'Users', 'action' => 'view', $session->user->id]) : '' ?></td>
        </tr>
        <tr>
            <th><?= __('Ip Address') ?></th>
            <td><?= h($session->ip_address) ?></td>
        </tr>
        <tr>
            <th><?= __('Browser') ?></th>
            <td><?= h($session->browser) ?></td>
        </tr>
        <tr>
            <th><?= __('Expires') ?></th>
            <td><?= $this->Number->format($session->expires) ?></td>
        </tr>
        <tr>
            <th><?= __('Created') ?></th>
            <td><?= h($session->created) ?></tr>
        </tr>
    </table>
</div>
