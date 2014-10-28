<div class="qBases form">
<?php echo $this->Form->create('QBase'); ?>
	<fieldset>
		<legend><?php echo __('Add Q Base'); ?></legend>
	<?php
		echo $this->Form->input('class_id');
		echo $this->Form->input('category_id');
		echo $this->Form->input('type_id');
		echo $this->Form->input('question');
		echo $this->Form->input('hint');
		echo $this->Form->input('description');
	?>
	</fieldset>
<?php echo $this->Form->end(__('Submit')); ?>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>

		<li><?php echo $this->Html->link(__('List Q Bases'), array('action' => 'index')); ?></li>
	</ul>
</div>
