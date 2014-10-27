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
		'QBase',
		'QDetail'
	);

/**
 * Components
 *
 * @var array
 */
	public $components = array('Paginator', 'Session');

	public function input($index = null) {
		$base = $this->QBase->find('first',array(
			'conditions' => array('QBase.id' => $index)));

		$type = $base['QBase']['type'];
		$hint = $base['QBase']['hint'];

		$detail = $this->QDetail->find('all',array(
			'conditions' => array('QDetail.parent_id' => $index)));

		$this->set('hint', $hint);
		$this->set('detail', $detail);

		if ($type == 1) {
			$this->render('radio');
		} else {
			$this->render('select');
		}
		
	}

}
