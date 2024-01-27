@extends('layouts.app')
@section('main-content')
<div class="container-xxl flex-grow-1 container-p-y">
    <h4 class="py-3 mb-4"><span class="text-muted fw-light">Designs /</span> All Files</h4>

    <!-- Basic Bootstrap Table -->
    <div class="card">
        <div class="table-responsive text-nowrap">
          <table class="table">
            <thead>
              <tr>
                <th>File Name</th>
                <th>File Type</th>
                <th>SKU</th>
                <th>Collection</th>
                <th>Actions</th>
              </tr>
            </thead>
            <tbody class="table-border-bottom-0">
              <tr>
                <td>
                  <i class="fab fa-angular fa-lg text-danger me-3"></i>
                  <span class="fw-medium">File 23</span>
                </td>
                <td>PDF</td>
                <td>DJHV575</td>
                <td><span class="badge bg-label-primary me-1">Collection 2</span></td>
                <td>
                  <div class="dropdown">
                    <button type="button" class="btn p-0 dropdown-toggle hide-arrow" data-bs-toggle="dropdown">
                      <i class="bx bx-dots-vertical-rounded"></i>
                    </button>
                    <div class="dropdown-menu">
                        <a class="dropdown-item" href="javascript:void(0);"
                        ><i class='bx bx-right-top-arrow-circle'></i> View</a>
                      <a class="dropdown-item" href="javascript:void(0);"
                        ><i class="bx bx-edit-alt me-1"></i> Edit</a>
                      <a class="dropdown-item" href="javascript:void(0);">
                        <i class="bx bx-trash me-1"></i>Delete</a>
                    </div>
                  </div>
                </td>
              </tr>
              <tr>
                <td>
                  <i class="fab fa-react fa-lg text-info me-3"></i> <span class="fw-medium">File 12</span>
                </td>
                <td>PNG</td>
                <td>
                    234FFGE
                </td>
                <td><span class="badge bg-label-success me-1">Collection 4</span></td>
                <td>
                  <div class="dropdown">
                    <button type="button" class="btn p-0 dropdown-toggle hide-arrow" data-bs-toggle="dropdown">
                      <i class="bx bx-dots-vertical-rounded"></i>
                    </button>
                    <div class="dropdown-menu">
                      <a class="dropdown-item" href="javascript:void(0);"
                        ><i class="bx bx-edit-alt me-2"></i> Edit</a
                      >
                      <a class="dropdown-item" href="javascript:void(0);"
                        ><i class="bx bx-trash me-2"></i> Delete</a
                      >
                    </div>
                  </div>
                </td>
              </tr>
              <tr>
                <td>
                  <i class="fab fa-vuejs fa-lg text-success me-3"></i>
                  <span class="fw-medium">File 90</span>
                </td>
                <td>JPEG</td>
                <td>
                  234DGEVED
                </td>
                <td><span class="badge bg-label-info me-1">Collection 1</span></td>
                <td>
                  <div class="dropdown">
                    <button type="button" class="btn p-0 dropdown-toggle hide-arrow" data-bs-toggle="dropdown">
                      <i class="bx bx-dots-vertical-rounded"></i>
                    </button>
                    <div class="dropdown-menu">
                      <a class="dropdown-item" href="javascript:void(0);"
                        ><i class="bx bx-edit-alt me-2"></i> Edit</a
                      >
                      <a class="dropdown-item" href="javascript:void(0);"
                        ><i class="bx bx-trash me-2"></i> Delete</a
                      >
                    </div>
                  </div>
                </td>
              </tr>
            </tbody>
          </table>
        </div>
      </div>
      <!--/ Basic Bootstrap Table -->
  </div>
    
@endsection