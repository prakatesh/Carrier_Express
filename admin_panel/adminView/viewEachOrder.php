<div class="container">
<table class="table table-striped">
    <thead>
        <tr>
            <th>S.N.</th>
            <th>Vehicle Owner</th>
            <th>Veh Owner Mobile</th>
            <th>Labour name</th>
            <th>Labour Count</th>
            <th>Labour Mobile</th>
        </tr>
    </thead>
    <?php
        include_once "../config/dbconnect.php";
        $ID= $_GET['cust_id'];
        //echo $ID;
        // $sql="SELECT * from product_size_variation v, order_details d 
        // where v.variation_id=d.variation_id AND
        // d.order_id=$ID";
        $sql="SELECT * from order_det where cust_id=$ID";
        $result=$conn-> query($sql);
        $count=1;
        if ($result-> num_rows > 0){
            while ($row=$result-> fetch_assoc()) {
    
    ?>
                <tr>
                    <td><?=$count?></td>
                    <td><?=$row["name_veh"]?></td>
                    <td><?=$row["mob_veh"]?></td>
                    <td><?=$row["name_lab"]?></td>
                    <td><?=$row["count_lab"]?></td>
                    <td><?=$row["mob_lab"]?></td>
                </tr>
    <?php
                $count=$count+1;
            }
        }else{
            echo "error";
        }
    ?>
</table>
</div>
