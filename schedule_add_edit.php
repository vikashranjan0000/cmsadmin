<?php include_once 'templates/header.php'; ?>
<?php include_once 'config/config.php'; ?>
<?php include_once 'config/database.php'; ?>
<?php include_once 'templates/sidebar.php';  ?>
<?php
$action = $_GET['action'];
if(isset($_GET) && $_GET['action'] = 'edit' && isset($_GET['id'])){
  $id = $_GET['id'];
    $sql = "Select * from   tb_od_programschedule where scheduleid=$id";
    $result = mysqli_query($link, $sql);
    $output = mysqli_fetch_assoc($result);
    if(mysqli_error($link)){
        echo("Error description: " . mysqli_error($link));die;
    }
}
$programid = (isset($output['programid'])&& !empty($output['programid']))?$output['programid']:'';
$programName = (isset($output['programName'])&& !empty($output['programName']))?$output['programName']:'';
$dhyankendraid = (isset($output['dhyankendraid'])&& !empty($output['dhyankendraid']))?$output['dhyankendraid']:'';
$locationName = (isset($output['locationName'])&& !empty($output['locationName']))?$output['locationName']:'';
$leadacharyaid = (isset($output['leadacharyaid'])&& !empty($output['leadacharyaid']))?$output['leadacharyaid']:'';
$otherAchraya = (isset($output['otherAchraya'])&& !empty($output['otherAchraya']))?$output['otherAchraya']:'';
$start_date  = (isset($output['start_date'])&& !empty($output['start_date']))?$output['start_date']:'';
$end_date  = (isset($output['end_date'])&& !empty($output['end_date']))?$output['end_date']:'';
$session1  = (isset($output['session1'])&& !empty($output['session1']))?$output['session1']:'';
$session2  = (isset($output['session2'])&& !empty($output['session2']))?$output['session2']:'';
$programMode  = (isset($output['programMode'])&& !empty($output['programMode']))?$output['programMode']:'';
$ContributionAmount  = (isset($output['ContributionAmount'])&& !empty($output['ContributionAmount']))?$output['ContributionAmount']:'';
$eligibility  = (isset($output['eligibility'])&& !empty($output['eligibility']))?$output['eligibility']:'';
$guidelines  = (isset($output['guidelines'])&& !empty($output['guidelines']))?$output['guidelines']:'';
$comments  = (isset($output['comments'])&& !empty($output['comments']))?$output['comments']:'';
$level  = (isset($output['level'])&& !empty($output['level']))?$output['level']:'';
$duration  = (isset($output['duration'])&& !empty($output['duration']))?$output['duration']:'';
$language  = (isset($output['language'])&& !empty($output['language']))?$output['language']:'';


