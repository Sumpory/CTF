
<body>
<?php
require_once("db.php");
require_once("header.php");
?>
<p>
	<ul>
<?php
$adverts = top();
foreach ($adverts as $advert) {
	echo ' <div class="card mb-4 box-shadow">

          <div class="card-body">
            <h1 class="card-title pricing-card-title">' . htmlentities($advert['name']) . '</h1>
            <ul class="list-unstyled mt-3 mb-4">
            </ul>
          </div>
        </div> ';
}
?>


	</ul>
</body>

