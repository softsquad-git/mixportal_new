<?php

use Illuminate\Database\Seeder;

class TranslateNews extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $news = \App\News::all();
        foreach ($news as $new) {
            \App\NewsTranslation::create([
                'news_id' => $new->id,
                'lang' => 'pl',
                'title' => $new->title,
                'text' => $new->text,
                'slug' => $new->slug,
                'pretext' => $new->pretext
            ]);
        }

        // alter news table drop column

        \Illuminate\Support\Facades\Schema::table('news', function (\Illuminate\Database\Schema\Blueprint $table) {
           $table->dropColumn([
               'title',
               'text',
               'slug',
               'pretext'
           ]);
        });
    }
}
