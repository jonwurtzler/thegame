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
        'name'        => 'Banana Peel',
        'description' => 'Person behind you 50% chance -100 points',
        'rarity'      => '1',
        'case'        => 'Some'
      ]);

      $this->item->create([
        'name'        => 'Biggs',
        'description' => 'Red Wing soldier that bolsters your confidence.',
        'rarity'      => '1',
        'case'        => 'Some'
      ]);

      $this->item->create([
        'name'        => 'Bo Jackson',
        'description' => 'TOUCHDOWN!',
        'rarity'      => '1',
        'case'        => 'Some'
      ]);

      $this->item->create([
        'name'        => 'Buffalo',
        'description' => 'Absolutely not dying from dysentery today!',
        'rarity'      => '2',
        'case'        => 'Some'
      ]);

      $this->item->create([
        'name'        => 'Cardboard Box',
        'description' => 'Shhh. You can\'t see me.',
        'rarity'      => '2',
        'case'        => 'Some'
      ]);

      $this->item->create([
        'name'        => 'Crowbar',
        'description' => 'Gordon Freeman\'s weapon of choice.',
        'rarity'      => '1',
        'case'        => 'Some'
      ]);

      $this->item->create([
        'name'        => 'Da Da Da Da Daaa Da DAA da da',
        'description' => 'The victory song that delivers a sweet reward.',
        'rarity'      => '2',
        'case'        => 'Some'
      ]);

      $this->item->create([
        'name'        => 'Fire Flower',
        'description' => 'Throw balls of actual fire. Literally.',
        'rarity'      => '1',
        'case'        => 'Some'
      ]);

      $this->item->create([
        'name'        => 'Gold Ring',
        'description' => 'Shiny ring that provides temporary protection from damage.',
        'rarity'      => '2',
        'case'        => 'Some'
      ]);

      $this->item->create([
        'name'        => 'Green Shell',
        'description' => 'Throw at opponent to deliver a good thump on the head.',
        'rarity'      => '1',
        'case'        => 'Some'
      ]);

      $this->item->create([
        'name'        => 'Hard Knuckle',
        'description' => 'Mega Man face punch.',
        'rarity'      => '2',
        'case'        => 'Some'
      ]);

      $this->item->create([
        'name'        => 'Leeroy Jenkins',
        'description' => 'Absolutely pathetic battle cry.',
        'rarity'      => '3',
        'case'        => 'Some'
      ]);

      $this->item->create([
        'name'        => 'Moogle',
        'description' => '',
        'rarity'      => '2',
        'case'        => ''
      ]);

      $this->item->create([
        'name'        => 'Mushroom',
        'description' => 'Maybe edible mushroom.',
        'rarity'      => '1',
        'case'        => 'Some'
      ]);

      $this->item->create([
        'name'        => 'Pizza',
        'description' => '',
        'rarity'      => '',
        'case'        => ''
      ]);

      $this->item->create([
        'name'        => 'Red Crystal',
        'description' => 'You have the power of tornadoes! Take that Deborah Cliff.',
        'rarity'      => '3',
        'case'        => 'Some'
      ]);

      $this->item->create([
        'name'        => 'Red Shell',
        'description' => 'Toss ahead of you to unsuspecting victim.',
        'rarity'      => '1',
        'case'        => 'Some'
      ]);

      $this->item->create([
        'name'        => 'Rush the Dog',
        'description' => 'Loyal canine sidekick that can boost a hero\'s spirit.',
        'rarity'      => '3',
        'case'        => 'Some'
      ]);

      $this->item->create([
        'name'        => 'Tanooki Suit',
        'description' => 'Adorable suit that provides temporary protection from attacks.',
        'rarity'      => '2',
        'case'        => 'Some'
      ]);

      $this->item->create([
        'name'        => 'UUDDLRLRBA',
        'description' => 'Konami Code always gives a nice boost.',
        'rarity'      => '1',
        'case'        => 'Some'
      ]);

      $this->item->create([
        'name'        => 'Wedge',
        'description' => 'Red Wing soldier that bolsters your confidence.',
        'rarity'      => '1',
        'case'        => 'Some'
      ]);
    }
}
