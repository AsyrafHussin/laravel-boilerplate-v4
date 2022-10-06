<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Model>
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
     * @return array
     */
    public function admin()
    {
        return $this->state([
            'name' => 'admin',
            'title' => 'admin',
        ]);
    }

    /**
     * Define the user default state.
     *
     * @return array
     */
    public function user()
    {
        return $this->state([
            'name' => 'user',
            'title' => 'user',
        ]);
    }
}
