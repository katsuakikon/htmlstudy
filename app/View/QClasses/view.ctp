<div class="qClasses view">
<h2><?php echo __('Q Class'); ?></h2>
	<dl>
		<dt><?php echo __('Id'); ?></dt>
		<dd>
			<?php echo h($qClass['QClass']['id']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Name'); ?></dt>
		<dd>
			<?php echo h($qClass['QClass']['name']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Description'); ?></dt>
		<dd>
			<?php echo h($qClass['QClass']['description']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Test Time'); ?></dt>
		<dd>
			<?php echo h($qClass['QClass']['test_time']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Test Total Count'); ?></dt>
		<dd>
			<?php echo h($qClass['QClass']['test_total_count']); ?>
			&nbsp;
		</dd>
	</dl>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>
		<li><?php echo $this->Html->link(__('Edit Q Class'), array('action' => 'edit', $qClass['QClass']['id'])); ?> </li>
		<li><?php echo $this->Form->postLink(__('Delete Q Class'), array('action' => 'delete', $qClass['QClass']['id']), array(), __('Are you sure you want to delete # %s?', $qClass['QClass']['id'])); ?> </li>
		<li><?php echo $this->Html->link(__('List Q Classes'), array('action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Q Class'), array('action' => 'add')); ?> </li>
	</ul>
</div>
