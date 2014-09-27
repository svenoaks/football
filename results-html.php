<div class="container m-container">
    <h3 class="text-center header-result">
        <?php if ($scorecard) echo "Current Week Scorecard"; else echo "Week $week Results";?></h3>
    <?php foreach ($currentMatchesArray as $match) {
        $personA = $match['personA'];
        $personB = $match['personB'];
        ?>
        <div class="col-md-6">
            <?php
            $nameA = $personA->getAlias();
            $nameB = $personB->getAlias();
            $scoreA = $scores[$nameA]['score'] . '-' . (($scorecard ? $week - 1 : $week) - $scores[$nameA]['score']);
            $scoreB = $scores[$nameB]['score'] . '-' . (($scorecard ? $week - 1 : $week) - $scores[$nameB]['score']);
            ?>
            <table class="table table-bordered result-table">
                <thead>
                <tr>
                    <th class="result-th active"><?=$nameA?></th>
                    <th class="result-wl-th text-center active"><?=$scoreA?></th>
                    <th class="result-wl-th text-center active"><?=$scoreB?></th>
                    <th class="result-th active"><?=$nameB?></th>
                </tr>
                <tr>
                    <th class="result-th ">Team</th>
                    <th class="result-wl-th text-center ">W/L</th>
                    <th class="result-wl-th text-center ">W/L</th>
                    <th class="result-th ">Team</th>
                </tr>
                </thead>
                <tbody>
                <?php
                for ($i = 0; $i < max($personA->getPickCount(), $personB->getPickCount()); $i++) {
                    $pickA = $personA->getPickAt($i);
                    $pickB = $personB->getPickAt($i);
                    if (!isset($pickA) || $pickA->isBadPick()) $pickA = new Pick("No Pick", false, false, false);
                    if (!isset($pickB) || $pickB->isBadPick()) $pickB = new Pick("No Pick", false, false, false);
                ?>
                <tr>
                    <td class="result-td"><?= $pickA->getTeamName(); ?></td>
                    <td class="result-wl-td text-center<?= $pickA->wasConditionalWin() ? ' warning' :
                        ($pickA->didWin() ? ' success' : ' danger') ?>">
                        <?= $pickA->didWin() ? 'W' : 'L' ?></td>
                    <td class="result-wl-td text-center<?= $pickB->wasConditionalWin() ? ' warning' :
                        ($pickB->didWin() ? ' success' : ' danger') ?>">
                        <?= $pickB->didWin() ? 'W' : 'L' ?></td>
                    <td class="result-td result-td-right"><?= $pickB->getTeamName(); ?></td>
                    <?php } ?>
                </tbody>
                <tfoot>
                <tr>
                    <?php
                    $tie = false;
                    if ($personA->wonTieBreaker($week) || $personB->wonTieBreaker($week)) {
                        $tie = true;
                    }
                    ?>
                    <th class="result-th">Total</th>
                    <th class="result-wl-th text-center<?php if ($personA->getWin($week))
                        echo ' success';
                    else echo ' danger';?>"><?= $personA->getScore($week); ?></th>
                    <th class="result-wl-th text-center<?php if ($personB->getWin($week))
                        echo ' success';
                    else echo ' danger';?>"><?= $personB->getScore($week); ?></th>
                    <th class="result-th"><?php if ($tie) echo 'Tiebreaker'; ?></th>
                </tr>
                </tfoot>
            </table>
        </div>
    <?php } ?>
</div>