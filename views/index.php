<div class="container mt-5">
	<div class="row justify-content-center">
		<div class="col-lg-8">
			<div class="card">
				<div class="card-header">Lists</div>
				<div class="card-body">
					<a class="btn btn-primary" href="?page=add">Add</a>
					<hr/>
					<div class="table-responsive">
						<table class="table table-bordered table-striped">
							<thead>
								<tr>
									<th>Username</th>
									<th>Status</th>
									<th>Date Created</th>
									<th colspan="3">Actions</th>
								</tr>
							</thead>
							<tbody>
								<?= $htmlData ?>
							</tbody>
						</table>
					</div>
				</div>
			</div>
		</div>

	</div>
</div>