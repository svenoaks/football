 <div class="container m-container">
        <div class="jumbotron m-jumbotron">
            <h2><span class="span-blue">Office</span><span class="span-orange">CFC</span></h2>

            <p class="lead">Week 1 is completed! It's still a little too soon to start official power rankings, but a
                hierarchy is beginning to take shape. Pay attention as this week marks the beginning of serious
                conference play in the NCAA.</p>
        </div>

    </div>
    <!-- /container -->
    <div class="container">

        <div class="row">
            <div class="col-md-4">
                <h3 class="text-center">Leaderboard</h3>

                 <table class="table">
					<thead>
                    <tr>
                        <th>Player</th>
                        <th>W/L</th>
                        <th class="text-center">Total Points</th>
                    </tr>	
					</thead>
					<tbody>
					<?php 
					$maxRows = 6;
					for ($i = 1; $i <= count($scores) & $i <= $maxRows; ++$i) { 
						 $cur = each($scores);
                    ?>
                        <tr>
                        	<td><?=$i . '. &nbsp;&nbsp; ' . $cur['key']?></td>
							<td><?=($cur['value']['score'] . ' - ' . ($week - 1 - $cur['value']['score']))?></td>
                            <td class="text-center"><?=$cur['value']['points']?></td>
                        </tr>
                     <?php } ?>
					</tbody>
				 </table>


            </div>
             <div class="col-md-4">
                <h3 class="text-center">Current Schedule</h3>
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
            <div class="col-md-4">
                <h3 class="text-center">Last Week's Results</h3>
                <table class="table">
                    <thead>
                    <tr>
                        <th>Winner</th>
                        <th>Loser</th>
                        <th>Score</th>
                    </tr>
                    </thead>
                    <tbody>
                    <?php foreach ($lastMatchesArray as $match) { 
							  $personA = $match['personA'];
							  $personB = $match['personB'];
							  if ($personA->getWin($week - 1))
							  { $winner = $personA; $loser = $personB; }
							  else { $winner = $personB; $loser = $personA; }
                    ?>
                    <tr>
                    	<td><?=$winner->getAlias();?></td>
                        <td><?=$loser->getAlias();?></td>
                        <td><?=$winner->getScore($week - 1);?> - <?=$loser->getScore($week - 1);?></td>
                    </tr>
                    <?php } ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
    <script src="js/jquery-2.1.1.js"></script>
    <script src="js/news.js"></script>