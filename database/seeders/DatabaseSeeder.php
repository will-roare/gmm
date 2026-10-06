<?php

namespace Database\Seeders;

use App\Models\Category;
use App\Models\Episode;
use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    use WithoutModelEvents;

    public function run(): void
    {
        $admin = User::factory()->create([
            'name' => 'GMM Admin',
            'email' => 'admin@gmm.test',
            'password' => bcrypt('password'),
        ]);

        $categoryNames = [
            'Sustainable Investing',
            'Climate Tech',
            'Energy',
            'Shareholder Advocacy',
            'Circular Economy',
        ];

        $categories = [];

        foreach ($categoryNames as $name) {
            $categories[$name] = Category::create(['name' => $name]);
        }

        $episodes = [
            ['number' => 1,  'title' => 'Can ordinary investors fund climate solutions?',        'guest' => 'Franz Hochstrasser', 'category' => 'Sustainable Investing', 'date' => '2023-10-27'],
            ['number' => 2,  'title' => 'Sustainable investing starts with better questions',    'guest' => 'Lesley Li',          'category' => 'Sustainable Investing', 'date' => '2023-11-11'],
            ['number' => 3,  'title' => 'Why put a garden on a roof?',                           'guest' => 'Steven Peck',        'category' => 'Climate Tech',          'date' => '2023-11-29'],
            ['number' => 4,  'title' => 'The energy beneath our feet: geothermal',               'guest' => 'Jochen Schneider',   'category' => 'Energy',                'date' => '2023-12-22'],
            ['number' => 5,  'title' => 'What is really in your portfolio?',                     'guest' => 'Uli Epensberger',    'category' => 'Sustainable Investing', 'date' => '2023-12-29'],
            ['number' => 6,  'title' => 'Can you measure the impact of an investment?',          'guest' => 'R. Paul Herman',     'category' => 'Sustainable Investing', 'date' => '2024-02-04'],
            ['number' => 7,  'title' => 'What is your money funding?',                           'guest' => 'Bonnie Gurry',       'category' => 'Sustainable Investing', 'date' => '2024-02-26'],
            ['number' => 8,  'title' => 'How do you choose a sustainable fund?',                 'guest' => 'Ben Vivari',         'category' => 'Sustainable Investing', 'date' => '2024-03-10'],
            ['number' => 9,  'title' => 'Can crypto help finance solar power?',                  'guest' => 'William Skinner',    'category' => 'Energy',                'date' => '2024-03-26'],
            ['number' => 10, 'title' => 'Solar power when the grid is not enough',               'guest' => 'Rupert Mayer',       'category' => 'Energy',                'date' => '2024-06-10'],
            ['number' => 11, 'title' => 'Can shareholders change a company?',                    'guest' => 'Andrew Behar',       'category' => 'Shareholder Advocacy',  'date' => '2024-07-28'],
            ['number' => 12, 'title' => 'Investing without fossil fuels',                        'guest' => 'Leslie Samuelrich',  'category' => 'Shareholder Advocacy',  'date' => '2024-11-26'],
            ['number' => 13, 'title' => 'The hidden value in old catalytic converters',          'guest' => 'Don Weatherbee',     'category' => 'Circular Economy',      'date' => '2024-12-03'],
            ['number' => 14, 'title' => 'Building cleaner batteries',                            'guest' => 'Dr Amrit Chandan',   'category' => 'Climate Tech',          'date' => '2024-12-14'],
            ['number' => 15, 'title' => 'Turning awareness into action',                         'guest' => 'Gail Gallie',        'category' => 'Sustainable Investing', 'date' => '2026-06-15'],
            ['number' => 16, 'title' => 'How capital really moves',                              'guest' => 'Alessa Berg',        'category' => 'Sustainable Investing', 'date' => '2026-06-24'],
            ['number' => 17, 'title' => 'Why financial advisers avoid sustainable investing',    'guest' => 'Maria Maisuradze',   'category' => 'Sustainable Investing', 'date' => '2026-09-06'],
        ];

        foreach ($episodes as $episode) {
            Episode::create([
                'episode_number' => $episode['number'],
                'title' => $episode['title'],
                'description' => 'Guest: ' . $episode['guest'] . '.',
                'category_id' => $categories[$episode['category']]->id,
                'user_id' => $admin->id,
                'published_at' => $episode['date'],
            ]);
        }
    }
}