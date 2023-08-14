<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="icon" href="assets/logo.png"  type="image/x-icon">
  <link rel="stylesheet" href="eventform.css">
  <title>Add your event</title>
</head>
<body>
  <header>
    <nav>
      <div class="logo">
        <h1>Explora</h1>
      </div>
      <ul class="nav-links">
        <li><a href="index.html">Home</a></li>
        <li><a href="eventsearch.html">Events</a></li>
        <li><a href="#">About</a></li>
        <li><a href="#">Contact</a></li>
      </ul>
    </nav>
  </header>
  <div class="form">
    
<form action="eventform1.php" method="POST" class="event-form">
  <?php if (isset($_GET['error'])) { ?>
    <p class="error"><?php echo $_GET['error']; ?></p>
  <?php } ?>

     <?php if (isset($_GET['success'])) { ?>
          <p class="success"><?php echo $_GET['success']; ?></p>
     <?php } ?>
  <div class="form-group">
    <label for="name">Event Name</label>
    <input type="text" name="name" id="name" required>
  </div>
  <div class="form-group">
    <label for="venue">Venue</label>
    <input type="text" name="venue" id="venue" required>
  </div>
  <div class="form-group">
    <label for="time">Event Time</label>
    <input type="text" name="time" id="time" required>
  </div>
  <div class="form-group">
    <label for="tickets">Number of Tickets Available</label>
    <input type="number" name="tickets" id="tickets" required>
  </div>
  <div class="form-group">
    <label for="price">Price</label>
    <input type="number" name="price" id="price" required>
  </div>
  <input type="submit" value="Add Event" class="btn-submit">
</form>

  </div>