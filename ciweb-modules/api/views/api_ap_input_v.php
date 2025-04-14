<script type="text/javascript">  
    var userId = <?php echo $auth['id'];?>;
</script>
<div class="row">
    <div class="col-md-12">
        <div class="panel panel-default">
            <div class="panel-heading ui-draggable-handle">                                
                <div class="panel-title-box">
                    <h3>Buy / Sell - Integrasi System ECSys ( API - Input Pending )</h3>
                </div>
            </div>
            <div class="panel-body table-responsive">                
                <div id="mainTable" class="box-body">
                    <table class="table table-bordered table-condensed table-hover table-striped dataTable">
                        <thead>
                            <tr>
                                <th style="vertical-align:middle;text-align:center;">#</th>
                                <th style="vertical-align:middle;text-align:center;">Trx</th>
                                <th style="vertical-align:middle;text-align:center;">Date</th>
                                <th style="vertical-align:middle;text-align:center;">Number</th>
                                <th style="vertical-align:middle;text-align:center;">Value</th>
                                <th style="vertical-align:middle;text-align:center;">Customer Name</th>
                                <th style="vertical-align:middle;text-align:center;">Created by</th>
                                <th style="vertical-align:middle;text-align:center;">Status</th>
                                <th style="vertical-align:middle;text-align:center;">Action</th>
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