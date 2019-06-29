<?php

use Illuminate\Database\Seeder;
use App\User;
use App\Model\Student;

class UsersAndStudentsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker = Faker\Factory::create('id_ID');

        for ($i = 0; $i < 100; $i++) {
            $data = $this->studentDataGenerator($faker);
            $user = User::create([
                'name' => $faker->name,
                'username' => $data["nim"],
                'email' => $faker->unique()->freeEmail,
                'password' => Hash::make('primakaraluarbiasa'),
                'admin' => false
            ]);

            $user->student()->create([
                'department' => $data["department"],
                'generation' => $data["generation"],
                'phone_number' => $faker->phoneNumber
            ]);
        }
    }

    private function studentDataGenerator(Faker\Generator $faker) {
        $generation = $faker->randomElement([16, 17, 18]);
        $department = $faker->randomElement([1, 2, 3]);
        $number = $faker->unique()->numberBetween(1, 100);

        $nim = $generation . "01" . sprintf("%02d", $department) . sprintf("%04d", $number);

        return compact('nim', 'generation', 'department');
    }
}
