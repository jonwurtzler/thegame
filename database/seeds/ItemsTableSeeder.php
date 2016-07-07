<?php

use App\Item;
use Illuminate\Database\Seeder;

class ItemsTableSeeder extends Seeder
{

  /**
   * @var Item
   */
  private $item;

  /**
   * ItemsTableSeeder constructor.
   */
  public function __construct() {
    $this->item = new Item();
  }

  /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
      $this->item->create([
        'name'        => 'Moogle',
        'description' => '',
        'rarity'      => '2',
        'case'        => ''
      ]);

      $this->item->create([
        'name'        => 'Tanooki Suit',
        'description' => '',
        'rarity'      => '2',
        'case'        => ''
      ]);

      $this->item->create([
        'name'        => 'Banana Peel',
        'description' => 'Person behind you 50% chance -100 points',
        'rarity'      => '1',
        'case'        => 'Some'
      ]);

      $this->item->create([
        'name'        => 'Cardboard Box',
        'description' => 'Shhh. You can\'t see me.',
        'rarity'      => '2',
        'case'        => 'Some'
      ]);

      $this->item->create([
        'name'        => 'Leeroy Jenkins',
        'description' => 'Absolutely pathetic battle cry.',
        'rarity'      => '3',
        'case'        => 'Some'
      ]);
    }
}
