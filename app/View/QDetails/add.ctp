<div class="qDetails form">
<?php echo $this->Form->create('QDetail'); ?>
	<fieldset>
		<legend><?php echo __('Add Q Detail'); ?></legend>
	<?php
		echo $this->Form->input('parent_id');
		echo $this->Form->input('question');
		echo $this->Form->input('answer');
	?>
	</fieldset>
<?php echo $this->Form->end(__('Submit')); ?>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>

		<li><?php echo $this->Html->link(__('List Q Details'), array('action' => 'index')); ?></li>
	</ul>
</div>
