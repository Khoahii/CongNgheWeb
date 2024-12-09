<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class BooksTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('books')->insert([
            [
                'title' => 'Clean Code',
                'author' => 'Robert C. Martin',
                'publication_year' => 2008,
                'genre' => 'Programming',
                'library_id' => 1, // ID của thư viện
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'title' => 'The Pragmatic Programmer',
                'author' => 'Andrew Hunt',
                'publication_year' => 1999,
                'genre' => 'Programming',
                'library_id' => 1, // ID của thư viện
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'title' => 'Design Patterns',
                'author' => 'Erich Gamma',
                'publication_year' => 1994,
                'genre' => 'Software Design',
                'library_id' => 2, // ID của thư viện
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ]);
    }
}
