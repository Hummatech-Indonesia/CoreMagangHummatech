<?php

namespace Tests\Feature;

use App\Http\Middleware\SubscribeCheckMiddleware;
use App\Models\User;
use Illuminate\Foundation\Testing\WithoutMiddleware;
use Tests\TestCase;

class SubscribedMiddlewareTest extends TestCase
{
    /**
     * Checking unsubscribed user
     */
    public function test_it_is_unsubscribed_user()
    {
        // Create an unsubscribed user
        $user = User::find(1);

        // Authenticate the user
        $this->actingAs($user);

        // Mocking the route for the test
        $route = route('course-store.index');

        // Create a request to simulate accessing the route
        $response = $this->get($route);

        // Now you can assert the response status
        $response->assertForbidden();
    }

    /**
     * Checking subscribed user
     */
    public function test_it_is_subscribed_user()
    {
        // Create an unsubscribed user
        $user = User::find(2);

        // Authenticate the user
        $this->actingAs($user);

        // Mocking the route for the test
        $route = route('course-store.index');

        // Create a request to simulate accessing the route
        $response = $this->get($route);

        // Now you can assert the response status
        $response->assertAccepted();
    }
}
