<?php

namespace Tests\Unit;

use Tests\TestCase;
use App\Models\Airport;

class AirportsControllerTest extends TestCase {
    
    /**
     * @return void
     */
    public function testGetAll()
    {
        $airport1 = new Airport();
        $airport1->code = 'CDG';
        $airport1->name = 'Charles de Gaulle';
        $airport1->city = 'Paris';

        $airport2 = new Airport();
        $airport2->code = 'DBX';
        $airport2->name = 'Dubai Airport';
        $airport2->city = 'Dubai';

        $airports = [
            $airport1,
            $airport2
        ];


        $mock = $this->createMock('App\Repositories\AirportRepository');
        $mock->expects($this->once())
            ->method('all')
            ->will($this->returnValue($airports));
        
        $this->app->instance('App\Repositories\AirportRepository', $mock);
        
        $response = $this->call('GET', '/airports');
        $this->assertTrue($response->isOk());
        
        $content = json_decode($response->getContent());

        //print_r($data);exit;
        
        $this->assertEquals(count($content->data), 2);
        $this->assertEquals($content->data[0]->code, 'CDG');
        $this->assertEquals($content->data[0]->city, 'Paris');
        $this->assertEquals($content->data[0]->name, 'Charles de Gaulle');
    }
    
}