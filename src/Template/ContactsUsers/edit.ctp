<div class="actions columns large-2 medium-3">
	<h3><?= __('Actions') ?></h3>
	<ul class="side-nav">
		<li><?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $contactsUser->contact_id], ['confirm' => __('Are you sure you want to delete # {0}?', $contactsUser->contact_id)]) ?></li>
		<li><?= $this->Html->link(__('List Contacts Users'), ['action' => 'index']) ?></li>
		<li><?= $this->Html->link(__('List Contacts'), ['controller' => 'Contacts', 'action' => 'index']) ?> </li>
		<li><?= $this->Html->link(__('New Contact'), ['controller' => 'Contacts', 'action' => 'add']) ?> </li>
		<li><?= $this->Html->link(__('List Users'), ['controller' => 'Users', 'action' => 'index']) ?> </li>
		<li><?= $this->Html->link(__('New User'), ['controller' => 'Users', 'action' => 'add']) ?> </li>
	</ul>
</div>
<div class="contactsUsers form large-10 medium-9 columns">
<?= $this->Form->create($contactsUser) ?>
	<fieldset>
		<legend><?= __('Edit Contacts User') ?></legend>
	<?php
	?>
	</fieldset>
<?= $this->Form->button(__('Submit')) ?>
<?= $this->Form->end() ?>
</div>
