<?php
declare(strict_types=1);

namespace App\Controller;

/**
 * Dashboard Controller
 *
 * @property \App\Model\Table\PokemonsTable $Pokemons
 * @method \App\Model\Entity\Dashboard[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class DashboardController extends AppController
{
    /**
     * Index method
     *
     * @return \Cake\Http\Response|null|void Renders view
     */
    public function index()
    {

        $pokemon = $this->request->getQuery();

        $data = "hello";
        $this->set("data", $data);
    }

    /**
     * View method
     *
     * @param string|null $id Dashboard Controller id.
     * @return \Cake\Http\Response|null|void Renders view
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $dashboardController = $this->DashboardController->get($id, [
            'contain' => [],
        ]);

        $this->set(compact('dashboardController'));
    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null|void Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $dashboardController = $this->DashboardController->newEmptyEntity();
        if ($this->request->is('post')) {
            $dashboardController = $this->DashboardController->patchEntity($dashboardController, $this->request->getData());
            if ($this->DashboardController->save($dashboardController)) {
                $this->Flash->success(__('The dashboard controller has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The dashboard controller could not be saved. Please, try again.'));
        }
        $this->set(compact('dashboardController'));
    }

    /**
     * Edit method
     *
     * @param string|null $id Dashboard Controller id.
     * @return \Cake\Http\Response|null|void Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $dashboardController = $this->DashboardController->get($id, [
            'contain' => [],
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $dashboardController = $this->DashboardController->patchEntity($dashboardController, $this->request->getData());
            if ($this->DashboardController->save($dashboardController)) {
                $this->Flash->success(__('The dashboard controller has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The dashboard controller could not be saved. Please, try again.'));
        }
        $this->set(compact('dashboardController'));
    }

    /**
     * Delete method
     *
     * @param string|null $id Dashboard Controller id.
     * @return \Cake\Http\Response|null|void Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $dashboardController = $this->DashboardController->get($id);
        if ($this->DashboardController->delete($dashboardController)) {
            $this->Flash->success(__('The dashboard controller has been deleted.'));
        } else {
            $this->Flash->error(__('The dashboard controller could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }
}
