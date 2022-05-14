<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;
use function Symfony\Component\Finder\name;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Cattle>
 */
class CattleFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            'feed_id'=>rand(1,5),
            'parent_id'=>rand(1,5),
            'cattle_type_id'=>rand(1,5),
            'dry_id'=>rand(1,5),
            'dead_id'=>rand(1,5),
            'account_head_id'=>rand(1,5),
            'serial_no'=>rand(1,5),
            'dob' => now(),
            'entry_in_farm'=>now(),
            'age'=>rand(1,2),
            'breed'=>$this->faker->name(),
            'gender'=>$this->faker->name(),
            'weight'=>'1',
            'height'=>'1'

        ];
    }
}
