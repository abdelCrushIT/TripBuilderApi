<?php

namespace Tests\Unit;

use Tests\TestCase;
use App\Models\Trip;

class TripsControllerTest extends TestCase {
    
    public function createMockTrip()
    {
        $mockTrip = new Trip();
        $mockTrip->id = '9999';
        $mockTrip->reservation_code = 'newcode';
        return $mockTrip;
    }

    /**
     * @return void
     */
    public function testFind()
    {
        $mockTrip = $this->createMockTrip();

        $repo = $this->createMock('App\Repositories\TripRepository');

        $repo->expects($this->once())
            ->method('find')
            ->will($this->returnValue($mockTrip));

        $this->app->instance('App\Repositories\TripRepository', $repo);

        $response = $this->call('GET', '/trips/'.$mockTrip->id);

        $this->assertTrue($response->isOk());
        
        $data = json_decode($response->getContent());

        $this->assertEquals($data->trip->id, $mockTrip->id);
        $this->assertEquals($data->trip->reservation_code, 'newcode');
    }

    /**
     * @return void
     */
    public function testFindUnavailableTrip()
    {
        $mockTrip = $this->createMockTrip();

        $repo = $this->createMock('App\Repositories\TripRepository');

        $repo->expects($this->once())
            ->method('find')
            ->will($this->returnValue(null));

        $this->app->instance('App\Repositories\TripRepository', $repo);

        $response = $this->call('GET', '/trips/'.$mockTrip->id);

        $this->assertFalse($response->isOk());
        
        $data = json_decode($response->getContent());

        $this->assertEquals($data->message, 'Trip not found');
    }

    


    
}