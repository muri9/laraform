<?php

namespace Database\Factories;

use App\Models\Claim;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

class ClaimFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Claim::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        $user = User::where('email','client@example.com')->first();
        return [
            'user_id' => $user->id,
            'subject' => $this->faker->realText(30),
            'message' => $this->faker->realTextBetween(100,300),
            'mark' => $this->faker->boolean,
        ];
    }
}
