<?php
App::uses('ContactUsAppController', 'ContactUs.Controller');
/**
 * Messages Controller
 *
 */
class MessagesController extends ContactUsAppController {

/**
 * Components
 *
 * @var array
 */
  public $components = array('Paginator');

/**
 * add method
 *
 * @return void
 */
  public function add() {
    if ($this->request->is('post')) {
      $this->Message->create();
      if ($this->Message->save($this->request->data)) {
        $this->Session->setFlash(__('The message has been sent.'));
        return $this->redirect(array('action' => 'add'));
      } else {
        $this->Session->setFlash(__('The message could not be saved. Please, try again.'));
      }
    }
    $recipients = $this->Message->Recipient->find('list');
    $this->set(compact('recipients'));
  }

/**
 * admin_index method
 *
 * @return void
 */
  public function admin_index() {
    $this->Message->recursive = 0;
    $this->set('messages', $this->Paginator->paginate());
  }

/**
 * admin_view method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
  public function admin_view($id = null) {
    if (!$this->Message->exists($id)) {
      throw new NotFoundException(__('Invalid message'));
    }
    $options = array('conditions' => array('Message.' . $this->Message->primaryKey => $id));
    $this->set('message', $this->Message->find('first', $options));
  }

/**
 * admin_add method
 *
 * @return void
 */
  public function admin_add() {
    if ($this->request->is('post')) {
      $this->Message->create();
      if ($this->Message->save($this->request->data)) {
        $this->Session->setFlash(__('The message has been saved.'));
        return $this->redirect(array('action' => 'index'));
      } else {
        $this->Session->setFlash(__('The message could not be saved. Please, try again.'));
      }
    }
    $recipients = $this->Message->Recipient->find('list');
    $this->set(compact('recipients'));
  }

/**
 * admin_edit method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
  public function admin_edit($id = null) {
    if (!$this->Message->exists($id)) {
      throw new NotFoundException(__('Invalid message'));
    }
    if ($this->request->is(array('post', 'put'))) {
      if ($this->Message->save($this->request->data)) {
        $this->Session->setFlash(__('The message has been saved.'));
        return $this->redirect(array('action' => 'index'));
      } else {
        $this->Session->setFlash(__('The message could not be saved. Please, try again.'));
      }
    } else {
      $options = array('conditions' => array('Message.' . $this->Message->primaryKey => $id));
      $this->request->data = $this->Message->find('first', $options);
    }
    $recipients = $this->Message->Recipient->find('list');
    $this->set(compact('recipients'));
  }

/**
 * admin_delete method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
  public function admin_delete($id = null) {
    $this->Message->id = $id;
    if (!$this->Message->exists()) {
      throw new NotFoundException(__('Invalid message'));
    }
    $this->request->onlyAllow('post', 'delete');
    if ($this->Message->delete()) {
      $this->Session->setFlash(__('The message has been deleted.'));
    } else {
      $this->Session->setFlash(__('The message could not be deleted. Please, try again.'));
    }
    return $this->redirect(array('action' => 'index'));
  }
}
