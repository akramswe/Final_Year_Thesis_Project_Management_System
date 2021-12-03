<!DOCTYPE html>
<html>
<head>
	<title>Send to Email</title>
</head>
<body>
<form method="get" action="{{url('send-mail')}}">
   {{csrf_field()}}
   <div class="form-group">
    <input type="text" name="to" class="form-control" placeholder="Enter Send to" />
   </div>
   <div class="form-group">
    <input type="text" name="subject" class="form-control" placeholder="Enter First Name" />
   </div>
   <div class="form-group">
    <input type="text" name="body" class="form-control" placeholder="Enter Last Name" />
   </div>
   <div class="form-group">
    <input type="submit" class="btn btn-primary" />
   </div>
  </form>
</body>
</html>