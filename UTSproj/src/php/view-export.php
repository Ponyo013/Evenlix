<?php
require 'vendor/autoload.php';
require 'connect.php';
use PhpOffice\PhpSpreadsheet\Spreadsheet;
use PhpOffice\PhpSpreadsheet\Writer\Xlsx;

$sql = "
SELECT 
    r.registration_id, 
    u.username, 
    e.event_name, 
    r.registration_date, 
    r.tickets 
FROM 
    registrations r
JOIN 
    users u ON r.user_id = u.user_id
JOIN 
    events e ON r.event_id = e.id_events
";
$result = $conn->query($sql);

$spreadsheet = new Spreadsheet();
$sheet = $spreadsheet->getActiveSheet();

$sheet->setCellValue('A1', 'Registration ID');
$sheet->setCellValue('B1', 'Username');
$sheet->setCellValue('C1', 'Event Name');
$sheet->setCellValue('D1', 'Registration Date');
$sheet->setCellValue('E1', 'Tickets');

if ($result->num_rows > 0) {
    $row = 2; 
    while ($data = $result->fetch_assoc()) {
        $sheet->setCellValue('A' . $row, $data['registration_id']);
        $sheet->setCellValue('B' . $row, $data['username']);
        $sheet->setCellValue('C' . $row, $data['event_name']);
        $sheet->setCellValue('D' . $row, $data['registration_date']);
        $sheet->setCellValue('E' . $row, $data['tickets']);
        $row++;
    }
}

header('Content-Type: application/vnd.openxmlformats-officedocument.spreadsheetml.sheet');
header('Content-Disposition: attachment;filename="registrations.xlsx"');
header('Cache-Control: max-age=0');

$writer = new Xlsx($spreadsheet);
$writer->save('php://output');
$conn->close();
exit;
?>