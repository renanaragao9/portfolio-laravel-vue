<?php

namespace Database\Factories;

use App\Models\Category;
use Illuminate\Database\Eloquent\Factories\Factory;

class CategoryFactory extends Factory
{
    protected $model = Category::class;

    public function definition(): array
    {
        return [
            'name' => fake()->unique()->randomElement([
                'Educação',
                'Saúde',
                'Meio Ambiente',
                'Animais',
                'Direitos Humanos',
                'Esportes',
                'Cultura',
                'Tecnologia',
                'Alimentação',
                'Habitação',
                'Emergências',
                'Desenvolvimento Comunitário',
                'Arte e Entretenimento',
                'Pesquisa Científica',
                'Religião',
                'Política',
                'Economia',
                'Turismo',
                'Agricultura',
                'Energia',
            ]),
            'icon' => fake()->randomElement(['fa-graduation-cap', 'fa-heart', 'fa-leaf', 'fa-paw', 'fa-users', 'fa-futbol', 'fa-palette', 'fa-laptop', 'fa-utensils', 'fa-home', 'fa-exclamation-triangle', 'fa-building', 'fa-music', 'fa-microscope', 'fa-pray', 'fa-gavel', 'fa-chart-line', 'fa-plane', 'fa-seedling', 'fa-bolt']),
        ];
    }
}
