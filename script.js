
  // script.js
document.addEventListener("DOMContentLoaded", function () {
  const apiKey = "33cb99f0f9bc6e7a2da04299c2c9bac8";
  const apiUrl = "https://api.openweathermap.org/data/2.5/weather";
  const defaultCity = "Belgrade";

  fetch(`${apiUrl}?q=${defaultCity}&appid=${apiKey}`)
    .then(response => response.json())
    .then(data => {
      updateWeather(data);
    })
    .catch(error => console.error("Error fetching weather data:", error));

  function kelvinToCelsius(kelvin) {
    return kelvin - 273.15; // Conversion formula from Kelvin to Celsius
  }

  function updateWeather(data) {
    const weatherWidget = document.getElementById("weather-widget");

    // Convert temperature from Kelvin to Celsius
    const temperatureCelsius = kelvinToCelsius(data.main.temp);

    // Populate weather-widget with weather data -  <img src="http://openweathermap.org/img/w/${data.weather[0].icon}.png" alt="Weather Icon">
    weatherWidget.innerHTML = `
      <h2>${data.name}, ${data.sys.country}</h2>
      <p>Temperature: <span id="temperature">${temperatureCelsius.toFixed(0)} °C</span></p> 
      <p>Condition: <span id="condition">${data.weather[0].description}</span></p>     
      <p>Location: <span id="location">${data.coord.lat}, ${data.coord.lon}</span></p>
      <img src="http://openweathermap.org/img/w/${data.weather[0].icon}.png" alt="Weather Icon">
    `;
  }
});