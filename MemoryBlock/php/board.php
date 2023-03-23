<?php
require_once 'connectdb.php';

$sql = "SELECT username, score FROM scoreboard ORDER BY score DESC";
$stmt = $conn->prepare($sql);
$stmt->execute();

echo "<table>";
echo "<tr><td class='title'>Posizione</td><td class='title'>Username</td><td class='title'>Score</td></tr>";
$i=1; 
while($row = $stmt->fetch()) {
    echo "<tr>
                <td>".$i."</td>
                <td>".$row["username"]."</td>
                <td>".$row["score"]."</td>
          </tr>";
          $i++;
          if($i == 11){
            break;
          }
  }
  echo "</table>";

$conn = null;


?>