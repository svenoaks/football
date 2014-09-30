<video class="m-video" poster="football.png" autoplay loop muted>
    <source src="football.webm" type="video/webm">
    <source src="football.mp4" type="video/mp4">
</video>


<div class="container container-news">
    <div class="div-internal">
        <div class="jumbotron m-jumbotron">
            <h3><span class="">Latest</span><span class=""> News</span></h3>

            <p class=""><?=$news1?></p>
        </div>
        <div class="m-show row">
            <div class=" col-md-4">
                <h3 class="text-center">Leaderboard</h3>

                <table class="table news-table">
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
                            <td><?= $i . '. &nbsp;&nbsp; ' . $cur['key'] ?></td>
                            <td><?= ($cur['value']['score'] . ' - ' . ($week - 1 - $cur['value']['score'])) ?></td>
                            <td class="text-center"><?= $cur['value']['points'] ?></td>
                        </tr>
                    <?php } ?>
                    </tbody>
                </table>
                <p class="news-link"><a href="rankings.php" class="text-center h6">
                        Complete Rankings &nbsp;<i class="fa fa-caret-right fa-lg"></i></a></p>
            </div>
            <div class=" col-md-4">
                <h3 class="text-center">Current Schedule</h3>
                <table class="table news-table">
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
                            <td><?= $personA->getAlias(); ?></td>
                            <td></td>
                            <td class=""><?= $personB->getAlias(); ?></td>
                        </tr>
                    <?php } ?>
                    </tbody>
                </table>
                <p class="news-link"><a href="schedule.php" class="text-center h6">
                        Complete Schedule &nbsp;<i class="fa fa-caret-right fa-lg"></i></a></p>
            </div>
            <div class=" col-md-4">
                <h3 class="text-center">Last Week's Results</h3>
                <table class="table news-table">
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
                        if ($personA->getWin($week - 1)) {
                            $winner = $personA;
                            $loser = $personB;
                        } else {
                            $winner = $personB;
                            $loser = $personA;
                        }
                        ?>
                        <tr>
                            <td><?= $winner->getAlias(); ?></td>
                            <td><?= $loser->getAlias(); ?></td>
                            <td><?= $winner->getScore($week - 1); ?> - <?= $loser->getScore($week - 1); ?></td>
                        </tr>
                    <?php } ?>
                    </tbody>
                </table>
                <p class="news-link"><a href="results.php?week=<?=$week - 1?>" class="text-center h6">
                        Week <?=$week - 1?> results &nbsp;<i class="fa fa-caret-right fa-lg"></i></a></p>
            </div>
        </div>
        <div class="m-row row">
            <div class=" col-md-6">
                <h5>Random Facts</h5>
                <p class=""><?=$news2?></p>
            </div>
            <div class=" col-md-6">
                <h5>Fun Stats</h5>
                <p class=""><?=$news3?></p>
            </div>
        </div>
    </div>
</div>
<script src="js/jquery-2.1.1.js"></script>
<script src="js/news.js"></script>