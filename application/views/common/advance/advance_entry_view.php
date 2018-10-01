<?php
$this->load->view('common/header');
?>
<style>
    body {
        padding-top: 30px;
        padding-bottom: 20px;
        font: normal 14px 'SolaimanLipi';

    }
</style>
<div class="container">
    <div class="row">
        <div class="col-md-12 col-sm-12">
            <div class="col-md-12">
                <?php echo $this->session->flashdata('flash_data'); ?>
                <div class="head-section">
                    <h3>বাংলাদেশ প্রকৌশল বিশ্ববিদ্যালয়</h3>
                    <p class="address">কম্পট্রোলার অফিস</p>
                    <hr>
                    <h4 class="form-no">(ফরম নং-২৩, রুল নং-১১৪)</h4>
                    <p class="form-type">অস্থায়ী আগাম সমন্বয় বিল ফরম</p>
                    <div class="left-doc">
                        <p>প্রি-অডিট নং ...................</p>
                        <p>তারিখ............................</p>
                        <p>স্বাক্ষর............................</p>
                    </div>
                    <div class="right-doc">
                        <p>ডকেট নং........................</p>
                        <p>তারিখ...........................</p>
                        <p>স্বাক্ষর............................</p>
                    </div>
                </div>
                <form class="form-inline" action="<?=base_url();?>advance_bill/save_bill" method="post">
                    <div class="info-section-in">
                        <table class="table table-bordered form-inline">
                            <tbody>
                            <tr>
                                <td width="800">আগাম গ্রহীতার নাম- Head, CSE, BUET</td>
                                <td width="800">ছাত্র/ছাত্রীর নাম-</td>
                            </tr>
                            <tr>
                                <td>পদবী-</td>
                                <td>শ্রেণী-</td>
                            </tr>
                            <tr>
                                <td></td>
                                <td>বিভাগ-</td>
                            </tr>
                            <tr>
                                <td>আগাম টাকার পরিমাণ- <span id="advance_taka"></span></td>
                                <td>কথায়-
                                    <input type="text" name="in_word" class="in-word form-control" placeholder="আগাম টাকার পরিমাণ" required>
                                </td>
                            </tr>
                            <tr>
                                <td>ক্যাশ ভাউচার-</td>
                                <td>তারিখ-</td>
                            </tr>
                            </tbody>
                        </table>
                    </div>
                    <div class="input-section">
                        <div class="left-input">
                            <div class="form-group">
                                <label>ভাচার অনুযায়ী মোট খরচ টাকাঃ *</label>
                                <input type="text" id="total_expense" name="total_expense" class="form-control" placeholder="ভাচার অনুযায়ী মোট খরচ টাকা" pattern="^[0-9]+(\.\d{1,2})?" required readonly>
                            </div>
                            <div class="form-group">
                                <label>আগামের অতিরিক্ত খরচ টাকাঃ *</label>
                                <input type="text" id="additional_expense"  name="additional_expense" class="form-control" placeholder="আগামের অতিরিক্ত খরচ টাকা" pattern="^[0-9]+(\.\d{1,2})?" value="0" required readonly>
                            </div>
                            <div class="form-group">
                                <label>১। গৃহীত আগাম টাকাঃ *</label>
                                <input type="text" id="taken_advance_taka" name="taken_advance_taka" onkeyup="takenChange();" class="form-control" placeholder="গৃহীত আগাম টাকা" required autofocus>
                            </div>
                            <div class="form-group">
                                <label>২। সমন্বয়কৃত টাকাঃ *</label>
                                <input type="text" id="balanced_taka" name="balanced_taka" class="form-control" placeholder="সমন্বয়কৃত টাকা" pattern="^[0-9]+(\.\d{1,2})?" required readonly>
                            </div>
                            <div class="form-group">
                                <label>৩। খরচের উদ্বৃত টাকাঃ *</label>
                                <input type="text" id="returned_taka" name="returned_taka" class="form-control" placeholder="খরচের উদ্বৃত টাকা" pattern="^[0-9]+(\.\d{1,2})?" required readonly>
                            </div>
                            <div class="form-group">
                                <label>জমা দেওয়া হইয়াছে খাত নং-</label>
                                <input type="text" name="khat_no" class="form-control" placeholder="খাত নং">
                            </div>
                            <div class="form-group">
                                <label>ব্যাংক স্ক্রল নং-</label>
                                <input type="text" name="bank_scroll_no" class="form-control" placeholder="ব্যাংক স্ক্রল নং">
                            </div>
                            <div class="form-group">
                                <label>তারিখ-</label>
                                <input type="text" name="date" id="datePicker" class="form-control" placeholder="তারিখ">
                            </div>
                            <div class="form-group">
                                <label>৪। অতিরিক্ত খরচ টাকাঃ</label>
                                <input type="text" id="extra_taka" name="extra_taka" class="form-control" placeholder="অতিরিক্ত খরচ টাকা" pattern="^[0-9]+(\.\d{1,2})?" value="0" readonly>
                                <label>প্রদান করার ব্যবস্থা গ্রহণের জন্য সুপারিশ করা হইল।</label>
                            </div>
                            <div class="form-group">
                                <br>
                                <br>
                                <br>
                                <center> <label>বিভাগীয়/অফিস প্রধানের স্বাক্ষর সীল</label></center>
                            </div>
                        </div>
                        <div class="right-input">
                            <table class="table table-bordered" id="bill-table">
                                <thead>
                                <tr>
                                    <th>ক্রমিক নং</th>
                                    <th>খরচের বিবরণ</th>
                                    <th>টাকার পরিমাণ</th>
                                    <th>অপসারণ</th>
                                </tr>
                                </thead>
                                <tbody>
                                <tr>
                                    <td >1</td>
                                    <td><input style="width: 496px" type="text" id="description1" name="description1" class="form-control" placeholder="খরচের বিবরণ" pattern="[^^]+" required></td>
                                    <td ><input style="width: 70px" type="text" id="amount1" name="amount1" class="form-control" pattern="^[0-9]+(\.\d{1,2})?" onkeyup="amountChange(this.id);" placeholder="টাকার পরিমাণ" required></td>
                                    <td>
                                        <a href="javascript:void(0)" onclick="deleteRow(this)" title="Delete this row"><i class="glyphicon glyphicon-trash "></i></a>
                                    </td>
                                </tr>
                                </tbody>
                                <tfoot>
                                <tr>
                                    <td ></td>
                                    <td><input style="width: 496px" type="text" id="description40" name="description40" class="form-control" placeholder="খরচের বিবরণ" pattern="[^^]+" value="ব্যাংকে উদ্বৃত জমা" required readonly></td>
                                    <td ><input style="width: 70px" type="text" id="amount40" name="amount40" class="form-control" pattern="^[0-9]+(\.\d{1,2})?" onkeyup="amountChange(this.id);" placeholder="টাকার পরিমাণ" value="0" required readonly></td>
                                    <td>
                                        <i class="glyphicon glyphicon-trash "></i>
                                    </td>
                                </tr>
                                <tr>
                                    <th></th>
                                    <th class="align-right">মোট টাকার পরিমাণঃ</th>
                                    <th> &nbsp; &nbsp;<input  style="width: 60px" class="border-none" type="text" id="total" name="total"></th>
                                    <th></th>
                                </tr>
                                </tfoot>
                            </table>
                            <input type="button" id="addMore" class="btn btn-success btn-sm addMore" value="Add More" onclick="insRow()" title="Add new row (Ctrl+y)" />
                        </div>
                        <p class="full-width"><button type="submit" class="btn btn-info pull-right">Submit</button></p>
                    </div>
                </form>
                <div class="row">
                    <div class="col-lg-12">
                        <hr>
                    </div>
                </div>
                <div class="comptroller-section">
                    <p>কম্পট্রোলার অফিস পূরণ করবেঃ</p>
                    <p>অতিরিক্ত খরচ টাঃ...............................মাত্র পরিশোধ করা হউক (কথায় ........................................................................)</p>
                    <p>টাকাঃ....................................... (কথায় .................................................................) সমন্বয় করা হউক এবং উক্ত খরচ ................................... খাতে দেখানো হোক।
                    </p>
                    <br>
                    <br>
                    <br>
                    <br>
                    <div class="signature">
                        <p>....................</p>
                        <p>হিসাব রক্ষক</p>
                    </div>
                    <div class="signature">
                        <p>............................</p>
                        <p>একাউন্ট অফিসার</p>
                    </div>
                    <div class="signature">
                        <p>....................................</p>
                        <p>ডেপুটি কম্পট্রোলার (বিল্‌স)</p>
                    </div>
                    <div class="signature">
                        <p>..........................</p>
                        <p>ডেপুটি কম্পট্রোলার</p>
                    </div>
                    <div class="signature">
                        <p>....................</p>
                        <p>কম্পট্রোলার</p>
                    </div>
                </div>
                <div class="row">
                    <div class="col-lg-12">
                        <hr>
                    </div>
                </div>
                <div class="row">
                    <div class="col-lg-12">
                        <center><button type="button" class="btn btn-info" data-toggle="collapse" data-target="#demo">Show Bills</button></center>
                        <br>
                        <div id="demo" class="collapse">
                            <table class="table table-hover table-bordered">
                                <thead>
                                <tr>
                                    <th>SL</th>
                                    <th>Description</th>
                                    <th>Total Taka</th>
                                    <th>Bank Return Date</th>
                                    <th>Status</th>
                                    <th>View</th>
                                </tr>
                                </thead>
                                <tbody>
                                <?php $k=1; for ($i = 0; $i < count($advance); ++$i) {?>
                                        <tr>
                                            <td><?php echo $k?></td>
                                            <td><?php echo $advance[$i]->expense_description?></td>
                                            <td><?php echo $advance[$i]->total_taka?></td>
                                            <td><?php echo $advance[$i]->date?></td>
                                            <td><?php echo $advance[$i]->status?></td>
                                            <td><a target="_blank" href="<?=base_url();?>advance_bill/view_bill/<?php echo $advance[$i]->id?>">View</a></td>
                                        </tr>
                                <?php $k++;} ?>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <script>
            var x=document.getElementById('bill-table')
            if(typeof x !== 'undefined' && x !== null) {
                var xt=x.getElementsByTagName('tbody')[0];
                var counter = xt.rows.length;
            }

            function insRow()
            {
                var x=document.getElementById('bill-table').getElementsByTagName('tbody')[0];
                var new_row = x.rows[0].cloneNode(true);
                //var len = x.rows.length+1;
                var len = counter+1;

                //new_row.cells[0].innerHTML = len;
                var inp0 = new_row.cells[0];
                inp0.innerHTML=len;

                var inp1 = new_row.cells[1].getElementsByTagName('input')[0];
                inp1.id=(inp1.id).substring(0, 11);
                inp1.id += len;
                inp1.name=inp1.id;
                inp1.value = '';
                var inp2 = new_row.cells[2].getElementsByTagName('input')[0];
                inp2.id=(inp2.id).substring(0, 6);
                inp2.id += len;
                inp2.name=inp2.id;
                inp2.value = '';

                x.appendChild( new_row );
                $('#'+inp1.id).focus();
                counter=counter+1;
            };
            function KeyPress(e) {
                var evtobj = window.event? event : e
                if (evtobj.keyCode == 89 && evtobj.ctrlKey){
                    insRow();
                }
            }
            document.onkeydown = KeyPress;
            function deleteRow(row)
            {
                var i=row.parentNode.parentNode.rowIndex;
                if(i>1){
                    document.getElementById('bill-table').deleteRow(i);
                }
                var id='amount'+counter;
                amountChange(id);
            };

            function amountChange(id) {
                var  id = id.replace( /\D+/g, '');
                var amount= document.getElementById('amount'+id);
                var total= document.getElementById('total');
                var advance_taka= document.getElementById('advance_taka');
                var taken_advance_taka= document.getElementById('taken_advance_taka');
                var total_expense= document.getElementById('total_expense');
                var additional_expense= document.getElementById('additional_expense');
                var balanced_taka= document.getElementById('balanced_taka');
                var returned_taka= document.getElementById('returned_taka');
                var extra_taka= document.getElementById('extra_taka');
                var amount40= document.getElementById('amount40');

                var subV=0;
                var subT=0;
                var totalB=0;
                for(var i=1; i<=counter; i++ ) {
                    var am_count=document.getElementById('amount'+i);
                    if(typeof am_count !== 'undefined' && am_count !== null) {
                        subV = parseFloat(subV) + parseFloat(document.getElementById('amount' + i).value);
                    }
                }
                balanced_taka.value=subV;
                amount40.value=(taken_advance_taka.value)-subV;
                if(amount40.value<0){
                    additional_expense.value=Math.abs(amount40.value);
                    extra_taka.value=additional_expense.value;
                    amount40.value=0;
                }
                else {
                    additional_expense.value=0;
                    extra_taka.value=0;
                }
                for(var i=1; i<41; i++ ) {
                    var am_count=document.getElementById('amount'+i);
                    if(typeof am_count !== 'undefined' && am_count !== null) {
                        subT = parseFloat(subT) + parseFloat(document.getElementById('amount' + i).value);
                    }
                }

                total.value=subT;
                total_expense.value=subT;
                returned_taka.value=amount40.value;
            };

            function takenChange() {
                var taken_advance_taka= document.getElementById('taken_advance_taka');
                var advance_taka= document.getElementById('advance_taka');
                advance_taka.innerHTML = taken_advance_taka.value+'/-';
                var id='amount'+counter;
                amountChange(id);
            };
        </script>
        <script src="<?=base_url();?>assets/js/datetimepicker/jquery.datetimepicker.js"></script>
    </div> <!--row end-->

    <?php
    $this->load->view('common/footer');
    ?>
