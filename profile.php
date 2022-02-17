<?php include "includes/profile_header.php"; 

if (!isset($_SESSION['user']['id'])) header('Location: http://localhost/sex/');

$error="";
if (isset($_SESSION['error']) && !empty($_SESSION['error'])) {
	$error = $_SESSION['error'];
	$_SESSION['error'] = '';
};

if (isset($_SESSION['success']) && !empty($_SESSION['success'])) {
	$success = $_SESSION['success'];
	$_SESSION['success'] = '';
};

$links = get_user_links($_SESSION['user']['id']);

?>
<main class="container">
<?php if (!empty($success)) { ?>
		<div class="alert alert-success alert-dismissible fade show mt-3" role="alert">
			<?php echo $success; ?>
			<button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
		</div>
	<?php } ?>
	<?php if (!empty($error)) { ?>
		<div class="alert alert-danger alert-dismissible fade show mt-3" role="alert">
			<?php echo $error; ?>
			<button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
		</div>
	<?php }
	
	var_dump($links);
	
	?>
	<div class="row mt-5">
		<table class="table table-striped">
			<thead>
				<tr>
					<th scope="col">#</th>
					<th scope="col">Ссылка</th>
					<th scope="col">Сокращение</th>
					<th scope="col">Переходы</th>
					<th scope="col">Действия</th>
				</tr>
			</thead>
			<tbody>
				<?php foreach($links as $key => $link) { ?>
				<tr>
					<th scope="row"><?php echo $key + 1 ?></th>
					<td><a href="<?php echo $link['long_link']?>" target="_blank"><?php echo $link['long_link']?></a></td>
					<td class="short-link"><?php echo get_out_url($link['short_link']) ?></td>
					<td><?php echo $link['views']?></td>
					<td>
						<a href="#" class="btn btn-primary btn-sm copy-btn" title="Скопировать в буфер" data-clipboard-text="<?php echo get_out_url($link['short_link']) ?>"><i class="bi bi-files"></i></a>
						<a href="<?php echo HOST . '/edit.php/?id=' . $link['id'];?>" class="btn btn-warning btn-sm" title="Редактировать"><i class="bi bi-pencil"></i></a>
						<a href="<?php echo HOST . '/delete.php/?id=' . $link['id'];?>" class="btn btn-danger btn-sm" title="Удалить"><i class="bi bi-trash"></i></a>
					</td>
				</tr>
				<?php }?> 
				<!-- <tr>
					<th scope="row">2</th>
					<td><a href="https://google.ru" target="_blank">https://google.ru</a></td>
					<td class="short-link">http://red.loc/ke05nls</td>
					<td>42</td>
					<td>
						<a href="#" class="btn btn-primary btn-sm copy-btn" title="Скопировать в буфер" data-clipboard-text="http://red.loc/ke05nls"><i class="bi bi-files"></i></a>
						<a href="#" class="btn btn-warning btn-sm" title="Редактировать"><i class="bi bi-pencil"></i></a>
						<a href="#" class="btn btn-danger btn-sm" title="Удалить"><i class="bi bi-trash"></i></a>
					</td>
				</tr>
				<tr>
					<th scope="row">3</th>
					<td><a href="https://vk.com" target="_blank">https://vk.com</a></td>
					<td class="short-link">http://red.loc/jfiwms7</td>
					<td>64</td>
					<td>
						<a href="#" class="btn btn-primary btn-sm copy-btn" title="Скопировать в буфер" data-clipboard-text="http://red.loc/jfiwms7"><i class="bi bi-files"></i></a>
						<a href="#" class="btn btn-warning btn-sm" title="Редактировать"><i class="bi bi-pencil"></i></a>
						<a href="#" class="btn btn-danger btn-sm" title="Удалить"><i class="bi bi-trash"></i></a>
					</td>
				</tr> -->
			</tbody>
		</table>
	</div>
</main>
<?php include "includes/profile_footer.php"; ?>