<?php
  $fileName = "events.json";
  $file = fopen($fileName, "r") or die("Failed to load events");
  $json_str = fread($file, filesize($fileName));
  $data = json_decode($json_str, true);
  $type = $_GET["type"];
  // print_r($type);
  $eventData = $data["$type"];
  $title = $eventData["title"];
  $icon = $eventData["icon"];
  $shortName = $eventData["short_name"];
  $events = $eventData["events"];
  fclose($file);
?><!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="theme-color" content="#02b3e4">

    <!--<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta.3/css/bootstrap.min.css">-->
    <link rel="stylesheet" href="css/bootstrap.css">
    <!--<link href="https://fonts.googleapis.com/css?family=Clicker+Script" rel="stylesheet">-->
    <!--<link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">-->
    <link rel="stylesheet" href="css/ripple.css">
    
    <link rel="stylesheet" href="css/style.css">
    <title><?php echo $shortName; ?> Events - Sambhram 2018</title>
  </head>
  <body>

    <div class="event-loading visible">
      <div class="container-fluid full-height">
        <div class="row align-items-center full-height">
          <div class="col">
            <div class="event-loading-content">
              <img src="img/<?php echo $icon; ?>">
              <h4><?php echo $title; ?></h4>
              <p>Loading</p>
            </div>
          </div>
        </div>
      </div>
    </div>

    <header class="navbar sticky-top navbar-dark">
      <button class="navbar-toggler" type="button">
        <span class="navbar-toggler-icon"></span>
      </button>
      <a href="/" class="navbar-brand" href="#">Sambhram</a>
    </header>

    <div class="details-header">
      <nav class="navbar navbar-light bg-light">
        <div class="back-btn lripple">
          <img src="img/back.svg" />
        </div>
      </nav>
    </div>

    <div class="event-details">
      <div class="container-fluid full-height">
        <div class="row full-height">
          <div class="col-sm-6 no-overflow">
            <img id="event-img" class="img-fluid" src="">
          </div>
          <div class="col-sm-6 event-data">
            <h4><span class="event-title">Event Name</span> <span id="event-sub"></span></h4>
            <span id="event-day">#DAY</span>
            <hr/>
            <h5>Rules</h5>
            <ul id="event-rules"></ul>
            <hr/>
            <p class="text-center">
              <button id="event-reg" class="btn btn-info btn-sm">Register</button>
            </p>
            <hr/>
            <h5>Staff Coordinator</h5>
            <ul id="event-staff"></ul>
            <hr/>
            <h5>Student Coordinator</h5>
            <ul id="event-student"></ul>
            <hr/>
          </div>
        </div>
      </div>
    </div>

    <div class="events">
      <div class="container py-5">
        <div class="row">
        
          <div class="col-sm-12">
            <h2 class="section-title"><span>E</span>vents</h2>
          </div>
<?php foreach ($events as $i => $event) { ?>

          <div class="col-md-4 col-sm-6">
            <div class="event-card" data-event="<?php echo $i; ?>" data-type="<?php echo $type; ?>">
              <img class="img-fluid" src="img/<?php echo $event["img"]; ?>">
              <div class="event-card-body">
                <h5 class="event-card-title"><?php echo $event["title"]; ?></h5>
                <p class="event-card-text"><?php echo $event["short_desc"]; ?></p>
              </div>
            </div>
          </div>
  <?php } ?>

        </div>
      </div>
    </div>

    <footer>
      <div class="container-fluid">
        <div class="row">
          <div class="col text-center">
            &copy; 2018 ShreedeviSambhram
          </div>
        </div>
      </div>
    </footer>

    <div class="menu hide" style="display: none;">
      <button class="navbar-toggler"><img src="img/close.svg"/></button>
      <div class="container-fluid full-height">
        <div class="row text-center full-height align-items-center">
          <a href="event.php?type=ae" class="col-md-2">
            <span>AE</span>
          </a>
          <a href="event.php?type=cse" class="col-md-2">
            <span>CS/IS</span>
          </a>
          <a href="event.php?type=cv" class="col-md-2">
            <span>CV</span>
          </a>
          <a href="event.php?type=ece" class="col-md-2">
            <span>EC</span>
          </a>
          <a href="event.php?type=me" class="col-md-2">
            <span>ME</span>
          </a>
          <a href="event.php?type=cul" class="col-md-2">
            <span>Culturals</span>
          </a>
        </div>
      </div>
    </div>

    <div class="reg modal fade">
      <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title">Register for <span class="event-title"></span></h5>
            <button type="button" class="close reg-close" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>
          <div class="modal-body form">
            <form id="reg-form">
              <div class="form-group">
                <input type="text" class="form-control" placeholder="Full Name" id="name" />
              </div>
              <div class="form-group">
                <input type="text" class="form-control" placeholder="College" id="college" />
              </div>
              <div class="form-group">
                <input type="text" class="form-control" placeholder="Phone Number" id="phone" />
              </div>
              <div class="form-group">
                <input type="text" class="form-control" placeholder="Team Members if any" id="members" />
              </div>
              <hr />
              <button type="submit" id="reg-btn" class="btn btn-primary ml-2 float-right">Register</button>
              <button type="button" class="btn btn-secondary reg-close float-right">Close</button>
            </form>
          </div>
          <div class="modal-body success" style="display: none">
            Registratered. 😀
            <hr />
            <button type="button" class="btn btn-secondary reg-close float-right">Close</button>
          </div>
        </div>
      </div>
    </div>

    <div class="ripple-wrapper">
      <div class="ripple"></div>
    </div>

    <!-- TODO: use CDN -->
    <!--<script src="https://code.jquery.com/jquery-3.2.1.min.js"></script>-->
    <script src="js/jquery.js"></script>
    <!--<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta.3/js/bootstrap.min.js" integrity="sha384-a5N7Y/aK3qNeh15eJKGWxsqtnX/wWdSZSKp+81YjTmS15nvnvxKHuzaWwXHDli+4" crossorigin="anonymous"></script>-->
    <!--<script src="https://cdn.jsdelivr.net/particles.js/2.0.0/particles.min.js"></script>-->
    <script src="js/ripple.js"></script>
    <script>
    var events = <?php echo $json_str; ?>
    </script>
    <script src="js/event.js"></script>
  </body>
</html>