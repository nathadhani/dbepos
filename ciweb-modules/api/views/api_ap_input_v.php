<script type="text/javascript">
    var userId = <?php echo $auth['id'];?>;
    var companyId = <?php echo $auth['company_id'];?>;
    var usergroupId = <?php echo $auth['usergroup_id'];?>;
    var userlevelId = <?php echo $auth['userlevel_id'];?>;
</script>
<div class="row">
    <div class="col-md-12">
        <div class="panel panel-default">
            <!-- <div class="panel-heading ui-draggable-handle">                                
                <h3 class="panel-title">Transaction Task</h3>
            </div> -->
            <div class="panel-body table-responsive">                
                <div id="mainTable" class="box-body">
                    <p>
                        *) only the
                        <b style="color:red;">API - Input</b> Pending
                    </p>
                    <table class="table table-bordered table-condensed table-hover table-striped dataTable">
                        <thead>
                            <tr>
                                <th style="vertical-align:middle;text-align:center;">#</th>
                                <th style="vertical-align:middle;text-align:center;">Trx.No</th>
                                <th style="vertical-align:middle;text-align:center;">Trx.Date</th>
                                <th style="vertical-align:middle;text-align:center;">Customer Name</th>
                                <th style="vertical-align:middle;text-align:center;">Created by</th>
                                <th style="vertical-align:middle;text-align:center;">Trx.Name</th>
                                <th style="vertical-align:middle;text-align:center;">Status</th>
                            </tr>
                        </thead>
                        <thead id="searchid">
                            <tr>
                                <td><button class="clrs btn btn-info btn-sm btn-line">Clear</button></td>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td></td>
                            </tr>
                        </thead>
                        <tbody></tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>