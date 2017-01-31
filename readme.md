# TripBuilderApi
## Setup 
1. git clone 
2. in configs.yaml maps yourWorkDirectory/TripBuilderApi/public to tripBuilderApi
3. in your hosts file maps 192.168.10.10 tripBuilderApi (you can change 192.168.10.10 by your IP address)
4. vagrant up
5. vagrant ssh
6. composer install

## API routes:

1. **GET /airports**  
  
  [ get all available airports ]  
2. GET /trips/{tripId}  
  
  [ get trip info with all related flights ]
3. PUT /trips/{tripId}/flights/{departAirportCode-destAirportCode}  
  
  [ Add new flight to a trip ex: /trips/2/flights/CDG-DBX] departAirportCode and destAirportCode are airport codes.
4. DELETE /trips/{tripId}/flights/{departAirportCode-destAirportCode}  

  [ Delete a flight to a trip ex: /trips/2/flights/CDG-DBX] departAirportCode and destAirportCode are airport codes.
   

