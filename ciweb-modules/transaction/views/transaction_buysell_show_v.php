<script type="text/javascript">
    var companyId = <?php echo $auth['company_id'];?>;
    var usergroupId = <?php echo $auth['usergroup_id'];?>;
    var userlevelId = <?php echo $auth['userlevel_id'];?>;

    var Apimethod = <?php echo $auth['api_method'];?>;
    var ApiAP = "<?php echo $auth['api_angkasapura'];?>";

    var customerId = <?php echo $this->uri->segment(4);?>;

    var tr_uri_code = <?php echo "'" . $this->uri->segment(5) ."'";?>;
    var id_tr_header = <?php echo $this->uri->segment(6);?>;
</script>
<style>
    table {
        border: none;
        border-spacing: 0;
        border-collapse: collapse;
    }
</style>
<div class="page-content-wrap">    
    <div class="row">
        <div class="col-md-12">
            <div class="panel panel-default">
                <form id="mainForm" class="form-horizontal" autocomplete="off">
                    <div class="panel-body">                                                       
                        <div class="row">
                            <div class="col-md-2">     
                                Trx. Name :                         
                                <span>
                                    <?php 
                                        if($this->uri->segment(5) === '432d21') {
                                            echo 'Beli / Buy';
                                        } else if($this->uri->segment(5) === '523d3455') {
                                            echo 'Jual / Sell';
                                        }
                                    ?>
                                </span><br>                                
                                Trx. No <span id="tr_number"></span><br>
                                Trx. Date <span id="tr_date"></span><br>
                                Trx. Status : <span id="ftitle"></span>     
                            </div>    
                            <div class="col-md-4">   
                                Cust. Name : <a href="#" id="customer_name"></a><br>               
                                Payment Type : <span id="payment_name"></span><br>
                                Counter Name : <span id="counter_name"></span><br>
                                Cashier Name : <span id="cashier_name"></span>
                            </div>
                            <div class="col-md-6">                 
                                Store Name : <span id="store_name"></span><br>
                                Store Address : <span id="store_address"></span><br>
                                <span id="created_by"></span><br>
                                <span id="cancel_by"></span>
                            </div>
                        </div>
                        
                        <!-- <hr style="margin-top:1px; margin-left:10px; border-top: 1px dotted #333;"> -->

                        <div class="row" style="margin-top:-10px;">
                            <div class="col-md-12 table-responsive" style="margin-top:6px;">
                                <table class="table table-bordered table-condensed table-hover" width="100%" id="table-detail">
                                    <thead>
                                        <tr style="background:#f1f5f9;">
                                            <td style='vertical-align: middle;text-align:center;'>#</td>
                                            <td style='vertical-align: middle;text-align:center;'>Currency</td>
                                            <td style='vertical-align: middle;text-align:center;'>Nomimal</td>
                                            <td style='vertical-align: middle;text-align:center;'>Sheet</td>
                                            <td style='vertical-align: middle;text-align:center;'>Amount</td>
                                            <td style='vertical-align: middle;text-align:center;'>Exchange Rate</td>
                                            <td style='vertical-align: middle;text-align:center;'>Equivalent</td>
                                        </tr>
                                    </thead>
                                    <tbody>                                                
                                    </tbody>
                                </table>
                            </div>
                        </div>
                        <!--.end row -->                        
                        <div class="row">
                            <div class="col-md-12">                                
                                <?php
                                    $company_id = $auth['company_id'];
                                    $get_AP = $this->db->query("SELECT api_angkasapura, api_method FROM m_company WHERE id = $company_id ")->result(); 
                                    if($get_AP){                                                                          
                                        if($get_AP[0]->api_method === '1') {                     
                                ?>
                                            <a style="width:110px;" id="btn-submit" class="btn btn-primary" title="API - Input Transaction">Submit</a>
                                            <a style="width:110px;" id="btn-cancel" class="btn btn-primary" title="API - Transaction Adjusment">Cancel</a>
                                        <?php 
                                            } else {
                                        ?>   
                                            <a style="width:80px;" id="btn-cancel" class="btn btn-primary" title="Cancel">Cancel</a>
                                        <?php } ?>    
                                <?php
                                    }
                                ?>   
                                <a style="width:80px;" id="btn-pdf" class="btn btn-primary" title="Print">Print</a>
                                <!-- <a style="width:90px;" id="btn-dot-matrix" class="btn btn-primary" title="Printer"><i class="fa fa-print dotmatrix"></i> LX / LQ</a>                          
                                <a href="master_data/settingprinter" target="_blank" title="Printer Setting" data-toggle="tooltip" data-placement="bottom" class="dotmatrix"><span class="fa fa-cog"></span></a> -->
                            </div>
                        </div>

                        <?php
                                $company_id = $auth['company_id'];
                                $get_AP = $this->db->query("SELECT api_angkasapura, api_method FROM m_company WHERE id = $company_id ")->result(); 
                                if($get_AP){                                                                        
                            ?>
                                    <div class="row" id="pinfo">
                                        <div class="col-md-12">
                                            <?php                                   
                                                if($get_AP[0]->api_method === '1') {
                                            ?>
                                                <br>Information :
                                                <span id="pinfo_apirecord"><strong style="color:black;font-weight:bolder;"><br>Submit </strong> : Untuk mengirim data transaction ke angkasapura</span>
                                                <span id="pinfo_apirefund"><strong style="color:black;font-weight:bolder;"><br>Cancel </strong> : Untuk membatalkan transaction</span>
                                            <?php
                                                }
                                            ?>
                                        </div>
                                    </div>

                                    <div class="row">
                                        <div class="col-md-12">
                                            <?php
                                                if($get_AP[0]->api_method === '1') {
                                                    $id = $this->uri->segment(6);
                                                    $resp_api = $this->db->query("SELECT * FROM trx_api_ap_log WHERE header_id = $id")->result_array(); 
                                                    // echo $this->db->last_query();exit;
                                                    if($resp_api){
                                            ?>              
                                                        <br>
                                                        <!-- <span style="color:black;font-weight:bolder;font-family:Arial Black;">Response API</span> -->
                                                        <table class="table table-bordered table-condensed table-hover" width="100%">
                                                            <thead>
                                                                <span style="color:black;font-weight:bolder;">API - logs</span>
                                                                <tr>
                                                                    <th style='vertical-align: middle;text-align:left;'>Method</th>
                                                                    <th style='vertical-align: middle;text-align:left;'>Status</th>
                                                                    <th style='vertical-align: middle;text-align:left;'>Success Insert</th>
                                                                    <th style='vertical-align: middle;text-align:left;'>Failed Insert</th>
                                                                    <th style='vertical-align: middle;text-align:left;'>Timestamp</th>
                                                                </tr>
                                                            </thead>
                                                            <tbody>
                                            <?php 
                                                        foreach($resp_api AS $row){
                                            ?>
                                                            
                                                                <tr>
                                                                    <td style='vertical-align: middle;text-align:center;'><?php echo $row['method'];?></td>
                                                                    <td style='vertical-align: middle;text-align:center;'><?php echo ($row['ap_status'] == 1 ? 'true' : 'false');?></td>
                                                                    <td style='vertical-align: middle;text-align:center;'><?php echo $row['ap_success_insert'];?></td>
                                                                    <td style='vertical-align: middle;text-align:center;'><?php echo $row['ap_failed_insert'];?></td>
                                                                    <td><?php echo date_format(date_create($row['created']),"d/m/Y H:i:s");?></td>
                                                                </tr>                                                
                                                        <?php } ?>            
                                                            </tbody>
                                                        </table>
                                            <?php
                                                    }
                                                }
                                            ?>
                                        </div>
                                    </div>
                            <?php                                             
                                }
                            ?>                                                                  
                    </div>
                    <!--.end panel-body -->
                </form>
            </div>
        </div>
    </div>   
</div>