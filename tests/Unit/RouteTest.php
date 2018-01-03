<?php

namespace Tests\Unit;

use Tests\TestCase;
use Illuminate\Foundation\Testing\RefreshDatabase;
use App\Pizza;

class RouteTest extends TestCase
{
    /**
     * A basic test example.
     *
     * @return void
     */
    public function testRoute(){
      $response = $this->get('/');
      $response->assertStatus(200);
      $response->assertViewIs('home');
      $response->assertSeeText('Pizzaïlo');
      $response->assertSeeText('Nos pizzas');
      $response->assertSeeText('Royale');

    }
    public function testRouteAdmin(){
      $response = $this->get('/admin/pizza');
      $response->assertStatus(200);
      $response->assertViewIs('admin.pizza');
      $response->assertSeeText('Pizzaïlo');

    }
    public function testRouteMakeOrder(){
      $response = $this->post('/makeOrder');
      // 302 redirect url
      $response->assertStatus(302);
    }

    public function testCreatePizza(){
      $pizzas = Pizza::all();
      $pizzas= count($pizzas);
      // $this->assertEquals(18, $pizzas);

      $pizza=new Pizza();
      $pizza->name = 'calzone';
      $pizza->price_little = 1200;
      $pizza->price_big = 1300;
      $pizza->status = true;
      $pizza->save();

      $this->assertDatabaseHas('pizzas', [
          'name' => 'calzone',
          'price_little' => 1200,
          'price_big' => 1300,
          'status' => true
      ]);

      $this->assertDatabaseHas('pizzas', [
          'name' => 'Trois fromages',
          'price_little' => 1000,
          'price_big' => 1400,
          'status' => true
      ]);
      $this->assertDatabaseMissing('pizzas', [
          'name' => 'ljidapzodk',
          'price_little' => 1234,
          'price_big' => 1234,
          'status' => true
      ]);
    }

}
