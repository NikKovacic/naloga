<?php

namespace app\models;

use yii\base\Model;


class NalogaModel extends Model
{


    public function doesProjectExists($project_id)
    {
        $projectExists= (new \yii\db\Query())
            ->select(['id'])
            ->from('tom_project')
            ->where('id = :id',[':id'=>$project_id])
            ->exists();

            if($projectExists==NULL){
                return false;
            }else{
                return true;
            }    
    }        

    public function getProjectComplition($project_id)
    {
        
        //check if projectId is in database
        $querryProject= (new \yii\db\Query())
        ->select(['id'])
        ->from('tom_project')
        ->where('id = :id',[':id'=>$project_id])
        ->exists();
        //if exists
        if ($querryProject != NULL ){
            $sumPercentDone=0;
            $numOfTasks=0;
            
            // select all tasks of current project
            $querryTasks= (new \yii\db\Query())
            ->select(['id', 'name'])
            ->from('tom_task')
            ->where('project_id = :project_id',[':project_id' => $project_id])
            ->all();

            // loop through all tasks of current project
            foreach ($querryTasks as $task){
                // count tasks
                $numOfTasks=$numOfTasks+1;
                // set taskId
                $task_id=$task['id'];
                //select all reports of current task
                $querryReport= (new \yii\db\Query())
                    ->select(['id', 'name', 'percent_done'])
                    ->from('tom_report')
                    ->where('task_id = :task_id',[':task_id' => $task_id])
                    ->all();
    
                    // loop through all reports of curent tasks
                    foreach($querryReport as $report){
                        //get whole percentage of reports
                        $sumPercentDone=$sumPercentDone+$report['percent_done'];
                    }
                
            }

            // calculate the precentage of project complition
            $sumPercentDone=$sumPercentDone/$numOfTasks;
            $percentageOfComplition=0+$sumPercentDone;

            return $percentageOfComplition;

        // if projectId doesn't exist print   
        } else {
            return \Yii::t("app","Project doesn't exists!");
        }
    }

    
    
}
