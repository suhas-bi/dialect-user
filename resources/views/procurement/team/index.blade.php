@extends('procurement.layouts.app')
@section('content')
    <!-- Header Starts -->
    @include('procurement.layouts.header')
    <!-- Header Ends -->


    <!-- Main Content Start -->

    <!-- Team List Section Start-->
    <section class="container-fluid pleft-56">
        <div class="row team-accnt-tab  b-bottom">
            <div class="col-md-12">

                <div class="d-flex w-100 justify-content-between">
                    <!-- Tabs navs -->
                    <ul class="nav nav-tabs tab mb-2" role="tablist">
                    <li class="nav-item">
                            <a class="nav-link tablinks3" href="{{ route('procurement.teamAccount.approval') }}">Approvals</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link tablinks3 active" href="{{ route('procurement.teamAccount.settings') }}">Team Settings</a>
                        </li>
                    </ul>
                    <!-- Tabs navs -->
                </div>
            </div>
        </div>
    <!-- Team List Section End -->

    <!-- Team Content Section Start -->
    <div class="tabcontent3" id="received">
            <div class="row">
                <div class="col-md-12">
                    <div class="team-settings-main">
                        <table class="table team-settings">
                            <thead>
                                <tr>
                                    <th scope="col">Member ID</th>
                                    <th scope="col">Name<i class="ic_sort"><img src="{{ asset('assets/images/ic_sort.svg') }}"></i></th>
                                    <th scope="col">Email<i class="ic_sort"><img src="{{ asset('assets/images/ic_sort.svg') }}"></i></th>
                                    <th scope="col">Member since</th>
                                    <th scope="col" class="text-center">Enquiry Permission</th>
                                    <th scope="col" class="text-center">Account Status</th>
                                    <th scope="col" class="text-center">Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td scope="row"><a href="#">0051</a></td>
                                    <td><a href="#">John George</a> </td>
                                    <td><a href="#">john.george@images.com</a></td>
                                    <td>27 Jan, 2022</td>
                                    <td class="text-center text-success">Yes</td>
                                    <td class="text-center text-success">Enabled</td>
                                    <td class="text-center"><a href="#" class="team-edit"><img
                                                src="{{ asset('assets/images/team-edit-ico.svg') }}"></a></td>
                                </tr>
                                <tr class="editing">
                                    <td scope="row"><a href="#">0051</a></td>
                                    <td><a href="#">John George</a> </td>
                                    <td><a href="#">john.george@images.com</a></td>
                                    <td>27 Jan, 2022</td>
                                    <td class="text-center text-success reduce-padd-td">
                                        <div class="select-drop2">
                                            <select id="standard-select">
                                                <option value="Option 1">Yes</option>
                                                <option value="Option 2">No</option>
                                            </select>
                                        </div>
                                    </td>
                                    <td class="text-center text-success reduce-padd-td ">
                                        <div class="select-drop2">
                                            <select id="standard-select">
                                                <option value="Option 1">Enable</option>
                                                <option value="Option 2">Disable</option>
                                            </select>
                                        </div>
                                    </td>
                                    <td class="text-center"><a href="#" class="team-edit"><img
                                                src="{{ asset('assets/images/team-edit-ico.svg') }}"></a></td>
                                </tr>
                                <tr>
                                    <td scope="row"><a href="#">0051</a></td>
                                    <td><a href="#">John George</a> </td>
                                    <td><a href="#">john.george@images.com</a></td>
                                    <td>27 Jan, 2022</td>
                                    <td class="text-center text-success">Yes</td>
                                    <td class="text-center text-success">Enabled</td>
                                    <td class="text-center"><a href="#" class="team-edit"><img
                                                src="{{ asset('assets/images/team-edit-ico.svg') }}"></a></td>
                                </tr>
                                <tr class="disabled">
                                    <td scope="row"><a href="#">0051</a></td>
                                    <td><a href="#">John George</a> </td>
                                    <td><a href="#">john.george@images.com</a></td>
                                    <td>27 Jan, 2022</td>
                                    <td class="text-center text-success">Yes</td>
                                    <td class="text-center text-danger">Disabled</td>
                                    <td class="text-center"><a href="#" class="team-edit"><img
                                                src="{{ asset('assets/images/team-edit-ico.svg') }}"></a></td>
                                </tr>
                                <tr>
                                    <td scope="row"><a href="#">0051</a></td>
                                    <td><a href="#">John George</a> </td>
                                    <td><a href="#">john.george@images.com</a></td>
                                    <td>27 Jan, 2022</td>
                                    <td class="text-center text-success">Yes</td>
                                    <td class="text-center text-success">Enabled</td>
                                    <td class="text-center"><a href="#" class="team-edit"><img
                                                src="{{ asset('assets/images/team-edit-ico.svg') }}"></a></td>
                                </tr>
                                <tr>
                                    <td scope="row"><a href="#">0051</a></td>
                                    <td><a href="#">John George</a> </td>
                                    <td><a href="#">john.george@images.com</a></td>
                                    <td>27 Jan, 2022</td>
                                    <td class="text-center text-danger">No</td>
                                    <td class="text-center text-success">Enabled</td>
                                    <td class="text-center"><a href="#" class="team-edit"><img
                                                src="{{ asset('assets/images/team-edit-ico.svg') }}"></a></td>
                                </tr>
                                <tr>
                                    <td scope="row"><a href="#">0051</a></td>
                                    <td><a href="#">John George</a> </td>
                                    <td><a href="#">john.george@images.com</a></td>
                                    <td>27 Jan, 2022</td>
                                    <td class="text-center text-success">Yes</td>
                                    <td class="text-center text-success">Enabled</td>
                                    <td class="text-center"><a href="#" class="team-edit"><img
                                                src="{{ asset('assets/images/team-edit-ico.svg') }}"></a></td>
                                </tr>
                                <tr>
                                    <td scope="row"><a href="#">0051</a></td>
                                    <td><a href="#">John George</a> </td>
                                    <td><a href="#">john.george@images.com</a></td>
                                    <td>27 Jan, 2022</td>
                                    <td class="text-center text-success">Yes</td>
                                    <td class="text-center text-success">Enabled</td>
                                    <td class="text-center"><a href="#" class="team-edit"><img
                                                src="{{ asset('assets/images/team-edit-ico.svg') }}"></a></td>
                                </tr>

                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>

<!-- Team Content Section End -->

</section>
<!-- Main Content Ends -->

@push('scripts')

@endpush
 
@endsection    