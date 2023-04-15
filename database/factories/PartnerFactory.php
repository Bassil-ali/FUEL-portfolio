<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Partner>
 */
class PartnerFactory extends Factory
{
    public function definition(): array
    {
        return [
            'title'         => ['ar' => fake()->name(), 'en' => fake()->name()],
            'description'   => ['ar' => fake()->paragraph(), 'en' => fake()->paragraph()],
            'status'        => fake()->boolean(),
            'admin_id'      => \App\Models\Admin::factory(),
        ];

    }//emdpf

}//emd pf class