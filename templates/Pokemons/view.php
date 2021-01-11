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



        
        </div>
    </div>
</div>

