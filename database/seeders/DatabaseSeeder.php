<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use App\Models\Attachment;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // \App\Models\User::factory(10)->create();

        $user = \App\Models\User::factory()->create([
            'name' => 'Test User',
            'email' => 'test@example.com',
        ]);

        // multiple
        $attachments = collect([
            Attachment::query()->create([
                'filename' => 'AAA',
                'path' => 'AAA',
                'mime' => 'AAA',
                'extension' => 'AAA',
                'group' => 'AAA',
            ]),
            Attachment::query()->create([
                'filename' => 'BBB',
                'path' => 'BBB',
                'mime' => 'BBB',
                'extension' => 'BBB',
                'group' => 'BBB',
            ]),
        ]);
        $user->attachments()->attach($attachments->pluck('id'));

        // satuan
        $photo = Attachment::query()->create([
            'filename' => 'CCC',
            'path' => 'CCC',
            'mime' => 'CCC',
            'extension' => 'CCC',
            'group' => 'CCC',
        ]);

        $user->attachments()->attach($photo->id);
    }
}
