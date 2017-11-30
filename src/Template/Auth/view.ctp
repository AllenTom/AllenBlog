<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Auth $auth
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('Edit Auth'), ['action' => 'edit', $auth->id]) ?> </li>
        <li><?= $this->Form->postLink(__('Delete Auth'), ['action' => 'delete', $auth->id], ['confirm' => __('Are you sure you want to delete # {0}?', $auth->id)]) ?> </li>
        <li><?= $this->Html->link(__('List Auth'), ['action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Auth'), ['action' => 'add']) ?> </li>
    </ul>
</nav>
<div class="auth view large-9 medium-8 columns content">
    <h3><?= h($auth->id) ?></h3>
    <table class="vertical-table">
        <tr>
            <th scope="row"><?= __('Key') ?></th>
            <td><?= h($auth->key) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Id') ?></th>
            <td><?= $this->Number->format($auth->id) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('User') ?></th>
            <td><?= $this->Number->format($auth->user) ?></td>
        </tr>
    </table>
</div>
