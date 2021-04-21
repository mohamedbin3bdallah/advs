	<div class="row">	
		<div class="col-sm-12">
			<form class="form-horizontal" action="admin.php?c=<?php echo $_GET['c']; ?>" method="POST" enctype="multipart/form-data" autocomplete="off">
				<?php
					if(isset($_GET['id'])) echo '<input type="hidden" name="oldid" value="'.$_GET['id'].'"><input type="hidden" name="oldpicture" value="'.$row['picture'].'">';
				?>
				<div class="form-group">
					<label for="title" class="col-sm-2 <?php if($lang == 'ar') echo 'col-sm-push-10'; ?> control-label"><?php language('title'); ?></label>
					<div class="col-sm-10 <?php if($lang == 'ar') echo 'col-sm-pull-2'; ?>">
						<input type="text" class="form-control" name="title" id="title" maxlength="150" value="<?php if(isset($row['title'])) echo $row['title']; ?>" placeholder="<?php language("title"); ?>" autocomplete="off" required/>
					</div>
				</div>
				<div class="form-group">
					<label for="description" class="col-sm-2 <?php if($lang == 'ar') echo 'col-sm-push-10'; ?> control-label"><?php language('description'); ?></label>
					<div class="col-sm-10 <?php if($lang == 'ar') echo 'col-sm-pull-2'; ?>">
						<textarea class="form-control" name="description" id="description" rows="9" placeholder="<?php language("description"); ?>"><?php if(isset($row['description'])) echo $row['description']; ?></textarea>
					</div>
				</div>
				<div class="form-group">
					<label for="picture" class="col-sm-2 <?php if($lang == 'ar') echo 'col-sm-push-10'; ?> control-label"><?php language('picture'); ?></label>
					<div class="col-sm-5 <?php if($lang == 'ar') echo 'col-sm-pull-2'; ?>">
						<input type="file" class="form-control" name="file" <?php if(!isset($row['picture'])) echo 'required'; ?>/>
					</div>
					<?php if(isset($row['picture']) && $row['picture'] != '') { ?>
						<div class="col-sm-5 <?php if($lang == 'ar') echo 'col-sm-pull-2'; ?>">
							<img class="img-responsive" src="uploads/ads/<?php echo $row['picture']; ?>" style="max-width:150px;">
						</div>
					<?php } ?>
				</div>
				<div class="form-group">
					<label for="active" class="col-sm-2 <?php if($lang == 'ar') echo 'col-sm-push-10'; ?> control-label"><?php language('active'); ?></label>
					<div class="col-sm-10 <?php if($lang == 'ar') echo 'col-sm-pull-2'; ?>">
						<input type="checkbox" name="active" <?php if(isset($row['active']) && $row['active'] == '1') { echo 'checked'; } ?> />
					</div>
				</div>
				<div class="form-group">
					<label for="featured" class="col-sm-2 <?php if($lang == 'ar') echo 'col-sm-push-10'; ?> control-label"><?php language('featured'); ?></label>
					<div class="col-sm-10 <?php if($lang == 'ar') echo 'col-sm-pull-2'; ?>">
						<input type="checkbox" name="featured" <?php if(isset($row['featured']) && $row['featured'] == '1') { echo 'checked'; } ?> />
					</div>
				</div>
				<div class="form-group">
					<div class="col-sm-10">
						<input type="submit" class="btn btn-info" name="submit" id="submit" value="<?php language("save"); ?>" />
					</div>
				</div>
			</form>
		</div>
	</div>
	
	<div class="row">
		<div class="col-md-12">

			<div style="margin-top: 25px;">
				<?php
					$data = getAllDataFromTable('ads.id as id,ads.title as title,ads.description as description,ads.picture as picture,ads.time as time,ads.featured as featured,ads.active as active,users.username as username','ads','inner join users on ads.userid = users.id order by ads.time DESC','');
					if(!empty($data))
					{
				?>
					<div class="row">
						<div class="col-md-12 table-responsive">
							<table class="table table-bordered table-striped">
								<tr class="info">
									<th><?php language('title'); ?></th>
									<th><?php language('username'); ?></th>
									<th></th>
									<th><?php language('time'); ?></th>
									<th><?php language('featured'); ?></th>
									<th><?php language('active'); ?></th>
									<th><?php language('edit'); ?></th>
									<th><?php language('delete'); ?></th>
								</tr>
								<?php	for($i=0;$i<sizeof($data);$i++)	{	?>
									<tr id="tr-<?php echo $data[$i]['id'];?>">
										<td><?php echo $data[$i]['title']; ?></td>
										<td><?php echo $data[$i]['username']; ?></td>
										<td>
											<a href="#" data-toggle="modal" data-target="#ad-<?php echo $data[$i]['id']; ?>">التفاصيل</a>
											<div id="ad-<?php echo $data[$i]['id']; ?>" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
												<div class="modal-dialog">
													<div class="modal-content">
														<div class="modal-header">
															<button type="button" class="close" data-dismiss="modal">&times;</button>
															<br>
															<h2 style="text-align:center;"><?php echo $data[$i]['title']; ?></h2>
															<br>
														</div>
														<div class="modal-body">
															<p style="text-align:justify;">
																<?php echo $data[$i]['description']; ?>
															</p>
															<div style="padding:29px; margin-top:9px;">
																<img class="img-responsive" src="uploads/ads/<?php echo $data[$i]['picture']; ?>">
															</div>
														</div>
													</div>
												</div>
											</div>
										</td>
										<td><?php echo date('Y-m-d , h:i:sa', $data[$i]['time']); ?></td>
										<td><input type="checkbox" class="featured" id="<?php echo $data[$i]['id']; ?>" <?php if($data[$i]['featured'] == '1') echo 'checked'; ?> /></td>
										<td><input type="checkbox" class="active" id="<?php echo $data[$i]['id']; ?>" <?php if($data[$i]['active'] == '1') echo 'checked'; ?> /></td>
										<td><a href="admin.php?c=<?php echo $_GET['c']; ?>&id=<?php echo $data[$i]['id']; ?>" style="color: green;"><i style="color:green;" class="glyphicon glyphicon-edit"></i></a></td>
										<td>
											<i id="<?php echo $data[$i]['id'];?>" style="color:red;" class="del glyphicon glyphicon-remove-circle"></i>
											<div id="del-<?php echo $data[$i]['id'];?>" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
												<div class="modal-dialog modal-sm">
													<div class="modal-content">
														<div class="modal-header">
															<?php language('deletemodal'); ?>
															<br>
														</div>
														<div class="modal-body">
															<center>
																<button class="btn btn-danger" onclick="mydelete('<?php echo $data[$i]['id'];?>','ads','<?php echo $data[$i]['picture'];?>')" data-dismiss="modal"><?php language('agree'); ?></button>
																<button class="btn btn-success" data-dismiss="modal" aria-hidden="true"><?php language('no'); ?></button>
															</center>
														</div>
													</div>
												</div>
											</div>
										</td>
									</tr>
								<?php	} ?>
							</table>
						</div>
					</div>
				<?php
					}
					else
					{
						echo '<div class="row">';
							echo '<div class="col-md-8 col-md-offset-2">';
							language('nodata');
							echo '</div>';
						echo '</div>';
					}
				?>
			</div>
			
		</div>
	</div>
	
	

