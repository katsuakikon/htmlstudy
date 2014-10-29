<div class="qCategories index">
	<h2><?php echo __('Q Categories'); ?></h2>
	<table cellpadding="0" cellspacing="0">
	<thead>
	<tr>
			<th><?php echo $this->Paginator->sort('id'); ?></th>
			<th><?php echo $this->Paginator->sort('class_id'); ?></th>
			<th><?php echo $this->Paginator->sort('name'); ?></th>
			<th><?php echo $this->Paginator->sort('description'); ?></th>
			<th class="actions"><?php echo __('Actions'); ?></th>
	</tr>
	</thead>
	<tbody>
	<?php foreach ($qCategories as $qCategory): ?>
	<tr>
		<td><?php echo h($qCategory['QCategory']['id']); ?>&nbsp;</td>
		<td><?php echo h($qCategory['QCategory']['class_id']); ?>&nbsp;</td>
		<td><?php echo h($qCategory['QCategory']['name']); ?>&nbsp;</td>
		<td><?php echo h($qCategory['QCategory']['description']); ?>&nbsp;</td>
		<td class="actions">
			<?php echo $this->Html->link(__('View'), array('action' => 'view', $qCategory['QCategory']['id'])); ?>
			<?php echo $this->Html->link(__('Edit'), array('action' => 'edit', $qCategory['QCategory']['id'])); ?>
			<?php echo $this->Form->postLink(__('Delete'), array('action' => 'delete', $qCategory['QCategory']['id']), array(), __('Are you sure you want to delete # %s?', $qCategory['QCategory']['id'])); ?>
		</td>
	</tr>
<?php endforeach; ?>
	</tbody>
	</table>
	<p>
	<?php
	echo $this->Paginator->counter(array(
	'format' => __('Page {:page} of {:pages}, showing {:current} records out of {:count} total, starting on record {:start}, ending on {:end}')
	));
	?>	</p>
	<div class="paging">
	<?php
		echo $this->Paginator->prev('< ' . __('previous'), array(), null, array('class' => 'prev disabled'));
		echo $this->Paginator->numbers(array('separator' => ''));
		echo $this->Paginator->next(__('next') . ' >', array(), null, array('class' => 'next disabled'));
	?>
	</div>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>
		<li><?php echo $this->Html->link(__('New Q Category'), array('action' => 'add')); ?></li>
		<li><a href="<?php echo $this->Html->url('/Admin'); ?>">一覧に戻る</a></li>
	</ul>
</div>
