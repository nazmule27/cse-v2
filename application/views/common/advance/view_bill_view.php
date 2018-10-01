<?php
$this->load->view('common/header');
?>
<style>
    body {
        padding-top: 0px;
        padding-bottom:0px;
        font: normal 14px 'SolaimanLipi';
    }
</style>
<div class="container">
    <div class="row">
        <div class="col-md-12">
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
            <div class="info-section">
                <table class="table table-bordered">
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
                        <td>আগাম টাকার পরিমাণ- <?php echo $bill[0]->taken_advance_taka?>/-</td>
                        <td>কথায়- <?php echo $bill[0]->in_word?></td>
                    </tr>
                    <tr>
                        <td>ক্যাশ ভাউচার-</td>
                        <td>তারিখ-</td>
                    </tr>
                    </tbody>
                </table>
            </div>
            <div class="view-section">
                <div class="left-input">
                    <div class="form-group">
                        <label>ভাচার অনুযায়ী মোট খরচ টাকাঃ </label> <?php echo $bill[0]->total_expense?>/-
                    </div>
                    <div class="form-group">
                        <label>আগামের অতিরিক্ত খরচ টাকাঃ </label> <?php echo $bill[0]->additional_expense?>/-
                    </div>
                    <div class="form-group">
                        <label>১। গৃহীত আগাম টাকাঃ </label> <?php echo $bill[0]->taken_advance_taka?>/-
                    </div>
                    <div class="form-group">
                        <label>২। সমন্বয়কৃত টাকাঃ </label> <?php echo $bill[0]->balanced_taka?>/-
                    </div>
                    <div class="form-group">
                        <label>৩। খরচের উদ্বৃত টাকাঃ </label> <?php echo $bill[0]->returned_taka?>/-<br>
                        &nbsp;&nbsp;&nbsp;&nbsp;<label>জমা দেওয়া হইয়াছে খাত নং- </label> <?php echo  $bill[0]->khat_no?><br>
                        &nbsp;&nbsp;&nbsp;&nbsp;<label>ব্যাংক স্ক্রল নং- </label> <?php echo $bill[0]->bank_scroll_no?><br>
                        &nbsp;&nbsp;&nbsp;&nbsp;<label>তারিখ- </label> <?php echo $bill[0]->date?>
                    </div>
                    <div class="form-group">
                        <label>৪। অতিরিক্ত খরচ টাকাঃ </label> <?php echo $bill[0]->extra_taka?>/-<br>
                        <label>প্রদান করার ব্যবস্থা গ্রহণের জন্য সুপারিশ করা হইল।</label>
                    </div>
                    <div class="form-group">
                        <br>
                        <br>
                        <center style="width: 170px"> <label >বিভাগীয়/অফিস প্রধানের স্বাক্ষর সীল</label></center>
                    </div>
                </div>
                <div class="right-input">
                    <table class="table table-bordered" id="bill-table">
                        <thead>
                        <tr>
                            <th>ক্রমিক নং</th>
                            <th>খরচের বিবরণ</th>
                            <th>টাকার পরিমাণ</th>
                        </tr>
                        </thead>
                        <tbody>
                        <?php
                        $expense_description=explode("^", $bill[0]->expense_description);
                        $amount=explode("^", $bill[0]->amount);
                        for ($i = 0; $i < count($expense_description)-1; ++$i) {
                            ?>
                            <tr>
                                <td width="70"><?php echo $i+1?></td>
                                <td width="500"><?php echo $expense_description[$i]?></td>
                                <td class="align-right" width="90"><?php echo $amount[$i]?></td>
                            </tr>
                        <?php }?>
                        </tbody>
                        <tfoot>
                        <tr>
                            <th></th>
                            <th class="align-right">মোট টাকার পরিমাণঃ</th>
                            <th class="align-right"> <?php echo $bill[0]->total_taka?> </th>
                        </tr>
                        </tfoot>
                    </table>
                </div>
            </div>
            <div class="comptroller-section">
                <hr>
                <p>কম্পট্রোলার অফিস পূরণ করবেঃ</p>
                <p>অতিরিক্ত খরচ টাঃ...............................মাত্র পরিশোধ করা হউক (কথায় ........................................................................................)</p>
                <p>টাকাঃ....................................... (কথায় ...............................................................................................................................) সমন্বয় করা হউক এবং উক্ত খরচ ................................... খাতে দেখানো হোক।
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
        </div>
    </div>