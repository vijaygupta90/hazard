<!DOCTYPE html>
<html lang="en">
    <head>
    	<meta charset="utf-8" />
    	<link rel="apple-touch-icon" sizes="76x76" href="">
    	<link rel="icon" type="image/png" sizes="96x96" href="">
    	<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
    	<title>नगर पालिका परिषद्, बदायूं उ० प्र०</title>
    	<meta content='width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0' name='viewport' />
    	<meta name="viewport" content="width=device-width" />
        <style>
            .footer-btn {
                position: fixed;
                /*bottom: 30px;*/
                /*right: 30px;*/
                margin-left: 100px;
                z-index: 10;
                border: 1px solid black;
                /*box-shadow: 0 0 6px blueviolet;*/
                text-decoration: none;
            }
            
            .footer-btn1 {
                position: fixed;
                /*bottom: 30px;*/
                /*right: 30px;*/
                /*margin-left: 10px;*/
                z-index: 10;
                border: 1px solid black;
                /*box-shadow: 0 0 6px blueviolet;*/
                text-decoration: none;
            }
            
            .btn {
                border-radius: 20px;
                box-sizing: border-box;
                border-width: 2px;
                background-color: transparent;
                font-size: 14px;
                font-weight: 500;
                padding: 7px 18px;
                border-color: #66615B;
                color: #66615B;
                -webkit-transition: all 150ms linear;
                -moz-transition: all 150ms linear;
                -o-transition: all 150ms linear;
                -ms-transition: all 150ms linear;
                transition: all 150ms linear;
            }

            .hindi-lg {
                font-family: "Kruti Dev 010";
                font-size: 24px;
                font-weight: 500;
                letter-spacing: 0.5px;
            }
            
            @media print {
                @page {size: portrait}
                #printPageButton {
                    display: none;
                }
            }
        </style>
    </head>
    <body>
        <div style="display: flex; padding-top:20px;">
            <table width="100%" border="1" cellpadding="3" cellspacing="0">
            	<tr>
            	    <td colspan="2" align="center" style="font-size:40px"><b>नगर पालिका परिषद्, बदायूं उ0प्र0</b><br><span style="font-size:18px; font-weight: 600;">जल कर रसीद</span><br /><span>Form No. 5</span></td>
            	</tr>
            	<tr>
                	<td style="display: flex;justify-content: space-between;"><b>रसीद की तिथि : <?php $originalDate = $demand->created_at; $newDate = date("d-m-Y", strtotime($originalDate)); echo $newDate; ?></b> <b>डिमाण्ड नं0 : <span class="hindi-lg"><?php echo $demand->demand_no;?></span></b></td>
            	</tr>
            	<tr>
            	    <td colspan="2">
                	    <table width="100%" cellpadding="3">
                        	<tr>
                            	<td width="50%">
                                    <b>नाम: </b><span class="hindi-lg"><?php echo $demand->name;?></span><br />
                                    <b>पिता/पति का नाम : </b><span class="hindi-lg"><?php echo $demand->father_name;?></span><br />
                            	</td>
                            	<td width="50%">
                                    <b>वार्ड का नाम : </b><span class="hindi-lg"><?php echo $demand->ward_name;?></span><br />
                                    <b>भवन का पता : </b><span class="hindi-lg"><?php echo $demand->address;?></span><br />
                            	</td>
                        	</tr>
                    	</table>
                    	<br />
                    	<table width="100%" border="1" cellpadding="3" cellspacing="0">
                        	<tr>
                            	<th align="center">क्र0सं0</th>
                            	<th align="center">
                                    अवधि <br />
                                    <?php $originalDate = $demand->from_date; $newDate = date("d-m-Y", strtotime($originalDate)); echo $newDate; ?> to <?php $originalDate = $demand->to_date; $newDate = date("d-m-Y", strtotime($originalDate)); echo $newDate; ?>
                                </th>
                            	<th align="right">देय सकल राशि (रु0) </th>
                        	</tr>
                        	<tr>
                            	<td align="center">1.</td>
                            	<td align="center">कुल जल कर </td>
                            	<td align="right"><?= $demand->total_tax; ?></td>
                        	</tr>
                            <tr>
                            	<td align="center">2.</td>
                            	<td align="center"><b>कुल जमा धन राशि</b></td>
                            	<td align="right"><b><?= $demand->paid_amount; ?></b></td>
                        	</tr>
                            <tr>
                            	<td align="center">3.</td>
                            	<td align="center">बकाया/ सरचार्ज</td>
                            	<td align="right"><?= $demand->arrear; ?></td>
                        	</tr>
                            <tr>
                            	<td align="center">4.</td>
                            	<td align="center">अग्रिम / अधिभार कर</td>
                            	<td align="right"><?= $demand->advance; ?></td>
                        	</tr>
                        
                        </table><br><br><br>
                        <span style="float: left;">
                            कर अधीक्षक / क्लर्क <br />
                            नगर पालिका परिषद्, बदायूं उ0प्र0
                        </span>
                        <span style="float: right;">
                            अधिशासी अधिकारी <br />
                            नगर पालिका परिषद्, बदायूं उ0प्र0
                        </span>
                    </td>
        	    </tr>
        	</table>
        </div><br />
        <a href="javascript:void(0);" id="printPageButton" onclick="window.print()" type="button" class="btn btn-primary footer-btn1">Print</a>
        <a href="<?php echo base_url().'Admin/getWaterTaxReceiptList'; ?>" id="printPageButton" class="btn btn-secondary footer-btn">Go Back</a>
    </body>
</html>