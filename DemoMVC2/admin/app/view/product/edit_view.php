<div class="content-wrapper">
	<div class="container-fluid">
		<div class="row">
			<div class="col-lg-12">
				<h3 class="text-center"> Edit Product</h3>
				<a href="?c=product" title="List product" class="btn btn-info">List Product</a>
				<hr> 			
			</div>
			<?php if(!empty($data['editErr'])) :?>
				<div class="col-lg-12">
					<ul>
						<?php foreach($data['editErr'] as $err):?>
							<?php if($err!==''):?>
								<li style="color: red;"><?= $err;?></li>
							<?php endif;?>
						<?php endforeach;?>
					</ul>
				</div>
			<?php endif; ?>
			<?php if(!empty($data['state']) && $data['errName']!=='') :?>
				<div class="col-lg-12">
					<h4 style="color: red;">San pham <b><?=' '.$data['errName'].' ';?></b>da ton tai. Vui long chon ten khac</h4>
				</div>
			<?php endif;?>
			<div class="col-lg-12">
				<form action="?c=product&m=handleEdit&id=<?=$data['info']['id']?>" method="POST" enctype="multipart/form-data">
					<div class="row">
						<div class="col-lg-6">
							<div class="form-group">
								<label for="namePd">Name</label>
								<input type="text" name="namePd" class="form-control" value="<?=$data['info']['name_pd']?>">

							</div>

							<div class="form-group">
								<label for="slcCat">Categories</label>
								<select name="slcCat" class="form-control">
									<?php foreach($data['lstCat'] as $key => $val):?>
										<option <?php echo ($val['id'] == $data['info']['cat_id']) ? "selected ='selected'" : ""?> value="<?php echo $val['id']; ?>"><?php echo $val['name_cat'];?></option> 	
									<?php endforeach; ?>							
								</select>

							</div>

							<div class="form-group">
								<label for="slcSize">Sizes</label>
								<select name="slcSize" class="form-control">
									<?php foreach($data['lstSize'] as $key => $val):?>
										<option <?php echo ($val['id'] == $data['info']['size_id']) ? "selected ='selected'" : ""?>  value="<?php echo $val['id']; ?>"><?php echo $val['name_size'];?></option> 	
									<?php endforeach; ?>								
								</select>

							</div> 	
							<div class="form-group">
								<label for="imagePd">Image</label>
								<input type="file" name="imagePd"  class="form-control">
								<br>
								<img src="<?php echo PATH_IMAGE.$data['info']['image_pd'];?>" alt="" width="90" height="90">
							</div>			
						</div>
						<div class="col-lg-6">
							<div class="form-group">
								<label for="pricePd">Price</label>
								<input type="text" name="pricePd"  class="form-control" value="<?=$data['info']['price_pd']?>">
								
							</div>	
							<div class="form-group">
								<label for="qtyPd">Quantity</label>
								<input type="number" name="qtyPd"  class="form-control" value="<?=$data['info']['qty_pd']?>">
								
							</div>	
							<div class="form-group">
								<label for="des_pd">Description</label>
								<textarea class="form-control" rows="5"  name="des_pd">
									<?=$data['info']['des_pd']?>
								</textarea>
								
							</div>	
						</div>
						<div class="col-lg-6 offset-3">
							<button type="submit" class="btn btn-primary btn-block" style="margin: 10px 0px;" name="btnEdit">Update</button>						
						</div>

					</div>
				</form>	
			</div>

		</div>
	</div>
</div>