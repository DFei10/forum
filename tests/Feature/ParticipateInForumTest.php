<?php

namespace Tests\Feature;

use App\Models\Reply;
use App\Models\Thread;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class ParticipateInForumTest extends TestCase
{
    use RefreshDatabase;

    /** @test */
    public function unauthenticated_user_may_not_add_replies()
    {
        $this->post("threads/channel/1/replies", [])->assertRedirect("/login");
    }

    /** @test */
    public function an_authenticated_user_may_participate_in_forum_threads()
    {
        $this->signIn();

        $thread = Thread::factory()->create();
        $replyAttributes = Reply::factory()->make(["thread_id" => $thread->id]);

        $this->post("{$thread->path()}/replies", $replyAttributes->toArray());

        $this->get($thread->path())->assertSee($replyAttributes->body);
    }

    /** @test */
    public function a_reply_requires_a_body()
    {
        $this->signIn();

        $thread = Thread::factory()->create();

        $this->post(
            "{$thread->path()}/replies",
            Reply::factory()->raw(["body" => null])
        )->assertSessionHasErrors("body");
    }

    /** @test */
    public function unauthorized_users_cannot_delete_replies()
    {
        $reply = $this->create(Reply::class);

        $this->delete("/replies/{$reply->id}")->assertRedirect("login");

        $this->signIn()
            ->delete("/replies/{$reply->id}")
            ->assertStatus(403);
    }

    /** @test */
    public function authorized_users_can_delete_replies()
    {
        $this->signIn();
        $reply = $this->create(Reply::class, ["owner_id" => auth()->id()]);

        $this->delete("/replies/{$reply->id}")->assertStatus(302);
        $this->assertDatabaseMissing("replies", ["id" => $reply->id]);
    }

    /** @test */
    public function authorized_users_can_update_replies()
    {
        $this->withoutExceptionHandling();
        $this->signIn();
        $reply = $this->create(Reply::class, ['owner_id' => auth()->id()]);

        $this->patch("/replies/{$reply->id}", ['body' => 'Reply Changed']);

        $this->assertDatabaseHas('replies', ['id' => $reply->id, 'body' => 'Reply Changed']);
    }

    /** @test */
    public function unauthorized_users_cannot_update_replies()
    {
        $reply = $this->create(Reply::class);

        $this->patch("/replies/{$reply->id}")->assertRedirect("login");

        $this->signIn()
            ->patch("/replies/{$reply->id}")
            ->assertStatus(403);
    }
}
