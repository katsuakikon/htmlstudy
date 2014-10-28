<div class="qCategories form">
<?php echo $this->Form->create('QCategory'); ?>
	<fieldset>
		<legend><?php echo __('Add Q Category'); ?></legend>
	<?php
		echo $this->Form->input('class_id');
		echo $this->Form->input('name');
		echo $this->Form->input('description');
	?>
	</fieldset>
<?php echo $this->Form->end(__('Submit')); ?>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>

		<li><?php echo $this->Html->link(__('List Q Categories'), array('action' => 'index')); ?></li>
	</ul>
</div>