<!-----------Start Some Models---------------->
<script>
<?php 
//$pageWasRefreshed = isset($_SERVER['HTTP_CACHE_CONTROL']) && $_SERVER['HTTP_CACHE_CONTROL'] === 'max-age=0';
if(isset($_SESSION['message'],$_SESSION['time'],$_SERVER['REQUEST_TIME']) && ($_SERVER['REQUEST_TIME'] < ($_SESSION['time']+5))) {
?>
$(document).ready(function(){
	$("#<?php echo $_SESSION['message']; ?>").modal('show');
	setTimeout(function() { $("#<?php echo $_SESSION['message']; ?>").modal('hide'); }, 3000);
});
<?php  /*unset($_SESSION['message']);*/ } ?>
</script>

<div id="success" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
	<div class="modal-dialog modal-sm">
		<div class="modal-content"  style="background-color: green;">
			<div class="modal-body">
				<center style="color: #fff;">
					<?php language('success'); ?>
				</center>
			</div>
		</div>
	</div>
</div>

<div id="cantdelete" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
	<div class="modal-dialog modal-sm">
		<div class="modal-content"  style="background-color: red;">
			<div class="modal-body">
				<center style="color: #fff;">
					<?php language('cantdelete'); ?>
				</center>
			</div>
		</div>
	</div>
</div>

<div id="somthingwrong" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
	<div class="modal-dialog modal-sm">
		<div class="modal-content"  style="background-color: red;">
			<div class="modal-body">
				<center style="color: #fff;">
					<?php language('m2'); ?>
				</center>
			</div>
		</div>
	</div>
</div>

<div id="inputnotcorrect" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
	<div class="modal-dialog modal-sm">
		<div class="modal-content"  style="background-color: orange;">
			<div class="modal-body">
				<center style="color: #fff;">
					<?php language('m3'); ?>
				</center>
			</div>
		</div>
	</div>
</div>

<div id="invalidinput" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
	<div class="modal-dialog modal-sm">
		<div class="modal-content"  style="background-color: orange;">
			<div class="modal-body">
				<center style="color: #fff;">
					<?php language('m4'); ?>
				</center>
			</div>
		</div>
	</div>
</div>
<!-----------End Some Models---------------->