if ($_SERVER["REQUEST_METHOD"] == "POST") {

    $programid = (isset($_POST['programid'])&& !empty($_POST['programid']))?$_POST['programid']:'';
    $programName = (isset($_POST['programName'])&& !empty($_POST['programName']))?$_POST['programName']:'';
    $dhyankendraid = (isset($_POST['dhyankendraid'])&& !empty($_POST['dhyankendraid']))?$_POST['dhyankendraid']:'';
    $locationName = (isset($_POST['locationName'])&& !empty($_POST['locationName']))?$_POST['locationName']:'';

    $leadacharyaid = (isset($_POST['leadacharyaid'])&& !empty($_POST['leadacharyaid']))?$_POST['leadacharyaid']:'';
    $otherAchraya = (isset($_POST['otherAchraya'])&& !empty($_POST['otherAchraya']))?$_POST['otherAchraya']:'';
    $start_date  = (isset($_POST['start_date'])&& !empty($_POST['start_date']))?$_POST['start_date']:'';
    $end_date  = (isset($_POST['end_date'])&& !empty($_POST['end_date']))?$_POST['end_date']:'';
    $start_date= date( "Y-m-d", strtotime($start_date) );
    $end_date= date( "Y-m-d", strtotime($end_date) );
    $session1  = (isset($_POST['session1'])&& !empty($_POST['session1']))?$_POST['session1']:'';
    $session2  = (isset($_POST['session2'])&& !empty($_POST['session2']))?$_POST['session2']:'';
    $programMode  = (isset($_POST['programMode'])&& !empty($_POST['programMode']))?$_POST['programMode']:'';
    $ContributionAmount  = (isset($_POST['ContributionAmount'])&& !empty($_POST['ContributionAmount']))?$_POST['ContributionAmount']:'';
    $eligibility  = (isset($_POST['eligibility'])&& !empty($_POST['eligibility']))?$_POST['eligibility']:'';
    $guidelines  = (isset($_POST['guidelines'])&& !empty($_POST['guidelines']))?$_POST['guidelines']:'';
    $comments  = (isset($_POST['comments'])&& !empty($_POST['comments']))?$_POST['comments']:'';
    $level  = (isset($_POST['level'])&& !empty($_POST['level']))?$_POST['level']:'';
    $duration  = (isset($_POST['duration'])&& !empty($_POST['duration']))?$_POST['duration']:'';
    $language  = (isset($_POST['language'])&& !empty($_POST['language']))?$_POST['language']:'';

    if (!empty($programid)) {
        if($_POST['action'] == 'add'){
              $sql = "INSERT INTO tb_od_programschedule(programid , programName, dhyankendraid, locationName, level, leadAcharya, otherAchraya , start_date, end_date, session1, session2, ContributionAmount, duration, eligibility, guidelines, comments, language, programMode, status)
            VALUES ('" . $programid . "','" . $programName . "', '" . $dhyankendraid . "', '" . $locationName . "', '" . $level . "', '" . $leadacharyaid. "', '" . $otherAchraya . "','" . $start_date . "', '" . $end_date . "', '" . $session1 . "', '" . $session2 . "', '" . $ContributionAmount . "','" . $duration . "','" . $eligibility . "','" . $guidelines . "','" . $comments . "','" . $language  . "','" . $programMode ."', 1)";
    }else{
        $id = $_GET['id'];
        $sql= "UPDATE tb_od_programschedule SET programid='$programid',dhyankendraid='$dhyankendraid',start_date='$start_date',end_date='$end_date',level='$level', duration= '$duration' ,eligibility= '$eligibility',guidelines='$guidelines',comments='$comments',language='$language' WHERE scheduleid=$id";
     }         
     mysqli_query($link, $sql);
     if(mysqli_error($link)){
        echo("Error description 2: " . mysqli_error($link));die;
    }
/*    if(isset($_POST['acharyaid']) && !empty($_POST['acharyaid'])){
        $id = $_GET['id'];
         $sqldel = "DELETE FROM ProgScheduleacharya WHERE scheduleid = $id ";
         mysqli_query($link, $sqldel);
         if(mysqli_error($link)){
            echo("Error description 3: " . mysqli_error($link));
        }
         if($_POST['action'] == 'add'){
             //get last id
            $sqlid = "SELECT scheduleid FROM tb_od_programschedule ORDER BY scheduleid DESC LIMIT 1 ";
            $resultid =   mysqli_query($link, $sqlid);
            if(mysqli_error($link)){
                echo("Error description 4: " . mysqli_error($link));die;
            }
            while ($value = mysqli_fetch_assoc($resultid)) {
                $id = $value['scheduleid'];
            }
         }
         foreach($_POST['acharyaid'] as $p){
            // insert new mapping
           $insertMapping  ="INSERT INTO ProgScheduleacharya(scheduleid, acharyaid) VALUES ($id,$p)";
           mysqli_query($link, $insertMapping);
           if(mysqli_error($link)){
            echo("Error description 5: " . mysqli_error($link));die;
        }
        }
      
    } */

     header("Location: schedule_add_edit.php?action=add&msg=1");
    } else {
        header("Location: schedule_add_edit.php?action=add&msg=0");
    }
}


