# cli-weather-advisor

You must create a file that would:

$ php ./command.php :city - would list all the forecasts from meteo.lt (https://api.meteo.lt/v1/places/Kaunas/forecasts/long-term).

$ php ./command.php :city :clothes - would print yes if the clothes is appropriate for this weather

$ php ./command.php - would list help

Clothes 

Shorts: 
  - the temperature must be above 20 for the next 3 hours and wind speed must bebelow 10 m/s
  
Pants: 
  - the opposite of shorts
  
Jacket: 
  - the temperature must be below 18 for the next 6 hours
  - the wind speed must be above 10, but not if the temperature is above 25
  
Examples

Shorts are:
  - Valid when the temperature is 21 and wind speed is 9
  - Not valid when the temperature is 21 and wind speed is 10
  - Not valid when the temperature is 19 and wind speed is 9

Jacket is:
  - Valid when the temperature is 15 and wind speed is 6
  - Valid when the temperature is 15 and wind speed is 11
  - Valid when the temperature is 23 and wind speed is 11
  - Not valid when the temperature is 23 and wind speed is 9
