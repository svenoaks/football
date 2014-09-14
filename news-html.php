 <div class="container m-container">
        <div class="jumbotron m-jumbotron">
            <h1><span class="span-blue">office</span><span class="span-orange">Football</span></h1>

            <p class="lead">Week 1 is completed! It's still a little too soon to start official power rankings, but a
                hierarchy is beginning to take shape. Pay attention as this week marks the beginning of serious
                conference play in the NCAA.</p>
           
        </div>

    </div>
    <!-- /container -->
    <div class="container">

        <div class="row">
            <div class="col-md-4">
                <h2>Standings</h2>

                <p>Donec id elit non mi porta gravida at eget metus. Fusce dapibus, tellus ac cursus commodo, tortor
                    mauris condimentum nibh, ut fermentum massa justo sit amet risus. Etiam porta sem malesuada
                    magna mollis euismod. Donec sed odio dui. </p>


            </div>
            <div class="col-md-4">
                <h2>Current Schedule</h2>
                 <table class="table">
					<thead>
                    <tr>
                        <th>Player</th>
                        <th></th>
                        <th>Player</th>
                    </tr>	
					</thead>
					<tbody>
					<?php foreach ($currentMatchesArray as $match) { 
							  $personA = $match['personA'];
							  $personB = $match['personB'];
                    ?>
                        <tr>
							<td><?=$personA->getAlias();?></td>
							<td>vs</td>
							<td><?=$personB->getAlias();?></td>
                        </tr>
                     <?php } ?>
					</tbody>
				 </table>
            </div>
            <div class="col-md-4">
                <h2>Last Week's Results</h2>
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
