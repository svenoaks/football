<div class="container m-container">
	<?php foreach ($matchesArray as $match) {
	     $personA = $match['personA'];
	     $personB = $match['personB'];   
     ?>
	<div class="col-md-4">
		<h4 class="text-center"><?=$personA->getAlias();?> vs. <?=$personB->getAlias();?></h4>
		<table class="table">
                    <thead>
                    <tr>
                        <th>Team</th>
                        <th>W/L</th>
                        <th>W/L</th>
                        <th>Team</th>
                    </tr>
                    </thead>
                    <tbody>
                    <?php for ($i = 0; $i < max($personA->getPickCount(), $personB->getPickCount()) - 1; $i++) {
                    ?>
                    <tr>
                        <td><?=$personA->getPickAt($i)->getTeamName();?></td>
                        <td></td>
                        <td></td>
                        <td><?=$personB->getPickAt($i)->getTeamName();?></td>
                    <?php } ?>
                    </tbody>
                </table>
	</div>
	<?php } ?>
</div>