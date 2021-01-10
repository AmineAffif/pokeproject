<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Pokemon $pokemon
 */
?>
<div class="row">
    <aside class="column">
        <div class="side-nav">
            <h4 class="heading"><?= __('Actions') ?></h4>
            <?= $this->Form->postLink(__('Delete Pokemon'), ['action' => 'delete', $pokemon->id], ['confirm' => __('Are you sure you want to delete # {0}?', $pokemon->id), 'class' => 'side-nav-item']) ?>
            <?= $this->Html->link(__('List Pokemons'), ['action' => 'index'], ['class' => 'side-nav-item']) ?>
        </div>
    </aside>
    <div class="column-responsive column-80">
        <div class="pokemons view content">
            <!--
            <h3><?= h($pokemon->name) ?></h3>
            <table>
                <tr>
                    <th><?= __('Name') ?></th>
                    <td><?= h($pokemon->name) ?></td>
                </tr>
                <tr>
                    <th><?= __('Default Front Sprite Url') ?></th>
                    <td><?= h($pokemon->default_front_sprite_url) ?></td>
                    <?= $a = h($pokemon->default_front_sprite_url) ?>
                </tr>
                <tr>
                    <th><?= __('Id') ?></th>
                    <td><?= $this->Number->format($pokemon->id) ?></td>
                </tr>
                <tr>
                    <th><?= __('Height') ?></th>
                    <td><?= $this->Number->format($pokemon->height) ?></td>
                </tr>
                <tr>
                    <th><?= __('Weight') ?></th>
                    <td><?= $this->Number->format($pokemon->weight) ?></td>
                </tr>
                <tr>
                    <th><?= __('Pokedex Number') ?></th>
                    <td><?= $this->Number->format($pokemon->pokedex_number) ?></td>
                </tr>
                <tr>
                    <th><?= __('Created') ?></th>
                    <td><?= h($pokemon->created) ?></td>
                </tr>
                <tr>
                    <th><?= __('Modified') ?></th>
                    <td><?= h($pokemon->modified) ?></td>
                </tr>
            </table>
            !-->
            <div class="container">
                <div class="row firstRow">
                    <div class="col-sm">
                        <div>


                            <!--BASIC CARD-->
                            <div class="card2 noneD"></div>
                            <div class="card2 noneD"></div>
                            <div class="card2 noneD"></div>
                            <div class="card2" style="background-image: url(<?= $pokemon->default_front_sprite_url; ?>)"></div>

                        </div>
                    </div>
                    <div class="col-sm">
                        <div>



                            <h3 class="spTitle"><?= ucfirst($pokemon->name) ?></h3>
                            <div class="card c2">
                                <h3 class="card__type <?= $pokemon->first_type ?>">
                                <?= $pokemon->first_type ?>
                                </h3>

                                <?php if ($pokemon->has_second_type) : ?>
                                    <h3 class="card__second_type <?= $pokemon->second_type ?>">
                                        <?= $pokemon->second_type ?>
                                    </h3>
                                <?php endif ?>
                            </div>

                        </div>
                        <div>
                            <table class="table table-bordered">
                                <tr>
                                    <th>HP</th>
                                    <td><?= $pokemon->hp ?></td>
                                </tr>
                                <tr>
                                    <th>Defense</th>
                                    <td><?= $pokemon->defense ?></td>
                                </tr>
                                <tr>
                                    <th>Attack</th>
                                    <td><?= $pokemon->attack ?></td>
                                </tr>
                                <tr>
                                    <th>Special Defense</th>
                                    <td><?= $pokemon->special_defense ?></td>
                                </tr>
                                <tr>
                                    <th>Special Attack</th>
                                    <td><?= $pokemon->special_attack ?></td>
                                </tr>
                                <tr>
                                    <th>Speed</th>
                                    <td><?= $pokemon->speed ?></td>
                                </tr>
                            </table>

                        </div>
                    </div>
                </div>
                <div class="row">



                </div>

            </div>
                <div class="row secondRow">
                    <!--IF HAS FRONT BASIC IMAGE ?-->
                    <?php if (!is_null($pokemon->default_front_sprite_url)) : ?>
                        <!--BASIC CARD-->
                        <div class="card2 noneD"></div>
                        <div class="card2 noneD"></div>
                        <div class="card2 noneD"></div>
                        <div class="card2" style="background-image: url(<?= $pokemon->default_front_sprite_url; ?>)"></div>
                    <?php endif ?>

                    <!--IF HAS BACK BASIC IMAGE ?-->
                    <?php if (!is_null($pokemon->default_back_sprite_url)) : ?>
                        <!--BASIC CARD-->
                        <div class="card2 noneD"></div>
                        <div class="card2 noneD"></div>
                        <div class="card2 noneD"></div>
                        <div class="card2" style="background-image: url(<?= $pokemon->default_back_sprite_url; ?>)"></div>
                    <?php endif ?>

                    <!--IF HAS FRONT SHINY IMAGE ?-->
                    <?php if (!is_null($pokemon->front_shiny_sprite_url)) : ?>
                        <!--SHINY CARD-->
                        <div class="card3 noneD"></div>
                        <div class="card3 noneD"></div>
                        <div class="card3 noneD"></div>
                        <div class="card3" style="background-image: url(<?= $pokemon->front_shiny_sprite_url; ?>)"></div>
                    <?php endif ?>



                </div>
            </div>



            <div class="related">
                <h4><?= __('Related Pokemon Stats') ?></h4>
                <?php if (!empty($pokemon->pokemon_stats)) : ?>
                <div class="table-responsive">
                    <table>
                        <tr>
                            <th><?= __('Id') ?></th>
                            <th><?= __('Pokemon Id') ?></th>
                            <th><?= __('Stat Id') ?></th>
                            <th><?= __('Value') ?></th>
                            <th class="actions"><?= __('Actions') ?></th>
                        </tr>
                        <?php foreach ($pokemon->pokemon_stats as $pokemonStats) : ?>
                        <tr>
                            <td><?= h($pokemonStats->id) ?></td>
                            <td><?= h($pokemonStats->pokemon_id) ?></td>
                            <td><?= h($pokemonStats->stat_id) ?></td>
                            <td><?= h($pokemonStats->value) ?></td>
                            <td class="actions">
                                <?= $this->Html->link(__('View'), ['controller' => 'PokemonStats', 'action' => 'view', $pokemonStats->id]) ?>
                                <?= $this->Html->link(__('Edit'), ['controller' => 'PokemonStats', 'action' => 'edit', $pokemonStats->id]) ?>
                                <?= $this->Form->postLink(__('Delete'), ['controller' => 'PokemonStats', 'action' => 'delete', $pokemonStats->id], ['confirm' => __('Are you sure you want to delete # {0}?', $pokemonStats->id)]) ?>
                            </td>
                        </tr>
                        <?php endforeach; ?>
                    </table>
                </div>
                <?php endif; ?>
            </div>
            <div class="related">
                <h4><?= __('Related Pokemon Types') ?></h4>
                <?php if (!empty($pokemon->pokemon_types)) : ?>
                <div class="table-responsive">
                    <table>
                        <tr>
                            <th><?= __('Id') ?></th>
                            <th><?= __('Pokemon Id') ?></th>
                            <th><?= __('Type Id') ?></th>
                            <th><?= __('Created') ?></th>
                            <th><?= __('Modified') ?></th>
                            <th class="actions"><?= __('Actions') ?></th>
                        </tr>
                        <?php foreach ($pokemon->pokemon_types as $pokemonTypes) : ?>
                        <tr>
                            <td><?= h($pokemonTypes->id) ?></td>
                            <td><?= h($pokemonTypes->pokemon_id) ?></td>
                            <td><?= h($pokemonTypes->type_id) ?></td>
                            <td><?= h($pokemonTypes->created) ?></td>
                            <td><?= h($pokemonTypes->modified) ?></td>
                            <td class="actions">
                                <?= $this->Html->link(__('View'), ['controller' => 'PokemonTypes', 'action' => 'view', $pokemonTypes->id]) ?>
                                <?= $this->Html->link(__('Edit'), ['controller' => 'PokemonTypes', 'action' => 'edit', $pokemonTypes->id]) ?>
                                <?= $this->Form->postLink(__('Delete'), ['controller' => 'PokemonTypes', 'action' => 'delete', $pokemonTypes->id], ['confirm' => __('Are you sure you want to delete # {0}?', $pokemonTypes->id)]) ?>
                            </td>
                        </tr>
                        <?php endforeach; ?>
                    </table>
                </div>
                <?php endif; ?>
            </div>
        </div>
    </div>
</div>
