<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Setting>
 */
class SettingFactory extends Factory {
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition() {
        return [
            'email'                => 'inbox.amirul@gmail.com',
            'phone'                => '01834503106',
            'phone2'               => '01999223832',
            'address'              => 'Kishoreganj, Dhaka',

            'map'                  => '<iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3650.220579580633!2d90.36060227456505!3d23.810754086458147!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x3755c1278786faf7%3A0x96093e4667c57e7a!2sMirpur-6%20Kacha%20Bazar!5e0!3m2!1sen!2sbd!4v1698774613497!5m2!1sen!2sbd" width="600" height="450" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>',

            'twitter'              => 'https://twitter.com/devamirul',
            'facebook'             => 'https://www.facebook.com/fb.Amirul',
            'instagram'            => 'https://www.instagram.com/devamirul',
            'youtube'              => 'youtube.com',
            'copy_right'           => '@copyright, All rights reserve',
            's_cost_inside_dhaka'  => 50,
            's_cost_outside_dhaka' => 100,
        ];
    }
}
