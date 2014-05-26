<div class="messages form">
<?php echo $this->Form->create('Message'); ?>
	<fieldset>
		<legend><?php echo __('Add Message'); ?></legend>
	<?php
		echo $this->Form->input('recipient_id');
		echo $this->Form->input('sender');
		echo $this->Form->input('email');
		echo $this->Form->input('subject');
		echo $this->Form->input('body');
	?>
	</fieldset>
<?php echo $this->Form->end(__('Submit')); ?>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>

		<li><?php echo $this->Html->link(__('List Messages'), array('action' => 'index')); ?></li>
		<li><?php echo $this->Html->link(__('List Recipients'), array('controller' => 'recipients', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Recipient'), array('controller' => 'recipients', 'action' => 'add')); ?> </li>
	</ul>
</div>
