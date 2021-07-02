<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;
use Symfony\Component\HttpFoundation\Response;
use Exception;
use App\Models\Item;
use Illuminate\Support\Carbon;
use Illuminate\Foundation\Testing\WithoutMiddleware;


class ItemApiTest extends TestCase
{ 
    use RefreshDatabase;
    /**
     * A basic feature test example.
     *
     * @return void
     */


    public function test_can_store_item()
    {
       
            $item = [
                "item"=>[
                "name" => "test taskssss"
                ]
            ];
            $this->withoutExceptionHandling(); 
            $this->json('POST', 'api/items', $item, ['Accept' => 'application/json'])
                 ->assertStatus(201)
                ;
   
        
    }




    public function test_can_update_item()
    {  
         $this->withoutExceptionHandling(); 
        $task= [
            "item"=>[
            "name" => "test taskssss"
            ]
        ];
        $response=$this->post('api/items', $task);
        $response->dump();
             

         $item = [ 
            "item"=>[
                "name" => "test taskssss",
                "completed" => true
                ]
         ];
                   
          $this->json('PUT', 'api/items/' . $response['data']['item.id'], $item, ['Accept' => 'application/json'])
                ->assertStatus(201)
                ;
            
              
    }




    public function test_can_delete_item()
    { 
         $this->withoutExceptionHandling(); 
        $task= [
            "item"=>[
            "name" => "test taskssss"
            ]
        ];
        $response=$this->post('api/items', $task);
        $response->dump();
             

       
            $item = [
                "item"=>[
                "name" => "test taskssss",
                "completed"=>true,
                "completed_at"=>Carbon::now()
                ]
            ];

            $this->json('Delete', 'api/items/' . $response['data']['item.id'], $item, ['Accept' => 'application/json'])
            ->assertStatus(200)
            ;
               
    }




    public function test_can_get_items()
    {
            $this->withoutExceptionHandling(); 
            $response= $this->json('GET', 'api/items',  ['Accept' => 'application/json']);
            $response-> assertStatus(200);               
    }

    



   



}
