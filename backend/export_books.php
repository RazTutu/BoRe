<?php
$db = new \PDO('mysql:host=eu-cdbr-west-02.cleardb.net;dbname=heroku_18acf4529517193', 'bb805e9a46b13e', '5b8a2c50');
$sth1 = $db->prepare("select book_name,book_author, count(book_review) as number_of_reviews from book_reviews group by book_name,book_author order by number_of_reviews desc;");
$sth1->execute();
$data_export = "";
$response = "";

while ($row1 = $sth1->fetch(PDO::FETCH_BOTH)) {
    $data_export .= $row1['book_name'] . ',' .  $row1['number_of_reviews'] . ',' . $row1['book_author'] . "\n";
    $response = "book_name,number_of_reviews,book_author,\n";
    $response .= $data_export;
}
$csv_filename = 'db_export_' . date('Y-m-d') . '.csv';
header("Content-type: text/x-csv");
header("Content-Disposition: attachment; filename=" . $csv_filename . "");
echo ($response);
?>

?>