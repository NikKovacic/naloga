<?php
//necesary querries
$projectName= Yii::$app->db->createCommand('SELECT name FROM tom_project WHERE id = :id')->bindValue('id',$project)->queryOne();
$this->title = $projectName['name'];
$percentage = $model->getProjectComplition($project);
?>

<div class="row">
    <h3 class="text-center"><?php echo strtoupper($projectName['name']); ?></h3>
    <hr>
    <h4><?= \Yii::t('app','Completion rate')?>:</h4>
    <div class="progress">
        <div class="progress-bar" role="progressbar" style="<?php echo "width: ".$percentage."%"?>" aria-valuenow=<?=$percentage?> aria-valuemin="0" aria-valuemax="100"><?=$percentage?>%</div>
    </div>
    <br>
    <div class="panel panel-default">
        <!-- Default panel contents -->
        <div class="panel-heading"><?php echo $projectName['name']." ";?><?=\Yii::t('app','tasks')?></div>
            <table class="table table-bordered">
                <thead>
                    <tr>
                    <th scope="col"><?=\Yii::t('app','#')?></th>
                    <th scope="col"><?=\Yii::t('app','Task name')?></th>
                    <th scope="col"><?=\Yii::t('app','Completion rate')?></th>
                    <th scope="col"><?=\Yii::t('app','Start date')?></th>
                    <th scope="col"><?=\Yii::t('app','End date')?></th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                        $i=0;
                        
                        $QueryTasks= Yii::$app->db->createCommand('SELECT * FROM tom_task WHERE project_id = :id')->bindValue('id',$project)->queryAll();
                        foreach ($QueryTasks as $task){
                            $startDate=Yii::$app->formatter->asDate($task['start_date'], 'dd.MM.yyyy');
                            $endDate=Yii::$app->formatter->asDate($task['end_date'], 'dd.MM.yyyy');
                            $QueryTaskPercentDone= Yii::$app->db->createCommand('SELECT SUM(tom_report.percent_done) as percent_done FROM tom_task LEFT JOIN tom_report ON tom_report.task_id=tom_task.id WHERE tom_task.id=:task_id')->bindValue('task_id',$task['id'])->queryOne();
                            if($QueryTaskPercentDone['percent_done']>0){
                                $taskPercentDone=$QueryTaskPercentDone['percent_done']."%";
                            }else{
                                $taskPercentDone='0%';

                            }

                            $i++;
                            echo '<tr>';
                            echo '<th scope="row">'.$i.'</th>';
                            echo '<td>'.$task['name'].'</td>';
                            echo '<td>'.$taskPercentDone.'</td>';
                            echo '<td>'.$startDate.'</td>';
                            echo '<td>'.$endDate.'</td>';
                            echo '</tr>';       
                        }
                    ?>
                </tbody>
            </table>
    </div>
</div>

