<?php

namespace Database\Seeders;

use App\Models\Setting;
use App\Models\User;
// use App\Models\ContactUs;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{

    public function run()
    {
        // \App\Models\User::factory(10)->create();
        $this->call(ProvinceTableSeeder::class);
        $this->call(DistrictTableSeeder::class);
        $this->call(MenuSeeder::class);
        // $this->call(ContactUsSeeder::class);

        Setting::updateOrCreate(['id'=>1],[
                "company_name" => "Etihad Technology",
                "email" => "info@etihadtechnology.com.np",
                "contact_no" => "9804236420",
                "phone" => "9816275786",
                "province_no" => "3",
                "district_no" => "23",
                "local_address" => "Maitidevi, Kathmandu Nepal",
                "pan_vat" => "9878-878-878",
                "map_url" => "https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3532.41812780535!2d85.3269129504342!3d27.70437358270868!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x39eb19a74aceb43d%3A0x6ee287290120dc6e!2sEtihad%20Technology%20Pvt.%20Ltd.!5e0!3m2!1sen!2snp!4v1660315132734!5m2!1sen!2snp"
        ]
    );

        User::insert([
            [
                "name"=>"Etihad Technology",
                "email"=>"etihadtechnology@hotmail.com",
                "password"=>Hash::make("Etihad@321#"),
                "created_at"=>date('Y-m-d H:i:s'),
                "updated_at"=>date('Y-m-d H:i:s'),
            ],
        ]);
    }
}