?>
<style>
#form_errors {
    color: #008000;
    margin: 5px;
    text-align: center;
}
</style>
<div id="content">
    <!--breadcrumbs-->
    <div id="content-header">
        <div id="breadcrumb"> <a href="schedule_list.php" title="Go to Home" class="tip-bottom"><i
                    class="icon-home"></i>
                Listing</a><a class="current" href="#">Add Schedule </a></div>
    </div>
    <!--End-breadcrumbs-->

    <div class="container-fluid">
        <hr />
       
        <div class="row-fluid">
            <div class="widget-box">
                <div class="widget-title"> <span class="icon"> <i class="icon-align-justify"></i> </span>
                    <h4>Add Schedule</h4>
                </div>
                <?php
                if (isset($_GET['msg']) && $_GET['msg'] == '1') {
                    echo '<div id="form_errors">Successfuly Updated</div>';
                }
                if (isset($_GET['msg']) && $_GET['msg'] == '0') {
                    echo '<div id="form_errors">Unsuccess .Try again</div>';
                }
                ?>
                <div class="widget-content nopadding">

                    <form action="#" method="post" class="form-horizontal form-group-lg" accept-charset="utf-8"
                        enctype='multipart/form-data' name="scheduleform" id="scheduleform">
                        <input type="hidden" name="action" id="action" value="<?php echo $action ?>" />


                        <?php 
                        $sqlProg = "Select * from   tb_od_program where status=1 order by programid DESC";
                        $resultProg = mysqli_query($link, $sqlProg);
                        ?>

                        <div class="control-group">
                            <label class="control-label"><strong>Program Name *:</strong></label>
                            <div class="controls">
                                <select id="programid" name="programid" required>
                                    <?php 
                                    if (mysqli_num_rows($resultProg) > 0) {
                                        while ($value = mysqli_fetch_assoc($resultProg)) {?>
                                            <option value="<?php echo $value['programid'];?>"
                                                <?php echo (!empty($programname)) ? "selected" : "" ?>>
                                                <?php echo $value['programname'];?></option>
                                            <?php }
                                        }?>
                                        <input type="hidden" name="programName" id="programName" value="<?php echo $programName ?>" />
                                </select>
                            </div>
                        </div>
                        <?php 
                        $resultcat ='';
                        $sqlcenter = "Select * from   tb_od_dhyankendra where status=1 order by dhyankendraid desc";
                        $resultcent= mysqli_query($link, $sqlcenter);
                        ?>

                        <div class="control-group">
                            <label class="control-label"><strong>Centers Name *:</strong></label>
                            <div class="controls">
                                <select id="dhyankendraid" name="dhyankendraid">
                                    <?php 
                                    if (mysqli_num_rows($resultcent) > 0) {
                                        while ($value = mysqli_fetch_assoc($resultcent)) {?>
                                            <option value="<?php echo $value['dhyankendraid'];?>"
                                                <?php echo (!empty($dhyankendraid) && $value['dhyankendraid'] ==$dhyankendraid) ? "selected" : "" ?>>
                                                <?php echo $value['dhyankendraname'].", ". $value['Address1'];?></option>
                                            <?php }
                                        }?>
                                </select>
                                <input type="hidden" name="locationName" id="locationName" value="<?php echo $locationName ?>" />
                            </div>
                        </div>


                        <?php 
                        $sqlAchrya = "Select * from   tb_od_teammember where status=1 and isacharya=1 order by isacharya desc";
                        $resultAchraya = mysqli_query($link, $sqlAchrya);
                        ?>

                        <div class="control-group">
                            <label class="control-label"><strong>Lead Acharya *:</strong></label>
                            <div class="controls">
                                <select id="leadacharyaid" name="leadacharyaid" >
                                    <?php 
                                    if (mysqli_num_rows($resultAchraya) > 0) {
                                        while ($value = mysqli_fetch_assoc($resultAchraya)) {?>
                                            <option value="<?php echo $value['teammembername'];?>"
                                                <?php echo (!empty($getAcharya) && in_array($value['teammembername'],$getAcharya)) ? "selected" : "" ?>>
                                                <?php echo $value['teammembername'];?></option>
                                            <?php }
                                        }?>
                                </select>
                            </div>
                        </div>

                        <?php 
                            $sqlAchrya = "Select * from   tb_od_teammember where status=1 and isacharya=1 order by isacharya desc";
                            $resultAchraya = mysqli_query($link, $sqlAchrya);
                        ?>

                        <div class="control-group">
                            <label class="control-label"><strong>Other Acharyas:</strong></label>
                            <div class="controls">
                                <select id="otherAchraya" name="otherAchraya[]" multiple>
                                    <?php 
                                    if (mysqli_num_rows($resultAchraya) > 0) {
                                        while ($value = mysqli_fetch_assoc($resultAchraya)) {?>
                                            <option value="<?php echo $value['teammembername'];?>"
                                                <?php echo (!empty($getAcharya) && in_array($value['teammembername'],$getAcharya)) ? "selected" : "" ?>>
                                                <?php echo $value['teammembername'];?></option>
                                            <?php }
                                        }?>
                                </select>
                            </div>
                        </div>



                        <div class="control-group">
                            <label class="control-label"><strong>Start Date * :</strong></label>
                            <div class="form-group span2 m-wrap input-append date datepicker" data-date="12-02-2012">

                                <input placeholder="Select start Date" data-date-format="<?php echo date("Y-m-d"); ?>"
                                    style="height:30px" class="span11  m-wrap" type="text" name="start_date"
                                    id="start_date" value="<?php echo $start_date?>">
                                <span class="add-on" style="height:20px"><i class="fa fa-th"></i></span>
                            </div>
                        </div>
                        <div class="control-group">
                            <label class="control-label"><strong>End Date * :</strong></label>
                            <div class="form-group span2 m-wrap input-append date datepicker" data-date="12-02-2012">

                                <input placeholder="Select end Date" data-date-format="<?php echo date("Y-m-d"); ?>"
                                    style="height:30px" class="span11  m-wrap" type="text" name="end_date" id="end_date"
                                    value="<?php echo $end_date?>">
                                <span class="add-on" style="height:20px"><i class="fa fa-th"></i></span>
                            </div>

                        </div>

                        <div class="control-group">
                            <label class="control-label"><strong>Session 1 :</strong></label>
                            <div class="controls">
                                <input class="span11" style="height:35px" placeholder="Enter session1" type="text"
                                 name="session1" id="session1" required value="<?php echo $session1?>">
                            </div>
                        </div>

                        <div class="control-group">
                            <label class="control-label"><strong>Session 2:</strong></label>
                            <div class="controls">
                                <input class="span11" style="height:35px" placeholder="Enter session2" type="text"
                                     name="session2" id="session2" required value="<?php echo $session2?>">
                            </div>
                        </div>

                        <div class="control-group">
                            <label class="control-label"><strong>Program Mode :</strong></label>
                            <div class="controls">
                                <select id="programMode" name="programMode">                                    
                                    <option value="Online" <?php echo ('Online' == $programMode) ? "selected" : "" ?>>Online</option>
                                    <option value="Residential" <?php echo ('Residential' == $programMode) ? "selected" : "" ?>>Residential</option>
                                </select>
                            </div>
                        </div>
                       
                        <div class="control-group">
                            <label class="control-label"><strong>Contribution Amount :</strong></label>
                            <div class="controls">
                                <input class="span11" style="height:35px" placeholder="Enter ContributionAmount" type="number"
                                    min='0' name="ContributionAmount" id="ContributionAmount" required value="<?php echo $ContributionAmount?>">
                            </div>
                        </div>
                        <div class="control-group">
                            <label class="control-label"><strong>Level * :</strong></label>
                            <div class="controls">
                                <input class="span11" style="height:35px" placeholder="Enter level" type="number"
                                    min='0' name="level" id="level" required value="<?php echo $level?>">
                            </div>
                        </div>
                        <div class="control-group">
                            <label class="control-label"><strong>Duration * :</strong></label>
                            <div class="controls">
                                <input class="span11" style="height:35px" placeholder="Enter Duration( max 10)"
                                    type="number" min='0' name="duration" id="duration" required
                                    value="<?php echo $duration?>">
                            </div>
                        </div>
                        <div class="control-group">
                            <label class="control-label"><strong>Eligibility* :</strong></label>
                            <div class="controls">
                                <input class="span11" style="height:35px" placeholder="Enter Eligibility"
                                    type="text" name="eligibility" id="eligibility" required
                                    value="<?php echo $eligibility?>">
                             
                            </div>
                        </div>
                        <div class="control-group">
                            <label class="control-label"><strong>Guidelines* :</strong></label>
                            <div class="controls">
                                <input class="span11" style="height:35px" placeholder="Enter guidelines"
                                type="text" name="guidelines" id="guidelines" required
                                value="<?php echo $guidelines?>">                                
                            </div>
                        </div>
                        <div class="control-group">
                            <label class="control-label"><strong>Comments* :</strong></label>
                            <div class="controls">
                                <input class="span11" style="height:35px" placeholder="Enter comments"
                                type="text" name="comments" id="comments" required
                                value="<?php echo $comments?>">                                 
                            </div>
                        </div>

                        <div class="control-group">
                            <label class="control-label"><strong>Language *:</strong></label>
                            <div class="controls">
                                <select id="language" name="language">
                                    <?php 
                                    foreach($lang_config as $k=>$v){
                                        ?>
                                        <option value="<?php echo $v?>"
                                            <?php echo ($v == $language) ? "selected" : "" ?>>
                                            <?php echo $k;?> </option>
                                        <?php    }
                                    ?>
                                </select>
                            </div>
                        </div>
                        <div class="form-actions">
                            <button onclick="return validate()" type="submit" class="btn btn-primary"
                                name="save" value="1">Publish</button>
                            <a href="schedule_list.php"><input type="button" class="btn btn-danger"
                                    value="Cancel"></a>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

