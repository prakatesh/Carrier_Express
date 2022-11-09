<script>
  function ChangeOrderStatus(id){
    $.ajax({
        url:"./controller/updateOrderStatus.php",
        method:"post",
        data:{record:id},
        success:function(data){
            alert('Delivery Status updated successfully');
            $('form').trigger('reset');
            showOrders();
        }
    });
}
function ChangePay(id){
    $.ajax({
        url:"./controller/updatePayStatus.php",
        method:"post",
        data:{record:id},
        success:function(data){
            alert('Payment Status updated successfully');
            $('form').trigger('reset');
            showOrders();
        }
    });
}
function showOrders(){
    $.ajax({
        url:"./adminView/viewAllOrders.php",
        method:"post",
        data:{record:1},
        success:function(data){
            $('.allContent-section').html(data);
        }
    });
}
</script>

<div id="ordersBtn" >
  <h2>Assigned Details</h2>
  <table class="table table-striped">
    <thead>
      <tr>
        <th>Cus.ID</th>
        <th>Customer</th>
        <th>Contact</th>
        <th>Vehicle</th>
        <th>Location</th>
        <th>Delivery Status</th>
        <th>Payment Status</th>
        <th>More Details</th>
     </tr>
    </thead>
     <?php
      include_once "../config/dbconnect.php";
      $sql="SELECT * from order_det";
      $result=$conn-> query($sql);
      
      if ($result-> num_rows > 0){
        while ($row=$result-> fetch_assoc()) {
    ?>
       <tr>
          <td><?=$row["cust_id"]?></td>
          <td><?=$row["name_cus"]?></td>
          <td><?=$row["mob_cus"]?></td>
          <td><?=$row["cho_veh"]?></td>
          <td><?=$row["location"]?></td>
           <?php 
                if($row["order_status"]==0){
                            
            ?>
                <td><button class="btn btn-danger" onclick="ChangeOrderStatus('<?=$row['cust_id']?>')">Pending </button></td>
            <?php      
                }else{
            ?>
                <td><button class="btn btn-success" onclick="ChangeOrderStatus('<?=$row['cust_id']?>')">Delivered</button></td>
        
            <?php
            }
                if($row["pay_status"]==0){
            ?>
                <td><button class="btn btn-danger"  onclick="ChangePay('<?=$row['cust_id']?>')">Unpaid</button></td>
            <?php
                        
            }else if($row["pay_status"]==1){
            ?>
                <td><button class="btn btn-success" onclick="ChangePay('<?=$row['cust_id']?>')">Paid </button></td>
            <?php
                }
            ?>
              
        <td><a class="btn btn-primary openPopup" data-href="./adminView/viewEachOrder.php?cust_id=<?=$row['cust_id']?>" href="javascript:void(0);">View</a></td>
        </tr>
    <?php
            
        }
      }
    ?>
     
  </table>
   
</div>
<!-- Modal -->
<div class="modal fade" id="viewModal" role="dialog">
    <div class="modal-dialog modal-lg">
      <!-- Modal content-->
      <div class="modal-content">
        <div class="modal-header">
          
          <h4 class="modal-title">Assigned Details</h4>
          <button type="button" class="close" data-dismiss="modal">&times;</button>
        </div>
        <div class="order-view-modal modal-body">
        
        </div>
      </div><!--/ Modal content-->
    </div><!-- /Modal dialog-->
  </div>
<script>
     //for view order modal  
    $(document).ready(function(){
      $('.openPopup').on('click',function(){
        var dataURL = $(this).attr('data-href');
    
        $('.order-view-modal').load(dataURL,function(){
          $('#viewModal').modal({show:true});
        });
      });
    });
 </script>