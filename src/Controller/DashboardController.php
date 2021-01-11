<?php
declare(strict_types=1);

namespace App\Controller;

use phpDocumentor\Reflection\Types\This;

/**
 * Dashboard Controller
 *
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
        // Retrieving data from DB
        $resultAllPokemons = $this->loadModel('pokemons');
        $pokeTypes = $this->loadModel('pokemon_types');
        $resultAllSpeeds = $this->loadModel('pokemons');


        // If the actual pokemon is in the 4th generation
        $data4th = $resultAllPokemons->find('all')
            ->where(['id >=' => 387])
            ->where(['id <=' => 493]);

        // If the actual pokemon is in the 1th generation
        // And he's Fairy type
        $dataPokeTypes1th = $pokeTypes->find('all')
            // 1st generation
            ->where(['pokemon_id >=' => 1])
            ->where(['AND' => ['pokemon_id <=' => 151]])
            ->where(['AND' => ['type_id =' => 10]]);
        // If the actual pokemon is in the 3th generation
        // And he's Fairy type
        $dataPokeTypes3th = $pokeTypes->find('all')
            // 1st generation
            ->where(['pokemon_id >=' => 252])
            ->where(['AND' => ['pokemon_id <=' => 386]])
            ->where(['AND' => ['type_id =' => 10]]);
        // If the actual pokemon is in the 7th generation
        // And he's Fairy type
        $dataPokeTypes7th = $pokeTypes->find('all')
            // 1st generation
            ->where(['pokemon_id >=' => 722])
            ->where(['AND' => ['pokemon_id <=' => 809]])
            ->where(['AND' => ['type_id =' => 10]]);

        // Getting all the Pokemons
        $dataAllSpeeds = $resultAllSpeeds->find('all');


        $nBPokemon1th3th7th = 0;
        $allTypes = array();


        // Initialisation variables
        $nBPokemon4th = 0;
        $allWeight = array();
        $avgWeight = 0;

        $allFairyPokemons = array();

        $fastestsPoke = array();

        $nBPokemon1th3th7th = 0;
        $length = 0;


        // Average weight
        foreach ($data4th as $row){
            $nBPokemon4th = $nBPokemon4th +1;
            $allWeight[] = $row->weight;
        }
        foreach ($dataAllSpeeds as $row){
            $length+=1;
        }
        foreach ($allWeight as $val){
            $avgWeight = $avgWeight + $val;
        }
        $avgWeight = round($avgWeight/$nBPokemon4th, 2);


        // Counting number of Fairy type Pokemon
        foreach ($dataPokeTypes1th as $row){
            $nBPokemon1th3th7th = $nBPokemon1th3th7th + 1;
        }
        foreach ($dataPokeTypes3th as $row){
            $nBPokemon1th3th7th = $nBPokemon1th3th7th + 1;
        }
        foreach ($dataPokeTypes7th as $row){
            $nBPokemon1th3th7th = $nBPokemon1th3th7th + 1;
        }



        // Filling array with string that forms '$speed $name'
        foreach ($dataAllSpeeds as $row => $value){
            $fastestsPoke[][] = $value->name;
            $fastestsPoke[][] = $value->speed;
            $pokemonSortedSpeed[] = $value->speed . ' ' . $value->name;
        }



        // Sorting by speed
        sort($pokemonSortedSpeed, SORT_NUMERIC);
        // Reverse Array
        $reversed = array_reverse($pokemonSortedSpeed);

        // displaying $pokemonSortedSpeed REVERSED array
//        echo '<pre>';
//        for ($i=0; $i < 10; $i++){
//            echo sprintf("<li>%s</li>", $reversed[$i]);
//        }
//        echo '</pre>';

//        echo '<pre>';
//        print_r($reversed);
//        echo '</pre>';

        // Split the $speed . $name
        $pattern = "/[\s]/";
        foreach ($reversed as $row => $value){
            $speedNameTab[] = preg_split($pattern, $value);
//            echo '<pre>';
//            print_r($speedNameTab[$row]);
//            echo '</pre>';
        }

        //display Final array with speed for each pokemon sorted
//        foreach ($speedNameTab as $row => $value){
//            echo '<pre>';
//            print_r($speedNameTab[$row]);
//            echo '</pre>';
//        }






//      Walking Backwards in the speed sorted pokemons array
        $index = count($pokemonSortedSpeed);

//      displaying $pokemonSortedSpeed array backwards With while loop


//        while($index) {
//            echo sprintf("<li>%s</li>", $pokemonSortedSpeed[--$index]);
//            $reversed[] = $pokemonSortedSpeed[--$index];
//            if ($index == 856){
//
//            }
//            else{
//                break;
//            }
//        }

//      displaying $pokemonSortedSpeed array backwards With for loop
//        $reversed = array();
//        for ($i = $index; $i<= $index + 9 && $i >0; $i--){
//            echo sprintf("<li>%s</li>", $pokemonSortedSpeed[--$index]);
//            $reversed[] = $pokemonSortedSpeed[--$index];
//        }
//        var_dump($reversed);







        $this->set(compact('row',
            'nBPokemon4th',
            'allWeight',
            'data4th',
            'avgWeight',
            'allFairyPokemons',
            'nBPokemon1th3th7th',
            'dataPokeTypes1th',
            'speedNameTab',
        ));
    }

    /**
     * View method
     *
     * @param string|null $id Dashboard id.
     * @return \Cake\Http\Response|null|void Renders view
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {

    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null|void Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $dashboard = $this->Dashboard->newEmptyEntity();
        if ($this->request->is('post')) {
            $dashboard = $this->Dashboard->patchEntity($dashboard, $this->request->getData());
            if ($this->Dashboard->save($dashboard)) {
                $this->Flash->success(__('The dashboard has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The dashboard could not be saved. Please, try again.'));
        }
        $this->set(compact('dashboard'));
    }

    /**
     * Edit method
     *
     * @param string|null $id Dashboard id.
     * @return \Cake\Http\Response|null|void Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $dashboard = $this->Dashboard->get($id, [
            'contain' => [],
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $dashboard = $this->Dashboard->patchEntity($dashboard, $this->request->getData());
            if ($this->Dashboard->save($dashboard)) {
                $this->Flash->success(__('The dashboard has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The dashboard could not be saved. Please, try again.'));
        }
        $this->set(compact('dashboard'));
    }

    /**
     * Delete method
     *
     * @param string|null $id Dashboard id.
     * @return \Cake\Http\Response|null|void Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $dashboard = $this->Dashboard->get($id);
        if ($this->Dashboard->delete($dashboard)) {
            $this->Flash->success(__('The dashboard has been deleted.'));
        } else {
            $this->Flash->error(__('The dashboard could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }
}
