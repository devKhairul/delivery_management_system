<?php require('header.php'); ?>


    <div class="content">
        <div class="animated fadeIn">
            <div class="row">
                <div class="col-lg-6 offset-lg-3">
                    <div class="card">

                        <div class="card-body">
                            <!-- Credit Card -->
                            <div id="pay-invoice">
                                <div class="card-body">
                                    <div class="card-title">
                                        <h3 class="text-center"><strong>CREATE USER</strong></h3>
                                    </div>
                                    <hr>
                                    <form action="#" method="post" novalidate="novalidate">

                                        <div class="form-group">
                                            <label for="cc-payment" class="control-label mb-1"><strong>Name</strong> </label>
                                            <input id="cc-payment" name="cc-payment" type="text" class="form-control" aria-required="true" aria-invalid="false">
                                        </div>

                                        <div class="form-group has-success">
                                            <label for="cc-name" class="control-label mb-1"><strong>Email</strong> </label>
                                            <input id="cc-name" name="cc-name" type="email" class="form-control cc-name valid" data-val="true" data-val-required="Please enter the name on card" autocomplete="cc-name" aria-required="true" aria-invalid="false" aria-describedby="cc-name">
                                            <span class="help-block field-validation-valid" data-valmsg-for="cc-name" data-valmsg-replace="true"></span>
                                        </div>

                                        <div class="form-group has-success">
                                            <label for="cc-name" class="control-label mb-1"><strong>Password</strong> </label>
                                            <input id="cc-name" name="cc-name" type="password" class="form-control cc-name valid" data-val="true" data-val-required="Please enter the name on card" autocomplete="cc-name" aria-required="true" aria-invalid="false" aria-describedby="cc-name">
                                            <span class="help-block field-validation-valid" data-valmsg-for="cc-name" data-valmsg-replace="true"></span>
                                        </div>

                                        <div class="form-group">
                                            <label for="select" class="form-control-label"><strong>Role</strong> </label>
                                            <select name="select" id="select" class="form-control">
                                                <option value="" selected><small>Please select a role</small></option>
                                                <option value="Administrator">Administrator</option>
                                                <option value="Executive">Executive</option>
                                                <option value="User">User</option>
                                            </select>
                                        </div>

                                        <div>
                                          &nbsp;
                                        </div>

                                        <div>
                                            <button id="payment-button" type="submit" class="btn btn-lg btn-info btn-block">
                                              <span id="payment-button-amount">CREATE</span>
                                                <span id="payment-button-sending" style="display:none;">Sending…</span>
                                            </button>
                                        </div>
                                    </form>
                                </div>
                            </div>

                        </div>
                    </div> <!-- .card -->

                </div><!--/.col-->

    </div><!-- .animated -->
</div><!-- .content -->


<?php require('footer.php'); ?>
