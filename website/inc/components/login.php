<?php

?>
<!-- Login Modal -->
<div class="modal fade" id="loginModal" tabindex="-1" role="dialog" aria-labelledby="loginModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-sm" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="loginModalLabel">Login</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <form>
          <div class="form-group">
              <input type="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Enter email">
          </div>
          <div class="form-group">
              <input type="password" class="form-control" id="exampleInputPassword1" placeholder="Password">
          </div>
      </form>
        <button class="btn btn-outline-secondary btn-lg"  data-toggle="modal" data-target="#newAccountModal">New User <i class="bi-person-plus" style="font-size: 1rem;"></i></button>
        <button class="btn btn-info btn-lg"  type="submit">Login <i class="bi-person-check-fill" style="font-size: 1rem;"></i></button>
      </div>
    </div>
  </div>
</div>


<!-- Account Creation Modal-->
<div class="modal fade" id="newAccountModal" tabindex="-1" role="dialog" aria-labelledby="newAccountModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-xl" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="newAccountModalLabel">Create an Account</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <form>
        <div class="form-row">
            <div class="col-md-4 mb-3">
            <label for="validationDefault01">First name</label>
            <input type="text" class="form-control" id="validationDefault01" placeholder="First name" value="" required>
            </div>
            <div class="col-md-4 mb-3">
            <label for="validationDefault02">Last name</label>
            <input type="text" class="form-control" id="validationDefault02" placeholder="Last name" value="" required>
            </div>
            <div class="col-md-4 mb-3">
            <label for="validationDefaultUsername">Username</label>
            <div class="input-group">
                <div class="input-group-prepend">
                <span class="input-group-text" id="inputGroupPrepend2">@</span>
                </div>
                <input type="text" class="form-control" id="validationDefaultUsername" placeholder="Username" aria-describedby="inputGroupPrepend2" required>
            </div>
            </div>
        </div>
        <div class="form-row">
            <div class="col-md-6 mb-3">
            <label for="validationDefault03">City</label>
            <input type="text" class="form-control" id="validationDefault03" placeholder="City" required>
            </div>
            <div class="col-md-3 mb-3">
            <label for="validationDefault04">State</label>
            <input type="text" class="form-control" id="validationDefault04" placeholder="State" required>
            </div>
            <div class="col-md-3 mb-3">
            <label for="validationDefault05">Zip</label>
            <input type="text" class="form-control" id="validationDefault05" placeholder="Zip" required>
            </div>
        </div>
        <div class="form-group">
            <div class="form-check">
            <input class="form-check-input" type="checkbox" value="" id="invalidCheck2" required>
            <label class="form-check-label" for="invalidCheck2">
                Agree to terms and conditions
            </label>
            </div>
        </div>
      </form>
      <button class="btn btn-info btn-lg"  type="submit">Create Account <i class="bi-person-plus" style="font-size: 1rem;"></i></button>
      </div>
    </div>
  </div>
</div>
