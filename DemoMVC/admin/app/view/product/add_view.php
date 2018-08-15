<div class="content-wrapper">
	<div class="container-fluid">
		<div class="row">
			<div class="col-lg-12">
				<h3 class="text-center"> Add Product</h3>
				<a href="?c=product" title="List product" class="btn btn-info">List Product</a>
				<hr> 			
			</div>
			<?php if(!empty($data['errAdd'])): ?>
				<div class="col-lg-12">
					<ul>
						<?php foreach($data['errAdd'] as $err):?>
							<?php if($err!==''): ?>
								<li style="color:red;">
									<?php echo $err?>

								</li>
							<?php endif;?>
						<?php endforeach?>
					</ul>

				</div>
			<?php endif; ?>
			
			<?php if($data['state'] !=='' && $data['errName']!==''):?>
				<div class="col-lg-12">
					<h4 style="color:red;">
						San pham <b><?php echo $data['errName'] ?></b> da ton tai vui long nhap ten khac
					</h4>
					
				</div>
			<?php endif;?>
			
			<div class="col-lg-12">
				<form action="?c=product&m=handleAdd" method="POST" enctype="multipart/form-data">
					<?php
					$state = $_GET['state']??'';
					if($state==='fail'){
						$err = $_SESSION['errorAdd'] ?? [];
					}
					$namepderr= null;
					$catiderr = null;
					$sizeiderr = null;
					$priceerr = null;
					$qtyerr = null;
					$despderr = null;
					$imageerr = null;
					if(!empty($err)){
						$namepderr = $err['namepd'] ??'';
						$catiderr = $err['catid'] ??'';
						$sizeiderr = $err['sizeid'] ??'';
						$priceerr = $err['price'] ??'';
						$qtyerr = $err['qty'] ??'';
						$despderr = $err['despd'] ??'';
						$imageerr = $err['image'] ??'';					
					}
				// if($state==='exists'){
				// 	echo"<p style ='color:red;'>Ten san pham da ton tai vui long nhap ten khac</p>";
				// }
					// if(!empty($err)){
					// 	foreach ($err as $key => $error) {
					// 		if($error!==''){
					// 			echo"<p style ='color:red;'>{$error}</p>";
					// 		}

					// 	}
					// }
					?>	

					<div class="row">
						<div class="col-lg-6">
							<div class="form-group">
								<label for="namePd">Name</label>
								<input type="text" name="namePd" class="form-control">
								<?php if(!empty($namepderr)):?>
									<p style="color:red;"><?php echo $namepderr;?></p>	
								<?php endif;?>						
							</div>

							<div class="form-group">
								<label for="slcCat">Categories</label>
								<select name="slcCat" class="form-control">
									<?php foreach($data['lstCat'] as $key => $val):?>
										<option value="<?php echo $val['id']; ?>"><?php echo $val['name_cat'];?></option> 	
									<?php endforeach; ?>							
								</select>
								<?php if(!empty($catiderr)):?>
									<p style="color:red;"><?php echo $catiderr;?></p>	
								<?php endif;?>												
							</div>

							<div class="form-group">
								<label for="slcSize">Sizes</label>
								<select name="slcSize" class="form-control">
									<?php foreach($data['lstSize'] as $key => $val):?>
										<option value="<?php echo $val['id']; ?>"><?php echo $val['name_size'];?></option> 	
									<?php endforeach; ?>								
								</select>
								<?php if(!empty($sizeiderr)):?>
									<p style="color:red;"><?php echo $sizeiderr;?></p>	
								<?php endif;?>							
							</div> 	
							<div class="form-group">
								<label for="imagePd">Image</label>
								<input type="file" name="imagePd"  class="form-control">
								<?php if(!empty($imageerr)):?>
									<p style="color:red;"><?php echo $imageerr;?></p>	
								<?php endif;?>
							</div>			
						</div>
						<div class="col-lg-6">
							<div class="form-group">
								<label for="pricePd">Price</label>
								<input type="text" name="pricePd"  class="form-control">
								<?php if(!empty($priceerr)):?>
									<p style="color:red;"><?php echo $priceerr;?></p>	
								<?php endif;?>
							</div>	
							<div class="form-group">
								<label for="qtyPd">Quantity</label>
								<input type="number" name="qtyPd"  class="form-control">
								<?php if(!empty($qtyerr)):?>
									<p style="color:red;"><?php echo $qtyerr;?></p>	
								<?php endif;?>
							</div>	
							<div class="form-group">
								<label for="des_pd">Description</label>
								<textarea class="form-control" rows="5"  name="des_pd"></textarea>
								<?php if(!empty($despderr)):?>
									<p style="color:red;"><?php echo $despderr;?></p>	
								<?php endif;?>
							</div>	
						</div>
						<div class="col-lg-6 offset-3">
							<button type="submit" class="btn btn-primary btn-block" style="margin: 10px 0px;" name="btnSubmit">Add</button>						
						</div>

					</div>
				</form>	
			</div>

		</div>
	</div>
</div>