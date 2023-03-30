<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <meta name="_token" content="{{csrf_token()}}" />
    <link rel="stylesheet" href="{{asset('css/app.css')}}">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.0.0-beta.3/css/bootstrap.css" rel="stylesheet">  
    <script src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.0.0-beta.3/js/bootstrap.min.js"></script> 
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.0/jquery.js"></script> 
  </head>
  <body>

    <div class="container">
    <!-- Trigger the modal with a button -->
    <button type="button" class="btn btn-info btn-lg" data-toggle="modal" data-target="#myModal" id="open">Open Modal</button>
        <form method="post" action="{{url('chempionleague')}}" id="form">
            @csrf
            <!-- Modal -->
            <div class="modal" tabindex="-1" role="dialog" id="myModal">
                <div class="modal-dialog" role="document">
                    <div class="modal-content">
                        <div class="alert alert-danger" style="display:none"></div>
                        <div class="modal-header"> 
                            <h5 class="modal-title">Edit Products</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                            </button>
                        </div>

                        <div class="modal-body">
                            <div class="row">
                                <label for="Name" class="col-sm-3">Product Name</label>
                                <div class="col-sm-9">
                                  <input type="text" class="form-control" name="name" id="name" value="" placeholder="Product Name">
                                </div>
                            </div>

                            <div class="row mb-3">
                                <label for="Club" class="col-sm-3">Manufacturers</label>
                                <div class="col-sm-9">
                                  <input type="text" class="form-control" name="club" id="club" value="" placeholder="Manufacturers">
                                </div>
                            </div>

                            <div class="row mb-3">
                                <label for="Country" class="col-sm-3">Strength</label>
                                <div class="col-sm-9">
                                  <input type="number" class="form-control" name="country" id="country" value="" placeholder="Strength">
                                </div>
                            </div>

                            <div class="row mb-3">
                                <label for="Country" class="col-sm-3">Unit of Measure</label>
                                <div class="col-sm-9">
                                  <input type="text" class="form-control" name="country" id="country" value="" placeholder="Unit of Measure">
                                </div>
                            </div>

                            <div class="row mb-3">
                                <label for="Country" class="col-sm-3">Package Size</label>
                                <div class="col-sm-9">
                                  <input type="text" class="form-control" name="country" id="country" value="" placeholder="Package Size">
                                </div>
                            </div>

                            <div class="row mb-3">
                                <label for="Country" class="col-sm-3">Package Quantity</label>
                                <div class="col-sm-9">
                                  <input type="text" class="form-control" name="country" id="country" value="" placeholder="Package Quantity">
                                </div>
                            </div>

                            <div class="row mb-3">
                                <label for="Country" class="col-sm-3">Items in Box</label>
                                <div class="col-sm-9">
                                  <input type="text" class="form-control" name="country" id="country" value="" placeholder="Items in Box">
                                </div>
                            </div>

                        </div>

                        <div class="modal-footer">
                            <button type="button" class="btn btn-danger" data-dismiss="modal">Close Dialogue</button>
                            <button  class="btn btn-success" id="ajaxSubmit">Save Changes</button>
                        </div>

                    </div>
                </div>
            </div>
        </form>
    </div>

    <script src="http://code.jquery.com/jquery-3.3.1.min.js"
                integrity="sha256-FgpCb/KJQlLNfOu91ta32o/NMZxltwRo8QtmkMRdAu8="
                crossorigin="anonymous">
    </script>
    
    <!-- Latest compiled and minified JavaScript -->
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>
    <script>
        jQuery(document).ready(function(){
            jQuery('#ajaxSubmit').click(function(e){
            e.preventDefault();
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="_token"]').attr('content')
                }
            });
            jQuery.ajax({
                url: "{{ url('/chempionleague') }}",
                method: 'post',
                data: {
                    name: jQuery('#name').val(),
                    club: jQuery('#club').val(),
                    country: jQuery('#country').val(),
                    score: jQuery('#score').val(),
                },
                success: function(result){
                    if(result.errors)
                    {
                        jQuery('.alert-danger').html('');

                        jQuery.each(result.errors, function(key, value){
                            jQuery('.alert-danger').show();
                            jQuery('.alert-danger').append('<li>'+value+'</li>');
                        });
                    }
                    else
                    {
                        jQuery('.alert-danger').hide();
                        $('#open').hide();
                        $('#myModal').modal('hide');
                    }
                }});
            });
            });
    </script>