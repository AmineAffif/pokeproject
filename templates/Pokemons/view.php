<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Pokemon $pokemon
 */
?>
<head>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</head>

<div class="row" style="margin: 0" >
    <aside class="column">
        <div class="side-nav">
            <h4 class="heading"><?= __('Actions') ?></h4>
            <div class="dashboard_btn_container" style="display:inline-block;margin-right:20px;">
                <?php echo $this->Html->link(" ", array('controller' => 'Dashboard','action'=> 'index'), array( 'class' => 'fa fa-dashboard', 'style' => 'font-size:1.5em;color:purple;' )) ?>
                <?php echo $this->Html->link("Dashboard ", array('controller' => 'Dashboard','action'=> 'index'), array( 'class' => 'button-dashboard')) ?>
            </div>
            <?= $this->Html->link(__('List Pokemons'), ['action' => 'index'], ['class' => 'side-nav-item', 'style' => 'display:inline-block;margin-right:20px']) ?>
            <?= $this->Form->postLink(__('Delete Pokemon'), ['action' => 'delete', $pokemon->id], ['confirm' => __('Are you sure you want to delete # {0}?', $pokemon->id), 'class' => 'side-nav-item', 'style' => 'display:inline-block;']) ?>
        </div>
    </aside>
    <div class="column-responsive column-100">
        <div class="pokemons view content">
            <div class="container">
                <div class="row firstRow">
                    <div class="col-sm">
                        <div style="display: flex; justify-content: center">
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
                <div class="row" style="margin: 0; justify-content: center">
                    <div id="carousel">
                        <div class="item">
                            <!--IF HAS FRONT BASIC IMAGE ?-->
                            <?php if (!is_null($pokemon->default_front_sprite_url)) : ?>
                                <!--BASIC CARD-->
                                <div class="card2 noneD"></div>
                                <div class="card2 noneD"></div>
                                <div class="card2 noneD"></div>
                                <div class="card2" style="background-image: url(<?= $pokemon->default_front_sprite_url; ?>)"></div>
                            <?php endif ?>
                        </div>
                        <div class="item">
                            <!--IF HAS BACK BASIC IMAGE ?-->
                            <?php if (!is_null($pokemon->default_back_sprite_url)) : ?>
                                <!--BASIC CARD-->
                                <div class="card2 noneD"></div>
                                <div class="card2 noneD"></div>
                                <div class="card2 noneD"></div>
                                <div class="card2" style="background-image: url(<?= $pokemon->default_back_sprite_url; ?>)"></div>
                            <?php endif ?>
                        </div>
                        <div class="item">
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
                    <button class="prev" id="prev">&#9668;</button>
                    <button class="next" id="next">&#9658;</button>
                </div>
                </div>
            </div>
        </div>
    </div>
</div>

<!--Script for the carousel-->
<script>
    var ThreeDCarousel = function(el, classname) {
        var element = document.getElementById(el);
        var items = element.getElementsByClassName(classname);
        var classNames = ['two', 'three', 'one'];
        if (items.length !== 3) {
            alert('ThreeDCarousel only supports 3 items.');
            return false;
        } else {
            for (var i = 0; i < 3; i++) {
                items[i].className += " " + classNames[i];
            }
        }

        var obj = {
            element: element,
            items: items,
            prev: function() {
                var l = this.element.getElementsByClassName('one')[0],
                    c = this.element.getElementsByClassName('two')[0],
                    r = this.element.getElementsByClassName('three')[0];
                l.classList.remove('one');
                l.classList.add('two');
                c.classList.remove('two');
                c.classList.add('three');
                r.classList.remove('three');
                r.classList.add('one');
            },
            next: function() {
                var l = this.element.getElementsByClassName('one')[0],
                    c = this.element.getElementsByClassName('two')[0],
                    r = this.element.getElementsByClassName('three')[0];
                l.classList.remove('one');
                l.classList.add('three');
                c.classList.remove('two');
                c.classList.add('one');
                r.classList.remove('three');
                r.classList.add('two');
            }
        };
        return obj;
    };

    var carousel = new ThreeDCarousel('carousel', 'item');


    var next = document.getElementById('next');
    next.onclick = carousel.next.bind(carousel);

    var prev = document.getElementById('prev');
    prev.onclick = carousel.prev.bind(carousel);

    // Check window size to change carousel speed
    function myFunction(x) {
        if (x.matches) { // If media query matches
            var auto = setInterval(function() { carousel.next(); }, 2000);
        } else {
            var auto = setInterval(function() { carousel.next(); }, 6000);
        }
    }

    var x = window.matchMedia("(max-width: 500px)")
    myFunction(x) // Call listener function at run time
    x.addListener(myFunction) // Attach listener function on state changes
</script>
