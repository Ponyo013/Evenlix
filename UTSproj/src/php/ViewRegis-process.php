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
        registrations r ON e.id_events = r.event_id
    LEFT JOIN 
        users u ON r.user_id = u.user_id
    GROUP BY 
        e.id_events, e.event_name, e.date_time, e.status
    ORDER BY 
        e.date_time
");

$stmt->execute();
$result = $stmt->get_result();

if ($result->num_rows > 0) {
    while ($row = $result->fetch_assoc()) {
        $status = ucfirst($row['status']);
        $bgColor = '';

        switch (strtolower($row['status'])) {
            case 'open':
                $bgColor = 'bg-success';
                break;
            case 'closed':
                $bgColor = 'bg-dark'; 
                break;
            case 'canceled':
                $bgColor = 'bg-danger'; 
                break;
            default:
                $bgColor = 'bg-secondary';
        }

        echo "<tr>
                <td>" . htmlspecialchars($row['event_name']) . "</td>
                <td class='text-start'>" . htmlspecialchars($row['date_time']) . "</td>
                <td><div class='$bgColor rounded-2 text-white text-center p-1 w-50' style='font-weight: bold; font-size: 0.8rem;'>" . $status . "</div></td>
                <td>" . htmlspecialchars($row['registrants']) . "</td>
              </tr>";
    }
} else {
    echo "<tr><td colspan='4'>No events found</td></tr>";
}

$stmt->close();
$conn->close();
?>
