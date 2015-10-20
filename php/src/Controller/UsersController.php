<?php
namespace App\Controller;
use Cake\Core\Configure;
use Cake\Event\Event;

/**
 * UsersController
 *
 * @property \App\Model\Table\UsersTable $Users
 */
 
class UsersController extends AppController
{
	public function index()
	{
		$this->paginate = [
				'contain' => ['Contacts', 'Users']
		];
		$this->set('users', $this->paginate($this->Contacts));
		$this->set('_serialize', ['users']);
	}
	
	/**
	 * View method
	 *
	 * @param string|null $id Contact id.
	 * @return void
	 * @throws \Cake\Network\Exception\NotFoundException When record not found.
	 */
	public function view($id = null)
	{
		$contact = $this->Users->get($id, [
				'contain' => ['Contacts', 'Users']
		]);
		$this->set('users', $contact);
		$this->set('_serialize', ['users']);
	}
	
	/**
	 * Add method
	 *
	 * @return void Redirects on successful add, renders view otherwise.
	 */
	public function add()
	{
		$contact = $this->Users->newEntity();
		if ($this->request->is('post')) {
			$contact = $this->Users->patchEntity($contact, $this->request->data);
			if ($this->Users->save($contact)) {
				$this->Flash->success(__('The user has been saved.'));
				return $this->redirect(['action' => 'index']);
			} else {
				$this->Flash->error(__('The user could not be saved. Please, try again.'));
			}
		}

		$users = $this->Users->Users->find('list', ['limit' => 200]);

		$this->set(compact('contact', 'users'));
		$this->set('_serialize', ['users']);
	}
	
	/**
	 * Edit method
	 *
	 * @param string|null $id Contact id.
	 * @return void Redirects on successful edit, renders view otherwise.
	 * @throws \Cake\Network\Exception\NotFoundException When record not found.
	 */
	public function edit($id = null)
	{
		$contact = $this->Users->get($id, [
				'contain' => []
		]);
		if ($this->request->is(['patch', 'post', 'put'])) {
			$contact = $this->Users->patchEntity($contact, $this->request->data);
			if ($this->Users->save($contact)) {
				$this->Flash->success(__('The user has been saved.'));
				return $this->redirect(['action' => 'index']);
			} else {
				$this->Flash->error(__('The user could not be saved. Please, try again.'));
			}
		}

		$users = $this->Users->Users->find('list', ['limit' => 200]);

		$this->set(compact('contact', 'users'));
		$this->set('_serialize', ['users']);
	}
	
	/**
	 * Delete method
	 *
	 * @param string|null $id Contact id.
	 * @return void Redirects to index.
	 * @throws \Cake\Network\Exception\NotFoundException When record not found.
	 */
	public function delete($id = null)
	{
		$this->request->allowMethod(['post', 'delete']);
		$contact = $this->Users->get($id);
		if ($this->Users->delete($contact)) {
			$this->Flash->success(__('The user has been deleted.'));
		} else {
			$this->Flash->error(__('The user could not be deleted. Please, try again.'));
		}
		return $this->redirect(['action' => 'index']);
	}
	
	
	public function login()
	{
	    if ($this->request->is('post')) {
	        $user = $this->Auth->identify();
	        if ($user) {
	            $this->Auth->setUser($user);
	            return $this->redirect($this->Auth->redirectUrl());
	        }
	        $this->Flash->error(__('Invalid username or password, try again'));
	    }
	}
	
	public function logout()
	{
	    return $this->redirect($this->Auth->logout());
	}
	
	public function beforeFilter(Event $event)
	{
		parent::beforeFilter($event);
		// Allow users to register and logout.
		// You should not add the "login" action to allow list. Doing so would
		// cause problems with normal functioning of AuthComponent.
		$this->Auth->allow(['add', 'logout']);
	}
}

