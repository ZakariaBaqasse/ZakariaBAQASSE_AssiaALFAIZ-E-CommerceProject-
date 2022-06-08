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
        console.log(name, description, temp, humidity, speed, icon);
        document.querySelector(".city").innerText = `Weather in ${name}`;
        document.querySelector(
            ".icon"
        ).src = `https://openweathermap.org/img/wn/${icon}@2x.png`;
    },
};