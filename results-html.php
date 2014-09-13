<div class="container m-container">
	<?php while($row = $matches->fetch_assoc()) { ?>
	<div class="col-md-4">
		<h4 class="text-center"><?=$row['UserAAlias']?> vs. <?=$row['UserBAlias']?></h4>
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
                    <tr>
                        <td>Richard</td>
                        <td>Jorge</td>
                        <td>7-5</td>
                        <td>7-5</td>
                      

                    </tr>
                    <tr>
                        <td>Kyle</td>
                        <td>John</td>
                        <td>7-6</td>
                        <td>7-5</td>
                      

                    </tr>
                    <tr>
                        <td>Deb</td>
                        <td>Greg</td>
                        <td>7-4</td>
                        <td>7-5</td>
                       

                    </tr>
                    </tbody>
                </table>
	</div>
	<?php } ?>
</div>