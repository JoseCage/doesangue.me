<?php

namespace Tests\Feature;

use Tests\TestCase;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithoutMiddleware;
use DoeSangue\Models\User;
use DoeSangue\Models\Campaign;

class CampaignTest extends TestCase
{

    /* Test: Post /v1/campaigns
     public function testCreateCampaign()
    {
        $user = factory(User::class)->create();

        $response = $this->post(
            '/v1/campaigns', [
            'title' => "Hi, This is a test campaign",
            'description' => 'As we say before, this campaign is just a simple and not important test for our API.',
            'expires' => \Carbon\Carbon::now()->endOfYear(),
            'image' => 'http://lorempixel.com/640/480/058256',
            'user_id' => $user->id
            ]
        );

        $response->assertStatus(201)
            ->assertJson(
                [
                    'status_code' => 201,
                    'message' => 'Campaign added!'
                ]
            );
    }*/

    public function testgetAllCampaigns()
    {

        $request = $this->get('/v1/campaigns');

        $request->assertStatus(200);
    }

}
