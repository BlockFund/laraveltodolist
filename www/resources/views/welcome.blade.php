@extends('layouts.app')

@section('content')
    <!-- Page Wrapper -->
    <main>
        <div class="position-relative overflow-hidden p-3 p-md-5 m-md-3 text-center bg-light">
		    <div class="col-md-5 p-lg-5 mx-auto my-5">
		      <h1 class="display-4 fw-normal">Welcome</h1>
		      <p class="lead fw-normal">You are demoing my sample Laravel site.</p>
		    </div>
		    <div class="product-device shadow-sm d-none d-md-block"></div>
		    <div class="product-device product-device-2 shadow-sm d-none d-md-block"></div>
		  </div>

		  <div class="d-md-flex flex-md-equal w-100 my-md-3 ps-md-3">
		    <div class="bg-dark me-md-3 pt-3 px-3 pt-md-5 px-md-5 text-center text-white overflow-hidden">
		      <div class="my-3 py-3">
		        <h2 class="display-5">Where is it?</h2>
		        <p class="lead">It is hosted on an EC2 instance in us-east-1.</p>
		      </div>
		      <div class="bg-light shadow-sm mx-auto" style="width: 80%; height: 300px; border-radius: 21px 21px 0 0;">
		      	<div class="my-3 p-3">
			        <img src="https://img.icons8.com/color/240/000000/amazon-web-services.png"/>
		      	</div>
		      </div>
		    </div>
		    <div class="bg-light me-md-3 pt-3 px-3 pt-md-5 px-md-5 text-center overflow-hidden">
		      <div class="my-3 p-3">
		        <h2 class="display-5">What is it?</h2>
		        <p class="lead">This is a simple authenticated application with a multi-user to-do list.</p>
		      </div>
		      <div class="bg-dark shadow-sm mx-auto" style="width: 80%; height: 300px; border-radius: 21px 21px 0 0;">
		      	<div class="my-3 p-3">
			        <img src="https://img.icons8.com/dusk/256/000000/services.png"/>
		      	</div>
		      </div>
		    </div>
		  </div>

		  <div class="d-md-flex flex-md-equal w-100 my-md-3 ps-md-3">
		    <div class="bg-light me-md-3 pt-3 px-3 pt-md-5 px-md-5 text-center overflow-hidden">
		      <div class="my-3 p-3">
		        <h2 class="display-5">PHP 7</h2>
		        <p class="lead">Not the newest version, but it's stable.</p>
		      </div>
		      <div class="bg-dark shadow-sm mx-auto" style="width: 80%; height: 300px; border-radius: 21px 21px 0 0;">
		      	<div class="my-3 p-3">
			        <img src="https://img.icons8.com/dusk/256/000000/php-logo.png"/>
		      	</div>
		      </div>
		    </div>
		    <div class="bg-primary me-md-3 pt-3 px-3 pt-md-5 px-md-5 text-center text-white overflow-hidden">
		      <div class="my-3 py-3">
		        <h2 class="display-5">Easy to launch</h2>
		        <p class="lead">Leverages Docker to rapidly deploy anywhere.</p>
		      </div>
		      <div class="bg-light shadow-sm mx-auto" style="width: 80%; height: 300px; border-radius: 21px 21px 0 0;">
		      	<div class="my-3 p-3">
			        <img src="https://img.icons8.com/dusk/256/000000/docker.png"/>
		      	</div>
		      </div>
		    </div>
		  </div>
	  </main>
@endsection
