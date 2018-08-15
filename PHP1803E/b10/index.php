<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Demo CURL - Weather</title>
    <link rel="stylesheet" href="public/css/style.css">
    <script src="public/js/jquery.min.js" type="text/javascript"></script>
</head>
<body>
    <div class="container">
        <header id="header" class="header">
            <div class="sologan">
                <h1>Demo Weather city word</h1>
            </div>
            <div class="logo">
                <img src="public/img/Weather.jpg" alt="weather">
            </div>
        </header>
        <nav>
            <div class="form-group">
                <input type="text" name="txtCity" id="txtCity" placeholder="Entent city name....!" class="form-control">
                <button id="btnSearch" type="button" class="btn">Search</button>
            </div>
        </nav>
        <div id="loading">
            <img src="public/img/loading.gif" alt="loding">
        </div>
        <section id="mainResut"></section>
    </div>
    <script type="text/javascript">
        // dinh nghia ajax JQ o day
        $(function(){
            $('#btnSearch').click(function(){
                let cityName = $('#txtCity').val().trim();
                //alert(cityName);
                if(cityName === ''){
                    alert('Enter city name');
                } else {
                    $.ajax({
                        url: 'controller/weather.php',
                        type: 'POST',
                        data : {name : cityName},
                        beforeSend: function(){
                            $('#loading').show();
                        },
                        success: function(result){
                            $('#loading').hide();
                            $('#mainResut').html(result);
                        }
                    });
                }
            });
        })
    </script>
</body>
</html>