<script>
var answerArray = JSON.parse('<?php echo $answerArray ?>');
</script>
<p class="q_text">
<?php echo h($question) ?>
</p>
<fieldset>
	<legend>1つ選択してください。</legend>
	<div class="radio">
<?php foreach ($detail as $k => $v): ?>
<input type="radio" name="answer" value="<?php echo $v['QDetail']['id'] ?>">
<label>&nbsp;<?php echo $k+1 ?>.&nbsp;<?php echo h($v['QDetail']['question']) ?>
</label>
<?php endforeach; ?>
</div>
</fieldset>
<input type="button" id="answerBtn" value="回答する">
<div id="displayAns"></div>
<div id="description" style="display: none;">
<?php echo h($description) ?>
</div>
<?php echo $this->Html->script('check_radio'); ?>