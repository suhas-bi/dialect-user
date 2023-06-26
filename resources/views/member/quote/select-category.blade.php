@extends('member.layouts.app')
@section('content')
<header class="navbar">
        <div class="header-signup container-fluid navbar-default d-flex">
            <div class="container">
                <div class="logo">
                    <a href="{{ route('member.dashboard') }}"><img src="{{ asset('assets/images/logo-signup.png') }}" alt="XCHANGE"></a>
                </div>
            </div>
        </div>
    </header>

    <div class="container-fluid reg-bg2">
    <!-- Main Content -->
    <section class="container"> 
            <div class="row registration">
                <h1>Generate Quote</h1>
                <section class="reg-content-main">
                    <div class="quote-navigation-main">
                        <ul class="d-flex align-items-center">
                            <li class="d-flex align-items-center active-first">
                                <small
                                    class="reg-nav-count-active d-flex align-items-center justify-content-center">1</small>
                                Add Business Category
                            </li>
                            <li class="d-flex align-items-center completion">
                                <small class="reg-nav-count d-flex align-items-center justify-content-center">2</small>
                                Generate Quote
                            </li>

                        </ul>

                    </div>

                    <section class="reg-content-sec">
                        <div class="signup-fields">
                            <div class="row">
                                <div class="col-md-8">
                                    <div class="row">
                                        <div class="col-md-12">
                                            <input id="search" type="text" placeholder="Please Choose Category" class="form-control choose-category">
                                        </div>
                                        <div class="col-md-12">
                                            <ul class="alphabets d-flex flex-wrap align-items-center">
                                                <li><a href="#" class="alpha" data-alpha="All">All</a></li>
                                                <li><a href="#" class="alpha" data-alpha="A">A</a></li>
                                                <li><a href="#" class="alpha" data-alpha="B">B</a></li>
                                                <li><a href="#" class="alpha" data-alpha="C">C</a></li>
                                                <li><a href="#" class="alpha" data-alpha="D">D</a></li>
                                                <li><a href="#" class="alpha" data-alpha="E">E</a></li>
                                                <li><a href="#" class="alpha" data-alpha="F">F</a></li>
                                                <li><a href="#" class="alpha" data-alpha="G">G</a></li>
                                                <li><a href="#" class="alpha" data-alpha="H">H</a></li>
                                                <li><a href="#" class="alpha" data-alpha="I">I</a></li>
                                                <li><a href="#" class="alpha" data-alpha="J">J</a></li>
                                                <li><a href="#" class="alpha" data-alpha="K">K</a></li>
                                                <li><a href="#" class="alpha" data-alpha="L">L</a></li>
                                                <li><a href="#" class="alpha" data-alpha="M">M</a></li>
                                                <li><a href="#" class="alpha" data-alpha="N">N</a></li>
                                                <li><a href="#" class="alpha" data-alpha="O">O</a></li>
                                                <li><a href="#" class="alpha" data-alpha="P">P</a></li>
                                                <li><a href="#" class="alpha" data-alpha="Q">Q</a></li>
                                                <li><a href="#" class="alpha" data-alpha="R">R</a></li>
                                                <li><a href="#" class="alpha" data-alpha="S">S</a></li>
                                                <li><a href="#" class="alpha" data-alpha="T">T</a></li>
                                                <li><a href="#" class="alpha" data-alpha="U">U</a></li>
                                                <li><a href="#" class="alpha" data-alpha="V">V</a></li>
                                                <li><a href="#" class="alpha" data-alpha="W">W</a></li>
                                                <li><a href="#" class="alpha" data-alpha="X">X</a></li>
                                                <li><a href="#" class="alpha" data-alpha="Y">Y</a></li>
                                                <li><a href="#" class="alpha" data-alpha="Z">Z</a></li>
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
                                    <div class="airconditioning subcategory-section">
                                        <h1 id="current-category"></h1>
                                        <ul id="subcategory-list" class="right-categories-list">

                                        </ul>
                                    </div>
                                </div>

                            </div>
                        </div>

                        <div class="d-flex justify-content-end">

                            <!-- <div class="form-group proceed-btn">
                                <input type="submit" value="Proceed" class="btn btn-secondary"
                                    onclick="window.location.href = 'generate-quote.html';">
                            </div> -->
                        </div>
                    </section>

                </section>
            </div>
        </section>
    <!-- End Main Content -->
