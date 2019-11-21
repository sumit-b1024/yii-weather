<style type="text/css">
  
  body {
  width: 100%;
  height: 100%;
  background-color: #263238;
  margin: 0;
  padding: 0;
  font-family: 'Roboto', Helvetica, Arial, sans-serif;
  color: #fff;
}

.widget-container {
  width: 612px;
  height: 412px;
  display: block;
  background-color: #313e45;
  border-radius: 25px;
/*   border: 5px solid #eceff1; */
  margin: 0 auto;
}


/* Widget 4 Quarter Division here */

.top-left {
  height: 60%;
  width: 50%;
  /*   background-color:red; */
  padding: 55px 0 0 70px;
  display: inline-block;
}

.top-right {
  height: 60%;
  width: 50%;
  /*   background-color: blue; */
  float: right;
  padding: 55px 0 0 0;
}

.bottom-left {
  height: 40%;
  width: 45%;
  /*   background-color:orange; */
  float: left;
  margin: 0;
  padding: 40px 0 0 50px;
}

.bottom-right {
  height: 40%;
  width: 55%;
  /*   background-color: brown; */
  float: right;
  padding: 25px 0 0 60px;
}

h1,
h2,
h3,
p {
  margin: 0;
  padding: 0;
}


/* Top-left Div CSS */

#city {
  font-weight: 900;
  font-size: 25px;
}

#day {
  font-weight: 700;
  font-size: 25px;
  margin-top: 18px;
}

#date {
  font-weight: 500;
  font-size: 20px;
  margin-top: 4px;
}

#time {
  font-weight: 400;
  font-size: 18px;
  margin-top: 8px;
}

#codepen-link {
  font-weight: 400;
  font-size: 12px;
  margin-top: 20px;
}

.top-left > a {
  text-decoration: none;
  color: white;
}

.top-left > a:hover {
  color: #b0bec5;
}


/* Top-Right Div CSS */

#weather-status {
  font-size: 18px;
  font-weight: 300;
  text-align: center;
  margin: 0 auto;
}

.top-right > img {
  width: 120px;
  height: 120px;
  display: block;
  margin: 15px auto 0 auto;
}


/* Horizontal-Half-divider */

.horizontal-half-divider {
  width: 100%;
  height: 3px;
  margin-top: -5px;
  background-color: #263238;
}

.vertical-half-divider {
  width: 3px;
  position: absolute;
  height: 167px;
  background-color: #263238;
  float: right;
  display: inline-block;
  padding: 0;
}


/* Bottom-left CSS */

#temperature,
#celsius,
#temp-divider,
#fahrenheit {
  display: inline;
  vertical-align: middle;
}

#temperature {
  font-size: 60px;
  font-weight: 800;
  margin-right: 5px;
}

#celsius {
  margin-right: 10px;
}

#fahrenheit {
  margin-right: 5px;
  color: #b0bec5;
}

#celsius,
#temp-divider,
#fahrenheit {
  font-size: 30px;
  font-weight: 800;
}

#celsius:hover,
#fahrenheit:hover {
  cursor: pointer;
}




/* Bottom-Right CSS */

.other-details-key {
  float: left;
  font-size: 16px;
  font-weight: 300;
}

.other-details-values {
  float: left;
  font-size: 16px;
  font-weight: 400;
  margin-left: 40px;
}

.watermark-link {
  text-decoration:none;
  color:#b0bec5;
}

.watermark-link:hover {
  color:white;
  text-decoration:none;
}

.watermark {
  margin-top:10px;
  text-align:center;
  font-weight:400;
}
</style>
<?php $conversion =($weatherReport->currently->temperature - 32) * (5/9); ?>
<div class="wrapper">

  <div class="widget-container">
  <form>

Enter City : <input type="text" name="city" style="color:black;" value="<?=$wInstance->city?>">
</form>
    <div class="top-left">
    
      <h1 class="city" id="city"><?=$wInstance->city?> , <?=$wInstance->country?> </h1>
      <h2 id="day"><?= date("l",$weatherReport->currently->time )?></h2>
      <h3 id="date"><?= date("M",$weatherReport->currently->time )?>, <?= date("d",$weatherReport->currently->time )?> <?= date("Y",$weatherReport->currently->time )?></h3>
      <h3 id="time"><?= date("H:i a",$weatherReport->currently->time )?></h3>
<!--       <a target="_blank" href="https://codepen.io/myleschuahiock/"><p id="codepen-link">codepen.io/myleschuahiock</p></a> -->
      <p class="geo"></p>
    </div>
    <div class="top-right">
      <h1 id="weather-status">Weather / Weather Status</h1>
      <img class="weather-icon" src="https://myleschuahiock.files.wordpress.com/2016/02/sunny2.png">
    </div>
    <div class="horizontal-half-divider"></div>
    <div class="bottom-left">
      <h1 id="temperature"><?= round($conversion) ?></h1>
      <h2 id="celsius">&degC</h2>
      <h2 id="temp-divider">/</h2>
      <h2 id="fahrenheit">&degF</h2>
    </div>
    <div class="vertical-half-divider"></div>
    <div class="bottom-right">
      <div class="other-details-key">
        <p>Wind Speed</p>
        <p>Humidity</p>
        <p>Pressure</p>
        <p>Summary</p>
        
      </div>
      <div class="other-details-values">
        <p class="windspeed"><?= $weatherReport->currently->windSpeed ?> Km/h</p>
        <p class="humidity"><?= $weatherReport->currently->humidity ?> %</p>
        <p class="pressure"><?= $weatherReport->currently->pressure ?> hPa</p>
        <p class="sunrise-time"><?= $weatherReport->currently->summary ?></p>
        
      </div>
    </div>
  </div>
</div>