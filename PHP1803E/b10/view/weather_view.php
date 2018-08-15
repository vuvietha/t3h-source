<?php if($listWearther): ?>
    <?php foreach($listWearther as $key => $items): ?>
        <div class="weatherData" style="border-bottom: 1px solid #ccc;margin: 8px 0px;width: 100%;">
            <h4><strong><?php echo $items['dt_txt']; ?></strong></h4>

            <p>temp: <?php echo $items['main']['temp']; ?> C</p>
            <p>humidity: <?php echo $items['main']['humidity'] ?> %</p>
            <p>sea_level: <?php echo $items['main']['sea_level']; ?></p>
            <p>description: <?php echo $items['weather'][0]['description']; ?></p>

            <p>
                <img src="http://openweathermap.org/img/w/<?php echo $items['weather'][0]['icon']; ?>.png" alt="">
            </p>

            <p>wind: <?php echo $items['wind']['speed']; ?> m/s</p>
        </div>
    <?php endforeach; ?>
<?php else: ?>
    <h3 style="text-align: center;"> Khong co ket qua</h3>
<?php endif; ?>