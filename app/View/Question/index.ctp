<script>
$(function() {
	cookieSet(scoreKey, 0);
});
</script>
<div class="qClasses">
	<h1>資格試験問題集</h1>
	<table cellpadding="0" cellspacing="0">
	<thead>
	<tr>
			<th><?php echo $this->Paginator->sort('id'); ?></th>
			<th><?php echo $this->Paginator->sort('name'); ?></th>
			<th class="actions"><?php echo __('概要'); ?></th>
			<th class="actions"><?php echo __('試験時間'); ?></th>
			<th class="actions"><?php echo __('問題数（約）'); ?></th>
			<th class="actions"><?php echo __('Actions'); ?></th>
	</tr>
	</thead>
	<tbody>
	<?php foreach ($qClasses as $qClass): ?>
	<tr>
		<td><?php echo h($qClass['QClass']['id']); ?>&nbsp;</td>
		<td><?php echo h($qClass['QClass']['name']); ?>&nbsp;</td>
		<td><?php echo h($qClass['QClass']['description']); ?>&nbsp;</td>
		<td><?php echo h($qClass['QClass']['test_time']); ?>分&nbsp;</td>
		<td><?php echo h($qClass['QClass']['test_total_count']); ?>問&nbsp;</td>
		<td class="actions">
			<?php echo $this->Html->link(__('開始'), array('action' => 'init', $qClass['QClass']['id'])); ?>
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

