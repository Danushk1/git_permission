
                       
<!doctype html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>Laravel CRUD With Multiple Image Upload</title>

      <!-- Bootstrap CSS -->
     <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-BmbxuPwQa2lc/FVzBcNJ7UAyJxM6wuqIj61tLrc4wSX0szH/Ev+nYRRuWlolflfl" crossorigin="anonymous">
     <!-- Font-awesome -->
     <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">

    </head>
    <body>

        <div class="container" style="margin-top: 50px;">
            <div class="row">


                <div class="col-lg-3">
                    <p>Cover:</p>
                    
                  
                    </form>
                    <img src="/cover/{{ $posts->cover }}" class="img-responsive" style="max-height: 100px; max-width: 100px;" alt="" srcset="">
                    <br>



                    

                </div>


                <div class="col-lg-6"  >
                    <h3 class="text-center text-danger"><b>Udate Post</b> </h3>
				    <div class="form-group">
                        <form action="/update/{{ $posts->id }}" method="post" enctype="multipart/form-data">
                            @csrf
                            @method("put")
                         <input onmouseover="bt();" id="h1" type="text" name="title" class="form-control m-2" placeholder="title" value="{{ $posts->title }}">
        				 <input onmouseover="b1();" id="h2" type="text" name="author" class="form-control m-2" placeholder="author" value="{{ $posts->author }}">
                         <Textarea onmouseover="b2();" id="h3" name="body" cols="20" rows="4" class="form-control m-2" placeholder="body">{{ $posts->body }}</Textarea>
                         <label class="m-2">Cover Image</label>
                         <input type="file" id="input-file-now-custom-3" class="form-control m-2" name="cover">

                         

                        <button type="submit" class="btn btn-danger mt-3 ">Submit</button>
                        </form>
                   </div>
                </div>
            </div>



         </body>
</html>
<script src="https://cdn.ckeditor.com/ckeditor5/36.0.1/classic/ckeditor.js"></script>
<script src="{{asset('ckeditor/ckeditor.js')}"></script>
<script>
   /* // Turn off automatic editor creation first.
    CKEDITOR.disableAutoInline = true;
    CKEDITOR.inline( 'h1' );*/
     function bt (){
        ClassicEditor
        .create( document.querySelector( '#h1' ) )
        .catch( error => {
            console.error( error );
        } );
    }
    function b1 (){
        ClassicEditor
        .create( document.querySelector( '#h2' ) )
        .catch( error => {
            console.error( error );
        } );
    }
    function b2 (){
        ClassicEditor
        .create( document.querySelector( '#h3' ) )
        .catch( error => {
            console.error( error );
        } );
    }
   
       
    
</script>
</script>





