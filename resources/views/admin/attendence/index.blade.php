@extends('includes.masters')
@push('styles')

@endpush

@section('content')
<div class="main px-lg-4 px-md-4"> 

        <!-- Body: Header -->
        <div class="header">
            <nav class="navbar py-4">
                <div class="container-xxl">
    
                    <!-- header rightbar icon -->
                   <div class="h-right d-flex align-items-center mr-5 mr-lg-0 order-1">
                        <div class="d-flex">
                            <a class="nav-link text-primary collapsed" href="help.html" title="Get Help">
                                <i class="icofont-info-square fs-5"></i>
                            </a>
                           <div class="avatar-list avatar-list-stacked px-3">
                              <img class="avatar rounded-circle" src="{{ asset('assets/images/xs/avatar2.jpg') }}" alt="">
                              <img class="avatar rounded-circle" src="{{ asset('assets/images/xs/avatar1.jpg') }}" alt="">
                              <img class="avatar rounded-circle" src="{{ asset('assets/images/xs/avatar3.jpg') }}" alt="">
                              <img class="avatar rounded-circle" src="{{ asset('assets/images/xs/avatar4.jpg') }}" alt="">
                              <img class="avatar rounded-circle" src="{{ asset('assets/images/xs/avatar7.jpg') }}" alt="">
                              <img class="avatar rounded-circle" src="{{ asset('assets/images/xs/avatar8.jpg') }}" alt="">
                              
                              <span class="avatar rounded-circle text-center pointer" data-bs-toggle="modal" data-bs-target="#addUser">
                                    <i class="icofont-ui-add"></i>
                              </span>
                          </div>
                        </div>
                        <div class="dropdown notifications">
                            <a class="nav-link dropdown-toggle pulse" href="#" role="button" data-bs-toggle="dropdown">
                                <i class="icofont-alarm fs-5"></i>
                                <span class="pulse-ring"></span>
                            </a>
                            <div id="NotificationsDiv" class="dropdown-menu rounded-lg shadow border-0 dropdown-animation dropdown-menu-sm-end p-0 m-0">
                                <div class="card border-0 w380">
                                    <div class="card-header border-0 p-3">
                                        <h5 class="mb-0 font-weight-light d-flex justify-content-between">
                                            <span>Notifications</span>
                                            <span class="badge text-white">11</span>
                                        </h5>
                                    </div>
                                    <div class="tab-content card-body">
                                        <div class="tab-pane fade show active">
                                            <ul class="list-unstyled list mb-0">
                                                <li class="py-2 mb-1 border-bottom">
                                                    <a href="javascript:void(0);" class="d-flex">
                                                        <img class="avatar rounded-circle" src="{{asset('assets/images/xs/avatar1.jpg')}}" alt="">
                                                        <div class="flex-fill ms-2">
                                                            <p class="d-flex justify-content-between mb-0 "><span class="font-weight-bold">Dylan Hunter</span> <small>2MIN</small></p>
                                                            <span class="">Added  2021-02-19 my-Task ui/ux Design <span class="badge bg-success">Review</span></span>
                                                        </div>
                                                    </a>
                                                </li>
                                                <li class="py-2 mb-1 border-bottom">
                                                    <a href="javascript:void(0);" class="d-flex">
                                                        <div class="avatar rounded-circle no-thumbnail">DF</div>
                                                        <div class="flex-fill ms-2">
                                                            <p class="d-flex justify-content-between mb-0 "><span class="font-weight-bold">Diane Fisher</span> <small>13MIN</small></p>
                                                            <span class="">Task added Get Started with Fast Cad project</span>
                                                        </div>
                                                    </a>
                                                </li>
                                                <li class="py-2 mb-1 border-bottom">
                                                    <a href="javascript:void(0);" class="d-flex">
                                                        <img class="avatar rounded-circle" src="{{asset('assets/images/xs/avatar3.jpg') }}" alt="">
                                                        <div class="flex-fill ms-2">
                                                            <p class="d-flex justify-content-between mb-0 "><span class="font-weight-bold">Andrea Gill</span> <small>1HR</small></p>
                                                            <span class="">Quality Assurance Task Completed</span>
                                                        </div>
                                                    </a>
                                                </li>
                                                <li class="py-2 mb-1 border-bottom">
                                                    <a href="javascript:void(0);" class="d-flex">
                                                        <img class="avatar rounded-circle" src="{{asset('assets/images/xs/avatar5.jpg')}}" alt="">
                                                        <div class="flex-fill ms-2">
                                                            <p class="d-flex justify-content-between mb-0 "><span class="font-weight-bold">Diane Fisher</span> <small>13MIN</small></p>
                                                            <span class="">Add New Project for App Developemnt</span>
                                                        </div>
                                                    </a>
                                                </li>
                                                <li class="py-2 mb-1 border-bottom">
                                                    <a href="javascript:void(0);" class="d-flex">
                                                        <img class="avatar rounded-circle" src="{{asset('assets/images/xs/avatar6.jpg')}}" alt="">
                                                        <div class="flex-fill ms-2">
                                                            <p class="d-flex justify-content-between mb-0 "><span class="font-weight-bold">Andrea Gill</span> <small>1HR</small></p>
                                                            <span class="">Add Timesheet For Rhinestone project</span>
                                                        </div>
                                                    </a>
                                                </li>
                                                <li class="py-2">
                                                    <a href="javascript:void(0);" class="d-flex">
                                                        <img class="avatar rounded-circle" src="{{asset('assets/images/xs/avatar7.jpg')}}" alt="">
                                                        <div class="flex-fill ms-2">
                                                            <p class="d-flex justify-content-between mb-0 "><span class="font-weight-bold">Zoe Wright</span> <small class="">1DAY</small></p>
                                                            <span class="">Add Calander Event</span>
                                                        </div>
                                                    </a>
                                                </li>
                                            </ul>
                                        </div>
                                    </div>
                                    <a class="card-footer text-center border-top-0" href="#"> View all notifications</a>
                                </div>
                            </div>
                        </div>
                        <div class="dropdown user-profile ml-2 ml-sm-3 d-flex align-items-center">
                            <div class="u-info me-2">
                                <p class="mb-0 text-end line-height-sm "><span class="font-weight-bold">Dylan Hunter</span></p>
                                <small>Admin Profile</small>
                            </div>
                            <a class="nav-link dropdown-toggle pulse p-0" href="#" role="button" data-bs-toggle="dropdown" data-bs-display="static">
                                <img class="avatar lg rounded-circle img-thumbnail" src="{{asset('assets/images/profile_av.png')}}" alt="profile">
                            </a>
                            <div class="dropdown-menu rounded-lg shadow border-0 dropdown-animation dropdown-menu-end p-0 m-0">
                                <div class="card border-0 w280">
                                    <div class="card-body pb-0">
                                        <div class="d-flex py-1">
                                            <img class="avatar rounded-circle" src="{{asset('assets/images/profile_av.png')}}" alt="profile">
                                            <div class="flex-fill ms-3">
                                                <p class="mb-0"><span class="font-weight-bold">Dylan Hunter</span></p>
                                                <small class="">Dylan.hunter@gmail.com</small>
                                            </div>
                                        </div>
                                        
                                        <div><hr class="dropdown-divider border-dark"></div>
                                    </div>
                                    <div class="list-group m-2 ">
                                        <a href="task.html" class="list-group-item list-group-item-action border-0 "><i class="icofont-tasks fs-5 me-3"></i>My Task</a>
                                        <a href="members.html" class="list-group-item list-group-item-action border-0 "><i class="icofont-ui-user-group fs-6 me-3"></i>members</a>
                                        <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                          @csrf
                                          </form>

                                          <a href="#" class="list-group-item list-group-item-action border-0" 
                                          onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                                          <i class="icofont-logout fs-6 me-3"></i>Sign Out
                                          </a>
                                        <div><hr class="dropdown-divider border-dark"></div>
                                        <a href="ui-elements/auth-signup.html" class="list-group-item list-group-item-action border-0 "><i class="icofont-contact-add fs-5 me-3"></i>Add personal account</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="px-md-1">
                            <a href="#offcanvas_setting" data-bs-toggle="offcanvas" aria-expanded="false" title="template setting">
                                <svg class="svg-stroke" xmlns="http://www.w3.org/2000/svg" width="22" height="22" viewBox="0 0 24 24" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">
                                    <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                                    <path d="M10.325 4.317c.426 -1.756 2.924 -1.756 3.35 0a1.724 1.724 0 0 0 2.573 1.066c1.543 -.94 3.31 .826 2.37 2.37a1.724 1.724 0 0 0 1.065 2.572c1.756 .426 1.756 2.924 0 3.35a1.724 1.724 0 0 0 -1.066 2.573c.94 1.543 -.826 3.31 -2.37 2.37a1.724 1.724 0 0 0 -2.572 1.065c-.426 1.756 -2.924 1.756 -3.35 0a1.724 1.724 0 0 0 -2.573 -1.066c-1.543 .94 -3.31 -.826 -2.37 -2.37a1.724 1.724 0 0 0 -1.065 -2.572c-1.756 -.426 -1.756 -2.924 0 -3.35a1.724 1.724 0 0 0 1.066 -2.573c-.94 -1.543 .826 -3.31 2.37 -2.37c1 .608 2.296 .07 2.572 -1.065z"></path>
                                    <path d="M9 12a3 3 0 1 0 6 0a3 3 0 0 0 -6 0"></path>
                                </svg>
                            </a>
                        </div>
                    </div>
    
                    <!-- menu toggler -->
                    <button class="navbar-toggler p-0 border-0 menu-toggle order-3" type="button" data-bs-toggle="collapse" data-bs-target="#mainHeader">
                        <span class="fa fa-bars"></span>
                    </button>
    
                    <!-- main menu Search-->
                    <div class="order-0 col-lg-4 col-md-4 col-sm-12 col-12 mb-3 mb-md-0 ">
                        <div class="input-group flex-nowrap input-group-lg">
                            <button type="button" class="input-group-text" id="addon-wrapping"><i class="fa fa-search"></i></button>
                            <input type="search" class="form-control" placeholder="Search" aria-label="search" aria-describedby="addon-wrapping">
                            <button type="button" class="input-group-text add-member-top" id="addon-wrappingone" data-bs-toggle="modal" data-bs-target="#addUser"><i class="fa fa-plus"></i></button>
                        </div>
                    </div>
    
                </div>
            </nav>
        </div>

        <!-- Body: Body -->       
        <div class="body d-flex py-lg-3 py-md-2">
            <div class="container-xxl">
                <div class="row align-items-center">
                    <div class="border-0 mb-4">
                        <div class="card-header py-3 no-bg bg-transparent d-flex align-items-center px-0 justify-content-between border-bottom flex-wrap">
                            <h3 class="fw-bold mb-0">Attendance (Admin)</h3>
                            <div class="col-auto d-flex mt-1 mt-sm-0">
                                <button type="button" class="btn btn-dark  w-sm-100 me-2" data-bs-toggle="modal" data-bs-target="#editattendance"><i class="icofont-edit me-2 fs-6"></i>Edit Attendance</button>
                                <button class="btn btn-primary dropdown-toggle" type="button" id="dropdownMenuButton2" data-bs-toggle="dropdown" aria-expanded="false">
                                        Filter
                                </button>
                                <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="dropdownMenuButton2">
                                    <li><a class="dropdown-item" href="#">All</a></li>
                                    <li><a class="dropdown-item" href="#">Today Absent</a></li>
                                    <li><a class="dropdown-item" href="#">Week Absent</a></li>
                                  </ul>
                            </div>
                        </div>
                    </div>
                </div> <!-- Row end  -->
                <div class="row clearfix g-3">
                  <div class="col-sm-12">
                        <div class="card mb-3">
                            <div class="card-body">
                                <div class="atted-info d-flex mb-3 flex-wrap">
                                        <div class="full-present me-2">
                                            <i class="icofont-check-circled text-success me-1"></i>
                                            <span>Full Day Present</span>
                                        </div>
                                        <div class="Half-day me-2">
                                           <i class="icofont-wall-clock text-warning me-1"></i>
                                            <span>Half Day Present</span>
                                        </div>
                                        <div class="absent me-2">
                                            <i class="icofont-close-circled text-danger me-1"></i>
                                            <span>Full Day Absence</span>
                                        </div>
                                </div>
                                <div class="table-responsive">
                                    <table class="table table-hover align-middle mb-0" style="width:100%">
                                        <thead>
                                            <tr>
                                                <th>Employee</th>
                                                <th>1</th>
                                                <th>2</th>
                                                <th>3</th>
                                                <th>4</th>
                                                <th>5</th>
                                                <th>6</th>
                                                <th>7</th>
                                                <th>8</th>
                                                <th>9</th>
                                                <th>10</th>
                                                <th>11</th>
                                                <th>12</th>
                                                <th>13</th>
                                                <th>14</th>
                                                <th>15</th>
                                                <th>16</th>
                                                <th>17</th>
                                                <th>18</th>
                                                <th>19</th>
                                                <th>20</th>
                                                <th>21</th>
                                                <th>22</th>
                                                <th>23</th>
                                                <th>24</th>
                                                <th>25</th>
                                                <th>27</th>
                                                <th>28</th>
                                                <th>29</th>
                                                <th>30</th>
                                                <th>31</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <tr>
                                            <td>
                                                <span class="fw-bold small">Joan Dyer</span>
                                            </td>
                                            <td>
                                                        <i class="icofont-check-circled text-success"></i>
                                            </td>
                                            <td>
                                                        <i class="icofont-check-circled text-success"></i>
                                            </td>
                                            <td>
                                                        <i class="icofont-check-circled text-success"></i>
                                            </td>
                                            <td>
                                                        <i class="icofont-wall-clock text-warning"></i>
                                            </td>
                                            <td>
                                                        <i class="icofont-check-circled text-success"></i>
                                            </td>
                                                <td>
                                                        <i class="icofont-check-circled text-success"></i>
                                                </td>
                                                <td>
                                                        <i class="icofont-check-circled text-success"></i>
                                                </td>
                                                <td>
                                                        <i class="icofont-check-circled text-success"></i>
                                                </td>
                                                <td>
                                                        <i class="icofont-check-circled text-success"></i>
                                                </td>
                                                <td>
                                                        <i class="icofont-wall-clock text-warning"></i>
                                                </td>
                                                <td>
                                                        <i class="icofont-check-circled text-success"></i>
                                                </td>
                                                <td>
                                                        <i class="icofont-check-circled text-success"></i>
                                                </td>
                                                <td>
                                                        <i class="icofont-check-circled text-success"></i>
                                            </td>
                                            <td>
                                                        <i class="icofont-check-circled text-success"></i>
                                            </td>
                                            <td>
                                                        <i class="icofont-check-circled text-success"></i>
                                            </td>
                                            <td>
                                                        <i class="icofont-wall-clock text-warning"></i>
                                            </td>
                                            <td>
                                                        <i class="icofont-check-circled text-success"></i>
                                            </td>
                                                <td>
                                                        <i class="icofont-check-circled text-success"></i>
                                                </td>
                                                <td>
                                                        <i class="icofont-check-circled text-success"></i>
                                                </td>
                                                <td>
                                                        <i class="icofont-check-circled text-success"></i>
                                                </td>
                                                <td>
                                                        <i class="icofont-check-circled text-success"></i>
                                                </td>
                                                <td>
                                                        <i class="icofont-check-circled text-success"></i>
                                                </td>
                                                <td>
                                                        <i class="icofont-check-circled text-success"></i>
                                                </td>
                                                <td>
                                                        <i class="icofont-check-circled text-success"></i>
                                                </td>
                                                <td>
                                                        <i class="icofont-check-circled text-success"></i>
                                                </td>
                                                <td>
                                                        <i class="icofont-check-circled text-success"></i>
                                                </td>
                                                <td>
                                                        <i class="icofont-check-circled text-success"></i>
                                                </td>
                                                <td>
                                                        <i class="icofont-check-circled text-success"></i>
                                                </td>
                                                <td>
                                                        <i class="icofont-check-circled text-success"></i>
                                                </td>
                                                <td>
                                                        <i class="icofont-check-circled text-success"></i>
                                                </td>
                                                
                                            </tr>
                                            <tr>
                                                <td>
                                                    <span class="fw-bold small">Ryan	Randall</span>
                                                </td>
                                                <td>
                                                    <i class="icofont-close-circled text-danger"></i>
                                            </td>
                                            <td>
                                                        <i class="icofont-check-circled text-success"></i>
                                                </td>
                                                <td>
                                                        <i class="icofont-check-circled text-success"></i>
                                                </td>
                                                <td>
                                                        <i class="icofont-check-circled text-success"></i>
                                                </td>
                                                <td>
                                                        <i class="icofont-check-circled text-success"></i>
                                                </td>
                                                <td>
                                                        <i class="icofont-check-circled text-success"></i>
                                                </td>
                                                <td>
                                                        <i class="icofont-close-circled text-danger"></i>
                                                </td>
                                                <td>
                                                        <i class="icofont-check-circled text-success"></i>
                                                </td>
                                                <td>
                                                        <i class="icofont-check-circled text-success"></i>
                                                </td>
                                                <td>
                                                        <i class="icofont-check-circled text-success"></i>
                                                </td>
                                                <td>
                                                        <i class="icofont-check-circled text-success"></i>
                                                </td>
                                                <td>
                                                        <i class="icofont-check-circled text-success"></i>
                                                </td>
                                                <td>
                                                        <i class="icofont-wall-clock text-warning"></i>
                                                </td>
                                                <td>
                                                        <i class="icofont-check-circled text-success"></i>
                                                </td>
                                                <td>
                                                        <i class="icofont-check-circled text-success"></i>
                                                </td>
                                                <td>
                                                        <i class="icofont-close-circled text-danger"></i>
                                                </td>
                                                <td>
                                                        <i class="icofont-check-circled text-success"></i>
                                                </td>
                                                <td>
                                                        <i class="icofont-check-circled text-success"></i>
                                                </td>
                                                <td>
                                                        <i class="icofont-check-circled text-success"></i>
                                                </td>
                                                <td>
                                                        <i class="icofont-check-circled text-success"></i>
                                                </td>
                                                <td>
                                                        <i class="icofont-check-circled text-success"></i>
                                                </td>
                                                <td>
                                                        <i class="icofont-check-circled text-success"></i>
                                                </td>
                                                <td>
                                                        <i class="icofont-check-circled text-success"></i>
                                                </td>
                                                <td>
                                                        <i class="icofont-wall-clock text-warning"></i>
                                                </td>
                                                <td>
                                                        <i class="icofont-check-circled text-success"></i>
                                                </td>
                                                <td>
                                                        <i class="icofont-check-circled text-success"></i>
                                                </td>
                                                <td>
                                                        <i class="icofont-check-circled text-success"></i>
                                                </td>
                                                <td>
                                                        <i class="icofont-check-circled text-success"></i>
                                                </td>
                                                <td>
                                                        <i class="icofont-check-circled text-success"></i>
                                                </td>
                                                <td>
                                                        <i class="icofont-check-circled text-success"></i>
                                                </td>
                                                
                                            </tr>
                                            <tr>
                                            
                                                <td>
                                                    <span class="fw-bold small">Phil	Glover</span>
                                                </td>
                                                <td>
                                                    <i class="icofont-check-circled text-success"></i>
                                                </td>
                                                <td>
                                                        <i class="icofont-check-circled text-success"></i>
                                                </td>
                                                <td>
                                                        <i class="icofont-check-circled text-success"></i>
                                                </td>
                                                <td>
                                                        <i class="icofont-check-circled text-success"></i>
                                                </td>
                                                <td>
                                                        <i class="icofont-check-circled text-success"></i>
                                                </td>
                                                <td>
                                                        <i class="icofont-check-circled text-success"></i>
                                                </td>
                                                <td>
                                                        <i class="icofont-check-circled text-success"></i>
                                                </td>
                                                <td>
                                                        <i class="icofont-check-circled text-success"></i>
                                                </td>
                                                <td>
                                                        <i class="icofont-check-circled text-success"></i>
                                                </td>
                                                <td>
                                                        <i class="icofont-check-circled text-success"></i>
                                                </td>
                                                <td>
                                                        <i class="icofont-check-circled text-success"></i>
                                                </td>
                                                <td>
                                                        <i class="icofont-check-circled text-success"></i>
                                                </td>
                                                <td>
                                                        <i class="icofont-check-circled text-success"></i>
                                                </td>
                                                <td>
                                                        <i class="icofont-check-circled text-success"></i>
                                                </td>
                                                <td>
                                                        <i class="icofont-wall-clock text-warning"></i>
                                                </td>
                                                <td>
                                                        <i class="icofont-check-circled text-success"></i>
                                                </td>
                                                <td>
                                                        <i class="icofont-check-circled text-success"></i>
                                                </td>
                                                <td>
                                                        <i class="icofont-check-circled text-success"></i>
                                                </td>
                                                <td>
                                                        <i class="icofont-check-circled text-success"></i>
                                                </td>
                                                <td>
                                                        <i class="icofont-check-circled text-success"></i>
                                                </td>
                                                <td>
                                                        <i class="icofont-wall-clock text-warning"></i>
                                                </td>
                                                <td>
                                                        <i class="icofont-check-circled text-success"></i>
                                                </td>
                                                <td>
                                                        <i class="icofont-check-circled text-success"></i>
                                                </td>
                                                <td>
                                                        <i class="icofont-check-circled text-success"></i>
                                                </td>
                                                <td>
                                                        <i class="icofont-check-circled text-success"></i>
                                                </td>
                                                <td>
                                                        <i class="icofont-check-circled text-success"></i>
                                                </td>
                                                <td>
                                                        <i class="icofont-check-circled text-success"></i>
                                                </td>
                                                <td>
                                                        <i class="icofont-check-circled text-success"></i>
                                                </td>
                                                <td>
                                                        <i class="icofont-check-circled text-success"></i>
                                                </td>
                                                <td>
                                                        <i class="icofont-check-circled text-success"></i>
                                                </td>
                                                
                                            </tr>
                                            <tr>
                                            
                                                <td>
                                                    <span class="fw-bold small">Victor Rampling</span>
                                                </td>
                                                <td>
                                                    <i class="icofont-check-circled text-success"></i>
                                                </td>
                                                <td>
                                                        <i class="icofont-wall-clock text-warning"></i>
                                                </td>
                                                <td>
                                                        <i class="icofont-check-circled text-success"></i>
                                                </td>
                                                <td>
                                                        <i class="icofont-check-circled text-success"></i>
                                                </td>
                                                <td>
                                                        <i class="icofont-check-circled text-success"></i>
                                                </td>
                                                <td>
                                                        <i class="icofont-check-circled text-success"></i>
                                                </td>
                                                <td>
                                                        <i class="icofont-wall-clock text-warning"></i>
                                                </td>
                                                <td>
                                                        <i class="icofont-check-circled text-success"></i>
                                                </td>
                                                <td>
                                                        <i class="icofont-check-circled text-success"></i>
                                                </td>
                                                <td>
                                                        <i class="icofont-check-circled text-success"></i>
                                                </td>
                                                <td>
                                                        <i class="icofont-check-circled text-success"></i>
                                                </td>
                                                <td>
                                                        <i class="icofont-check-circled text-success"></i>
                                                </td>
                                                <td>
                                                        <i class="icofont-check-circled text-success"></i>
                                                </td>
                                                <td>
                                                        <i class="icofont-check-circled text-success"></i>
                                                </td>
                                                <td>
                                                        <i class="icofont-check-circled text-success"></i>
                                                </td>
                                                <td>
                                                        <i class="icofont-check-circled text-success"></i>
                                                </td>
                                                <td>
                                                        <i class="icofont-check-circled text-success"></i>
                                                </td>
                                                <td>
                                                        <i class="icofont-check-circled text-success"></i>
                                                </td>
                                                <td>
                                                        <i class="icofont-wall-clock text-warning"></i>
                                                </td>
                                                <td>
                                                        <i class="icofont-check-circled text-success"></i>
                                                </td>
                                                <td>
                                                        <i class="icofont-check-circled text-success"></i>
                                                </td>
                                                <td>
                                                        <i class="icofont-check-circled text-success"></i>
                                                </td>
                                                <td>
                                                        <i class="icofont-check-circled text-success"></i>
                                                </td>
                                                <td>
                                                        <i class="icofont-check-circled text-success"></i>
                                                </td>
                                                <td>
                                                        <i class="icofont-check-circled text-success"></i>
                                                </td>
                                                <td>
                                                        <i class="icofont-check-circled text-success"></i>
                                                </td>
                                                <td>
                                                        <i class="icofont-check-circled text-success"></i>
                                                </td>
                                                <td>
                                                        <i class="icofont-check-circled text-success"></i>
                                                </td>
                                                <td>
                                                        <i class="icofont-check-circled text-success"></i>
                                                </td>
                                                <td>
                                                        <i class="icofont-check-circled text-success"></i>
                                                </td>
                                            
                                            </tr>
                                            <tr>
                                                
                                                <td>
                                                    <span class="fw-bold small">Sally Graham</span>
                                                </td>
                                                <td>
                                                    <i class="icofont-check-circled text-success"></i>
                                                </td>
                                                <td>
                                                        <i class="icofont-check-circled text-success"></i>
                                                </td>
                                                <td>
                                                        <i class="icofont-wall-clock text-warning"></i>
                                                </td>
                                                <td>
                                                        <i class="icofont-check-circled text-success"></i>
                                                </td>
                                                <td>
                                                        <i class="icofont-check-circled text-success"></i>
                                                </td>
                                                <td>
                                                        <i class="icofont-check-circled text-success"></i>
                                                </td>
                                                <td>
                                                        <i class="icofont-check-circled text-success"></i>
                                                </td>
                                                <td>
                                                        <i class="icofont-check-circled text-success"></i>
                                                </td>
                                                <td>
                                                        <i class="icofont-check-circled text-success"></i>
                                                </td>
                                                <td>
                                                        <i class="icofont-check-circled text-success"></i>
                                                </td>
                                                <td>
                                                        <i class="icofont-check-circled text-success"></i>
                                                </td>
                                                <td>
                                                        <i class="icofont-check-circled text-success"></i>
                                                </td>
                                                <td>
                                                        <i class="icofont-check-circled text-success"></i>
                                                </td>
                                                <td>
                                                        <i class="icofont-check-circled text-success"></i>
                                                </td>
                                                <td>
                                                        <i class="icofont-check-circled text-success"></i>
                                                </td>
                                                <td>
                                                        <i class="icofont-check-circled text-success"></i>
                                                </td>
                                                <td>
                                                        <i class="icofont-check-circled text-success"></i>
                                                </td>
                                                <td>
                                                        <i class="icofont-check-circled text-success"></i>
                                                </td>
                                                <td>
                                                        <i class="icofont-wall-clock text-warning"></i>
                                                </td>
                                                <td>
                                                        <i class="icofont-check-circled text-success"></i>
                                                </td>
                                                <td>
                                                        <i class="icofont-check-circled text-success"></i>
                                                </td>
                                                <td>
                                                        <i class="icofont-check-circled text-success"></i>
                                                </td>
                                                <td>
                                                        <i class="icofont-check-circled text-success"></i>
                                                </td>
                                                <td>
                                                        <i class="icofont-check-circled text-success"></i>
                                                </td>
                                                <td>
                                                        <i class="icofont-check-circled text-success"></i>
                                                </td>
                                                <td>
                                                        <i class="icofont-check-circled text-success"></i>
                                                </td>
                                                <td>
                                                        <i class="icofont-check-circled text-success"></i>
                                                </td>
                                                <td>
                                                        <i class="icofont-check-circled text-success"></i>
                                                </td>
                                                <td>
                                                        <i class="icofont-check-circled text-success"></i>
                                                </td>
                                                <td>
                                                        <i class="icofont-wall-clock text-warning"></i>
                                                </td>
                                            
                                            </tr>
                                            <tr>
                                            
                                                <td>
                                                    <span class="fw-bold small">Robert Anderson</span>
                                                </td>
                                                <td>
                                                    <i class="icofont-check-circled text-success"></i>
                                                </td>
                                                <td>
                                                        <i class="icofont-check-circled text-success"></i>
                                                </td>
                                                <td>
                                                        <i class="icofont-check-circled text-success"></i>
                                                </td>
                                                <td>
                                                        <i class="icofont-check-circled text-success"></i>
                                                </td>
                                                <td>
                                                        <i class="icofont-check-circled text-success"></i>
                                                </td>
                                                <td>
                                                        <i class="icofont-check-circled text-success"></i>
                                                </td>
                                                <td>
                                                        <i class="icofont-check-circled text-success"></i>
                                                </td>
                                                <td>
                                                        <i class="icofont-check-circled text-success"></i>
                                                </td>
                                                <td>
                                                        <i class="icofont-check-circled text-success"></i>
                                                </td>
                                                <td>
                                                        <i class="icofont-check-circled text-success"></i>
                                                </td>
                                                <td>
                                                        <i class="icofont-check-circled text-success"></i>
                                                </td>
                                                <td>
                                                        <i class="icofont-check-circled text-success"></i>
                                                </td>
                                                <td>
                                                        <i class="icofont-check-circled text-success"></i>
                                                </td>
                                                <td>
                                                        <i class="icofont-check-circled text-success"></i>
                                                </td>
                                                <td>
                                                        <i class="icofont-check-circled text-success"></i>
                                                </td>
                                                <td>
                                                        <i class="icofont-check-circled text-success"></i>
                                                </td>
                                                <td>
                                                        <i class="icofont-check-circled text-success"></i>
                                                </td>
                                                <td>
                                                        <i class="icofont-check-circled text-success"></i>
                                                </td>
                                                <td>
                                                        <i class="icofont-check-circled text-success"></i>
                                                </td>
                                                <td>
                                                        <i class="icofont-check-circled text-success"></i>
                                                </td>
                                                <td>
                                                        <i class="icofont-check-circled text-success"></i>
                                                </td>
                                                <td>
                                                        <i class="icofont-check-circled text-success"></i>
                                                </td>
                                                <td>
                                                        <i class="icofont-check-circled text-success"></i>
                                                </td>
                                                <td>
                                                        <i class="icofont-check-circled text-success"></i>
                                                </td>
                                                <td>
                                                        <i class="icofont-check-circled text-success"></i>
                                                </td>
                                                <td>
                                                        <i class="icofont-check-circled text-success"></i>
                                                </td>
                                                <td>
                                                        <i class="icofont-check-circled text-success"></i>
                                                </td>
                                                <td>
                                                        <i class="icofont-check-circled text-success"></i>
                                                </td>
                                                <td>
                                                        <i class="icofont-check-circled text-success"></i>
                                                </td>
                                                <td>
                                                        <i class="icofont-check-circled text-success"></i>
                                                </td>
                                            
                                            </tr>
                                            <tr>
                                                
                                                <td>
                                                    <span class="fw-bold small">Ryan	Stewart</span>
                                                </td>
                                                <td>
                                                    <i class="icofont-check-circled text-success"></i>
                                                </td>
                                                <td>
                                                        <i class="icofont-check-circled text-success"></i>
                                                </td>
                                                <td>
                                                        <i class="icofont-check-circled text-success"></i>
                                                </td>
                                                <td>
                                                        <i class="icofont-check-circled text-success"></i>
                                                </td>
                                                <td>
                                                        <i class="icofont-check-circled text-success"></i>
                                                </td>
                                                <td>
                                                        <i class="icofont-check-circled text-success"></i>
                                                </td>
                                                <td>
                                                        <i class="icofont-check-circled text-success"></i>
                                                </td>
                                                <td>
                                                        <i class="icofont-check-circled text-success"></i>
                                                </td>
                                                <td>
                                                        <i class="icofont-check-circled text-success"></i>
                                                </td>
                                                <td>
                                                        <i class="icofont-check-circled text-success"></i>
                                                </td>
                                                <td>
                                                        <i class="icofont-check-circled text-success"></i>
                                                </td>
                                                <td>
                                                        <i class="icofont-check-circled text-success"></i>
                                                </td>
                                                <td>
                                                        <i class="icofont-check-circled text-success"></i>
                                                </td>
                                                <td>
                                                        <i class="icofont-check-circled text-success"></i>
                                                </td>
                                                <td>
                                                        <i class="icofont-check-circled text-success"></i>
                                                </td>
                                                <td>
                                                        <i class="icofont-check-circled text-success"></i>
                                                </td>
                                                <td>
                                                        <i class="icofont-check-circled text-success"></i>
                                                </td>
                                                <td>
                                                        <i class="icofont-check-circled text-success"></i>
                                                </td>
                                                <td>
                                                        <i class="icofont-check-circled text-success"></i>
                                                </td>
                                                <td>
                                                        <i class="icofont-check-circled text-success"></i>
                                                </td>
                                                <td>
                                                        <i class="icofont-check-circled text-success"></i>
                                                </td>
                                                <td>
                                                        <i class="icofont-check-circled text-success"></i>
                                                </td>
                                                <td>
                                                        <i class="icofont-check-circled text-success"></i>
                                                </td>
                                                <td>
                                                        <i class="icofont-check-circled text-success"></i>
                                                </td>
                                                <td>
                                                        <i class="icofont-check-circled text-success"></i>
                                                </td>
                                                <td>
                                                        <i class="icofont-check-circled text-success"></i>
                                                </td>
                                                <td>
                                                        <i class="icofont-check-circled text-success"></i>
                                                </td>
                                                <td>
                                                        <i class="icofont-check-circled text-success"></i>
                                                </td>
                                                <td>
                                                        <i class="icofont-wall-clock text-warning"></i>
                                                </td>
                                                <td>
                                                        <i class="icofont-wall-clock text-warning"></i>
                                                </td>
                                            
                                            </tr>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                  </div>
                </div><!-- Row End -->
            </div>
        </div>
        
        <!-- Modal Members-->
        <div class="modal fade" id="addUser" tabindex="-1" aria-labelledby="addUserLabel" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title  fw-bold" id="addUserLabel">Employee Invitation</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <div class="inviteby_email">
                        <div class="input-group mb-3">
                            <input type="email" class="form-control" placeholder="Email address" id="exampleInputEmail1" aria-describedby="exampleInputEmail1">
                            <button class="btn btn-dark" type="button" id="button-addon2">Sent</button>
                        </div>
                    </div>
                    <div class="members_list">
                        <h6 class="fw-bold ">Employee </h6>
                        <ul class="list-unstyled list-group list-group-custom list-group-flush mb-0">
                            <li class="list-group-item py-3 text-center text-md-start">
                                <div class="d-flex align-items-center flex-column flex-sm-column flex-md-column flex-lg-row">
                                    <div class="no-thumbnail mb-2 mb-md-0">
                                        <img class="avatar lg rounded-circle" src="assets/images/xs/avatar2.jpg" alt="">
                                    </div>
                                    <div class="flex-fill ms-3 text-truncate">
                                        <h6 class="mb-0  fw-bold">Rachel Carr(you)</h6>
                                        <span class="text-muted">rachel.carr@gmail.com</span>
                                    </div>
                                    <div class="members-action">
                                        <span class="members-role ">Admin</span>
                                        <div class="btn-group">
                                            <button type="button" class="btn bg-transparent dropdown-toggle" data-bs-toggle="dropdown" aria-expanded="false">
                                                <i class="icofont-ui-settings  fs-6"></i>
                                            </button>
                                            <ul class="dropdown-menu dropdown-menu-end">
                                              <li><a class="dropdown-item" href="#"><i class="icofont-ui-password fs-6 me-2"></i>ResetPassword</a></li>
                                              <li><a class="dropdown-item" href="#"><i class="icofont-chart-line fs-6 me-2"></i>ActivityReport</a></li>
                                            </ul>
                                        </div>
                                    </div>
                                </div>
                            </li>
                            <li class="list-group-item py-3 text-center text-md-start">
                                <div class="d-flex align-items-center flex-column flex-sm-column flex-md-column flex-lg-row">
                                    <div class="no-thumbnail mb-2 mb-md-0">
                                        <img class="avatar lg rounded-circle" src="assets/images/xs/avatar3.jpg" alt="">
                                    </div>
                                    <div class="flex-fill ms-3 text-truncate">
                                        <h6 class="mb-0  fw-bold">Lucas Baker<a href="#" class="link-secondary ms-2">(Resend invitation)</a></h6>
                                        <span class="text-muted">lucas.baker@gmail.com</span>
                                    </div>
                                    <div class="members-action">
                                        <div class="btn-group">
                                            <button type="button" class="btn bg-transparent dropdown-toggle" data-bs-toggle="dropdown" aria-expanded="false">
                                                Members
                                            </button>
                                            <ul class="dropdown-menu dropdown-menu-end">
                                              <li>
                                                  <a class="dropdown-item" href="#">
                                                    <i class="icofont-check-circled"></i>
                                                      
                                                    <span>All operations permission</span>
                                                   </a>
                                                   
                                                </li>
                                                <li>
                                                     <a class="dropdown-item" href="#">
                                                        <i class="fs-6 p-2 me-1"></i>
                                                           <span>Only Invite & manage team</span>
                                                       </a>
                                                </li>
                                            </ul>
                                        </div>
                                        <div class="btn-group">
                                            <button type="button" class="btn bg-transparent dropdown-toggle" data-bs-toggle="dropdown" aria-expanded="false">
                                                <i class="icofont-ui-settings  fs-6"></i>
                                            </button>
                                            <ul class="dropdown-menu dropdown-menu-end">
                                              <li><a class="dropdown-item" href="#"><i class="icofont-delete-alt fs-6 me-2"></i>Delete Member</a></li>
                                            </ul>
                                        </div>
                                    </div>
                                </div>
                            </li>
                            <li class="list-group-item py-3 text-center text-md-start">
                                <div class="d-flex align-items-center flex-column flex-sm-column flex-md-column flex-lg-row">
                                    <div class="no-thumbnail mb-2 mb-md-0">
                                        <img class="avatar lg rounded-circle" src="assets/images/xs/avatar8.jpg" alt="">
                                    </div>
                                    <div class="flex-fill ms-3 text-truncate">
                                        <h6 class="mb-0  fw-bold">Una Coleman</h6>
                                        <span class="text-muted">una.coleman@gmail.com</span>
                                    </div>
                                    <div class="members-action">
                                        <div class="btn-group">
                                            <button type="button" class="btn bg-transparent dropdown-toggle" data-bs-toggle="dropdown" aria-expanded="false">
                                                Members
                                            </button>
                                            <ul class="dropdown-menu dropdown-menu-end">
                                              <li>
                                                  <a class="dropdown-item" href="#">
                                                    <i class="icofont-check-circled"></i>
                                                      
                                                    <span>All operations permission</span>
                                                   </a>
                                                </li>
                                                <li>
                                                    <a class="dropdown-item" href="#">
                                                        <i class="fs-6 p-2 me-1"></i>
                                                           <span>Only Invite & manage team</span>
                                                       </a>
                                                </li>
                                            </ul>
                                        </div>
                                        <div class="btn-group">
                                            <div class="btn-group">
                                                <button type="button" class="btn bg-transparent dropdown-toggle" data-bs-toggle="dropdown" aria-expanded="false">
                                                    <i class="icofont-ui-settings  fs-6"></i>
                                                </button>
                                                <ul class="dropdown-menu dropdown-menu-end">
                                                  <li><a class="dropdown-item" href="#"><i class="icofont-ui-password fs-6 me-2"></i>ResetPassword</a></li>
                                                  <li><a class="dropdown-item" href="#"><i class="icofont-chart-line fs-6 me-2"></i>ActivityReport</a></li>
                                                  <li><a class="dropdown-item" href="#"><i class="icofont-delete-alt fs-6 me-2"></i>Suspend member</a></li>
                                                  <li><a class="dropdown-item" href="#"><i class="icofont-not-allowed fs-6 me-2"></i>Delete Member</a></li>
                                                </ul>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
            </div>
        </div>

        <!-- Edit Attendance-->
        <div class="modal fade" id="editattendance" tabindex="-1"  aria-hidden="true">
                <div class="modal-dialog modal-dialog-centered modal-md modal-dialog-scrollable">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title  fw-bold" id="editattendanceLabel"> Edit Attendance</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <div class="mb-3">
                            <label class="form-label">Select Person</label>
                            <select class="form-select">
                                <option selected>Joan Dyer</option>
                                <option value="1">Ryan Randall</option>
                                <option value="2">Phil Glover</option>
                                <option value="3">Victor Rampling</option>
                                <option value="4">Sally Graham</option>
                                <option value="5">Robert Anderson</option>
                                <option value="6">Ryan Stewart</option>
                            </select>
                        </div>
                        <div class="deadline-form">
                            <form>
                                <div class="row g-3 mb-3">
                                  <div class="col-sm-12">
                                    <label for="datepickerdedass" class="form-label">Select Date</label>
                                    <input type="date" class="form-control" id="datepickerdedass">
                                  </div>
                                  <div class="col-sm-12">
                                        <label class="form-label">Attendance Type</label>
                                        <select class="form-select">
                                            <option selected>Full Day Present</option>
                                            <option value="1">Half Day Present</option>
                                            <option value="2">Full Day Absence</option>
                                        </select>
                                  </div>
                                </div>
                            </form>
                        </div>
                        <div class="mb-3">
                            <label for="exampleFormControlTextarea78d" class="form-label">Edit Reason</label>
                            <textarea class="form-control" id="exampleFormControlTextarea78d" rows="3"></textarea>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Done</button>
                        <button type="submit" class="btn btn-primary">Save</button>
                    </div>
                </div>
                </div>
        </div>

    </div>
@endsection

