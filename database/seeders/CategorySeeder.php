<?php

namespace Database\Seeders;

use App\Models\Category;
use Illuminate\Database\Seeder;

class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $menu = [
            ['name' => 'Hot Coffees', 'name_ru' => 'Горячие Кофе', 'children' => [
                ['name' => "Espresso", 'name_ru' => "Эспрессо"],
                ['name' => "Americano", 'name_ru' => "Американо"],
                ['name' => "Cappuccino", 'name_ru' => "Капучино"],
                ['name' => "Latte", 'name_ru' => "Латте"],
                ['name' => "Flat White", 'name_ru' => "Флэт Уайт"],
                ['name' => "Macchiato", 'name_ru' => "Маккиато"],
                ['name' => "Mocha", 'name_ru' => "Мокко"],
            ]],
            ['name' => 'Cold Coffees', 'name_ru' => 'Холодные Кофе', 'children' => [
                ['name' => "Iced Coffee", 'name_ru' => "Ледяной Кофе"],
                ['name' => "Iced Americano", 'name_ru' => "Ледяное Американо"],
                ['name' => "Iced Latte", 'name_ru' => "Ледяной Латте"],
                ['name' => "Iced Mocha", 'name_ru' => "Ледяной Мокко"],
            ]],
            ['name' => 'Teas', 'name_ru' => 'Чаи', 'children' => [
                ['name' => "Chai Tea Latte", 'name_ru' => "Чай Латте с Пряностями"],
                ['name' => "Matcha Latte", 'name_ru' => "Матча Латте"],
                ['name' => "London Fog", 'name_ru' => "Лондон Фог"],
                ['name' => "Iced Tea", 'name_ru' => "Ледяной Чай"],
                ['name' => "Iced Matcha Latte", 'name_ru' => "Ледяной Матча Латте"],
            ]],
            ['name' => 'Frappuccinos', 'name_ru' => 'Фраппучино', 'children' => [
                ['name' => "Coffee Frappuccino", 'name_ru' => "Кофейный Фраппучино"],
                ['name' => "Mocha Frappuccino", 'name_ru' => "Мокко Фраппучино"],
                ['name' => "Caramel Frappuccino", 'name_ru' => "Карамельный Фраппучино"],
                ['name' => "Java Chip Frappuccino", 'name_ru' => "Ява Чип Фраппучино"],
                ['name' => "Vanilla Bean Frappuccino", 'name_ru' => "Ванильный Фраппучино"],
            ]],
            ['name' => 'Pastries', 'name_ru' => 'Выпечка', 'children' => [
                ['name' => "Croissant", 'name_ru' => "Круассан"],
                ['name' => "Cheese Danish", 'name_ru' => "Сырный Датский"],
                ['name' => "Blueberry Muffin", 'name_ru' => "Голубичный Маффин"],
                ['name' => "Cake Pops", 'name_ru' => "Пирожные"],
                ['name' => "Chocolate Chip Cookie", 'name_ru' => "Печенье с Шоколадными Кусочками"],
            ]],
            ['name' => 'Sandwiches', 'name_ru' => 'Сэндвичи', 'children' => [
                ['name' => "Chicken Bacon Swiss", 'name_ru' => "Куриный Бекон с Сыром"],
                ['name' => "Turkey & Pesto", 'name_ru' => "Индейка с Песто"],
                ['name' => "Ham & Cheese Croissant", 'name_ru' => "Сэндвич с Ветчиной и Сыром"],
                ['name' => "Spinach Feta Wrap", 'name_ru' => "Обертка с Шпинатом и Фетой"],
            ]],
        ];

        $parentSortOrder = 1;
        foreach ($menu as $category) {
            $parent = Category::create([
                'name' => $category['name'],
                'name_ru' => $category['name_ru'],
                'slug' => str($category['name'])->slug(),
                'sort_order' => $parentSortOrder++
            ]);

            $childSortOrder = 1;
            foreach ($category['children'] as $child) {
                Category::create([
                    'parent_id' => $parent->id,
                    'name' => $child['name'],
                    'name_ru' => $child['name_ru'],
                    'slug' => str($child['name'])->slug(),
                    'sort_order' => $childSortOrder++
                ]);
            }
        }
    }
}
