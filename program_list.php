<!--close-top-Header-menu-->
<!--start-top-serch-->
<?php include_once 'templates/header.php'; ?>
<?php include_once 'templates/sidebar.php'; ?>
<?php include_once 'config/database.php'; ?>
<?php include_once 'templates/sidebar.php';  ?>
<?php

$limit = 10;  // Number of entries to show in a page. 
// Look for a GET variable page if not found default is 1.      
if (isset($_GET["page"])) {  
  $pn  = $_GET["page"];  
}  
else {  
  $pn=1;  
};   

$start_from = ($pn-1) * $limit;   
$sql = "Select * from   tb_od_program where 1 order by sort ASC LIMIT $start_from, $limit ";
$result = mysqli_query($link, $sql);

?>
<style>
table {
    border-collapse: collapse;
    width: 500px;
}

td,
th {
    padding: 10px;
}

th {
    background-color: #54585d;
    color: #ffffff;
    font-weight: bold;
    font-size: 13px;
    border: 1px solid #54585d;
}

td {
    color: #636363;
    border: 1px solid #dddfe1;
}

tr {
    background-color: #f9fafb;
}

tr:nth-child(odd) {
    background-color: #ffffff;
}

.pagination {
    list-style-type: none;
    padding: 10px 0;
    display: inline-flex;
    justify-content: space-between;
    box-sizing: border-box;
}

.pagination li {
    box-sizing: border-box;
    padding-right: 10px;
}

.pagination li a {
    box-sizing: border-box;
    background-color: #e2e6e6;
    padding: 8px;
    text-decoration: none;
    font-size: 12px;
    font-weight: bold;
    color: #616872;
    border-radius: 4px;
}

.pagination li a:hover {
    background-color: #d4dada;
}

.pagination .next a,
.pagination .prev a {
    text-transform: uppercase;
    font-size: 12px;
}

.pagination .currentpage a {
    background-color: #518acb;
    color: #fff;
}

.pagination .currentpage a:hover {
    background-color: #518acb;
}
</style>

<div id="content">
    <div id="content-header">
        <div id="breadcrumb"> <a href="#" title="Go to Home" class="tip-bottom"><i class="icon-home"></i> Home</a> <a
                href="#" class="current"> Listing</a> </div>
        <h1>Program Listing</h1>
    </div>
    <div class="container-fluid">
        <hr>
        <div class="row-fluid text-right"><button class="btn btn-primary"
                onclick="document.location.href = 'program_add_edit.php'"><a href="<?php echo 'program_add_edit.php?action=add&v='.rand(1000000000,100000000000)?>"
                    style="color:#fff">Add Program</a></button></div>

        <div class="row-fluid">
            <div class="span12">
            <!--    <div class="control-group">

                    <fieldset class="scheduler-border span12"
                        style="border: 2px solid #f0f0f0;padding:0 18px 0 0;margin: 5px 0">
                        <div class="span2 m-wrap">
                            <label><strong>Name :</strong></label>
                            <input class="span11 m-wrap" type="text" placeholder="Program Category Name"
                                name="filter_name" id="filter_name" value="" style="height:35px;width:100%">
                        </div>

                        <div class="span1 m-wrap" style="margin: 3px;">
                            <label>&nbsp;</label>
                            <button class="btn btn-primary" id="filter_speaker" data-url="./">Search</button>
                        </div>

                    </fieldset>
                </div>-->
                <div class="widget-box">
                    <div class="widget-title"> <span class="icon" id="filtericon"><i class="fa fa-th"></i></span>
                        <h5>Listing</h5>
                    </div>
                    <div class="widget-content nopadding">
                        <table class="table table-bordered data-table">
                            <thead>

                                <tr>
                                    <th>S.no</th>
                                    <th>Name</th>
                                    <th>Language</th>
                                    <th>Sort</th>
                                    <th>status</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <?php if (mysqli_num_rows($result) > 0) {
                                // output data of each row
                                $i = 0;
                                while ($row = mysqli_fetch_assoc($result)) {
                                    $i++; ?>

                            <tr class="gradeX">
                                <td><?php echo $i ?></td>
                                <td><strong><?php echo $row['programname']; ?></strong></td>
                                <td><strong><?php echo $row['language']; ?></strong></td>
                                <td><strong><?php echo $row['sort']; ?></strong></td>
                                <?php 
                                 $node_id = $row['programid'];
                                        if ($row['status'] == 1) {
                                      echo       $output = '<td id="published' . $node_id . '"> <div class="onoffswitch">
        <input type="checkbox" autocomplete="off" name="onoffswitch" class="onoffswitch-checkbox" id="myonoffswitch' . $node_id . '" checked onclick="updateBudgetitemStatus(\'' . '' . 'function.php?&tbl=tb_od_program&id=' . $node_id . '\')">
        <label class="onoffswitch-label" for="myonoffswitch' . $node_id . '">
            <span class="onoffswitch-inner"></span>
            <span class="onoffswitch-switch"></span>
        </label>
    </div></td>';
                                        } else {
                                      echo       $output = '<td id="published' . $node_id . '"> <div class="onoffswitch">
        <input type="checkbox" autocomplete="off" name="onoffswitch" class="onoffswitch-checkbox" id="myonoffswitch' . $node_id . '" onclick="updateBudgetitemStatus(\'' . '' . 'function.php?&tbl=tb_od_program&id=' . $node_id . '\')">
        <label class="onoffswitch-label" for="myonoffswitch' . $node_id . '">
            <span class="onoffswitch-inner"></span>
            <span class="onoffswitch-switch"></span>
        </label>
    </div></td>';

                                        }
                                        ?>

                                <td class="center">
                                    <div class="btn-group"><button
                                            class="btn "><a href='<?php echo 'program_add_edit.php?action=edit&id='.$node_id?>'> Edit <a> <span
                                                ></span></button>
                                            <li><a href='<?php echo 'program_add_edit.php?action=edit&id='.$node_id?>'>Edit</a></li>
                                       </div>
                                </td>
                            </tr>
                            </tbody>
                            <?php }
                            } ?>
                        </table>

                        <?php   
                        // Get the total number of records from our table "students".
                        $sql1 = "SELECT COUNT(*) FROM tb_od_program";   
                        $rs_result =mysqli_query($link, $sql1);
                        $row1 = mysqli_fetch_row($rs_result);  
                        $total_pages =  $row1[0];    

