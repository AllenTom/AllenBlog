<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Auth $auth
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('List Auth'), ['action' => 'index']) ?></li>
    </ul>
</nav>
<div class="auth form large-9 medium-8 columns content">
    <?= $this->Form->create($auth) ?>
    <fieldset>
        <legend><?= __('Add Auth') ?></legend>
        <?php
            echo $this->Form->control('key');
            echo $this->Form->control('user');
        ?>
    </fieldset>
    <?= $this->Form->button(__('Submit')) ?>
    <?= $this->Form->end() ?>
</div>
