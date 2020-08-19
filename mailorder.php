<?php
include_once("./sendmail.php");
$subtotal = 0;
$row_product = '';
if (isset($_SESSION['cart']) && is_array($_SESSION['cart'])) {
    foreach ($_SESSION['cart'] as $key => $value) {
        $product_dt_id = $_SESSION['cart'][$key]['product_id'];
        $product_name = $_SESSION['cart'][$key]['product_name'];
        $quantity = $_SESSION['cart'][$key]['item_quantity'];
        $query = "SELECT * FROM product_details where product_dt_id ='$product_dt_id'";
        $query_run = mysqli_query($conn, $query);
        while ($row = mysqli_fetch_assoc($query_run)) {
            $price = $row['price'];
        }

        $total = $quantity * $price;
        $subtotal = $subtotal + $total;
        $ordertotal = $subtotal;
        $row_iterm=  ' <tr>
                <td style="text-align:left;vertical-align:middle;border:1px solid #eee;word-wrap:break-word;color:#6d6d6d;padding:12px">' . $product_name .  '</td>
                <td style="text-align:left;vertical-align:middle;border:1px solid #eee;color:#6d6d6d;padding:12px">' . $quantity . '</td>
                <td style="text-align:left;vertical-align:middle;border:1px solid #eee;color:#6d6d6d;padding:12px"><span><span>$</span>' . $price .'</span></td>
            </tr>';
        $row_product = $row_product .$row_iterm;
        
    }
}
$message = '
<html>
<head>
 
