<p>
<?php echo h($hint) ?>
</p>
<fieldset>
	<legend>1つ選択してください。</legend>
<?php foreach ($detail as $k => $v): ?>
<div class="radio">
<input type="radio" name="answer" value="<?php echo $v['QDetail']['id'] ?>">
<label>&nbsp;<?php echo $k+1 ?>.&nbsp;<?php echo h($v['QDetail']['question']) ?>
</label>
</div>
<?php endforeach; ?>
</fieldset>