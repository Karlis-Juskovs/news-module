<?php

namespace Karlis\Module1\tests\Feature;

use CommonModule\Helper;
use Illuminate\Foundation\Testing\WithFaker;
use Karlis\Module1\Models\News;
use Karlis\Module1\tests\TestControllerCase;

class NewsControllerTest extends TestControllerCase
{
    /**
     * Test checks if news.index route is working and returns expected content count.
     */
    public function testItCanListNewsItems():void
    {
        News::newFactory()->count(3)->create();

        $response = $this->getJson(route('news.index'));

        $response->assertStatus(200)
            ->assertJsonCount(3)
            ->assertJsonStructure([
                '*' => ['id', 'title', 'content', 'created_at', 'updated_at']
            ]);
    }

    /**
     * Test verifies if news.store route works.
     */
    public function testIfCanStoreANewsItem(): void
    {
        $data = [
            'title' => 'Some Mad Genius Put ChatGPT on a TI-84 Graphing Calculator',
            'content' => 'On Saturday, a YouTube creator called ChromaLock published a video detailing ...',
        ];

        $response = $this->postJson(route('news.store'), $data);

        $response->assertStatus(201);
        $this->assertDatabaseHas('news', $data);
    }

    /**
     * Test verifies if news.show route works and that common-module is connected (Helper class).
     */
    public function testIfCanShowASingleNewsItem(): void
    {
        $news = News::newFactory()->create();

        $response = $this->getJson(route('news.show', $news->id));

        $response->assertStatus(200)
            ->assertJson([
                'title' => $news->title,
                'content' => $news->content,
                'created_at' => Helper::formatDate($news->created_at)
            ]);
    }

    /**
     * Test verifies that news.update route works.
     */
    public function testIfCanUpdateANewsItem(): void
    {
        $news = News::newFactory()->create();

        $updatedData = [
            'title' => 'Updated Title',
            'content' => 'Updated content',
        ];

        $response = $this->putJson(route('news.update', $news->id), $updatedData);

        $response->assertStatus(200);
        $this->assertDatabaseHas('news', $updatedData);
    }

    /**
     * Test verifies that news.destroy route works.
     */
    public function testIfCanDeleteANewsItem(): void
    {
        $news = News::newFactory()->create();

        $this->assertDatabaseHas('news', ['id' => $news->id]);

        $response = $this->deleteJson(route('news.destroy', $news->id));

        $response->assertStatus(200);
        $this->assertDatabaseMissing('news', ['id' => $news->id]);
    }
}
