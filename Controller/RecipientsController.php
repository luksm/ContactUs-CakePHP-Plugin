<?php
App::uses('ContactUsAppController', 'ContactUs.Controller');
/**
 * Recipients Controller
 *
 */
class RecipientsController extends ContactUsAppController {

/**
 * Components
 *
 * @var array
 */
  public $components = array('Paginator');

/**
 * admin_index method
 *
 * @return void
 */
  public function admin_index() {
    $this->Recipient->recursive = 0;
    $this->set('recipients', $this->Paginator->paginate());
  }

/**
 * admin_view method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
  public function admin_view($id = null) {
    if (!$this->Recipient->exists($id)) {
      throw new NotFoundException(__('Invalid recipient'));
    }
    $options = array('conditions' => array('Recipient.' . $this->Recipient->primaryKey => $id));
    $this->set('recipient', $this->Recipient->find('first', $options));
  }

/**
 * admin_add method
 *
 * @return void
 */
  public function admin_add() {
    if ($this->request->is('post')) {
      $this->Recipient->create();
      if ($this->Recipient->save($this->request->data)) {
        $this->Session->setFlash(__('The recipient has been saved.'));
        return $this->redirect(array('action' => 'index'));
      } else {
        $this->Session->setFlash(__('The recipient could not be saved. Please, try again.'));
      }
    }
  }

/**
 * admin_edit method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
  public function admin_edit($id = null) {
    if (!$this->Recipient->exists($id)) {
      throw new NotFoundException(__('Invalid recipient'));
    }
    if ($this->request->is(array('post', 'put'))) {
      if ($this->Recipient->save($this->request->data)) {
        $this->Session->setFlash(__('The recipient has been saved.'));
        return $this->redirect(array('action' => 'index'));
      } else {
        $this->Session->setFlash(__('The recipient could not be saved. Please, try again.'));
      }
    } else {
      $options = array('conditions' => array('Recipient.' . $this->Recipient->primaryKey => $id));
      $this->request->data = $this->Recipient->find('first', $options);
    }
  }

/**
 * admin_delete method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
  public function admin_delete($id = null) {
    $this->Recipient->id = $id;
    if (!$this->Recipient->exists()) {
      throw new NotFoundException(__('Invalid recipient'));
    }
    $this->request->onlyAllow('post', 'delete');
    if ($this->Recipient->delete()) {
      $this->Session->setFlash(__('The recipient has been deleted.'));
    } else {
      $this->Session->setFlash(__('The recipient could not be deleted. Please, try again.'));
    }
    return $this->redirect(array('action' => 'index'));
  }
}
