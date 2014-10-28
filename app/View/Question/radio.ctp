<script>
var answerArray = JSON.parse('<?php echo $answerArray ?>');
var qindex = JSON.parse('<?php echo $next_index ?>');
</script>

<div id="q_contents">

<div id="q_count" class="pull-right"></div>

<div>
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
</div>
<div>
<input type="button" id="answerBtn" value="回答する">
</div>
<div id="displayAns"></div>
<div id="description" style="display: none;">
<?php echo h($description) ?>
</div>

<div id="next_button" class="pull-right">
	<div id="result_link" style="display: none;">
		<a href="<?php echo $this->Html->url('/Question/result'); ?>">結果を見る</a>
	</div>
	<div id="next_link" style="display: none;">
		<a href="<?php echo $this->Html->url('/Question/input/'.$next_index); ?>">次の問題へ</a>
	</div>
</div>

</div>
<?php echo $this->Html->script('question'); ?>
<?php echo $this->Html->script('check_radio'); ?>