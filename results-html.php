<div class="container m-container">
    <h3 class="text-center header-result">Week <?=$week?> Results</h3>
	<?php foreach ($matchesArray as $match) {
	     $personA = $match['personA'];
	     $personB = $match['personB'];   
     ?>
	<div class="col-md-6">
		<h4 class="text-center"><?=$personA->getAlias();?> vs. <?=$personB->getAlias();?></h4>
		<table class="table table-bordered result-table">
                    <thead>
                    <tr>
                        <th class="result-th">Team</th>
                        <th class="result-wl-th text-center">W/L</th>
                        <th class="result-wl-th text-center">W/L</th>
                        <th class="result-th">Team</th>
                    </tr>
                    </thead>
                    <tbody>
                    <?php for ($i = 0; $i < max($personA->getPickCount(), $personB->getPickCount()); $i++) {
                                $pickA = $personA->getPickAt($i);
                                $pickB = $personB->getPickAt($i);
                    ?>
                    <tr>
                        <td class="result-td"><?=$pickA->getTeamName();?></td>
                        <td class="result-wl-td text-center<?=$pickA->wasConditionalWin() ? ' result-td-yellow' : ($pickA->didWin() ? ' result-td-green' : ' result-td-red')?>">
                             <?=$pickA->didWin() ? 'W' : 'L'?></td>
                        <td class="result-wl-td text-center<?=$pickB->wasConditionalWin() ? ' result-td-yellow' : ($pickB->didWin() ? ' result-td-green' : ' result-td-red')?>">
                             <?=$pickB->didWin() ? 'W' : 'L'?></td>
                        <td class="result-td result-td-right"><?=$pickB->getTeamName();?></td>
                    <?php } ?>
                    </tbody>
                    <tfoot>
                    <tr>
                    <?php
                        $tie = false; 
                        if ($personA->wonTieBreaker($week) || $personB->wonTieBreaker($week)) { $tie = true; }
                    ?>
                        <th class="result-th">Total</th>
                        <th class="result-wl-th text-center<?php if ($personA->getWin($week)) 
                                                                   echo ' result-td-green'; 
                                                                   else echo ' result-td-red';?>"><?=$personA->getScore($week);?></th>
                        <th class="result-wl-th text-center<?php if ($personB->getWin($week)) 
                                                                   echo ' result-td-green'; 
                                                                   else echo ' result-td-red';?>"><?=$personB->getScore($week);?></th>
                        <th class="result-th"><?php if ($tie) echo 'Tiebreaker';?></th>
                    </tr>
                    </tfoot>
                </table>
	</div>
	<?php } ?>
</div>