<?php

namespace Database\Factories;

use App\Models\Announcement;
use App\Models\Categories;
use App\Models\Has_Category;
use App\Models\User;
use Intervention\Image\ImageManagerStatic as Image;
use Illuminate\Database\Eloquent\Factories\Factory;


class AnnouncementFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Announcement::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        $r=rand(0,5);
        $loc=[
            ['name'=>'Opole, Polska','lon'=>'17.9230651','lat'=>'50.6683223'],
            ['name'=>'Strefa Otmęt, Grunwaldzka, Krapkowice, Polska','lon'=>'17.9854468','lat'=>'50.482069'],
            ['name'=>'Politechnika Wrocławska, wybrzeże Stanisława Wyspiańskiego, Wrocław, Polska','lon'=>'21.0122287','lat'=>'52.2296756'],
            ['name'=>"Restauracja McDonald's, Ozimska, Opole, Polska",'lon'=>'17.970252','lat'=>'50.669808'],
            ['name'=>'Irkutsk, Верхняя набережная, Irkuck, Rosja','lon'=>'104.3069577','lat'=>'52.25729980000001'],
            ['name'=>'Trójmiasto II. Apartamenty, Sambora, Gdynia, Polska','lon'=>'18.6466384','lat'=>'54.35202520000001'],
    ];
        return [
            'title'=>$this->faker->sentence($nbWords = 4, $variableNbWords = true).'faker' ,
            'localization'=>$loc[$r]['name'],
            'price'=>rand(10,1000),
            'description'=>$this->faker->text($maxNbChars = 170),
            'expiring_at'=>$this->faker->date($format = 'Y-m-d', $min = 'now'),
            'creator_id'=>User::inRandomOrder()->first()->id,
            'longitude'=>$loc[$r]['lon'],
            'latitude'=>$loc[$r]['lat'],
        ];
    }
    public function configure()
    {
        return $this->afterMaking(function (Announcement $offer) {
            //
        })->afterCreating(function (Announcement $offer) {
            $r=rand(1,4);
            $c=Categories::inRandomOrder()->take($r)->get()->pluck('id')->toArray();
            for($i=0;$i<$r;$i++){
                Has_Category::create(['announcement_id'=>$offer->id,'category_id'=>$c[$i]]);
            }
        });
    

    // ...
}
}
