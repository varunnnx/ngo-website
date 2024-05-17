<?php

$servername = "localhost";
$username = "root";
$password = "";
$dbname = "charity_db";

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

$sql = "SELECT id, email, phone, address, website, focus_areas, geographical_scope, collaboration_interests, key_achievements, partnerships, created_at FROM users";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    while ($row = $result->fetch_assoc()) {
        echo '<div class="card mb-3">';
        echo '<div class="card-body">';
        echo '<form action="update_user.php" method="post">';
        echo '<input type="hidden" name="user_id" value="' . $row['id'] . '">';
        echo '<p><strong>Email:</strong> ' . $row['email'] . '</p>';
        echo '<p><strong>Phone:</strong> <input type="text" name="phone" value="' . $row['phone'] . '"></p>';
        echo '<p><strong>Address:</strong> <input type="text" name="address" value="' . $row['address'] . '"></p>';
        echo '<p><strong>Website:</strong> <input type="text" name="website" value="' . $row['website'] . '"></p>';
        echo '<p><strong>Focus Areas:</strong> <input type="text" name="focus_areas" value="' . $row['focus_areas'] . '"></p>';
        echo '<p><strong>Geographical Scope:</strong> <input type="text" name="geographical_scope" value="' . $row['geographical_scope'] . '"></p>';
        echo '<p><strong>Collaboration Interests:</strong> <input type="text" name="collaboration_interests" value="' . $row['collaboration_interests'] . '"></p>';
        echo '<p><strong>Key Achievements:</strong> <input type="text" name="key_achievements" value="' . $row['key_achievements'] . '"></p>';
        echo '<p><strong>Partnerships:</strong> <input type="text" name="partnerships" value="' . $row['partnerships'] . '"></p>';
        echo '<p><strong>Created At:</strong> ' . $row['created_at'] . '</p>';
        echo '<button type="submit" class="btn btn-primary">Save Changes</button>';
        echo '</form>';
        echo '</div>';
        echo '</div>';
    }
} else {
    echo "No communities found.";
}

// Close connection
$conn->close();
?>
