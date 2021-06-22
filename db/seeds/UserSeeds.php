<?php


use IESLaCierva\Domain\User\ValueObject\Role;
use Phinx\Seed\AbstractSeed;

class UserSeeds extends AbstractSeed
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
        for ($i = 0; $i < 20; $i++) {
            $username = $faker->userName;
            $data[] =
                [
                    'id' => uniqid(),
                    'name' => $faker->name,
                    'username' => $faker->userName,
                    'email' => $faker->email,
                    'password' => password_hash($username, PASSWORD_DEFAULT),
                    'role' => Role::USER
                ];
        }
        $this->table('users')->insert($data)->saveData();
    }
}
