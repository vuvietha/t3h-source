<?php if($flagCheck):?>
	<!-- <h3><?= $keyword?> co trong db</h3> -->
	<ul>
		<?php foreach($dataTest as $k => $i):?>
			<li>
				<p>
					<?=$i['nhacsi']?>
				</p>
				<p>
					<?=$i['baihat']?>
				</p>
				<p>
					<img width="90" height="90" src="<?=$i['img']?>" alt="">
				</p>
			</li>
		<?php endforeach;?>
	</ul>
	
<?php else:?>
	<h3><?= $keyword?> khong co trong db</h3>
<?php endif;?>