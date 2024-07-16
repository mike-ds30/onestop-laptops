<?php

namespace Database\Seeders;

use App\Models\Brand;
use App\Models\Laptop;
use App\Models\SiteSetting;
use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        SiteSetting::create([

        ]);
        User::create([
            'username' => 'user1',
            'email' => 'user1@gmail.com',
            'password' => Hash::make('user1password'),
            'phone' => 111111111111,
            'address' => 'User 1 Address'
        ]);
        User::create([
            'username' => 'admin1',
            'email' => 'admin1@gmail.com',
            'password' => Hash::make('admin1password'),
            'phone' => 222222222222,
            'address' => 'Admin 1 Address',
            'role' => 'admin'
        ]);
        Brand::create([
            'name' => 'ASUS',
            'description' => 'ASUSTek Computer Inc., stylised as ASUSTeK or ASUS, is a Taiwanese multinational computer and phone hardware and electronics company headquartered in Beitou District, Taipei, Taiwan.',
            'logo' => 'asus.jpg'
        ]);
        Brand::create([
            'name' => 'Lenovo',
            'description' => 'Lenovo Group Limited, often shortened to Lenovo, is a Chinese multinational technology company specializing in designing, manufacturing, and marketing consumer electronics, personal computers, software, business solutions, and related services.',
            'logo' => 'lenovo.jpg'
        ]);
        Brand::create([
            'name' => 'MSI',
            'description' => 'Micro-Star International Co., Ltd (MSI) is a Taiwanese multinational information technology corporation headquartered in New Taipei City, Taiwan.',
            'logo' => 'msi.jpg'
        ]);
        Brand::create([
            'name' => 'Dell',
            'description' => 'Dell is an American based technology company. It develops, sells, repairs, and supports computers and related products and services. Dell is owned by its parent company, Dell Technologies.',
            'logo' => 'dell.jpg'
        ]);
        Laptop::create([
            'brand_id' => 1,
            'type' => 'Zenbook Pro',
            'model' => '16X OLED',
            'processor' => 'Up to 12th gen Intel Core i9 processor',
            'ram' => 32,
            'storage' => 2048,
            'price' => 49999000,
            'image' => 'asus1.jpg'
        ]);
        Laptop::create([
            'brand_id' => 1,
            'type' => 'Zenbook Pro',
            'model' => '14 Duo OLED',
            'processor' => 'Up to 12th gen Intel Core i9 processor',
            'ram' => 32,
            'storage' => 2048,
            'price' => 30999000,
            'image' => 'asus2.jpg'
        ]);
        Laptop::create([
            'brand_id' => 1,
            'type' => 'Vivobook Pro',
            'model' => '16X OLED',
            'processor' => 'Up to 12th gen Intel Core i9 processor',
            'ram' => 32,
            'storage' => 2048,
            'price' => 34999000,
            'image' => 'asus3.jpg'
        ]);
        Laptop::create([
            'brand_id' => 1,
            'type' => 'Vivobook Pro',
            'model' => '15X OLED',
            'processor' => 'Up to 12th gen Intel Core i7 processor',
            'ram' => 32,
            'storage' => 2048,
            'price' => 25499000,
            'image' => 'asus4.jpg'
        ]);
        Laptop::create([
            'brand_id' => 1,
            'type' => 'Vivobook Pro',
            'model' => '14X OLED',
            'processor' => 'Up to 11th gen Intel Core i7 processor',
            'ram' => 16,
            'storage' => 1024,
            'price' => 19299000,
            'image' => 'asus5.jpg'
        ]);
        Laptop::create([
            'brand_id' => 2,
            'type' => 'IdeaPad',
            'model' => 'Gaming 3i',
            'processor' => '11th Gen Intel Core i7-11370H',
            'ram' => 8,
            'storage' => 512,
            'price' => 16999000,
            'image' => 'lenovo1.jpg'
        ]);
        Laptop::create([
            'brand_id' => 2,
            'type' => 'IdeaPad',
            'model' => 'Gaming 3',
            'processor' => 'AMD Ryzen 7 5800H',
            'ram' => 8,
            'storage' => 1024,
            'price' => 15999000,
            'image' => 'lenovo2.jpg'
        ]);
        Laptop::create([
            'brand_id' => 2,
            'type' => 'Legion',
            'model' => 'Y540',
            'processor' => '9th Generation Intel Core i7-9750H',
            'ram' => 16,
            'storage' => 512,
            'price' => 20999000,
            'image' => 'lenovo3.jpg'
        ]);
        Laptop::create([
            'brand_id' => 2,
            'type' => 'Legion',
            'model' => 'Y740Si',
            'processor' => '10th Gen Intel Core i7-10750H',
            'ram' => 16,
            'storage' => 512,
            'price' => 21999000,
            'image' => 'lenovo4.jpg'
        ]);
        Laptop::create([
            'brand_id' => 2,
            'type' => 'Legion',
            'model' => 'Y7000 SE',
            'processor' => 'Intel Generasi ke-9 Core i7-9750H',
            'ram' => 16,
            'storage' => 512,
            'price' => 21499000,
            'image' => 'lenovo5.jpg'
        ]);
        Laptop::create([
            'brand_id' => 3,
            'type' => 'Modern',
            'model' => '14 - C13M',
            'processor' => 'Up to 13th Gen Intel Core i7 Processor',
            'ram' => 16,
            'storage' => 1024,
            'price' => 18999000,
            'image' => 'msi1.jpg'
        ]);
        Laptop::create([
            'brand_id' => 3,
            'type' => 'Modern',
            'model' => '15 - B13M',
            'processor' => 'Up to 13th Gen Intel Core i7 Processor',
            'ram' => 16,
            'storage' => 1024,
            'price' => 19999000,
            'image' => 'msi2.jpg'
        ]);
        Laptop::create([
            'brand_id' => 3,
            'type' => 'Titan',
            'model' => 'GT77 HX 13VI',
            'processor' => 'Up to 13th Gen Intel Core i9 HX',
            'ram' => 128,
            'storage' => 2048,
            'price' => 35999000,
            'image' => 'msi3.jpg'
        ]);
        Laptop::create([
            'brand_id' => 3,
            'type' => 'Titan',
            'model' => 'GT77 12UHS',
            'processor' => 'Up to 12th Gen Intel Core i9-12900HX',
            'ram' => 128,
            'storage' => 2048,
            'price' => 34999000,
            'image' => 'msi4.jpg'
        ]);
        Laptop::create([
            'brand_id' => 3,
            'type' => 'Stealth',
            'model' => '17Studio A13VI',
            'processor' => 'Up to 13th Gen Intel Core i9',
            'ram' => 64,
            'storage' => 2048,
            'price' => 33999000,
            'image' => 'msi5.jpg'
        ]);
        Laptop::create([
            'brand_id' => 4,
            'type' => 'XPS',
            'model' => '13',
            'processor' => '12th Generation Intel Core i7-1250U',
            'ram' => 16,
            'storage' => 512,
            'price' => 20999000,
            'image' => 'dell1.jpg'
        ]);
        Laptop::create([
            'brand_id' => 4,
            'type' => 'XPS',
            'model' => '15',
            'processor' => '12th Generation Intel Core i9-12900HK',
            'ram' => 32,
            'storage' => 1024,
            'price' => 23999000,
            'image' => 'dell2.jpg'
        ]);
        Laptop::create([
            'brand_id' => 4,
            'type' => 'XPS',
            'model' => '17',
            'processor' => '12th Generation Intel Core i7-12700H',
            'ram' => 16,
            'storage' => 1024,
            'price' => 23999000,
            'image' => 'dell3.jpg'
        ]);
        Laptop::create([
            'brand_id' => 4,
            'type' => 'Alienware',
            'model' => 'X15',
            'processor' => '12th Generation Intel Core i9-12900H',
            'ram' => 32,
            'storage' => 2048,
            'price' => 35999000,
            'image' => 'dell4.jpg'
        ]);
        Laptop::create([
            'brand_id' => 4,
            'type' => 'Alienware',
            'model' => 'X14',
            'processor' => '12th Generation Intel Core i7-12700H',
            'ram' => 32,
            'storage' => 512,
            'price' => 31999000,
            'image' => 'dell5.jpg'
        ]);
    }
}
