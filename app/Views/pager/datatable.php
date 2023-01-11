<nav aria-label="Page navigation">
  <ul class="pagination">
    <!-- <li class="page-item"><a class="page-link" href="#">Previous</a></li>
    <li class="page-item"><a class="page-link" href="#">1</a></li>
    <li class="page-item"><a class="page-link" href="#">2</a></li>
    <li class="page-item"><a class="page-link" href="#">3</a></li>
    <li class="page-item"><a class="page-link" href="#">Next</a></li> -->
	<?php
	foreach($pager->links() as $link):
	?>
	<li class="page-item <?php echo $link['active'] ? 'active': ''; ?>">
		<a class="page-link" 
		href="
		<?php echo $link['uri'] ?>
		">
		<?php echo $link['title'] ?>
		</a>
	</li>
	<?php endforeach ?>
  </ul>
</nav>