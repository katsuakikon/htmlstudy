<?php
App::uses('AppController', 'Controller');
/**
 * Question Controller
 *
 * @property Question $Question
 * @property PaginatorComponent $Paginator
 * @property SessionComponent $Session
 */
class QuestionController extends AppController {

/**
 * Model
 *
 * @var array
 */
	public $uses = array(
		'QClass',
		'QBase',
		'QDetail'
	);

/**
 * index method
 *
 * @return void
 */
	public function index() {
		$this->QClass->recursive = 0;
		$this->set('qClasses', $this->Paginator->paginate());
	}

/**
 * Components
 *
 * @var array
 */
	public $components = array('Paginator', 'Session');

	public function input($index = null) {
		$base = $this->QBase->find('first',array(
			'conditions' => array('QBase.id' => $index)));

		$type = $base['QBase']['type_id'];
		$question = $base['QBase']['question'];
		$description = $base['QBase']['description'];
		$hint = $base['QBase']['hint'];

		$this->set('question', $question);
		$this->set('description', $description);
		$this->set('hint', $hint);

		$detail = $this->QDetail->find('all',array(
			'conditions' => array('QDetail.parent_id' => $index)));

		$this->set('detail', $detail);

		$answerArray = array();
		foreach ($detail as $key => $value) {
			array_push($answerArray, $value['QDetail']['answer']);
		}

		$this->set('answerArray', json_encode($answerArray));

		if ($type == 1) {
			$this->render('radio');
		} else {
			$this->render('checkbox');
		}
		
	}

}
