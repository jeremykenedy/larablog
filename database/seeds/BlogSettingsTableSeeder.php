<?php

use App\Models\BlogSetting;
use Illuminate\Database\Seeder;

class BlogSettingsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $settings = [
            [
                'name'      => 'Blog BlogSetting Id',
                'key'       => 'blog_theme_id',
                'value'     => 1,
                'active'    => 0,
            ],
        ];

        foreach ($settings as $setting) {
            $newBlogSetting = BlogSetting::where('name', '=', $setting['name'])
                                            ->orWhere('key', '=', $setting['key'])
                                            ->first();

            if ($newBlogSetting === null) {
                $newBlogSetting = BlogSetting::create([
                    'name'      => $setting['name'],
                    'key'       => $setting['key'],
                    'value'     => $setting['value'],
                    'active'    => $setting['active'],
                ]);
            }
        }
    }
}
