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
            <div class="dashboard_btn_container" style="display:inline-block;margin-right:20px;">
                <?php echo $this->Html->link(" ", array('controller' => 'Dashboard','action'=> 'index'), array( 'class' => 'fa fa-dashboard', 'style' => 'font-size:1.5em;color:purple;' )) ?>
                <?php echo $this->Html->link("Dashboard ", array('controller' => 'Dashboard','action'=> 'index'), array( 'class' => 'button-dashboard')) ?>
            </div>
            <?= $this->Html->link(__('List Pokemons'), ['action' => 'index'], ['class' => 'side-nav-item', 'style' => 'display:inline-block;margin-right:20px']) ?>
            <?= $this->Form->postLink(__('Delete Pokemon'), ['action' => 'delete', $pokemon->id], ['confirm' => __('Are you sure you want to delete # {0}?', $pokemon->id), 'class' => 'side-nav-item', 'style' => 'display:inline-block;']) ?>
        </div>
    </aside>
    <div class="column-responsive column-80">
        <div class="pokemons view content">

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


                </div>
            <div class="row secondRow">
                <div style="margin: 40px;"></div>
                <div class="container slider-ct">
                    <div class="row slide-wr">
                        <div class="col-sm-4 slide">
                            <!--IF HAS FRONT BASIC IMAGE ?-->
                            <?php if (!is_null($pokemon->default_front_sprite_url)) : ?>
                                <!--BASIC CARD-->
                                <div class="card2 noneD"></div>
                                <div class="card2 noneD"></div>
                                <div class="card2 noneD"></div>
                                <div class="card2" style="background-image: url(<?= $pokemon->default_front_sprite_url; ?>)"></div>
                            <?php endif ?>
                        </div>
                        <div class="col-sm-4 slide">
                            <!--IF HAS BACK BASIC IMAGE ?-->
                            <?php if (!is_null($pokemon->default_back_sprite_url)) : ?>
                                <!--BASIC CARD-->
                                <div class="card2 noneD"></div>
                                <div class="card2 noneD"></div>
                                <div class="card2 noneD"></div>
                                <div class="card2" style="background-image: url(<?= $pokemon->default_back_sprite_url; ?>)"></div>
                            <?php endif ?>
                        </div>
                        <div class="col-sm-4 slide">
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
                    <button id="back" style="background-color: #6e16a4">&lt; </button>
                    <button id="forward" style="background-color: #6e16a4"> &gt;</button>
                </div>
            </div>
            </div>
        </div>
    </div>
</div>







<script>
    var slider = document.querySelector(".slide-wr");

    document.getElementById("back").onclick = () => {
        const c = 33.33;
        let left = slider.style.transform.split("%")[0].split("(")[1];
        if (left) {
            var num = Number(left) + Number(c);
        } else {
            var num = Number(c);
        }
        slider.style.transform = `translateX(${num}%)`;

        if (left == -166.65) {
            slider.addEventListener("transitionend", myfunc);
            function myfunc() {
                this.style.transition = "none";
                this.style.transform = `translateX(-299.97%)`;
                slider.removeEventListener("transitionend", myfunc);
            }
        } else {
            slider.style.transition = "all 0.5s";
        }
    };

    document.getElementById("forward").onclick = () => {
        const c = -33.33;
        let left = slider.style.transform.split("%")[0].split("(")[1];
        if (left) {
            var num = Number(left) + Number(c);
        } else {
            var num = Number(c);
        }

        slider.style.transform = `translateX(${num}%)`;

        if (left == -299.97) {
            console.log("reached the border");
            slider.addEventListener("transitionend", myfunc);
            function myfunc() {
                this.style.transition = "none";
                this.style.transform = `translateX(-166.65%)`;
                slider.removeEventListener("transitionend", myfunc);
            }
        } else {
            slider.style.transition = "all 0.5s";
        }
    };

    const sliderChildren = document.getElementsByClassName("slide-wr")[0].children;
    slider.style.transform = `translateX(${sliderChildren.length * -33.33}%)`;
    Array.from(sliderChildren)
        .slice()
        .reverse()
        .forEach((child) => {
            let cln = child.cloneNode(true);
            cln.classList += " cloned before";
            slider.insertBefore(cln, sliderChildren[0]);
        });

    Array.from(sliderChildren).forEach((child) => {
        let cln = child.cloneNode(true);
        if (child.classList.contains("cloned") === false) {
            cln.classList += " cloned after";
            slider.appendChild(cln);
        }
    });

</script>


