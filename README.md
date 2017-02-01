# TripBuilderApi
## Setup 
1. git clone 
2. in configs.yaml (Homestead.yaml if your are using Homestead)  maps yourWorkDirectory/TripBuilderApi/public to tripBuilderApi
3. in your hosts file maps 192.168.10.10 tripBuilderApi (you can change 192.168.10.10 by your IP address)
4. vagrant up
5. vagrant ssh
6. composer install
7. run php artisan migrate
8. run php artisan db:seed --class=AirportsTableSeeder
9. run php artisan db:seed --class=FlightsTableSeeder
10. run php artisan db:seed --class=TripsTableSeeder

## API routes:

1. **GET /airports**  
  
  [ get all available airports ]  
2. GET /trips
  
  [ get all trips info ]
3. GET /trips/{tripId}  
  
  [ get specific trip info with all related flights ]
4. PUT /trips/{tripId}/flights/{departAirportCode-destAirportCode}  
  
  [ Add new flight to a trip ex: /trips/2/flights/CDG-DBX] departAirportCode and destAirportCode are airport codes.
5. DELETE /trips/{tripId}/flights/{departAirportCode-destAirportCode}  

  [ Delete a flight to a trip ex: /trips/2/flights/CDG-DBX] departAirportCode and destAirportCode are airport codes.
  
  
  # Important Note:
  The business logic adopted in this project which reflects the reality is that a flight is a direct connection between two cities and that not any combinaison of deparature airport and arrival departure is available.  
  Please not that the available flights are in the flights database table. when using the API or the website in order to adde a flight to a trip, please choose the available combinaison for depature airport and arrival airport (look to flights table and get airports combinaison from airports table). ADDING NEW FLIGHT WAS OUT OF THE SCOPE OF THIS WORK AND COULD EASILY BE ADDED IF NEEDED.  