</div>
@push('scripts')
<script src="https://cdnjs.cloudflare.com/ajax/libs/axios/1.4.0/axios.min.js" integrity="sha512-uMtXmF28A2Ab/JJO2t/vYhlaa/3ahUOgj1Zf27M5rOo8/+fcTUVH0/E0ll68njmjrLqOBjXM3V9NiPFL5ywWPQ==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
<script src="{{ asset('assets/js/bootstrap.bundle.min.js') }}"></script>
<script>
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });

    $(document).ready(function() {
        $('.subcategory-section').hide();
        $('.loader').hide();
        var company = JSON.parse(localStorage.getItem('company'));
   
        $(document).on('click', '.category', function(e){
            e.preventDefault(); 
            var id = $(this).data('id');
            var action = '/sign-up/business-category/subcategory';
            var data = { 'id' : id }
            axios.post(action,data)
            .then((response) => {
                // Handle success response
                console.log(response.data);
                if(response.data.status === true){
                    $('.subcategory-section').show();
                    $('#subcategory-list').empty();
                    $('#current-category').text(response.data.category.name);
                    if(response.data.data.length){
                        $.each(response.data.data, function(key, val) {
                            var li = `<li><a href="#" class="subcategory" data-id="`+val.id+`">`+val.name+`</a></li>`;
                            $('#subcategory-list').append(li);
                        });
                    }
                    else{
                        var li = `<li><img src="{{ asset('assets/images/no-data.png') }}" width="100%" alt=""></li>
                                    <li class="text-center">No Subcategories found for <br><h3>`+response.data.category.name+`</h3></li>`;
                        $('#subcategory-list').append(li);
                    }
                }
            })
            .catch((error) => {
                // Handle error response
                console.log(error);
            });
        });
    });

    $('.alpha').click(function(e) {
        e.preventDefault(); 
        var alpha = $(this).data('alpha');
        var action = "{{ route('sign-up.business-category.alpha') }}";
        axios.post(action,{alpha:alpha})
        .then((response) => {
            $('#category-list').empty();
            response.data.categories.forEach((item, i) => {
                $('#category-list').append('<li><a href="#" class="category" data-id="'+item.id+'">'+item.name+'</a></li>')
            });
        })
        .catch((error) => {
            // Handle error response
            //console.log(error);
        });
    });

    $(document).on('click', '.subcategory', function (e) {
        e.preventDefault();
        var activityId = $(this).data('id');
        var action = "{{ route('member.quote.saveCategory') }}";
        var data = { 'id' : activityId }
        axios.post(action,data)
        .then((response) => {
            // Handle success response
            //console.log(response.data.message);
            if(response.data.status === true){
                let id = response.data.data.id;
                window.location.href = '/member/quote/compose/'+id;
            }
            else{
                Swal.fire('Warning!', 'Something went wrong. Try Again!', 'warning');
            }
        })
        .catch((error) => {
            // Handle error response
            //console.log(error.response.data.message)
            Swal.fire('Warning!', error.response.data.message, 'warning');
        });
    });

    $('#search').on('keyup', (e) => {
        $('.subcategory-section').hide();
        $('#category-list').empty();
        let data = { 'search' : e.target.value }
        var searchAction = "{{ route('sign-up.business-category.search') }}";
        axios.post(searchAction, data)
        .then((response) => {
            // Handle success response
            $('#category-list').empty();
            response.data.forEach((item, i) => {
                $('#category-list').append('<li><a href="#" class="subcategory" data-id="'+item.id+'">'+item.name+'</a></li>')
            });
        })
        .catch((error) => {
            // Handle error response
            
        });
    })

</script>
@endpush  
 
@endsection    