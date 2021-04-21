<?php
$doctors = getAllDataFromTable('id,title','sitepages','where categoryid = 2','limit 4');
?>
<div id="indexpop" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
	<div class="modal-dialog">
		<div class="modal-content">
			<div class="modal-header">
				<button type="button" class="close" data-dismiss="modal">&times;</button>
				<br>
				<h2 style="text-align:center;"><?php language('doctors'); ?></h2>
			</div>
			<div class="modal-body">
				<?php for($dc=0;$dc<count($doctors);$dc++) { ?>
					<?php if($dc%2 == 0) { ?><div class="row" style="margin-top:25px;"><?php } ?>
						<div class="col-md-6 col-xs-6 <?php if($dc%2 == 0) echo 'col-md-push-6 col-xs-push-6'; else echo 'col-md-pull-6 col-xs-pull-6'; ?>">
							<div class="page-login-form box" style="background:rgba(231, 149, 146, 0.66); border-radius:15px;">
							<?php 
								$doctors[$dc]['picture'] = array_diff(scandir('uploads/sitepages/'.$doctors[$dc]['id']), array('.','..'));
							if(!empty($doctors[$dc]['picture'])) {
							?>
								<img class="img-responsive" src="uploads/sitepages/<?php echo $doctors[$dc]['id']; ?>/<?php echo $doctors[$dc]['picture'][2]; ?>">
							<?php } ?>
							<h3>
								<a href="single.php?id=<?php echo $doctors[$dc]['id']; ?>"><?php echo $doctors[$dc]['title']; ?></a>
							</h3>
							</div>
						</div>
					<?php if($dc%2 == 1) { ?></div><?php } ?>
				<?php } ?>
				<div class="row" style="margin-top:55px;">
					<p style="text-align:center;">
						<button type="button" class="btn" style="background-color:#d9534f; color:#fff;" onclick="location.href = 'sitepages.php?type=الاطباء'"><?php language('more'); ?></button>
					</p>
				</div>
			</div>
		</div>
	</div>
</div>