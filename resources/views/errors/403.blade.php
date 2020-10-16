<!-- Bs -->
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">


<h1>Gì mà vô được =))</h1>

<form id="logout-form" action="{{ route('logout') }}" method="POST">
    @csrf
    <input type="submit" value="Out">
    <a href="/" class="btn btn-dark">Return Home</a>
</form>

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>