<div class="container">

    <div class="input-group">
        <div class="custom-file">
            <input type="file" class="custom-file-input" id="formFile" name="image" onchange="preview()" {{ !empty($imagePath) ? '' : 'required' }}>
            <label class="custom-file-label" for="formFile">Choose @lang('site.image')</label>
        </div>
        <div class="input-group-append">
            <a onclick="clearImage()" class="btn btn-outline-secondary text-dark" id="remove-image">
                remove image
            </a>
        </div>
    </div>

    @if(!empty($imagePath))
    	<img id="frame" name="image" src="{{ $imagePath }}" class="img-fluid"/>
    @else
    	<img id="frame" name="image" src="{{ asset('admin_assets/images/default.png') }}" class="img-fluid"/>
    @endif
</div>

<script>
    function preview() {
        frame.src = URL.createObjectURL(event.target.files[0]);
    }
    $(document).on('click', '#remove-image', function(e) {
    	e.preventDefault();

        document.getElementById('formFile').value = null;
        frame.src = "";
    });
</script>