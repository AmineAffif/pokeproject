<?php
declare(strict_types=1);

use Migrations\AbstractMigration;

class AddMoreSpritesImage extends AbstractMigration
{
    /**
     * Change Method.
     *
     * More information on this method is available here:
     * https://book.cakephp.org/phinx/0/en/migrations.html#the-change-method
     * @return void
     */
    public function change()
    {
        $table = $this->table('pokemons');
        $table->addColumn('default_back_sprite_url', 'string', [
            'default' => null,
            'limit' => 255,
            'null' => false,
            'after' => 'default_front_sprite_url',
        ]);
        $table->addColumn('front_shiny_sprite_url', 'string', [
            'default' => null,
            'limit' => 255,
            'null' => false,
            'after' => 'default_front_sprite_url',
        ]);
        $table->addColumn('back_shiny_sprite_url', 'string', [
            'default' => null,
            'limit' => 255,
            'null' => false,
            'after' => 'default_front_sprite_url',
        ]);
        $table->update();
    }
}
