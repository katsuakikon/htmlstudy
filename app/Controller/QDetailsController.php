<?php
App::uses('AppController', 'Controller');
/**
 * QDetails Controller
 *
 * @property QDetail $QDetail
 * @property PaginatorComponent $Paginator
 * @property SessionComponent $Session
 */
class QDetailsController extends AppController {

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
 * Model
 *
 * @var array
 */
	public $uses = array(
		'QDetail',
		'QBase'
	);

/**
 * index method
 *
 * @return void
 */
	public function index() {
		$this->QDetail->recursive = 0;
		$this->set('qDetails', $this->Paginator->paginate());
	}

/**
 * view method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function view($id = null) {
		if (!$this->QDetail->exists($id)) {
			throw new NotFoundException(__('Invalid q detail'));
		}
		$options = array('conditions' => array('QDetail.' . $this->QDetail->primaryKey => $id));
		$this->set('qDetail', $this->QDetail->find('first', $options));
	}

/**
 * add method
 *
 * @return void
 */
	public function add() {
		if ($this->request->is('post')) {
			$this->QDetail->create();
			if ($this->QDetail->save($this->request->data)) {
				$this->Session->setFlash(__('The q detail has been saved.'));
				return $this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The q detail could not be saved. Please, try again.'));
			}
		} else {
			$parents = $this->QBase->find('list',
				array(
					'fields' => array('id', 'question'),
					'order' => array('QBase.id desc')));

			$this->set('parents', $parents);
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
		if (!$this->QDetail->exists($id)) {
			throw new NotFoundException(__('Invalid q detail'));
		}
		if ($this->request->is(array('post', 'put'))) {
			if ($this->QDetail->save($this->request->data)) {
				$this->Session->setFlash(__('The q detail has been saved.'));
				return $this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The q detail could not be saved. Please, try again.'));
			}
		} else {
			$options = array('conditions' => array('QDetail.' . $this->QDetail->primaryKey => $id));
			$this->request->data = $this->QDetail->find('first', $options);

			$parents = $this->QBase->find('list',
				array(
					'fields' => array('id', 'question'),
					'order' => array('QBase.id asc')));

			$this->set('parents', $parents);
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
		$this->QDetail->id = $id;
		if (!$this->QDetail->exists()) {
			throw new NotFoundException(__('Invalid q detail'));
		}
		$this->request->allowMethod('post', 'delete');
		if ($this->QDetail->delete()) {
			$this->Session->setFlash(__('The q detail has been deleted.'));
		} else {
			$this->Session->setFlash(__('The q detail could not be deleted. Please, try again.'));
		}
		return $this->redirect(array('action' => 'index'));
	}
}
