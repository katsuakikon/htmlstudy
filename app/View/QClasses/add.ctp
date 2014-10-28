<div class="qClasses form">
<?php echo $this->Form->create('QClass'); ?>
	<fieldset>
		<legend><?php echo __('Add Q Class'); ?></legend>
	<?php
		echo $this->Form->input('name');
		echo $this->Form->input('description');
		echo $this->Form->input('test_time');
		echo $this->Form->input('test_total_count');
	?>
	</fieldset>
<?php echo $this->Form->end(__('Submit')); ?>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>

		<li><?php echo $this->Html->link(__('List Q Classes'), array('action' => 'index')); ?></li>
	</ul>
</div>
