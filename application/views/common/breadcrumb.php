<div class="page-bar">
        <ul class="page-breadcrumb">
            <?php
				for ($i=0; $i<sizeof($breadcrumb); $i++)
				{
					$active = ($i==sizeof($breadcrumb)-1 || $breadcrumb[$i]['url']=='#') ? 'active' : '';
					$name = $breadcrumb[$i]['name'];

					if ($active)
					{
						echo "<li class='$active'><span>$name</span></li>";
					}
					else
					{
						$url = $breadcrumb[$i]['url'];
						echo "<li class='$active'><span><a href='$url'>$name</a></span><i class='fa fa-circle'></i></li>";
					}
				}
			?>
        </ul>
</div>