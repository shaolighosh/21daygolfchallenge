<section class="signup__body__wrapper">

        <div class="container">

            <div class="signup-body-tops">

                <h2>21 Day Challenge Masterclass : Unlock Your Full Golf Potential</h2>

                <p>
                    Welcome to the 21 Day Challenge Masterclass, where you'll 

                    discover the secrets to improving your golf game in just 21 days.
                    Say goodbye to the constant search for swing mechanics or magic bullet solutions. Our unique approach focuses on developing good habits and making your golf swing a natural part of your game.

                </p>

                <p style="margin-bottom: 10px;">What You'll Get with the 21 Day Challenge Masterclass:</p>

                <ul class="custom-uls">
                    <li>Access to our exclusive 21 Day Challenge Masterclass</li>
                    <li>Build a solid foundation of knowledge and habits</li>
                    <li>Play with confidence and enjoyment on the course</li>
                </ul>


                <p>Invest in your game today for only $199. Limited-time access to the 21 Day Challenge Masterclass awaits you.</p>

                <p>Join the 21 Day Challenge now and unlock your true potential.</p>

            </div>

        </div>

    </section>

    <form role="form" action="<?php echo site_url('signup/handlePayment');?>" method="post"

							class="require-validation" autocomplete="false" data-cc-on-file="false"

							data-stripe-publishable-key="<?php echo $this->config->item('stripe_key') ?>"

							id="payment-form">

    <section class="signup__body__form-section">

        <div class="container">

            <div class="signup__body__bottom__wrapper">

                <div class="signup__body__left__panel">

                   <!-- <div class="Have-coupon_code"> <img src="<?php echo base_url();?>public/assets/img/coupon_code.png" alt=""> Have a coupon? <a class="couponDiv" href="javascript:void(0);">Click here to enter your code</a></div>

                            <input type="hidden" name="applied_discount" value="">

                            <div class="cou_pon">

                           

                            <input type="text" placeholder="Coupon code" name="coupon_code">

                            <button class="applyCoupon"  type="button">Apply</button>

                            

                            </div>



                            <div class="couponApplied" style="display:none;">

                           

                            <p class="couponAppliedText"></p><span> Applied</span><a href="javascript:void(0)" class="removeCoupon"><i class="fa fa-remove"></i></a>

                            

                            </div>-->



                    <h2>Billing Details</h2>

                    <div class="signup__form__row">

                        <div class="signup__form__col">

                            <label for="">First name <span>*</span></label>

                            <input type="text" name="first_name" required id="">

                        </div>

                        <div class="signup__form__col">

                            <label for="">Last name <span>*</span></label>

                            <input type="text" name="last_name" required id="">

                        </div>

                    </div>

                    <div class="signup__form__row">

                        <div class="signup__form__col">

                            <label for="">Phone <span>*</span></label>

                            <input type="text" name="phone"  placeholder="(000) 000-0000"  required id="phone_number">

                        </div>

                        <div class="signup__form__col">

                            <label for="">Email address <span>*</span></label>

                            <input type="email" name="email" required id="">

                        </div>

                    </div>

                    <div class="signup__form__row">

                        <div class="signup__form__col signup__form__col-12">

                          <label for="">Country / Region <span>*</span></label>

                          <span class="select__icon"><img src="<?php echo base_url();?>public/assets/img/select__icon.png" alt=""></span>

                            <select name="country" required id="">

                                <option value="">Select Country</option>

                                <?php if(!empty($countries)){

                                    foreach($countries as $country){

                                        ?>

                                        <option value="<?php echo $country->id;?>"><?php echo $country->country_name;?></option>

                                    <?php 

                                    }

                                }?>

                            </select>

                            <span class="country__icon"><img src="<?php echo base_url();?>public/assets/img/select__icon.png" alt=""></span>

                        </div>

                    </div>

                    <div class="signup__form__row">

                        <div class="signup__form__col-12 street-address">

                            <label for="">Street Address</label>

                           <input type="text" name="street_address" id="" placeholder="House number and street name">

                           <input type="text" name="street_address1" id="" placeholder="Apartment, suite, unit, etc. (optional)">

                        </div>

                    </div>

                    <div class="signup__form__row">

                        <div class="signup__form__col">

                            <label for="">Town / City  <span>*</span></label>

                            <input type="text" name="city" id="">

                        </div>

                        <div class="signup__form__col">

                            <label for="">Postcode  <span>*</span></label>

                            <input type="text" name="post_code" id="">

                        </div>

                    </div>



                    <div class="user-information">

                        <h3>User Information</h3>

                    </div>

                    <div class="signup__form__row">

                        <div class="signup__form__col">

                            <label for="">Username <span>*</span></label>

                            <input role="presentation" autocomplete="off" type="text" name="user_name"  required>

                        </div>

                        <div class="signup__form__col">

                            <label for="">Password <span>*</span></label>

                            <input type="password" name="password" autocomplete="new-password" required>

                        </div>

                    </div>



                    <!-- <div class="signup__form__row">

                        <div class="signup__form__col">

                            <label for="">Choose Class Level <span>*</span></label>

                            <select name="" id="">

                                    <option value="">Option 1</option>

                                    <option value="">Option 2</option>

                                    <option value="">Option 3</option>

                                    <option value="">Option 4</option>

                            </select>

                            <span class="select__icon"><img src="<?php echo base_url();?>public/assets/img/select__icon.png" alt=""></span>

                            

                        </div>

                        <div class="signup__form__col">

                            <label for="">Select Weakness <span>*</span></label>

                            <select name="" id="">                                

                                <option value="">Option 1</option>

                                <option value="">Option 2</option>

                                <option value="">Option 3</option>

                                <option value="">Option 4</option>

                            </select>

                            <span class="select__icon"><img src="<?php echo base_url();?>public/assets/img/select__icon.png" alt=""></span>

                        </div>

                    </div> -->

                  <!--   <div class="signup__form__row">

                        <div class="signup__form__col-12">

                            <label for="">Upload Latest Golf Video</label>

                            <div class="custom-file-upload">

                                <input type="file" id="file" name="myfiles" required />

                            </div>

                        </div>

                    </div> -->



                </div>

                <div class="signup__body__right__panel">

                    <h3>Your Order</h3>

                    <div class="plan__wrapper">

                        <div class="plan__header">

                            <div class="plan-row">

                                <div class="plan-col">Plan</div>

                                <div class="plan-col">Subtotal</div>

                            </div>

                        </div>

                        <div class="plan__body">

                            <div class="plan-row">

                                <div class="plan-col">Masterclass </div>

                                <div class="plan-col changeAmount">$<?php echo class_amount;?></div>

                            </div>

                        </div>

                        <div class="plan__footer">

                            <div class="plan-row">

                                <div class="plan-col">Total</div>

                                <div class="plan-col changeAmount">$<?php echo class_amount;?></div>

                            </div>

                        </div>

                        <input name="amount" type="hidden" value="199">

                    </div>

                      <div class="Have-coupon_code"> <img src="<?php echo base_url();?>public/assets/img/coupon_code.png" alt=""> Have a coupon? <a class="couponDiv" href="javascript:void(0);">Click here to enter your code</a></div>



                             <div class="couponAppliedError" style="display:none;"></div>



                            <input type="hidden" name="applied_discount" value="">

                            <div class="cou_pon">

                           

                            <input type="text" placeholder="Coupon code" name="coupon_code">

                            <button class="applyCoupon"  type="button">Apply</button>

                            

                            </div>



                            <div class="couponApplied" style="display:none;">



                           

                            <p class="couponAppliedText"></p><span> Applied</span><a href="javascript:void(0)" class="removeCoupon"><i class="fa fa-remove"></i></a>

                            </div>

                            <div class="clearfix"></div>

                    <div class="credit__card">

                        <div class="credit__card__left">

                            <input type="radio" id="test1" name="card_checked" checked>

                            <label for="test1">Credit / Debit Card</label>

                        </div>

                        <div class="credit__card__right">

                            <img src="<?php echo base_url();?>public/assets/img/vsa.png" alt="">

                        </div>

                    </div>

                    <div class="card-number">

                        <label for="">Card Number</label>

                        <input type="text" required name="card_number" class="card-number-new" placeholder="4123 4567 123 9819">

                        <span><img src="<?php echo base_url();?>public/assets/img/visa-icon.png" alt=""></span>

                    </div>

                    <div class="expiration-date">

                        <label for="">Expiration Date</label>

                        <div class="expiration-date__wrapper">

                            <div class="expiration-date__left">

                                <span class="select__icon"><img src="<?php echo base_url();?>public/assets/img/select__icon.png" alt=""></span>

                                <select name="expiry_month" required id="" class="card-expiry-month">

                                    <option value="">Month</option>

                                    <option value="01">01</option>

                                    <option value="02">02</option>

                                    <option value="03">03</option>

                                    <option value="04">04</option>

                                    <option value="05">05</option>

                                    <option value="06">06</option>

                                    <option value="07">07</option>

                                    <option value="08">08</option>

                                    <option value="09">09</option>

                                    <option value="10">10</option>

                                    <option value="11">11</option>

                                    <option value="12">12</option>

                                    

                                </select>

                                <!-- <input

                                    class='form-control card-expiry-month' placeholder='MM' size='2'

                                    type='text'> -->

                            </div>

                            <div class="expiration-date__right">

                                <span class="select__icon"><img src="<?php echo base_url();?>public/assets/img/select__icon.png" alt=""></span>

                                <select name="expiry_year" required id="" class="card-expiry-year" id="">

                                    <option value="">Year</option>

                                    <?php 

                                    for($i = -5;$i < 10;$i++){

                                        ?>

                                        <option value="<?php echo date('Y', strtotime($i.' year'));?>"><?php echo date('Y', strtotime($i.' year'));?></option>

                                    <?php } ?>

                                </select>

                                

                            </div>                            

                        </div>

                    </div>

                    <div class="security-code">

                        <label for="">Security Code</label>

                        <input autocomplete='off' required

                                    class='form-control card-cvc' placeholder='ex. 311' size='4'

                                    type='text'>

                        <span><a href="#"><img src="<?php echo base_url();?>public/assets/img/helf.png" alt=""></a></span>

                    </div>

                    <div class='form-row row errorHide' style="display:none;">

                            <div class='col-md-12 error form-group hide'>

                                <div class='alert-danger alert'>Please correct the errors and try

                                    again.</div>

                            </div>

                        </div>

                    <div class="form-group">

                        <input type="checkbox" required name="term" id="html">

                        <label for="html">I read to the website <a target="_blank" href="https://www.golfersu.com/terms-and-conditions/">terms and conditions</a> *</label>

                    </div>

                    <div class="btn__submit">

                        <button type="submit">Submit and Check Out</button>

                    </div>

                </div>

            </div>

        </div>

    </section>

    </form>