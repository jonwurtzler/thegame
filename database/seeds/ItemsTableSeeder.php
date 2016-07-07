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
        'name'        => 'Box of Bees',
        'description' => 'The Brian Bell Legacy.',
        'rarity'      => '3',
        'case'        => 'Some'
      ]);

      $this->item->create([
        'name'        => 'Buffalo',
        'description' => 'Absolutely not dying from dysentery today!',
        'rarity'      => '2',
        'case'        => 'Some'
      ]);

      $this->item->create([
        'name'        => 'Buster Sword',
        'description' => 'Save Aeris!! ... too soon?',
        'rarity'      => '3',
        'case'        => 'Some'
      ]);

      $this->item->create([
        'name'        => 'Cardboard Box',
        'description' => 'Shhh. You can\'t see me.',
        'rarity'      => '2',
        'case'        => 'Some'
      ]);

      $this->item->create([
        'name'        => 'Charizard',
        'description' => 'It\'s hard to be a diamond in a rhinestone world.',
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
        'name'        => 'Fus Ro Dah',
        'description' => 'Dragon shout that silences the target.',
        'rarity'      => '3',
        'case'        => 'Some'
      ]);

      $this->item->create([
        'name'        => 'Gold Ring',
        'description' => 'Shiny ring that provides temporary protection from damage.',
        'rarity'      => '2',
        'case'        => 'Some'
      ]);

      $this->item->create([
        'name'        => 'Golden Gun',
        'description' => 'Francisco Scaramanga\'s weapon of choice.',
        'rarity'      => '3',
        'case'        => 'Some'
      ]);

      $this->item->create([
        'name'        => 'Green Shell',
        'description' => 'Throw at opponent to deliver a good thump on the head.',
        'rarity'      => '1',
        'case'        => 'Some'
      ]);

      $this->item->create([
        'name'        => 'Hadouken',
        'description' => 'Burst of energy that pulses through the target and results in temporary after shocks.',
        'rarity'      => '2',
        'case'        => 'Some'
      ]);

      $this->item->create([
        'name'        => 'Hard Knuckle',
        'description' => 'Mega Man face punch.',
        'rarity'      => '2',
        'case'        => 'Some'
      ]);

      $this->item->create([
        'name'        => 'Holy Water',
        'description' => 'Throw at the floor to release temporary holy flames.',
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
        'name'        => 'Master Sword',
        'description' => 'It\'s dangerous to go alone!',
        'rarity'      => '3',
        'case'        => 'Some'
      ]);

      $this->item->create([
        'name'        => 'Miniature Giant Space Hamster',
        'description' => 'Boo is always judging!',
        'rarity'      => '3',
        'case'        => 'Some'
      ]);

      $this->item->create([
        'name'        => 'Moogle',
        'description' => 'Kupo! Your luck is temporarily increased.',
        'rarity'      => '2',
        'case'        => 'Some'
      ]);

      $this->item->create([
        'name'        => 'Mushroom',
        'description' => 'Maybe edible mushroom.',
        'rarity'      => '1',
        'case'        => 'Some'
      ]);

      $this->item->create([
        'name'        => 'Pandora\'s Box',
        'description' => 'What\'s in here? OH NOES!',
        'rarity'      => '3',
        'case'        => 'Some'
      ]);

      $this->item->create([
        'name'        => 'Pizza',
        'description' => 'Michelangelo\'s favorite food, dude.',
        'rarity'      => '1',
        'case'        => 'Some'
      ]);

      $this->item->create([
        'name'        => 'Pokeball',
        'description' => 'Gotta catch \'em all!',
        'rarity'      => '2',
        'case'        => 'Some'
      ]);

      $this->item->create([
        'name'        => 'Pony',
        'description' => 'You are a casual gaming princess! Now harvest those crops, your majesty.',
        'rarity'      => '3',
        'case'        => 'Some'
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
        'name'        => 'SPNKR',
        'description' => 'Heavy weapon that has questionable aim.',
        'rarity'      => '3',
        'case'        => 'Some'
      ]);

      $this->item->create([
        'name'        => 'Star',
        'description' => 'A celestial object that creates temporary invincibility.',
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
        'name'        => 'Varia Suit',
        'description' => 'Sleek pant suit offering significant protection from foes.',
        'rarity'      => '3',
        'case'        => 'Some'
      ]);

      $this->item->create([
        'name'        => 'Warthog',
        'description' => 'Recon vehicle that temporarily increases speed.',
        'rarity'      => '2',
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
