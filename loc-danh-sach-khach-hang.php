<?php
$customer_list = array(
    "1" => array("name" => "Mai Van A", "birthday" => "1983-08-20", "address" => "Ha Noi", "image" => "images/anh1.jpg"),
    "2" => array("name" => "Mai Van B", "birthday" => "1983-08-21", "address" => "Hai Duong", "image" => "images/anh2.jpg"),
    "3" => array("name" => "Mai Van C", "birthday" => "1983-08-22", "address" => "Ha Long", "image" => "images/anh3.jpg"),
    "4" => array("name" => "Mai Van D", "birthday" => "1983-08-17", "address" => "Ha Giang", "image" => "images/anh4.jpg"),
    "5" => array("name" => "Mai Van E", "birthday" => "1983-08-19", "address" => "Ha Trung", "image" => "images/anh5.jpg"),
);

function searchByDate($customers, $from_date, $to_date)
{
    if (empty($from_date) && empty($to_date)) {
        return $customers;
    }
    $filtered_customers = [];
    foreach ($customers as $values) {
        if (!empty($from_date) && (strtotime($values["birthday"]) < strtotime($from_date)))
            continue;

        if (!empty($to_date) && (strtotime($values["birthday"]) > strtotime($to_date)))
            continue;
        $filtered_customers[] = $values;
    }
    return $filtered_customers;
}
?>

  


<!DOCTYPE html>
<html>
 <head>  
 <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <link type = "text/css" rel="stylesheet" href="style.css">
  </head>
<body>
<?php
$from_date = null;
$to_date = null;
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $from_date = $_POST['from'];
    $to_date = $_POST['to'];
}
$filtered_customers =
searchByDate($customer_list, $from_date, $to_date);

?>

<form method="post">
        From: <input id = "from" type="text" name="from" placeholder="yyyy-mm-dd" values = "<?php echo isset($from_date)? $from_date :''?>"/>
        To: <input id = "to" type="text" name="to" placeholder="yyyy-mm-dd" values = "<?php echo isset($to_date)? $to_date :''?>"/>
        <input type="submit" id="submit" value="filter" />
</form>
 



<table border ="0" >
      <caption>
                <h1>Danh sách khách hàng</h1>
            </caption>
        
        <tr>
            <th>STT</th>
            <th>Tên</th>
            <th>Ngày Sinh</th>
            <th>Địa chỉ</th>
            <th>Ảnh</th>
        </tr>

        <?php if (count($filtered_customers) === 0 ): ?>
        <tr>
            <td colspan="5" class = "message"> Không tìm thấy khách hàng nào </td> 
            </tr>
        <?php endif; ?>
            
          
       
      <?php foreach ($filtered_customers as $key => $values): ?>  

        <tr>
         <td><?php echo $key  ; ?> </td>
         <td><?php echo $values["name"];?> </td>
         <td><?php echo $values["birthday"];?> </td>
         <td><?php echo $values["address"];?> </td>
         <td><div class="image"><img src = "<?php echo $values['image'] ;?>" width = '60px' height ='60px'/> </div> </td>
           </tr>
         <?php endforeach; ?>
    </table>
</body>
</html>