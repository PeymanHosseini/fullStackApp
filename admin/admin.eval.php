<?php
include 'header.php';
include '../includes/db.inc.php';

$result2 = mysqli_query($con, "SELECT * FROM student_table");
?>
  <div class="main">
    <div class="mainContent clearfix">
      <div id="dashboard">
      <div class="quick-press"><br>
   <table border = '1' style='width:100%' >
   <tr>
   <th>     ID    </th>
   <th >   Name   </th>
   <th >  Surname </th>
   <th >   Course  </th>
   <th >   Advisor_id  </th>
   <th >  UML  </th>
   <th >  DB  </th>
   <th >  Code  </th>
   <th >  Report  </th>
   
   </tr>
   <?php
   while ($row2 = mysqli_fetch_array($result2))
   {?>
   <tr>
    <td> <?php echo $row2['std_id'] ;?>    </td>
    <td align="center"> <?php echo $row2['std_name'] ;?>  </td>
    <td align="center"> <?php echo $row2['std_fname']; ?> </td>
    <td align="center"> <?php echo $row2['std_course'];  ?>      </td>
    <td align="center"> <?php echo $row2['staff_id'];  ?>      </td>
    <td align="center"> <a  href="uml_evaluate.php?edit2_id=<?php echo $row2['std_id']; ?>" alt="edit" class="submit2" >UML</a>     </td>
    <td align="center"> <a  href="db_evaluate.php?edit2_id=<?php echo $row2['std_id']; ?>" alt="edit" class="submit2" >DB</a>     </td>
    <td align="center"> <a  href="code_evaluate.php?edit2_id=<?php echo $row2['std_id']; ?>" alt="edit" class="submit2" > Code </a>     </td>
    <td align="center"> <a  href="doc_evaluate.php?edit2_id=<?php echo $row2['std_id']; ?>" alt="edit" class="submit2" > Report </a>     </td>
    <?php
   }
   ?></table>
    
   
 
           </div>
         </div>      
       </div>  
     </div> 
</body>
</html>