// Check if the page number is specified and check if it's a number, if not return the default page number which is 1.
$page = isset($_GET['page']) && is_numeric($_GET['page']) ? $_GET['page'] : 1;

// Number of results to show on each page.
$num_results_on_page = 10;
      ?>
                        <?php if (ceil($total_pages / $num_results_on_page) > 0): ?>
                        <ul class="pagination">
                            <?php if ($page > 1): ?>
                            <li class="prev"><a href="program_list.php?page=<?php echo $page-1 ?>">Prev</a></li>
                            <?php endif; ?>

                            <?php if ($page > 3): ?>
                            <li class="start"><a href="program_list.php?page=1">1</a></li>
                            <li class="dots">...</li>
                            <?php endif; ?>

                            <?php if ($page-2 > 0): ?><li class="page"><a
                                    href="program_list.php?page=<?php echo $page-2 ?>"><?php echo $page-2 ?></a></li>
                            <?php endif; ?>
                            <?php if ($page-1 > 0): ?><li class="page"><a
                                    href="program_list.php?page=<?php echo $page-1 ?>"><?php echo $page-1 ?></a></li>
                            <?php endif; ?>

                            <li class="currentpage"><a
                                    href="program_list.php?page=<?php echo $page ?>"><?php echo $page ?></a></li>

                            <?php if ($page+1 < ceil($total_pages / $num_results_on_page)+1): ?><li class="page"><a
                                    href="program_list.php?page=<?php echo $page+1 ?>"><?php echo $page+1 ?></a></li>
                            <?php endif; ?>
                            <?php if ($page+2 < ceil($total_pages / $num_results_on_page)+1): ?><li class="page"><a
                                    href="program_list.php?page=<?php echo $page+2 ?>"><?php echo $page+2 ?></a></li>
                            <?php endif; ?>

                            <?php if ($page < ceil($total_pages / $num_results_on_page)-2): ?>
                            <li class="dots">...</li>
                            <li class="end"><a
                                    href="program_list.php?page=<?php echo ceil($total_pages / $num_results_on_page) ?>"><?php echo ceil($total_pages / $num_results_on_page) ?></a>
                            </li>
                            <?php endif; ?>

                            <?php if ($page < ceil($total_pages / $num_results_on_page)): ?>
                            <li class="next"><a href="program_list.php?page=<?php echo $page+1 ?>">Next</a></li>
                            <?php endif; ?>
                        </ul>
                        <?php endif; ?>

                      

                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<style>
.green {
    color: green;
    font-weight: bold;
}

.red {
    color: red;
    font-weight: bold;
}
</style>
<script type="text/javascript">
      $("#filter_speaker").click(function () {
        var filter_name = $("#filter_name").val();
        var url = $(this).data('url') + "program_category?name=" + filter_name;
        window.location.href = url;

    });
function updateBudgetitemStatus(url) {
    $.get(url, successBudgetdata);
}

function successBudgetdata(res) {

    var returnedData = JSON.parse(res);
    if (returnedData.status == "1") {
        $("#published" + returnedData.id).html(
            '<div class="onoffswitch"><input type="checkbox" name="onoffswitch" class="onoffswitch-checkbox" checked id="myonoffswitch' +
            returnedData.id + '" onclick="updateBudgetitemStatus(\'' + '' + '/changeStatus/0/' + returnedData
            .id + '/\')"><label class="onoffswitch-label" for="myonoffswitch' + returnedData.id +
            '"><span class="onoffswitch-inner"></span><span class="onoffswitch-switch"></span></label></div>');
    } else {
        $("#published" + returnedData.id).html(
            '<div class="onoffswitch"><input type="checkbox" name="onoffswitch" class="onoffswitch-checkbox" id="myonoffswitch' +
            returnedData.id + '" onclick="updateBudgetitemStatus(\'' + '' + '/changeStatus/1/' + returnedData
            .id + '/\')"><label class="onoffswitch-label" for="myonoffswitch' + returnedData.id +
            '"><span class="onoffswitch-inner"></span><span class="onoffswitch-switch"></span></label></div>');
    }
}
</script>
<?php include_once 'templates/footer.php'; ?>