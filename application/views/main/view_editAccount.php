<style>
  .profile-img {
    width: 170px;
    height: 170px;
    object-fit: cover;
  }
</style>
<div class="container-xxl flex-grow-1 container-p-y">
  <h2 class="mb-4">My Profile / Account</h2>
  <form id="profileForm">
    <div class="row mb-3">
      <div class="col-lg-4">
        <div class="card mb-5">
          <div class="card-body text-center">
            <img id="profileImagePreview" src="http://127.0.0.1/api/uploads/profile.png" alt="Profile Picture" class="img-thumbnail rounded-circle profile-img mb-3"><br><br><br><br>
            <input type="file" class="form-control mt-4" id="profileImage" name="profileImage">
          </div>
        </div>
      </div>
      <div class="col-lg-8">
        <div class="row">
          <div class="col-lg-6 mb-9">
            <label for="empCode" class="form-label">Employee Code</label>
            <input type="text" class="form-control" id="empCode" name="empCode">
          </div>
          <div class="col-lg-6">
            <label for="empCode" class="form-label">Password</label>
            <input type="Password" class="form-control" id="password" name="password" autocomplete="new-password">
            <input type="hidden" class="form-control" id="pwdhidden" name="pwdhidden">
          </div>
          <div class="col-lg-6 mb-9">
            <label for="firstName" class="form-label">First Name</label>
            <input type="text" class="form-control" id="firstName" name="firstName">
          </div>
          <div class="col-lg-6">
            <label for="lastName" class="form-label">Last Name</label>
            <input type="text" class="form-control" id="lastName" name="lastName">
          </div>
          <div class="col-lg-6 mb-9">
            <label for="email" class="form-label">E-mail</label>
            <input type="text" class="form-control" id="email" name="email">
          </div>
          <div class="col-lg-6">
            <label for="HBD" class="form-label">Birthday</label>
            <input type="date" class="form-control" id="HBD" name="HBD">
          </div>
          <div class="col-lg-12 mb-9">
            <label for="HBD" class="form-label">Address</label>
            <textarea name="address" id="inputAddress" class="form-control" rows="3"></textarea>
          </div>
          </form>
          <div class="col-lg-12">
            <div class="d-flex justify-content-end">
              <button type="button" class="btn btn-secondary me-2">Cancel</button>
              <button type="button" class="btn btn-primary" id="btnSaveEdit">Save Changes</button>
            </div>
          </div>
        </div>
      </div>
    </div>
  
</div>