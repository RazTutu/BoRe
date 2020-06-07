<?php
$data_export = "";
$response = "";
$dbh = new \PDO('mysql:host=eu-cdbr-west-02.cleardb.net;dbname=heroku_18acf4529517193', 'bb805e9a46b13e', '5b8a2c50');
$sth = $dbh->prepare("select username, count(username) as number_of_reviews from book_reviews group by username
                              order by number_of_reviews desc limit 10;");
$sth->execute();
while ($row = $sth->fetch(PDO::FETCH_BOTH)) {
    $data_export .= $row['username'] . ',' .  $row['number_of_reviews'] . "\n";
    $response = " username,number_of_reviews,\n";
    $response .= $data_export;
}
$csv_filename = 'db_export_' . date('Y-m-d') . '.csv';
header("Content-type: text/x-csv");
header("Content-Disposition: attachment; filename=" . $csv_filename . "");
echo ($response);
