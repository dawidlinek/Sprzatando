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
        return [
            'title'=>$this->faker->sentence($nbWords = 4, $variableNbWords = true).'faker' ,
            'localization'=>$this->faker->address,
            'price'=>rand(10,1000),
            'description'=>$this->faker->text($maxNbChars = 170),
            'expiring_at'=>$this->faker->date($format = 'Y-m-d', $min = 'now'),
            'creator_id'=>User::inRandomOrder()->first()->id,
            'longitude'=>$this->faker->longitude(),
            'latitude'=>$this->faker->longitude(),
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
