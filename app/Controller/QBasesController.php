<?php
App::uses('AppController', 'Controller');
/**
 * QBases Controller
 *
 * @property QBase $QBase
 * @property PaginatorComponent $Paginator
 * @property SessionComponent $Session
 */
class QBasesController extends AppController {

	public function isAuthorized($user) {
		if (isset($user['role']) && $user['role'] === 'admin') {
			return true;
		}
		// デフォルトは拒否
		return false;
	}
/**
 * Model
 *
 * @var array
 */
	public $uses = array(
		'QBase',
		'QClass',
		'QCategory'
	);

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
		$this->QBase->recursive = 0;
		$this->set('qBases', $this->Paginator->paginate());
	}

/**
 * view method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function view($id = null) {
		if (!$this->QBase->exists($id)) {
			throw new NotFoundException(__('Invalid q base'));
		}
		$options = array('conditions' => array('QBase.' . $this->QBase->primaryKey => $id));
		$this->set('qBase', $this->QBase->find('first', $options));
	}

/**
 * add method
 *
 * @return void
 */
	public function add() {
		if ($this->request->is('post')) {
			$this->QBase->create();
			if ($this->QBase->save($this->request->data)) {
				$this->Session->setFlash(__('The q base has been saved.'));
				return $this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The q base could not be saved. Please, try again.'));
			}
		} else {
			$list = $this->QClass->find('list',
				array(
					'fields' => array('id', 'name'),
					'order' => array('QClass.id desc')));

			$this->set('classes', $list);

			$categories = $this->QCategory->find('list',
				array(
					'fields' => array('id', 'name'),
					'order' => array('QCategory.id desc')));

			$this->set('categories', $categories);

			$this->set('types', array('1' => 'radio', '2' => 'checkbox'));

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
		if (!$this->QBase->exists($id)) {
			throw new NotFoundException(__('Invalid q base'));
		}
		if ($this->request->is(array('post', 'put'))) {
			if ($this->QBase->save($this->request->data)) {
				$this->Session->setFlash(__('The q base has been saved.'));
				return $this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The q base could not be saved. Please, try again.'));
			}
		} else {
			$options = array('conditions' => array('QBase.' . $this->QBase->primaryKey => $id));
			$this->request->data = $this->QBase->find('first', $options);

			$list = $this->QClass->find('list',
				array(
					'fields' => array('id', 'name'),
					'order' => array('QClass.id asc')));

			$this->set('classes', $list);

			$categories = $this->QCategory->find('list',
				array(
					'fields' => array('id', 'name'),
					'order' => array('QCategory.id asc')));

			$this->set('categories', $categories);

			$this->set('types', array('1' => 'radio', '2' => 'checkbox'));
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
		$this->QBase->id = $id;
		if (!$this->QBase->exists()) {
			throw new NotFoundException(__('Invalid q base'));
		}
		$this->request->allowMethod('post', 'delete');
		if ($this->QBase->delete()) {
			$this->Session->setFlash(__('The q base has been deleted.'));
		} else {
			$this->Session->setFlash(__('The q base could not be deleted. Please, try again.'));
		}
		return $this->redirect(array('action' => 'index'));
	}
}
