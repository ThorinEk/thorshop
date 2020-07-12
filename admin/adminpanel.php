<!DOCTYPE html>
<html lang="sv">
<head>
<meta charset="utf8">
<title>ICA Adminpanel</title>
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
</head>
<body>

<div class="jumbotron bg-primary text-white">
  <h1 class="display-4">Nordpost Adminpanel</h1>
  <p class="lead">Skicka aviseringar till kunden snabbt och smidigt.</p>
  <hr class="my-4">
  <p>Utvecklad av Thorin</p>
</div>

<div class="container">
    <form action="messageSent.php" method="post">
        <div class="form-group">
        <label for="meddelande">Välj meddelande</label>
                <select class="form-control" id="meddelande" name="meddelande" required>
                    <option value="standard">Paket på ombud</option>
                    <option value="LDH_onTheWay">LDH Express på väg</option>
                    <option value="LDH_delivered">LDH Express levererat</option>
                    <option value="LDH_trackingCode">LDH Express spåra på hemsida</option>
                </select>
        </div>
        <div class="form-group">    
            <label for="cityName">Stad</label>
            <input type="text" class="form-control" id="cityName" name="cityName" placeholder="Mottagarens stad" required>
        </div>
        <div class="form-row">
            <div class="col">
                <label for="landskod">Mottagarens landskod</label>
                <select class="form-control" id="landskod" name="landskod" required>
                    <option selected="selected" value="46">Sverige</option>
                    <option value="45">Danmark</option>
                    <option value="47">Norge</option>
                    <option value="358">Finland</option>
                </select>
            </div>
            <div class="col">
                <label for="telefonNummer">Telefonnummer</label>
                <input type="number" class="form-control" id="telefonNummer" name="telefonNummer" placeholder="Mottagarens telefonnummer" required>
            </div>
        </div>
        <br>
        <button type="submit" class="btn btn-primary">Skicka SMS-avisering</button>
    </form>
</div>

<script src="https://code.jquery.com/jquery-3.4.1.min.js" integrity="sha256-CSXorXvZcTkaix6Yvo6HppcZGetbYMGWSFlBw8HfCJo=" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.5.0/jquery.min.js" integrity="sha256-xNzN2a4ltkB44Mc/Jz3pT4iU1cmeR0FkXs4pru/JxaQ=" crossorigin="anonymous"></script>
</body>
</html>