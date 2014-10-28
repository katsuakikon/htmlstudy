<?php
App::uses('AppController', 'Controller');
/**
 * QCategories Controller
 *
 * @property QCategory $QCategory
 * @property PaginatorComponent $Paginator
 */
class QCategoriesController extends AppController {

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
		'QCategory',
		'QClass'
	);

/**
 * Components
 *
 * @var array
 */
	public $components = array('Paginator');

/**
 * index method
 *
 * @return void
 */
	public function index() {
		$this->QCategory->recursive = 0;
		$this->set('qCategories', $this->Paginator->paginate());
	}

/**
 * view method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function view($id = null) {
		if (!$this->QCategory->exists($id)) {
			throw new NotFoundException(__('Invalid q category'));
		}
		$options = array('conditions' => array('QCategory.' . $this->QCategory->primaryKey => $id));
		$this->set('qCategory', $this->QCategory->find('first', $options));
	}

/**
 * add method
 *
 * @return void
 */
	public function add() {
		if ($this->request->is('post')) {
			$this->QCategory->create();
			if ($this->QCategory->save($this->request->data)) {
				$this->Session->setFlash(__('The q category has been saved.'));
				return $this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The q category could not be saved. Please, try again.'));
			}
		} else {
			$list = $this->QClass->find('list',
				array(
					'fields' => array('id', 'name'),
					'order' => array('QClass.id asc')));

			$this->set('classes', $list);
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
		if (!$this->QCategory->exists($id)) {
			throw new NotFoundException(__('Invalid q category'));
		}
		if ($this->request->is(array('post', 'put'))) {
			if ($this->QCategory->save($this->request->data)) {
				$this->Session->setFlash(__('The q category has been saved.'));
				return $this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The q category could not be saved. Please, try again.'));
			}
		} else {
			$options = array('conditions' => array('QCategory.' . $this->QCategory->primaryKey => $id));
			$this->request->data = $this->QCategory->find('first', $options);

			$list = $this->QClass->find('list',
				array(
					'fields' => array('id', 'name'),
					'order' => array('QClass.id asc')));

			$this->set('classes', $list);
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
		$this->QCategory->id = $id;
		if (!$this->QCategory->exists()) {
			throw new NotFoundException(__('Invalid q category'));
		}
		$this->request->allowMethod('post', 'delete');
		if ($this->QCategory->delete()) {
			$this->Session->setFlash(__('The q category has been deleted.'));
		} else {
			$this->Session->setFlash(__('The q category could not be deleted. Please, try again.'));
		}
		return $this->redirect(array('action' => 'index'));
	}
}
