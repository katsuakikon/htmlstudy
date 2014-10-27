<p>
<?php echo h($hint) ?>
</p>
<fieldset>
	<legend>該当項目を選択してください。</legend>
<?php foreach ($detail as $k => $v): ?>
<div class="checkbox">
<input type="checkbox" name="answer" value="<?php echo $v['QDetail']['id'] ?>">
<label>&nbsp;<?php echo $k+1 ?>.&nbsp;<?php echo h($v['QDetail']['question']) ?>
</label>
</div>
<?php endforeach; ?>
</fieldset>