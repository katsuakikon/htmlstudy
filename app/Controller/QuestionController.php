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
 * Components
 *
 * @var array
 */
	public $components = array('Paginator', 'Session', 'Cookie');

/**
 * Model
 *
 * @var array
 */
	public $uses = array(
		'QClass',
		'QCategory',
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
 * init method
 *
 * @return void
 */
	public function init($id = null) {
		$this->Cookie->destroy();
		
		// 選択した問題集を取得
		$base = $this->QBase->find('all',array(
			'conditions' => array('QBase.class_id' => $id)));
		$baseArray = array();
		$qCount = 0;
		foreach ($base as $k => $v) {
			array_push($baseArray, $v['QBase']['id']);
			$qCount++;
		}

		$this->QClass->recursive = 0;
		$this->set('qClasses', $this->Paginator->paginate());

		$this->Cookie->write('q_count', $qCount, false, '24 hour');
		$this->Cookie->write('q_array', $baseArray, false, '24 hour');

		$this->redirect(array('controller' => 'Question', 'action' => 'input/0'));
	}

	public function input($index = null) {

		// 出題indexはCookieから取得
		$q_array = $this->Cookie->read('q_array');
		$id = $q_array[$index];

		$this->set('next_index', $index + 1);

		// 問題設定
		$base = $this->QBase->find('first',array(
			'conditions' => array('QBase.id' => $id)));

		$type = $base['QBase']['type_id'];
		$question = $base['QBase']['question'];
		$description = $base['QBase']['description'];
		$hint = $base['QBase']['hint'];
		$class_id = $base['QBase']['class_id'];

		$this->set('question', $question);
		$this->set('description', $description);
		$this->set('hint', $hint);

		// 問題詳細設定
		$detail = $this->QDetail->find('all',array(
			'conditions' => array('QDetail.parent_id' => $id)));
		$this->set('detail', $detail);
		// 回答設定
		$answerArray = array();
		foreach ($detail as $key => $value) {
			array_push($answerArray, $value['QDetail']['answer']);
		}
		$this->set('answerArray', json_encode($answerArray));

		// カテゴリー設定
		$categories = $this->QCategory->find('first',array(
			'conditions' => array('QCategory.id' => $class_id)));
		$category = $categories['QCategory']['name'];
		$this->set('category', $category);

		if ($type == 1) {
			$this->render('radio');
		} else {
			$this->render('checkbox');
		}
		
	}

	public function result() {
		
	}

}
