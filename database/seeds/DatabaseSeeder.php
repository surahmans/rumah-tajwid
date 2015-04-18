<?php

use Illuminate\Database\Seeder;
use Illuminate\Database\Eloquent\Model;

class DatabaseSeeder extends Seeder {

	/**
	 * Run the database seeds.
	 *
	 * @return void
	 */
	public function run()
	{
		Model::unguard();

		// $this->call('UserTableSeeder');
        $this->call('MenuTableSeeder');
        $this->call('UsersTableSeeder');
        $this->call('CategoriesTableSeeder');
        $this->call('ArticlesTableSeeder');
        $this->call('ConfigsTableSeeder');
        $this->call('TagsTableSeeder');
        $this->call('ArticleTagTableSeeder');
        $this->call('WidgetTableSeeder');
	}

}
