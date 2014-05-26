<div class="recipients form">
<?php echo $this->Form->create('Recipient'); ?>
	<fieldset>
		<legend><?php echo __('Edit Recipient'); ?></legend>
	<?php
		echo $this->Form->input('id');
		echo $this->Form->input('name');
		echo $this->Form->input('email');
	?>
	</fieldset>
<?php echo $this->Form->end(__('Submit')); ?>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>

		<li><?php echo $this->Form->postLink(__('Delete'), array('action' => 'delete', $this->Form->value('Recipient.id')), null, __('Are you sure you want to delete # %s?', $this->Form->value('Recipient.id'))); ?></li>
		<li><?php echo $this->Html->link(__('List Recipients'), array('action' => 'index')); ?></li>
		<li><?php echo $this->Html->link(__('List Messages'), array('controller' => 'messages', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Message'), array('controller' => 'messages', 'action' => 'add')); ?> </li>
	</ul>
</div>
