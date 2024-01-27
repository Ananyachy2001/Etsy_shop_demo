@extends('layouts.app')
@section('main-content')
<div class="container-xxl flex-grow-1 container-p-y">
    <h4 class="py-3 mb-4"><span class="text-muted fw-light">Designs /</span> Sets</h4>

                    <!-- Upcoming Webinar -->
                    <div class="col-md-6 col-xl-4 mb-4">
                        <div class="card h-100">
                          <div class="card-body">
                            <div class="bg-label-primary rounded-3 text-center mb-3 pt-4">
                              <img
                                class="img-fluid w-60"
                                src="../../assets/img/illustrations/sitting-girl-with-laptop-dark.png"
                                alt="Card girl image" />
                            </div>
                            <h4 class="mb-2 pb-1">Set 1</h4>
                            <p class="small">
                              Next Generation Frontend Architecture Using Layout Engine And React Native Web.
                            </p>
                            <div class="row mb-3 g-3">
                              <div class="col-6">
                                <div class="d-flex">
                                  <div class="avatar flex-shrink-0 me-2">
                                    <span class="avatar-initial rounded bg-label-primary"
                                      ><i class="bx bx-calendar-exclamation bx-sm"></i
                                    ></span>
                                  </div>
                                  <div>
                                    <h6 class="mb-0 text-nowrap">Total Files</h6>
                                    <small>142</small>
                                  </div>
                                </div>
                              </div>
                              <div class="col-6">
                                <div class="d-flex">
                                  <div class="avatar flex-shrink-0 me-2">
                                    <span class="avatar-initial rounded bg-label-primary"
                                      ><i class="bx bx-time-five bx-sm"></i
                                    ></span>
                                  </div>
                                  <div>
                                    <h6 class="mb-0 text-nowrap">Created</h6>
                                    <small>32 minutes ago</small>
                                  </div>
                                </div>
                              </div>
                            </div>
                            <div class="col-12 text-center">
                              <a href="javascript:void(0);" class="btn btn-primary w-100 d-grid">Details</a>
                            </div>
                          </div>
                        </div>
                      </div>
                      <!--/ Upcoming Webinar -->
    
</div>
    
@endsection