<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Role>
 */
class RoleFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            //
        ];
    }

    /**
     * Define the admin default state.
     *
     * @return static
     */
    public function admin()
    {
        return $this->state(fn (array $attributes) => [
            'name' => 'admin',
            'title' => 'admin',
        ]);
    }

    /**
     * Define the user default state.
     *
     * @return static
     */
    public function user()
    {
        return $this->state(fn (array $attributes) => [
            'name' => 'user',
            'title' => 'user',
        ]);
    }
}
