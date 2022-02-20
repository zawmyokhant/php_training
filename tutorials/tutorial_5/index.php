<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Document</title>
</head>
<style>
  body {
    text-align :center;
  }
</style>
<body>
<?php
echo "<h1>Reading .txt file</h1>";
$txt_file = fopen("greeting.txt", "r") or die("Unable to open this file");
while ($line = fgets($txt_file)) {
    echo "$line<br/>";
}
fclose($txt_file);

echo "<h1>Reading .csv file</h1>";
$csv_file = fopen("greeting.csv", "r");
while ($csv = fgetcsv($csv_file)) {
    print_r($csv);
}
fclose($csv_file);
echo "<h1>Reading .xlsl file</h1>";
require_once "Classes/PHPExcel.php";
$path = "greet.xlsx";
$reader = PHPExcel_IOFactory::createReaderForFile($path);
$excel_Obj = $reader->load($path);

$worksheet = $excel_Obj->getSheet('0');
echo $worksheet->getCell('E33')->getValue();
$lastRow = $worksheet->getHighestRow();
$colomncount = $worksheet->getHighestDataColumn();
$colomncount_number = PHPExcel_Cell::columnIndexFromString($colomncount);
echo $lastRow . '     ';
echo $colomncount;
echo "<table border='1' align='center'>";
for ($row = 0; $row <= $lastRow; $row++) {
    echo "<tr>";
    for ($col = 0; $col <= $colomncount_number; $col++) {
        echo "<td>";
        echo $worksheet->getCell(PHPExcel_Cell::stringFromColumnIndex($col) . $row)->getValue();
        echo "</td>";
    }
    echo "</tr>";
}
echo "</table>";

echo "<h1>Reading .docx file";
function read_file_docx($filename)
{
    $striped_content = '';
    $content = '';
    if (!$filename || !file_exists($filename)) {
        return false;
    }

    $zip = zip_open($filename);
    if (!$zip || is_numeric($zip)) {
        return false;
    }

    while ($zip_entry = zip_read($zip)) {
        if (zip_entry_open($zip, $zip_entry) == false) {
            continue;
        }

        if (zip_entry_name($zip_entry) != "word/document.xml") {
            continue;
        }

        $content .= zip_entry_read($zip_entry, zip_entry_filesize($zip_entry));
        zip_entry_close($zip_entry);
    }
    zip_close($zip);
    $content = str_replace('</w:r></w:p></w:tc><w:tc>', " ", $content);
    $content = str_replace('</w:r></w:p>', "\r\n", $content);
    $striped_content = strip_tags($content);
    return $striped_content;
}
$filename = "greeting.docx";
$content = read_file_docx($filename);
if ($content !== false) {
    echo nl2br($content);
} else {
    echo 'Couldn\'t the file. Please check that file.';
}
?>
</body>
</html>