<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;
use App\Models\NotificationType;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        \App\Models\User::factory(5)->create();



        User::find(1)->update([
        	'name' => 'Caleb',
        	'email' => 'calebporzio@gmail.com'
        ]);

        // the passwords are all password.

        // Make NotificationTypes
        // I don't thinK I did anything special with this but I'm in a hurry so I just pasted them in.
		NotificationType::create([
			'description' => 'simple',
		  	'blade_component' => 'app.notification.simple',
		  	
		]);


		NotificationType::create([
			'description' => 'created',
		  	'blade_component' => 'app.notification.simple',
		  	
		]);


		NotificationType::create([
			'description' => 'info',
		  	'blade_component' => 'app.notification.simple',
		  	
		]);

		NotificationType::create([
			'description' => 'warning',
		  	'blade_component' => 'app.notification.simple',
		  	
		]);

		NotificationType::create([
			'description' => 'error',
		  	'blade_component' => 'app.notification.simple',
		  	
		]);

		\DB::statement("
INSERT INTO `notifications` (`id`, `notification_type_id`, `user_id`, `creator_id`, `dismissed_at`, `title`, `details`, `link`, `linkText`, `deleted_at`, `created_at`, `updated_at`) VALUES
('1', '1', '1', '3', NULL, 'You small like Roses', 'A sentense about things that are cool.', 'http://livewire-2334.test', 'Open', NULL, '2021-01-11 03:24:38', '2021-01-11 17:36:13'),
('2', '1', '1', '2', NULL, 'You eat cheese', 'Another one, this one is long too', 'http://livewire-2334.test', 'Open', NULL, '2021-01-11 03:24:41', '2021-01-11 17:36:24'),
('3', '2', '1', '4', NULL, 'stop copying me!', 'This is short', 'http://livewire-2334.test', 'Open', NULL, '2021-01-11 03:25:59', '2021-01-11 17:15:51'),
('4', '3', '1', '3', NULL, 'You mama', 'the current time is', 'http://livewire-2334.test', 'Open', NULL, '2021-01-11 03:26:02', '2021-01-11 17:17:50'),
('7', '4', NULL, '1', NULL, 'Profile Updated', 'A short one', NULL, NULL, NULL, '2021-01-11 03:41:54', '2021-01-11 06:56:23'),
('9', '5', NULL, '1', NULL, 'Password Hacked', 'A short one', 'http://livewire-2334.test', 'Open', NULL, '2021-01-11 03:41:55', '2021-01-11 14:47:31'),
('12', '1', NULL, '1', NULL, 'Corn Balls', 'A short one', NULL, NULL, NULL, '2021-01-11 03:41:58', '2021-01-11 06:56:22'),
('14', '1', NULL, '1', NULL, 'cheee toast', 'A short one', NULL, NULL, NULL, '2021-01-11 03:45:35', '2021-01-11 06:56:23');


			");

    }
}
