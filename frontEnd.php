<!DOCTYPE HTML>
<html>
    <head>
        <title>Warm-up Project</title>
        <meta charset="utf-8"/>
        <script src = "frontEnd.js"></script>
        
    </head>
    <body>
        <h1> Select a query </h1>
        <form method = "post">
            <select name="question">
                <option value="membersFromTID"> Given a TID, list the names of the members.</option>
                <option value="membersDemo"> Given a date, list all the teams that had demos on that day.</option>
                <option value="teamFromTID"> Given a student name or ID, find his or her team.</option>
                <option value="teamMates"> Given a student name or ID, find the names and the SID of his or her team mates.</option>
                <option value="teamMember"> Which student(s) is not a member of any team?</option>
                <option value="listMembers"> For each team, list its members.</option>
                <option value="notPresent"> Who was not present in the demo of a team?</option>
                <option value="lessThanFour"> List the teams which have &lt;4 members.</option>
                <option value="incompleteTeamTID"> For each team that is not complete, list the TID and the capacity to increase.</option>
            </select>
            <br/>
            <br/>
            <input id="textBox" name = "textB" type = "text"/>
            <br/>
            <input type="submit"/>
        </form>
	<?php 
		require 'ConnectToDB.php';
		if(isset($_POST['question']))
		{
			$PDOresults;
			switch ($_POST['question'])
			{
				case "membersFromTID":
					$PDOresults = getListOfTeamMembers($_POST['textB']);
					break;
				case "membersDemo":
					$PDOresults = getTeamsWhoHaveDemos($_POST['textB']);
					break;
				case "teamFromTID":
					$PDOresults = getTeamIdByStudent($_POST['textB']);
					break;
				case "teamMates":
					$PDOresults = getTeammatesByStudent($_POST['textB']);
					break;
				case "teamMember":
					$PDOresults = getStudentsNotInATeam();
					break;
				case "listMembers":
					$PDOresults = getListOfMembersOnTeams();
					break;
				case "notPresent":
					$PDOresults = getStudentsNotInDemos();
					break;
				case "lessThanFour":
					$PDOresults = getTeamsWithLessThanFourMembers();
					break;
				case "incompleteTeamTID":
					$PDOresults = getTeamsCapacityToIncrease();
					break;
			}
			while($PDOresults != NULL && $row = $PDOresults->fetch(PDO::FETCH_ASSOC))
			{
				foreach($row as $column)
				{
					echo $column." ";
				}
				echo'<br/>';
			}
		}
			
	?>
    </body>
</html>
