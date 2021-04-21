	<script src="//cdn.tinymce.com/4/tinymce.min.js"></script>
	<script type="text/javascript">
	tinymce.init({
		selector: 'textarea',
		/*height: 500,*/
		theme: 'modern',
		plugins: [
			'advlist autolink lists link image charmap print preview hr anchor pagebreak',
			'searchreplace wordcount visualblocks visualchars code fullscreen',
			'insertdatetime media nonbreaking save table contextmenu directionality',
			'emoticons template paste textcolor colorpicker textpattern imagetools'
		],
		toolbar1: 'insertfile undo redo | styleselect | bold italic | alignleft aligncenter alignright alignjustify | bullist numlist outdent indent | link image',
		toolbar2: 'print preview media | forecolor backcolor emoticons',
		image_advtab: true,
		templates: [
			{ title: 'Test template 1', content: 'Test 1' },
			{ title: 'Test template 2', content: 'Test 2' }
		],
		content_css: [
			'//fonts.googleapis.com/css?family=Lato:300,300i,400,400i',
			'//www.tinymce.com/css/codepen.min.css'
		]
		});
	</script>

	<div class="row">
		<div class="col-sm-12">
			<form class="form-horizontal" action="admin.php?c=<?php echo $_GET['c']; ?>" method="POST" enctype="multipart/form-data" autocomplete="off">
				<?php
					if(isset($_GET['id'])) echo '<input type="hidden" name="oldid" value="'.$_GET['id'].'">';
					$categories = getAllDataFromTable('*','categories','order by title ASC','');
				?>
				<div class="form-group">
					<label for="category" class="col-sm-2 <?php if($lang == 'ar') echo 'col-sm-push-10'; ?> control-label"><?php language('category'); ?></label>
					<div class="col-sm-10 <?php if($lang == 'ar') echo 'col-sm-pull-2'; ?>">
						<select class="form-control" name="categoryid" id="categoryid">
							<!--<option value="0"><?php language('select'); ?></option>-->
							<?php if(!empty($categories)) { for($i=0;$i<count($categories);$i++) { ?>
								<option value="<?php echo $categories[$i]['id']; ?>" <?php if(isset($row['categoryid']) && $row['categoryid'] == $categories[$i]['id']) echo 'selected';?>><?php echo $categories[$i]['title']; ?></option>
							<?php } } ?>
						</select>
					</div>
				</div>
				<div class="form-group">
					<label for="title" class="col-sm-2 <?php if($lang == 'ar') echo 'col-sm-push-10'; ?> control-label"><?php language('title'); ?></label>
					<div class="col-sm-10 <?php if($lang == 'ar') echo 'col-sm-pull-2'; ?>">
						<input type="text" class="form-control" name="title" id="title" value="<?php if(isset($row['title'])) echo $row['title']; ?>" maxlength="100" placeholder="<?php language("title"); ?>" autocomplete="off" required/>
					</div>
				</div>
				<div class="form-group">
					<label for="description" class="col-sm-2 <?php if($lang == 'ar') echo 'col-sm-push-10'; ?> control-label"><?php language('description'); ?></label>
					<div class="col-sm-10 <?php if($lang == 'ar') echo 'col-sm-pull-2'; ?>">
						<textarea class="form-control" name="description" placeholder="<?php language("description"); ?>" rows="15"><?php if(isset($row['description'])) echo $row['description']; ?></textarea>
					</div>
				</div>
				<?php if(isset($row['title'])) { ?>
				<?php $blogimgs = array_diff(scandir('uploads/sitepages/'.$_GET['id']), array('.','..')); ?>
				<?php if(!empty($blogimgs)) { ?>
					<div class="form-group">
						<?php for($bim=2;$bim<count($blogimgs)+2;$bim++) { ?>
							<div id="blogimgdel-<?php echo $bim; ?>" class="col-sm-3">
								<a href="#" data-toggle="modal" data-target="#blogimage-<?php echo $bim; ?>">
									<img class="img-responsive" src="uploads/sitepages/<?php echo $_GET['id']; ?>/<?php echo $blogimgs[$bim]; ?>" style="height:95px;">
								</a>
								<i id="<?php echo $bim;?>" path="../uploads/sitepages/<?php echo $_GET['id']; ?>/<?php echo $blogimgs[$bim]; ?>" style="color:red;" class="blogimgdel glyphicon glyphicon-remove-circle"></i>
							</div>
							<div id="blogimage-<?php echo $bim; ?>" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
							<div class="modal-dialog">
								<div class="modal-content">
									<div class="modal-header">
										<button type="button" class="close" data-dismiss="modal">&times;</button>
										<br>
									</div>
									<div class="modal-body">
										<img src="uploads/sitepages/<?php echo $_GET['id']; ?>/<?php echo $blogimgs[$bim]; ?>" class="img-responsive">
									</div>
								</div>
							</div>
							</div>
						<?php } ?>
					</div>
				<?php } } ?>
				<div class="form-group">
					<label for="picture" class="col-sm-2 <?php if($lang == 'ar') echo 'col-sm-push-10'; ?> control-label"><?php language('picture'); ?></label>
					<div class="col-sm-10 <?php if($lang == 'ar') echo 'col-sm-pull-2'; ?>">
						<input type="file" class="form-control" name="file[]" multiple <?php if(!isset($_GET['id'])) echo 'required'; ?>/>
					</div>
				</div>
				<div class="form-group">
					<label for="active" class="col-sm-2 <?php if($lang == 'ar') echo 'col-sm-push-10'; ?> control-label"><?php language('active'); ?></label>
					<div class="col-sm-10 <?php if($lang == 'ar') echo 'col-sm-pull-2'; ?>">
						<input type="checkbox" name="active" <?php if(isset($row['active']) && $row['active'] == '1') { echo 'checked'; } ?> />
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

