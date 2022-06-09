"use strict;";
const searchButton = document.querySelector("button");
const searchBar = document.querySelector(".search-bar");
let weather = {
    apiKey: "c863b3930d6a88d8197157be46245da7",
    fetchWeather: function(city) {
        fetch(
                `https://api.openweathermap.org/data/2.5/weather?q=${city}&units=metric&appid=${this.apiKey}`
            )
            .then((response) => {
                return response.json();
            })
            .then((data) => {
                this.displayWeather(data);
            });
    },
    displayWeather: function(data) {
        const { name } = data;
        const [{ icon, description }] = data.weather;
        const { temp, humidity } = data.main;
        const { speed } = data.wind;

        document.querySelector(".city").innerText = `Weather in ${name}`;
        document.querySelector(
            ".icon"
        ).src = `https://openweathermap.org/img/wn/${icon}@2x.png`;
        document.querySelector(".temp").textContent = `${temp}°C`;
        document.querySelector(".description").textContent = description;
        document.querySelector(".humidity").textContent = `Humidity: ${humidity}%`;
        document.querySelector(".wind").textContent = `Wind Speed: ${speed} km/h`;
        document.querySelector(".weather").classList.remove("loading");
        document.querySelector(
            "body"
        ).style.backgroundImage = `url("https://source.unsplash.com/1600x900/?${name}")`;
    },
};

searchButton.addEventListener("click", function() {
    if (searchBar.value !== "") {
        const city = searchBar.value;
        weather.fetchWeather(city);
    }
});
window.addEventListener("keydown", function(e) {
    if (e.key === "Enter") {
        if (searchBar.value !== "") {
            const city = searchBar.value;
            weather.fetchWeather(city);
        }
    }
});

weather.fetchWeather("Marrakesh");