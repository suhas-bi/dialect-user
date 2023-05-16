@extends('layouts.app')
@section('content')
    <!-- Header Starts -->
    @include('initiator.layouts.header')
    <!-- Header Ends -->

    <!-- Busienss Category Section Starts -->
    <div class="container-fluid reg-bg2">
        <section class="container">
            <div class="row registration">
                <h1>Registration</h1>
                <section class="reg-content-main">
                    <div class="reg-navigation-main">
                        <ul class="d-flex align-items-center">

                            <li class="d-flex align-items-center active-first-noradius">
                                <small class="reg-nav-count-active d-flex align-items-center justify-content-center">1</small>
                                Signup
                            </li>

                            <li class="d-flex align-items-center active-noradius">
                                <small class="reg-nav-count-active d-flex align-items-center justify-content-center">2</small>
                                Company<br>Information
                            </li>

                            <li class="d-flex align-items-center active">
                                <small class="reg-nav-count-active d-flex align-items-center justify-content-center">3</small>
                                Business<br>Category
                            </li>
                            <li class="d-flex align-items-center">
                                <small class="reg-nav-count d-flex align-items-center justify-content-center">4</small>
                                Declaration
                            </li>
                            <li class="d-flex align-items-center review">
                                <span class="verticalLine"></span>
                                <small class="round"></small>
                                Review<br>Verification
                            </li>
                            <li class="d-flex align-items-center">
                                <small class="reg-nav-count d-flex align-items-center justify-content-center">5</small>
                                Account<br>Creation
                            </li>
                            <li class="d-flex align-items-center completion">
                                <small class="reg-nav-count d-flex align-items-center justify-content-center">6</small>
                                Completion
                            </li>

                        </ul>
                        
                    </div>
                    
                    <section class="reg-content-sec">
                        <div class="signup-fields">
                            <div class="row mb-3">
                                <div class="col-md-12 d-flex justify-content-between justify-content-center">
                                    <h1>Add Business Category</h1>
                                    <div class="selected-basket d-flex">
                                        <span>Selected</span>
                                        <a href="#" class="basket-ico" data-toggle="modal" data-target="#selected-categories">
                                            <small class="basket-count d-flex align-items-center justify-content-center">0</small>
                                        </a>
                                    </div>
                                </div>
                            </div>
                        
                            <div class="row">
                                <div class="col-md-8">
                                    <div class="row">
                                        <div class="col-md-12">
                                            <input type="text" placeholder="Please Choose Category" class="form-control choose-category">
                                        </div>
                                        <div class="col-md-12">
                                           <ul class="alphabets d-flex flex-wrap align-items-center">
                                                <li><a href="#" data-alpha="A">A</a></li>
                                                <li><a href="#" data-alpha="B">B</a></li>
                                                <li><a href="#" data-alpha="C">C</a></li>
                                                <li><a href="#" data-alpha="D">D</a></li>
                                                <li><a href="#" data-alpha="E">E</a></li>
                                                <li><a href="#">F</a></li>
                                                <li><a href="#">G</a></li>
                                                <li><a href="#">H</a></li>
                                                <li><a href="#">I</a></li>
                                                <li><a href="#">J</a></li>
                                                <li><a href="#">K</a></li>
                                                <li><a href="#">L</a></li>
                                                <li><a href="#">M</a></li>
                                                <li><a href="#">N</a></li>
                                                <li><a href="#">O</a></li>
                                                <li><a href="#">P</a></li>
                                                <li><a href="#">Q</a></li>
                                                <li><a href="#">R</a></li>
                                                <li><a href="#">S</a></li>
                                                <li><a href="#">T</a></li>
                                                <li><a href="#">U</a></li>
                                                <li><a href="#">V</a></li>
                                                <li><a href="#">W</a></li>
                                                <li><a href="#">X</a></li>
                                                <li><a href="#">Y</a></li>
                                                <li><a href="#">Z</a></li>
                                           </ul>
                                        </div>
                                    </div>

                                    <div class="row">
                                        <div class="col-md-12">
                                           <ul id="category-list" class="categories-list d-flex flex-wrap align-items-center">
                                            @foreach($categories as $key => $category)
                                                <li><a href="#" class="category" data-id="{{ $category->id }}">{{ $category->name }}</a></li>
                                            @endforeach    
                                           </ul>
                                        </div>
                                    </div>
                                    
                                    </div>
                                
                                <div class="col-md-4">
                                    <div class="airconditioning">
                                        <h1 id="current-category"></h1>
                                        <ul id="subcategory-list" class="right-categories-list">
                                            
                                       </ul>
                                    </div>
                                </div>

                            </div>
                        </div>

                        <div class="d-flex justify-content-between justify-content-center">
                            <div class="form-group proceed-btn">
                                <input type="button" value="Back" class="btn btn-third" onclick="window.location.href = 'company-info';">
                            </div>

                            <div class="form-group proceed-btn">
                                <input type="submit" value="Proceed" class="btn btn-secondary" onclick="window.location.href = 'declaration';">
                            </div>
                        </div>
                    </section>

                </section>
            </div>
        </section>
    </div>
    <!-- Business Category Section Ends -->

    <!-- Modal Starts-->
    <div class="modal fade" id="selected-categories" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
        <div class="modal-dialog modal-lg modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h1 class="modal-title" id="exampleModalLongTitle">Selected Categories</h1>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <div class="business-catg-main">
                        <ul id="selected-subcategory" class="d-flex flex-wrap">
                            
                        </ul>
                    </div>
                </div>
                <div class="modal-footer">
                    <div class="d-flex justify-content-between justify-content-center">
                        <div class="form-group proceed-btn">
                            <button type="button" class="btn btn-third" data-dismiss="modal">Cancel</button>
                        </div>

                        <div class="form-group proceed-btn">
                            <input type="button" value="OK" class="btn btn-secondary" onclick="window.location.href = 'declaration';">
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
  <!-- Model Ends -->