<?php
$data = getAllDataFromTable($select,'sitepages',$where,$limit);
if(!empty($data))
{
?>
	<div class="row" style="margin-top: 50px;">
		<div class="col-sm-12 table-responsive">
			<table class="table table-bordered table-striped" style="text-align: center;">
				<tr class="info">
					<th><?php language('title'); ?></th>
					<th><?php language('category'); ?></th>
					<!--<th></th>-->
					<th><?php language('active'); ?></th>
					<th></th>
					<th><?php language('time'); ?></th>
					<th><?php language('edit'); ?></th>
					<th><?php language('delete'); ?></th>
				</tr>
				<?php	for($i=0;$i<sizeof($data);$i++)	{	?>
					<tr id="tr-<?php echo $data[$i]['id'];?>">
						<td><?php echo $data[$i]['title']; ?></td>
						<td><?php echo $data[$i]['category']; ?></td>
						<!--<td>
				<?php $blogimgs = array_diff(scandir('uploads/sitepages/'.$data[$i]['id']), array('.','..')); ?>
				<?php if(!empty($blogimgs)) { ?>
					<div class="form-group">
						<?php for($bim=2;$bim<count($blogimgs)+2;$bim++) { ?>
							<div class="col-md-3">
								<a href="#" data-toggle="modal" data-target="#blogimage-<?php echo $bim; ?>">
									<img class="img-responsive" src="uploads/sitepages/<?php echo $data[$i]['id']; ?>/<?php echo $blogimgs[$bim]; ?>">
								</a>
							</div>
							<div id="blogimage-<?php echo $bim; ?>" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
							<div class="modal-dialog">
								<div class="modal-content">
									<div class="modal-header">
										<button type="button" class="close" data-dismiss="modal">&times;</button>
										<br>
									</div>
									<div class="modal-body">
										<img src="uploads/sitepages/<?php echo $data[$i]['id']; ?>/<?php echo $blogimgs[$bim]; ?>" class="img-responsive">
									</div>
								</div>
							</div>
							</div>
						<?php } ?>
					</div>
				<?php } ?>
						</td>-->
						<td><input type="checkbox" <?php if($data[$i]['active'] == 1) echo 'checked'; ?> disabled></td>
						<td><a href="single.php?id=<?php echo $data[$i]['id']; ?>" target="_blank"><?php language('preview'); ?></a></td>
						<td><?php echo date('Y-m-d , h:i:sa', $data[$i]['time']); ?></td>
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
											<button class="btn btn-danger" onclick="mydelete('<?php echo $data[$i]['id'];?>','sitepages')" data-dismiss="modal"><?php language('agree'); ?></button>
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
						
	<div class="row">
		<div class="col-sm-4<?php if($lang == 'ar') echo ' col-sm-push-8'; ?>">
		</div>
		<div class="col-sm-8<?php if($lang == 'ar') echo ' col-sm-pull-4'; ?>">
			<nav>
				<ul class="pagination">
					<?php if($totalPages > 1) { ?><li><a href="?c=<?php echo $_GET['c']; ?>&page=1"><?php language("first"); ?></a></li><?php } ?>
					<?php if($page > 3) { ?><li>
						<a href="?c=<?php echo $_GET['c']; ?>&page=<?php echo $page-2; ?>" aria-label="Previous">
							<span aria-hidden="true">&laquo;</span>
						</a>
					</li><?php } ?>
					<?php if($page > 1) { ?><li><a href="?c=<?php echo $_GET['c']; ?>&page=<?php echo $page-1; ?>"><?php echo $page-1; ?></a></li><?php } ?>
					<?php if($totalPages > 1) { ?><li><a href="?c=<?php echo $_GET['c']; ?>&page=<?php echo $page; ?>"><?php echo $page; ?></a></li><?php } ?>
					<?php if($page < $totalPages) { ?><li><a href="?c=<?php echo $_GET['c']; ?>&page=<?php echo $page+1; ?>"><?php echo $page+1; ?></a></li><?php } ?>
					<?php if($page < $totalPages-1) { ?><li>
						<a href="?c=<?php echo $_GET['c']; ?>&page=<?php echo $page+2; ?>" aria-label="Next">
							<span aria-hidden="true">&raquo;</span>
						</a>
					</li><?php } ?>
					<?php if($totalPages > 1) { ?><li><a href="?c=<?php echo $_GET['c']; ?>&page=<?php echo $totalPages; ?>"><?php language("last"); ?></a></li><?php } ?>
				</ul>
			</nav>
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