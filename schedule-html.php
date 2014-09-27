<div class="container m-container">

	<?php $count = 1; 
	     foreach ($allMatchesArray as $currentMatchesArray) {
     ?>
	<div class="col-md-4">
                <h3 class="text-center">Week <?=$count;?></h3>
                 <table class="table">
    				<thead>
                    <tr>
                        <th>Player &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;vs.</th>
                        <th></th>
                        <th class="">Player</th>
                    </tr>	
					</thead>
					<tbody>
					<?php foreach ($currentMatchesArray as $match) { 
							  $personA = $match['personA'];
							  $personB = $match['personB'];
                    ?>
                        <tr>
							<td><?=$personA->getAlias();?></td>
							<td></td>
							<td class=""><?=$personB->getAlias();?></td>
                        </tr>
                     <?php } ?>
					</tbody>
				 </table>
            </div>
	<?php ++$count;} ?>
</div>