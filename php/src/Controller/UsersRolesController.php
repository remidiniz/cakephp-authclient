<?php
namespace App\Controller;

use App\Controller\AppController;

/**
 * UsersRoles Controller
 *
 * @property \App\Model\Table\UsersRolesTable $UsersRoles
 */
class UsersRolesController extends AppController
{

    /**
     * Index method
     *
     * @return void
     */
    public function index()
    {
        $this->paginate = [
            'contain' => ['Roles', 'Users']
        ];
        $this->set('usersRoles', $this->paginate($this->UsersRoles));
        $this->set('_serialize', ['usersRoles']);
    }

    /**
     * View method
     *
     * @param string|null $id Users Role id.
     * @return void
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function view($id = null)
    {
        $usersRole = $this->UsersRoles->get($id, [
            'contain' => ['Roles', 'Users']
        ]);
        $this->set('usersRole', $usersRole);
        $this->set('_serialize', ['usersRole']);
    }

    /**
     * Add method
     *
     * @return void Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $usersRole = $this->UsersRoles->newEntity();
        if ($this->request->is('post')) {
            $usersRole = $this->UsersRoles->patchEntity($usersRole, $this->request->data);
            if ($this->UsersRoles->save($usersRole)) {
                $this->Flash->success(__('The users role has been saved.'));
                return $this->redirect(['action' => 'index']);
            } else {
                $this->Flash->error(__('The users role could not be saved. Please, try again.'));
            }
        }
        $roles = $this->UsersRoles->Roles->find('list', ['limit' => 200]);
        $users = $this->UsersRoles->Users->find('list', ['limit' => 200]);
        $this->set(compact('usersRole', 'roles', 'users'));
        $this->set('_serialize', ['usersRole']);
    }

    /**
     * Edit method
     *
     * @param string|null $id Users Role id.
     * @return void Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $usersRole = $this->UsersRoles->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $usersRole = $this->UsersRoles->patchEntity($usersRole, $this->request->data);
            if ($this->UsersRoles->save($usersRole)) {
                $this->Flash->success(__('The users role has been saved.'));
                return $this->redirect(['action' => 'index']);
            } else {
                $this->Flash->error(__('The users role could not be saved. Please, try again.'));
            }
        }
        $roles = $this->UsersRoles->Roles->find('list', ['limit' => 200]);
        $users = $this->UsersRoles->Users->find('list', ['limit' => 200]);
        $this->set(compact('usersRole', 'roles', 'users'));
        $this->set('_serialize', ['usersRole']);
    }

    /**
     * Delete method
     *
     * @param string|null $id Users Role id.
     * @return void Redirects to index.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $usersRole = $this->UsersRoles->get($id);
        if ($this->UsersRoles->delete($usersRole)) {
            $this->Flash->success(__('The users role has been deleted.'));
        } else {
            $this->Flash->error(__('The users role could not be deleted. Please, try again.'));
        }
        return $this->redirect(['action' => 'index']);
    }
}
