<?php

use Illuminate\Database\Seeder;

class SettingTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        #General
        Settings::set('contactEmail', 'contact@impulse.com');
        Settings::set('googleAnalytics', '');

        #Image Upload
        Settings::set('imageMaxUploadSize', 50);
        Settings::set('imageDisplayLimit', 4);

        #Url
        Settings::set('facebookUrl', '');
        Settings::set('twitterUrl', '');
        Settings::set('instagramUrl', '');
        Settings::set('pinterestUrl', '');

        #Register
        Settings::set('registerEnabled', true);
        Settings::set('facebookRegisterEnabled', true);
        Settings::set('twitterRegisterEnabled', true);
        Settings::set('instagramRegisterEnabled', true);
        Settings::set('pinterestRegisterEnabled', true);

        #Login
        Settings::set('loginEnabled', true);
        Settings::set('facebookLoginEnabled', true);
        Settings::set('twitterLoginEnabled', true);
        Settings::set('instagramLoginEnabled', true);
        Settings::set('pinterestLoginEnabled', true);
    }
}