</head>
<body>
  <table border="0" cellpadding="0" cellspacing="0" height="100%" width="100%">
                <tbody>
                <tr>
					<td align="center" valign="top">
                        <div id="mail-order_header_image">
							<p style="margin-top:0"><img src="https://ci3.googleusercontent.com/proxy/dOEg2ct3TMpgviF86VoieDnG5e55X1Dg6c6A23gOdFeVaHS7f2fwTnzlhIYhMs3vQ_FMyejizxhVx6XNg0F8CK1tuqM0U5afC0SJzxtYwA=s0-d-e1-ft#http://daf9p2mnm4nrk.cloudfront.net/uploads/2019/04/logo.png" alt="Helmuth Builders" style="border:none;display:inline;font-size:14px;font-weight:bold;height:auto;line-height:100%;outline:none;text-decoration:none;text-transform:capitalize" class="CToWUd"></p>						</div>
						<table border="0" cellpadding="0" cellspacing="0" width="600" id="mail_order_container" style="background-color:#fdfdfd;border:1px solid #e0e0e0;border-radius:3px!important">
							<tbody><tr>
								<td align="center" valign="top">
									
									<table border="0" cellpadding="0" cellspacing="0" width="600" id="mail_order_header" style="background-color:#720c0b;border-radius:3px 3px 0 0!important;color:#ffffff;border-bottom:0;font-weight:bold;line-height:100%;vertical-align:middle;font-family:&quot;Helvetica Neue&quot;,Helvetica,Roboto,Arial,sans-serif">
										<tbody><tr>
											<td id="m_560829609458503300header_wrapper" style="padding:36px 48px;display:block">
												<h1 style="color:#ffffff;font-family:&quot;Helvetica Neue&quot;,Helvetica,Roboto,Arial,sans-serif;font-size:30px;font-weight:300;line-height:150%;margin:0;text-align:left">Thank you for your order</h1>
											</td>
										</tr>
									</tbody></table>
									
								</td>
							</tr>
							<tr>
								<td align="center" valign="top">
									
									<table border="0" cellpadding="0" cellspacing="0" width="600" id="mail_order_body">
										<tbody><tr>
											<td valign="top" style="background-color:#fdfdfd">
												
												<table border="0" cellpadding="20" cellspacing="0" width="100%">
                                                        <tbody><tr>
                                                            <td valign="top" style="padding:48px 48px 0">
                                                                <div style="color:#6d6d6d;font-family:&quot;Helvetica Neue&quot;,Helvetica,Roboto,Arial,sans-serif;font-size:14px;line-height:150%;text-align:left">

                                                                    <p style="margin:0 0 16px">Your order has been received and is now being processed. Your order
                                                                    details are shown below for your reference:</p>

                                                                    <p style="margin:0 0 16px">Pay with cash upon pickup.</p>


                                                                    <h2 style="color:#720c0b;display:block;font-family:&quot;Helvetica Neue&quot;,Helvetica,Roboto,Arial,sans-serif;font-size:18px;font-weight:bold;line-height:130%;margin:0 0 18px;text-align:left">
                                                                        Order #'.$last_order_id.' ('.$order_date.')</h2>

                                                                    <div style="margin-bottom:40px">
                                                                        <table cellspacing="0" cellpadding="6" style="width:100%;font-family:Helvetica,Roboto,Arial,sans-serif;color:#6d6d6d;border:1px solid #e4e4e4" border="1">
                                                                            <thead>
                                                                                <tr>
                                                                                    <th scope="col" style="text-align:left;color:#6d6d6d;border:1px solid #e4e4e4;padding:12px">Product</th>
                                                                                    <th scope="col" style="text-align:left;color:#6d6d6d;border:1px solid #e4e4e4;padding:12px">Quantity</th>
                                                                                    <th scope="col" style="text-align:left;color:#6d6d6d;border:1px solid #e4e4e4;padding:12px">Price</th>
                                                                                </tr>
                                                                            </thead>
                                                                            <tbody>

                                                                            
                                                                           '.$row_product.'
                                                                           
                                                                            
                                                                            </tbody>
                                                                            <tfoot>
                                                                                <tr>
                                                                                    <th scope="row" colspan="2" style="text-align:left;border-top-width:4px;color:#6d6d6d;border:1px solid #e4e4e4;padding:12px">Subtotal:</th>
                                                                                    <td style="text-align:left;border-top-width:4px;color:#6d6d6d;border:1px solid #e4e4e4;padding:12px"><span><span>$</span>'.$subtotal.'</span></td>
                                                                                </tr>
                                                                                <tr>
                                                                                    <th scope="row" colspan="2" style="text-align:left;color:#6d6d6d;border:1px solid #e4e4e4;padding:12px">Shipping:</th>
                                                                                    <td style="text-align:left;color:#6d6d6d;border:1px solid #e4e4e4;padding:12px">Free shipping</td>
                                                                                </tr>
                                                                                <tr>
                                                                                    <th scope="row" colspan="2" style="text-align:left;color:#6d6d6d;border:1px solid #e4e4e4;padding:12px">Payment method:</th>
                                                                                    <td style="text-align:left;color:#6d6d6d;border:1px solid #e4e4e4;padding:12px">'.$payment.'</td>
                                                                                </tr>
                                                                                <tr>
                                                                                    <th scope="row" colspan="2" style="text-align:left;color:#6d6d6d;border:1px solid #e4e4e4;padding:12px">Total:</th>
                                                                                    <td style="text-align:left;color:#6d6d6d;border:1px solid #e4e4e4;padding:12px"><span><span>$</span>'.$total.'</span></td>
                                                                                </tr>
                                                                                <tr>
                                                                                    <th scope="row" colspan="2" style="text-align:left;color:#6d6d6d;border:1px solid #e4e4e4;padding:12px">Note:</th>
                                                                                    <td style="text-align:left;color:#6d6d6d;border:1px solid #e4e4e4;padding:12px">'. $order_comments.'</td>
                                                                                    </tr>
                                                                            </tfoot>
                                                                        </table>
                                                                    </div>

                                                                    <table cellspacing="0" cellpadding="0" style="width:100%;vertical-align:top;margin-bottom:40px;padding:0" border="0">
                                                                        <tbody>
                                                                            <tr>
                                                                                <td style="text-align:left;border:0;padding:0" valign="top" width="50%">
                                                                                    <h2 style="color:#720c0b;display:block;font-family:&quot;Helvetica Neue&quot;,Helvetica,Roboto,Arial,sans-serif;font-size:18px;font-weight:bold;line-height:130%;margin:0 0 18px;text-align:left">Billing address</h2>

                                                                                    <address style="padding:12px 12px 0;color:#6d6d6d;border:1px solid #e4e4e4">'.$sender_name.'<br>'.$sender_address.'<br>'.$sender_city.","." AK " .$sender_postcode.'</address>
                                                                                </td>
                                                                                <td style="text-align:left;padding:0" valign="top" width="50%">
                                                                                    <h2 style="color:#720c0b;display:block;font-family:&quot;Helvetica Neue&quot;,Helvetica,Roboto,Arial,sans-serif;font-size:18px;font-weight:bold;line-height:130%;margin:0 0 18px;text-align:left">Shipping address</h2>

                                                                                    <address style="padding:12px 12px 0;color:#6d6d6d;border:1px solid #e4e4e4">'.$recipient_name.'<br>'.$recipient_address.'<br>'.$recipient_city.","." AK " .$recipient_postcode.'</address>
                                                                                </td>
                                                                            </tr>
                                                                        </tbody>
                                                                    </table>
                                                                </div>
                                                            </td>
                                                        </tr>
                                                    </tbody>
                                                </table>
												
											</td>
										</tr>
									</tbody></table>
									
								</td>
							</tr>
							<tr>
								<td align="center" valign="top">
									
									<table border="0" cellpadding="10" cellspacing="0" width="600" id="mail_order_footer">
                                        <tbody>
                                            <tr>
                                                <td valign="top" style="padding:0">
                                                    <table border="0" cellpadding="10" cellspacing="0" width="100%">
                                                        <tbody>
                                                            <tr>
                                                                <td colspan="2" valign="middle" style="padding:0 48px 48px 48px;border:0;color:#aa6d6d;font-family:Arial;font-size:12px;line-height:125%;text-align:center">
                                                                    <p>HELMUTH BUILDERS</p>
                                                                </td>
                                                            </tr>
                                                        </tbody>
                                                    </table>
                                                </td>
                                            </tr>
                                         </tbody>
                                    </table>
								</td>
							</tr>
						</tbody></table>
					</td>
				</tr>
            </tbody>
        </table>
</body>
</html>
';

if (sendmail("$billing_email", "Hello from PHPMailer", "$message")) {
    include_once('thankspage.php');
    unset($_SESSION["cart"]);
    header("Refresh:60");
} else {
    echo ("Failed");
}
