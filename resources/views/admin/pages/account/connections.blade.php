@extends('layouts.app')
@section('main-content')
<div class="container-xxl flex-grow-1 container-p-y">
    <h4 class="py-3 mb-4"><span class="text-muted fw-light">Settings / </span> Connections</h4>

    <div class="row">
      <div class="col-md-12">
        <div class="row">
          <div class="col-md-6 col-12 mb-md-0 mb-4">
            <div class="card">
              <h5 class="card-header">Connected Accounts</h5>
              <div class="card-body">
                <p>Display content from your connected accounts on your site</p>
                <!-- Connections -->
                <div class="d-flex mb-3">
                  <div class="flex-shrink-0">
                      <img src="{{ asset('assets/img/icons/brands/etsy.svg') }}" alt="Etsy" class="me-3" height="15" />
                  </div>
                  <div class="flex-grow-1 row">
                      <div class="col-9 mb-sm-0 mb-2">
                          <h6 class="mb-0">Etsy</h6>
                          @if (session('etsy_access_token'))
                          <small class="text-muted">Your Etsy shop is Connected to Progmedia</small>
                          @else
                          <small class="text-muted">Not Connected</small>
                          @endif
                      </div>
                      <div class="col-3 text-end">
                          <form method="POST" action="{{ route('etsy.disconnect') }}">
                              @csrf
                              @if (session('etsy_access_token'))
                                  <a title="Disconnect Etsy" href="{{ route('etsy.disconnect') }}" class="btn btn-danger btn-icon"><i class='bx bx-unlink'></i></a>
                              @else
                                  <a title="Connect Now" href="{{ route('etsy.connect') }}" class="btn btn-icon btn-label-secondary"><i class="bx bx-link-alt"></i></a>
                              @endif
                          </form>
                      </div>
                  </div>
              </div>
              
                <div class="d-flex mb-3">
                  <div class="flex-shrink-0">
                    <img src="../../assets/img/icons/brands/slack.png" alt="slack" class="me-3" height="30" />
                  </div>
                  <div class="flex-grow-1 row">
                    <div class="col-9 mb-sm-0 mb-2">
                      <h6 class="mb-0">Slack</h6>
                      <small class="text-muted">Communication</small>
                    </div>
                    <div class="col-3 text-end">
                      <a title="" href="#" class="btn btn-icon btn-label-secondary"><i class="bx bx-link-alt"></i></a>
                    </div>
                  </div>
                </div>
                <div class="d-flex mb-3">
                  <div class="flex-shrink-0">
                    <img
                      src="../../assets/img/icons/brands/github.png"
                      alt="github"
                      class="me-3"
                      height="30" />
                  </div>
                  <div class="flex-grow-1 row">
                    <div class="col-9 mb-sm-0 mb-2">
                      <h6 class="mb-0">Github</h6>
                      <small class="text-muted">Manage your Git repositories</small>
                    </div>
                    <div class="col-3 text-end">
                      <a title="" href="#" class="btn btn-icon btn-label-secondary"><i class="bx bx-link-alt"></i></a>

                    </div>
                  </div>
                </div>
                <div class="d-flex mb-3">
                  <div class="flex-shrink-0">
                    <img
                      src="../../assets/img/icons/brands/mailchimp.png"
                      alt="mailchimp"
                      class="me-3"
                      height="30" />
                  </div>
                  <div class="flex-grow-1 row">
                    <div class="col-9 mb-sm-0 mb-2">
                      <h6 class="mb-0">Mailchimp</h6>
                      <small class="text-muted">Email marketing service</small>
                    </div>
                    <div class="col-3 text-end">
                      <a title="" href="#" class="btn btn-icon btn-label-secondary"><i class="bx bx-link-alt"></i></a>
                    </div>
                  </div>
                </div>
                <!-- /Connections -->
              </div>
            </div>
          </div>
          <div class="col-md-6 col-12">
            <div class="card">
              <h5 class="card-header">Social Accounts</h5>
              <div class="card-body">
                <p>Display content from social accounts on your site</p>
                <!-- Social Accounts -->
                <div class="d-flex mb-3">
                  <div class="flex-shrink-0">
                    <img
                      src="../../assets/img/icons/brands/facebook.png"
                      alt="facebook"
                      class="me-3"
                      height="30" />
                  </div>
                  <div class="flex-grow-1 row">
                    <div class="col-8 col-sm-7 mb-sm-0 mb-2">
                      <h6 class="mb-0">Facebook</h6>
                      <small class="text-muted">Not Connected</small>
                    </div>
                    <div class="col-4 col-sm-5 text-end">
                      <button type="button" class="btn btn-icon btn-label-secondary">
                        <i class="bx bx-link-alt"></i>
                      </button>
                    </div>
                  </div>
                </div>
                <div class="d-flex mb-3">
                  <div class="flex-shrink-0">
                    <img
                      src="../../assets/img/icons/brands/twitter.png"
                      alt="twitter"
                      class="me-3"
                      height="30" />
                  </div>
                  <div class="flex-grow-1 row">
                    <div class="col-8 col-sm-7 mb-sm-0 mb-2">
                      <h6 class="mb-0">Twitter</h6>
                      <small class="text-muted">Not Connected</small>
                    </div>
                    <div class="col-4 col-sm-5 text-end">
                      {{-- <button type="button" class="btn btn-icon btn-label-danger">
                        <i class="bx bx-trash-alt"></i>
                      </button> --}}
                      <button type="button" class="btn btn-icon btn-label-secondary">
                        <i class="bx bx-link-alt"></i>
                      </button>
                    </div>
                  </div>
                </div>
                <div class="d-flex mb-3">
                  <div class="flex-shrink-0">
                    <img
                      src="../../assets/img/icons/brands/instagram.png"
                      alt="instagram"
                      class="me-3"
                      height="30" />
                  </div>
                  <div class="flex-grow-1 row">
                    <div class="col-8 col-sm-7 mb-sm-0 mb-2">
                      <h6 class="mb-0">instagram</h6>
                      <small class="text-muted">Not Connected</small>
                    </div>
                    <div class="col-4 col-sm-5 text-end">
                      {{-- <button type="button" class="btn btn-icon btn-label-danger">
                        <i class="bx bx-trash-alt"></i>
                      </button> --}}
                      <button type="button" class="btn btn-icon btn-label-secondary">
                        <i class="bx bx-link-alt"></i>
                      </button>
                    </div>
                  </div>
                </div>
                <div class="d-flex mb-3">
                  <div class="flex-shrink-0">
                    <img
                      src="../../assets/img/icons/brands/dribbble.png"
                      alt="dribbble"
                      class="me-3"
                      height="30" />
                  </div>
                  <div class="flex-grow-1 row">
                    <div class="col-8 col-sm-7 mb-sm-0 mb-2">
                      <h6 class="mb-0">Dribbble</h6>
                      <small class="text-muted">Not Connected</small>
                    </div>
                    <div class="col-4 col-sm-5 text-end">
                      <button type="button" class="btn btn-icon btn-label-secondary">
                        <i class="bx bx-link-alt"></i>
                      </button>
                    </div>
                  </div>
                </div>
                <!-- /Social Accounts -->
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
@endsection