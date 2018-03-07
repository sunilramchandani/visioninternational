@extends('layouts.admin') @section('content-header')
<section class="content-header">
    <div class="row">
        <div class="col-xs-12">
            <h1 class="page-header">
                FAQ
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
                    <div class="col-xs-12">
                        <div class="form-group">
                            <label for="faq_type">
                                FAQ Type
                            </label>
                            <select class="form-control" name="faq_type" id="faq_type" required>
                                <option value="" disabled selected>{{ isset($faq->faq_type) ? $faq->faq_type :''}}</option>
                                <option value="Internship">Internship</option>
                                <option value="Spring">Spring</option>
                                <option value="Summer">Summer</option>
                                <option value="AuPair">AuPair</option>
                            </select>

                        </div>
                    </div>
                </div>



                <div class="row">
                    <div class="col-xs-6">
                        <div class="form-group">
                            <label for="company_website">
                                Question
                            </label>
                            <textarea class="summernote" rows=10 id="question" name="question" required placeholder="Senior Programmer">{{ isset($faq->question) ? $faq->question : '' }} </textarea>
                        </div>
                    </div>
                    <div class="col-xs-6">
                        <div class="form-group">
                            <label for="company_website">
                                Answer
                            </label>
                            <textarea class="summernote" rows=10 id="answer" name="answer" required placeholder="Senior Programmer">{{ isset($faq->answer) ? $faq->answer : '' }} </textarea>
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