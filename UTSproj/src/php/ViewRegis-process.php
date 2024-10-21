<?php
require "connect.php";

$stmt = $conn->prepare("
    SELECT 
        e.event_name,
        e.date_time,
        e.status,
        IFNULL(GROUP_CONCAT(u.username SEPARATOR ', '), 'No registrant registered') AS registrants
    FROM 
        events e
    LEFT JOIN 
        users u ON e.id_events = u.id_events
    GROUP BY 
        e.id_events, e.event_name, e.date_time, e.status
    ORDER BY 
        e.date_time
");

$stmt->execute();
$result = $stmt->get_result();

if ($result->num_rows > 0) {
    while ($row = $result->fetch_assoc()) {
        echo "<tr>
                <td>" . htmlspecialchars($row['event_name']) . "</td>
                <td class='text-start'>" . htmlspecialchars($row['date_time']) . "</td>
                <td>" . htmlspecialchars($row['status']) . "</td>
                <td>" . htmlspecialchars($row['registrants']) . "</td>
              </tr>";
    }
} else {
    echo "<tr><td colspan='4'>No events found</td></tr>";
}

$stmt->close();
?>
