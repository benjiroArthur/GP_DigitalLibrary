@extends('layouts.app')

@section('content')
    <div class="row mb-2">
        <div class="col-sm-12 col-lg-12">
            <div class="page-title-box">
                <ol class="breadcrumb hide-phone float-right p-0 m-0">
                    <li class="breadcrumb-item">
                        <a href="#">GP Digital Library</a>
                    </li>
                    <li class="breadcrumb-item">
                        <a href="#">Books</a>
                    </li>
                    <li class="breadcrumb-item active">
                        All Books
                    </li>
                </ol>

            </div>
        </div>
    </div>

    <div class="row">
        <div class="col-12">
            <div class="card-box">
                <div class="row pr-5 pl-5 justify-content-center">
                    @if(count($categories) > 0)
                        @foreach($categories as $category)
                            <div class="col-sm-6 col-lg-2">
                                <a class="text-decoration-none" onclick="getGroup({{$category->id}});" id="category" href="#">
                                    <div class="card mt-2 mr-1 text-center" style="color: #09123e; border:1px solid #09123e">
                                        <div class="card-img">
                                            <img class="img-thumbnail" src="{{$category->cover_image}}" alt="">
                                        </div>
                                        {{$category->name}}
                                    </div>
                                </a>
                            </div>
                        @endforeach
                    @endif
                </div>

                <div class="row pr-5 pl-5 justify-content-center mt-2 group-div">



                </div>
                <hr>
                <div class="row pr-5 pl-5 justify-content-center mt-2 books-div">

                </div>


            </div>
        </div>
    </div>

    @section('script')
        <script>

        function showSpinner(id,spinnerId)
        {
            $(id).html('<div class="spinner-border" role="status" id="' + spinnerId +'" style="color: #09123e">\n' +
                '                        <span class="sr-only">Loading...</span>\n' +
                '                    </div>');
        }
        function hideSpinner(spinnerId)
        {
            $(spinnerId).remove();
        }

            function getGroup(catId)
            {
                showSpinner(".group-div", '222');

                $.ajax({
                    type:"GET",
                    url:"{{url('/category-group/')}}/"+catId,
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="_token"]').attr('content')
                    },
                    cache:false,
                    success:function(data){
                        var len = data.length;
                        if($(".group-div").hasClass("hidden"))
                        {
                            $(".group-div").removeClass("hidden")
                        }
                        $(".books-div").empty();
                        $(".group-div").empty();


                        for(var i = 0; i < len; i++)
                        {
                            var id = data[i]['id'];
                            var name = data[i]['name'];

                            $(".group-div").append('<div class="col-sm-6 col-lg-2">\n' +
                                "                                <a class=\"text-decoration-none\" onclick=\"getBooks("+id+");\" id=\"category\" href=\"#\">\n" +
                                "                                    <div class=\"card mt-2 mr-1 text-center\" style=\"color: #09123e; border:1px solid #09123e\">\n" +
                                "                                        <div class=\"card-img\">\n" +
                                "                                            <span class=\"mdi mdi-book-multiple\"></span>\n" +
                                "                                        </div>\n" +
                                "                                        <div class=\"groups\">\n" +
                                "\n" +name+
                                "                                        </div>\n" +
                                "                                    </div>\n" +
                                "                                </a>\n" +
                                "                            </div>");
                        }
                    }
                });
            }


            function showBook(bookid)
            {
                window.location.href = '{{url("/book/")}}/'+bookid;

            }

            function getBooks(groupId)
            {
                showSpinner(".books-div", '223');

                $.ajax({
                    type:"GET",
                    url:"{{url('/group-books/')}}/"+groupId,
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="_token"]').attr('content')
                    },
                    cache:false,
                    success:function(data){
                        var len = data.length;

                        $(".books-div").empty();


                        for(var i = 0; i < len; i++)
                        {
                            var id = data[i]['id'];
                            var title = data[i]['title'];
                            var cover = data[i]['cover_image']

                            $(".books-div").html('<div class="col-sm-12 col-lg-2">\n' +
                                '                        <a class="text-decoration-none" onclick="showBook(' + id + ');" id="category" href="#">\n' +
                                '                            <div class="card mt-2 mr-1 text-center" style="color: #09123e; border:1px solid #09123e">\n' +
                                '                                <div class="card-img">\n' +
                                '                                    <img class="img-thumbnail" src="'+ cover +'" alt="">\n' +
                                '                                </div>\n' +
                                '                                ' +   title + '\n' +
                                '                            </div>\n' +
                                '                        </a>\n' +
                                '                    </div>');
                        }
                    }
                });
            }

        </script>
    @endsection

@endsection
