@extends('admin_manage.layouts.layout')
@section('title',"Update / Edit User")
@section('content')

<div class="container-xxl flex-grow-1 container-p-y">
    <h4 class="fw-bold py-3 mb-4"><span class="text-muted fw-light">Okab Pages/</span>Update User</h4>

    <!-- Basic Layout & Basic with Icons -->
    <div class="row">      
      <!-- Basic with Icons -->
      <div class="col-xxl">
        <div class="card mb-4">
          <div class="card-header d-flex align-items-center justify-content-between">
            <h5 class="mb-0">Basic with Icons</h5>
            <small class="text-muted float-end">Merged input group</small>
          </div>
          <div class="card-body">
            <form method="POST" id="addUserForm" action= "{{ url('users/savechanges'); }}">
                @csrf
                <input type="hidden" name="id" value="{{$user->id}}">
              <div class="row mb-3">
                <label class="col-sm-2 col-form-label" for="basic-icon-default-fullname">Name</label>
                <div class="col-sm-10">
                  <div class="input-group input-group-merge">
                    <span id="basic-icon-default-fullname2" class="input-group-text"><i class="bx bx-user"></i></span>
                    <input type="text" name="name" value="{{$user->name}}" required class="form-control" id="basic-icon-default-fullname" placeholder="John Doe" aria-label="John Doe" aria-describedby="basic-icon-default-fullname2">
                  </div>
                </div>
              </div>

              <div class="row mb-3">
                <label class="col-sm-2 col-form-label" for="basic-icon-default-email">Email</label>
                <div class="col-sm-10">
                  <div class="input-group input-group-merge">
                    <span class="input-group-text"><i class="bx bx-envelope"></i></span>
                    <input type="email" value="{{$user->email}}" required name="email" type="email" id="basic-icon-default-email" class="form-control" placeholder="john.doe" aria-label="john.doe" aria-describedby="basic-icon-default-email2">
                    
                  </div>
                  <div class="form-text">You can use letters, numbers &amp; periods</div>
                </div>
              </div>

              <div class="row mb-3">
                <label class="col-sm-2 col-form-label" for="basic-icon-default-email">Password</label>
                <div class="col-sm-10">
                  <div class="input-group input-group-merge">
                    <span class="input-group-text"><i class="bx bx-star"></i></span>
                    <input type="password" value="" required name="password" min="6" type="email" id="basic-icon-default-email" class="form-control" placeholder="Password" aria-label="Password" aria-describedby="basic-icon-default-email2">
                    
                  </div>
                  <div class="form-text">You can use letters, numbers &amp; periods</div>
                </div>
              </div>

              <div class="row mb-3">
                <label class="col-sm-2 form-label" for="basic-icon-default-phone">Role</label>
                <div class="col-sm-10">
                  <div class="input-group input-group-merge">
                    <span id="basic-icon-default-user" class="input-group-text"><i class="bx bx-user"></i></span>
                    <select id="rolelargeSelect" required name="role" class="form-select form-select-lg">
                        <option value="">Select Role</option>
                        @if($user->role==='admin')
                          <option selected value="admin">admin</option>
                          <option value="manager">manager</option>
                        @elseif($user->role==='manager')
                          <option value="admin">admin</option>
                          <option selected value="manager">manager</option>
                        @endif                        
                      </select>
                  </div>
                </div>                
              </div>

              <div class="row mb-3">
                <label class="col-sm-2 col-form-label" for="basic-icon-default-company">Address</label>
                <div class="col-sm-10">
                  <div class="input-group input-group-merge">
                    <span id="basic-icon-default-company2" class="input-group-text"><i class="bx bx-buildings"></i></span>
                    <textarea name="address" required id="basic-icon-default-message" class="form-control" placeholder="Address" aria-label="Address" aria-describedby="basic-icon-default-message2">{{$user->address}}</textarea>
                  </div>
                </div>
              </div>

              
              <div class="row mb-3">
                <label class="col-sm-2 form-label" for="basic-icon-default-phone">Locality</label>
                <div class="col-sm-10">
                  <div class="input-group input-group-merge">
                    <span id="basic-icon-default-phone2" class="input-group-text"><i class="bx bx-buildings"></i></span>
                    @if(Auth::user()['role']!=='admin')
                    <input type="text" readonly value="{{$user->locality}}" required name="locality" id="basic-icon-default-phone" class="form-control phone-mask" placeholder="Landmark" aria-label="Landmark" aria-describedby="basic-icon-default-phone2">
                    @else
                    <input type="text" value="{{$user->locality}}" required name="locality" id="basic-icon-default-phone" class="form-control phone-mask" placeholder="Landmark" aria-label="Landmark" aria-describedby="basic-icon-default-phone2">
                    @endif
                  </div>
                  <div class="form-text">Readonly for Manager</div>
                </div>                
              </div>

              <div class="row mb-3">
                <label class="col-sm-2 form-label" for="basic-icon-default-phone">Type</label>
                <div class="col-sm-10">
                  <div class="input-group input-group-merge">
                    <span id="basic-icon-default-phone2" class="input-group-text"><i class="bx bx-buildings"></i></span>
                    <select id="largeSelect" required name="type" class="form-select form-select-lg">
                        <option value="">Select Type</option>
                        @if($user->type==='Commercial')
                        <option selected value="Commercial">Commercial</option>
                        <option value="Residential">Residential</option>
                        @elseif($user->type==='Residential')
                        <option value="Commercial">Commercial</option>
                        <option selected value="Residential">Residential</option>
                        @endif     
                        
                      </select>
                  </div>
                </div>                
              </div>

              <div class="row mb-3">
                <label class="col-sm-2 form-label" for="basic-icon-default-phone">Purpose</label>
                <div class="col-sm-10">
                  <div class="input-group input-group-merge">
                    <span id="basic-icon-default-phone2" class="input-group-text"><i class="bx bx-buildings"></i></span>
                    <input type="text" value="{{$user->purpose}}" required name="purpose" id="basic-icon-default-phone" class="form-control phone-mask" placeholder="Purpose" aria-label="Purpose" aria-describedby="basic-icon-default-phone2">
                  </div>
                </div>                
              </div>

              <div class="row mb-3">
                <label class="col-sm-2 form-label" for="basic-icon-default-phone">Rent Amount</label>
                <div class="col-sm-10">
                  <div class="input-group input-group-merge">
                    <span id="basic-icon-default-phone2" class="input-group-text"><i class="bx bx-buildings"></i></span>
                    <input type="number"  value="{{$user->rent_amt}}" required step="00.01" required name="rent_amt" id="basic-icon-default-phone" class="form-control phone-mask" placeholder="Amount" aria-label="Amount" aria-describedby="basic-icon-default-phone2">
                  </div>
                </div>                
              </div>

              <div class="row justify-content-end">
                <div class="col-sm-10">
                  <button type="submit" class="btn btn-primary">Send</button>
                </div>
              </div>

              <div style="color:red">
                @if(isset($error))
                    <span style="color: red;letter-spacing: 2px;">{{$error}}</span>                  
                @endif 
              </div>

            </form>
          </div>
        </div>
      </div>
    </div>
  </div>



@endsection