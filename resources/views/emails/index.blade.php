<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Responsive Form</title>
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
    <div class="container mt-5">
        <h2 class="text-center mb-4">Responsive Form</h2>
        <form action="{{ route('send-email') }}" enctype="multipart/form-data" method="post">
            @csrf
            <div class="row">
                <div class="col-md-8 mb-3">
                    <label for="input1" class="form-label">From Email</label>
                    <input type="text" class="form-control" name="from_mail" id="from_mail" placeholder="From Email">
                </div>
                <div class="col-md-8 mb-3">
                    <label for="input2" class="form-label">To Email</label>
                    <input type="text" class="form-control" name="to_mail" id="to_mail" placeholder="To Email">
                </div>
                <div class="col-md-8 mb-3">
                    <label for="input3" class="form-label">Add Comment here.. </label>
                    <textarea placeholder="Enter text" name="add_comment" id="add_comment" cols="30" rows="10" class="form-control"></textarea>
                </div>
            </div>
            <button type="submit" class="btn btn-primary w-100">Submit</button>
        </form>
    </div>

    <!-- Bootstrap JS and Popper.js -->
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.min.js"></script>
</body>
</html>
