<?php
  include __DIR__ . '/../template/header.php'; 
?>

<main class="container pt-5">
  <div class="p-5 mt-5 rounded">
    <h1 id="questions">Questions</h1>
    <form id="exam_out_of" name="out_of" action="" method="post">
      <div class="overflow-auto">
      <?php
            $count = $extra_data->no_of_questions;
            echo "<table class='table table-borderless table-marking'>
            <thead class='table-secondary'><tr><th class='text-center'></th><th colspan=$count class='text-center'>Questions</th></tr></thead>
            <thead class='table-secondary'><tr><th class='name-columns'>Property</th>";
            for ($i = 1; $i <= $count; $i++)
              {
                echo "<th class='text-center'>$i</th>";
              }
            echo "</tr></thead>";
            echo "<div class='form-group'>";
            echo "<tr><td class='name-columns'>Marks allocated</td>";
            foreach ($data as $question)
            {
              $m_ref = $question->question . "_marks";
              $marks = $question->marks;
              echo "<td class='text-center'><input class='text-center' type='number' name=$m_ref value=$marks></td>";
            } 
            echo "</tr>"; 
            echo "<tr><td class='name-columns'>Topic</td>";
            foreach ($data as $question)
            {
              $t_ref = $question->question . "_topic";
              $topic = $question->topic;
              echo "<td class='text-center'><input class='text-center wide_input' type='text' name=$t_ref value=$topic></td>";
            } 
            echo "</tr>";
            echo "<tr><td class='name-columns'>Difficulty</td>";
            foreach ($data as $question)
            {
              $d_ref = $question->question . "_diff";
              $diff = $question->difficulty;
              echo "<td class='text-center'><input class='text-center wide_input' type='text' name=$d_ref value=$diff></td>";
            } 
            echo "</tr>";               
            echo "</div>";
            echo "</table>";
      ?>
      </div>
      <div class="d-flex flex-row-reverse">
        <input type="submit" name="config_q" value="Save configuration" id="save_config" class="btn btn-primary mb-3"/>
      </div>
    </form>
    
    <h1 id="cutoffs">Cut-offs</h1>
    <table class='table table-borderless table-marking w-auto'>
        <div class="overflow-auto">
        <thead class='table-secondary'><tr><th class='text-center'>Grade</th><th class='text-center'>Cut-off</th></tr></thead>
        <?php
            foreach ($more_data as $cutoff)
            {
                echo "<tr><td class='text-center'>$cutoff->grade</td><td class='text-center'>$cutoff->percentage%</td><tr>";
            }
        ?>
        </div>
    </table>        
    
    <form action="" method="post">
    <div class="d-flex w-50">
      <div class="form-group w-25 p-2 pe-5">
          <label>Grade</label><input type="text" name="grade" class="form-control"/>
      </div>
      <div class="form-group w-25 p-2 pe-3">
          <label>Cut-off</label><div class="d-flex justify-content-start"><input type="number" name="percentage" class="form-control"/><span class="m-auto p-2">%</span></div>
      </div>
      <div class="form-group w-25 p-2 d-flex align-items-end">
          <input type="submit" name="config_c" value="Add cut-off" class="btn btn-primary w-auto"/>
      </div>
    </div>
    </form>
  </div>
</main>

<?php
  include __DIR__ . '/../template/footer.php';
?>