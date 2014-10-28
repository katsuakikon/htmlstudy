<div class="qDetails view">
<h2><?php echo __('Q Detail'); ?></h2>
	<dl>
		<dt><?php echo __('Id'); ?></dt>
		<dd>
			<?php echo h($qDetail['QDetail']['id']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Parent Id'); ?></dt>
		<dd>
			<?php echo h($qDetail['QDetail']['parent_id']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Question'); ?></dt>
		<dd>
			<?php echo h($qDetail['QDetail']['question']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Answer'); ?></dt>
		<dd>
			<?php echo h($qDetail['QDetail']['answer']); ?>
			&nbsp;
		</dd>
	</dl>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>
		<li><?php echo $this->Html->link(__('Edit Q Detail'), array('action' => 'edit', $qDetail['QDetail']['id'])); ?> </li>
		<li><?php echo $this->Form->postLink(__('Delete Q Detail'), array('action' => 'delete', $qDetail['QDetail']['id']), array(), __('Are you sure you want to delete # %s?', $qDetail['QDetail']['id'])); ?> </li>
		<li><?php echo $this->Html->link(__('List Q Details'), array('action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Q Detail'), array('action' => 'add')); ?> </li>
	</ul>
</div>
