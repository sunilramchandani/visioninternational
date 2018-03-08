@extends('layouts.admin') @section('content-header')
<section class="content-header">
    <div class="row">
        <div class="col-xs-12">
            <h1 class="page-header">
                Rate
            </h1>
        </div>
    </div>
</section>
@endsection @section('content-main')
<section class="content">
    <div class="row">
        <div class="col-xs-12">
            <form action="{{ $action }}" method="{{  $method }}" enctype="multipart/form-data" role="form">
                <input type="hidden" name="_token" value="{{ csrf_token() }}">


                <div class="row">

                    <div class="col-xs-6">
                        <div class="form-group">
                            <label for="rate_title">
                                Program
                            </label>
                            <input type="text" class="form-control" id="program" name="program" required 
                            value="{{ isset($rate->program) ? $rate->program:""}}" placeholder="Title...">
                        </div>
                    </div>
             

         
                    <div class="col-xs-6">
                        <div class="form-group">
                            <label for="country">
                                Country
                            </label>
                            <select class="form-control" name="country" id="country" required>
                            <option value="{{ isset($rate->country) ? $rate->country:"Select Country"}}" selected>{{ isset($rate->country) ? $rate->country:"Select Country"}}</option>
                                <option value="United States">United States</option>
                                <option value="Australia">Australia</option>
                            </select>

                        </div>
                    </div>






                </div>



                <div class="row">
                    <div class="col-xs-6">
                        <div class="form-group">
                            <label for="company_website">
                                Reservation
                            </label>
                            <input type="number" min="0" class="form-control" id="reservation" name="reservation" value="{{ isset($rate) ? $rate->reservation : '' }}" placeholder="reservation"required>
                        </div>
                    </div>
                    <div class="col-xs-6">
                        <div class="form-group">
                            <label for="rate_website">
                                Duration
                            </label>
                            <input type="number" min="0" class="form-control" id="duration" name="duration" value="{{ isset($rate) ? $rate->duration : '' }}" placeholder="duration"required>
                        </div>
                    </div>
                </div>

                <div class="row">
                    <div class="col-xs-3">
                        <div class="form-group">
                            <label for="company_website">
                                First
                            </label>
                            <input type="number" min="0" class="form-control" id="first" name="first" value="{{ isset($rate) ? $rate->first : '' }}" placeholder="first"required>
                        </div>
                        
                    </div>

                    <div class="col-xs-3">
                        <div class="form-group">
                            <label for="company_website">
                                Second
                            </label>
                            <input type="number" min="0" class="form-control" id="second" name="second" value="{{ isset($rate) ? $rate->second : '' }}" placeholder="second"required>
                        </div>
                        
                    </div>

                    <div class="col-xs-3">
                        <div class="form-group">
                            <label for="company_website">
                                Third
                            </label>
                            <input type="number" min="0" class="form-control" id="third" name="third" value="{{ isset($rate) ? $rate->third : '' }}" placeholder="third"required>
                        </div>
                        
                    </div>

                    @if($rate->country == "Australia")
                    <div class="col-xs-3">
                        <div class="form-group">
                            <label for="company_website">
                                Visa
                            </label>
                            <input type="number" min="0" class="form-control" id="visa" name="visa" value="{{ isset($rate) ? $rate->visa : '' }}" placeholder="visa"required>
                        </div>
                        
                    </div>
                    @else
                    @endif

                    <div class="col-xs-3">
                        <div class="form-group">
                            <label for="company_website">
                                Total
                            </label>
                            <input type="number" min="0" class="form-control" id="total" name="total" value="{{ isset($rate) ? $rate->total : '' }}" placeholder="total" disabled>
                        </div>
                        
                    </div>
                    


                </div>

                <div class="btn-container">
                    <a href="#" class="btn btn-danger pull-right">Cancel</a>
                    <button type="submit" class="btn btn-primary pull-right">Submit</button>
                </div>
            </form>
        </div>
    </div>
</section>
@endsection @section('scripts')
<script>
    $(document).ready(function () {
        $('.summernote').summernote({
            height: 250
        });


        $('input[name="start_end"]').daterangepicker({
            locale: {
                format: 'MM/DD/YYYY'
            }
        });

        $('#start_end').change(function () {
            var start_end = $('#start_end').val();
            start_end = start_end.split('-');

            var start = start_end[0];
            var end = start_end[1];

            start = new Date(start);
            end = new Date(end);

            var timeDiff = Math.abs(start.getTime() - end.getTime());
            var diffDays = Math.ceil(timeDiff / (1000 * 3600 * 24));

            $('#duration').val(diffDays);

        });
    });
</script>
@endsection