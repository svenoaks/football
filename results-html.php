<div class="container m-container">
    <h3 class="text-center">Week <?=TIME_PERIOD?> Results</h3>
	<?php foreach ($matchesArray as $match) {
	     $personA = $match['personA'];
	     $personB = $match['personB'];   
     ?>
	<div class="col-md-6">
		<h4 class="text-center"><?=$personA->getAlias();?> vs. <?=$personB->getAlias();?></h4>
		<table class="table result-table">
                    <thead>
                    <tr>
                        <th class="result-th">Team</th>
                        <th class="result-wl-th">W/L</th>
                        <th class="result-wl-th">W/L</th>
                        <th class="result-th">Team</th>
                    </tr>
                    </thead>
                    <tbody>
                    <?php for ($i = 0; $i < max($personA->getPickCount(), $personB->getPickCount()); $i++) {
                                $personAWin = $personA->getPickAt($i)->didWin();
                                $personBWin = $personB->getPickAt($i)->didWin();
                    ?>
                    <tr>
                        <td class="result-td"><?=$personA->getPickAt($i)->getTeamName();?></td>
                        <td class="result-wl-td<?=$personAWin ? ' result-td-green' : ' result-td-red'?>"><?=$personAWin ? 'W' : 'L'?></td>
                        <td class="result-wl-td<?=$personBWin ? ' result-td-green' : ' result-td-red'?>"><?=$personBWin ? 'W' : 'L'?></td>
                        <td class="result-td result-td-right"><?=$personB->getPickAt($i)->getTeamName();?></td>
                    <?php } ?>
                    </tbody>
                </table>
	</div>
	<?php } ?>
</div>