<div class="qBases view">
<h2><?php echo __('Q Base'); ?></h2>
	<dl>
		<dt><?php echo __('Id'); ?></dt>
		<dd>
			<?php echo h($qBase['QBase']['id']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Category'); ?></dt>
		<dd>
			<?php echo h($qBase['QBase']['category_id']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Type'); ?></dt>
		<dd>
			<?php echo h($qBase['QBase']['type_id']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Hint'); ?></dt>
		<dd>
			<?php echo h($qBase['QBase']['hint']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Description'); ?></dt>
		<dd>
			<?php echo h($qBase['QBase']['description']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Question'); ?></dt>
		<dd>
			<?php echo h($qBase['QBase']['question']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Class Id'); ?></dt>
		<dd>
			<?php echo h($qBase['QBase']['class_id']); ?>
			&nbsp;
		</dd>
	</dl>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>
		<li><?php echo $this->Html->link(__('Edit Q Base'), array('action' => 'edit', $qBase['QBase']['id'])); ?> </li>
		<li><?php echo $this->Form->postLink(__('Delete Q Base'), array('action' => 'delete', $qBase['QBase']['id']), array(), __('Are you sure you want to delete # %s?', $qBase['QBase']['id'])); ?> </li>
		<li><?php echo $this->Html->link(__('List Q Bases'), array('action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Q Base'), array('action' => 'add')); ?> </li>
	</ul>
</div>
