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
            'Hot Coffees' => [ // Горячие Кофе
                "Espresso" => "Эспрессо",
                "Americano" => "Американо",
                "Cappuccino" => "Капучино",
                "Latte" => "Латте",
                "Flat White" => "Флэт Уайт",
                "Macchiato" => "Маккиато",
                "Mocha" => "Мокко",
            ],
            'Cold Coffees' => [ // Холодные Кофе
                "Iced Coffee" => "Ледяной Кофе",
                "Iced Americano" => "Ледяное Американо",
                "Iced Latte" => "Ледяной Латте",
                "Iced Mocha" => "Ледяной Мокко",
            ],
            'Teas' => [ // Чаи
                "Chai Tea Latte" => "Чай Латте с Пряностями",
                "Matcha Latte" => "Матча Латте",
                "London Fog" => "Лондон Фог",
                "Iced Tea" => "Ледяной Чай",
                "Iced Matcha Latte" => "Ледяной Матча Латте",
            ],
            'Refreshers' => [ // Освежители
                "Strawberry Acai Refresher" => "Стробери Асаи Рефрешер",
                "Mango Dragonfruit Refresher" => "Манго Драгонфрут Рефрешер",
                "Violet Drink" => "Фиолетовый Напиток",
                "Pink Drink" => "Розовый Напиток"
            ],
            'Frappuccinos' => [ // Фраппучино
                "Coffee Frappuccino" => "Кофейный Фраппучино",
                "Mocha Frappuccino" => "Мокко Фраппучино",
                "Caramel Frappuccino" => "Карамельный Фраппучино",
                "Java Chip Frappuccino" => "Ява Чип Фраппучино",
                "Vanilla Bean Frappuccino" => "Ванильный Фраппучино",
            ],
            'Pastries' => [ // Выпечка
                "Croissant" => "Круассан",
                "Cheese Danish" => "Сырный Датский",
                "Blueberry Muffin" => "Голубичный Маффин",
                "Cake Pops" => "Пирожные",
                "Chocolate Chip Cookie" => "Печенье с Шоколадными Кусочками",
            ],
            'Sandwiches' => [ // Сэндвичи
                "Chicken Bacon Swiss" => "Куриный Бекон с Сыром",
                "Turkey & Pesto" => "Индейка с Песто",
                "Ham & Cheese Croissant" => "Сэндвич с Ветчиной и Сыром",
                "Spinach Feta Wrap" => "Обертка с Шпинатом и Фетой",
            ],
            'Seasonal' => [ // Сезонные
                "Pumpkin Spice Latte" => "Пампкин Спайс Латте",
                "Peppermint Mocha" => "Мокко с Мятой",
                "Caramel Brûléed Latte" => "Карамельный Латте с Кремом",
            ]
        ];

        $parentSortOrder = 1;
        foreach ($menu as $parentName => $children) {
            $parent = Category::create([
                'name' => $parentName,
                'slug' => str($parentName)->slug(),
                'sort_order' => $parentSortOrder++
            ]);

            $childSortOrder = 1;
            foreach ($children as $childName => $childNameRu) {
                Category::create([
                    'parent_id' => $parent->id,
                    'name' => $childName,
                    'name_ru' => $childNameRu,
                    'slug' => str($childName)->slug(),
                    'sort_order' => $childSortOrder++
                ]);
            }
        }
    }
}
