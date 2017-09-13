@extends("layout.main")

@section("content")
<div class="row">
    <div class="site-contact">
        <h1>create</h1>

        <p>
            If you have business inquiries or other questions, please fill out the following form to contact us. Thank you.
        </p>

        <div class="row">
            <div class="col-lg-5">
                <div class="form-group field-contactform-subject required">
                    <label class="control-label" for="contactform-subject">Subject</label>
                    <input type="text" id="contactform-subject" class="form-control" name="ContactForm[subject]">

                </div>
                <div class="form-group field-contactform-body required">
                    <label class="control-label" for="contactform-body">Body</label>
                    <textarea id="contactform-body" class="form-control" name="ContactForm[body]" rows="6"></textarea>
                </div>

                    <div class="form-group">
                        <button class="btn btn-primary">submit</button>
                    </div>
            </div>
        </div>

    </div>

</div>
@endsection
