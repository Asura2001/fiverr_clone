<?php 
    /* coded by Rahul Barui ( https://github.com/Rahul-Barui ) */
    include "dbcon.php";
    if(isset($_POST['submit'])){
        $order_id = $_POST['id'];
    } else {
        $order_id = '';
    }

    $SQL_getPr = "SELECT * FROM `orders` WHERE `id`='$order_id'";
    $res_getPr = mysqli_query($con,$SQL_getPr) or die("MySql Query Error".mysqli_error($con));
    while($row_getPr = mysqli_fetch_assoc($res_getPr)){
        $price = $row_getPr['price']*$row_getPr['quantity'];
        $order_gig_id = $row_getPr['gig_id'];
        $select3 = "SELECT * FROM `gallery` WHERE gig_id = $order_gig_id";
        $select_result3 = mysqli_query($con, $select3);
        $gallery_row = mysqli_fetch_assoc($select_result3);
        $image1 = $gallery_row['image1'];
    }
?>
<html>
    <head>
        <title> Stripe Payment Gateway Integration in PHP </title>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link href="//netdna.bootstrapcdn.com/bootstrap/3.1.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
        <link rel="stylesheet" type="text/css" href="css/design.css">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    </head>
    <body>
        <main>
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <div class="panel panel-default credit-card-box">
                        <div class="panel-heading display-table" >
                            <div class="row display-tr" style="display:flex; justify-content:space-between;">
                                <h3 class="panel-title display-td" style="margin-top:15px;"> &nbsp;Payment Details</h3>
                                <img class="" width="75px" src="../seller/assets/upload/<?php echo $image1;?>">
                            </div>                    
                        </div>

                        <div class="panel-body">
                            <div class="payment-status" style="color: red;"></div>
                            <form role="form" action="stripe_payment.php" method="POST" name="cardpayment" id="payment-form">
                                <input type="hidden" name="productId" value="<?php echo $order_id;?>"/>
                                <div class="row">
                                    <div class="col-xs-12">
                                        <div class="form-group">
                                            <label for="couponCode">CARD HOLDER NAME</label>
                                            <input type="text" class="form-control" name="holdername" placeholder="Enter Card Holder Name" autofocus required id="name" />
                                        </div>
                                    </div>                        
                                </div>

                                <div class="row">
                                    <div class="col-xs-12">
                                        <div class="form-group">
                                            <label for="couponCode">EMAIL</label>
                                            <input type="email" class="form-control" name="email" placeholder="Email" id="email" required />
                                        </div>
                                    </div>                        
                                </div>

                                <div class="row">
                                    <div class="col-xs-12">
                                        <div class="form-group">
                                            <label for="cardNumber">CARD NUMBER</label>
                                            <div class="input-group">

                                                <input type="text" class="form-control" name="card_number" placeholder="Valid Card Number" autocomplete="cc-number" id="card_number" maxlength="16" data-stripe="number" required />
                                                <span class="input-group-addon"><i class="fa fa-credit-card"></i></span>
                                            </div>
                                        </div>                            
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-xs-4 col-md-4">
                                        <div class="form-group">
                                            <label for="cardExpiry"><span class="visible-xs-inline">MON</span></label>
                                            <select name="card_exp_month" id="card_exp_month" class="form-control" data-stripe="exp_month" required>
                                                <option>MON</option>
                                                <option value="01">01 ( JAN )</option>
                                                <option value="02">02 ( FEB )</option>
                                                <option value="03">03 ( MAR )</option>
                                                <option value="04">04 ( APR )</option>
                                                <option value="05">05 ( MAY )</option>
                                                <option value="06">06 ( JUN )</option>
                                                <option value="07">07 ( JUL )</option>
                                                <option value="08">08 ( AUG )</option>
                                                <option value="09">09 ( SEP )</option>
                                                <option value="10">10 ( OCT )</option>
                                                <option value="11">11 ( NOV )</option>
                                                <option value="12">12 ( DEC )</option>
                                            </select>
                                        </div>
                                    </div>

                                    <div class="col-xs-4 col-md-4">
                                        <div class="form-group">
                                            <label for="cardExpiry"><span class="visible-xs-inline">YEAR</span></label>
                                            <select name="card_exp_year" id="card_exp_year" class="form-control" data-stripe="exp_year">
                                                <option>Year</option>
                                                <option value="20">2020</option>
                                                <option value="21">2021</option>
                                                <option value="22">2022</option>
                                                <option value="23">2023</option>
                                                <option value="24">2024</option>
                                                <option value="25">2025</option>
                                                <option value="26">2026</option>
                                                <option value="27">2027</option>
                                                <option value="28">2028</option>
                                                <option value="29">2029</option>
                                                <option value="30">2030</option>
                                                <option value="31">2031</option>
                                                <option value="32">2032</option>
                                                <option value="33">2033</option>
                                                <option value="34">2034</option>
                                                <option value="35">2035</option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-xs-4 col-md-4 pull-right">
                                        <div class="form-group">
                                            <label for="cardCVC">CV CODE</label>
                                            <input type="password" class="form-control" name="card_cvc" placeholder="CVC" autocomplete="cc-csc" id="card_cvc" required />
                                        </div>
                                    </div>
                                </div>
                                
                                <div class="row">
                                    <div class="col-xs-12">
                                        <button class="subscribe btn btn-success btn-lg btn-block submit" type="submit" id="payBtn">PAY NOW ( $<?php echo $price;?> )</button>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>            
                </div>
            </div>
        </div>
        </main>
    </body>

    <script src="//netdna.bootstrapcdn.com/bootstrap/3.1.0/js/bootstrap.min.js"></script>
    <!-- Stripe JavaScript library -->
    <script src="https://js.stripe.com/v2/"></script>
    <script src="js/jquery.min.js"></script>

    <script>
        // Set your publishable key
        Stripe.setPublishableKey('pk_test_51NT1RrFw9Yr1tkF7H4SUOpR33bANVqTuOG9v9JQn69eD2NEAjjgiHp3f8SJwYzZnURpWYFwP1rvFeNS5i3jtkvzr00eHoF9cxd');

        /*$(function() {
            var $form = $('#payment-form');
            $form.submit(function(event) {
                // Disable the submit button to prevent repeated clicks:
                $form.find('.submit').prop('disabled', true);
                // Request a token from Stripe:
                Stripe.card.createToken($form, stripeResponseHandler);
                // Prevent the form from being submitted:
                return false;
            });
        });

        function stripeResponseHandler(status, response) {
            // Grab the form:
            var $form = $('#payment-form');

            if (response.error) { // Problem!
                // Show the errors on the form:
                $form.find('.payment-status').text(response.error.message);
                $form.find('.submit').prop('disabled', false); // Re-enable submission
            } else { // Token was created!
                // Get the token ID:
                var token = response.id;
                // Insert the token ID into the form so it gets submitted to the server:
                $form.append($('<input type="hidden" name="stripeToken">').val(token));
                // Submit the form:
                $form.get(0).submit();
            }
        };*/

        // Callback to handle the response from stripe
        function stripeResponseHandler(status, response) {
            if (response.error) {
                // Enable the submit button
                $('#payBtn').removeAttr("disabled");
                // Display the errors on the form
                $(".payment-status").html('<p>'+response.error.message+'</p>');
            } else {
                var form$ = $("#payment-form");
                // Get token id
                var token = response.id;
                // Insert the token into the form
                form$.append("<input type='hidden' name='stripeToken' value='" + token + "' />");
                // Submit form to the server
                form$.get(0).submit();
            }
        }

        $(document).ready(function() {
            // On form submit
            $("#payment-form").submit(function() {
                // Disable the submit button to prevent repeated clicks
                $('#payBtn').attr("disabled", "disabled");
                
                // Create single-use token to charge the user
                Stripe.createToken({
                    number: $('#card_number').val(),
                    exp_month: $('#card_exp_month').val(),
                    exp_year: $('#card_exp_year').val(),
                    cvc: $('#card_cvc').val()
                }, stripeResponseHandler);
                
                // Submit from callback
                return false;
            });
        });
</script>

</html>