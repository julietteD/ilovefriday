<!DOCTYPE html>
<html>
    <head>
        <title>Manager</title>
				<link href="https://netdna.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.css" rel="stylesheet">
    <link href="{{ asset('css/admin.css') }}" rel="stylesheet">
    <link href="{{ asset('css/jquery-ui.min.css') }}" rel="stylesheet">
		<link href="https://cdnjs.cloudflare.com/ajax/libs/summernote/0.8.11/summernote.css" rel="stylesheet">
 <meta name="viewport" content="width=device-width, initial-scale=1">

    </head>
    <body class="">
		
		
<header>
	<h2>{{ config('app.name', 'Almapola') }} | Administration</h2>	
	<nav class="nav">
  		<a class="btn btn-default navbar-btn" href="{{ url('/logout') }}">Logout</a>
  		<a class="btn btn-default navbar-btn" href="{{ url('/') }}" target="_blank">Website</a>
     <a  class="btn btn-default navbar-btn"  href="{{ route('register') }}">{{ __('Register') }}</a>
                     
	</nav>
	

		</header>
			<aside>
			@include('management.elements.menu', ['managementSection' => true])
			</aside>
			
			
	<main>
			<div class="mainHeader">
				@yield('pagetitle')
			</div>
		
			@yield('content')
	</main>
</div>
<script src="{{ asset('js/jquery-ui.min.js') }}" defer></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.js"></script> 
<script src="https://netdna.bootstrapcdn.com/bootstrap/3.3.5/js/bootstrap.min.js"></script> 

<script src='https://cdn.tiny.cloud/1/96egb2icoog9az1m34p5z3xgwe1ctfealo64o9jhoj7o1sit/tinymce/5/tinymce.min.js' referrerpolicy="origin"></script>
	
	 <script>
        tinymce.init({
            selector: '.summernote',
			images_upload_url: '/postAcceptor.php',
           plugins: ' print paste importcss searchreplace autolink autosave save directionality code visualblocks visualchars fullscreen image link media template codesample table charmap hr pagebreak nonbreaking anchor toc insertdatetime advlist lists wordcount imagetools textpattern noneditable help charmap quickbars emoticons',
			toolbar: 'undo redo | bold italic underline strikethrough | fontselect fontsizeselect formatselect | alignleft aligncenter alignright alignjustify | outdent indent |  numlist bullist checklist | forecolor backcolor casechange permanentpen formatpainter removeformat | pagebreak | charmap emoticons | fullscreen  preview save print | insertfile image media pageembed template link anchor codesample | a11ycheck ltr rtl | showcomments addcomment ',
			

		});</script>
<script src="{{ asset('js/jquery.validate.min.js') }}"></script>
<script>
    $('#editForm').validate();
    jQuery(document).ready(function(){
        $(".datepicker").datepicker({dateFormat: "yy-mm-dd"}); 
    });
</script>

 
 <script>function warning() { return confirm("Please confirm before deleting:");}</script>

	@yield('scripts')
    </body>
</html>
