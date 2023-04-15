<div class="container">
    <div class="mb-5">
        <label for="Image" class="form-label">
        	@lang('site.image')
        </label>
        <input class="form-control" type="file" name="image" id="formFile" onchange="preview()" {{ !empty($imagePath) ? '' : 'required' }}>
        <a onclick="clearImage()" class="btn btn-primary mt-3 text-light" id="remove-image">
    	    remove image
    	</a>
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