<?php
App::uses('AppController', 'Controller');
/**
 * QClasses Controller
 *
 * @property QClass $QClass
 * @property PaginatorComponent $Paginator
 * @property SessionComponent $Session
 */
class QClassesController extends AppController {

	public function isAuthorized($user) {
		if (isset($user['role']) && $user['role'] === 'admin') {
			return true;
		}
		// デフォルトは拒否
		return false;
	}
/**
 * Components
 *
 * @var array
 */
	public $components = array('Paginator', 'Session');

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
 * view method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function view($id = null) {
		if (!$this->QClass->exists($id)) {
			throw new NotFoundException(__('Invalid q class'));
		}
		$options = array('conditions' => array('QClass.' . $this->QClass->primaryKey => $id));
		$this->set('qClass', $this->QClass->find('first', $options));
	}

/**
 * add method
 *
 * @return void
 */
	public function add() {
		if ($this->request->is('post')) {
			$this->QClass->create();
			if ($this->QClass->save($this->request->data)) {
				$this->Session->setFlash(__('The q class has been saved.'));
				return $this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The q class could not be saved. Please, try again.'));
			}
		}
	}

/**
 * edit method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function edit($id = null) {
		if (!$this->QClass->exists($id)) {
			throw new NotFoundException(__('Invalid q class'));
		}
		if ($this->request->is(array('post', 'put'))) {
			if ($this->QClass->save($this->request->data)) {
				$this->Session->setFlash(__('The q class has been saved.'));
				return $this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The q class could not be saved. Please, try again.'));
			}
		} else {
			$options = array('conditions' => array('QClass.' . $this->QClass->primaryKey => $id));
			$this->request->data = $this->QClass->find('first', $options);
		}
	}

/**
 * delete method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function delete($id = null) {
		$this->QClass->id = $id;
		if (!$this->QClass->exists()) {
			throw new NotFoundException(__('Invalid q class'));
		}
		$this->request->allowMethod('post', 'delete');
		if ($this->QClass->delete()) {
			$this->Session->setFlash(__('The q class has been deleted.'));
		} else {
			$this->Session->setFlash(__('The q class could not be deleted. Please, try again.'));
		}
		return $this->redirect(array('action' => 'index'));
	}
}
