<?php
	/*
	function generateLastStandings() {
				<table class="table">
                    <thead>
                    <tr>
                        <th>Winner</th>
                        <th>Loser</th>
                        <th>Score</th>
                    </tr>
                    </thead>
                    <tbody>
                    <tr>
                        <td>Richard</td>
                        <td>Jorge</td>
                        <td>7-5</td>

                    </tr>
                    <tr>
                        <td>Kyle</td>
                        <td>John</td>
                        <td>7-6</td>

                    </tr>
                    <tr>
                        <td>Deb</td>
                        <td>Greg</td>
                        <td>7-4</td>

                    </tr>
                    </tbody>
                </table>
	}
	*/
	
	include_once ("utility.php");
	include_once ("db.php");
	$db = connectToDb();

	include_once ("news.php");
?>