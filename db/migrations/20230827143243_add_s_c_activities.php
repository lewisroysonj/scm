<?php
declare(strict_types=1);

use Phinx\Migration\AbstractMigration;

final class AddSCActivities extends AbstractMigration
{
    public function up()
    {
        $table = $this->table('summer_camp_activities');
        $table->addColumn('name', 'string')
              ->addColumn('description', 'text')
              ->addColumn('date', 'date')
              ->addColumn('location', 'string')
              ->create();

        $data = [
            [
                'name' => 'Hiking Adventure',
                'description' => 'A day of exciting hiking through the wilderness.',
                'date' => '2023-08-15',
                'location' => 'Forest Park'
            ],
            [
                'name' => 'Art and Crafts Workshop',
                'description' => 'Get creative with art and crafts activities.',
                'date' => '2023-08-20',
                'location' => 'Community Center'
            ],
            [
                'name' => 'Science Exploration',
                'description' => 'Learn about the wonders of science through fun experiments.',
                'date' => '2023-08-25',
                'location' => 'Science Museum'
            ],
            [
                'name' => 'Outdoor Movie Night',
                'description' => 'Enjoy a movie night under the stars with friends.',
                'date' => '2023-08-30',
                'location' => 'Campground'
            ],
            [
                'name' => 'Sports Day',
                'description' => 'Compete in various sports and games for prizes.',
                'date' => '2023-09-05',
                'location' => 'Sports Complex'
            ],
        ];

        $table->insert($data)->save();
    }

    public function down()
    {
        $this->table('summer_camp_activities')->drop()->save();
    }
}
