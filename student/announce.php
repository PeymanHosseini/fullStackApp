<?php
include 'header.php';
include '../includes/db.inc.php';
$result = mysqli_query($con, "SELECT * FROM announcement");
?>
  <div class="main">
    <div class="mainContent clearfix">
      <div id="dashboard">
        <h1 class="header"><span class=""></span></h1>
         <div class="quick-press">
<?php
echo "<table border = '1' style='width:100%' >
<tr>
<th> ID   </th>
<th>   Information   </th>
<th >   Date   </th>
</tr>";

while ($row = mysqli_fetch_array($result)) 
{
echo '<tr>';
echo '<td>' . $row['ann_id'] . '</td>';
echo '<td>' . $row["ann_text"] . '</td>';
echo '<td>' . $row["date"] . '</td>';
echo '</tr>';
}
echo '</table>';
?>  

         </div>
       </div>
       </div>
     </div> 
</body>
</html>