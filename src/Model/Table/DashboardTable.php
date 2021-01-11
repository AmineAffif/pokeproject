<?php
declare(strict_types=1);

namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * Pokemons Model
 *
 * @property \App\Model\Table\PokemonStatsTable&\Cake\ORM\Association\HasMany $PokemonStats
 * @property \App\Model\Table\PokemonTypesTable&\Cake\ORM\Association\HasMany $PokemonTypes
 *
 * @method \App\Model\Entity\Pokemon newEmptyEntity()
 * @method \App\Model\Entity\Pokemon newEntity(array $data, array $options = [])
 * @method \App\Model\Entity\Pokemon[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\Pokemon get($primaryKey, $options = [])
 * @method \App\Model\Entity\Pokemon findOrCreate($search, ?callable $callback = null, $options = [])
 * @method \App\Model\Entity\Pokemon patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\Pokemon[] patchEntities(iterable $entities, array $data, array $options = [])
 * @method \App\Model\Entity\Pokemon|false save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\Pokemon saveOrFail(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\Pokemon[]|\Cake\Datasource\ResultSetInterface|false saveMany(iterable $entities, $options = [])
 * @method \App\Model\Entity\Pokemon[]|\Cake\Datasource\ResultSetInterface saveManyOrFail(iterable $entities, $options = [])
 * @method \App\Model\Entity\Pokemon[]|\Cake\Datasource\ResultSetInterface|false deleteMany(iterable $entities, $options = [])
 * @method \App\Model\Entity\Pokemon[]|\Cake\Datasource\ResultSetInterface deleteManyOrFail(iterable $entities, $options = [])
 *
 * @mixin \Cake\ORM\Behavior\TimestampBehavior
 */
class DashboardTable extends Table
{
    /**
     * Initialize method
     *
     * @param array $config The configuration for the Table.
     * @return void
     */
    public function initialize(array $config): void
    {
        parent::initialize($config);

        $this->setTable('pokemons');
        $this->setDisplayField('name');
        $this->setPrimaryKey('id');

        $this->addBehavior('Timestamp');

        $this->hasMany('PokemonStats', [
            'foreignKey' => 'pokemon_id',
            'saveStrategy' => 'replace',
        ]);
        $this->hasMany('PokemonTypes', [
            'foreignKey' => 'pokemon_id',
            'saveStrategy' => 'replace',
        ]);
    }

    /**
     * Default validation rules.
     *
     * @param \Cake\Validation\Validator $validator Validator instance.
     * @return \Cake\Validation\Validator
     */
    public function validationDefault(Validator $validator): Validator
    {
        $validator
            ->integer('id')
            ->allowEmptyString('id', null, 'create');

        $validator
            ->scalar('name')
            ->maxLength('name', 255)
            ->requirePresence('name', 'create')
            ->notEmptyString('name');

        $validator
            ->integer('height')
            ->requirePresence('height', 'create')
            ->notEmptyString('height');

        $validator
            ->integer('weight')
            ->requirePresence('weight', 'create')
            ->notEmptyString('weight');

        $validator
            ->scalar('default_front_sprite_url')
            ->maxLength('default_front_sprite_url', 255)
            ->requirePresence('default_front_sprite_url', 'create')
            ->allowEmptyString('default_front_sprite_url');

        $validator
            ->scalar('default_back_sprite_url')
            ->maxLength('default_back_sprite_url', 255)
            ->requirePresence('default_back_sprite_url', 'create')
            ->allowEmptyString('default_back_sprite_url');

        $validator
            ->scalar('front_shiny_sprite_url')
            ->maxLength('front_shiny_sprite_url', 255)
            ->requirePresence('front_shiny_sprite_url', 'create')
            ->allowEmptyString('front_shiny_sprite_url');

        $validator
            ->scalar('back_shiny_sprite_url')
            ->maxLength('back_shiny_sprite_url', 255)
            ->requirePresence('back_shiny_sprite_url', 'create')
            ->allowEmptyString('back_shiny_sprite_url');

        return $validator;
    }

    /**
     * Format Data for save
     *
     * @param array $pokeApiData Data from Poke Api
     * @return array
     */
    public function formatDataForSave($pokeApiData)
    {
        $pokemonStats = $this->PokemonStats->formatDataForSave($pokeApiData['stats']);
        $pokemonTypes = $this->PokemonTypes->formatDataForSave($pokeApiData['types']);

        return [
            'pokedex_number' => $pokeApiData['id'],
            'name' => $pokeApiData['name'],

            'default_front_sprite_url' => $pokeApiData['sprites']['front_default'],
            'default_back_sprite_url' => $pokeApiData['sprites']['back_default'],
            'front_shiny_sprite_url' => $pokeApiData['sprites']['front_shiny'],
            'back_shiny_sprite_url' => $pokeApiData['sprites']['back_shiny'],

            'height' => $pokeApiData['height'],
            'weight' => $pokeApiData['weight'],
            'pokemon_stats' => $pokemonStats,
            'pokemon_types' => $pokemonTypes,

            'hp' => $pokeApiData['stats'][0]['base_stat'],
            'defense' => $pokeApiData['stats'][2]['base_stat'],
            'attack' => $pokeApiData['stats'][1]['base_stat'],
            'special_attack' => $pokeApiData['stats'][3]['base_stat'],
            'special_defense' => $pokeApiData['stats'][4]['base_stat'],
            'speed' => $pokeApiData['stats'][5]['base_stat'],
        ];
    }
}