
<div class="content-wrapper">
  <div class="container-fluid">
    <!-- Breadcrumbs-->
    <ol class="breadcrumb">
      <li class="breadcrumb-item">
        <a href="#">Product</a>
      </li>
      <li class="breadcrumb-item active">My Product</li>
    </ol>
    <div class="row">
      
      <div class="col-md-12">
        <h2>This is product - <?php echo $data['age'];?></h2>  
        <a href="?c=product&m=add"title ="Add Product" class="btn btn-primary pull-right" style="margin-bottom: 5px;">Add +</a>
        <table class="table">
          <thead>
            <tr>
              <th>#</th>
              <th>Name</th>
               <th>Image</th>
              <th>Price</th>
              <th>Quantity</th>          
              <th>Status</th>
              <th colspan="2" class="text-center">Action</th>
            </tr>
          </thead>
          <tbody>
            <?php foreach($data['lstPd'] as $key => $val):?>
            <tr>
              <td><?php echo $key+1;?></td>
              <td><?php echo $val['name_pd'];?></td>
              <td><img with="120" height="120" src="<?php echo PATH_IMAGE.$val['image_pd'];?>" alt=""></td>
              <td><?php echo number_format($val['price_pd']);?></td>
              <td><?php echo $val['qty_pd'];?></td>
              <td><?php echo ($val['status_pd']==1) ? 'con hang' :'hethang' ;?></td>
              <td><a href="?c=product&m=edit&id=<?= $val['id'];?>" title="Edit" class="btn btn-primary">Edit</a></td>
              <td><button onclick="deleteProduct(<?php echo $val['id'];?>);" type="button" class="btn btn-danger">Delete</button></td>
            </tr>
          <?php endforeach;?>
          </tbody>
        </table>
        
      </div>  
    </div>
  </div>
</div>
<!-- /.container-fluid-->
<!-- /.content-wrapper-->
<script type="text/javascript">
  function deleteProduct(idPd){
    if(idPd!==''){
      $.ajax({
        url:"?c=product&m=delete",
        type: "POST",
        data : {id:idPd},
        success : function (res){
          res = $.trim(res);
          if(res==='ERR'){
            alert('Co loi xay ra');
          }else{
            alert('Xoa thanh cong');
            window.location.reload(true);
          }

        }

      });
    }
  }
  
</script>
