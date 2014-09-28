<div class="m-fade m-container container">
    <h3 class="text-center header-page">Complete Rankings</h3>

        <div class="col-md-12">


            <table class="table-ranking table">
                <thead>
                <tr>
                    <th>Player</th>
                    <th>W/L</th>
                    <th class="text-center">Total Points</th>
                </tr>
                </thead>
                <tbody>
                <?php
                for ($i = 1; $i <= count($scores) & $i <= count($scores); ++$i) {
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