<script>
function validate() {


    var programid = $("#programid").val();   
    $('#programName').val($("#programid option:selected").text());

    var dhyankendraid = $("#dhyankendraid").val();
    $('#locationName').val($("#dhyankendraid option:selected").text());

    var duration = $("#duration").val();
    var level = $("#level").val();
    var start_date = $('#start_date').val();
    var end_date = $('#end_date').val();
    var startDate = new Date($('#start_date').val());
    var endDate = new Date($('#end_date').val());
    var acharyaid = $("#leadacharyaid").val();


    var data = new FormData($('form')[0]);
    data.append("route",1);
    data.set('field','newValue'); 


    if (!acharyaid || acharyaid == null || acharyaid == 'null') {
        alert('Kindly select Acharyas ');
        return false;
    }
    if (level.trim() == '') {
        alert('Kindly enter level');
        return false;
    }

    if (start_date.trim() == '') {
        alert('Kindly enter start date');
        return false;
    }
    if (end_date.trim() == '') {
        alert('Kindly enter end date');
        return false;
    }

    if (startDate > endDate) {
        alert('Start date should be less than end date ');
        return false;
    }

    if (programid.trim() == '') {
        alert('Kindly enter Program Name');
        return false;
    }
    else{

    }
    if (dhyankendraid.trim() == '') {
        alert('Kindly enter dhyankendra name');
        return false;
    }
    if (duration.trim() == '') {
        alert('Kindly enter duration ');
        return false;
    }

}
</script>
<?php include_once 'templates/footer.php'; ?>