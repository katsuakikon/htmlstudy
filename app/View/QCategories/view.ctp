<div class="qCategories view">
<h2><?php echo __('Q Category'); ?></h2>
	<dl>
		<dt><?php echo __('Id'); ?></dt>
		<dd>
			<?php echo h($qCategory['QCategory']['id']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Class Id'); ?></dt>
		<dd>
			<?php echo h($qCategory['QCategory']['class_id']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Name'); ?></dt>
		<dd>
			<?php echo h($qCategory['QCategory']['name']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Description'); ?></dt>
		<dd>
			<?php echo h($qCategory['QCategory']['description']); ?>
			&nbsp;
		</dd>
	</dl>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>
		<li><?php echo $this->Html->link(__('Edit Q Category'), array('action' => 'edit', $qCategory['QCategory']['id'])); ?> </li>
		<li><?php echo $this->Form->postLink(__('Delete Q Category'), array('action' => 'delete', $qCategory['QCategory']['id']), array(), __('Are you sure you want to delete # %s?', $qCategory['QCategory']['id'])); ?> </li>
		<li><?php echo $this->Html->link(__('List Q Categories'), array('action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Q Category'), array('action' => 'add')); ?> </li>
	</ul>
</div>