@push('scripts')
<script src="{{ asset('assets/js/bootstrap.bundle.min.js') }}"></script>
<script>
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });

    $(document).ready(function() {
        selectedSubCategory();
        $('.loader').hide();
        var company = JSON.parse(localStorage.getItem('company'));
        $('.category').click(function(e) {
            e.preventDefault(); 
            var id = $(this).data('id');
            var action = '/sign-up/business-category/subcategory';
            $.ajax({
                url: action,
                type: "POST",
                data: { id : id},
                beforeSend: function() {
                    $('.loader').show();
                },
                success: function(data) {
                     if(data.status === true){
                        $('#subcategory-list').empty();
                        $('#current-category').text(data.category.name);
                        if(data.data.length){
                            $.each(data.data, function(key, val) {
                                var li = `<li><a href="#" class="subcategory" data-id="`+val.id+`">`+val.name+`</a></li>`;
                                $('#subcategory-list').append(li);
                            });
                        }
                        else{
                            var li = `<li><img src="{{ asset('assets/images/no-data.png') }}" width="100%" alt=""></li>
                                      <li class="text-center">No Subcategories found for <br><h3>`+data.category.name+`</h3></li>`;
                            $('#subcategory-list').append(li);
                        }
                     }
                },
                error: function(xhr, status, error) {
                     var response = JSON.parse(xhr.responseText);
                     console.log(response);
                    // if (response.errors) {
                    //     $.each(response.errors, function(field, errors) {
                    //         if(field === 'mobile'){
                    //             var minput = $('input[name="' + field + '"]');
                    //             var mfeedback = minput.parent().next('.invalid-msg2');
                    //             mfeedback.html(errors[0]).show();
                    //         }
                    //         var input = $('input[name="' + field + '"]');
                    //         input.addClass('red-border');
                    //         var feedback = input.siblings('.invalid-msg2');
                    //         feedback.text(errors[0]).show();
                    //     });
                    // }
                },
                complete: function(data) {
                    $('.loader').hide();
                }
            });
        });
    });

    function selectedSubCategory(){
        var action = '/sign-up/business-category/selected';
        $.ajax({
            url: action,
            type: "POST",
            beforeSend: function() {
                $('.loader').show();
            },
            success: function(data) {
                    if(data.status === true){
                    $('#selected-subcategory').empty();
                    if(data.data.length){
                        $('.basket-count').text(data.data.length);
                        $.each(data.data, function(key, val) {
                            
                            var li = `<li class="d-flex justify-content-between justify-content-center">`
                                             + val.subcategory.name +
                                             `<a href="#" data-id="`+val.id+`" class="categ-delete"></a>
                                      </li>`;
                            $('#selected-subcategory').append(li);
                        });
                    }
                    else{
                        var li = `<li class="text-center"><h3>No Data Found!</h3></li>`;
                        $('#selected-subcategory').append(li);
                    }
                    }
            },
            error: function(xhr, status, error) {
                    var response = JSON.parse(xhr.responseText);
                   
                // if (response.errors) {
                //     $.each(response.errors, function(field, errors) {
                //         if(field === 'mobile'){
                //             var minput = $('input[name="' + field + '"]');
                //             var mfeedback = minput.parent().next('.invalid-msg2');
                //             mfeedback.html(errors[0]).show();
                //         }
                //         var input = $('input[name="' + field + '"]');
                //         input.addClass('red-border');
                //         var feedback = input.siblings('.invalid-msg2');
                //         feedback.text(errors[0]).show();
                //     });
                // }
            },
            complete: function(data) {
                $('.loader').hide();
            }
        });
    }


    $(document).on('click', '.categ-delete', function (e) {
        e.preventDefault();
        var activityId = $(this).data('id');

        Swal.fire({
            title: 'Are you sure?',
            text: 'Category will be deleted from the list!',
            icon: 'warning',
            showCancelButton: true,
            confirmButtonText: 'Yes, delete it!',
            cancelButtonText: 'Cancel'
        }).then((result) => {
            if (result.isConfirmed) {
                // Ajax request for deletion
                $.ajax({
                    url: '/sign-up/business-category/delete/' + activityId,
                    type: 'DELETE',
                    data: {
                        "_token": "{{ csrf_token() }}"
                    },
                    success: function (response) {
                        // Handle success response
                        Swal.fire('Deleted!', 'The item has been deleted.', 'success');
                        // Perform any additional actions as needed
                        selectedSubCategory();
                    },
                    error: function (xhr, status, error) {
                        // Handle error response
                        Swal.fire('Error!', 'An error occurred while deleting the item.', 'error');
                    }
                });
            }
        });
    });

    $(document).on('click', '.subcategory', function (e) {
        e.preventDefault();
        var activityId = $(this).data('id');
        $.ajax({
            url: '/sign-up/business-category/add',
            type: 'POST',
            data: {
                id:activityId
            },
            success: function (response) {
                if(response.status === true){
                    Swal.fire({
                        toast: true,
                        icon: 'success',
                        title: response.message,
                        animation: false,
                        position: 'top',
                        showConfirmButton: false,
                        timer: 3000,
                        timerProgressBar: true,
                        didOpen: (toast) => {
                            toast.addEventListener('mouseenter', Swal.stopTimer)
                            toast.addEventListener('mouseleave', Swal.resumeTimer)
                        }
                    })
                    selectedSubCategory();
                }
            },
            error: function (xhr, status, error) {
                var response = JSON.parse(xhr.responseText);
                if(response.status === false){
                    Swal.fire({
                        toast: true,
                        icon: 'warning',
                        title: response.message,
                        animation: false,
                        position: 'top',
                        showConfirmButton: false,
                        timer: 3000,
                        timerProgressBar: true,
                        didOpen: (toast) => {
                            toast.addEventListener('mouseenter', Swal.stopTimer)
                            toast.addEventListener('mouseleave', Swal.resumeTimer)
                        }
                    })
                    selectedSubCategory();
                }
            }
        });
    });

</script>
@endpush  
@endsection