<?php
/**
 * Created by PhpStorm.
 * User: igor
 * Date: 23.05.2016
 * Time: 17:50
 */
//echo "<pre>";
//print_r($listProject);
//echo "</pre>";
?>
<table>
<tr>
    <td>id</td>
    <td>Название</td>
    <td>Описание</td>
    <td>Статус</td>
    <td>Действие</td>
</tr>
    <?php
    foreach ($listProject as $project) {
        ?>
        <tr>
            <td><?php echo $project->id_project;?></td>
            <td><a href="<?php echo site_url("Taskmanager")?>/?project_id=<?php echo $project->id_project;?>"><?php echo $project->name_project;?></a></td>
            <td><?php echo $project->desk;?></td>
            <td><?php echo $project->status;?></td>
            <td><div class="btn btn-primary" onclick="editProjectTask('<?php echo $project->id_project;?>')"><i class="fa fa-pencil"></i></div></td>
            <td><div class="btn btn-danger" onclick="deleteProject('<?php echo $project->id_project;?>')"><i class="fa fa-trash"></i></div></td>
        </tr>

        <?php
    }
    ?>
</table>

<script>
    function editProjectTask(project_id)
    {
       //

        $.post('<?php echo site_url("project/getProjectById")?>',{project_id:project_id},function (data){
            console.log(data);
            $('#action').val('update');
            $('#project_id').val(project_id);

            $('#nameProject').val(data.name_project);
            $('#deskProject').val(data.desk);
            //$('#statusProject').val();
            $("#statusProject :contains('data.status')").attr("selected", "selected");
           // $('#nameProject').val(data.name_project);
        });

    }
    function deleteProject(project_id)
    {
        $.post('<?php echo site_url("project/deleteProject")?>',{project_id:project_id},function (data){

            location.reload();
        });
    }
</script>