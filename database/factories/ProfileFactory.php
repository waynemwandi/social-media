<?php

namespace Database\Factories;

use App\Models\Profile;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;
use Illuminate\Support\Arr;

class ProfileFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Profile::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {

        $gender = ['Male', 'Female', 'NA'];
        $slug = $this->faker->name();

        return [
            'slug' => Str::of($slug)->slug('-'),
            'gender' => Arr::random($gender),
        ];
    }
}
