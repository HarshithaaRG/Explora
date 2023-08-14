
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="icon" href="assets/logo.png"  type="image/x-icon">
  <link rel="stylesheet" href="showevents.css">
  <title>Your event</title>
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
  <!-- HTML code for displaying event cards -->
<div class="event-cards">
  <?php
  session_start(); 
  include "dbcon.php";
  // Retrieve the email from the session variable
  $email = $_SESSION['email'];

  // Fetch events from the database for the logged-in user's email
  $sql = "SELECT * FROM events WHERE email = '$email'";
  $result = mysqli_query($conn, $sql);

  // Loop through the result and display event cards
  while ($row = mysqli_fetch_assoc($result)) {
    $eventName = $row['name'];
    $venue = $row['venue'];
    $time = $row['time'];
    $ticketsAvailable = $row['tickets_available'];
    $price = $row['price'];

    // Display the event details in a card
    echo '<div class="event-card">';
    echo '<h3>' . $eventName . '</h3>';
    echo '<br>';
    echo '<p>Venue: ' . $venue . '</p>';
    echo '<p>Time: ' . $time . '</p>';
    echo '<p>Tickets Available: ' . $ticketsAvailable . '</p>';
    echo '<p>Price: ' . $price . '</p>';
    echo '</div>';
  }

  // Free the result set
  mysqli_free_result($result);
  ?>
</div>
</body>
</html>
