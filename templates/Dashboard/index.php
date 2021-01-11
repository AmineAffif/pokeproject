<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Dashboard $row
 * @var \App\Model\Entity\Dashboard $data
 * @var \App\Model\Entity\Dashboard $nBPokemon4th
 * @var \App\Model\Entity\Dashboard $allWeight
 * @var \App\Model\Entity\Dashboard $data4th
 * @var \App\Model\Entity\Dashboard $avgWeight
 * @var \App\Model\Entity\Dashboard $allFairyPokemons
 * @var \App\Model\Entity\Dashboard $nBPokemon1th3th7th
 * @var \App\Model\Entity\Dashboard $speedNameTab
 */
?>


<div class="container2">
    <div class="container-top2">
        <!--AVG Weight-->
        <div class="left2">
            <h2 style="text-decoration: underline; margin-top: 30px">Poids moyen - 4ème génération</h2>
            <h4>Pour les <?= $nBPokemon4th ?> Pokémons de la 4ème générations, le poids moyen des Pokémons est <strong><?= $avgWeight ?></strong>.</h4>
        </div>
        <!--Nb Pokemon Fairy type-->
        <div class="left2">
            <h2 style="text-decoration: underline; margin-top: 30px">Pokémons de type fée - 1ere, 3ème, 7ème génération</h2>
            <h4>Parmis les générations 1, 3 et 7 il y a <strong><?= $nBPokemon1th3th7th ?></strong> Pokémons de type fée.</h4>
        </div>
    </div>
</div>


<!--TOP 10-->
<div class="container2">
    <div class="container-top2">
        <h2 style="margin-top: 30px;text-decoration: underline">Top 10 des Pokémon les plus rapides :</h2>

        <div class="divTable">
            <div class="divTableBody">
                <div class="divTableRow">
                    <div class="divTableCell" style="font-weight: bold; font-size: 1.25em">Classement</div>
                    <div class="divTableCell" style="font-weight: bold; font-size: 1.25em">Pokémon</div>
                    <div class="divTableCell" style="font-weight: bold; font-size: 1.25em">Speed</div>
                </div>
                <?php $increment = 0 ?>
                <?php foreach ($speedNameTab as $row => $value) : ?>
                    <?php if ($row < 10) : ?>
                        <?php $increment += 1 ?>
                        <div class="divTableRow">
                            <div class="divTableCell"><?= $increment ?></div>
                            <div class="divTableCell"><?= $value[1] ?></div>
                            <div class="divTableCell"><?= $value[0] ?></div>
                        </div>
                    <?php endif; ?>
                <?php endforeach; ?>
            </div>
        </div>


    </div>
</div>
