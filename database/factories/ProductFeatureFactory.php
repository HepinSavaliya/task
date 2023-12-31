<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\Product;
use App\Models\ProductFeature;
use Faker\Generator as Faker;
/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\ProductFeature>
 */
class ProductFeatureFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    protected $model = ProductFeature::class;

    public function definition(): array
    {
        return [
            'product_id' => Product::factory()->create()->id,
            'name' => $this->faker->word,
            'value'=>$this->faker->word
        ];
    }
}
