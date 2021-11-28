<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {

        $this->call([
            UserSeed::class,
        ]);
        factory('App\Models\User',5)->create();

        \App\Models\Configration::create([
            "website_name"=> "alahsan scools",
            "email"=>  "alahsan@alahsan.com",
            "address"=>  "suida",
            "phone"=> "01010079798",
            "phone2"=>"01010562643",
            "facebook"=>"www.fb.com",
            "twitter"=> "https://twitter.com/",
            "instagram" => "https://www.instagram.com/",
            "whatsapp"=>"01010075781",
            "description"=>"من نحن - اهدافنا - رؤيتنا",
            "about"=> "مدارس الاحسان المتطوره",
            "school_vision"=> "مدارس الاحسان المتطوره",
            "value"=> "مدارس الاحسان المتطوره",
            "join_us"=> "انضم الينا لتستفاد",
            "join_us2"=> "انضم الينا لتستفاد",
            "message"=>"رسالتنا - مدارس متطوره نافعه" ,
            "terms_conditions"=> "terms and conditions",
            "privacy_policy"=>  "privacy and policy",
            "video"=>"https://www.youtube.com",
            "video2"=>"https://www.youtube.com"
        ]);
        factory('App\Models\Article',50)->create();
        factory('App\Models\Complaint',50)->create();
        factory('App\Models\Team',50)->create();
        factory('App\Models\Course',50)->create();
        factory('App\Models\Department',50)->create();
        factory('App\Models\Event',50)->create();
        }
}
