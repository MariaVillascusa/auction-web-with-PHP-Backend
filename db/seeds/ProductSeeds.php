<?php


use Phinx\Seed\AbstractSeed;

class ProductSeeds extends AbstractSeed
{
    /**
     * Run Method.
     *
     * Write your database seeder using this method.
     *
     * More information on writing seeders is available here:
     * https://book.cakephp.org/phinx/0/en/seeding.html
     */
    public function run()
    {
        $faker = Faker\Factory::create('es_ES');
        $data = [];
        for ($i = 0; $i < 10; $i++) {
            $username = $faker->userName;
            $data[] =
                [
                    'id' => uniqid(),
                    'name' => $faker->text(30),
                    'price' => $faker->randomNumber(3),
                    'description' => $faker->text(100),
                    'datetime' => $faker->date('Y-m-d','+1 year'),
                    'image' => $faker->imageUrl(640, 480, 'technics')
                ];
        }
        $this->table('products')->insert($data)->saveData();
    }

}
