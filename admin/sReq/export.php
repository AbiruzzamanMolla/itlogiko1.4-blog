<?php
ob_start();
include "../db/conn.php";
include "../func/function.php";
$output = '';
if(isset($_POST["export"])){
    $query = htmlspecialchars($_POST["export"]);
    $result = $db->query($query);
    if($result){
    $output .= '<table class="table" bordered="1"><tr>
    <th>ID</th>  
    <th>Title</th>  
    <th>Author</th>
    <th>Category Name</th>  
    <th>Date</th>  
    <th>Tags</th>  
    <th>Content</th>  
    <th>Status</th>  
    </tr>
    ';
    while($row = $result->fetch_assoc()){
        $catName = showCatNameById($row["post_category_id"]);
        $output .= '
        <tr>  
            <td>'.$row["post_id"].'</td>  
            <td>'.$row["post_title"].'</td>  
            <td>'.$row["post_author"].'</td>  
            <td>'.$catName.'</td>  
            <td>'.$row["post_date"].'</td>  
            <td>'.$row["post_tags"].'</td>  
            <td>'.$row["post_content"].'</td>  
            <td>'.$row["post_status"].'</td>  
        </tr>
        ';
    }
    $output .= '</table>';
    header('Content-Type: application/xls');
    header('Content-Disposition: attachment; filename=download.xls');
    echo $output;
    }
}
